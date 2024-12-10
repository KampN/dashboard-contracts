<?php

namespace Kampn\Dashboard\Contract\Enum;

class ResourceEnum {

	public const AD_CAMPAIGN = 'ad_campaign';
	public const EXPRESS_CAMPAIGN = 'express_campaign';
	public const MR_BRICOLAGE = 'mr_bricolage';
	public const EXPRESS_CAMPAIGN_HISTORY = 'express_campaign_history';
	public const EXPRESS_LEAD = 'express_lead';
	public const KAFOUTCHE_EXPRESS_LEAD = 'kafoutche_express_lead';
	public const COCKPIT_CAMPAIGN = 'cockpit_campaign';

	public static function cases(): array {
		return [
			self::AD_CAMPAIGN,
			self::MR_BRICOLAGE,
			self::EXPRESS_CAMPAIGN,
			self::EXPRESS_LEAD,
			self::EXPRESS_CAMPAIGN_HISTORY,
			self::COCKPIT_CAMPAIGN
		];
	}

}
