<?php

namespace Tenomed\Http\Controllers\owner;

use Tenomed\Models\User;
use Tenomed\Models\Role;
use Tenomed\Models\Cafe;
use Tenomed\Models\Menu;
use Tenomed\Models\Galery;
use Validator;
use Response;
use Redirect;
use Session;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Tenomed\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Auth;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:owner');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try
        {
            $cafe   = Cafe::where('user_id',Auth::user()->id)->get();
            
            $menus  = Menu::where('cafe_id',$cafe[0]->id)->get();

            $params = [
                'title' => 'Menu Listing',
                'cafe' => $cafe,
                'menus' => $menus
            ];

            return view('owner.menus.menus_list')->with($params);
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.menus.menus_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //return $request->input();
        //$tags = explode(',',$request->input('tags'));
        
        //return $request->file('images');

        $picture = "";
        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = date('His').$filename;
            $destinationPath = base_path() . '\public\images';
            $file->move($destinationPath, $picture);
        }
        else
            return "Image Error";

        $cafe   = Cafe::where('user_id',Auth::user()->id)->get();

        // $menu = Menu::create([
        //     'cafe_id' => $cafe[0]->id,
        //     'name' => $request->input('name'),
        //     'tag' => $request->input('tags'),
        //     'desc' => $request->input('desc'),
        //     'category' => $request->input('category'),
        //     'price' => $request->input('price'),
        //     'picture' => $picture,
        // ]);

        DB::table('menu_cafe')->insert(
            [
                'cafe_id' => $cafe[0]->id,
                'name' => $request->input('name'),
                'tag' => $request->input('tags'),
                'desc' => $request->input('desc'),
                'category' => $request->input('category'),
                'price' => $request->input('price'),
                'images' => $picture,
            ]
        );

        $name = $request->input('name');

        return redirect()->route('menus.index')->with('success', trans('general.form.flash.created',['name' => $name]));

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
        //
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
