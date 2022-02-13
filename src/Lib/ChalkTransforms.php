<?php
declare(strict_types=1);

namespace Dklis\Chalk\Lib;

use Dklis\Chalk\Chalk;
use Dklis\Chalk\Contracts\ChalkInterface;
use Dklis\Chalk\Contracts\ColorPaletteInterface;

use function is_callable;
use function call_user_func_array;
use function array_reduce;
use function sprintf;
use function str_replace;

abstract class ChalkTransforms implements ChalkInterface
{

    /**
     * @inheritDoc
     */
    public static function transform(string $message, string ...$transforms): string
    {
        $transform = array_reduce(
            $transforms,
            static function (?string $acc, string $transformation) use ($message) {
                if (is_callable([Chalk::class, $transformation])) {
                    return $acc .= call_user_func_array([Chalk::class, $transformation], ['']);
                }

                return $acc .= '';
            },
            ''
        );

        $transform = str_replace(ColorPaletteInterface::MOD_END, '', $transform);
        return sprintf('%s%s%s', $transform, $message, ColorPaletteInterface::MOD_END);
    }

    /**
     * @inheritDoc
     */
    public static function underline(string $message): string
    {
        return sprintf('%s%s%s', self::UNDERLINE, $message, ColorPaletteInterface::MOD_END);
    }

    /**
     * @inheritDoc
     */
    public static function bold(string $message): string
    {
        return sprintf('%s%s%s', self::BOLD, $message, ColorPaletteInterface::MOD_END);
    }
}