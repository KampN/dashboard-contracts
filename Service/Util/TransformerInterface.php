<?php

namespace Kampn\Dashboard\Service\Util;

interface TransformerInterface {
	/**
	 * @param mixed $value
	 * @return mixed
	 */
	public function get($value);

}
