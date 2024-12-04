<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Crée un utilisateur avec le rôle SUPER-ADMIN
        $superAdmin = \App\Models\User::factory()->create([
            'name' => 'DANIEL',
            'email' => 'tedyWinner@gmail.com',
            'activation' => 'Actived',
            'prenom' => 'Levy',
            'user_role' => 1, // password
            'password' => Hash::make('DANIEL'),
        ]);
        \App\Models\role::factory()->create([
            'role_name'=>'USER'
        ]);
        \App\Models\role::factory()->create([
            'role_name'=>'ADMIN'
        ]);
        $superRole=    \App\Models\role::factory()->create([
            'role_name'=>'SUPER-ADMIN'
        ]);
        \App\Models\user_role::factory()->create([
            'user_id'=>$superAdmin->id,
            'role_id'=>$superRole->id
        ]);
    
        
    }
    
}
