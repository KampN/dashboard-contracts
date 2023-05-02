<?php

namespace Kampn\Dashboard\Contract\Resource;

use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Enum\FieldTypeEnum;
use Kampn\Dashboard\Contract\Enum\ResourceEnum;
use Kampn\Dashboard\Contract\Enum\SourceEnum;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;

interface ExpressCampaignHistoryResource extends ResourceInterface {

	public const RESOURCE_NAME = ResourceEnum::EXPRESS_CAMPAIGN_HISTORY;
	public const COLLAPSIBLE = false;

	public const SUPPORT_SOURCES = [
		SourceEnum::EXPRESS,
	];

	public const FIELD_DATE = 'date';
	public const FIELD_MONTH = 'month';
	public const FIELD_YEAR = 'year';
	public const FIELD_NETWORK_ID = 'network_id';
	public const FIELD_NETWORK_NAME = 'network_name';
	public const FIELD_FRANCHISE_ID = 'franchise_id';
	public const FIELD_FRANCHISE_NAME = 'franchise_name';
	public const FIELD_OPERATION_ID = 'operation_id';
	public const FIELD_OPERATION_NAME = 'operation_name';
	public const FIELD_OPERATION_TYPE = 'operation_type';
	public const FIELD_NB_ACTIVE_CAMPAIGNS = 'nb_active_campaigns';
	public const FIELD_NB_NEW_CAMPAIGNS = 'nb_new_campaigns';
	public const FIELD_NB_DONE_CAMPAIGNS = 'nb_done_campaigns';
	public const FIELD_MOST_COMMON_MEDIA = 'most_common_media';

	public const FIELDS = [
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_OPERATION_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express operation id',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_OPERATION_TYPE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express operation type',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_NETWORK_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express network id',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_FRANCHISE_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express franchise id',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
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
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_YEAR,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'format : ATOM',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::DATETIME,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_MONTH,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'format : ATOM',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::DATETIME,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
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
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_OPERATION_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express Operation Name',
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
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_NB_ACTIVE_CAMPAIGNS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Number of active campaigns',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_NB_NEW_CAMPAIGNS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Number of new campaigns',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_NB_DONE_CAMPAIGNS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Number of done campaigns',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME        => self::FIELD_MOST_COMMON_MEDIA,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Most common media chosen',
			ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
			ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::MONEY,
			ResourceFieldConstant::FIELD_SELECTABLE  => true,
			ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::MONEY],
		],
	];

}













