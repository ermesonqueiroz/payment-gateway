<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class InvalidTransactionSenderTypeException extends Exception
{
    public function render($userId): Application|Response|ResponseFactory
    {
        return response([
                "error" => "Merchant-type users can only receive transactions"
        ], 400);
    }
}
