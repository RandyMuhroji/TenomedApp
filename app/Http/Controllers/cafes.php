<?php

namespace Tenomed\Http\Controllers;
use Tenomed\Models\Cafe;
use Illuminate\Http\Request;
use Tenomed\Models\Bookmarks;
use Tenomed\Models\Menu;
use Tenomed\Models\Review;
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
            ->select('users.id','users.email','users.name','users.avatar', 'reviews.rate', 'reviews.updated_at', 'reviews.desc')
            ->where('cafe_id', $id)
            ->orderBy('updated_at', 'desc')
            ->Paginate(2);

        $bookmarks = DB::table('bookmarks')
                ->select('id','cafe_id', 'user_id','status')
                ->where('user_id', $id)
                ->where('cafe_id', $idUser)
                ->get()->first();

        $rates = DB::table('reviews')
                ->select('cafe_id', DB::raw('SUM(rate) as rank'), DB::raw('count(cafe_id) as jumlah'))
                ->where('cafe_id', $id)
                ->groupBy('cafe_id')
                ->get()->first();
        //dd($koor);
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
        return view('cafeDetail')->with(['detail'=>$detail, 'review'=>$Reviews, 'rates'=>$rates, 'bookmarks'=>$bookmarks,'test'=>$test]);
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
        $reviews->user_id=$request->idUser;
        $reviews->cafe_id=$request->idCafe;
        $reviews->rate=$request->rate;
        $reviews->desc=$request->desc;
        $id=$request->idCafe;
        $reviews->save();

        return redirect('detail/'.$id.'?id='.$request->idUser);

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
            ->distinct()->Paginate(5);
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
}
