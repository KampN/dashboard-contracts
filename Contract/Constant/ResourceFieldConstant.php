<?php

namespace Kampn\Dashboard\Contract\Constant;


use Kampn\Dashboard\Contract\Enum\FieldTypeEnum;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;

class ResourceFieldConstant {

	public const DATE_FORMAT = \DateTime::ATOM;
	public const TIMEZONE = \DateTimeZone::UTC;

	public const DEFAULT_TYPE_OPERATORS = [
		FieldTypeEnum::TEXT     => [
			OperatorEnum::EQUAL,
			OperatorEnum::DIFFERENT,
			OperatorEnum::LIKE,
			OperatorEnum::NOT_LIKE
		],
		FieldTypeEnum::NUMERIC  => [
			OperatorEnum::EQUAL,
			OperatorEnum::DIFFERENT,
			OperatorEnum::GREATER_OR_EQUAL_THAN,
			OperatorEnum::GREATER_THAN,
			OperatorEnum::LOWER_OR_EQUAL_THAN,
			OperatorEnum::LOWER_THAN
		],
		FieldTypeEnum::DATETIME => [
			OperatorEnum::EQUAL,
			OperatorEnum::DIFFERENT,
			OperatorEnum::GREATER_OR_EQUAL_THAN,
			OperatorEnum::GREATER_THAN,
			OperatorEnum::LOWER_OR_EQUAL_THAN,
			OperatorEnum::LOWER_THAN
		]
	];

}
