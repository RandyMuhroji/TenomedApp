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
  		$rate= DB::select("select c.id,c.name,c.image,c.seat,rs.rate,rs.jlh,rs.rate/rs.jlh total from cafes c inner join (SELECT cafe_id,sum(rate) rate, COUNT(user_id) jlh from reviews WHERE parent_id=0 GROUP BY cafe_id ) rs on c.id=rs.cafe_id order by total desc LIMIT 8");

        $cafes = DB::select("select * from cafes where status = 1 order by rating ");

        $reviews = DB::select("select cafe_id,count(id) total from reviews group by(cafe_id)"); 

        $params = [
            'cafes'   => $cafes,
            'reviews' => $reviews
        ];

        return view('welcome')->with(['rate'=>$rate]);
    }
}
