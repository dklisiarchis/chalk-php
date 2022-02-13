<?php
declare(strict_types=1);

namespace Dklis\Chalk;

use Dklis\Chalk\Contracts\ColorPaletteInterface;

enum DefaultColorPalette: string implements ColorPaletteInterface
{

    case RED      = 'red';
    case BLUE     = 'blue';
    case GREEN    = 'green';
    case BLACK    = 'black';
    case ORANGE   = 'orange';
    case MAGENTA  = 'magenta';
    case CYAN     = 'cyan';
    case GRAY     = 'gray';
    case FALLBACK = 'fallback';

    public function foreground(): string
    {
        return match($this)
        {
            DefaultColorPalette::BLACK => "\033[30m",
            DefaultColorPalette::RED => "\033[31m",
            DefaultColorPalette::GREEN => "\033[32m",
            DefaultColorPalette::ORANGE => "\033[33m",
            DefaultColorPalette::BLUE => "\033[34m",
            DefaultColorPalette::MAGENTA => "\033[35m",
            DefaultColorPalette::CYAN => "\033[36m",
            DefaultColorPalette::GRAY => "\033[37m",
            DefaultColorPalette::FALLBACK => "\033[39m"
        };
    }

    public function background(): string
    {
        return match($this)
        {
            DefaultColorPalette::RED => "\033[41m",
            DefaultColorPalette::BLUE => "\033[44m",
            DefaultColorPalette::GREEN => "\033[42m",
            DefaultColorPalette::BLACK => "\033[40m",
            DefaultColorPalette::ORANGE => "\033[43m",
            DefaultColorPalette::MAGENTA => "\033[45m",
            DefaultColorPalette::CYAN => "\033[46m",
            DefaultColorPalette::GRAY => "\033[47m",
            DefaultColorPalette::FALLBACK => "\033[49m"
        };
    }
}