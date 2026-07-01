<?php

declare(strict_types=1);

namespace HarmonyUI\Core\Tests\Components;

use HarmonyUI\Core\Tests\TestKernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\UX\TwigComponent\Test\InteractsWithTwigComponents;

final class ButtonTest extends KernelTestCase
{
    use InteractsWithTwigComponents;

    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        restore_exception_handler();
    }

    public function testRendersDefaultButton(): void
    {
        $button = $this->renderTwigComponent('HarmonyUICore:Button', content: 'Valider')
            ->crawler()
            ->filter('button.hui-btn');

        self::assertCount(1, $button);
        self::assertSame('Valider', trim($button->text()));
        self::assertStringContainsString('hui-btn--primary', $button->attr('class') ?? '');
        self::assertStringContainsString('hui-btn--md', $button->attr('class') ?? '');
        self::assertSame('button', $button->attr('type'));
    }

    public function testAppliesVariantAndSize(): void
    {
        $button = $this->renderTwigComponent('HarmonyUICore:Button', [
            'variant' => 'danger',
            'size' => 'lg',
        ], content: 'Supprimer')->crawler()->filter('button');

        $class = $button->attr('class') ?? '';
        self::assertStringContainsString('hui-btn--danger', $class);
        self::assertStringContainsString('hui-btn--lg', $class);
    }

    public function testDisabledAndPassthroughAttributes(): void
    {
        $button = $this->renderTwigComponent('HarmonyUICore:Button', [
            'disabled' => true,
            'type' => 'submit',
            'data-testid' => 'save',
        ], content: 'Enregistrer')->crawler()->filter('button');

        self::assertNotNull($button->attr('disabled'));
        self::assertSame('submit', $button->attr('type'));
        self::assertSame('save', $button->attr('data-testid'));
    }
}
