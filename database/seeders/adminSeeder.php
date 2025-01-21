<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::Create([
        //     'username' => 'admin12345',
        //     'password'=> bcrypt('admin'),
        //     'role' => 'admin',
        // ]);
        User::Create([
            'username' => 'user12345',
            'password'=> bcrypt('user'),
            'role' => 'user',
        ]);
    }
}
