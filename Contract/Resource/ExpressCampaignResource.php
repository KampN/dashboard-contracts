<?php

namespace Kampn\Dashboard\Contract\Resource;


use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Enum\FieldTypeEnum;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;
use Kampn\Dashboard\Contract\Enum\ResourceEnum;
use Kampn\Dashboard\Contract\Enum\SourceEnum;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;

interface ExpressCampaignResource extends ResourceInterface {

	public const RESOURCE_NAME = ResourceEnum::EXPRESS_CAMPAIGN;
	// Allow Dashboard to merge sources from different sources using segment key as pivot
	public const COLLAPSIBLE = true;

	public const SUPPORT_SOURCES = [
		SourceEnum::GOOGLE_ADS,
		SourceEnum::FACEBOOK_ADS,
		SourceEnum::EXPRESS,
	];

	public const FIELDS = [
		[
			ResourceInterface::FIELD_NAME        => 'express_campaign_id',
			ResourceInterface::FIELD_DESCRIPTION => 'Express campaign id',
			ResourceInterface::FIELD_IS_SEGMENT  => true,
			ResourceInterface::FIELD_TYPE        => FieldTypeEnum::TEXT,
			ResourceInterface::FIELD_SELECTABLE  => true,
			ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceInterface::FIELD_NAME        => 'date',
			ResourceInterface::FIELD_DESCRIPTION => 'format : ATOM',
			ResourceInterface::FIELD_IS_SEGMENT  => true,
			ResourceInterface::FIELD_TYPE        => FieldTypeEnum::DATETIME,
			ResourceInterface::FIELD_SELECTABLE  => true,
			ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceInterface::FIELD_NAME        => 'name',
			ResourceInterface::FIELD_DESCRIPTION => 'Express Campaign Name',
			ResourceInterface::FIELD_IS_SEGMENT  => false,
			ResourceInterface::FIELD_TYPE        => FieldTypeEnum::TEXT,
			ResourceInterface::FIELD_SELECTABLE  => true,
			ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceInterface::FIELD_NAME        => 'status',
			ResourceInterface::FIELD_DESCRIPTION => 'Express Campaign status',
			ResourceInterface::FIELD_IS_SEGMENT  => false,
			ResourceInterface::FIELD_TYPE        => FieldTypeEnum::TEXT,
			ResourceInterface::FIELD_SELECTABLE  => true,
			ResourceInterface::FIELD_OPERATORS   => [OperatorEnum::EQUAL, OperatorEnum::DIFFERENT],
		],
		[
			ResourceInterface::FIELD_NAME       => 'cost',
			ResourceInterface::FIELD_IS_SEGMENT => false,
			ResourceInterface::FIELD_TYPE       => FieldTypeEnum::MONEY,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceInterface::FIELD_NAME       => 'impressions',
			ResourceInterface::FIELD_IS_SEGMENT => false,
			ResourceInterface::FIELD_TYPE       => FieldTypeEnum::NUMERIC,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceInterface::FIELD_NAME       => 'lead_conversions',
			ResourceInterface::FIELD_IS_SEGMENT => false,
			ResourceInterface::FIELD_TYPE       => FieldTypeEnum::NUMERIC,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceInterface::FIELD_NAME       => 'clicks',
			ResourceInterface::FIELD_IS_SEGMENT => false,
			ResourceInterface::FIELD_TYPE       => FieldTypeEnum::NUMERIC,
			ResourceInterface::FIELD_SELECTABLE => true,
			ResourceInterface::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		]
	];

}
