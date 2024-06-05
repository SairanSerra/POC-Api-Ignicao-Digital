<?php

namespace App\Interfaces\Repositories;

interface ClientRepositoryInterface
{

    public function list(array $payload);

    public function create(array $data);

    public function update(array $data);

    public function delete(string $idClient, string $idUser);

    public function findByIdClientAndIdClient(string $idClient, string $idUser);
    public function findByEmail(string $email);


}
