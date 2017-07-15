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
    	$status = DB::select('select c.status from cafes c inner join users u on c.user_id=u.id where u.id = '.$id);
    	$status = $status[0]->status;
        return view('owner.dashboard')->with('status',$status);
    }
}
