<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;

use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\Auth\AuthRepositoryInterface;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    protected AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function register(RegisterRequest $request)
    {
        $this->authRepository->register($request);

        return redirect()->route('login')
            ->with('success', 'Votre compte a été créé avec succès ! Vous pouvez maintenant vous connecter.');
    }

    public function login(LoginRequest $request)
    {
        $result = $this->authRepository->login($request);

        if (!$result['success']) {
            return back()->withErrors(['email' => $result['error']]);
        }

        return match ($result['role']) {
            'Admin' => redirect()->route('admin.dashboard')->with('success', 'Bienvenue dans le tableau de bord Admin 👨‍💼'),
            'Chef' => redirect()->route('chef.dashboard')->with('success', 'Bienvenue Chef 👨‍🍳 !'),
            'Gourmand' => redirect()->route('gourmand.accueil')->with('success', 'Bienvenue Dégustateur(trice) 😋 !'),
        };
    }
}
