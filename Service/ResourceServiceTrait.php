<?php

namespace Kampn\Dashboard\Service;

use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;

trait ResourceServiceTrait {
	public static function getResourceName(): string {
		return self::RESOURCE_NAME;
	}

	public static function getServiceLocatorAlias(): string {
		return self::buildServiceName(self::getResourceName(), self::getServiceType());
	}

	public static function buildServiceName(string $resourceName, string $type): string {
		return "kampn.dashboard." . $resourceName . '.service.' . $type;
	}

	public function getFields(): array {
		return self::FIELDS;
	}

	public function getField(string $fieldName): ?array {
		foreach($this->getFields() as $field)
			if($field[ResourceInterface::FIELD_NAME] === $fieldName)
				return $field;

		return null;
	}

	public function getSegments(): array {
		return array_filter(
			$this->getFields(),
			fn($field) => ($field[ResourceInterface::FIELD_IS_SEGMENT] ?? false) === true
		);
	}

	public function getSegment(string $segment): ?array {
		foreach($this->getFields() as $field) {
			if($field[ResourceInterface::FIELD_NAME] === $segment
				&& ($field[ResourceInterface::FIELD_IS_SEGMENT] ?? false) === true)
				return $field;
		}

		return null;
	}
}