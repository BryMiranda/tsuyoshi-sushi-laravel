<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Usuario administrador
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@tsuyoshi.com',
            'password' => Hash::make('admin123'),
            'role' => 'administrador'
        ]);

        // Usuario cliente
        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@tsuyoshi.com',
            'password' => Hash::make('cliente123'),
            'role' => 'cliente'
        ]);

        // Usuario empleado
        User::create([
            'name' => 'Empleado',
            'email' => 'empleado@tsuyoshi.com',
            'password' => Hash::make('empleado123'),
            'role' => 'empleado'
        ]);

        // Usuario repartidor
        User::create([
            'name' => 'Repartidor',
            'email' => 'repartidor@tsuyoshi.com',
            'password' => Hash::make('repartidor123'),
            'role' => 'repartidor'
        ]);
    }
}
