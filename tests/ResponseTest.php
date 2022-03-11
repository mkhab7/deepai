<?php
it('returns output url', function () {
    $url = 'https://test.com/image.jpg';


    $response = response([
        'output_url' => $url
    ]);
    expect($response->url())->toBe($url);

     $response = response([
        'output_url' => 'invalidUrl'
    ]);

    $response = response([]);
    expect($response->url())->toBeNull();
});
it('returns all response data',function (){
   $expected = [
       'output'=>'string'
   ];
   $data = response($expected)->getData();
   expect($data)->toBeObject()->toBeObject()->toEqual((object)$expected);
});
it('returns output (url/text) from response',function (){

    $output = 'test string';

   expect(response([
       'output'=> $output
   ])->output()) ->toBe($output);


    $output =  'https://test.com/image.jpg';
   expect(response([
       'output_url'=> $output
   ])->output()) ->toBe($output);
});
it('throws invalid url exception',function (){

       response([])->save('');

})->throws(Exception::class,'Error : Invalid url !');