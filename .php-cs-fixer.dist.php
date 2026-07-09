<?php

declare(strict_types=1);

$finder = new PhpCsFixer\Finder()
    ->in([
        __DIR__.'/apps/doc/src',
        __DIR__.'/packages/ui/src',
    ])
    ->exclude([
        'tests',
        'Tests',
        'vendor',
        'var',
    ]);

return new PhpCsFixer\Config()
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        '@Symfony:risky' => true,
        '@PHP8x4Migration' => true,
        '@PHP8x4Migration:risky' => true,
        'declare_strict_types' => true,
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => true,
            'import_functions' => true,
        ],
    ])
    ->setFinder($finder)
    ->setCacheFile(__DIR__.'/.php-cs-fixer.cache');
