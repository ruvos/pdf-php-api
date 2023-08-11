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
     return new Response("Das ist der Pdf Template Generator!");
    }

    #[Route('/v1/json/document/template', 'v1_json_document')]
    public function jsonToDocument(Request $request): Response
    {
        $content = $request->getContent();

        $jsonConverter = new JsonDocumentConverter();

        $document = $jsonConverter->jsonToDocument($content);

        $documentToPdfConverter = new DocumentToPdfConverter($document);
        $documentToPdfConverter->buildPdfTemplate();
        $emptyValueDocument = $document->createEmptyValueDocument();

        $encodedEmptyValueDocument = json_encode($emptyValueDocument);

        file_put_contents(__DIR__.'/../../public/templates/'.$document->filename.'.json',$encodedEmptyValueDocument);

        $arrayList = $document->createKeyValueCreationArray($emptyValueDocument);

        return new Response(json_encode($arrayList));
    }

    #[Route('/v1/create/document', 'doc_create')]
    public function createDocument(Request $request)
    {
        $params = $request->query->all();

        $pdfName = $params['name'];
        unset($params['name']);

        $emptyValueDocument = file_get_contents(__DIR__.'/../../public/templates/'.$pdfName.'.json');

        $jsonConverter = new JsonDocumentConverter();
        $document = $jsonConverter->jsonToDocument($emptyValueDocument);

        $document->fillDocumentWithValues($params);

        $documentToPdfConverter = new DocumentToPdfConverter($document);
        $documentToPdfConverter->buildPdfTemplate('D');

        die();
    }
}