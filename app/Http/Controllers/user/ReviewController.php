<?php

namespace Tenomed\Http\Controllers\user;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use Auth;
use DB;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $reviews = DB::table('cafes')
            ->join('reviews', 'cafes.id', '=', 'reviews.cafe_id')
            ->select('cafes.name','cafes.kecamatan','cafes.image','cafes.kelurahan','cafes.desc as ket','reviews.desc','reviews.id','cafes.id as id_cafe','reviews.rate','reviews.updated_at')
            ->where('reviews.user_id',$user->id)
            ->where('reviews.parent_id','0')
            ->orderBy('reviews.updated_at', 'desc')
            ->Paginate(3);
        //return($bookmarks);
        return view('user.review')->with(['reviews'=>$reviews]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteReview($id){
            $user = Auth::user();
            DB::table('reviews')->where('id',$id)->where('user_id', $user)->delete();
            return redirect('/reviews');

    }
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
        $user = Auth::user()->id;
        DB::table('reviews')->where('id',$id)->where('user_id', $user)->delete();
        return;

    }
}
