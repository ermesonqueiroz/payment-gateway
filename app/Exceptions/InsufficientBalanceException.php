<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class InsufficientBalanceException extends Exception
{
    public function render($userId): Application|Response|ResponseFactory
    {
        return response([
            "error" => "User with with id \"$userId\" doesn't have a sufficient balance to complete the transaction"
        ], 400);
    }
}
