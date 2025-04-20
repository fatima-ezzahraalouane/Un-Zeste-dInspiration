<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GourmandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gourmand = User::create([
            'first_name' => 'Fatima-Ezzahra',
            'last_name' => 'Alouane',
            'email' => 'fatimaezzahra@gmail.com',
            'password' => Hash::make('fatimaezzahra'),
            'role_id' => 1,
            'statut' => 'Actif',
            'is_approved' => true,
            'avatar' => null,
            'remember_token' => Str::random(10),
        ]);

        DB::table('gourmands')->insert([
            'user_id' => $gourmand->id,
            'biographie' => 'Passionnée de cuisine et de gastronomie, je suis toujours à la recherche de nouvelles recettes à essayer. J\'adore aussi partager mes expérienes culinaires avec d\'autres gourmands.',
            'adresse' => 'Safi, Maroc',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
