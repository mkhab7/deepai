<?php

namespace Solid\Deepai\Response;

use ErrorException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Response
{
    protected string $url;

    /**
     * @param object $data
     */
    public function __construct( protected object $data)
    {
        $this->url = $this->data->output_url;
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

    /**
     * get all the response data
     *
     * @return object
     */
    public function getData(): object
    {
        return $this->data;
    }
}