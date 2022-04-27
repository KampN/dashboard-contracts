<?php

namespace Kampn\Dashboard\Service\Query;

use Kampn\Dashboard\Contract\Constant\QueryConstant;

class Query {

	protected string $resourceName;

	protected array $segments = [];

	protected ?\DateTime $startDate = null;

	protected ?\DateTime $endDate = null;

	protected array $filters = [];

	public static function build(array $request): self {
		$query = new self();

		$resourceName = $request[QueryConstant::RESOURCE];
		$query->setResourceName($resourceName);

		$segments = $request[QueryConstant::SEGMENTS];
		$query->setSegments($segments);

		$startDate = $request[QueryConstant::START_DATE] ?? null;
		if($startDate)
			$query->setStartDate(\DateTime::createFromFormat(DATE_ATOM, $startDate));

		$endDate = $request[QueryConstant::END_DATE] ?? null;
		if($endDate)
			$query->setEndDate(\DateTime::createFromFormat(DATE_ATOM, $endDate));

		$filters = $request[QueryConstant::FILTERS] ?? null;
		if($filters)
			$query->setFilters(FiltersEncoder::decode($filters));

		return $query;
	}

	public function getResourceName(): string {
		return $this->resourceName;
	}

	public function setResourceName(string $resourceName): void {
		$this->resourceName = $resourceName;
	}

	public function getSegments(): array {
		return $this->segments;
	}

	public function setSegments(array $segments): void {
		$this->segments = $segments;
	}

	public function getStartDate(): ?\DateTime {
		return $this->startDate;
	}

	public function setStartDate(?\DateTime $startDate): void {
		$this->startDate = $startDate;
	}

	public function getEndDate(): ?\DateTime {
		return $this->endDate;
	}

	public function setEndDate(?\DateTime $endDate): void {
		$this->endDate = $endDate;
	}

	public function getFilters(): array {
		return $this->filters;
	}

	public function setFilters(array $filters): void {
		$this->filters = $filters;
	}
}