<?php

namespace App\Services\Client;

use App\Exceptions\CustomException;
use App\Interfaces\Repositories\ClientRepositoryInterface;
use App\Services\Helpers\DefaultResponse;

class UpdateClientService
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
        $idClient = $payload['id'];

        $findClient = $this->clientRepository->findByIdClientAndIdClient($idClient, $idUser);
        $clientNotFound = !$findClient;

        if($clientNotFound) throw new CustomException('Cliente não encontrado', 404);

        $this->clientRepository->update($payload);

        return $this->defaultResponse->isSuccess('Cliente atualizado com sucesso', 200);

    }

}
