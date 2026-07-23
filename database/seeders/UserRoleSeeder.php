<?php

namespace Database\Seeders;

use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'admin',
            'customer'
        ];

        foreach ($roles as $roleName) {
            UserRole::firstOrCreate(
                ['name' => $roleName]
            );
        }
    }
}
