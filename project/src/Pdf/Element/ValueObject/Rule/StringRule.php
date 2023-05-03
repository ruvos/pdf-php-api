<?php

namespace App\Pdf\Element\ValueObject\Rule;

use App\Pdf\Element\ValueObject\Exception\StringRuleException;

class StringRule implements RuleInterface
{
    public const ALPHABET_LETTER_CONSTRAINT = '/^[a-zA-Z]*$/';
    public function isValid($value): bool
    {
        return 1 === preg_match(self::ALPHABET_LETTER_CONSTRAINT, $value);
    }

    public function getException(): \Throwable
    {
        return StringRuleException::notBetweenAtoZ();
    }
}