<?php
declare(strict_types=1);

namespace Solid\Deepai\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Solid\Deepai\Response\Response;

class Request
{

    private string $baseUrl = 'https://api.deepai.org/api';

    protected string $action;

    protected array $query;

    public function __construct(protected string $apiKey){}

    /**
     * @param string $action
     */
    public function setAction(string $action): Request
    {
        $this->action = trim($action, '/');
        return $this;
    }


    public function addParam($key, mixed $value): Request
    {
        $this->query[$key] = $value;
        return $this;
    }

    /**
     * @return Response
     * @throws GuzzleException
     */
    public function request(): Response
    {

        $client = new Client();
        $response = $client->post(
            $this->baseUrl . '/' . $this->action,
            [
                'headers' => ['api-key' => $this->apiKey],
                'form_params' => $this->query
            ]
        );

        return new Response(
            json_decode(
                $response
                    ->getBody()
                    ->getContents()
            )
        );
    }
}