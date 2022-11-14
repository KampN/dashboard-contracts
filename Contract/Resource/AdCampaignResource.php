<?php

namespace Kampn\Dashboard\Contract\Resource;


use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Enum\FieldTypeEnum;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;
use Kampn\Dashboard\Contract\Enum\ResourceEnum;
use Kampn\Dashboard\Contract\Enum\SourceEnum;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;

interface AdCampaignResource extends ResourceInterface {

	public const RESOURCE_NAME = ResourceEnum::AD_CAMPAIGN;
	// Allow Dashboard to merge sources from different sources using segment key as pivot
	public const COLLAPSIBLE = false;

	public const SUPPORT_SOURCES = [
		SourceEnum::GOOGLE_ADS,
		SourceEnum::FACEBOOK_ADS,
	];

	public const FIELD_AD_CAMPAIGN_ID = 'ad_campaign_id';
	public const FIELD_AD_CAMPAIGN_LABELS = 'ad_campaign_labels';
	public const FIELD_AD_ACCOUNT_ID = 'ad_account_id';
	public const FIELD_AD_ACCOUNT_NAME = 'ad_account_name';
	public const FIELD_DATE = 'date';
	public const FIELD_NAME = 'name';
	public const FIELD_STATUS = 'status';
	public const FIELD_START_DATE = 'start_date';
	public const FIELD_END_DATE = 'end_date';
	public const FIELD_COST = 'cost';
	public const FIELD_IMPRESSIONS = 'impressions';
	public const FIELD_CONV_VALUE = 'conv_value';
	public const FIELD_CONVERSIONS = 'conversions';
	public const FIELD_CLICKS = 'clicks';

	public const FIELDS = [
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_AD_ACCOUNT_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Search / Social Account Id',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_AD_ACCOUNT_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Account Name / Facebook Ads Account',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_AD_CAMPAIGN_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Id / Facebook Ads Adset Id',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_AD_CAMPAIGN_LABELS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Labels / Facebook Ads Adset labels',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => false,
			ResourceFieldConstant::FIELD_OPERATORS => [OperatorEnum::EQUAL],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_DATE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'format : ATOM',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::DATETIME,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Name / Facebook Ads Campaign + Adset Names.',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_STATUS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Status / Facebook Ads Adset Status. Allowed values are "ENABLED" & "PAUSED"',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => [OperatorEnum::EQUAL, OperatorEnum::DIFFERENT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_START_DATE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Start Date / Facebook Ads Adset Start Date. format : ATOM',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::DATETIME,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_END_DATE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign End Date / Facebook Ads Adset End Date. format : ATOM',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
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
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_IMPRESSIONS,
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CONV_VALUE,
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CONVERSIONS,
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CLICKS,
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		]
	];

}
