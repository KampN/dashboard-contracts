<?php

namespace Kampn\Dashboard\Service\Query\SQL;

interface ResourceSQLQueryBuilderInterface {

	public function getFieldsDefs(): array;

	public function getSegmentDefs(): array;

	public function getAggDefs(): array;

	public function getFrom(): string;
}