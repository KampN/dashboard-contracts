<?php

namespace Kampn\Dashboard\Service;

use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Service\Util\ServiceNameBuilder;

trait ResourceServiceTrait {
	public static function getResourceName(): string {
		return static::RESOURCE_NAME;
	}

	public static function getServiceLocatorAlias(): string {
		return self::buildServiceName(static::getResourceName(), static::getServiceType());
	}

	public static function buildServiceName(string $resourceName, string $type): string {
		return ServiceNameBuilder::build($resourceName, $type);
	}

	public function getFields(): array {
		return static::FIELDS;
	}

	public function getField(string $fieldName): ?array {
		foreach($this->getFields() as $field)
			if($field[ResourceFieldConstant::FIELD_NAME] === $fieldName)
				return $field;

		return null;
	}

	public function getSegments(): array {
		return array_filter(
			$this->getFields(),
			fn($field) => ($field[ResourceFieldConstant::FIELD_IS_SEGMENT] ?? false) === true
		);
	}

	public function getSegment(string $segment): ?array {
		foreach($this->getFields() as $field) {
			if($field[ResourceFieldConstant::FIELD_NAME] === $segment
				&& ($field[ResourceFieldConstant::FIELD_IS_SEGMENT] ?? false) === true)
				return $field;
		}

		return null;
	}
}
