<?php

namespace Solid\Deepai;

use Solid\Deepai\Request\Request;
use Solid\Deepai\Response\Response;

class Method
{

    public function __construct(protected Request $client){}


    public function method(string $method): self
    {
        $this->client->setMethod(trim($method));
        return $this;
    }
    /*
     * Colorize black and white images or videos using the image colorization API
     *
     * https://deepai.org/machine-learning-model/colorizer
     */
    public function colorize(): self
    {
        $this->method('colorizer');
        return $this;
    }

    /*
     * Turn a photo of any face into a cartoon instantly with artificial intelligence
     *
     * https://deepai.org/machine-learning-model/toonify
     */
    public function toonify(): self
    {
        $this->method('toonify');
        return $this;
    }

    /*
     *
     * https://deepai.org/machine-learning-model/torch-srgan
     */
    public function superResolution(): self
    {
        $this->method('torch-srgan');
        return $this;
    }

    /*
     * Creates an image from scratch from a text description.
     *
     * https://deepai.org/machine-learning-model/text2img
     */
    public function textToImage(): self
    {
        $this->method('text2img');
        return $this;
    }

    /*
     * The text generation API is backed by a large-scale unsupervised language model that can generate paragraphs of text
     *
     * https://deepai.org/machine-learning-model/text-generator
     */
    public function textGeneration(): self
    {
        $this->method('text-generator');
        return $this;
    }

    /*
     * Waifu2x is an algorithm that upscales images while reducing noise within the image
     *
     * https://deepai.org/machine-learning-model/waifu2x
     */
    public function waifu2x(): self
    {
        $this->method('waifu2x');
        return $this;
    }

    /*
     * Detects the likelihood that an image contains nudity and should be considered NSFW
     */
    public function nudityDetection(): self
    {
        $this->method('nsfw-detector');
        return $this;
    }

    /**
     * @return Response
     * @throws \Exception
     */

    public function apply(): Response
    {
        if (empty($this->client->getMethod()))
            throw new \Exception('Error :  method not set for the request');

        return $this->client->request();

    }
}