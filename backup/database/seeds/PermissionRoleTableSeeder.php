<?php

use Illuminate\Database\Seeder;

use Tenomed\Models\PermissionRole;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$permisionRole = [
            [
        		'permission_id' => 1,
        		'role_id' => 1,
            ],
            [
                'permission_id' => 2,
        		'role_id' => 2,
            ],
            [
                'permission_id' => 3,
        		'role_id' => 3,
            ],
        ];

        foreach ($permisionRole as $key => $value) {
            PermissionRole::create($value);
        }
    }
}
