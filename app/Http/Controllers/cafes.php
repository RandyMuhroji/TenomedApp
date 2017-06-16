<?php

namespace Tenomed\Http\Controllers;
use Tenomed\Models\Cafe;
use Illuminate\Http\Request;
use Tenomed\Models\Bookmarks;
use Tenomed\Models\Menu;
use Tenomed\Models\Review;
use DB;

class cafes extends Controller
{
    // public function detail($id){
    // 	return view('cafeDetail');
    // }
    public function bookmarks($id)
	{
			return view("user.profile");
	}
	public function detail($id)
    {
        $detail= DB::table('cafes')->where('id', $id)->first();
        // $bookmarks = Bookmarks::where('id',"=",$id)->get();
        //$Menu = Menu::where('idCafe',"=",$id)->get();
        $Reviews = DB::table('users')
            ->join('reviews', 'users.id', '=', 'reviews.idUser')
            ->select('users.id','users.email','users.name','users.avatar', 'reviews.rate', 'reviews.updated_at', 'reviews.desc')
            ->where('idCafe', $id)
            ->orderBy('updated_at', 'desc')
            ->get();

        $rates = DB::table('reviews')
                ->select('idCafe', DB::raw('SUM(rate) as rank'), DB::raw('count(idCafe) as jumlah'))
                ->where('idCafe', $id)
                ->groupBy('idCafe')
                ->get()->first();
        //dd($koor);
                if ($rates=="") {
                    $rates="";
                }
        return view('cafeDetail')->with(['detail'=>$detail, 'review'=>$Reviews, 'rates'=>$rates]);
    }
    public function sendReview(Request $request)
    {
    	$this->validate($request,[
        'rate'=>'required',
        'idUser'=>'required',
        'desc'=>'required',

        /*'email'=>'required',
        'password' => 'min:6|confirmed',*/
        //'password' => 'min:6|confirmed',
        ]);
        $reviews= new Review;
        $reviews->idUser=$request->idUser;
        $reviews->idCafe=$request->idCafe;
        $reviews->rate=$request->rate;
        $reviews->desc=$request->desc;
        $id=$request->idCafe;
        $reviews->save();
        

        return redirect('detail/'.$id);

    }
     public function cari(Request $request)
    {

        $data = DB::table('cafes')
            ->leftJoin('menu_cafe', 'cafes.id', '=', 'menu_cafe.idCafe')
            ->select('cafes.id as id','cafes.name as name','cafes.desc as desc','cafes.seat as seat','cafes.images as images', 'cafes.phone as phone','cafes.address as address','menu_cafe.name as menuName','price')
            ->where('cafes.name','like','%'. $request->kata.'%')
            ->orWhere('menu_cafe.name', 'like','%'.$request->kata.'%')
            ->orWhere('address', 'like','%'.$request->location.'%')
            ->orWhere('price', '>',$request->price)
            ->orderBy('id', 'desc')
            ->distinct()->get();

        $rates = DB::table('reviews')
                ->select('idCafe', DB::raw('SUM(rate) as rank'), DB::raw('count(idCafe) as jumlah'))
                ->groupBy('idCafe')
                ->get()->first();    

        return view('cafeList')->with(['data'=>$data,'rates'=>$rates]);
    }
    public function lists()
    {
        return view('cafeList');
    }
}
