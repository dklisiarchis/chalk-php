<?php
declare(strict_types=1);

namespace Dklis\Chalk\Tests\Unit;

use Dklis\Chalk\Chalk;
use Dklis\Chalk\Contracts\ColorPaletteInterface;
use Dklis\Chalk\Lib\DefaultColorPalette;
use PHPUnit\Framework\TestCase;

final class ChalkColorsTest extends TestCase
{

    /**
     * @dataProvider foregroundColorTestDataProvider
     */
    public function testForegroundColors(string $method, string $input, string $expected): void
    {
        $this->assertSame(
            escapeshellcmd($expected),
            escapeshellcmd(call_user_func([Chalk::class, $method], $input)),
            'Failed to output foreground text color'
        );
    }

    /**
     * @dataProvider backgroundColorTestDataProvider
     */
    public function testBackgroundColors(string $method, string $input, string $expected): void
    {
        $this->assertSame(
            escapeshellcmd($expected),
            escapeshellcmd(call_user_func([Chalk::class, $method], $input)),
            'Failed to output background text color'
        );
    }

    /**
     * @return array[]
     */
    public function foregroundColorTestDataProvider(): array
    {
        $testCases = [];
        foreach (DefaultColorPalette::cases() as $case) {
            $funcName  = strtolower($case->name);
            $inputText = 'Lorem ipsum in ' . $funcName;
            $expect    = sprintf('%s%s%s', $case->foreground(), $inputText, ColorPaletteInterface::MOD_END);

            $testCases[] = [$funcName, $inputText, $expect];
        }

        return $testCases;
    }

    /**
     * @return array[]
     */
    public function backgroundColorTestDataProvider(): array
    {
        $cases = [];
        foreach (DefaultColorPalette::cases() as $case) {
            $funcName  = strtolower($case->name) . 'BG';
            $inputText = 'Lorem ipsum in ' . $funcName;
            $expect    = sprintf('%s%s%s', $case->background(), $inputText, ColorPaletteInterface::MOD_END);

            $cases[] = [$funcName, $inputText, $expect];
        }

        return $cases;
    }
}