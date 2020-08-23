<?php

use Illuminate\Database\Seeder;
use Illuminate\Hashing\HashManager;
use Illuminate\Support\Facades\Hash;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'melvin',
            'email' => 'melvi@email.com',
            'rut' => '1010',
            'carrera' => 'noaplica',
            'rol' => 'Admin',
            'Disponibilidad' => 'Sí',
            'estado' => 'Activo',
            'password' => Hash::make('123456')
        ]);
    }
}
