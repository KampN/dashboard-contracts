<?php

namespace Kampn\Dashboard\Service\Util;

use Kampn\Dashboard\Contract\Constant\ResourceFieldConstant;
use Kampn\Dashboard\Contract\Enum\FieldTypeEnum;

class Normalizer {

	public function normalize(iterable $items, array $fields, array $transformers): iterable {
		$fieldsTransformer = [];
		foreach($fields as $field) {
			$name = $field[ResourceFieldConstant::FIELD_NAME];
			$type = $field[ResourceFieldConstant::FIELD_TYPE] ?? FieldTypeEnum::TEXT;
			$fieldsTransformer[$name] = $transformers[$type] ?? null;
		}

		foreach($items as $item) {
			yield $this->normalizeItem($item, $fieldsTransformer);
		}
	}

	public function normalizeItem(array $row, array $fieldsTransformer): array {
		$item = [];

		foreach($row as $key => $value) {
			/** @var TransformerInterface $transformer */
			$transformer = $fieldsTransformer[$key] ?? null;
			$item[$key] = $transformer ? $transformer->get($value) : $value;
		}

		return $item;
	}
}
