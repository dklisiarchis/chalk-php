<?php
declare(strict_types=1);

namespace Dklis\Chalk\Tests\Unit;

use Dklis\Chalk\Chalk;
use Dklis\Chalk\Contracts\ChalkInterface;
use Dklis\Chalk\Contracts\ColorPaletteInterface;
use Dklis\Chalk\Lib\DefaultColorPalette;
use PHPUnit\Framework\TestCase;

final class ChalkTransformTest extends TestCase
{

    /**
     * @dataProvider boldTextTestDataProvider
     */
    public function testBoldText(string $input, string $expected): void
    {
        $this->assertSame(
            escapeshellcmd($expected),
            escapeshellcmd(Chalk::bold($input)),
            'Failed to output bold text'
        );
    }

    /**
     * @dataProvider underlineTextTestDataProvider
     */
    public function testUnderlineText(string $input, string $expected): void
    {
        $this->assertSame(
            escapeshellcmd($expected),
            escapeshellcmd(Chalk::underline($input)),
            'Failed to output underlined text'
        );
    }


    /**
     * @dataProvider multiTransformDataProvider
     */
    public function testMultipleTransformations(string $input, array $transformations, string $expected): void
    {
        $this->assertSame(
            escapeshellcmd($expected),
            escapeshellcmd(Chalk::transform($input, ...$transformations)),
            'Failed to apply multiple transformations with a single call'
        );
    }

    /**
     * @return array[]
     */
    public function multiTransformDataProvider(): array
    {
        return [
            [
                'lorem ipsum',
                ['bold', 'green', 'redBG'],
                sprintf(
                    '%s%s%s%s%s',
                    ChalkInterface::BOLD,
                    DefaultColorPalette::GREEN->foreground(),
                    DefaultColorPalette::RED->background(),
                    'lorem ipsum',
                    ColorPaletteInterface::MOD_END
                )
            ],
            [
                'lorem ipsum',
                ['red', 'blueBG', 'underline', 'bold'],
                sprintf(
                    '%s%s%s%s%s%s',
                    DefaultColorPalette::RED->foreground(),
                    DefaultColorPalette::BLUE->background(),
                    ChalkInterface::UNDERLINE,
                    ChalkInterface::BOLD,
                    'lorem ipsum',
                    ColorPaletteInterface::MOD_END
                )
            ]
        ];
    }

    /**
     * @return array[]
     */
    public function boldTextTestDataProvider(): array
    {
        return [
            [
                'test bold',
                sprintf(
                    '%s%s%s',
                    ChalkInterface::BOLD,
                    'test bold',
                    ColorPaletteInterface::MOD_END
                )
            ]
        ];
    }

    /**
     * @return array[]
     */
    public function underlineTextTestDataProvider(): array
    {
        return [
            [
                'test underlines',
                sprintf(
                    '%s%s%s',
                    ChalkInterface::UNDERLINE, 'test underlines', ColorPaletteInterface::MOD_END
                )
            ]
        ];
    }
}