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
use Tenomed\Models\Message;

use Illuminate\Support\Facades\Input;
use DB;
use \PDF;
use Auth;

class cafes extends Controller
{
    // public function detail($id){
    // 	return view('cafeDetail');
    // }
    public function bookmarks()
	{
			$id=Auth::user()->id;
            $kafe=request()->kafe;
            $cek=request()->cek;
            if($cek==1){
                //return("inert");
                DB::table('bookmarks')->insert(
                    ['cafe_id' => $kafe, 'user_id' => $id]
                );
            }else{
               // return("drop");
                DB::table('bookmarks')->where('user_id', $id)->where('cafe_id', $kafe)->delete();
            }
            
	}

	public function detail($id)
    {
        if(Auth::check()){
             $idUser=(Auth::user()->id);
        }else{
             $idUser="";
        }
       
        $detail= DB::table('cafes')->where('id', $id)->first();
        // $bookmarks = Bookmarks::where('id',"=",$id)->get();
        //$Menu = Menu::where('idCafe',"=",$id)->get();
        if($detail->status!="1"){
            return redirect("/");
        }
        $Reviews = DB::table('users')
            ->join('reviews', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.id','users.email','users.name','users.avatar', 'reviews.rate', 'reviews.updated_at', 'reviews.desc', 'reviews.user_id')
            ->where('cafe_id', $id)
            ->where('parent_id','==', 0)
            ->orderBy('updated_at', 'asc')
            ->Paginate(4);

            $child = DB::table('users')
            ->join('reviews', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.id','users.email','users.name','users.avatar', 'reviews.rate', 'reviews.parent_id', 'reviews.updated_at', 'reviews.desc', 'reviews.user_id')
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
                ->where('user_id',  $idUser)
                ->where('cafe_id', $id)
                ->get();

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
                $cek=0;
                $test="";
                if(count($bookmarks)) {
                    $cek=1;
                }
               //return($cek);
        $owner=DB::table('cafes')
                ->select('user_id')
                ->where('id', $id)
                ->get();


        $idGaleri=DB::table('album_gallery')
                ->select('id')
                ->where('user_id', $owner[0]->user_id)
                ->where('name','slider')
                ->get();
     $foto=DB::select('select * from gallery where album_id='.$idGaleri[0]->id);

       // return $foto;
     $menu= DB::table('menu_cafe')->where('cafe_id', $id)->get();
     $kategori = DB::table('menu_cafe')->distinct()->get(['category']);
     

        return view('cafeDetail1',array('jambuka'=>$jambuka))->with(['detail'=>$detail,'recent'=>$recent,'highlight'=>$highlight,'foto'=>$foto,'menu'=>$menu,'kategori'=>$kategori, 'review'=>$Reviews,'status'=>'','child'=>$child, 'rates'=>$rates, 'test'=>$test,'cek'=>$cek]);
    }
    public function message(Request $request)
    {
         $this->validate($request,[
            'pesanChat'=>'required',
            'images' =>'mimes:jpeg,jpg,png,gif|max:10000',
        ]);
         $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

          $Setting= new Message;
          $Setting->message=$request->pesanChat;
          $Setting->to_user_id =$request->untuk;
          $Setting->fr_user_id =Auth::user()->id;
          $file = Input::file('images');

      
        if(Input::hasFile('images')){
            $Setting->images=$string.'-'.$file->getClientOriginalName();
            $file->move('images', $string.'-'.$file->getClientOriginalName());
        }
        $Setting->save();
        return redirect('detail/'.$request->kafe.'?id='.Auth::user()->id)->with(['status'=>'active']);
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
        if ($request->parent=='0') {
            # code...
            $cek=DB::select("select * from reviews where user_id='".$request->idUser."' and cafe_id='".$request->idCafe."' and parent_id='0'");
            //return($cek);
            if($cek==[]){
                $reviews= new Review;
                $reviews->user_id=$request->idUser;
                $reviews->cafe_id=$request->idCafe;
                $reviews->rate=$request->rate;
                $reviews->desc=$request->desc;

                $reviews->parent_id=$request->parent;
                $id=$request->idCafe;
                $reviews->save();
            }else{
                $reviews=DB::table('reviews')
                ->where('user_id', $request->idUser)
                ->where('cafe_id', $request->idCafe)
                ->where('parent_id', '0')
                ->update(['rate' => $request->rate,'desc'=>$request->desc]);
                $id=$request->idCafe;
            }
        
        }else{
            $reviews= new Review;
            $reviews->user_id=$request->idUser;
            $reviews->cafe_id=$request->idCafe;
            $reviews->rate=$request->rate;
            $reviews->desc=$request->desc;

            $reviews->parent_id=$request->parent;
            $id=$request->idCafe;
            $reviews->save();
    }
        
        //return($reviews);
        return redirect('detail/'.$id.'?id='.$request->idUser)->with(['status'=>'active']);

    } 
    public function sendReport(Request $request)
    {
        //return($request);
        $this->validate($request,[
        'idUser'=>'required',
        'idCafe'=>'required',

        /*'email'=>'required',
        'password' => 'min:6|confirmed',*/
        //'password' => 'min:6|confirmed',
        ]);



        $reviews= new Report;
        $reviews->user_id=$request->idUser;
        $reviews->cafe_id=$request->idCafe;
        if($request->report=="Lainnya"){
            $reviews->desc=$request->txtReport;
        }else{
            $reviews->desc=$request->report;
        }
        $id=$request->idCafe;
        $reviews->save();
        // return($reviews);
        return redirect('detail/'.$id.'?id='.$request->idUser)->with(['status'=>'active']);

    }
     public function cari()
    {
        $aku='';
        if($_GET['location']!=''){
            $aku=explode(' ', $_GET['location']);
            $aku=$aku[1];
        }
       
         //return($Reviews);


        $recent=DB::select("select * from cafes where status=1 ORDER BY created_at desc limit 5");
          // $data = DB::select('select c.id,c.name,c.image,c.status,c.seat,rs.rate,rs.jlh,rs.rate/rs.jlh total from cafes c left join (SELECT cafe_id,sum(rate) rate, COUNT(user_id) jlh from reviews WHERE parent_id=0 GROUP BY cafe_id ) rs on c.id=rs.cafe_id where c.status=1 and c.name like \'%'.$_GET['kata'].'%\' and c.address like \'%'.$aku.'%\' order by total desc');

         // $data = DB::table('cafes as c')
         //    ->leftjoin(DB::raw('(re.cafe_id from reviews as re)'),'c.id','=','re.cafe_id')
         //    ->select('c.name')
         //    ->Paginate(2);

              // return($data);
       
        // $data = DB::table('cafes')
        //     ->select('id','name','desc','seat','image', 'phone','address')
        //     ->where('name','like','%'.$_GET['kata'].'%')
        //     ->where('address','like','%'.$aku.'%')
        //     ->where('status',1)
        //     ->Paginate(6);


        $data =DB::table('cafes as c')
            ->leftjoin(DB::raw('(SELECT cafe_id,sum(rate) rate, COUNT(user_id) jlh from reviews WHERE parent_id=0 GROUP BY cafe_id) as rs'), 'c.id', '=', 'rs.cafe_id')
            ->select('c.id','c.name','c.image','c.status','c.seat','rs.rate','rs.jlh',DB::raw('rs.rate/rs.jlh as total'))
            ->where('c.status','1')
            ->where('c.name','like', '%'.$_GET['kata'].'%')
            ->where('c.address', 'like','%'.$aku.'%')
            ->orderby('total','desc')
            ->Paginate(9);
            //return($_GET['kata']);
        //return($data);
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
                ->where('status','<>', '2')
                ->groupBy('bookingTime')
                ->get();
       // $ada->persons=$ada->persons+$seat;
        if($ada==""){
            $ada=[];
        }
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
