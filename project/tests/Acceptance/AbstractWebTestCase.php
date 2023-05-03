<?php declare(strict_types=1);

namespace App\Tests\Acceptance;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

class AbstractWebTestCase extends TestCase
{
    protected function doRequest(string $requestType = Request::METHOD_GET, string $url = ''): ResponseInterface
    {
        $client = new Client();

        return $client->request(Request::METHOD_GET, 'pdf-php.ddev.site/'. $url);
    }
}