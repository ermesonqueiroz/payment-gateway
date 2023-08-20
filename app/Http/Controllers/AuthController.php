<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\LoginService;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    public function user(Request $userRequest): UserResource
    {
        return new UserResource($userRequest->user());
    }

    public function login(LoginRequest $loginRequest, LoginService $loginService): Application|Response|ResponseFactory
    {
        $data = $loginRequest->validated();
        $token = $loginService->run($data);
        return response($token);
    }

    public function logout(Request $logoutRequest): void
    {
        $logoutRequest->user()->currentAccessToken()->delete();
    }
}
