<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'         => 'index-users',
            'display_name' => 'Data Users',
            'description'  => 'Display a listing of the user.'
        ]);
        Permission::create([
            'name'         => 'store-users',
            'display_name' => 'Create User',
            'description'  => 'Store a newly created user in storage.'
        ]);
        Permission::create([
            'name'         => 'show-users',
            'display_name' => 'Detail User',
            'description'  => 'Display the specified user.'
        ]);
        Permission::create([
            'name'         => 'update-users',
            'display_name' => 'Edit User',
            'description'  => 'Update the specified user in storage.'
        ]);
        Permission::create([
            'name'         => 'destroy-users',
            'display_name' => 'Delete User',
            'description'  => 'Remove the specified user from storage.'
        ]);
    }
}
