<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin JoyTravel',
            'email'    => 'admin@joytravel.com',
            'password' => Hash::make('JoyTravel098'),
            'peran'    => 'admin',
        ]);

        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('JoyTravel098'),
            'peran'    => 'admin',
        ]);
    }
}
