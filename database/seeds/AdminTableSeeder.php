<?php

use Illuminate\Database\Seeder;
use Tenomed\Models\User;
use Tenomed\Models\Role;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                'name' => 'admin',
                'email'=> 'admin@tenomed.com',
                'password' => bcrypt('admin'),
            ]);

        $role = Role::find(1);
        $user->attachRole($role);
    }
}
