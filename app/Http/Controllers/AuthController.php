<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;
use App\Repositories\Auth\AuthRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    protected AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $this->authRepository->register($request);

        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès ! Vous pouvez maintenant vous connecter.');
    }
}
