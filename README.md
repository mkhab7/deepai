# deepai

a small library for using [deepai.org](http://deepai.org) api

# install
## via composer :

> composer require mkhab7/deepai
# usage
```php
use Solid\Deepai\Deepai;

require_once 'vendor/autoload.php';
$deepai = new Deepai('api key');
/*
you first should be take your api-key in Deepai construct 

after that you can use this
*/

$deepai->setImage('image url'); 
// you can use a url or a local file path , for example : $deepai->setImage(new CURLFile('image.jpg'));


$deepai->colorize();
/*
you can use  colorize,toonify,suoerResolution for edit your pics 
*/


   
   $result = $deepai->apply();
   // send request and get result
   
   $url = $result->getUrl();
   //get edited image url
   
   $result->save('output.jpg');
   //save edited image to local file
   


```


