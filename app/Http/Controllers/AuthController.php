<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use App\Services\Auth\LogoutService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $loginService;
    private $logoutService;
    public function __construct(LoginService $loginService,
                                LogoutService $logoutService)
    {
        $this->loginService = $loginService;
        $this->logoutService = $logoutService;
    }

    public function login(LoginRequest $request)
    {
        $payload = $request->only(['email', 'password']);
        return $this->loginService->index($payload);
    }

    public function logout()
    {
        return $this->logoutService->index();
    }

}
