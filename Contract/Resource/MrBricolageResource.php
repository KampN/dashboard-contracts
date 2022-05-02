<?php

namespace Kampn\Dashboard\Contract\Resource;

use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Enum\FieldTypeEnum;
use Kampn\Dashboard\Contract\Enum\ResourceEnum;
use Kampn\Dashboard\Contract\Enum\SourceEnum;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;

interface MrBricolageResource extends ResourceInterface {

	public const RESOURCE_NAME = ResourceEnum::MR_BRICOLAGE;
	// Allow Dashboard to merge sources from different sources using segment key as pivot
	public const COLLAPSIBLE = true;

	public const SUPPORT_SOURCES = [
		SourceEnum::GOOGLE_ADS,
		SourceEnum::FACEBOOK_ADS,
	];

	public const FIELD_OPERATION_NAME = 'operation_name';
	public const FIELD_SHOP_ID = 'shop_id';
	public const FIELD_AD_CAMPAIGN_ID = 'ad_campaign_id';
	public const FIELD_DATE = 'date';
	public const FIELD_NAME = 'name';
	public const FIELD_START_DATE = 'start_date';
	public const FIELD_END_DATE = 'end_date';
	public const FIELD_COST = 'cost';
	public const FIELD_IMPRESSIONS = 'impressions';
	public const FIELD_CONV_VALUE = 'conv_Value';
	public const FIELD_CONVERSIONS = 'conversions';
	public const FIELD_CLICKS = 'clicks';

	public const FIELDS = [
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_OPERATION_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Mr Bricolage Operation name',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_SHOP_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Mr Bricolage Shop Id',
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
			ResourceFieldConstant::FIELD_NAME => self::FIELD_START_DATE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Operation start date, format : ATOM',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::DATETIME,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_END_DATE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Operation end date, format : ATOM',
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
