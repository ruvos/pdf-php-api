<?php

namespace App\Pdf;

class Document
{
    public readonly string $author;

    public function __construct($author)
    {
        $this->author = $author;
    }
}