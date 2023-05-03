<?php

namespace App\Tests\App\Pdf;

use App\Pdf\Document;
use PHPUnit\Framework\TestCase;

class DocumentTest extends TestCase
{
    public function testAuthorIsValid()
    {
        $author = 'TestAuthor';

        $document = new Document($author);
        $this->assertSame($author, $document->author);
    }
}
