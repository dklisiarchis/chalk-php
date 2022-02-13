<?php
declare(strict_types=1);

namespace Dklis\Chalk\Tests\Unit;

use Dklis\Chalk\Chalk;
use Dklis\Chalk\Contracts\ChalkInterface;
use Dklis\Chalk\Contracts\ColorPaletteInterface;
use Dklis\Chalk\DefaultColorPalette;
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
     * @return array[]
     */
    public function boldTextTestDataProvider(): array
    {
        return [
            [
                'test bold',
                sprintf(
                    '%s%s%s',
                    ChalkInterface::BOLD, 'test bold', ColorPaletteInterface::MOD_END
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