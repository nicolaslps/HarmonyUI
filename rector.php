<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php83\Rector\ClassMethod\AddOverrideAttributeToOverriddenMethodsRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__.'/apps/doc/src',
        __DIR__.'/packages/core/src',
    ])
    ->withSkip([
        AddOverrideAttributeToOverriddenMethodsRector::class,
        __DIR__.'/apps/doc/src/Kernel.php',
    ])
    ->withAutoloadPaths([
        __DIR__.'/apps/doc/vendor/autoload.php',
    ])
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        earlyReturn: true,
        symfonyCodeQuality: true,
    )
    ->withComposerBased(symfony: true)
    ->withPhpSets();
