# deepai

A library for using [deepai.org](http://deepai.org) api

# install
## via composer :

> composer require mkhab7/deepai
# usage
```php
use Solid\Deepai\Deepai;

require_once 'vendor/autoload.php';
$deepai = new Deepai('api key');

$deepai->setImage('image url'); 
// you can use a url or a local file path , for example : 

$deepai->setImage(new CURLFile('image.jpg'));


$deepai->colorize();

   
$result = $deepai->apply();

$url = $result->getUrl();

$result->save('output.jpg');

/*
 * you can get the all response data from this method 
 */
$allResponseData = $result->getData();
```

## All the methods you can use
- colorize
- toonify
- superResolution
- textToImage
- nudityDetection
- waifu2x