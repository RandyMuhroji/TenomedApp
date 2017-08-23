<?php

namespace Tenomed\Http\Controllers\Owner;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:owner');
    }

    public function index()
    {
    	$id = Auth::user()->id;
    	$status = DB::select('select c.id,c.status from cafes c inner join users u on c.user_id=u.id where u.id = '.$id);
        $pending=DB::select('SELECT COUNT(id) id,status FROM reservations where cafe_id='.$status[0]->id.' and status=0 GROUP BY status ');
        $sukses=DB::select('SELECT COUNT(id) id,status FROM reservations where cafe_id='.$status[0]->id.' and status=1 GROUP BY status ');
        $cancel=DB::select('SELECT COUNT(id) id,status FROM reservations where cafe_id='.$status[0]->id.' and status=2 GROUP BY status ');
        $done=DB::select('SELECT COUNT(id) id,status FROM reservations where cafe_id='.$status[0]->id.' and status=3 GROUP BY status ');
        $populerCafe = DB::select('SELECT COUNT(r.id)total,c.id,c.name,c.kecamatan,c.address,c.image FROM reviews r Right JOIN cafes c on r.cafe_id=c.id where c.status=1 GROUP BY c.id,c.name,c.kecamatan,c.address,c.image ORDER by total desc limit 5'); 
        $topTrans=DB::select('select count(c.id) total,c.id, c.name,c.kecamatan,c.image from reservations r right JOIN cafes c on r.cafe_id=c.id where c.status=1 GROUP by c.id,c.name,c.kecamatan,c.image limit 5 ');
        //return $topTrans;
        $status = $status[0]->status;
        return view('owner.dashboard')->with(['status'=>$status,'pending'=>$pending,'sukses'=>$sukses,'cancel'=>$cancel,'done'=>$done,'populerCafe'=>$populerCafe,'topTrans'=>$topTrans]);

    }
}
