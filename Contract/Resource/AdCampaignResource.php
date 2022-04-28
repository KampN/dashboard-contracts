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

	public const FIELDS = [
		[
			ResourceFieldConstant::FIELD_NAME        => 'ad_campaign_id',
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Id / Facebook Ads Adset Id',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => 'date',
			ResourceFieldConstant::FIELD_DESCRIPTION => 'format : ATOM',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::DATETIME,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => 'name',
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Name / Facebook Ads Campaign + Adset Names.',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => 'status',
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Status / Facebook Ads Adset Status. Allowed values are "ENABLED" & "PAUSED"',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => [OperatorEnum::EQUAL, OperatorEnum::DIFFERENT],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => 'start_date',
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign Start Date / Facebook Ads Adset Start Date. format : ATOM',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::DATETIME,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => 'end_date',
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Google Ads Campaign End Date / Facebook Ads Adset End Date. format : ATOM',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::DATETIME,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceFieldConstant::FIELD_NAME       => 'cost',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::MONEY,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceFieldConstant::FIELD_NAME       => 'impressions',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::NUMERIC,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceFieldConstant::FIELD_NAME       => 'conv_Value',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::NUMERIC,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceFieldConstant::FIELD_NAME       => 'conversions',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::NUMERIC,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceFieldConstant::FIELD_NAME       => 'clicks',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::NUMERIC,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		]
	];

}
