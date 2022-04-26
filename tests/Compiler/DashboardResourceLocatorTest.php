<?php

namespace Kampn\Dashboard\Tests\Compiler;

use Kampn\Dashboard\Compiler\DashboardResourceLocator;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;
use Kampn\Dashboard\Tests\Configuration\Stub\AdCampaignResourceServiceStub;
use Kampn\Dashboard\Tests\Configuration\Stub\CompilerPassStub;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

class DashboardResourceLocatorTest extends TestCase {

	public function testRegisterTag(): void {
		$containerBuilder = new ContainerBuilder();

		DashboardResourceLocator::registerTags($containerBuilder);
		$this->assertNotNull($containerBuilder->getAutoconfiguredInstanceof());

		$configuration = $containerBuilder->getAutoconfiguredInstanceof()[ResourceInterface::class] ?? null;

		$this->assertNotNull($configuration);
		$this->assertNotNull($configuration->getTag(DashboardResourceLocator::getTag()));
	}

	public function testCompile(): void {
		$containerBuilder = new ContainerBuilder();
		DashboardResourceLocator::registerTags($containerBuilder);
		$containerBuilder->addCompilerPass(new CompilerPassStub());

		$definitionLocator = new Definition(DashboardResourceLocator::class, [new Container()]);
		$definitionLocator->setPublic(true);
		$definitionLocator->setAutoconfigured(true);
		$definitionLocator->setAutowired(true);
		$containerBuilder->setDefinition(DashboardResourceLocator::class, $definitionLocator);

		$definitionService = new Definition(AdCampaignResourceServiceStub::class);
		$definitionService->setPublic(true);
		$definitionService->setAutoconfigured(true);
		$definitionService->setAutowired(true);
		$containerBuilder->setDefinition(AdCampaignResourceServiceStub::class, $definitionService);

		$containerBuilder->compile();

		$locatorService = $containerBuilder->get(DashboardResourceLocator::class);
		$service = $locatorService->get(AdCampaignResourceServiceStub::getServiceLocatorAlias());

		$this->assertInstanceOf(AdCampaignResourceServiceStub::class, $service);
	}
}
