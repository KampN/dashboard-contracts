<?php

namespace Kampn\Dashboard\Service\Query\SQL;

use Kampn\Dashboard\Contract\Constant\FilterConstant;
use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;
use Kampn\Dashboard\Service\Query\Query;

trait ResourceSQLQueryBuilderTrait {

	protected AliasGenerator $aliasGenerator;

	/**
	 * @required
	 */
	public function setAliasGenerator(AliasGenerator $aliasGenerator): void {
		$this->aliasGenerator = $aliasGenerator;
	}

	public function prepare(Query $query, string $from, ?int $limit = null, int $offset = 0): array {
		$select = $this->buildSelectPart($query);
		$groupBy = $this->buildGroupBy($query);

		$conditions = $this->buildConditions($query);

		return [
			'select' => $select,
			'groupBy' => $groupBy,
			'from' => $from,
			'where' => $conditions['where'],
			'having' => $conditions['having'],
			'orderBy' => [],
			'offset' => $offset,
			'limit' => $limit,
			'parameters' => $conditions['parameters'],
		];
	}

	public function computeSQLParts(array $sqlParts): string {
		$sql = '';
		$sql .= 'select ' . implode(',', $sqlParts['select'] ?? []);
		$sql .= ' from ' . $sqlParts['from'] ?? '';
		if(!empty($sqlParts['where'] ?? []))
			$sql .= ' where ' . implode(' and ', $sqlParts['where']);
		if(!empty($sqlParts['groupBy'] ?? []))
			$sql .= ' group by ' . implode(',', $sqlParts['groupBy']);
		if(!empty($sqlParts['having'] ?? []))
			$sql .= ' having ' . implode(' and ', $sqlParts['having']);
		if(!empty($sqlParts['orderBy'] ?? []))
			$sql .= ' order by ' . implode(',', $sqlParts['orderBy']);
		if(($sqlParts['limit'] ?? null) !== null)
			$sql .= " limit " . $sqlParts['limit'];
		if(($sqlParts['offset'] ?? null) !== null)
			$sql .= " offset " . $sqlParts['offset'];
		return $sql;
	}


	protected function getSelectFields(Query $query): array {
		$fields = array_merge(...array_values(array_filter($this->getSegmentDefs(), fn($key) => in_array($key, $query->getSegments()), ARRAY_FILTER_USE_KEY)));
		$availableFields = array_unique(array_merge($fields, $this->getAggDefs()));
		return array_values(array_filter($this->getFields(), fn($field) => in_array($field[ResourceFieldConstant::FIELD_NAME], $availableFields)));
	}

	public function buildSelectPart(Query $query): array {
		$fields = $this->getSelectFields($query);
		$fieldsDefs = $this->getFieldsDefs();
		$columns = [];

		foreach($fields as $field) {
			$name = $field[ResourceFieldConstant::FIELD_NAME];
			$selectable = $field[ResourceFieldConstant::FIELD_SELECTABLE] ?? true;
			if($selectable === false) continue;

			$column = $fieldsDefs[$name];
			$columns[] = "$column as $name";
		}

		return $columns;
	}

	public function buildGroupBy(Query $query): array {
		$fields = $this->getSelectFields($query);
		$fieldsDefs = $this->getFieldsDefs();
		$columns = [];

		foreach($fields as $i => $field) {
			$name = $field[ResourceFieldConstant::FIELD_NAME];
			$agg = in_array($name, $this->getAggDefs(), false);
			$column = $fieldsDefs[$name];
			if(!$agg) $columns[] = $column;
		}

		return $columns;
	}

	public function buildConditions(Query $query): array {
		$where = [];
		$having = [];
		$parameters = [];

		foreach($query->getFilters() as $filter) {
			$operand = $filter[FilterConstant::OPERAND];
			[$sql, $parameters[]] = $this->buildConditionExpr($filter);
			in_array($operand, $this->getAggDefs(), false) ? $having[] = $sql : $where[] = $sql;
		}

		return [
			'where' => $where,
			'having' => $having,
			'parameters' => array_merge(...$parameters)
		];
	}

	protected function buildConditionExpr(array $filter): array {
		$fieldsDefs = $this->getFieldsDefs();
		$operand = $fieldsDefs[$filter[FilterConstant::OPERAND]];
		$operator = $filter[FilterConstant::OPERATOR];
		$values = $filter[FilterConstant::VALUES];

		$alias = $this->aliasGenerator->get();
		$params = [];
		switch($operator) {
			case OperatorEnum::EQUAL:
				$sql = "$operand = :$alias";
				$params[$alias] = $values[0];
				break;
			case OperatorEnum::DIFFERENT:
				$sql = "$operand != :$alias";
				$params[$alias] = $values[0];
				break;

			case OperatorEnum::LIKE:
				$like = $this->getPlatform() === self::PLATFORM_POSTGRES ? 'ilike' : 'like';
				$sql = "$operand $like :$alias";
				$params[$alias] = "%$values[0]%";
				break;
			case OperatorEnum::NOT_LIKE:
				$like = $this->getPlatform() === self::PLATFORM_POSTGRES ? 'ilike' : 'like';
				$sql = "$operand not $like :$alias";
				$params[$alias] = "%$values[0]%";
				break;

			case OperatorEnum::IN:
				$sql = "$operand in (:$alias)";
				$params[$alias] = $values;
				break;
			case OperatorEnum::NOT_IN:
				$sql = "$operand not in (:$alias)";
				$params[$alias] = $values;
				break;

			case OperatorEnum::GREATER_THAN:
				$sql = "$operand > :$alias";
				$params[$alias] = $values[0];
				break;
			case OperatorEnum::GREATER_OR_EQUAL_THAN:
				$sql = "$operand >= :$alias";
				$params[$alias] = $values[0];
				break;

			case OperatorEnum::LOWER_THAN:
				$sql = "$operand < :$alias";
				$params[$alias] = $values[0];
				break;
			case OperatorEnum::LOWER_OR_EQUAL_THAN:
				$sql = "$operand <= :$alias";
				$params[$alias] = $values[0];
				break;
		}
		return [$sql, $params];
	}
}
