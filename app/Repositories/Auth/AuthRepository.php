<?php

namespace App\Repositories\Auth;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthRepository implements AuthRepositoryInterface
{
    public function register(RegisterRequest $request): void
    {
        $roleId = DB::table('roles')->where('name_user', $request->role)->value('id');

        User::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role_id'       => $roleId,
            'statut'        => 'actif',
            'is_approved'   => $request->role === 'Chef' ? false : true,
        ]);
    }
}
