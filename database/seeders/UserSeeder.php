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
     */
    public function run(): void
    {
          if (!User::where('email', 'ite@gmail.com')->exists()) {
            User::create([
                'name' => 'itenauta',
                'email' => 'ite@gmail.com',
                'password' => Hash::make('educabol13'), // Cambiar por una contraseña segura
            ]);
        }
    }
}
