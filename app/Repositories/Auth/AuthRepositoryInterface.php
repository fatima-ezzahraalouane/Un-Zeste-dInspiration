<?php

namespace App\Repositories\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

interface AuthRepositoryInterface
{
    public function register(RegisterRequest $request): void;
    public function login(LoginRequest $request);
}
