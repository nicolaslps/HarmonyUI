<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use TalesFromADev\Twig\Extra\Tailwind\TailwindExtension;
use TalesFromADev\Twig\Extra\Tailwind\TailwindRuntime;
use Twig\Extra\Html\HtmlExtension;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    // twig/html-extra's extension: provides the `html_cva` function.
    // Registered here so it works without twig/extra-bundle in the consuming app.
    $services
        ->set('harmonyui.twig.html_extension', HtmlExtension::class)
        ->tag('twig.extension');

    // tales-from-a-dev/twig-tailwind-extra: provides the `tailwind_merge` filter.
    // The filter delegates to a runtime that performs the actual class merge.
    $services
        ->set('harmonyui.twig.tailwind_extension', TailwindExtension::class)
        ->tag('twig.extension');

    $services
        ->set('harmonyui.twig.tailwind_runtime', TailwindRuntime::class)
        ->args([
            [],
            service('cache.app'),
        ])
        ->tag('twig.runtime');
};
