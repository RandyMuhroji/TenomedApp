<?php

namespace Tenomed\Http\Controllers\user;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use Tenomed\Models\Message;
use Illuminate\Support\Facades\Input;
use DB;
use \PDF;
use Auth;

class chattingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
    $lists=DB::select("select to_user_id, c.name,c.image,c.phone from cafes c inner join (select count(to_user_id),to_user_id from messages m where fr_user_id = '".Auth::user()->id."' or to_user_id = '".Auth::user()->id."' group by to_user_id) m on c.user_id = m.to_user_id ");

     // $lists=DB::table('cafes')
     //            ->join('messages','cafes.id','=','messages.fr_user_id')
     //            ->select('messages.to_user_id','messages.fr_user_id','messages.id','messages.images','messages.message')
     //            ->where('messages.fr_user_id', Auth::user()->id)
     //            ->distinct()->get(['messages.to_user_id']);
    //return($lists);
        return view('user.chatting')->with(['lists'=>$lists]);
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
