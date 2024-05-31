<?php

namespace App\Services\Auth;

use App\Services\Helpers\DefaultResponse;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LogoutService
{
    private $defaultResponse;
    public function __construct(DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
    }

    public function index()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        Auth::logout();

        return $this->defaultResponse->isSuccess('Logout efetuado com sucesso', 200);
    }

}
