<?php

namespace Kampn\Dashboard\Service;

trait ResourceServiceTrait {
	public static function getResourceName(): string {
		return self::RESOURCE_NAME;
	}

	public static function getServiceLocatorAlias(): string {
		return self::buildServiceName(self::getResourceName(), self::getServiceType());
	}

	public static function buildServiceName(string $resourceName, string $type): string {
		return "kampn.dashboard." . $resourceName . '.service.' . $type;
	}
}