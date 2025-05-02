<?php

namespace App\Repositories\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Models\Chef;
use App\Models\Gourmand;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(RegisterRequest $request): void
    {
        $roleId = DB::table('roles')->where('name_user', $request->role)->value('id');

        $isChef = $request->role === 'Chef';

        $user = User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role_id'       => $roleId,
            'statut'        => $isChef ? 'Inactif' : 'Actif',
            'is_approved'   => $isChef ? false : true,
        ]);

        if ($isChef) {
            Chef::create([
                'user_id'    => $user->id,
                'biographie' => null,
                'adresse'    => null,
                'specialite' => null,
            ]);
        } else {
            Gourmand::create([
                'user_id'    => $user->id,
                'biographie' => null,
                'adresse'    => null,
            ]);
        }
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->statut === 'Suspendu') {
                Auth::logout();
                return [
                    'success' => false,
                    'error' => 'Votre compte a été suspendu par l’administrateur.',
                ];
            }

            if ($user->statut === 'Inactif' || !$user->is_approved) {
                Auth::logout();
                return [
                    'success' => false,
                    'error' => 'Votre compte est en attente de validation par l’administrateur.',
                ];
            }

            return [
                'success' => true,
                'role' => $user->role->name_user,
            ];
        }

        return [
            'success' => false,
            'error' => 'Email ou mot de passe incorrect.',
        ];
    }

    public function logout()
    {
        auth()->logout();
    }
}
