<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'mega',
            'email' => 'mega@gmail.com',
            'rol' => 'Admin',
            'password' => Hash::make('megamega')
        ]);

    }
}
