<?php

namespace App\Pdf\Element\ValueObject;

use App\Pdf\Element\ValueObject\Rule\StringRule;
use App\Pdf\Element\ValueObject\Validator\Validator;

class TextElement extends AbstractValueObject
{
    public function __construct($value)
    {
        $this->validator = new Validator();
        $this->validator->addRule(new StringRule());
        parent::__construct($value);
    }
}