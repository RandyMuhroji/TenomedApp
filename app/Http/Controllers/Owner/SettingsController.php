<?php

namespace Tenomed\Http\Controllers\owner;

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
    public function accountStore(Request $request, $id)
    {
        //return $request->file();
        try
        {
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

            return redirect()->route('owner_account')->with('success', trans('general.form.flash.updated',['name' => $user->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    public function cafe()
    {
        $cafe = DB::table('cafes')->where('user_id', Auth::user()->id)->get();
        $cafe = $cafe[0];

        $highlights = DB::table('highlights')->
                      select('name')
                      ->where('cafe_id',$cafe->id)
                      ->get();

        $operational_cafe = DB::table('operational_cafe')
                            ->select('day','open_hour','close_hour')
                            ->where('cafe_id',$cafe->id)
                            ->get();

        $highlight = "";
        foreach ($highlights as $value) {
          $highlight =  $highlight.",".$value->name;
        }

        $days  = array();
        $open_hours = array();
        $close_hours = array();

        foreach ($operational_cafe as $value) {
          $days[''.$value->day] = $value->day;
          $open_hours[''.$value->day] = $value->open_hour; 
          $close_hours[''.$value->day] = $value->close_hour; 
        }

        $params = [
                'title' => 'Edit Cafe',
                'cafe' => $cafe,
                'highlights' => $highlight,
                'days' => $days,
                'open_hours' => $open_hours,
                'close_hours' => $close_hours
            ];
        // return $params;
        
    	return view('owner.settings.cafe')->with($params);
    }

    public function cafeStore(Request $request, $id)
    {
        //return $request->input();
      try
        {
            $this->validate($request, [
                'name' => 'required',
                'days' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'open_hours' => 'required',
                'close_hours' => 'required',
            ]);

            $arrAddress = explode(',',$request->input('address'));
            $kec = $arrAddress[2];
            $kel = $arrAddress[1];
            $city = $arrAddress[3];
            $province = $arrAddress[4];
            $arrProv = explode(' ', $province);
            $province = $arrProv[0];

            $cafe = DB::table('cafes')
                ->where('id',$id)
                ->update(
                    [
                        'name'    => $request->input('name'),
                        'address' => $request->input('address'),
                        'kecamatan' => $kec,
                        'kelurahan' => $kel,
                        'phone' => $request->input('phone'),
                        'lat' => $request->input('lat'),
                        'long' => $request->input('lng'),
                        'desc' => $request->input('desc'),
                        'facebook' => $request->input('facebook'),
                        'web' => $request->input('web'),
                        'linkedin' => $request->input('linkedin'),
                        'twitter' => $request->input('twitter'),
                        'status' => 1,
                    ]
                );

            DB::table('operational_cafe')
                ->where('cafe_id', $id)
                ->delete();

            for ($i=0; $i < count($request->input('days')); $i++) { 
              $day = $request->input('days')[$i];
              $open = $request->input('open_hours')[$day];
              $close = $request->input('close_hours')[$day];
              
              DB::table('operational_cafe')->insert(
                [
                    'cafe_id' => $id,
                    'day' => $day,
                    'open_hour' => $open,
                    'close_hour' => $close,
                ]
              );
            }

                        
            DB::table('highlights')
                ->where('cafe_id', $id)
                ->delete();

            $highlights = explode(',',$request->input('highlights'));

            foreach ($highlights as $highlight) {
              DB::table('highlights')->insert(
                [
                    'cafe_id' => $id,
                    'name' => $highlight
                ]
              );
            }
            
            return redirect()->route('owner_cafe')->with('success', trans('general.form.flash.updated',['name' => $request->input('name')]));
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
                                    
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);;
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
