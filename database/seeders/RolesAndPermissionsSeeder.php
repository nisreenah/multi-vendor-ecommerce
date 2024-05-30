<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $viewUsers = Permission::create(['name' => 'view users']);
        $addUser = Permission::create(['name' => 'add user']);
        $editUser = Permission::create(['name' => 'edit user']);
        $deleteUser = Permission::create(['name' => 'delete user']);

        $viewProducts = Permission::create(['name' => 'view products']);
        $addProduct = Permission::create(['name' => 'add product']);
        $editProduct = Permission::create(['name' => 'edit product']);
        $deleteProduct = Permission::create(['name' => 'delete product']);

        $viewCategories = Permission::create(['name' => 'view categories']);
        $addCategory = Permission::create(['name' => 'add category']);
        $editCategory = Permission::create(['name' => 'edit category']);
        $deleteCategory = Permission::create(['name' => 'delete category']);

        $adminRole = Role::create(['name' => 'admin']);
        $vendorRole = Role::create(['name' => 'vendor']);
        $userRole = Role::create(['name' => 'user']);

        // Assign admin role to all permissions
        $adminRole->givePermissionTo(Permission::all());

        // Assign permissions to roles
        $viewProducts->assignRole($vendorRole);
        $addProduct->assignRole($vendorRole);
        $editProduct->assignRole($vendorRole);
        $deleteProduct->assignRole($vendorRole);

        $viewCategories->assignRole($vendorRole);
        $addCategory->assignRole($vendorRole);
        $editCategory->assignRole($vendorRole);
        $deleteCategory->assignRole($vendorRole);

        $viewProducts->assignRole($userRole);
        $viewCategories->assignRole($userRole);
    }
}
