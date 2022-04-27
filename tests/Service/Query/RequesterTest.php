<?php

namespace Kampn\Dashboard\Tests\Service\Query;

use Kampn\Dashboard\Contract\Constant\QueryConstant;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;
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
			QueryConstant::RESOURCE => AdCampaignResourceServiceStub::getResourceName()
		]);

		$response = $this->subject()->process($query, ResourceInterface::SERVICE_TYPE_ROWS);
		$this->assertEquals(['test'], $response);
	}
}
