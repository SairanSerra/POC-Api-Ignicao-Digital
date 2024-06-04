<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ClientRepositoryInterface;
use App\Models\Client;

class ClientRepository implements ClientRepositoryInterface
{
    private $client;
    public function __construct(Client $model)
    {
        $this->client = $model;
    }

    public function list(array $payload)
    {
        $listClient = $this->client->where(function($query) use($payload){

            $idUser = $payload['user']['id'];

            $idClient = $payload['id'] ?? false;
            $tags = $payload['tags'] ?? false;
            $email = $payload['email'] ?? false;
            $name = $payload['name'] ?? false;

            $query->where('idUser', $idUser);

            if($name){
                $query->where('name',  'like',"%{$name}%");
            }

            if($tags){
                $query->where('tags', 'like', "%{$tags}%");
            }

            if($email){
                $query->where('email', 'like', "%{$email}%");
            }

            if($idClient){
                $query->where('id', $idClient);
            }

        })->paginate(10);

        return $listClient;
    }

    public function create(array $data)
    {
        $client =  $this->client->create($data);
        return $client;
    }

    public function update(array $payload)
    {

        $idUser = $payload['user']['id'];
        $idClient = $payload['id'];

        $client = $this->findByIdClientAndIdClient($idClient, $idUser);

        return $client->update($payload);

    }

    public function delete(string $idClient, string $idUser)
    {
        $client = $this->findByIdClientAndIdClient($idClient, $idUser);

        return $client->delete();
    }

    public function findByIdClientAndIdClient(string $idClient, string $idUser)
    {

        $client = $this->client->where('id', $idClient)->where('idUser', $idUser)->first();
        return $client;

    }



}
