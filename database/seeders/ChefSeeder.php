<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chef = User::create([
            'first_name' => 'Fatima',
            'last_name' => 'Chef',
            'email' => 'chef@gmail.com',
            'password' => Hash::make('chef1234'),
            'role_id' => 2,
            'statut' => 'Actif',
            'is_approved' => true,
            'avatar' => null,
            'remember_token' => Str::random(10),
        ]);

        DB::table('chefs')->insert([
            'user_id' => $chef->id,
            'biographie' => 'Passionnée de cuisine depuis mon plus jeune âge, j\'aime particulièrement expérimenter avec les saveurs méditerranéennes et asiatiques. Je partage ici mes recettes.',
            'adresse' => 'Safi, Maroc',
            'specialite' => 'Pâtisserie',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
