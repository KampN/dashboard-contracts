<?php

namespace Kampn\Dashboard\Service\Enum;

class ResponseTypeEnum {

	public const RESOURCE = 'resource';
	public const RESULT_BAG = 'result_bag';

	public static function cases(): array {
		return [self::RESOURCE, self::RESULT_BAG];
	}

}
