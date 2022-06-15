<?php

namespace App\Exceptions;

use Exception;

class MyCustomException extends Exception
{
    public function context()
    {
        return ['order_id' => $this->order_id];
    }

    public function report()
    {
        Log::debug('User Not Found');
    }

    public function render($request){
        return response()->view('errors.invalid-order', [], 500);
    }
}
