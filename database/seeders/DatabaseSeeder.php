<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Kibo',
        //     'email' => 'admin@gmail.com',
        //     'passsword' => 'admin'
        // ]);
        User::create([
            'name' => 'Kibo',
            'email' => 'kibo@gmail.com',
            'password' => Hash::make('anggakibo'),
            'role' => 'admin',
        ]);
    }
}
