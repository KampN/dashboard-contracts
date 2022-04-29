<?php

namespace Kampn\Dashboard\Contract\Interfaces;

use Kampn\Dashboard\Service\Query\Query;

interface ResourceInterface {

	public static function getResourceName(): string;

	public static function getServiceType(): string;

	public static function getServiceLocatorAlias(): string;

	public function process(Query $query): array;

	public function getFields(): array;

	public function getField(string $fieldName): ?array;

	public function getSegments(): array;

	public function getSegment(string $segment): ?array;

}
