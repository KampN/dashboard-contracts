<?php

namespace Kampn\Dashboard\Service\Query;

use Kampn\Dashboard\Service\Exception\FilterException;

class FiltersReader {
	public static function encode(array $data) {
		$serialized = base64_encode(\json_encode($data, JSON_THROW_ON_ERROR));
		return urlencode($serialized);
	}

	public static function decode(?string $token = null) {
		$data = null;

		if($token !== null) {
			$token = urldecode($token);
			$data = base64_decode($token, true);
		}

		try {
			return $data === null ? null : \json_decode($data, true, 512, JSON_THROW_ON_ERROR);
		} catch(\Exception $e) {
			throw new FilterException('error when decoding');
		}
	}
}