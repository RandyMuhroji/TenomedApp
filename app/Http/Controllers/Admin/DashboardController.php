<?php

namespace Tenomed\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use DB;


class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin');
        // $this->middleware('permission:create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:delete', ['only' => ['show', 'delete']]);
    }
    public function index(){
        $user = DB::select('SELECT COUNT(u.id) total, u.status FROM users u inner join role_user ru on u.id=ru.user_id where ru.role_id=3 and u.status=1 GROUP BY u.status'); 
        $cafe = DB::select('SELECT COUNT(id) total, status from cafes WHERE status=1 GROUP BY status '); 
        $populer = DB::select('SELECT COUNT(r.id)total,c.id,c.name,c.address,c.image FROM reviews r INNER JOIN cafes c on r.cafe_id=c.id where c.status=1 GROUP BY c.id,c.name,c.address,c.image ORDER by total desc limit 5 '); 
       // return($user);
    	return view('admin.dashboard')->with(['user'=>$user,'cafe'=>$cafe,'populer'=>$populer]);
    }
}
