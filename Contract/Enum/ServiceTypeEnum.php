<?php

namespace Kampn\Dashboard\Contract\Enum;

class ServiceTypeEnum {
	public const ROWS = 'rows';
	public const TOTAL = 'total';

	public static function cases(): array {
		return [self::ROWS, self::TOTAL];
	}
}
