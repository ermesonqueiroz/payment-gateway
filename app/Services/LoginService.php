<?php

namespace App\Services;

use App\Exceptions\IncorrectLoginCredentialsException;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function run(array $data)
    {
        if (!Auth::attempt($data)) {
            throw new IncorrectLoginCredentialsException();
        }

        return Auth::user()->createToken($credentials['email'])->plainTextToken;
    }
}
