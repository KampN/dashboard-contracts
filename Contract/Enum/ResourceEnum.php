<?php

namespace Kampn\Dashboard\Contract\Enum;

class ResourceEnum {

	public const AD_CAMPAIGN = 'ad_campaign';
	public const EXPRESS_CAMPAIGN = 'express_campaign';
	public const MR_BRICOLAGE = 'mr_bricolage';
	public const EXPRESS_LEAD = 'express_lead';

	public static function cases(): array {
		return [self::AD_CAMPAIGN, self::MR_BRICOLAGE, self::EXPRESS_CAMPAIGN, self::EXPRESS_LEAD];
	}

}
