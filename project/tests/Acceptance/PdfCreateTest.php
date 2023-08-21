<?php declare(strict_types=1);

namespace App\Tests\Acceptance;


use App\Controller\MainController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PdfCreateTest extends AbstractWebTestCase
{
    public function testCreationIsValid()
    {
        $response = $this->doRequest();

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
    }

    public function testTemplateCreationIsValid(): void
    {
        $response = $this->doRequest(Request::METHOD_POST,MainController::CREATE_TEMPLATE,['body' => $this->getJsonString()]);

        $this->assertSame('{"name":"test-pdf-file.pdf","datumWert":"","wetterWert":""}', $response->getBody()->getContents());

        $content = fopen(__DIR__.'/../../public/templates/test-pdf-file.pdf', "r");

        $expectedContent = fopen(__DIR__.'/mocks/test-pdf-file-compare.pdf', "r");


        //The error counter just exists, to handle the date difference. so 1 error is allowed.
        $errorCounter = 0;

        if ($content && $expectedContent) {
            while ((($line1 = fgets($content)) !== false) && (($line2 = fgets($expectedContent)) !== false) ) {
                try {
                    $this->assertSame($line1, $line2);
                } catch (\Throwable $exception) {
                    if($errorCounter === 1) {
                        throw $exception;
                    }
                    $errorCounter++;
                }
            }
            fclose($content);
            fclose($expectedContent);
        }
    }

    private function getJsonString(): string
    {
        $string = '
        {
            "author": "AuthorString",
            "filename": "test-pdf-file.pdf",
            "pages": [
                {
                    "elements":
                    [
                        {
                            "cellWidth": 0,
                            "cellHeight": 0,
                            "xCellPosition": 13,
                            "yCellPosition": 2,
                            "elementName": "datum",
                            "value": "Datum:"
                        },
                        {
                            "cellWidth": 0,
                            "cellHeight": 0,
                            "xCellPosition": 30,
                            "yCellPosition": 2,
                            "elementName": "datumWert",
                            "value": null
                        },
                        {
                            "cellWidth": 0,
                            "cellHeight": 0,
                            "xCellPosition": 13,
                            "yCellPosition": 22,
                            "elementName": "wetter",
                            "value": "Wetter:"
                        },
                        {
                            "cellWidth": 0,
                            "cellHeight": 0,
                            "xCellPosition": 50,
                            "yCellPosition": 22,
                            "elementName": "wetterWert",
                            "value": null
                        }
                    ]
                }
            ]
        }';

        return $string;
    }
}