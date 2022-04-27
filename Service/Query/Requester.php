<?php

namespace Kampn\Dashboard\Service\Query;

use Kampn\Dashboard\Compiler\DashboardResourceLocator;

class Requester {

	protected DashboardResourceLocator $resourceLocator;

	public function __construct(DashboardResourceLocator $resourceLocator) {
		$this->resourceLocator = $resourceLocator;
	}

	public function process(Query $query, string $type) {
		$service = $this->resourceLocator->getResourceService($query, $type);
		return $service->process($query);
	}
}
