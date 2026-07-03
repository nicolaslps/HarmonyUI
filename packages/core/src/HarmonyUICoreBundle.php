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

    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->import('../config/definition.php');
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

    /**
     * Prepends run before the configuration is processed, so the theme is read from the raw extension configs.
     */
    private function resolveTheme(ContainerBuilder $builder): string
    {
        $theme = 'default';
        foreach ($builder->getExtensionConfig($this->extensionAlias) as $config) {
            if (isset($config['theme'])) {
                $theme = $config['theme'];
            }
        }

        if (!is_string($theme) || !is_dir(dirname(__DIR__).'/config/styles/'.$theme)) {
            $available = array_map(basename(...), glob(dirname(__DIR__).'/config/styles/*', GLOB_ONLYDIR) ?: []);

            throw new LogicException(sprintf('Unknown HarmonyUI theme "%s". Available themes: "%s".', is_string($theme) ? $theme : get_debug_type($theme), implode('", "', $available)));
        }

        return $theme;
    }
}
