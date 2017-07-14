<?php

namespace Tenomed\Http\Controllers\Admin;

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
        // $cafes = DB::select('select c.id, c.name as name, u.name as owner, c.address, c.status  from cafes c inner join users u on c.user_id = u.id');


        // $params = [
        //     'title' => 'Cafes Listing',
        //     'cafes' => $cafes,
        // ];
        return view('admin.reservation.reservation_list');//->with($params);
    }
}
