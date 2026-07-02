<?php

/**
 * Returns the importmap for this application.
 *
 * - "path" is a path inside the asset mapper system. Use the
 *     "debug:asset-map" command to see the full list of paths.
 *
 * - "entrypoint" (JavaScript only) set to true for any module that will
 *     be used as an "entrypoint" (and passed to the importmap() Twig function).
 *
 * The "importmap:require" command can be used to add new entries to this file.
 *
 * @return array<string, array{    // Import name as key, description of the imported file as value
 *     path: string,               // Logical, relative or absolute path to the file
 *     type?: 'js'|'css'|'json',   // Type of the file, defaults to 'js'
 *     entrypoint?: bool,          // Whether the file is an entrypoint, for 'js' only
 * }|array{
 *     version: string,            // Version of the remote package
 *     package_specifier?: string, // Remote "package-name/path" specifier, defaults to the import name
 *     type?: 'js'|'css'|'json',
 *     entrypoint?: bool,
 * }>
 */
return [
    'app' => ['path' => './assets/app.js', 'entrypoint' => true],
    '@hotwired/stimulus' => ['version' => '3.2.2'],
    '@zag-js/accordion' => ['version' => '1.42.0'],
    '@zag-js/vanilla' => ['version' => '1.42.0'],
    '@zag-js/anatomy' => ['version' => '1.42.0'],
    '@zag-js/dom-query' => ['version' => '1.42.0'],
    '@zag-js/utils' => ['version' => '1.42.0'],
    '@zag-js/core' => ['version' => '1.42.0'],
    '@zag-js/types' => ['version' => '1.42.0'],
    '@zag-js/store' => ['version' => '1.42.0'],
    'proxy-compare' => ['version' => '3.0.1'],
    '@symfony/stimulus-bundle' => ['path' => './vendor/symfony/stimulus-bundle/assets/dist/loader.js'],
];
