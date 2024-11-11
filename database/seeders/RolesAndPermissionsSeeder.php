<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Tạo quyền
        Permission::create(['name' => 'view dashboard']);
        Permission::create(['name' => 'manage orders']);
        Permission::create(['name' => 'manage products']);
        Permission::create(['name' => 'manage users']);

        // Tạo vai trò
        $roleAdmin = Role::create(['name' => 'manager']);
        $roleEmployee = Role::create(['name' => 'employee']);
        $roleCustomer = Role::create(['name' => 'customer']);
        $roleGuest = Role::create(['name' => 'guest']); // Người dùng chưa đăng nhập

        // Gán quyền cho vai trò
        $roleAdmin->givePermissionTo('manage orders');
        $roleAdmin->givePermissionTo('manage products');
        $roleAdmin->givePermissionTo('manage users');
        $roleAdmin->givePermissionTo('view dashboard');

        $roleEmployee->givePermissionTo('manage orders');
        $roleEmployee->givePermissionTo('view dashboard');

        $roleCustomer->givePermissionTo('view dashboard');

        $roleGuest->givePermissionTo('view dashboard'); // Chỉ có thể xem dashboard
    }
}
