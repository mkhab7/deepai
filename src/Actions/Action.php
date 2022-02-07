<?php

namespace Solid\Deepai\Actions;

use Solid\Deepai\Request\Request;
use Solid\Deepai\Response\Response;

class Action
{

    public function __construct(protected Request $client){}

    /*
     * Colorize black and white images or videos using the image colorization API
     *
     * https://deepai.org/machine-learning-model/colorizer
     */
    public function colorize(): self
    {
        $this->client->setAction('colorizer');
        return $this;
    }

    /*
     * Turn a photo of any face into a cartoon instantly with artificial intelligence
     *
     * https://deepai.org/machine-learning-model/toonify
     */
    public function toonify(): self
    {
        $this->client->setAction('toonify');
        return $this;
    }

    /*
     *
     * https://deepai.org/machine-learning-model/torch-srgan
     */
    public function superResolution(): self
    {
        $this->client->setAction('torch-srgan');
        return $this;
    }

    /*
     * Creates an image from scratch from a text description.
     *
     * https://deepai.org/machine-learning-model/text2img
     */
    public function textToImage(): self
    {
        $this->client->setAction('text2img');
        return $this;
    }

    /*
     * Waifu2x is an algorithm that upscales images while reducing noise within the image
     *
     * https://deepai.org/machine-learning-model/waifu2x
     */
    public function waifu2x(): self
    {
        $this->client->setAction('waifu2x');
        return $this;
    }

    /*
     * Detects the likelihood that an image contains nudity and should be considered NSFW
     */
    public function nudityDetection(): self
    {
        $this->client->setAction('nsfw-detector');
        return $this;
    }

    /**
     * @return Response
     * @throws \Exception
     */

    public function apply(): Response
    {
        if (empty($this->client->getAction()))
            throw new \Exception('Error :  action not set for the request');

        return $this->client->request();

    }
}