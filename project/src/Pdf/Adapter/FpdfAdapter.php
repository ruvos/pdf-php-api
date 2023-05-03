<?php

namespace App\Pdf\Adapter;


use Fpdf\Fpdf;

class FpdfAdapter implements PdfAdapterInterface
{
    private Fpdf $fpdf;

    public function __construct()
    {
        $this->fpdf = new Fpdf();
    }

    public function getFpdf(): Fpdf
    {
        return $this->fpdf;
    }
}