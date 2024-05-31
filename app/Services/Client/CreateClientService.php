<?php

namespace App\Services\Client;

use App\Interfaces\Repositories\ClientRepositoryInterface;
use App\Services\Helpers\DefaultResponse;
use Illuminate\Support\Str;

class CreateClientService
{

    private $clientRepository;
    private $defaultResponse;
    public function __construct(ClientRepositoryInterface $clientRepository,
                                DefaultResponse $defaultResponse)
    {
        $this->clientRepository = $clientRepository;
        $this->defaultResponse = $defaultResponse;
    }

    public function index(array $payload)
    {
        $idUser = $payload['user']['id'];

        $payload['idUser'] = $idUser;
        $payload['id'] = Str::orderedUuid();

        $this->clientRepository->create($payload);

        return $this->defaultResponse->isSuccess('Cliente cadastrado com sucesso', 201);

    }

}
