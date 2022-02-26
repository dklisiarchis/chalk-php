<?php
declare(strict_types=1);

namespace Dklis\Chalk\Tests\Unit;

use Dklis\Chalk\Chalk;
use Dklis\Chalk\Contracts\ColorPaletteInterface;
use Dklis\Chalk\Tests\SampleCustomColorPalette;
use PHPUnit\Framework\TestCase;

final class ColorPaletteTest extends TestCase
{
    /**
     * @dataProvider customPaletteColorTestDataProvider
     */
    public function testCustomPaletteColors(
        string $input,
        ColorPaletteInterface $color,
        string $colorType,
        string $expected
    ): void {
        $this->assertSame(
            escapeshellcmd($expected),
            escapeshellcmd(Chalk::create($input, $color, $colorType)),
            'Failed to output custom text color or transformation'
        );
    }

    /**
     * @return array[]
     */
    public function customPaletteColorTestDataProvider(): array
    {
        $foregroundCases = [];
        $backgroundCases = [];
        foreach (SampleCustomColorPalette::cases() as $color) {
            $funcName  = strtolower($color->name);
            $inputText = 'Lorem ipsum in ' . $funcName;

            $expectForeground = sprintf('%s%s%s', $color->foreground(), $inputText, SampleCustomColorPalette::MOD_END);
            $expectBackground = sprintf('%s%s%s', $color->background(), $inputText, SampleCustomColorPalette::MOD_END);

            $foregroundCases[] = [$inputText, $color, SampleCustomColorPalette::TYPE_FOREGROUND, $expectForeground];
            $backgroundCases[] = [$inputText, $color, SampleCustomColorPalette::TYPE_BACKGROUND, $expectBackground];
        }

        return array_merge($foregroundCases, $backgroundCases);
    }
}