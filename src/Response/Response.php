<?php

namespace Solid\Deepai\Response;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Response
{
    protected ?string $url = null;

    protected ?string $output = null;

    /**
     * @param object $data
     */
    public function __construct(protected object $data)
    {
        $this->url = $this?->data?->output_url ?? null;

        $this->output = $this->url ?? $this->data?->output ?? null;
    }

    /**
     * @return string|null
     */
    public function url(): ?string
    {
        return $this->url;
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

    /**
     * returns url/text output
     *
     *
     * @return string|null
     */
    public function output(): ?string
    {
        return $this->output;
    }
    /**
     * @throws GuzzleException
     * @throws \Exception
     */
    public function save(string $path): bool
    {
        if (!filter_var($this->url, FILTER_VALIDATE_URL))
            throw new \Exception('Error : Invalid url !');

        $client = new Client();
        $client->get(
            $this->url,
            ['sink' => $path]
        );
        return true;
    }


}
