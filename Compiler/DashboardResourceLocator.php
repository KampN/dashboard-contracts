<?php

namespace Kampn\Dashboard\Compiler;

use App\Template\Interfaces\RegistryLocatorInterface;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\DependencyInjection\Compiler\ServiceLocatorTagPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class DashboardResourceLocator {

	private ContainerInterface $locator;

	public static function getTag(): string {
		return 'kampn.dashboard.resource';
	}

	public static function getInterface(): string {
		return ResourceInterface::class;
	}

	public static function registerTags(ContainerBuilder $container): void {
		$container->registerForAutoconfiguration(static::getInterface())->addTag(static::getTag());
	}

	public static function compile(ContainerBuilder $container): void {
		$tag = static::getTag();
		$locatorClass = static::class;
		$services = [];

		foreach($container->findTaggedServiceIds($tag) as $id => $attributes) {
			$services[$id] = new Reference($id);

			$definition = $container->getDefinition($id);
			$class = $definition->getClass();

			if(\method_exists($class, 'getServiceLocatorAlias')) {
				$services[$class::getServiceLocatorAlias()] = new Reference($id);
			}
		}

		if(\count($services) >= 1) {
			$locatorService = $container->findDefinition($locatorClass);
			$locatorService->setArguments([ServiceLocatorTagPass::register($container, $services)]);
		}
	}

	public function __construct(ContainerInterface $locator) {
		$this->locator = $locator;
	}

	public function exists($service): bool {
		return $this->locator->has($service);
	}

	public function get($service) {
		return $this->locator->get($service);
	}
}