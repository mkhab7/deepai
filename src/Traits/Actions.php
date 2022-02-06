<?php

namespace Solid\Deepai\Traits;

use Solid\Deepai\Deepai;

trait Actions
{

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
}