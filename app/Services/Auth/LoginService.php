<?php

namespace App\Services\Auth;

use App\Exceptions\CustomException;
use App\Services\Helpers\DefaultResponse;
use Tymon\JWTAuth\JWTAuth;

class LoginService
{
    private $defaultResponse;
    public function __construct(DefaultResponse $defaultResponse)
    {
        $this->defaultResponse = $defaultResponse;
    }

    public function index(array $payload){

        $token = auth()->attempt($payload);
        $credentialsInvalid = !$token;

        if($credentialsInvalid) throw new CustomException('Credenciais inválidas ou conta não cadastrada', 401);

        $user = auth()->user();

        $content = [
            'token' => $token,
            'user'  => $user
        ];

        return $this->defaultResponse->isSuccessWithContent('Usuário logado com sucesso', 200, $content);

    }

}
