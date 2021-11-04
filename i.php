<?php

use Solid\Deepai\Deepai;

require_once 'vendor/autoload.php';
$deepai = new Deepai('9f520479-dcce-48a4-b3c1-1b2d1ce5525d');

$deepai->setImage(new CURLFile('xx.jpg'));
$deepai->colorize();
try {
   echo $deepai->apply()->save(__DIR__.'/x.jpg');
} catch (\GuzzleHttp\Exception\GuzzleException $e) {
}
