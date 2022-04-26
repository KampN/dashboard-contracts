<?php

namespace Kampn\Dashboard\Tests\Configuration\Stub;

use Kampn\Dashboard\Contract\Resource\AdCampaignResource;
use Kampn\Dashboard\Service\ResourceServiceTrait;

class AdCampaignResourceServiceStub implements AdCampaignResource {
	use ResourceServiceTrait;

	public static function getServiceType(): string {
		return self::SERVICE_TYPE_ROWS;
	}
}