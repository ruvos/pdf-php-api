<?php

namespace App\Tests\App\Pdf\Elements\ValueObjects;

use App\Pdf\Element\ValueObject\Exception\StringRuleException;
use App\Pdf\Element\ValueObject\TextElement;
use PHPUnit\Framework\TestCase;

class TextElementTest extends TestCase
{
    public function testTextElementIsValid(): void
    {
        $string = 'testStringIsValid';

        $textElement = new TextElement($string);

        $this->assertSame($string, $textElement->getValue());
    }

    public function testTextElementWithSingleCharacterIsValid(): void
    {
        $string = 'A';

        $textElement = new TextElement($string);

        $this->assertSame($string, $textElement->getValue());
    }

    public function testTextElementThrowsExceptionOnInvalidValue(): void
    {
        $string = 3;

        $this->expectExceptionMessage(StringRuleException::NOT_VALID_CHARACTER);

        $textElement = new TextElement($string);
    }
}
