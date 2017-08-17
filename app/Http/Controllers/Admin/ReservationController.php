<?php

namespace Tenomed\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;

use Tenomed\Models\Reservation;
use Tenomed\Models\Payment;


class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin');
    }


    public function index()
    {
         $reservations = DB::select('select r.*,p.pengirim,p.bank,p.image,p.status as pStatus from reservations r inner join payments p on r.id=p.reservation_id  where p.status!="1"');

         $users = DB::select('select u.* from users u inner join cafes c on u.id = c.user_id');

         $cafes = DB::select('select c.* from users u inner join cafes c on u.id = c.user_id');

        //return $users;
        $params = [
            'title' => 'Reservation Listing',
            'cafes' => $cafes,
            'users' => $users,
            'reservations' => $reservations
        ];
        return view('admin.reservation.reservation_list')->with($params);
    }
    public function confirmPayment(Request $request){
        DB::select('update reservations set status="'.$request->status.'" where id="'.$request->id_booking.'"');
        DB::select('update payments set status="'.$request->status.'" where reservation_id="'.$request->id_booking.'"');
        //return($request->id_booking);
        return redirect('admin/reservation');
    }
}
