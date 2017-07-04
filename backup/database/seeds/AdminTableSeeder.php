<?php

use Illuminate\Database\Seeder;
use Tenomed\Models\User;
use Tenomed\Models\Role;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create Admin
        $user = User::create([
                'name' => 'admin',
                'email'=> 'admin@tenomed.com',
                'password' => bcrypt('admin'),
            ]);

        $role = Role::find(1);
        $user->attachRole($role);

        //create Owner
        $user = User::create([
                'name' => 'owner cafe',
                'email'=> 'owner@tenomed.com',
                'password' => bcrypt('owner'),
            ]);

        $role = Role::find(2);
        $user->attachRole($role);

        // Make Cafe 

        DB::table('cafes')->insert(
            [
                'user_id' => $user->id,
                'name' => 'Tenomed Cafe',
                'address' => 'Jl. Letda Sudjono No.131, Bantan Tim., Medan Tembung, Kota Medan, Sumatera Utara 20223, Indonesia',
                'phone' => '082363071285',
                'lat' => '3.5981977039643183',
                'long' => '98.7072978224121'
            ]
        );

        //Create User
        $user = User::create([
                'name' => 'normal user',
                'email'=> 'user@tenomed.com',
                'password' => bcrypt('user'),
            ]);

        $role = Role::find(3);
        $user->attachRole($role);
    }
}
