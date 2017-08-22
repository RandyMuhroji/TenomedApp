<?php

namespace Tenomed\Http\Controllers\admin;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use DB;
use Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin');
    }

    public function index()
    {
         $lists=DB::select("select m.fr_user_id, c.name,c.avatar,c.phone from users c inner join (select count(fr_user_id),fr_user_id from messages m where to_user_id = '0' group by fr_user_id) m on c.id = m.fr_user_id ");
       //return $lists;
        return view('admin.messages.messages_list')->with(['lists'=>$lists]);
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
