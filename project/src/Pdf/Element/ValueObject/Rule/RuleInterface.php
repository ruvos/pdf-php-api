<?php

namespace App\Pdf\Element\ValueObject\Rule;

/**
 * @codeCoverageIgnore
 */
interface RuleInterface
{
    public function isValid($value): bool;

    public function getException(): \Throwable;
}