<?php

declare(strict_types=1);

namespace App\Tests\Smoke;

use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class ContainerTest extends KernelTestCase
{
    public function testKernelBootsAndContainerIsAvailable(): void
    {
        self::bootKernel();

        self::assertInstanceOf(Kernel::class, self::$kernel);
        self::assertTrue(self::getContainer()->has('router'));
    }
}
