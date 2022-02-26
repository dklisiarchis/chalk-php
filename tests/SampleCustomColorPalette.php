<?php
declare(strict_types=1);

namespace Dklis\Chalk\Tests;

use Dklis\Chalk\Contracts\ColorPaletteInterface;

enum SampleCustomColorPalette: string implements ColorPaletteInterface
{

    case CUSTOM_COLOR = 'custom_color';

    public function foreground(): string
    {
        return match($this)
        {
            SampleCustomColorPalette::CUSTOM_COLOR => "\033[55m",
        };
    }

    public function background(): string
    {
        return match($this)
        {
            SampleCustomColorPalette::CUSTOM_COLOR => "\033[56m",
        };
    }
}