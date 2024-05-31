<?php

namespace App\Services\Users;

use App\Exceptions\CustomException;
use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Services\Helpers\DefaultResponse;
use Illuminate\Support\Str;

class CreateUserService
{
    private $userRepository;
    private $defaultResponse;
    public function __construct(UserRepositoryInterface $userRepository,
                                DefaultResponse $defaultResponse)
    {
        $this->userRepository = $userRepository;
        $this->defaultResponse = $defaultResponse;
    }

    public function index(array $payload)
    {
        $email = $payload['email'];

        $findUserByEmail = $this->userRepository->findByEmail($email);
        $userHasExist = $findUserByEmail;

        if($userHasExist) throw new CustomException('Usuário já cadastrado', 400);

        $payload['password'] = bcrypt($payload['password']);

        $payload['id'] = Str::orderedUuid();

        $this->userRepository->create($payload);

        return $this->defaultResponse->isSuccess('Usuário cadastrado com sucesso', 201);

    }

}
