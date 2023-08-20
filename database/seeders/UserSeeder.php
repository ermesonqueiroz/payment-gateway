<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
         User::factory(10)->create();

         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => 'password'
         ]);

        User::factory()->create([
            'name' => 'Receiver User',
            'email' => 'receiver@example.com',
            'password' => 'password'
        ]);
    }
}
