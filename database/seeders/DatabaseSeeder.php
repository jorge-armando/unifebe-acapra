<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Jorge',
            'email' => 'jorge5042011@gmail.com',
            'password' => Hash::make('123'),
        ]);
        User::create([
            'name' => 'Hercilio',
            'email' => 'hercilio@gmail.com',
            'password' => Hash::make('123'),
        ]);
        User::create([
            'name' => 'Thiago',
            'email' => 'thiago@gmail.com',
            'password' => Hash::make('123'),
        ]);
        User::create([
            'name' => 'João',
            'email' => 'joao@gmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
