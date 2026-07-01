<?php

declare(strict_types=1);

namespace HarmonyUI\Core\Tests;

use HarmonyUI\Core\HarmonyUICoreBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel;

/**
 * Kernel minimal servant uniquement à booter le bundle dans les tests.
 */
final class TestKernel extends Kernel
{
    use MicroKernelTrait;

    public function registerBundles(): iterable
    {
        return [
            new FrameworkBundle(),
            new HarmonyUICoreBundle(),
        ];
    }

    protected function configureContainer(ContainerConfigurator $container, LoaderInterface $loader): void
    {
        $container->extension('framework', [
            'test' => true,
            'secret' => 'test',
            'http_method_override' => false,
            'handle_all_throwables' => true,
            'php_errors' => ['log' => true],
        ]);
    }

    public function getCacheDir(): string
    {
        return sys_get_temp_dir().'/harmonyui-core-tests/cache/'.$this->environment;
    }

    public function getLogDir(): string
    {
        return sys_get_temp_dir().'/harmonyui-core-tests/log';
    }
}
