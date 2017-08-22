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
use Auth;

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
        $cafes = DB::select('select x.* ,COUNT(r.id) jlhReport from (select c.id, c.name as name, u.name as owner, c.address, c.status, u.desc as rDesc from cafes c inner join users u on c.user_id = u.id) x LEFT JOIN report r on x.id=r.cafe_id GROUP BY x.id,x.name, x.owner, x.address, x.status,x.rDesc');

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

        $arrAddress = explode(',',$request->input('address'));

        $kec = $arrAddress[2];
        $kel = $arrAddress[1];

        $cafe =  $book= new Cafe;
    
        $cafe->user_id = $user->id;
        $cafe->name = $request->input('name');
        $cafe->address = $request->input('address');
        $cafe->kecamatan = $kec;
        $cafe->kelurahan = $kel;
        $cafe->phone = $request->input('phone');
        $cafe->lat = $request->input('lat');
        $cafe->long = $request->input('lng');
        $cafe->save();
       //return $cafe->id;

        DB::table('album_gallery')->insert(
            [
                'user_id' => $user->id,
                'name' => 'slider'
            ]
        );

        $data = [
                 'name'      => $request->input('user_name'),
                 'password'  => $request->input('password'),
                 'cafe_name' => $request->input('name'),
                 'email' => $request->input('email')
                ];
        
        Mail::send(['html' => 'mail.new_cafe'], $data, function($message) use($user){
             $message->to($user->email)->subject('Password Acount Cafe Login - TENOMED');
             $message->from('tenomed01@gmail.com','Tenomed');
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
            $this->validate($request, [
                'desc' => 'required',
            ]);
            
            $cafe = Cafe::findOrFail($id);

            $cafe->status  = $request->input('status');

            $user = User::findOrFail(Auth::User()->id);
            $user->desc  = $request->input('desc');
            $user->save();

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
    function reportList(){
        $id=request()->id;
        $cek=DB::select('select COUNT(r.desc) total,r.desc,s.name,s.avatar from report r inner join users s on r.user_id=s.id    where r.cafe_id='.$id.' GROUP BY r.desc,s.name,s.avatar');

        return view('admin.cafes.reportList')->with(['cek'=>$cek]);
    }
}
