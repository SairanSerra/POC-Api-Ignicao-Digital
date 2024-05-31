<?php

namespace App\Repositories;

use App\Interfaces\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    private $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function create(array $data){
        $createUser = $this->model->create($data);
        return $createUser;
    }

    public function findByEmail(string $idUser){
        $user = $this->model->where('email', $idUser)->first();
        return $user;
    }

}
