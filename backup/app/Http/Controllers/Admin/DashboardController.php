<?php

namespace Tenomed\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;

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
    	return view('admin.dashboard');
    }
}
