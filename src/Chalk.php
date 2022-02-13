<?php
declare(strict_types=1);

namespace Dklis\Chalk;

use Dklis\Chalk\Contracts\ColorPaletteInterface;
use Dklis\Chalk\Exception\ColorNotFoundException;
use Dklis\Chalk\Lib\ChalkColors;

use function str_replace;
use function mb_substr;
use function sprintf;

final class Chalk extends ChalkColors
{

    /**
     * @param string $message
     * @param ColorPaletteInterface $color
     * @param string $type
     * @return string
     */
    public static function create(
        string $message,
        ColorPaletteInterface $color,
        string $type = ColorPaletteInterface::TYPE_FOREGROUND
    ): string {
        return sprintf(
            "%s%s%s",
            $type === ColorPaletteInterface::TYPE_FOREGROUND ? $color->foreground() : $color->background(),
            $message,
            ColorPaletteInterface::MOD_END
        );
    }

    /**
     * @param string $colorName
     * @param string $colorType
     * @return ColorPaletteInterface
     * @throws ColorNotFoundException
     */
    private static function tryGetColor(string $colorName, string $colorType): ColorPaletteInterface
    {
        $resultColor = DefaultColorPalette::tryFrom($colorName);
        if ($resultColor === null) {
            throw new ColorNotFoundException($colorName, $colorType);
        }

        return $resultColor;
    }


    /**
     * @param string $name
     * @param array $arguments
     * @return string
     * @throws ColorNotFoundException
     */
    public static function __callStatic(string $name, array $arguments)
    {
        $message = $arguments[0] ?? '';
        $type = (mb_substr($name, -2) === 'BG')
            ? ColorPaletteInterface::TYPE_BACKGROUND
            : ColorPaletteInterface::TYPE_FOREGROUND;
        if ($type === ColorPaletteInterface::TYPE_BACKGROUND) {
            $name = str_replace('BG', '', $name);
        }

        $color = self::tryGetColor($name, $type);
        return self::create($message, $color, $type);
    }
}