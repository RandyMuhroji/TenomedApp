<?php

namespace Tenomed\Http\Controllers\user;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;

use Tenomed\Models\User;
use Tenomed\Models\Cafe;
use Auth;
use Validator;
use Hash;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user');
    }

    public function changePassword(Request $request)
    {
        $request_data = $request->All();

        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        
        $current_password = Auth::User()->password;           
        if(Hash::check($request_data['current_password'], $current_password))
        {           
                                    
            $obj_user = User::find(Auth::user()->id);
            $obj_user->password = Hash::make($request_data['password']);;
            $obj_user->save(); 
            return redirect()->route('setting');  
        }
        else
        {           
            $error = "Please enter correct current password";
            return redirect()->route('setting')->with('current_password', $error);  
        }
    }
}
