<?php

use Illuminate\Database\Seeder;
use Tenomed\Models\Role;
use Tenomed\Models\PermissionRole;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
        		'name' => 'admin',
        		'display_name' => 'Adminstrator',
            ],
            [
                'name' => 'owner',
                'display_name' => 'Cafe Owner',
            ],
            [
                'name' => 'user',
                'display_name' => 'User Normal',
            ],
            [
                'name' => 'super_admin',
                'display_name' => 'Super Adminstrator',
            ],
        ];
        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
