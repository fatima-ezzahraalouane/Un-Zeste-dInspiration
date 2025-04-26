<?php

namespace App\Repositories\Auth;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

interface AuthRepositoryInterface
{
    public function register(RegisterRequest $request);
    public function login(LoginRequest $request);
}
