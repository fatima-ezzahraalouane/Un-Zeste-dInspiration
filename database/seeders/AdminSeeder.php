<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $adminUser = User::create([
            'first_name' => 'Fatima-Ezzahra',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminfati123'),
            'role_id' => 3,
            'statut' => 'Actif',
            'is_approved' => true,
            'avatar' => null,
            'remember_token' => Str::random(10),
        ]);

        DB::table('admins')->insert([
            'user_id' => $adminUser->id,
            'telephone' => '0600000000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
