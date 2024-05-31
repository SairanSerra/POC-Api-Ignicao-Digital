<?php

namespace App\Interfaces\Repositories;

interface UserRepositoryInterface
{

    public function create(array $data);

    public function findByEmail(string $idUser);

}
