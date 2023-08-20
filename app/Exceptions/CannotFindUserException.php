<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\Routing\ResponseFactory;

class CannotFindUserException extends Exception
{
    public function render($userId): Application|Response|ResponseFactory
    {
        return response([ "error" => "Cannot find user with id \"$userId\""], 400);
    }
}
