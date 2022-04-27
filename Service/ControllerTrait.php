<?php

namespace Kampn\Dashboard\Service;

use Kampn\Dashboard\Service\Enum\ResponseTypeEnum;
use Symfony\Component\HttpFoundation\JsonResponse;

trait ControllerTrait {

	/**
	 * @param mixed $state
	 */
	protected function returnResources($data, ?int $total = null, ?int $count = null, int $status = 200, array $headers = [], array $context = [], array $groups = []): JsonResponse {
		$content = [];
		$content['data'] = !is_array($data) && $data !== null ? [$data] : $data;
		$content['count'] = $count ?? count($content['data'] ?? []);
		$content['total'] = $total ?? $content['count'];
		$content['type'] = ResponseTypeEnum::RESOURCE;

		$context['groups'] = array_merge($context['groups'] ?? [], $groups);

		return $this->json($content, $status, $headers, $context);
	}

	/**
	 * @param mixed $state
	 */
	protected function returnResultBag($data, int $status = 200, array $headers = [], array $context = [], array $groups = []): JsonResponse {
		$content = [];
		$content['data'] = $data;
		$content['type'] = ResponseTypeEnum::RESULT_BAG;
		$context['groups'] = array_merge($context['groups'] ?? [], $groups);

		return $this->json($content, $status, $headers, $context);
	}

	/**
	 * @param bool|string $state
	 */
	protected function returnActionState($state, int $status = 200, array $headers = [], array $context = [], array $groups = []): JsonResponse {
		$content = [];
		$content['data'] = ['state' => $state];
		$content['type'] = ResponseTypeEnum::RESULT_BAG;
		$context['groups'] = array_merge($context['groups'] ?? [], $groups);

		return $this->json($content, $status, $headers, $context);
	}

}
