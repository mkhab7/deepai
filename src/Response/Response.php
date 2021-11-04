<?php

namespace Solid\Deepai\Response;

use ErrorException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Response
{
    protected string $url;

    /**
     * @param object $response
     */
    public function __construct(object $response)
    {
        $this->url = $response->output_url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @throws GuzzleException
     */
    public function save(string $path): bool
    {
        $client = new Client();
        $client->get(
            $this->url,
            ['sink' => $path]
        );
        return true;
    }
}