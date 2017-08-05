<?php
namespace Tenomed\Http\Controllers;
use Tenomed\Models\Cafe;
use Illuminate\Http\Request;
use Tenomed\Models\Bookmarks;
use Tenomed\Models\Menu;
use Tenomed\Models\Review;
use Tenomed\Models\Report;
use Tenomed\Models\bookMenu;
use Tenomed\Models\Reservation;

use Illuminate\Support\Facades\Input;
use DB;
use \PDF;
use Auth;

class booking extends Controller
{
	 public function __construct()
    {
        $this->middleware('permission:user');
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
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $pin = mt_rand(1000000, 9999999);
        $string = $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)]
            . $characters[rand(0, strlen($characters) - 1)].str_shuffle($pin);

        $idUser=request()->id;
        $book= new Reservation;
        $book->user_id=$idUser;
        $book->persons=$request->book_persons;
        $book->name=$request->book_name;
        $book->reserv_code=$string;
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
}
