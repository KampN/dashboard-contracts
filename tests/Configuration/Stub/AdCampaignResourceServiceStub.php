<?php

namespace Kampn\Dashboard\Tests\Configuration\Stub;

use Kampn\Dashboard\Contract\Enum\ServiceTypeEnum;
use Kampn\Dashboard\Contract\Resource\AdCampaignResource;
use Kampn\Dashboard\Service\Query\Query;
use Kampn\Dashboard\Service\ResourceServiceTrait;

class AdCampaignResourceServiceStub implements AdCampaignResource {
	use ResourceServiceTrait;

	public static function getServiceType(): string {
		return ServiceTypeEnum::ROWS;
	}

	public function process(Query $query, array $options = []): array {
		return ['test'];
	}
}
