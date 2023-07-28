<?php declare(strict_types=1);

namespace App\Controller;

use PdfPhp\Converter\DocumentToPdfConverter;
use PdfPhp\Converter\JsonDocumentConverter;
use PdfPhp\Pdf\Adapter\Adapter\FpdfAdapter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController
{
    #[Route(path: '/', name: 'main')]
    public function main(): Response
    {
     return new Response("Hello World!");
    }

    #[Route(path: '/test', name: 'test')]
    public function test()
    {
        $pdfAdapter = new FpdfAdapter();

        $fpdf = $pdfAdapter->buildPdf();
        $fpdf->SetFont('Times');
        $fpdf->AddPage();
        $fpdf->SetFillColor(202,23,54);
        $fpdf->Cell(13,23,'WASSUP  asdasd ',2,1,'R',true,);
        $fpdf->SetFillColor(22,23,54);
        $fpdf->Cell(123,23,'WASSUP',2,2,'R',true,);
        $fpdf->Write(1,"hello");
        $fpdf->AddPage();
        $fpdf->AddPage();
        $fpdf->AddPage();


        $fpdf->Output('I');

die();
    }

    #[Route('/v1/json/document', 'v1_json_document')]
    public function jsonToDocument(Request $request)
    {
        $content = $request->getContent();

        $jsonConverter = new JsonDocumentConverter();

        $document = $jsonConverter->jsonToDocument($content);

        $documentToPdfConverter = new DocumentToPdfConverter($document);
        $documentToPdfConverter->buildPdf();
    die();
    }
}