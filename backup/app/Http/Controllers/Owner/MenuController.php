<?php

namespace Tenomed\Http\Controllers\owner;

use Tenomed\Models\User;
use Tenomed\Models\Role;
use Tenomed\Models\Cafe;
use Tenomed\Models\Menu;
use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;

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
