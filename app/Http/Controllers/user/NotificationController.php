<?php

namespace Tenomed\Http\Controllers\user;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // return($current = new Carbon());
        $user = Auth::user()->id;
        //return($user);
        $data= DB::table('reservations')
                ->leftjoin('payments', 'reservations.id','=','payments.reservation_id')
                ->select('reservations.id','reservations.name','reservations.email','reservations.total','reservations.reserv_code','reservations.persons','reservations.status',DB::raw('CONCAT(reservations.bookingDate, " ", reservations.bookingTime) AS bookingDue'),'payments.id as p_id','payments.pengirim','payments.bank' )
                ->where('reservations.user_id',$user)
                ->orderBy('reservations.bookingDate', 'desc')
                ->paginate(10);   
        //return($data);

        //return($data);
        return view('user.notification')->with(['data'=>$data]);
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
}
