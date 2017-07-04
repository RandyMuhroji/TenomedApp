<?php

namespace Tenomed\Http\Controllers\Owner;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:owner');
    }

    public function index()
    {
        return view('owner.dashboard');
    }
}
