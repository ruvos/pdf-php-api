<?php

namespace App\Pdf\Element\ValueObject\Rule;

class RuleCollection
{
    private array $rules = [];

    public function addRule(RuleInterface $rule): void
    {
        $this->rules[] = $rule;
    }

    /**
     * @return RuleInterface[]
     */
    public function getRules(): array
    {
        return $this->rules;
    }


}