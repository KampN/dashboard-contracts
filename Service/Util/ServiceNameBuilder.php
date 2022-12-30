<?php

namespace Kampn\Dashboard\Service\Util;

class ServiceNameBuilder {

	public static function build(string $resourceName, string $type): string {
		return "kampn.dashboard." . $resourceName . '.service.' . $type;
	}

}
