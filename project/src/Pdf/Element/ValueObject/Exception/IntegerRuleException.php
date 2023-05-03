<?php

namespace App\Pdf\Element\ValueObject\Exception;

class IntegerRuleException extends \Exception
{
    public const NOT_VALID_INTEGER = 'This value is not an Integer';

    public static function notAnInteger(): self
    {
        return new self(self::NOT_VALID_INTEGER);
    }
}