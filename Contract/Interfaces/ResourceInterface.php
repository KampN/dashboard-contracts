<?php

namespace Kampn\Dashboard\Contract\Interfaces;

use Kampn\Dashboard\Service\Query\Query;

interface ResourceInterface {

	public const FIELD_NAME = 'name';
	public const FIELD_DESCRIPTION = 'description';
	public const FIELD_IS_SEGMENT = 'is_segment';
	public const FIELD_TYPE = 'type';
	public const FIELD_SELECTABLE = 'selectable';
	public const FIELD_OPERATORS = 'operators';

	public const SERVICE_TYPE_ROWS = 'rows';
	public const SERVICE_TYPE_TOTAL = 'total';

	public static function getResourceName(): string;

	public static function getServiceType(): string;

	public static function getServiceLocatorAlias(): string;

	public function process(Query $query): array;
}
