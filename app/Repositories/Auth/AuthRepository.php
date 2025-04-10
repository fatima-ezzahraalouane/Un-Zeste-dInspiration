<?php

namespace App\Repositories\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Chef;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
            Client::create([
                'user_id'    => $user->id,
                'biographie' => null,
                'adresse'    => null,
            ]);
        }
    }
}
