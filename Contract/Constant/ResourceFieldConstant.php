<?php

namespace Kampn\Dashboard\Contract\Constant;


use Kampn\Dashboard\Contract\Enum\FieldTypeEnum;
use Kampn\Dashboard\Contract\Enum\OperatorEnum;

class ResourceFieldConstant {

	public const DATE_FORMAT = \DateTime::ATOM;
	public const TIMEZONE = \DateTimeZone::UTC;

	public const DEFAULT_TYPE_OPERATORS = [
		FieldTypeEnum::TEXT     => [
			OperatorEnum::Equal,
			OperatorEnum::Different,
			OperatorEnum::Like,
			OperatorEnum::NotLike
		],
		FieldTypeEnum::NUMERIC  => [
			OperatorEnum::Equal,
			OperatorEnum::Different,
			OperatorEnum::GreaterOrEqualThan,
			OperatorEnum::GreaterThan,
			OperatorEnum::LowerOrEqualThan,
			OperatorEnum::LowerThan
		],
		FieldTypeEnum::DATETIME => [
			OperatorEnum::Equal,
			OperatorEnum::Different,
			OperatorEnum::GreaterOrEqualThan,
			OperatorEnum::GreaterThan,
			OperatorEnum::LowerOrEqualThan,
			OperatorEnum::LowerThan
		]
	];

}
