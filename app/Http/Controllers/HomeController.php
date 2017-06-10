<?php

namespace Tenomed\Http\Controllers;

use Illuminate\Http\Request;

use Tenomed\Models\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  		// $user = new User;
		// $user->name = "Randy Muhroji";
		// $user->email = "randy@muhroji.com";
		// $user->password = bcrypt('randy12345');
		// $user->save();

        return view('welcome');
    }
}
