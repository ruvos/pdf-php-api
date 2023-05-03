<?php

namespace App\Pdf\Element\ValueObject\Validator;

use App\Pdf\Element\ValueObject\Rule\RuleInterface;

/**
 * @codeCoverageIgnore
 */
interface ValidatorInterface
{
    public function addRule(RuleInterface $rule): void;

    public function validate($value);
}