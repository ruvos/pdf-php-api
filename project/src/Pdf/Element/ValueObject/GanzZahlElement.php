<?php declare(strict_types=1);

namespace App\Pdf\Element\ValueObject;

use App\Pdf\Element\ValueObject\Validator\Validator;

class GanzZahlElement extends AbstractValueObject
{
    public function __construct($value)
    {
        $this->validator = new Validator();
        $this->validator->addRule();
        parent::__construct($value);
    }
}