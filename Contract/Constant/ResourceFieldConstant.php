<?php

namespace Kampn\Dashboard\Contract\Constant;


use Kampn\Dashboard\Contract\Enum\FieldTypeEnum;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;

class ResourceFieldConstant {

	public const DATE_FORMAT = \DateTime::ATOM;
	public const TIMEZONE = \DateTimeZone::UTC;

	public const FIELD_NAME = 'name';
	public const FIELD_DESCRIPTION = 'description';
	public const FIELD_IS_SEGMENT = 'is_segment';
	public const FIELD_TYPE = 'type';
	public const FIELD_SELECTABLE = 'selectable';
	public const FIELD_OPERATORS = 'operators';

	public const DEFAULT_TYPE_OPERATORS = [
		FieldTypeEnum::TEXT     => [
			OperatorEnum::EQUAL,
			OperatorEnum::DIFFERENT,
			OperatorEnum::LIKE,
			OperatorEnum::NOT_LIKE,
			OperatorEnum::IN,
			OperatorEnum::NOT_IN,
		],
		FieldTypeEnum::INTEGER => [
			OperatorEnum::EQUAL,
			OperatorEnum::DIFFERENT,
			OperatorEnum::GREATER_OR_EQUAL_THAN,
			OperatorEnum::GREATER_THAN,
			OperatorEnum::LOWER_OR_EQUAL_THAN,
			OperatorEnum::LOWER_THAN,
			OperatorEnum::IN,
			OperatorEnum::NOT_IN,
			OperatorEnum::BETWEEN,
			OperatorEnum::NOT_BETWEEN
		],
		FieldTypeEnum::DATETIME => [
			OperatorEnum::EQUAL,
			OperatorEnum::DIFFERENT,
			OperatorEnum::GREATER_OR_EQUAL_THAN,
			OperatorEnum::GREATER_THAN,
			OperatorEnum::LOWER_OR_EQUAL_THAN,
			OperatorEnum::LOWER_THAN,
			OperatorEnum::BETWEEN,
			OperatorEnum::NOT_BETWEEN
		]
	];

}
