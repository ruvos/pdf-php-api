<?php

namespace App\Pdf\Element\ValueObject;

use App\Pdf\Element\ValueObject\Validator\ValidatorInterface;

class AbstractValueObject implements ValueObjectInterface
{
    protected $value;

    protected ValidatorInterface $validator;

    public function __construct($value)
    {

        $this->validator->validate($value);

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}