<?php

namespace Kampn\Dashboard\Contract\Resource;

use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Enum\FieldTypeEnum;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;
use Kampn\Dashboard\Contract\Enum\ResourceEnum;
use Kampn\Dashboard\Contract\Enum\SourceEnum;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;

interface KafoutcheExpressLeadResource extends ResourceInterface {

	public const RESOURCE_NAME = ResourceEnum::EXPRESS_LEAD;
	public const COLLAPSIBLE = false;

	public const SUPPORT_SOURCES = [
		SourceEnum::EXPRESS,
	];

	public const FIELD_OPERATION_ID = 'operation_id';
	public const FIELD_OPERATION_NAME = 'operation_name';
	public const FIELD_OPERATION_TYPE = 'operation_type';

	public const FIELD_NETWORK_ID = 'network_id';
	public const FIELD_NETWORK_NAME = 'network_name';
	public const FIELD_NETWORK_SLUG = 'network_slug';

	public const FIELD_FRANCHISE_ID = 'franchise_id';
	public const FIELD_FRANCHISE_NAME = 'franchise_name';
	public const FIELD_FRANCHISE_STATUS = 'franchise_status';

	public const FIELD_CAMPAIGN_ID = 'campaign_name';
	public const FIELD_CAMPAIGN_NAME = 'campaign_name';
	public const FIELD_CAMPAIGN_STATUS = 'campaign_status';

	public const FIELD_DATE = 'date';
	public const FIELD_FRANCHISE_LABEL = 'franchise_label';
	public const FIELD_AD_PLATFORM = 'ad_platform';

	public const FIELD_LEAD_STATUS = 'lead_status';
	public const FIELD_LEAD_STATUS_LABEL = 'lead_status_label';
	public const FIELD_NB_LEADS = 'nb_leads';

	public const FIELDS = [
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_DATE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'format : ATOM',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::DATETIME,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CAMPAIGN_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express campaign id',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_OPERATION_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express operation id',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NETWORK_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express network id',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_FRANCHISE_ID,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express franchise id',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_FRANCHISE_LABEL,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express franchise label',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_AD_PLATFORM,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express Campaign type',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => [OperatorEnum::EQUAL, OperatorEnum::DIFFERENT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_OPERATION_TYPE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express operation type',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NETWORK_SLUG,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express network slug',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NETWORK_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express network name',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_FRANCHISE_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express franchise name',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CAMPAIGN_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express campaign name',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_FRANCHISE_STATUS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express franchise status',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_CAMPAIGN_STATUS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express campaign status',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_OPERATION_NAME,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'Express operation name',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_LEAD_STATUS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'lead status',
			ResourceFieldConstant::FIELD_IS_SEGMENT => true,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_LEAD_STATUS_LABEL,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'lead status label',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::TEXT,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_PENDING_LEADS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'number of leads in pending status',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_PROCESSED_LEADS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'number of leads in processed status',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_LEADS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'total number of leads',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_PENDING_LP,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'number of Landing Pages leads in pending status',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_PROCESSED_LP,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'number of Landing Pages leads in processed status',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_LEADS_LP,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'total number of Landing Pages leads',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_PENDING_PHONE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'number of Phone leads in pending status',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_PROCESSED_PHONE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'number of Phone leads in processed status',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_LEADS_PHONE,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'total number of Phone leads',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_PENDING_PLATFORM,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'number of Platform leads in pending status',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_PROCESSED_PLATFORM,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'number of Platform leads in processed status',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_LEADS_PLATFORM,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'total number of Platform leads',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
		[
			ResourceFieldConstant::FIELD_NAME => self::FIELD_NB_EXTERNAL_LEADS,
			ResourceFieldConstant::FIELD_DESCRIPTION => 'total number of external leads',
			ResourceFieldConstant::FIELD_IS_SEGMENT => false,
			ResourceFieldConstant::FIELD_TYPE => FieldTypeEnum::INTEGER,
			ResourceFieldConstant::FIELD_SELECTABLE => true,
			ResourceFieldConstant::FIELD_OPERATORS => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::INTEGER],
		],
	];

}










