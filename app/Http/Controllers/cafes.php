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
use \PDF;

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
        if($detail->status!="1"){
            return redirect("/");
        }
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
         $jambuka = DB::table('operational_cafe')
                ->select('day','open_hour', 'close_hour')
                ->where('cafe_id', $idUser)
                ->get();
        //return($jambuka);
        $bookmarks = DB::table('bookmarks')
                ->select('id','cafe_id', 'user_id','status')
                ->where('user_id', $id)
                ->where('cafe_id', $idUser)
                ->get()->first();
         $highlight = DB::table('highlights')
                ->select('name')
                ->where('cafe_id', $id)
                ->get();
        $recent=DB::select("select * from cafes where status=1 ORDER BY created_at desc limit 3");
        $rates = DB::table('reviews')
                ->select('cafe_id', DB::raw('SUM(rate) as rank'), DB::raw('count(cafe_id) as jumlah'))
                ->where('cafe_id', $id)
                ->where('parent_id','0')
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
     

        return view('cafeDetail1',array('jambuka'=>$jambuka))->with(['detail'=>$detail,'recent'=>$recent,'highlight'=>$highlight,'foto'=>$foto,'menu'=>$menu,'kategori'=>$kategori, 'review'=>$Reviews,'status'=>'','child'=>$child, 'rates'=>$rates, 'bookmarks'=>$bookmarks,'test'=>$test]);
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
        $aku='';
        if($_GET['location']!=''){
            $aku=explode(' ', $_GET['location']);
            $aku=$aku[1];
        }

        $recent=DB::select("select * from cafes where status=1 ORDER BY created_at desc limit 5");

        $data = DB::table('cafes')
            ->select('id','name','desc','seat','image', 'phone','address')
            ->where('name','like','%'.$_GET['kata'].'%')
            ->where('address','like','%'.$aku.'%')
            ->where('status',1)
            ->Paginate(6);
            //return($_GET['kata']);
        //return($recent);
        $data->appends(Input::all())->render();
        $rates = DB::table('reviews')
                ->select('cafe_id', DB::raw('SUM(rate) as rank'), DB::raw('count(cafe_id) as jumlah'))
                ->groupBy('cafe_id')
                ->get()->first();
        if($data=="")
        {
            $data=="";
        }
        return view('cafeList')->with(['data'=>$data,'recent'=>$recent,'rates'=>$rates]);
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
         if($detail->status!="1"){
            return redirect("/");
        }
        $recent=DB::select("select * from cafes where status=1 ORDER BY created_at desc limit 5");
        $menu= DB::table('menu_cafe')->where('cafe_id', $id)->get();
        $idUser=request()->id;
        $kategori = DB::table('menu_cafe')->distinct()->get(['category']);
        $bookmarks = DB::table('bookmarks')
                ->select('id','cafe_id', 'user_id','status')
                ->where('user_id', $id)
                ->where('cafe_id', $idUser)
                ->get()->first();
        $jambuka = DB::table('operational_cafe')
                ->select('day','open_hour', 'close_hour')
                ->where('cafe_id', $id)
                ->get();
         $highlight = DB::table('highlights')
                ->select('name')
                ->where('cafe_id', $id)
                ->get();
        return view('booking')->with(['detail'=>$detail,'jambuka'=> $jambuka,'recent'=>$recent,'highlight'=>$highlight, 'kategori'=>$kategori, 'menu'=>$menu, 'bookmarks'=>$bookmarks,'test'=>'']);
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
         $recent=DB::select("select * from cafes where status=1 ORDER BY created_at desc limit 3");
        $menu = DB::table('menu_reservations')
            ->join('menu_cafe', 'menu_reservations.menu_cafe_id', '=', 'menu_cafe.id')
            ->select('menu_cafe.id','menu_cafe.name','menu_cafe.desc','menu_reservations.qunatity', 'menu_cafe.price')
            ->where('menu_reservations.reservations_id', $id)
            ->get();
             $jambuka = DB::table('operational_cafe')
                ->select('day','open_hour', 'close_hour')
                ->where('cafe_id', $detail->cafe_id)
                ->get();
        return view('invoice')->with(['detail'=>$detail,'recent'=>$recent,'menu'=>$menu,'jambuka'=>$jambuka]);
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
     public function deleteReview($id){
         DB::table('reviews')->where('id', $id)->delete();
     }
    public function updateReview(Request $request,$id){
        //return($request->rate.','.$request->desc.','.$id);
        $data = Review::find($id);
        $data->rate=$request->rate;
        $data->desc=$request->desc;
        $data->save();
        return redirect('user/review');

     }
     public function downloadPDF($id){
      $detail= DB::table('reservations')->where('id', $id)->first();
         $recent=DB::select("select * from cafes where status=1 ORDER BY created_at desc limit 3");
        $menu = DB::table('menu_reservations')
            ->join('menu_cafe', 'menu_reservations.menu_cafe_id', '=', 'menu_cafe.id')
            ->select('menu_cafe.id','menu_cafe.name','menu_cafe.desc','menu_reservations.qunatity', 'menu_cafe.price')
            ->where('menu_reservations.reservations_id', $id)
            ->get();
            //return view('invoiceDownload')->with(['detail'=>$detail,'recent'=>$recent,'menu'=>$menu]);
      $pdf = PDF::loadView('invoiceDownload', compact('detail','recent','menu'));
      return $pdf->download('invoiceDownload.pdf');

    }
     
}
