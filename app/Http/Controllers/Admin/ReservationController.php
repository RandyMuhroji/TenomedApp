<?php

namespace Tenomed\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin');
    }


    public function index()
    {
         $reservations = DB::select('select * from reservations');

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
}
