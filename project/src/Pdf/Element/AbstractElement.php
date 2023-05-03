<?php

namespace App\Pdf\Element;

use App\Pdf\Element\ValueObject\ValueObjectInterface;

class AbstractElement
{
    private int $xPosition;

    private int $yPosition;

    private ValueObjectInterface $valueObject;

    public function __construct(int $xPosition, int $yPosition, ValueObjectInterface $valueObject)
    {
        $this->xPosition = $xPosition;
        $this->yPosition = $yPosition;
        $this->valueObject = $valueObject;
    }

    public function getValue()
    {
        $this->valueObject->getValue();
    }
}