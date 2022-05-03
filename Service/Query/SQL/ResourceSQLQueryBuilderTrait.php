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

	public function prepare(Query $query, string $from, string $limit = ''): array {
		$select = $this->buildSelectPart($query);
		$groupBy = $this->buildGroupBy($query);

		[$where, $having, $parameters] = $this->buildConditions($query);
		$orderBy = '';
		$sql = implode(' ', [$select, $from, $where, $groupBy, $having, $orderBy, $limit]);

		return [$sql, $parameters];
	}

	protected function getSelectFields(Query $query): array {
		$fields = array_merge(...array_values(array_filter($this->getSegmentDefs(), fn($key) => in_array($key, $query->getSegments()), ARRAY_FILTER_USE_KEY)));
		$availableFields = array_unique(array_merge($fields, $this->getAggDefs()));
		return array_values(array_filter($this->getFields(), fn($field) => in_array($field[ResourceFieldConstant::FIELD_NAME], $availableFields)));
	}

	public function buildSelectPart(Query $query): string {
		$fields = $this->getSelectFields($query);
		$fieldsDefs = $this->getFieldsDefs();
		$columns = [];

		foreach($fields as $field) {
			$name = $field[ResourceFieldConstant::FIELD_NAME];
			$column = $fieldsDefs[$name];
			$columns[] = "$column as $name";
		}

		return 'select ' . implode(', ', $columns);
	}

	public function buildGroupBy(Query $query): string {
		$fields = $this->getSelectFields($query);
		$columns = [];

		foreach($fields as $i => $field) {
			$name = $field[ResourceFieldConstant::FIELD_NAME];
			$agg = in_array($name, $this->getAggDefs(), false);
			if(!$agg) $columns[] = $i + 1;
		}

		return 'group by ' . implode(', ', $columns);
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
			empty($where) ? '' : 'where ' . implode(' and ', $where),
			empty($having) ? '' : 'having ' . implode(' and ', $having),
			array_merge(...$parameters)
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