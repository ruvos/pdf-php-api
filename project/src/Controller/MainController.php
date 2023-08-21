<?php declare(strict_types=1);

namespace App\Controller;

use App\Component\Path\TemplateLoaderInterface;
use PdfPhp\Converter\DocumentToPdfConverter;
use PdfPhp\Converter\JsonDocumentConverter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MainController
{
    public const CREATE_TEMPLATE = '/v1/json/document/template';
    public const CREATE_PDF = '/v1/create/document';

    public function main(): Response
    {
     return new Response("Das ist der Pdf Template Generator!");
    }

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

        return new JsonResponse($arrayList);
    }

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