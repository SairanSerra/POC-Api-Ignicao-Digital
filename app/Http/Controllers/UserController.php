<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Services\Users\CreateUserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $createUserService;
    public function __construct(CreateUserService $createUserService)
    {
        $this->createUserService = $createUserService;
    }

    public function create(CreateUserRequest $request)
    {
        $payload = $request->only(['name', 'email', 'password']);
        
        return $this->createUserService->index($payload);
    }
}
