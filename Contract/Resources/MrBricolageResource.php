<?php

namespace Kampn\Dashboard\Contract\Resources;


use Kampn\Dashboard\Contract\Constants\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Enums\FieldTypeEnum;
use Kampn\Dashboard\Contract\Enums\SourceEnum;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;

class MrBricolageResource implements ResourceInterface {

	public function getFields(): array {
		return [
			[
				ResourceInterface::FIELD_NAME        => 'operation_name',
				ResourceInterface::FIELD_DESCRIPTION => 'Mr Bricolage Operation name',
				ResourceInterface::FIELD_IS_SEGMENT  => true,
				ResourceInterface::FIELD_TYPE        => FieldTypeEnum::TEXT,
				ResourceInterface::FIELD_SELECTABLE  => true,
				ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
			],
			[
				ResourceInterface::FIELD_NAME        => 'shop_id',
				ResourceInterface::FIELD_DESCRIPTION => 'Mr Bricolage Shop Id',
				ResourceInterface::FIELD_IS_SEGMENT  => true,
				ResourceInterface::FIELD_TYPE        => FieldTypeEnum::TEXT,
				ResourceInterface::FIELD_SELECTABLE  => true,
				ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
			],
			[
				ResourceInterface::FIELD_NAME        => 'start_date',
				ResourceInterface::FIELD_DESCRIPTION => 'Operation start date, format : ATOM',
				ResourceInterface::FIELD_IS_SEGMENT  => true,
				ResourceInterface::FIELD_TYPE        => FieldTypeEnum::DATETIME,
				ResourceInterface::FIELD_SELECTABLE  => true,
				ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
			],
			[
				ResourceInterface::FIELD_NAME       => 'date',
				ResourceInterface::FIELD_DESCRIPTION => 'format : ATOM',
				ResourceInterface::FIELD_IS_SEGMENT => true,
				ResourceInterface::FIELD_TYPE       => FieldTypeEnum::DATETIME,
				ResourceInterface::FIELD_SELECTABLE => true,
				ResourceInterface::FIELD_OPERATORS  => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
			],
			[
				ResourceInterface::FIELD_NAME        => 'end_date',
				ResourceInterface::FIELD_DESCRIPTION => 'Operation end date, format : ATOM',
				ResourceInterface::FIELD_IS_SEGMENT  => true,
				ResourceInterface::FIELD_TYPE        => FieldTypeEnum::DATETIME,
				ResourceInterface::FIELD_SELECTABLE  => true,
				ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::DATETIME],
			],
			[
				ResourceInterface::FIELD_NAME        => 'cost',
				ResourceInterface::FIELD_IS_SEGMENT  => false,
				ResourceInterface::FIELD_TYPE        => FieldTypeEnum::NUMERIC,
				ResourceInterface::FIELD_SELECTABLE  => true,
				ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
			],
			[
				ResourceInterface::FIELD_NAME        => 'impressions',
				ResourceInterface::FIELD_IS_SEGMENT  => false,
				ResourceInterface::FIELD_TYPE        => FieldTypeEnum::NUMERIC,
				ResourceInterface::FIELD_SELECTABLE  => true,
				ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
			],
			[
				ResourceInterface::FIELD_NAME        => 'conv_Value',
				ResourceInterface::FIELD_IS_SEGMENT  => false,
				ResourceInterface::FIELD_TYPE        => FieldTypeEnum::NUMERIC,
				ResourceInterface::FIELD_SELECTABLE  => true,
				ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
			],
			[
				ResourceInterface::FIELD_NAME        => 'conversions',
				ResourceInterface::FIELD_IS_SEGMENT  => false,
				ResourceInterface::FIELD_TYPE        => FieldTypeEnum::NUMERIC,
				ResourceInterface::FIELD_SELECTABLE  => true,
				ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
			],
			[
				ResourceInterface::FIELD_NAME        => 'clicks',
				ResourceInterface::FIELD_IS_SEGMENT  => false,
				ResourceInterface::FIELD_TYPE        => FieldTypeEnum::NUMERIC,
				ResourceInterface::FIELD_SELECTABLE  => true,
				ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::NUMERIC],
			]
		];
	}

	public function getSupportSources(): array {
		return [
			SourceEnum::GOOGLE_ADS,
			SourceEnum::FACEBOOK_ADS,
		];
	}


	public function getResourceName(): string {
		return 'mr_bricolage';
	}

}
