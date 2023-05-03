<?php

namespace App\Pdf\Element\ValueObject\Rule;

use App\Pdf\Element\ValueObject\Exception\IntegerRuleException;

class IntegerRule implements RuleInterface
{

    public function isValid($value): bool
    {
        return is_integer($value);
    }

    public function getException(): \Throwable
    {
        return IntegerRuleException::notAnInteger();
    }
}