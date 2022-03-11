<?php
declare(strict_types=1);

namespace Solid\Deepai;


use GuzzleHttp\Exception\GuzzleException;
use Solid\Deepai\Method;
use Solid\Deepai\Request\Request;

class Deepai
{

    protected Request $client;

    /**
     *
     * set your private api key
     *
     * you must get your api key from deepai.org
     *
     * @param string $apiKey
     * @throws \Exception
     */
    public function __construct(protected string $apiKey)
    {
        if (empty($this->apiKey))
             throw new \Exception('api key value cannot be empty !');

        $this->client = new Request($this->apiKey);
    }


    public function setImage(string|\CURLFile $image): Method
    {
        $this->client->addParam('image', $image);
        return new Method($this->client);
    }


    public function setText(string $text): Method
    {
        $this->client->addParam('text', $text);
        return new Method($this->client);
    }
}
