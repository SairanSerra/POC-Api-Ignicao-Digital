<?php

namespace App\Services\Client;

use App\Interfaces\Repositories\ClientRepositoryInterface;
use App\Services\Helpers\DefaultPaginateService;
use App\Services\Helpers\DefaultResponse;

class ListClientsService
{

    private $clientRepository;
    private $defaultPaginateService;
    private $defaultResponse;
    public function __construct(ClientRepositoryInterface $clientRepository,
                                DefaultPaginateService $defaultPaginateService,
                                DefaultResponse $defaultResponse)
    {
        $this->clientRepository = $clientRepository;
        $this->defaultPaginateService = $defaultPaginateService;
        $this->defaultResponse = $defaultResponse;
    }

    public function index(array $payload)
    {
       $listClient = $this->clientRepository->list($payload);

       $content = $this->defaultPaginateService->DefaultPaginate($listClient, $listClient);

       return $this->defaultResponse->isSuccessWithContent('Lista de clientes', 200, $content);

    }

}
