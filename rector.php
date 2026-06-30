<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/apps/doc/src',
        __DIR__ . '/packages/core/src',
    ])
    ->withSkip([
        __DIR__.'/apps/doc/src/Kernel.php',
    ])
    ->withAutoloadPaths([
        __DIR__ . '/apps/doc/vendor/autoload.php',
    ])
    ->withSets([
        LevelSetList::UP_TO_PHP_84,
        SetList::CODE_QUALITY,
        SetList::DEAD_CODE,
        SetList::TYPE_DECLARATION,
    ]);

