<?php declare(strict_types=1);

namespace App\Tests\Acceptance;


use Symfony\Component\HttpFoundation\Response;

class PdfCreateTest extends AbstractWebTestCase
{
    public function testCreationIsValid()
    {
        $response = $this->doRequest();

        $this->assertSame(Response::HTTP_OK, $response->getStatusCode());
    }
}