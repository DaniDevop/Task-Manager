<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nom' => 'Admin', // Nom par défaut
            'email' => 'admin@example.com', // Email par défaut
            'prenom'=>'',
            'user_role'=>'ADMIN',
            'password' => Hash::make('admin'), // Mot de passe par défaut (crypté)
        ]);
    }
}
