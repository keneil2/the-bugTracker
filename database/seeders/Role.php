<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role as Roles;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ["admins", "user", "developer", "tester","project Manager"];
        foreach ($roles as $role) {
            Roles::create([
                "name" => $role
            ]);
        }

    }
}
