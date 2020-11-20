<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'Khidir Zahid',
            'email'    => 'khidir@rbac-laravue.test',
            'password' => bcrypt(123),
            'username' => 'admin'
        ]);
    }
}
