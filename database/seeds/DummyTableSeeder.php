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
        //Cafe1

    	$user = User::create([
                'name' => 'Rumah Blepot',
                'email'=> 'rumah@blepot.com',
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
                'name' => 'Rumah Blepot',
                'address' => $address,
                'phone' => '082363071285',
                'lat' => '3.5778315',
                'long' => '98.70135019999998',
                'kecamatan' => $kec,
                'kelurahan' => $kel,
                'image' => 'burger/11143669_10153661731517985_1423348416227249367_n.jpg',
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
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Free Wifi',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Mushala',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Private Room',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Smoking Area',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Full AC',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Parking',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Terrace',
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
                'image' => 'APrahmat/12825945_1270302919663658_1350279316_n.jpg',
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
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Free Wifi',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Mushala',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Private Room',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'No-Smoking Area',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Full AC',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Parking',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Terrace',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Vine',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Bar',
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
                'image' => 'kopisadis/11182188_903145413061240_6299424958647968481_n.jpg'
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
                'day' => 4,
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
                'name'      => 'Pisang Goreng Cripsy',
                'price'     => '15000',
                'images'    => 'kopisadis/12277553_1111650785526924_417357877_n.jpg',
                'tag'       => 'Halal, Pisang Goreng',
                'category'  => 'Makanan',
                'status'    => 1,
            ]
        );
       DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Roti Bakart',
                'price'     => '32000',
                'images'    => 'kopisadis/CIMG2915.JPG',
                'tag'       => 'Halal, Ayam Penyet',
                'category'  => 'Makanan',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ayam Penyet Komplit',
                'price'     => '28000',
                'images'    => 'kopisadis/13298230_1721072608161102_1376107349_n',
                'tag'       => 'Halal, Ayam Penyet',
                'category'  => 'Makanan',
                'status'    => 1,
                'desc'      => 'Nasi + Ayam Penyet + Lalapan + Teh Manis Dingin'
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Vanilla Milkshake',
                'price'     => '15000',
                'images'    => 'kopisadis/AnekaJus.jpg',
                'tag'       => 'Jus,Milkshake',
                'category'  => 'Minuman',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Strawberry Milkshake',
                'price'     => '15000',
                'images'    => 'kopisadis/AnekaJus.jpg',
                'tag'       => 'Jus,Milkshake',
                'category'  => 'Minuman',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Jus Alpukat',
                'price'     => '15000',
                'images'    => 'kopisadis/kopi-300x187.jpg',
                'tag'       => 'Jus,Milkshake',
                'category'  => 'Minuman',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Kopi Crimer',
                'price'     => '12000',
                'images'    => 'kopisadis/images.jpg',
                'tag'       => 'Kopi',
                'category'  => 'Minuman',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Kopi spesial sadis',
                'price'     => '20000',
                'images'    => 'kopisadis/kopi-300x187.jpg',
                'tag'       => 'Kopi',
                'category'  => 'Minuman',
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
                'filename'  => 'kopisadis/SAM_2893.jpg',
                'title'     => 'List menu Kopi Sadis Cafe',
                'status'    => 1
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'kopisadis/Kopi Sadis.jpg',
                'title'     => 'View Kopi Sadis Cafe',
                'status'    => 1
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'kopisadis/the kopi sadis tembung.JPG',
                'title'     => 'View Ayam Penyet Rahmat',
                'status'    => 1
            ]
        );

        $album = AlbumGallery::create(
            [
                'user_id' =>  $user->id,
                'name' => 'Kopi Sadis'
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'kopisadis/the kopi sadis tembung.JPG',
                'title'     => 'View Ayam Penyet Rahmat',
                'status'    => 1
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'kopisadis/the kopi sadis tembung.JPG13298230_1721072608161102_1376107349_n.jpg',
                'title'     => 'View Ayam Penyet Rahmat',
                'status'    => 1
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'kopisadis/11254280_751695444940062_1761233298_n.jpg',
                'title'     => 'View Ayam Penyet Rahmat',
                'status'    => 1
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'kopisadis/IMG_0499-650x404.jpg',
                'title'     => 'View Ayam Penyet Rahmat',
                'status'    => 1
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'kopisadis/kopi-300x187.jpg',
                'title'     => 'View Ayam Penyet Rahmat',
                'status'    => 1
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Free Wifi',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Mushala',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Private Room',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'No-Smoking Area',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Full AC',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Parking',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Terrace',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Meeting Room',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Meeting Proyektor',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Live Music',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Band Live on satuday Night',
            ]
        );
        //cafe4

        $user = User::create([
                'name' => 'Ayam Penyet Joko Solo',
                'email'=> 'ayampenyet@jokosolo.com',
                'password' => bcrypt('owner'),
                'status' => 1,
            ]);

        $role = Role::find(2);
        $user->attachRole($role);

        $address = 'Jl. Putri Merak Jingga No.9, Kesawan, Medan Bar., Kota Medan, Sumatera Utara 20236, Indonesia';
        $arrAddress = explode(',',$address);

        $kec = $arrAddress[2];
        $kel = $arrAddress[1];


        $cafe = Cafe::create(
            [
                'user_id' => $user->id,
                'name' => 'Ayam Penyet Joko Solo',
                'address' => $address,
                'phone' => '061-7331875',
                'lat' => '3.6097231',
                'long' => '98.67401919999998',
                'kecamatan' => $kec,
                'kelurahan' => $kel,
                'rating' => 0,
                'status' => 1,
                'seat' => 140,
                'image' => 'APrahmat/photo0jpg.jpg',
                'web' => 'http://ayampenyetjokosolo.com',
                'facebook' => 'http://facebook.com/ayampenyetjokosolo',
                'twitter' => 'http://twitter.com/ayampenyetjokosolo',
                'linkedin' => 'http://linkedin.com/ayampenyetjokosolo',
            ]
        );

        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 0,
                'open_hour' => '15:00',
                'close_hour' => '24:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 1,
                'open_hour' => '12:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 2,
                'open_hour' => '12:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 3,
                'open_hour' => '12:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 4,
                'open_hour' => '12:00',
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
                'close_hour' => '24:00',
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
                'title'     => 'View Ayam Jakarta',
                'status'    => 1
            ]
        );

         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Hotspots Area',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Mushala',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Smoking Area',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Full AC',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Parking',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Terrace',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Bar',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Vine',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Live Music',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Band Live on satuday Night',
            ]
        );
        //cafe5

        $user = User::create([
                'name' => 'Ayam Penyet Jakarta',
                'email'=> 'ayampenyet@jakarta.com',
                'password' => bcrypt('owner'),
                'status' => 1,
            ]);

        $role = Role::find(2);
        $user->attachRole($role);

        $address = 'Jl. Yos Sudarso No.47, Glugur Kota, Medan Bar., Kota Medan, Sumatera Utara 20115, Indonesia';
        $arrAddress = explode(',',$address);

        $kec = $arrAddress[2];
        $kel = $arrAddress[1];


        $cafe = Cafe::create(
            [
                'user_id' => $user->id,
                'name' => 'Ayam Penyet Jakarta',
                'address' => $address,
                'phone' => '061-7331875',
                'lat' => '3.6097231',
                'long' => '98.67401919999998',
                'kecamatan' => $kec,
                'kelurahan' => $kel,
                'rating' => 0,
                'status' => 1,
                'seat' => 140,
                'image' => 'APrahmat/images.jpg',
                'web' => 'http://ayampenyetjokosolo.com',
                'facebook' => 'http://facebook.com/ayampenyetjakarta',
                'twitter' => 'http://twitter.com/ayampenyetjakarta',
                'linkedin' => 'http://linkedin.com/ayampenyetjakarta',
            ]
        );

        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 0,
                'open_hour' => '15:00',
                'close_hour' => '24:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 1,
                'open_hour' => '12:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 2,
                'open_hour' => '12:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 3,
                'open_hour' => '12:00',
                'close_hour' => '23:00',
            ]
        );
        DB::table('operational_cafe')->insert(
            [
                'cafe_id' => $cafe->id,
                'day' => 4,
                'open_hour' => '12:00',
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
                'close_hour' => '24:00',
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
        DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Hotspots Area',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Mushala',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Smoking Area',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Full AC',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Parking',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Terrace',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Live Music',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Band Live on satuday Night',
            ]
        );

        //Cafe6

        $user = User::create([
                'name' => 'Rock Burger Medan',
                'email'=> 'rockburger@medan.com',
                'password' => bcrypt('owner'),
                'status' => 1,
            ]);

        $role = Role::find(2);
        $user->attachRole($role);

        $address = 'Jalan Halat No.32, Ps. Merah Bar., Medan Kota, Kota Medan, Sumatera Utara 20215, Indonesia';
        $arrAddress = explode(',',$address);

        $kec = $arrAddress[2];
        $kel = $arrAddress[1];


        $cafe = Cafe::create(
            [
                'user_id' => $user->id,
                'name' => 'Rock Burger Medan',
                'address' => $address,
                'phone' => '082363071285',
                'lat' => '3.5723272',
                'long' => '98.69095029999994',
                'kecamatan' => $kec,
                'kelurahan' => $kel,
                'image' => '72736376_kZx-4jOP-NoWqLIJEsSpuRM4rBdWGebQ9x6eippIj7s.jpg',
                'rating' => 0,
                'status' => 1,
                'seat' => 30,
                'web' => 'http://rockburger.com',
                'facebook' => 'http://facebook.com/rockburger',
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
                'cafe_id'   => $cafe->id,
                'name'      => 'Blepot Burger',
                'price'     => '35000',
                'images'    => 'burger/Blepot_Burger.jpg',
                'tag'       => 'Halal, Burger',
                'category'  => 'Makanan',
                'status'    => 1,
                'desc'      => 'Blepot + daging sapi/ayam + roti'
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Ndutz Blepot Burger',
                'price'     => '50000',
                'images'    => 'burger/ndutz-blepot-chicken-burger.jpg',
                'tag'       => 'Halal, Burger',
                'category'  => 'Makanan',
                'status'    => 1,
                'desc'      => 'Blepot  + daging sapi/ayam + roti + telur + keju'
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Cheese Blepot Burger',
                'price'     => '32000',
                'images'    => 'burger/25651971_eKEchY2Il16yH3CsHPpziGw6JQ4d8TDQpD2-VQWqLBE.jpg',
                'tag'       => 'Halal, Burger',
                'category'  => 'Makanan',
                'status'    => 1,
                'desc'      => 'Keju + telur + daging sapi/ayam + roti'
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Roti Bakar Ong Kaye',
                'price'     => '20000',
                'images'    => 'burger/IMG_20151104_152251_HDR.jpg',
                'tag'       => 'Halal, roti bakar',
                'category'  => 'Makanan',
                'status'    => 1,
                'desc'      => 'Roti bakar + keju + susu coklat + coklat meses'
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Jus Pokat',
                'price'     => '15000',
                'images'    => 'burger/23036227_b8jVHAX4PEfp0GQfXv3hy9mHBQDKDUW6jJ9ZZQK2pjs.jpg',
                'tag'       => 'Halal, Burger',
                'category'  => 'Minuman',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Jus Kuini',
                'price'     => '16000',
                'images'    => 'burger/23036227_b8jVHAX4PEfp0GQfXv3hy9mHBQDKDUW6jJ9ZZQK2pjs.jpg',
                'tag'       => 'Halal, Burger',
                'category'  => 'Minuman',
                'status'    => 1,
            ]
        );
        DB::table('menu_cafe')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'      => 'Red Velvet Milkshake',
                'price'     => '16000',
                'images'    => 'burger/98REDVELVETmilkshake-garasi18K.jpg',
                'tag'       => 'Halal, Burger',
                'category'  => 'Minuman',
                'status'    => 1,
                'desc'      => 'Minuman Coklat dingin + Es Krim'
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
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'burger/the-menu_cafe.jpg',
                'title'     => 'Daftar menu Rumah Burger',
                'status'    => 1
            ]
        );

        DB::table('gallery')->insert(
            [
                'user_id'   => $user->id,
                'album_id'  => $album->id,
                'filename'  => 'burger/DSC_0383.jpg',
                'title'     => 'View Cafe Rumah Burger',
                'status'    => 1
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
        DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Hotspots Area',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Mushala',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Smoking Area',
            ]
        );
          DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Full AC',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Parking',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Terrace',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Bar',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Vine',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Live Music',
            ]
        );
         DB::table('highlights')->insert(
            [
                'cafe_id'   => $cafe->id,
                'name'  => 'Band Live on satuday Night',
            ]
        );

    }
}