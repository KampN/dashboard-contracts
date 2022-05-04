<?php

namespace Kampn\Dashboard\Service\Query\SQL;

use Kampn\Dashboard\Service\Query\Query;

interface ResourceSQLQueryBuilderInterface {

	public const PLATFORM_POSTGRES = 'postgres';
	public const PLATFORM_MYSQL = 'mysql';

	public function getFieldsDefs(): array;

	public function getSegmentDefs(): array;

	public function getAggDefs(): array;

	public function getFrom(Query $query): string;

	public function getPlatform(): string;
}
