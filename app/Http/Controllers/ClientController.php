<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\CreateClientRequest;
use App\Http\Requests\Client\ListClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Services\Client\CreateClientService;
use App\Services\Client\DeleteClientService;
use App\Services\Client\ListClientsService;
use App\Services\Client\UpdateClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    private $createClientService;
    private $updateClientService;
    private $deleteClientService;
    private $listClientsService;
    public function __construct(CreateClientService $createClientService,
                                UpdateClientService $updateClientService,
                                DeleteClientService $deleteClientService,
                                ListClientsService $listClientsService)
    {
        $this->createClientService = $createClientService;
        $this->updateClientService = $updateClientService;
        $this->deleteClientService = $deleteClientService;
        $this->listClientsService = $listClientsService;
    }

    public function index(ListClientRequest $request)
    {
        $payload = $request->only(['id', 'tags', 'email', 'user']);
        return $this->listClientsService->index($payload);

    }

    public function create(CreateClientRequest $request)
    {
        $payload = $request->only(['name', 'email', 'tags', 'user']);
        return $this->createClientService->index($payload);
    }

    public function update(UpdateClientRequest $request)
    {
        $payload = $request->only(['name', 'email', 'tags', 'id' ,'user']);
        return $this->updateClientService->index($payload);
    }

    public function delete(string $idClient, Request $request)
    {
        $idUser = $request->user->id;
        return $this->deleteClientService->index($idClient, $idUser);
    }
}
