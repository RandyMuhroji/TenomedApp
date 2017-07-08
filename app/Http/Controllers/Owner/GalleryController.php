<?php

namespace Tenomed\Http\Controllers\owner;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use Tenomed\Models\AlbumGallery;

use Auth;


class GalleryController extends Controller
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
        return view('owner.gallery.gallery_list');
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
        return $request->input();
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

    public function album(Request $request)
    {
        $album_name = $request->input('album_name');

        if($album_name == "")
        {
            $error = "The album name field is required.";
            return redirect()->route('gallery.index')->with('album_name', $error);
        }
        else{
            $user_id = Auth::User()->id;
            $albums = DB::select('select name from album_gallery where user_id = '.$user_id);

            //return $albums[0]->name;

            $cek = 0;

            foreach ($albums as $album) {
                if($album->name == $album_name){
                    $cek = $cek + 1;
                }
            }
            if($cek > 0){
                $error = $album_name." is already in this gallery";
                return redirect()->route('gallery.index')->with('album_name', $error);
            }
            else{
                $album = DB::table('album_gallery')->insert(
                    [
                        'user_id' => $user_id,
                        'name' => $request_data['album_name'],
                    ]
                );

                $msg = $album->name & "record has successfully been created.";
                return redirect()->route('users.index')->with('success', $msg);
            }
        }
        
        return $request->input();
    }
}