<?php
declare(strict_types=1);

namespace Dklis\Chalk\Lib;

use Dklis\Chalk\Contracts\ColorPaletteInterface;
use Dklis\Chalk\DefaultColorPalette;
use Dklis\Chalk\Lib\ChalkTransforms;

abstract class ChalkColors extends ChalkTransforms
{

    /**
     * @param string $message
     * @param ColorPaletteInterface $color
     * @return string
     */
    protected static function createBG(string $message, ColorPaletteInterface $color): string
    {
        return static::create($message, $color, ColorPaletteInterface::TYPE_BACKGROUND);
    }

    /**
     * @inheritDoc
     */
    public static function red(string $message): string
    {
        return static::create($message, DefaultColorPalette::RED);
    }

    /**
     * @inheritDoc
     */
    public static function redBG(string $message): string
    {
        return static::createBG($message, DefaultColorPalette::RED);
    }

    /**
     * @inheritDoc
     */
    public static function blue(string $message): string
    {
        return static::create($message, DefaultColorPalette::BLUE);
    }

    /**
     * @inheritDoc
     */
    public static function blueBG(string $message): string
    {
        return static::createBG($message, DefaultColorPalette::BLUE);
    }

    /**
     * @inheritDoc
     */
    public static function green(string $message): string
    {
        return static::create($message, DefaultColorPalette::GREEN);
    }

    /**
     * @inheritDoc
     */
    public static function greenBG(string $message): string
    {
        return static::createBG($message, DefaultColorPalette::GREEN);
    }

    /**
     * @inheritDoc
     */
    public static function black(string $message): string
    {
        return static::create($message, DefaultColorPalette::BLACK);
    }

    /**
     * @inheritDoc
     */
    public static function blackBG(string $message): string
    {
        return static::createBG($message, DefaultColorPalette::BLACK);
    }

    /**
     * @inheritDoc
     */
    public static function orange(string $message): string
    {
        return static::create($message, DefaultColorPalette::ORANGE);
    }

    /**
     * @inheritDoc
     */
    public static function orangeBG(string $message): string
    {
        return static::createBG($message, DefaultColorPalette::ORANGE);
    }

    /**
     * @inheritDoc
     */
    public static function magenta(string $message): string
    {
        return static::create($message, DefaultColorPalette::MAGENTA);
    }

    /**
     * @inheritDoc
     */
    public static function magentaBG(string $message): string
    {
        return static::createBG($message, DefaultColorPalette::MAGENTA);
    }

    /**
     * @inheritDoc
     */
    public static function cyan(string $message): string
    {
        return static::create($message, DefaultColorPalette::CYAN);
    }

    /**
     * @inheritDoc
     */
    public static function cyanBG(string $message): string
    {
        return static::createBG($message, DefaultColorPalette::CYAN);
    }

    /**
     * @inheritDoc
     */
    public static function gray(string $message): string
    {
        return static::create($message, DefaultColorPalette::GRAY);
    }

    /**
     * @inheritDoc
     */
    public static function grayBG(string $message): string
    {
        return static::createBG($message, DefaultColorPalette::GRAY);
    }

    /**
     * @inheritDoc
     */
    public static function fallback(string $message): string
    {
        return static::create($message, DefaultColorPalette::FALLBACK);
    }

    /**
     * @inheritDoc
     */
    public static function fallbackBG(string $message): string
    {
        return static::createBG($message, DefaultColorPalette::FALLBACK);
    }
}