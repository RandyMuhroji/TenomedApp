<?php

namespace Tenomed\Http\Controllers\owner;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
class reservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = DB::select("select r.id ,r.name ,r.reserv_code ,r.bookingDate ,r.bookingTime ,r.status ,r.total ,c.name ,c.id cafe_id ,c.user_id from reservations r inner join cafes c on r.cafe_id=c.id where c.user_id='".Auth::user()->id."'");
        //return $reservations;

         $users = DB::select('select u.* from users u inner join cafes c on u.id = c.user_id');

         $cafes = DB::select('select c.* from users u inner join cafes c on u.id = c.user_id');

        //return $users;

        $params = [
            'title' => 'Reservation Listing',
            'cafes' => $cafes,
            'users' => $users,
            'reservations' => $reservations
        ];
        //return $params;
        return view('owner.reservations.reservation_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    function cekPayment(){
        $a=($_GET['id']);
        $cek = DB::select("select * from payments where reserv_code='".$a."'");
        if(count($cek)){
            return("aada");
        }else{
            return("gadak");
        }
     }
}
