<?php

namespace Kampn\Dashboard\Service\Query;

use Kampn\Dashboard\Contract\Constant\FilterConstant;
use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;
use Kampn\Dashboard\Service\Exception\QueryException;

class Validator {

	public function validate(ResourceInterface $resource, Query $query): bool {
		$segments = $query->getSegments();

		if(empty($segments)) {
			throw new QueryException('Missing segments in query');
		}
		if($query->getStartDate() === null) {
			throw new QueryException('Missing start date in query');
		}
		if($query->getEndDate() === null) {
			throw new QueryException('Missing end date in query');
		}

		foreach($segments as $segment) {
			if(!$resource->getSegment($segment)) {
				throw new QueryException("Missing segment $segment in resource");
			}
		}

		foreach($query->getFilters() as $filter) {
			$this->validateFilter($resource, $filter);
		}

		return true;
	}

	public function validateFilter(ResourceInterface $resource, array $filter): bool {
		$operand = $filter[FilterConstant::OPERAND] ?? null;
		if($operand === null)
			throw new QueryException('Missing operand in filter');

		$operator = $filter[FilterConstant::OPERATOR] ?? null;
		if($operator === null)
			throw new QueryException('Missing operator in filter');

		$values = $filter[FilterConstant::VALUES] ?? null;
		if($values === null)
			throw new QueryException('Missing values in filter');

		$field = $resource->getField($operand);
		if($field === null)
			throw new QueryException("Invalid field $operand in filter");

		if(!in_array($operator, $field[ResourceFieldConstant::FIELD_OPERATORS]))
			throw new QueryException("Invalid operator $operator for field $operand in filter");

		if(!is_array($values))
			throw new QueryException("Invalid values for field $operand in filter");

		return true;
	}
}
