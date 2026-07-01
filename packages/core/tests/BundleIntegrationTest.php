<?php

declare(strict_types=1);

namespace HarmonyUI\Core\Tests;

use HarmonyUI\Core\HarmonyUICoreBundle;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class BundleIntegrationTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        restore_exception_handler();
    }

    public function testBundleBootsAndIsRegistered(): void
    {
        self::bootKernel();

        $bundles = self::$kernel->getBundles();

        self::assertArrayHasKey('HarmonyUICoreBundle', $bundles);
        self::assertInstanceOf(HarmonyUICoreBundle::class, $bundles['HarmonyUICoreBundle']);
        self::assertTrue(self::getContainer()->has('kernel'));
    }
}
