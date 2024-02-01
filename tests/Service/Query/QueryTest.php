<?php

namespace Kampn\Dashboard\Tests\Service\Query;

use Kampn\Dashboard\Contract\Constant\FilterConstant;
use Kampn\Dashboard\Contract\Constant\PaginationConstant;
use Kampn\Dashboard\Contract\Constant\QueryConstant;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;
use Kampn\Dashboard\Service\Query\FiltersEncoder;
use Kampn\Dashboard\Service\Query\Query;
use PHPUnit\Framework\TestCase;

class QueryTest extends TestCase {
	public function testBuild(): void {
		$filters = [
			[
				FilterConstant::OPERAND => 'cost',
				FilterConstant::OPERATOR => OperatorEnum::GREATER_OR_EQUAL_THAN,
				FilterConstant::VALUES => [0]
			]
		];

		$pagination = [
			PaginationConstant::LIMIT => 100,
			PaginationConstant::PAGE => 2,
		];

		$request = [
			QueryConstant::RESOURCE => 'resource_name',
			QueryConstant::START_DATE => null,
			QueryConstant::END_DATE => '2022-04-27T13:16:05+00:00',
			QueryConstant::SEGMENTS => ['day', 'operation_name'],
			QueryConstant::FILTERS => FiltersEncoder::encode($filters),
			QueryConstant::PAGINATION => $pagination
		];

		$subject = Query::build($request);

		$this->assertEquals('resource_name', $subject->getResourceName());
		$this->assertNull($subject->getStartDate());
		$this->assertEquals('2022-04-27', $subject->getEndDate()->format('Y-m-d'));
		$this->assertEquals(['day', 'operation_name'], $subject->getSegments());
		$this->assertTrue($subject->hasSegment('day'));
		$this->assertEquals($filters, $subject->getFilters());
		$this->assertEquals($pagination, $subject->getPagination());
	}
}
