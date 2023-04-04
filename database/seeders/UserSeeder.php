<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::where('name', 'Admin')->first();
        User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Administrador',
                'email' => 'admin@admin.com',
                'password' => bcrypt('password'),
                'whatsapp' => '(11) 9 9999-9999',
            ]
        )->roles()->attach($role);

        $roleUser = Role::where('name', 'User')->first();
        User::factory()->count(9)->create()->each(function ($user) use ($roleUser) {
            $user->roles()->attach($roleUser);
        });
    }
}
