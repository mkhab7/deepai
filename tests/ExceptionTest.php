<?php

test( 'wrong empty api key test',function (){
    try {
    $obj = new Solid\Deepai\Deepai('');
    } catch (Exception $e) {
        expect($e)->toBeInstanceOf(Exception::class);
    }


});
test( 'wrong empty image path',function (){
    $obj = new Solid\Deepai\Deepai('fe45714e-06bd-4120-bb87-08f62660a534');
    try {
        $obj->setImage('eefref');
    } catch (Exception $e) {
        expect($e->getCode())->toBe(404);
    }


});