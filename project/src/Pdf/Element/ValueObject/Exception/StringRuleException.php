<?php declare(strict_types=1);

namespace App\Pdf\Element\ValueObject\Exception;

use Exception;

/**
 * @codeCoverageIgnore
 */
class StringRuleException extends Exception
{
    public const NOT_VALID_CHARACTER = 'This string contains a character that is not between a-z.';

    public static function notBetweenAtoZ(): self
    {
        return new self(self::NOT_VALID_CHARACTER);
    }
}