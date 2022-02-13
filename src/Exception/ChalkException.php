<?php
declare(strict_types=1);

namespace Dklis\Chalk\Exception;

use Exception;
use Throwable;

use function sprintf;

class ChalkException extends Exception
{

    /**
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $message = sprintf('ChalkException:: %s', $message);
        parent::__construct($message, $code, $previous);
    }
}