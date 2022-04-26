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
			ResourceInterface::FIELD_NAME => 'ad_campaign_id',
			ResourceInterface::FIELD_DESCRIPTION => 'Google Ads Campaign Id / Facebook Ads Adset Id',
			ResourceInterface::FIELD_IS_SEGMENT => true,
			ResourceInterface::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceInterface::FIELD_NAME => 'date',
			ResourceInterface::FIELD_DESCRIPTION => 'format : ATOM',
			ResourceInterface::FIELD_IS_SEGMENT => true,
			ResourceInterface::FIELD_TYPE => FieldTypeEnum::DATETIME,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceInterface::FIELD_NAME => 'name',
			ResourceInterface::FIELD_DESCRIPTION => 'Google Ads Campaign Name / Facebook Ads Campaign + Adset Names.',
			ResourceInterface::FIELD_IS_SEGMENT => false,
			ResourceInterface::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceInterface::FIELD_NAME => 'status',
			ResourceInterface::FIELD_DESCRIPTION => 'Google Ads Campaign Status / Facebook Ads Adset Status. Allowed values are "ENABLED" & "PAUSED"',
			ResourceInterface::FIELD_IS_SEGMENT => false,
			ResourceInterface::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS => [OperatorEnum::EQUAL, OperatorEnum::DIFFERENT],
		],
		[
			ResourceInterface::FIELD_NAME => 'start_date',
			ResourceInterface::FIELD_DESCRIPTION => 'Google Ads Campaign Start Date / Facebook Ads Adset Start Date. format : ATOM',
			ResourceInterface::FIELD_IS_SEGMENT => true,
			ResourceInterface::FIELD_TYPE => FieldTypeEnum::DATETIME,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceInterface::FIELD_NAME => 'end_date',
			ResourceInterface::FIELD_DESCRIPTION => 'Google Ads Campaign End Date / Facebook Ads Adset End Date. format : ATOM',
			ResourceInterface::FIELD_IS_SEGMENT => true,
			ResourceInterface::FIELD_TYPE => FieldTypeEnum::DATETIME,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceInterface::FIELD_NAME => 'cost',
			ResourceInterface::FIELD_IS_SEGMENT => false,
			ResourceInterface::FIELD_TYPE => FieldTypeEnum::NUMERIC,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceInterface::FIELD_NAME => 'impressions',
			ResourceInterface::FIELD_IS_SEGMENT => false,
			ResourceInterface::FIELD_TYPE => FieldTypeEnum::NUMERIC,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceInterface::FIELD_NAME => 'conv_Value',
			ResourceInterface::FIELD_IS_SEGMENT => false,
			ResourceInterface::FIELD_TYPE => FieldTypeEnum::NUMERIC,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceInterface::FIELD_NAME => 'conversions',
			ResourceInterface::FIELD_IS_SEGMENT => false,
			ResourceInterface::FIELD_TYPE => FieldTypeEnum::NUMERIC,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceInterface::FIELD_NAME => 'clicks',
			ResourceInterface::FIELD_IS_SEGMENT => false,
			ResourceInterface::FIELD_TYPE => FieldTypeEnum::NUMERIC,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		]
	];

}
