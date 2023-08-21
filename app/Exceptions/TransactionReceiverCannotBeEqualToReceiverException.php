<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class TransactionReceiverCannotBeEqualToReceiverException extends Exception
{
    public function render(): Application|Response|ResponseFactory
    {
        return response([
            "error" => "The receiver cannot be equal to sender"
        ], 400);
    }
}
