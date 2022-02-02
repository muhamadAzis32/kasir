<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        User::create([
/*
            'nama' => 'vira',
            'email' => 'vira@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'admin'
*/
            'nama' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => Hash::make('123'),
            'level' => 'kasir'
        ]);
    }
}
