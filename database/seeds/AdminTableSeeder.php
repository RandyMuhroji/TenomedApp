<?php

use Illuminate\Database\Seeder;
use Tenomed\Models\User;
use Tenomed\Models\Role;
use Tenomed\Models\Menu;
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
        $user = User::create([
                'name' => 'admin',
                'email'=> 'admin@tenomed.com',
                'password' => bcrypt('admin'),
                'status' => 1,
            ]);

        $role = Role::find(4);
        $user->attachRole($role);

        //create Owner
        $user = User::create([
                'name' => 'owner cafe',
                'email'=> 'owner@tenomed.com',
                'password' => bcrypt('owner'),
                'status' => 1,
            ]);

        $role = Role::find(2);
        $user->attachRole($role);

        // Make Cafe 

        $address = 'Jl. Letda Sudjono No.131, Bantan Tim., Medan Tembung, Kota Medan, Sumatera Utara 20223, Indonesia';
        $arrAddress = explode(',',$address);

        $kec = $arrAddress[2];
        $kel = $arrAddress[1];


        $cafe = DB::table('cafes')->insert(
            [
                'user_id' => $user->id,
                'name' => 'Tenomed Cafe',
                'address' => $address,
                'phone' => '082363071285',
                'lat' => '3.5981977039643183',
                'long' => '98.7072978224121',
                'kecamatan' => $kec,
                'kelurahan' => $kel,
                'rating' => 0,
            ]
        );

        DB::table('album_gallery')->insert(
            [
                'user_id' =>  $user->id,
                'name' => 'slider'
            ]
        );

        $user = User::create([
            'name' => 'normal user',
            'email'=> 'user@tenomed.com',
            'password' => bcrypt('user'),
            'status' => 1,
        ]);

        $role = Role::find(3);
        $user->attachRole($role);
    }
}
