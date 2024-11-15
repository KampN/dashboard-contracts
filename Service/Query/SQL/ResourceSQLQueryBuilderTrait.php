<?php

namespace Kampn\Dashboard\Service\Query\SQL;

use Kampn\Dashboard\Contract\Constant\FilterConstant;
use Kampn\Dashboard\Contract\Constant\PaginationConstant;
use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;
use Kampn\Dashboard\Service\Query\Query;
use Symfony\Contracts\Service\Attribute\Required;

trait ResourceSQLQueryBuilderTrait {

	protected AliasGenerator $aliasGenerator;

	#[Required]
	public function setAliasGenerator(AliasGenerator $aliasGenerator): void {
		$this->aliasGenerator = $aliasGenerator;
	}

	// TODO remove limitDeprecated and offsetDeprecated when all services are migrated
	public function prepare(Query $query, string $from, ?int $limitDeprecated = null, int $offsetDeprecated = 0): array {
		$select = $this->buildSelectPart($query);
		$groupBy = $this->buildGroupBy($query);
		$conditions = $this->buildConditions($query);

		$limit = $this->buildLimit($query);
		$offset = $this->buildOffset($query);
		$orderBy = $this->buildOrderBy($query);

		return [
			'select' => $select,
			'groupBy' => $groupBy,
			'from' => $from,
			'where' => $conditions['where'],
			'having' => $conditions['having'],
			'orderBy' => $orderBy,
			'offset' => $offset,
			'limit' => $limit,
			'parameters' => $conditions['parameters'],
		];
	}

	public function computeSQLParts(array $sqlParts): string {
		$sql = [];
		$sql[] = 'select ' . implode(',', $sqlParts['select'] ?? []);
		$sql[] = ' from ' . $sqlParts['from'] ?? '';
		if(!empty($sqlParts['where'] ?? []))
			$sql[] = ' where ' . implode(' and ', $sqlParts['where']);
		if(!empty($sqlParts['groupBy'] ?? []))
			$sql[] = ' group by ' . implode(',', $sqlParts['groupBy']);
		if(!empty($sqlParts['having'] ?? []))
			$sql[] = ' having ' . implode(' and ', $sqlParts['having']);
		if(!empty($sqlParts['orderBy'] ?? []))
			$sql[] = ' order by ' . implode(',', $sqlParts['orderBy']);
		if(($sqlParts['limit'] ?? null) !== null)
			$sql[] = " limit " . $sqlParts['limit'];
		if(($sqlParts['offset'] ?? null) !== null)
			$sql[] = " offset " . $sqlParts['offset'];
		return implode(' ', $sql);
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
                $placeholders = [];
                foreach($values as $value) {
                    $placeholders[] = ":$alias";
                    $params[$alias] = $value;
                    $alias = $this->aliasGenerator->get();
                }

                $placeholder = implode(',', $placeholders);
				$sql = "$operand in ($placeholder)";
				break;
			case OperatorEnum::NOT_IN:
                $placeholders = [];
                foreach($values as $value) {
                    $placeholders[] = ":$alias";
                    $params[$alias] = $value;
                    $alias = $this->aliasGenerator->get();
                }

                $placeholder = implode(',', $placeholders);
				$sql = "$operand not in ($placeholder)";
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
			case OperatorEnum::BETWEEN:
				$alias2 = $this->aliasGenerator->get();
				$sql = "$operand between :$alias and :$alias2";
				$params[$alias] = $values[0];
				$params[$alias2] = $values[1];
				break;
			case OperatorEnum::NOT_BETWEEN:
				$alias2 = $this->aliasGenerator->get();
				$sql = "$operand not between :$alias and :$alias2";
				$params[$alias] = $values[0];
				$params[$alias2] = $values[1];
				break;
		}
		return [$sql, $params];
	}

	public function buildLimit(Query $query): ?int {
		return $query->getPagination()[PaginationConstant::LIMIT] ?? 1000;
	}

	public function buildOffset(Query $query): ?int {
		$limit = $this->buildLimit($query);
		$page = ($query->getPagination()[PaginationConstant::PAGE] ?? 1);
		return ($page - 1) * $this->buildLimit($query);
	}

	public function buildOrderBy(Query $query): array {
		$fields = $this->getSelectFields($query);
		$fieldsDefs = $this->getFieldsDefs();
		$aggDefs = $this->getAggDefs();

		$columns = [];

		foreach($fields as $field) {
			$name = $field[ResourceFieldConstant::FIELD_NAME];
			$selectable = $field[ResourceFieldConstant::FIELD_SELECTABLE] ?? true;
			if($selectable === false) continue;

			$agg = in_array($name, $aggDefs, false);
			if($agg === true) continue;

			$column = $fieldsDefs[$name];
			$columns[$column] = "$column asc";
		}

		return array_values($columns);
	}
}
