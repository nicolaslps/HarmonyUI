<?php

declare(strict_types=1);

namespace HarmonyUI\Core;

use Symfony\Component\AssetMapper\AssetMapper;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

use function dirname;

final class HarmonyUICoreBundle extends AbstractBundle
{
    public function getPath(): string
    {
        return dirname(__DIR__);
    }

    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        $container->import(dirname(__DIR__).'/config/services.php');
    }

    public function prependExtension(ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        if ($builder->hasExtension('framework') && class_exists(AssetMapper::class)) {
            $builder->prependExtensionConfig('framework', [
                'asset_mapper' => [
                    'paths' => [
                        dirname(__DIR__).'/assets' => '@harmonyui',
                    ],
                ],
            ]);
        }

        if (!$builder->hasExtension('twig_component')) {
            return;
        }

        // Both keys are mandatory; provide defaults so consuming apps don't have to.
        $builder->prependExtensionConfig('twig_component', [
            'defaults' => [],
            'anonymous_template_directory' => 'components',
        ]);
    }
}
