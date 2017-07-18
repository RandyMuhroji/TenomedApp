<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Tenomed\Models\User;
use Tenomed\Models\Role;
use Tenomed\Models\Menu;
use Tenomed\Models\Cafe;
use Tenomed\Models\OperationalCafe;
use Tenomed\Models\AlbumGallery;


class DummyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Cafe 1

    	$user = User::create([
                'name' => 'Rumah Burger',
                'email'=> 'rumah@burger.com',
                'password' => bcrypt('owner'),
                'status' => 1,
            ]);

        $role = Role::find(2);
        $user->attachRole($role);

        $address = 'Jalan Medan Area Selatan Gg. Puri No. 909A/08, Medan Area, Sukaramai I, Medan Area, Kota Medan, Sumatera Utara 20215, Indonesia';
        $arrAddress = explode(',',$address);

        $kec = $arrAddress[2];
        $kel = $arrAddress[1];


        $cafe = Cafe::create(
            [
                'user_id' => $user->id,
                'name' => 'Rumah Burger',
                'address' => $address,
                'phone' => '082363071285',
                'lat' => '3.5778315',
                'long' => '98.70135019999998',
                'kecamatan' => $kec,
                'kelurahan' => $kel,
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
                'images'    => 'burger/es-teh-manis.jpg.jpg',
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
        		'filename' 	=> 'burger/rumah-burger-medan.jpg',
        		'title'    	=> 'View Cafe Rumah Burger',
        		'status'	=> 1
        	]
    	);

        //cafe2

        $user = User::create([
                'name' => 'Ayam Penyet Rahmat',
                'email'=> 'ayampenyet@rahmat.com',
                'password' => bcrypt('owner'),
                'status' => 1,
            ]);

        $role = Role::find(2);
        $user->attachRole($role);

        $address = 'Jl. Letda Sudjono, Bandar Selamat, Medan Tembung, Kota Medan, Sumatera Utara 20223, Indonesia';
        $arrAddress = explode(',',$address);

        $kec = $arrAddress[2];
        $kel = $arrAddress[1];


        $cafe = Cafe::create(
            [
                'user_id' => $user->id,
                'name' => 'Ayam Penyet Rahmat',
                'address' => $address,
                'phone' => '061-7331875',
                'lat' => '3.597696',
                'long' => '98.71657600000003',
                'kecamatan' => $kec,
                'kelurahan' => $kel,
                'rating' => 0,
                'status' => 1,
                'seat' => 120,
                'web' => 'http://ayampenyetrahmat.com',
                'facebook' => 'http://facebook.com/ayampenyetrahmat',
                'twitter' => 'http://twitter.com/ayampenyetrahmat',
                'linkedin' => 'http://linkedin.com/ayampenyetrahmat',
            ]
        );

        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 0,
                'open_hour' => '10:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 1,
                'open_hour' => '10:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 2,
                'open_hour' => '10:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 3,
                'open_hour' => '10:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 4,
                'open_hour' => '10:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 5,
                'open_hour' => '13:30',
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
                'cafe_id'   => $cafe->id,
                'name'      => 'Ayam Penyet Sambal Pedas',
                'price'     => '13000',
                'images'    => 'APrahmat/Resep-Ayam-Penyet-dan-Sambal-Pedas-Lezat.png',
                'tag'       => 'Ayam Penyet, Halal',
                'category'  => 'Makanan',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ayam Penyet Sambal Ijo',
                'price'     => '13000',
                'images'    => 'APrahmat/resep-ayam-penyel-sambal-cabai-hijau.jpg',
                'tag'       => 'Halal, Ayam Penyet',
                'category'  => 'Makanan',
                'status'    => 1,
            ]
        );
       DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ayam Penyet Komplit mantap',
                'price'     => '32000',
                'images'    => 'APrahmat/resep-ayam-penyel-sambal-cabai-hijau.jpg',
                'tag'       => 'Halal, Ayam Penyet',
                'category'  => 'Makanan',
                'status'    => 1,
                'desc'      => 'Nasi + Ayam Penyet + Lalapan + Minuman Pilihan'
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ayam Penyet Komplit sederhna',
                'price'     => '25000',
                'images'    => 'APrahmat/resep-ayam-penyel-sambal-cabai-hijau.jpg',
                'tag'       => 'Halal, Ayam Penyet',
                'category'  => 'Makanan',
                'status'    => 1,
                'desc'      => 'Nasi + Ayam Penyet + Lalapan + Teh Manis Dingin'
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ice choco float',
                'price'     => '15000',
                'images'    => 'APrahmat/ombe cafe.jpg',
                'tag'       => 'Jus, float',
                'category'  => 'Minuman',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ice Drink ',
                'price'     => '13000',
                'images'    => 'APrahmat/ice-drink-4.jpg',
                'tag'       => 'jus',
                'category'  => 'Minuman',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Teh Manis Dingin',
                'price'     => '6000',
                'images'    => 'APrahmat/es-teh-manis.jpg',
                'tag'       => 'Mandi',
                'category'  => 'Makanan',
                'status'    => 1,
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
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'APrahmat/resep-ayam-penyel-sambal-cabai-hijau.jpg',
                'title'     => 'Ayam Penyet Sambal Hijau',
                'status'    => 1
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'APrahmat/foody-ayam-goreng.jpg',
                'title'     => 'View Ayam Penyet Rahmat',
                'status'    => 1
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'APrahmat/12825945_1270302919663658_1350279316_n.jpg',
                'title'     => 'View Ayam Penyet Rahmat',
                'status'    => 1
            ]
        );

        //cafe3

        $user = User::create([
                'name' => 'Kopi Sadis',
                'email'=> 'kopi@sadis.com',
                'password' => bcrypt('owner'),
                'status' => 1,
            ]);

        $role = Role::find(2);
        $user->attachRole($role);

        $address = 'Jl. Nusantara No.5, Hutan, Percut Sei Tuan, Kota Medan, Sumatera Utara 20371, Indonesia';
        $arrAddress = explode(',',$address);

        $kec = $arrAddress[2];
        $kel = $arrAddress[1];


        $cafe = Cafe::create(
            [
                'user_id' => $user->id,
                'name' => 'Kopi Sadis',
                'address' => $address,
                'phone' => '061-7331875',
                'lat' => '3.597525',
                'long' => '98.71657600000003',
                'kecamatan' => $kec,
                'kelurahan' => $kel,
                'rating' => 0,
                'status' => 1,
                'seat' => 60,
                'web' => 'http://kopisadis.com',
                'facebook' => 'http://facebook.com/kopisadis',
                'twitter' => 'http://twitter.com/kopisadis',
                'linkedin' => 'http://linkedin.com/kopisadis',
            ]
        );

        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 0,
                'open_hour' => '16:00',
                'close_hour' => '24:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 1,
                'open_hour' => '14:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 2,
                'open_hour' => '14:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 3,
                'open_hour' => '14:00',
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
                'open_hour' => '14:00',
                'close_hour' => '23:00',
            ]
        );

        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Crispy Bakso',
                'price'     => '13000',
                'images'    => 'kopisadis/P_20160113_180741_BF-640x404.jpg',
                'tag'       => 'Bakso bakar, Halal, Crispy',
                'category'  => 'Makanan',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ayam Penyet Sambal Ijo',
                'price'     => '13000',
                'images'    => 'APrahmat/resep-ayam-penyel-sambal-cabai-hijau.jpg',
                'tag'       => 'Halal, Ayam Penyet',
                'category'  => 'Makanan',
                'status'    => 1,
            ]
        );
       DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ayam Penyet Komplit mantap',
                'price'     => '32000',
                'images'    => 'APrahmat/resep-ayam-penyel-sambal-cabai-hijau.jpg',
                'tag'       => 'Halal, Ayam Penyet',
                'category'  => 'Makanan',
                'status'    => 1,
                'desc'      => 'Nasi + Ayam Penyet + Lalapan + Minuman Pilihan'
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ayam Penyet Komplit sederhna',
                'price'     => '25000',
                'images'    => 'APrahmat/resep-ayam-penyel-sambal-cabai-hijau.jpg',
                'tag'       => 'Halal, Ayam Penyet',
                'category'  => 'Makanan',
                'status'    => 1,
                'desc'      => 'Nasi + Ayam Penyet + Lalapan + Teh Manis Dingin'
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ice choco float',
                'price'     => '15000',
                'images'    => 'APrahmat/ombe cafe.jpg',
                'tag'       => 'Jus, float',
                'category'  => 'Minuman',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ice Drink ',
                'price'     => '13000',
                'images'    => 'APrahmat/ice-drink-4.jpg',
                'tag'       => 'jus',
                'category'  => 'Minuman',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Teh Manis Dingin',
                'price'     => '6000',
                'images'    => 'APrahmat/es-teh-manis.jpg',
                'tag'       => 'Mandi',
                'category'  => 'Makanan',
                'status'    => 1,
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
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'APrahmat/resep-ayam-penyel-sambal-cabai-hijau.jpg',
                'title'     => 'Ayam Penyet Sambal Hijau',
                'status'    => 1
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'APrahmat/foody-ayam-goreng.jpg',
                'title'     => 'View Ayam Penyet Rahmat',
                'status'    => 1
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'APrahmat/12825945_1270302919663658_1350279316_n.jpg',
                'title'     => 'View Ayam Penyet Rahmat',
                'status'    => 1
            ]
        );

    }
}
