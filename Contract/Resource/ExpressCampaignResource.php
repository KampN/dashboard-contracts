<?php

namespace Kampn\Dashboard\Contract\Resource;

use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Enum\FieldTypeEnum;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;
use Kampn\Dashboard\Contract\Enum\ResourceEnum;
use Kampn\Dashboard\Contract\Enum\SourceEnum;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;

interface ExpressCampaignResource extends ResourceInterface
{

    public const RESOURCE_NAME = ResourceEnum::EXPRESS_CAMPAIGN;
    // Allow Dashboard to merge sources from different sources using segment key as pivot
    public const COLLAPSIBLE = false;

    public const SUPPORT_SOURCES = [
        SourceEnum::EXPRESS,
    ];

	public const FIELD_CORE_CLIENT_ID = 'core_client_id';
    public const FIELD_CAMPAIGN_ID = 'campaign_id';
    public const FIELD_OPERATION_ID = 'operation_id';
    public const FIELD_NETWORK_ID = 'network_id';
    public const FIELD_FRANCHISE_ID = 'franchise_id';
    public const FIELD_FRANCHISE_LABEL = 'franchise_label';
    public const FIELD_FRANCHISE_STATUS = 'franchise_status';
    public const FIELD_DATE = 'date';
    public const FIELD_NAME = 'name';
    public const FIELD_NETWORK_NAME = 'network_name';
    public const FIELD_NETWORK_SLUG = 'network_slug';
    public const FIELD_FRANCHISE_NAME = 'franchise_name';
    public const FIELD_OPERATION_NAME = 'operation_name';
    public const FIELD_AD_PLATFORM = 'ad_platform';
    public const FIELD_STATUS = 'status';
    public const FIELD_LEAD_STATUS = 'lead_status';
    public const FIELD_PROVISIONAL_BUDGET = 'provisional_budget';
    public const FIELD_COST = 'cost';
    public const FIELD_IMPRESSIONS = 'impressions';
    public const FIELD_LEAD_CONVERSIONS = 'lead_conversions';
    public const FIELD_LEAD_FORM_CONVERSIONS = 'lead_form_conversions';
    public const FIELD_LEAD_PHONE_CONVERSIONS = 'lead_phone_conversions';
    public const FIELD_LEAD_PLATFORM_CONVERSIONS = 'lead_platform_conversions';
    public const FIELD_CLICKS = 'clicks';
    public const FIELD_INTERACTIONS = 'interactions';

    public const FIELD_BROADCAST_START_DATE = 'broadcast_start_date';
    public const FIELD_BROADCAST_END_DATE = 'broadcast_end_date';
    public const FIELD_DURATION_DAYS = 'duration_days';

    public const FIELD_ALL_LEAD_CONVERSIONS = 'all_lead_conversions';
    public const FIELD_EXTERNAL_LEAD_CONVERSIONS = 'external_lead_conversions';
    public const FIELD_CALL_INTENT = 'call_intent';
    public const FIELD_PAGE_ARRIVALS = 'page_arrivals';
    public const FIELD_COUNT_AD_ACTIVE = 'count_ad_active';
    public const FIELD_COUNT_AD_ERROR = 'count_ad_error';
    public const FIELD_COUNT_ACTIVE_PLATFORM_STRUCTURE = 'count_active_platform_structure';
    public const FIELD_FRANCHISE_BLOCKED = 'franchise_blocked';

    public const FIELDS = [
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CORE_CLIENT_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Kampn core client id',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_CAMPAIGN_ID,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Express campaign id',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_OPERATION_ID,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Express operation id',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
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
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_FRANCHISE_LABEL,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Express franchise label',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_FRANCHISE_STATUS,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Express franchise status',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
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
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_BROADCAST_START_DATE,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'format : ATOM',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::DATETIME,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_BROADCAST_END_DATE,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'format : ATOM',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::DATETIME,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_AD_PLATFORM,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Express Campaign type',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => [OperatorEnum::EQUAL, OperatorEnum::DIFFERENT],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_LEAD_STATUS,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Lead status',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => true,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::TEXT,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
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
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_NETWORK_SLUG,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Express Network Slug',
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
            ResourceFieldConstant::FIELD_NAME       => self::FIELD_PROVISIONAL_BUDGET,
            ResourceFieldConstant::FIELD_IS_SEGMENT => false,
            ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::MONEY,
            ResourceFieldConstant::FIELD_SELECTABLE => true,
            ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME       => self::FIELD_COST,
            ResourceFieldConstant::FIELD_IS_SEGMENT => false,
            ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::MONEY,
            ResourceFieldConstant::FIELD_SELECTABLE => true,
            ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME       => self::FIELD_DURATION_DAYS,
            ResourceFieldConstant::FIELD_IS_SEGMENT => false,
            ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE => true,
            ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME       => self::FIELD_IMPRESSIONS,
            ResourceFieldConstant::FIELD_IS_SEGMENT => false,
            ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE => true,
            ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME       => self::FIELD_CLICKS,
            ResourceFieldConstant::FIELD_IS_SEGMENT => false,
            ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE => true,
            ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME       => self::FIELD_INTERACTIONS,
            ResourceFieldConstant::FIELD_IS_SEGMENT => false,
            ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE => true,
            ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME       => self::FIELD_LEAD_CONVERSIONS,
            ResourceFieldConstant::FIELD_IS_SEGMENT => false,
            ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE => true,
            ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME       => self::FIELD_LEAD_FORM_CONVERSIONS,
            ResourceFieldConstant::FIELD_IS_SEGMENT => false,
            ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE => true,
            ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME       => self::FIELD_LEAD_PHONE_CONVERSIONS,
            ResourceFieldConstant::FIELD_IS_SEGMENT => false,
            ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE => true,
            ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME       => self::FIELD_LEAD_PLATFORM_CONVERSIONS,
            ResourceFieldConstant::FIELD_IS_SEGMENT => false,
            ResourceFieldConstant::FIELD_TYPE       => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE => true,
            ResourceFieldConstant::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_FRANCHISE_BLOCKED,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Franchise blocked state',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::BOOLEAN,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::BOOLEAN],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_COUNT_ACTIVE_PLATFORM_STRUCTURE,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Number of active campaign structure on social/search platform (campaign level)',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_COUNT_AD_ERROR,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Number of ads in error on social/search platform (campaign level)',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_COUNT_AD_ACTIVE,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Number of active ads on social/search platform (campaign level)',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_CALL_INTENT,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'call intent (from landing page)',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_EXTERNAL_LEAD_CONVERSIONS,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'External lead conversions',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_ALL_LEAD_CONVERSIONS,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'All lead conversions',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ],
        [
            ResourceFieldConstant::FIELD_NAME        => self::FIELD_PAGE_ARRIVALS,
            ResourceFieldConstant::FIELD_DESCRIPTION => 'Page arrivals',
            ResourceFieldConstant::FIELD_IS_SEGMENT  => false,
            ResourceFieldConstant::FIELD_TYPE        => FieldTypeEnum::INTEGER,
            ResourceFieldConstant::FIELD_SELECTABLE  => true,
            ResourceFieldConstant::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
        ]
    ];

}
