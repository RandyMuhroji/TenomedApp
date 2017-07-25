<?php

namespace Tenomed\Http\Controllers\owner;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use Tenomed\Models\Review;
use Tenomed\Models\Cafe;
use Tenomed\Models\User;
use Auth;
use Reviews;

class ReviewController extends Controller
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

            $idCafe = $cafe[0]->id;
            
            $reviews = DB::select('select r.id, r.comment, u.name, r.created_at from reviews r join users u on r.user_id = u.id where r.cafe_id = '. $idCafe);

           
            $params = [
                'title' => 'Review Listing',
                'reviews' => $reviews,
            ];

            return view('owner.reviews.review_list')->with($params);
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

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
        //DB::table('reviews')->where('id', $id)->delete();
            return("doko");
    }
}
