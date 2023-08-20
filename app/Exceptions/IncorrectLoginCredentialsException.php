<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class IncorrectLoginCredentialsException extends Exception
{
    public function render($request): Application|Response|ResponseFactory
    {
        return response([ "error" => "Incorrect credentials"], 401);
    }
}
