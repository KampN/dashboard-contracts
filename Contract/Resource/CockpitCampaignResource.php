<?php

namespace Kampn\Dashboard\Contract\Resource;

use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Enum\FieldTypeEnum;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;
use Kampn\Dashboard\Contract\Enum\ResourceEnum;
use Kampn\Dashboard\Contract\Enum\SourceEnum;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;

interface CockpitCampaignResource extends ResourceInterface {

	public const RESOURCE_NAME = ResourceEnum::COCKPIT_CAMPAIGN;

	/// Allow Dashboard to merge sources from different sources using segment key as pivot
	public const COLLAPSIBLE = false;

	public const SUPPORT_SOURCES = [
		SourceEnum::GOOGLE_ADS,
		SourceEnum::FACEBOOK_ADS,
	];

	public const FIELD_CLIENT_ID = 'client_id';
	public const FIELD_CLIENT_NAME = 'client_name';
	public const FIELD_ACCOUNT_ID = 'account_id';
	public const FIELD_ACCOUNT_NAME = 'account_name';
	public const FIELD_CAMPAIGN_ID = 'campaign_id';
	public const FIELD_CAMPAIGN_NAME = 'campaign_name';
	public const FIELD_CAMPAIGN_LABELS = 'campaign_labels';

	public const FIELD_DATE_MONTH = 'date_month';
	public const FIELD_COST = 'cost';


	public const FIELDS = [
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CLIENT_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Kamp\'n Client Id',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CLIENT_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Kamp\'n Client name',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_ACCOUNT_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Account Id between Google Ads and Facebook Ads',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_ACCOUNT_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Account Name / Facebook Ads Account',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CAMPAIGN_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Id / Facebook Ads Adset Id',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CAMPAIGN_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Name / Facebook Ads Adset Name',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CAMPAIGN_LABELS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Labels / Facebook Ads Adset labels separate by ","',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => false,
			ResourceFieldConstant::FIELD_OPERATORS => [OperatorEnum::EQUAL],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_DATE_MONTH,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'format : ATOM, day always at 01',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::DATETIME,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_COST,
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::MONEY,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		]
	];
}
