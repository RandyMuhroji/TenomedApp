<?php

namespace Tenomed\Http\Controllers\owner;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use Tenomed\Models\AlbumGallery;
use Tenomed\Models\Gallery;

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
        $user_id = Auth::User()->id;
        $albums = DB::select('select * from album_gallery where user_id = '. $user_id);
        
        $images = DB::select('select * from album_gallery a join gallery g on a.id = g.album_id where a.user_id = '. $user_id);

       
        $params = [
            'title' => 'Gallery Listing',
            'images' => $images,
            'albums' => $albums
        ];
        return view('owner.gallery.gallery_list')->with($params);
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
        //return $request->input();

        $title = $request->input(['title_image']);
        if($title == "")
        {
            $error = "The title field is required.";
            return redirect()->route('gallery.index')->with('title_image', $error);
        }
        $picture = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = md5($filename).".".$extension;
            $destinationPath = base_path() . '\public\images';
            $file->move($destinationPath, $picture);

            $user_id = Auth::User()->id;
            $album_id = $request->input(['idAlbum']);
            $desc = $request->input(['image_desc']);

            $album = DB::table('gallery')->insert(
                [
                    'user_id' => $user_id,
                    'album_id' => $album_id,
                    'filename' => $picture,
                    'title' => $title,
                    'desc' => $desc,
                ]
            );
            $msg = "record has successfully been added.";
            return redirect()->route('gallery.index')->with('success', $msg);

        }
        else{
            $error = "The file image field is required.";
            return redirect()->route('gallery.index')->with('image', $error);
        }
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
        try {

            $image = Gallery::findOrFail($id);
            
            $title = $request->input(['edit_title']);
            if($title == "")
            {
                $error = "The title field is required.";
                return redirect()->route('gallery.index')->with('title_image', $error);
            }

            $image->title = $title;
            $image->desc = $request->input(['edit_desc']);

            if ($request->hasFile('edit_image')) {
                $file = $request->file('edit_image');
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = md5($filename).".".$extension;
                $destinationPath = base_path() . '\public\images';
                $file->move($destinationPath, $picture);

                
                $image->filename = $picture;
                $image->mime = $extension;
                $image->original_filename = $filename;
            }

            $image->save();

            $msg = "record has successfully been update.";
            return redirect()->route('gallery.index')->with('success', $msg);
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
            $image = Gallery::find($id);
            $file_path = app_path("public\images\\".$image->filename);

            // if(File::exists($file_path)) 
            //     File::delete($file_path);
            

            $image->delete();

            return response()->json([
                'success' => 'Image has been deleted successfully!'
            ]);
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
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
                        'name' => $album_name,
                    ]
                );

                $msg = $album_name. " record has successfully been created.";
                return redirect()->route('gallery.index')->with('success', $msg);
            }
        }
    }
    public function deleteAlbum($id)
    {

        $album = AlbumGallery::find($id);
        $album->delete();

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
}