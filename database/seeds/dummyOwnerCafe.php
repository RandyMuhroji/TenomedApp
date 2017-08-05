<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Tenomed\Models\User;
use Tenomed\Models\Role;
use Tenomed\Models\Menu;
use Tenomed\Models\Cafe;
use Tenomed\Models\OperationalCafe;
use Tenomed\Models\AlbumGallery;

class dummyOwnerCafe extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
                'name' => 'Level.02 - Roof Top',
                'email'=> 'Level02@rooftop.com',
                'password' => bcrypt('owner'),
                'status' => 1,
            ]);

        $role = Role::find(2);
        $user->attachRole($role);

        $address = ' Jl. Iskandar Muda, Babura, Medan Baru, Kota Medan, Sumatera Utara 20111';
        $arrAddress = explode(',',$address);

        $kec = $arrAddress[2];
        $kel = $arrAddress[1];


        $cafe = Cafe::create(
            [
                'user_id' => $user->id,
                'name' => 'Level.02 - Roof Top',
                'address' => $address,
                'phone' => '0823-6684-3660',
                'lat' => '3.586509',
                'long' => '98.661301',
                'kecamatan' => $kec,
                'kelurahan' => $kel,
                'image' => 'Level.02/11143669_10153661731517985_1423348416227249367_n.jpg',
                'rating' => 0,
                'status' => 1,
                'seat' => 30,
                'web' => 'http://rumah_burger.com',
                'facebook' => 'http://facebook.com/rumah.burger',
            ]
        );

        DB::table('operational_cafe')->insert(
        	[
        		'cafe_id' => $cafe->id,
        		'day' => 0,
        		'open_hour' => '16:00',
        		'close_hour' => '23:00',
        	]
        );
        DB::table('operational_cafe')->insert(
        	[
        		'cafe_id' => $cafe->id,
        		'day' => 1,
        		'open_hour' => '11:00',
        		'close_hour' => '23:00',
        	]
        );
        DB::table('operational_cafe')->insert(
        	[
        		'cafe_id' => $cafe->id,
        		'day' => 2,
        		'open_hour' => '11:00',
        		'close_hour' => '23:00',
        	]
        );
        DB::table('operational_cafe')->insert(
        	[
        		'cafe_id' => $cafe->id,
        		'day' => 3,
        		'open_hour' => '11:00',
        		'close_hour' => '23:00',
        	]
        );
    	DB::table('operational_cafe')->insert(
        	[
        		'cafe_id' => $cafe->id,
        		'day' => 5,
        		'open_hour' => '14:00',
        		'close_hour' => '23:00',
        	]
        );
        DB::table('operational_cafe')->insert(
        	[
        		'cafe_id' => $cafe->id,
        		'day' => 6,
        		'open_hour' => '11:00',
        		'close_hour' => '23:00',
        	]
        );

        DB::table('menu_cafe')->insert(
        	[
        		'cafe_id' 	=> $cafe->id,
        		'name' 		=> 'Blepot Burger',
        		'price' 	=> '35000',
        		'images'	=> 'burger/Blepot_Burger.jpg',
        		'tag'		=> 'Halal, Burger',
        		'category'	=> 'Makanan',
        		'status'	=> 1,
        		'desc' 		=> 'Blepot + daging sapi/ayam + roti'
        	]
        );
        DB::table('menu_cafe')->insert(
        	[
        		'cafe_id' 	=> $cafe->id,
        		'name' 		=> 'Ndutz Blepot Burger',
        		'price' 	=> '50000',
        		'images'	=> 'burger/ndutz-blepot-chicken-burger.jpg',
        		'tag'		=> 'Halal, Burger',
        		'category'	=> 'Makanan',
        		'status'	=> 1,
        		'desc' 		=> 'Blepot  + daging sapi/ayam + roti + telur + keju'
        	]
    	);
    	DB::table('menu_cafe')->insert(
        	[
        		'cafe_id' 	=> $cafe->id,
        		'name' 		=> 'Cheese Blepot Burger',
        		'price' 	=> '32000',
        		'images'	=> 'burger/25651971_eKEchY2Il16yH3CsHPpziGw6JQ4d8TDQpD2-VQWqLBE.jpg',
        		'tag'		=> 'Halal, Burger',
        		'category'	=> 'Makanan',
        		'status'	=> 1,
        		'desc' 		=> 'Keju + telur + daging sapi/ayam + roti'
        	]
    	);
    	DB::table('menu_cafe')->insert(
        	[
        		'cafe_id' 	=> $cafe->id,
        		'name' 		=> 'Roti Bakar Ong Kaye',
        		'price' 	=> '20000',
        		'images'	=> 'burger/IMG_20151104_152251_HDR.jpg',
        		'tag'		=> 'Halal, roti bakar',
        		'category'	=> 'Makanan',
        		'status'	=> 1,
        		'desc' 		=> 'Roti bakar + keju + susu coklat + coklat meses'
        	]
    	);
    	DB::table('menu_cafe')->insert(
        	[
        		'cafe_id' 	=> $cafe->id,
        		'name' 		=> 'Jus Pokat',
        		'price' 	=> '15000',
        		'images'	=> 'burger/23036227_b8jVHAX4PEfp0GQfXv3hy9mHBQDKDUW6jJ9ZZQK2pjs.jpg',
        		'tag'		=> 'Halal, Burger',
        		'category'	=> 'Minuman',
        		'status'	=> 1,
        	]
    	);
        DB::table('menu_cafe')->insert(
        	[
        		'cafe_id' 	=> $cafe->id,
        		'name' 		=> 'Jus Kuini',
        		'price' 	=> '16000',
        		'images'	=> 'burger/23036227_b8jVHAX4PEfp0GQfXv3hy9mHBQDKDUW6jJ9ZZQK2pjs.jpg',
        		'tag'		=> 'Halal, Burger',
        		'category'	=> 'Minuman',
        		'status'	=> 1,
        	]
    	);
    	DB::table('menu_cafe')->insert(
        	[
        		'cafe_id' 	=> $cafe->id,
        		'name' 		=> 'Red Velvet Milkshake',
        		'price' 	=> '16000',
        		'images'	=> 'burger/98REDVELVETmilkshake-garasi18K.jpg',
        		'tag'		=> 'Halal, Burger',
        		'category'	=> 'Minuman',
        		'status'	=> 1,
        		'desc'		=> 'Minuman Coklat dingin + Es Krim'
        	]
    	);

        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Teh manis dingin',
                'price'     => '6000',
                'images'    => 'burger/es-teh-manis.jpg',
                'tag'       => 'Halal, Burger',
                'category'  => 'Minuman',
                'status'    => 1,
                'desc'      => 'Teh manis dingin'
            ]
        );

        $album = AlbumGallery::create(
            [
                'user_id' =>  $user->id,
                'name' => 'slider'
            ]
        );

        DB::table('gallery')->insert(
        	[
        		'user_id'  	=> $user->id,
        		'album_id' 	=> $album->id,
        		'filename' 	=> 'burger/the-menu_cafe.jpg',
        		'title'    	=> 'Daftar menu Rumah Burger',
        		'status'	=> 1
        	]
    	);

    	DB::table('gallery')->insert(
        	[
        		'user_id'  	=> $user->id,
        		'album_id' 	=> $album->id,
        		'filename' 	=> 'burger/DSC_0383.jpg',
        		'title'    	=> 'View Cafe Rumah Burger',
        		'status'	=> 1
        	]
    	);
        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'burger/the-menus.jpg',
                'title'     => 'View Cafe Rumah Burger',
                'status'    => 1
            ]
        );
    }
}
