<?php

namespace Kampn\Dashboard\Tests\Service\Query;

use DateTime;
use DateTimeInterface;
use Kampn\Dashboard\Contract\Constant\QueryConstant;
use Kampn\Dashboard\Contract\Enum\ServiceTypeEnum;
use Kampn\Dashboard\Service\Query\Query;
use Kampn\Dashboard\Service\Query\Requester;
use Kampn\Dashboard\Tests\Compiler\DashboardResourceLocatorTest;
use Kampn\Dashboard\Tests\Configuration\Stub\AdCampaignResourceServiceStub;
use PHPUnit\Framework\TestCase;

class RequesterTest extends TestCase {
	public function subject(): Requester {
		$locator = DashboardResourceLocatorTest::buildLocator();
		return new Requester($locator);
	}

	public function testProcess(): void {
		$query = Query::build([
			QueryConstant::RESOURCE => AdCampaignResourceServiceStub::getResourceName(),
            QueryConstant::START_DATE => (new DateTime())->format(DateTimeInterface::ATOM),
            QueryConstant::END_DATE => (new DateTime())->modify('+30d')->format(DateTimeInterface::ATOM),
			QueryConstant::SEGMENTS => ['date']
		]);

		$response = $this->subject()->process($query, ServiceTypeEnum::ROWS);
		$this->assertEquals(['test'], $response);
	}
}
