<?php

namespace Tenomed\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;

use Tenomed\Models\User;
use Tenomed\Models\Cafe;
use Tenomed\Models\Role;
use Auth;
use Validator;
use Hash;
use Mail;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin');
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

            return view('admin.settings.account')->with($params);
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
        //return $request->file();
        try
        {
        	$id = Auth::user()->id;
            $user = User::findOrFail($id);

            $this->validate($request, [
                'name' => 'required',
            ]);

            $user->name =  $request->input('name');
            $user->bio = $request->input('bio');
            $user->address = $request->input('address');
            $user->phone = $request->input('phone');

            $picture = "";
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = md5($filename).'.'.$extension;
                $destinationPath = base_path() . '\public\images';
                $file->move($destinationPath, $picture);
                $user->avatar = $picture;
            }

            

            $user->save();

            return redirect()->route('admin_account')->with('success', trans('general.form.flash.updated',['name' => $user->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
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
            return redirect()->route('admin_account')->with('success', "Password save changes");
        }
        else
        {           
            $error = "Please enter correct current password";
            return redirect()->route('admin_account')->with('current_password', $error);  
        }
    }

    public function showAdmin()
    {
        $users = DB::select('select * from role_user r inner join users u on r.user_id = u.id where role_id = 1');

        //return $users;
        $params = [
            'title' => 'Admin Listing',
            'users' => $users,
        ];
        return view('admin.settings.administrator')->with($params);
    }

    public function addAdmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'status' => 1,
        ]);

        $data = [
             'name'      => $request->input('name'),
             'password'  => $request->input('password'),
             'email' => $request->input('email')
            ];

        Mail::send(['html' => 'mail.new_cafe'], $data, function($message){
             $message->to($request->input('email'))->subject('Password Admin Login - TENOMED');
             $message->from('tenomed@gmail01.com','Tenomed');
        });

        $role = Role::find(1);

        $user->attachRole($role);

        return redirect()->route('admin_list')->with('success', trans('general.form.flash.created',['name' => $user->name]));
    }

    public function updateAdmin(Request $request, $id)
    {
        try {

            $this->validate($request, [
                'desc' => 'required'
            ]);

            $user = User::findOrFail($id);

            $user->status = $request->input('status');
            $user->desc = $request->input('desc');

            $user->save();

            $msg = "record has successfully been update.";
            return redirect()->route('admin_list')->with('success', $msg);
        } 

        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }   
    }

    public function deleteAdmin($id)
    {   
        if($id == Auth::User()->id)
        {
            $error = "You cannot delete your account from here.";
            return response()->json([
                'warning' => $error
            ]);
        }
        $current_password = Auth::User()->password;           
        // if(Hash::check($request->input('password'), $current_password))
        // {           
                                    
            $user = User::find($id);
            $user->delete();

            return response()->json([
                'success' => 'Administrator has been deleted successfully!'
             ]);
        // }
        // else
        // {           
        //     $error = "Please enter correct password";
        //     return response()->json([
        //         'warning' => $error
        //     ]);
        // }
    }
}
