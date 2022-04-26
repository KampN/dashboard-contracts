<?php

namespace Kampn\Dashboard\Service;

trait ResourceServiceTrait {
	public static function getResourceName(): string {
		return self::RESOURCE_NAME;
	}

	public static function getServiceLocatorAlias(): string {
		return "kampn.dashboard." . self::getResourceName() . '.service.' . self::getServiceType();
	}
}