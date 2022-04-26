<?php

namespace Kampn\Dashboard\Tests\Configuration\Stub;

use Kampn\Dashboard\Compiler\DashboardResourceLocator;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class CompilerPassStub implements CompilerPassInterface {
	public function process(ContainerBuilder $container) {
		DashboardResourceLocator::compile($container);
	}
}