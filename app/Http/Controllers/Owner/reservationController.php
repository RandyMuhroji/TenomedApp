<?php

namespace Tenomed\Http\Controllers\owner;

use Illuminate\Http\Request;
use Tenomed\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;
class reservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = DB::select("select r.id ,r.name ,r.reserv_code ,r.bookingDate ,r.bookingTime ,r.status ,r.total ,c.name ,c.id cafe_id ,c.user_id from reservations r inner join cafes c on r.cafe_id=c.id where c.user_id='".Auth::user()->id."' and r.status!='3'");

        //$aku=DB::select("select * from payments p inner join reservations r on r.reserv_code=p.reserv_code INNER JOIN cafes c on c.id=r.cafe_id  where p.reserv_code='KPZS6159717' and c.user_id='".Auth::user()->id."'");
        //return $aku;

         $users = DB::select('select u.* from users u inner join cafes c on u.id = c.user_id');

         $cafes = DB::select('select c.* from users u inner join cafes c on u.id = c.user_id');

        //return $users;

        $params = [
            'title' => 'Reservation Listing',
            'cafes' => $cafes,
            'users' => $users,
            'reservations' => $reservations
        ];
        //return $params;
        return view('owner.reservations.reservation_list')->with($params);
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
        //
    }
    function cekPayment(){
        $a=($_GET['id']);
        $cek = DB::select("select *,r.name Bname,p.status as pStatus from payments p inner join reservations r on r.reserv_code=p.reserv_code INNER JOIN cafes c on c.id=r.cafe_id   where p.reserv_code='".$a."' and c.user_id='".Auth::user()->id."'");
        if(count($cek)){
            return($cek);
        }else{
            return("gadak");
        }
     }
     function cekReport(){
        $a=($_GET['id']);
        $cek = DB::select("select mc.*,mr.qunatity,mc.price*mr.qunatity total  from menu_reservations mr inner join menu_cafe mc on mr.menu_cafe_id=mc.id where mr.reservations_id='".$a."'");
        return $cek;
     }
     function reservvHist(){
        $a=($_GET['code']);
        //return($code);
        $cek = DB::select("select 1 from payments p inner join reservations r on r.reserv_code=p.reserv_code INNER JOIN cafes c on c.id=r.cafe_id  where p.reserv_code='".$a."' and c.user_id='".Auth::user()->id."'");
         if(count($cek)){
            DB::select("Update reservations  set status='3' WHERE reserv_code='".$a."'"); 
           // DB::select("delete from payments WHERE reserv_code='".$a."'"); 
            return redirect("/manage-cafe/reservations/")->with('success','Your booking has been confirm');
        }else{
            return redirect("/manage-cafe/reservations/")->with('error','Your booking failed confirm');;
        }
     }
     public function report()
    {
         if(request()->reservation=="all"){
        //return(explode(" ",request()->reservation));
            $reservations = DB::select("select r.id ,r.name ,r.reserv_code ,r.bookingDate ,r.bookingTime ,r.status ,r.total ,r.phone,r.email,r.persons,c.name ,c.id cafe_id ,c.user_id from reservations r inner join cafes c on r.cafe_id=c.id where c.user_id='".Auth::user()->id."' and r.status='3'");
        }else{
            $tgl=explode(" ",request()->reservation);
            //return($tgl[0]." ".$tgl[2]);
            $reservations = DB::select("select r.id ,r.name ,r.reserv_code ,r.bookingDate ,r.bookingTime ,r.status ,r.phone,r.total,r.email,r.persons ,c.name ,c.id cafe_id ,c.user_id from reservations r inner join cafes c on r.cafe_id=c.id where c.user_id='".Auth::user()->id."' and r.status='3' and (r.bookingDate>='$tgl[0]' and r.bookingDate<='$tgl[2]')");
        }
        //$aku=DB::select("select * from payments p inner join reservations r on r.reserv_code=p.reserv_code INNER JOIN cafes c on c.id=r.cafe_id  where p.reserv_code='KPZS6159717' and c.user_id='".Auth::user()->id."'");
        //return $aku;

         $users = DB::select('select u.* from users u inner join cafes c on u.id = c.user_id');

         $cafes = DB::select('select c.* from users u inner join cafes c on u.id = c.user_id');

        //return $users;

        $params = [
            'title' => 'Reservation Listing',
            'cafes' => $cafes,
            'users' => $users,
            'reservations' => $reservations
        ];
        //return $params;
        return view('owner.reservations.report')->with($params);
    
    }
}
