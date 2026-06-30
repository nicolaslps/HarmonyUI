<?php

declare(strict_types=1);

$ruleset = new TwigCsFixer\Ruleset\Ruleset();
$ruleset->addStandard(new TwigCsFixer\Standard\TwigCsFixer());

$config = new TwigCsFixer\Config\Config();
$config->setCacheFile(__DIR__.'/.twig-cs-fixer.cache');
$config->setRuleset($ruleset);
$config->setFinder(
    new TwigCsFixer\File\Finder()->in(array_merge(
        glob(__DIR__.'/apps/*/templates', GLOB_ONLYDIR) ?: [],
        glob(__DIR__.'/packages/*/templates', GLOB_ONLYDIR) ?: [],
    ))
);

return $config;
