<?php
declare(strict_types=1);

namespace Solid\Deepai;

use Error;
use GuzzleHttp\Exception\GuzzleException;
use Solid\Deepai\Request\Request;

class Deepai
{
    protected object $client;

    /**
     *
     * set your private api key
     *
     * you must get your api key from deepai.org
     *
     *
     * @param string $apiKey
     * @throws \Exception
     */
    public function __construct(protected string $apiKey)
    {
        if (empty($this->apiKey))
            return throw new \Exception('api key value cannot be empty !');

        $this->client = new Request($this->apiKey);
    }


    /**
     * @throws \Exception
     */
    public function setImage(string|\CURLFile $image): Deepai
    {
        if (is_string($image) && !file_exists($image))
            return throw new \Exception('this file does not exist in path :' . $image, 404);


        $this->client->addParam('image', $image);
        return $this;
    }

    public function colorize(): Deepai
    {
        $this->client->setAction('colorizer');
        return $this;
    }

    public function toonify(): Deepai
    {
        $this->client->setAction('toonify');
        return $this;
    }

    public function superResolution(): Deepai
    {
        $this->client->setAction('torch-srgan');
        return $this;
    }

    /**
     * @return Response\Response
     */
    public function apply(): Response\Response
    {
        try {
            return $this->client->request();
        } catch (\ErrorException | GuzzleException $e) {
            return throw new Error($e->getMessage());
        }

    }
}
