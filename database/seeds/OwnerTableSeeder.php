<?php

use Illuminate\Database\Seeder;

class OwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	for ($i=0; $i < 20 ; $i++) { 
    		# code...
    	}

        $cafes = [
        	[
        		'user_id' 	=>  2,
        		'name' 		=>  'Sosmed cafe',
        		'kecamatan' =>  'Medan Polonia',
        		'kelurahan' =>  'Madras Hulu',
        		'address' =>  'Jl. Teuku Umar No.3, Madras Hulu, Medan Polonia, Kota Medan, Sumatera Utara 20111, Indonesia',
        		'long' =>  ,
        		'lat' =>  ,
        		'phone' =>  ,
        		'web' =>  ,
        		'facebook' =>  ,
        		'instagram' =>  ,
        		'twitter' =>  ,
        		'linkedin' =>  ,
        		'seat' =>  ,
        		'status' =>  1,
        		'desc' =>  ,
        	]
        ]
    }
}
