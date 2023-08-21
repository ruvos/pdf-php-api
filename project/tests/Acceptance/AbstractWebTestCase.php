<?php declare(strict_types=1);

namespace App\Tests\Acceptance;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\HttpFoundation\Request;

abstract class AbstractWebTestCase extends TestCase
{
    protected ClientInterface $client;

    protected function setUp(): void
    {
        $this->client = new Client();
    }

    protected function doRequest(string $requestType = Request::METHOD_GET, string $url = '', array $options = []): ResponseInterface
    {

        $defaultOptions = [
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ];

        if($options !== []) {
            $defaultOptions['body'] = $options['body'];
        }

        return $this->client->request($requestType, 'pdf-php.ddev.site'. $url, $defaultOptions);
    }
}