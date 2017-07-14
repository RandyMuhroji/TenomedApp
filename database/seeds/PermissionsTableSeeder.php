<?php

use Tenomed\Models\Permission;
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
        $permission = [
            // [
            //     'name' => 'create',
            //     'display_name' => 'Create Record',
            //     'description' => 'Allow user to create a new DB record'
            // ],
            // [
            //     'name' => 'edit',
            //     'display_name' => 'Edit Record',
            //     'description' => 'Allow user to edit an existing DB record'
            // ],
            // [
            //     'name' => 'delete',
            //     'display_name' => 'Delete Record',
            //     'description' => 'Allow user to delete an existing DB record'
            // ],
            [
                'name' => 'admin',
                'display_name' => 'Administrator',
                'description' => 'Allow user to manage system users and cafes'
            ],
            [
                'name' => 'owner',
                'display_name' => 'Manage Cafe',
                'description' => 'Allow user to manage account and cafe'
            ],
            [
                'name' => 'user',
                'display_name' => 'Manage User',
                'description' => 'Allow user to manage account'
            ],
            [
                'name' => 'super_admin',
                'display_name' => 'Super Administrator',
                'description' => 'Allow user to manage system admin, users and cafes'
            ],

        ];

        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
