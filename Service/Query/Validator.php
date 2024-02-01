<?php

namespace Kampn\Dashboard\Service\Query;

use Kampn\Dashboard\Contract\Constant\FilterConstant;
use Kampn\Dashboard\Contract\Constant\PaginationConstant;
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

		if($query->getPagination()) {
			$this->validatePagination($query->getPagination());
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

		if(!in_array($operator, $field[ResourceFieldConstant::FIELD_OPERATORS], true))
			throw new QueryException("Invalid operator $operator for field $operand in filter");

		if(!is_array($values))
			throw new QueryException("Invalid values for field $operand in filter");

		return true;
	}

	public function validatePagination(array $pagination): bool {
		$limit = $pagination[PaginationConstant::LIMIT] ?? null;
		if($limit === null) {
			throw new QueryException('Missing limit in pagination');
		}

		if($limit <= 0) {
			throw new QueryException('Invalid limit in pagination minimum is 1');
		}

		$page = $pagination[PaginationConstant::PAGE] ?? null;
		if($page === null) {
			throw new QueryException('Missing page in pagination');
		}

		if($page <= 0) {
			throw new QueryException('Invalid page in pagination minimum is 1');
		}

		return true;
	}
}
