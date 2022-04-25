<?php

namespace Kampn\Dashboard\Contract\Enums;

class ResourceEnum {

	public const AD_CAMPAIGN = 'ad_campaign';
	public const MR_BRICOLAGE = 'mr_bricolage';

	public static function cases(): array {
		return [self::AD_CAMPAIGN, self::MR_BRICOLAGE];
	}

}
