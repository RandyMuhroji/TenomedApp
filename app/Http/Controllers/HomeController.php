<?php

namespace Tenomed\Http\Controllers;

use Illuminate\Http\Request;

use Tenomed\Models\User;
use Illuminate\Support\Facades\Input;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  		$rates = DB::select("select c.id,c.name,c.images,c.seat,rs.rate,rs.jlh,rs.rate/rs.jlh total from cafes c inner join (SELECT cafe_id,sum(rate) rate, COUNT(user_id) jlh from reviews WHERE parent_id=0 GROUP BY cafe_id ) rs on c.id=rs.cafe_id ");
        return view('welcome')->with(['rates'=>$rates]);
    }
}
