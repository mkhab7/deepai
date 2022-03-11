<?php
declare(strict_types=1);

namespace Solid\Deepai\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Solid\Deepai\Response\Response;

class Request
{

    private string $baseUrl = 'https://api.deepai.org/api';

    protected string $method;

    protected array $query;

    public function __construct(protected string $apiKey)
    {
    }

    /**
     *
     * @param string $method
     * @return Request
     */
    public function setMethod(string $method): Request
    {
        $this->method = trim($method, '/');
        return $this;
    }

    public function isSet($key): bool
    {
        return isset($this->query[$key]);
    }

    public function addParam($key, mixed $value): Request
    {
        $this->query[$key] = $value;
        return $this;
    }

    /**
     * @return Response
     * @throws \Exception
     */
    public function request(): Response
    {
        $client = new Client();
        try {
            $response = $client->post(
                $this->baseUrl . '/' . $this->method,
                [
                    'headers' => ['api-key' => $this->apiKey],
                    'form_params' => $this->query,
                ]
            );
            return new Response(
                json_decode(
                    $response
                        ->getBody()
                        ->getContents()
                )
            );
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }


    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}