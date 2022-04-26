<?php

namespace Kampn\Dashboard\Tests\Service\Query;

use Kampn\Dashboard\Contract\Constant\FilterConstant;
use Kampn\Dashboard\Service\Query\FiltersReader;
use PHPUnit\Framework\TestCase;

class FiltersReaderTest extends TestCase {
	public function subject(): FiltersReader {
		return new FiltersReader();
	}

	public function testDecode(): void {
		$filters = $this->subject()->decode('W3sib3BlcmFuZCI6InNob3BfaWQiLCJvcGVyYXRvciI6Ij0iLCJ2YWx1ZXMiOlsiUzIwNSJdfSx7Im9wZXJhbmQiOiJjb3N0Iiwib3BlcmF0b3IiOiI%2BIiwidmFsdWVzIjpbMF19LHsib3BlcmFuZCI6ImxhYmVsIiwib3BlcmF0b3IiOiI9IiwidmFsdWVzIjpbImthbXBuLW1vbml0b3JpbmciXX1d');

		$this->assertEquals([
			[
				FilterConstant::OPERAND => 'shop_id',
				FilterConstant::OPERATOR => '=',
				FilterConstant::VALUES => ['S205'],
			],
			[
				FilterConstant::OPERAND => 'cost',
				FilterConstant::OPERATOR => '>',
				FilterConstant::VALUES => [0],
			],
			[
				FilterConstant::OPERAND => 'label',
				FilterConstant::OPERATOR => '=',
				FilterConstant::VALUES => ['kampn-monitoring'],
			],
		], $filters);
	}

	public function testEncode(): void {
		$str = $this->subject()->encode([
			[
				FilterConstant::OPERAND => 'cost',
				FilterConstant::OPERATOR => '>',
				FilterConstant::VALUES => [0],
			]
		]);

		$this->assertEquals('W3sib3BlcmFuZCI6ImNvc3QiLCJvcGVyYXRvciI6Ij4iLCJ2YWx1ZXMiOlswXX1d', $str);
	}
}
