<?php
declare(strict_types=1);

namespace Solid\Deepai;


use GuzzleHttp\Exception\GuzzleException;
use Solid\Deepai\Request\Request;
use Solid\Deepai\Traits\Actions;

class Deepai
{
    use Actions;
    protected Request $client;

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


    /**
     * @return Response\Response|\Exception
     * @throws \Exception
     */

    public function apply(): Response\Response|\Exception
    {
        if (!$this->client->isSet('image'))
            throw new \Exception('Error :  image not set for the request');

          if (empty($this->client->getAction()))
              throw new \Exception('Error :  action not set for the request');



            return $this->client->request();

    }
}
