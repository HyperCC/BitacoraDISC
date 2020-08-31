<?php

use Illuminate\Database\Seeder;

class UserSecretariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'evel',
            'email' => 'evel@gmail.com',
            'rol' => 'Secretaria',
            'disponibilidad'=> 'No',
            'password' => Hash::make('evelevel')
        ]);
    }
}
