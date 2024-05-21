<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            "password"=>bcrypt("12345"),
            "role_id"=>1
        ]);

        User::factory()->create([
            'name' => 'developer',
            'email' => 'developer@example.com',
            "password"=>bcrypt("12345"),
            "role_id"=>3
        ]);
        User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
            "password"=>bcrypt("12345"),
            "role_id"=>2
        ]);
        User::factory()->create([
            'name' => 'tester',
            'email' => 'tester@example.com',
            "password"=>bcrypt("12345"),
            "role_id"=>1
        ]);
        User::factory()->create([
            'name' => 'ProjectManager',
            'email' => 'projectManager@example.com',
            "password"=>bcrypt("12345"),
            "role_id"=>1
        ]);
    }
}
