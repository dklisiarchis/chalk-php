<?php
declare(strict_types=1);

namespace Dklis\Chalk\Exception;

use Dklis\Chalk\Contracts\ColorPaletteInterface;
use Throwable;

use function sprintf;

class ColorNotFoundException extends ChalkException
{
    public function __construct(
        string $colorRequested = "",
        string $colorType = ColorPaletteInterface::TYPE_FOREGROUND,
        int $code = 0,
        ?Throwable $previous = null
    ) {
        $message = sprintf(
            'Chalk::ColorNotFoundException:: %s color %s not found',
            $colorType,
            $colorRequested
        );
        parent::__construct($message, $code, $previous);
    }
}