<?php

namespace Tenomed\Http\Controllers;
use Tenomed\Models\Cafe;
use Illuminate\Http\Request;
use Tenomed\Models\Bookmarks;
use Tenomed\Models\Menu;
use Tenomed\Models\Review;
use Tenomed\Models\bookMenu;
use Tenomed\Models\Reservation;

use Illuminate\Support\Facades\Input;
use DB;

class cafes extends Controller
{
    // public function detail($id){
    // 	return view('cafeDetail');
    // }
    public function bookmarks()
	{
			$id=request()->idUser;
            $kafe=request()->kafe;
            $status=request()->status;

             DB::table('bookmarks')
            ->where('user_id', $id)
            ->where('cafe_id', $kafe)
            ->delete();

             DB::table('bookmarks')->insert(
                ['user_id' => $id,'cafe_id' => $kafe,'status' => $status]
            );

	}

	public function detail($id)
    {

        $idUser=request()->id;
        $detail= DB::table('cafes')->where('id', $id)->first();
        // $bookmarks = Bookmarks::where('id',"=",$id)->get();
        //$Menu = Menu::where('idCafe',"=",$id)->get();
        $Reviews = DB::table('users')
            ->join('reviews', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.id','users.email','users.name','users.avatar', 'reviews.rate', 'reviews.updated_at', 'reviews.desc')
            ->where('cafe_id', $id)
            ->where('parent_id','==', 0)
            ->orderBy('updated_at', 'desc')
            ->Paginate(4);

            $child = DB::table('users')
            ->join('reviews', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.id','users.email','users.name','users.avatar', 'reviews.rate', 'reviews.parent_id', 'reviews.updated_at', 'reviews.desc')
            ->where('cafe_id', $id)
            ->where('parent_id','<>', 0)
            ->orderBy('updated_at', 'desc')
            ->get();

        $bookmarks = DB::table('bookmarks')
                ->select('id','cafe_id', 'user_id','status')
                ->where('user_id', $id)
                ->where('cafe_id', $idUser)
                ->get()->first();
         $highlight = DB::table('highlights')
                ->select('name')
                ->where('cafe_id', $id)
                ->get();

        $rates = DB::table('reviews')
                ->select('cafe_id', DB::raw('SUM(rate) as rank'), DB::raw('count(cafe_id) as jumlah'))
                ->where('cafe_id', $id)
                ->groupBy('cafe_id')
                ->get()->first();
                if ($rates=="") {
                    $rates="";
                }
                $test="marked";
                if ($bookmarks=="") {
                    $bookmarks="";
                    $test="";
                }
                if ($bookmarks!="") {
                    if($bookmarks->status==0){$test="";}

                }
        $owner=DB::table('cafes')
                ->select('user_id')
                ->where('id', $id)
                ->get();


        $idGaleri=DB::table('album_gallery')
                ->select('id')
                ->where('user_id', $owner[0]->user_id)
                ->where('name','slider')
                ->get();
        //return $idGaleri;
     $foto=DB::select('select * from gallery where album_id='.$idGaleri[0]->id);

       // return $foto;
     $menu= DB::table('menu_cafe')->where('cafe_id', $id)->get();
     $kategori = DB::table('menu_cafe')->distinct()->get(['category']);
     

        return view('cafeDetail1')->with(['detail'=>$detail,'highlight'=>$highlight,'foto'=>$foto,'menu'=>$menu,'kategori'=>$kategori, 'review'=>$Reviews,'status'=>'','child'=>$child, 'rates'=>$rates, 'bookmarks'=>$bookmarks,'test'=>$test]);
    }
    public function sendReview(Request $request)
    {
    	$this->validate($request,[
        'idUser'=>'required',
        'desc'=>'required',
        'parent'=>'required',

        /*'email'=>'required',
        'password' => 'min:6|confirmed',*/
        //'password' => 'min:6|confirmed',
        ]);
        $reviews= new Review;
        $reviews->user_id=$request->idUser;
        $reviews->cafe_id=$request->idCafe;
        $reviews->rate=$request->rate;
        $reviews->desc=$request->desc;

        $reviews->parent_id=$request->parent;
        $id=$request->idCafe;
        $reviews->save();

        return redirect('detail/'.$id.'?id='.$request->idUser)->with(['status'=>'active']);

    }
     public function cari()
    {

        $data = DB::table('cafes')
            ->leftJoin('menu_cafe', 'cafes.id', '=', 'menu_cafe.cafe_id')
            ->select('cafes.id as id','cafes.name as name','cafes.desc as desc','cafes.seat as seat','cafes.images as images', 'cafes.phone as phone','cafes.address as address','menu_cafe.name as menuName','price')
            ->where('cafes.name','like','%'.$_GET['kata'].'%')
            ->orWhere('menu_cafe.name', 'like','%'. $_GET['kata'].'%')
            ->orWhere('address', 'like','%'. $_GET['location'].'%')
            //->orWhere('price', '>', $_GET['price'])
            ->orderBy('id', 'desc')
            ->distinct(['cafes.name'])->Paginate(5);
        $data->appends(Input::all())->render();
        $rates = DB::table('reviews')
                ->select('cafe_id', DB::raw('SUM(rate) as rank'), DB::raw('count(cafe_id) as jumlah'))
                ->groupBy('cafe_id')
                ->get()->first();
        if($data=="")
        {
            $data=="";
        }
        return view('cafeList')->with(['data'=>$data,'rates'=>$rates]);
    }
    public function lists()
    {
        return view('cafeList');
    }
    public function cekEmail()
    {

        return "babi";
    }
    public function booking($id)
    {
        
        $detail= DB::table('cafes')->where('id', $id)->first();
        $menu= DB::table('menu_cafe')->where('cafe_id', $id)->get();
        $idUser=request()->id;
        $kategori = DB::table('menu_cafe')->distinct()->get(['category']);
        $bookmarks = DB::table('bookmarks')
                ->select('id','cafe_id', 'user_id','status')
                ->where('user_id', $id)
                ->where('cafe_id', $idUser)
                ->get()->first();
        return view('booking')->with(['detail'=>$detail, 'kategori'=>$kategori, 'menu'=>$menu, 'bookmarks'=>$bookmarks,'test'=>'']);
                // return($menu);
    }
    public function saveBooking(Request $request,$id){
        $idUser=request()->id;
        $book= new Reservation;
        $book->user_id=$idUser;
        $book->persons=$request->book_persons;
        $book->name=$request->book_name;
        $book->phone=$request->book_phone;
        $book->email=$request->book_email;
        $book->bookingDate=$request->book_tanggal;
        $book->bookingTime=$request->book_jam;
        $book->cafe_id=$id;
        $book->save();
        for ($x = 0; $x < sizeof($request->qty); $x++) {
            if($request->qty[$x]!=0){
                $bookMenu= new bookMenu;
                $bookMenu->reservations_id =$book->id;
                $bookMenu->menu_cafe_id =$request->menu_id[$x];
                $bookMenu->qunatity =$request->qty[$x];
                $bookMenu->save();
            }
        } 
        return redirect('invoice/'.$book->id);


    }
     public function invoice($id){
         $detail= DB::table('reservations')->where('id', $id)->first();
        $menu = DB::table('menu_reservations')
            ->join('menu_cafe', 'menu_reservations.menu_cafe_id', '=', 'menu_cafe.id')
            ->select('menu_cafe.id','menu_cafe.name','menu_cafe.desc','menu_reservations.qunatity', 'menu_cafe.price')
            ->where('menu_reservations.reservations_id', $id)
            ->get();
        return view('invoice')->with(['detail'=>$detail,'menu'=>$menu]);
     }
     public function slots($id){
        $idKafe = Input::get('idKafe');
        $jam = DB::table('operational_cafe')
                ->select('open_hour','close_hour')
                ->where('cafe_id', $idKafe)
                ->where('day', $id)
                ->get();

        return($jam);
     }
     public function seats($id){
        $tgl = Input::get('tgl');
        $seat=Input::get('seat');
         $ada = DB::table('reservations')
                ->select('bookingTime', DB::raw('SUM(persons) as persons'))
                ->where('bookingDate', $tgl)
                ->where('cafe_id', $id)
                ->groupBy('bookingTime')
                ->get();
       // $ada->persons=$ada->persons+$seat;
        return($ada);
     }
}
