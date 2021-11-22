<?php
declare(strict_types = 1);
namespace Solid\Deepai;

use GuzzleHttp\Exception\GuzzleException;
use JetBrains\PhpStorm\Pure;
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
     */
     #[Pure] public function __construct(protected string $apiKey)
    {
        $this->client = new Request($this->apiKey);
    }


    public function setImage(string|\CURLFile $image): Deepai
    {
        $this->client->addParam('image',$image);
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
