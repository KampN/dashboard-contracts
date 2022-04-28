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

	public const FIELD_EXPRESS_CAMPAIGN_ID = 'express_campaign_id';
	public const FIELD_NETWORK_ID = 'network_id';
	public const FIELD_FRANCHISE_ID = 'franchise_id';
	public const FIELD_DATE = 'date';
	public const FIELD_NAME = 'name';
	public const FIELD_NETWORK_NAME = 'network_name';
	public const FIELD_FRANCHISE_NAME = 'franchise_name';
	public const FIELD_STATUS = 'status';
	public const FIELD_COST = 'cost';
	public const FIELD_IMPRESSIONS = 'impressions';
	public const FIELD_LEAD_CONVERSIONS = 'lead_conversions';
	public const FIELD_CLICKS = 'clicks';

	public const FIELDS = [
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_EXPRESS_CAMPAIGN_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express campaign id',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::NUMERIC,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_NETWORK_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express network id',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::NUMERIC,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_FRANCHISE_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express franchise id',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::NUMERIC,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_DATE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'format : ATOM',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::DATETIME,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express Campaign Name',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_NETWORK_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express Network Name',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_FRANCHISE_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express Franchise Name',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_STATUS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express Campaign status',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => [OperatorEnum::EQUAL, OperatorEnum::DIFFERENT],
		],
		[
			ResourceFieldConstant::FIELD_NAME       => self::FIELD_COST,
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::MONEY,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceFieldConstant::FIELD_NAME       => self::FIELD_IMPRESSIONS,
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::NUMERIC,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceFieldConstant::FIELD_NAME       => self::FIELD_LEAD_CONVERSIONS,
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::NUMERIC,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		],
		[
			ResourceFieldConstant::FIELD_NAME       => self::FIELD_CLICKS,
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::NUMERIC,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
		]
	];

}
