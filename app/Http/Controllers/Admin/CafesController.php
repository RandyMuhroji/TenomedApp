<?php

namespace Tenomed\Http\Controllers\Admin;


use Illuminate\Support\Facades\DB;
use Tenomed\Models\User;
use Tenomed\Models\Role;
use Tenomed\Models\Cafe;
use Tenomed\Models\RoleUser;
use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use Mail;

class CafesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('permission:admin');
    }


    public function index()
    {
        $cafes = DB::select('select c.id, c.name as name, u.name as owner, c.address, c.status  from cafes c inner join users u on c.user_id = u.id');


        $params = [
            'title' => 'Cafes Listing',
            'cafes' => $cafes,
        ];
        return view('admin.cafes.cafes_list')->with($params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $owners = DB::select('select * from role_user r inner join users u on r.user_id = u.id where role_id = 2');

        $params = [
            'title' => 'Create Cafe',
            'users' => $owners,
        ];
        return view('admin.cafes.cafes_create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users',
        ]);

        $user = User::create([
            'name' => $request->input('user_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'status' => 1,
        ]);

        $role = Role::find($request->input('role_id'));

        $user->attachRole($role);

        $arrAddress = explode(',',$cafe->address);

        $kec = $arrAddress[2];
        $kel = $arrAddress[1];
        $city = $arrAddress[3];
        $province = $arrAddress[4];
        $arrProv = explode(' ', $province);

        $province = $arrProv[0];

        DB::table('cafes')->insert(
            [
                'user_id' => $user->id,
                'name' => $request->input('name'),
                'address' => $request->input('address'),
                'kecamatan' => $kec,
                'kelurahan' => $kel,
                'city' => $city,
                'province' => $province,
                'phone' => $request->input('phone'),
                'lat' => $request->input('lat'),
                'long' => $request->input('lng')
            ]
        );

        $data = [
                 'name'      => $request->input('user_name'),
                 'password'  => $request->input('password'),
                 'cafe_name' => $request->input('name'),
                 'email' => $request->input('email')
                ];
        
        Mail::send(['html' => 'mail.new_cafe'], $data, function($message){
             $message->to($request->input('email'))->subject('Password Account Cafe');
             $message->from('tenomed@gmail01.com','Tenomed');
        });

        return redirect()->route('cafes.index')->with('success', trans('general.form.flash.created_cafe',['name'  => $request->input('name'),
                                              'email' => $request->input('email')]));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $cafe = Cafe::findOrFail($id);

            $params = [
                'title' => 'Delete Cafe',
                'cafe' => $cafe,
            ];

            return view('admin.cafes.cafes_delete')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $cafe = Cafe::findOrFail($id);

            $user = User::findOrFail($cafe->user_id);

            $params = [
                'title' => 'Edit Cafe',
                'user' => $user,
                'cafe' => $cafe,
            ];

            return view('admin.cafes.cafes_edit')->with($params);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
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
        try
        {
            $cafe = Cafe::findOrFail($id);

            $cafe->name  = $request->input('name');
            $cafe->email = $request->input('email');
            $cafe->phone = $request->input('phone');
            $cafe->lat   = $request->input('lat');
            $cafe->long  = $request->input('lng');

            $cafe->save();

            return redirect()->route('cafes.index')->with('success', trans('general.form.flash.updated',['name' => $cafe->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $cafe = Cafe::findOrFail($id);

            $cafe->delete();

            return redirect()->route('cafes.index')->with('success', trans('general.form.flash.deleted',['name' => $cafe->name]));
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
}
