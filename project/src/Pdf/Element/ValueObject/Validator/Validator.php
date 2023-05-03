<?php

namespace App\Pdf\Element\ValueObject\Validator;

use App\Pdf\Element\ValueObject\Rule\RuleCollection;
use App\Pdf\Element\ValueObject\Rule\RuleInterface;
use PHPUnit\Logging\Exception;

class Validator implements ValidatorInterface
{
    private const EMPTY = 0;

    private RuleCollection $rules;

    private array $violations = [];

    public function __construct()
    {
        $this->rules = new RuleCollection();
    }

    public function addRule(RuleInterface $rule): void
    {
        $this->rules->addRule($rule);
    }

    public function validate($value): void
    {
        foreach ($this->rules->getRules() as $rule) {

            if (!$rule->isValid($value)) {
                $this->violations[] = $rule->getException()->getMessage().'\n';
            }
        }
        if (self::EMPTY !== count($this->violations)) {
            $errorString = '';
            foreach ($this->violations as $violation) {
                $errorString .= $violation;
            }
            throw new Exception($errorString);
        }
    }
}
