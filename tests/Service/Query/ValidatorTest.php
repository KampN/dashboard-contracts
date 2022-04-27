<?php

namespace Kampn\Dashboard\Tests\Service\Query;

use Kampn\Dashboard\Contract\Constant\QueryConstant;
use Kampn\Dashboard\Service\Exception\QueryException;
use Kampn\Dashboard\Service\Query\Query;
use Kampn\Dashboard\Service\Query\Validator;
use Kampn\Dashboard\Tests\Configuration\Stub\AdCampaignResourceServiceStub;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase {
	public function subject(): Validator {
		return new Validator();
	}

	public function testValidate(): void {
		$resource = new AdCampaignResourceServiceStub();
		$query = Query::build([
			QueryConstant::RESOURCE => AdCampaignResourceServiceStub::class,
			QueryConstant::SEGMENTS => ['date']
		]);

		$this->subject()->validate($resource, $query);
		$this->assertTrue(true);
	}

	public function testValidateWhenSegmentInvalid(): void {
		$resource = new AdCampaignResourceServiceStub();
		$query = Query::build([
			QueryConstant::RESOURCE => AdCampaignResourceServiceStub::class,
			QueryConstant::SEGMENTS => ['riri', 'fifi', 'loulou']
		]);

		$this->expectException(QueryException::class);
		$this->expectExceptionMessage('Missing segment riri in resource');

		$this->subject()->validate($resource, $query);
		$this->assertTrue(true);
	}
}
