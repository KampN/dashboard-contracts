<?php

namespace Kampn\Dashboard\Service\Query\SQL;

interface ResourceSQLQueryBuilderInterface {

	public const PLATFORM_POSTGRES = 'posgres';
	public const PLATFORM_MYSQL = 'mysql';

	public function getFieldsDefs(): array;

	public function getSegmentDefs(): array;

	public function getAggDefs(): array;

	public function getFrom(): string;

	public function getPlatform(): string;
}