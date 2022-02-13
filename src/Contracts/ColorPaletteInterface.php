<?php
declare(strict_types=1);

namespace Dklis\Chalk\Contracts;

use BackedEnum;

interface ColorPaletteInterface extends BackedEnum
{

    /**
     * Transformation end token
     */
    public const MOD_END = "\033[0m";

    /**
     * DefaultColorPalette apply types
     */
    public const TYPE_FOREGROUND = 'foreground';
    public const TYPE_BACKGROUND = 'background';

    /**
     * Get the color as foreground color
     * @return string
     */
    public function foreground(): string;

    /**
     * Get the color as background color
     * @return string
     */
    public function background(): string;
}