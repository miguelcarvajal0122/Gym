<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
    
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        // Crear usuario administrador
        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('12345678');
        $admin->assignRole('admin');
        $admin->save();
        // Crear usuario normal
        $user = new User();
        $user->name = 'User';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole('user');
    }
}