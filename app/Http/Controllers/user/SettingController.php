<?php

namespace Tenomed\Http\Controllers\user;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use Tenomed\Models\Setting;
use File;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.setting');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
        'name'=>'required',
        'email'=>'required',
        //'avatar' =>'required|mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

         $Setting= Setting::find($id);
      $Setting->name=$request->name;
      $Setting->email=$request->email;
      $Setting->phone=$request->phone;
      $Setting->address=$request->address;
      $Setting->bio=$request->bio;
       $file = Input::file('avatar');

      $Setting->avatar=$string.'-'.$file->getClientOriginalName();
        if(Input::hasFile('avatar')){
           
            $file->move('images', $string.'-'.$file->getClientOriginalName());
        }
        $Setting->save();
       ///echo "handoko";
       return redirect('user/setting');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
