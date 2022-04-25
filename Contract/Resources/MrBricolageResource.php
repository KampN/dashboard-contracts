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
				ResourceInterface::FIELD_NAME        => 'cost',
				ResourceInterface::FIELD_DESCRIPTION => 'Mr Bricolage Operation name',
				ResourceInterface::FIELD_IS_SEGMENT  => false,
				ResourceInterface::FIELD_TYPE        => FieldTypeEnum::TEXT,
				ResourceInterface::FIELD_SELECTABLE  => true,
				ResourceInterface::FIELD_OPERATORS   => ResourceFieldConstant::DEFAULT_TYPE_OPERATORS[FieldTypeEnum::TEXT],
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
