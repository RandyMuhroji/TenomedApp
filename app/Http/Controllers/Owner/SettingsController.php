<?php

namespace Tenomed\Http\Controllers\owner;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;

use Tenomed\Models\User;
use Auth;
use Validator;
use Hash;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:owner');
    }

    public function account()
    {
        try
        {
            $user = User::findOrFail(Auth::user()->id);


            if ($user->id != Auth::user()->id) {
                return response()->view('errors.'.'403');
            }
            $params = [
                'title' => 'Edit Profile',
                'user' => $user,
            ];

            return view('owner.settings.account')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
    public function accountStore(Request $request)
    {
    	return "account store";
    }

    public function cafe()
    {
    	return view('owner.settings.cafe');
    }
    public function cafeStore(Request $request)
    {
    	return "account store";
    }

    public function changePassword_rules(array $data)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);

        $validator = Validator::make($data, [
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',     
        ], $messages);

      return $validator;
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
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['new_password']);;
            $obj_user->save(); 
            return redirect()->route('owner_account')->with('success', "Password save changes");
        }
        else
        {           
            $error = "Please enter correct current password";
            return redirect()->route('owner_account')->with('current_password', $error);  
        }
    }
}
