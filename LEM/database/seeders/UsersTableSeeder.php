<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Certifique-se de importar o modelo User
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Criar administrador
        User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // Criar usuários normais
        User::firstOrCreate(
            ['email' => 'userone@example.com'],
            [
                'name' => 'User One',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );

        User::firstOrCreate(
            ['email' => 'usertwo@example.com'],
            [
                'name' => 'User Two',
                'password' => Hash::make('password'),
                'is_admin' => false,
            ]
        );
    }
}
