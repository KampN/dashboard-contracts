<?php

namespace Kampn\Dashboard\Tests\Compiler;

use Kampn\Dashboard\Compiler\DashboardResourceLocator;
use Kampn\Dashboard\Contract\Constant\QueryConstant;
use Kampn\Dashboard\Contract\Interfaces\ResourceInterface;
use Kampn\Dashboard\Service\Query\Query;
use Kampn\Dashboard\Service\Query\SQL\AliasGenerator;
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
		$locatorService = self::buildLocator();

		$service = $locatorService->get(AdCampaignResourceServiceStub::getServiceLocatorAlias());
		$this->assertInstanceOf(AdCampaignResourceServiceStub::class, $service);


		$service = $locatorService->getResourceService(
			Query::build([QueryConstant::RESOURCE => AdCampaignResourceServiceStub::getResourceName()]),
			AdCampaignResourceServiceStub::getServiceType(),
		);
		$this->assertInstanceOf(AdCampaignResourceServiceStub::class, $service);
	}

	public static function buildLocator(): DashboardResourceLocator {
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

		$definitionService = new Definition(AliasGenerator::class);
		$definitionService->setPublic(true);
		$definitionService->setAutoconfigured(true);
		$definitionService->setAutowired(true);
		$containerBuilder->setDefinition(AliasGenerator::class, $definitionService);

		$containerBuilder->compile();

		return $containerBuilder->get(DashboardResourceLocator::class);
	}
}
