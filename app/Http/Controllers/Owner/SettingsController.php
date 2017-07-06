<?php

namespace Tenomed\Http\Controllers\owner;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:owner');
    }

    public function account()
    {
    	return view('owner.settings.account');
    }
    public function accountStore()
    {
    	return "account store";
    }

    public function cafe()
    {
    	return view('owner.settings.cafe');
    }
    public function cafeStore()
    {
    	return "account store";
    }
}
