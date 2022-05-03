<?php

namespace Kampn\Dashboard\Service\Query\SQL;

class AliasGenerator {

	protected string $seed;

	protected ?string $current = null;

	public function __construct($seed = 'aaa') {
		$this->seed = $seed;
		$this->reset();
	}

	public function get(): string {
		return $this->current++;
	}

	public function reset(): void {
		$this->current = $this->seed;
	}

	public function iterate(?int $limit = null, bool $reset = false): \Generator {
		if($reset) $this->reset();
		$i = 0;

		while(true) {
			if($limit !== null && $i >= $limit) return $this->get();
			yield $this->get() . $i;
			$i++;
		}
	}

}
