<?php
declare(strict_types=1);

namespace Dklis\Chalk\Contracts;

interface ChalkInterface
{

    public const BOLD = "\033[1m";
    public const UNDERLINE = "\033[4m";

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
    ): string;

    /**
     * Apply multiple transformations to a single message.
     *
     * Usage: Chalk::transform('A message', 'red', 'blueBG', 'bold', 'underline')
     * @param string $message
     * @param string ...$transforms
     * @return string
     */
    public static function transform(string $message, string ...$transforms): string;

    /**
     * Underline message
     * @param string $message
     * @return string
     */
    public static function underline(string $message): string;

    /**
     * Make message bold
     * @param string $message
     * @return string
     */
    public static function bold(string $message): string;

    /**
     * Red foreground
     * @param string $message
     * @return string
     */
    public static function red(string $message): string;

    /**
     * Red background
     * @param string $message
     * @return string
     */
    public static function redBG(string $message): string;

    /**
     * Blue foreground
     * @param string $message
     * @return string
     */
    public static function blue(string $message): string;

    /**
     * Blue background
     * @param string $message
     * @return string
     */
    public static function blueBG(string $message): string;

    /**
     * Green foreground
     * @param string $message
     * @return string
     */
    public static function green(string $message): string;

    /**
     * Green background
     * @param string $message
     * @return string
     */
    public static function greenBG(string $message): string;

    /**
     * Black foreground
     * @param string $message
     * @return string
     */
    public static function black(string $message): string;

    /**
     * Black background
     * @param string $message
     * @return string
     */
    public static function blackBG(string $message): string;

    /**
     * Orange foreground
     * @param string $message
     * @return string
     */
    public static function orange(string $message): string;

    /**
     * Orange background
     * @param string $message
     * @return string
     */
    public static function orangeBG(string $message): string;

    /**
     * Magenta foreground
     * @param string $message
     * @return string
     */
    public static function magenta(string $message): string;

    /**
     * Magenta background
     * @param string $message
     * @return string
     */
    public static function magentaBG(string $message): string;

    /**
     * Cyan foreground
     * @param string $message
     * @return string
     */
    public static function cyan(string $message): string;

    /**
     * Cyan background
     * @param string $message
     * @return string
     */
    public static function cyanBG(string $message): string;

    /**
     * Gray foreground
     * @param string $message
     * @return string
     */
    public static function gray(string $message): string;

    /**
     * Gray background
     * @param string $message
     * @return string
     */
    public static function grayBG(string $message): string;

    /**
     * Fallback foreground
     * @param string $message
     * @return string
     */
    public static function fallback(string $message): string;

    /**
     * Fallback background
     * @param string $message
     * @return string
     */
    public static function fallbackBG(string $message): string;
}