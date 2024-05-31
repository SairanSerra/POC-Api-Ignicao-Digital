<?php

namespace App\Services\Client;

use App\Exceptions\CustomException;
use App\Interfaces\Repositories\ClientRepositoryInterface;
use App\Services\Helpers\DefaultResponse;

class DeleteClientService
{
    private $clientRepository;
    private $defaultResponse;
    public function __construct(ClientRepositoryInterface $clientRepository,
                                DefaultResponse $defaultResponse)
    {
        $this->clientRepository = $clientRepository;
        $this->defaultResponse = $defaultResponse;
    }

    public function index(string $idClient, string $idUser)
    {

        $findClient = $this->clientRepository->findByIdClientAndIdClient($idClient, $idUser);
        $clientNotFound = !$findClient;

        if($clientNotFound) throw new CustomException('Cliente não encontrado', 404);

        $this->clientRepository->delete($idClient,  $idUser);

        return $this->defaultResponse->isSuccess('Cliente excluído com sucesso', 200);


    }

}
