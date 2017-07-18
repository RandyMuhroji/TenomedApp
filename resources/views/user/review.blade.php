@extends('layouts.userLayout')

@section('css')
<style type="text/css">
   
</style>
@endsection

@section('menu')


     <li ><a  href="{{url('user/profile')}}"><i class="fa fa-user"></i> Profile</a></li>
    <li ><a href="{{url('user/bookingList')}}"><i class="fa fa-envelope-o"></i> Booking Histories</a></li>
    <li ><a href="{{url('user/bookmarks')}}"><i class="fa fa-bars"></i> Bookmarks</a></li>
    <li class="active"><a href="{{url('user/review')}}"><i class="fa fa-bars"></i> Review</a></li>
    <li ><a href="{{url('user/setting')}}"><i class="fa fa-pencil"></i> Setting</a></li>
    <li><a href="{{url('logout')}}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>

@endsection

@section('content')
    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <div class="page-title">
    <h1>All Review Cafe</h1>
</div><!-- /.page-title -->

<div class="background-white p20 mb30">
    <h3 class="page-title">
        Review List
    </h3>
    <div class="row">
        <div class="col-sm-10" style="padding-left: 80px;">
         @foreach($reviews as $reviewss)
        <div class="testimonial" id="listReview{{$reviewss->id}}">
            <div class="testimonial-image">
                <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="">
            </div><!-- /.testimonial-image -->
           
            <div class="testimonial-inner">
                <div class="testimonial-title">
                <div class="row">
                <div class="col-sm-8">
                    <div class="card-small">
                      <div class="card-small-image">
                          <a href="#">
                              <img src="{{ asset('') }}images/{{$reviewss->images or 'duku.png'}}" alt="Tasty Brazil Coffee">
                          </a>
                      </div><!-- /.card-small-image -->

                      <div class="card-small-content">
                          <h3><a href="{{url('detail/'.$reviewss->id_cafe)}}">{{$reviewss->name}}</a></h3>
                          <h3><a href="#">{{$reviewss->ket}}</a></h3>
                          <h4><a href="#">{{$reviewss->kecamatan}}</a></h4>


                          <div class="card-small-price"></div>
                      </div><!-- /.card-small-content -->
                  </div>
                  </div>
                    <div class="col-sm-4">
                    <div class="testimonial-rating">
                    @for($i=1;$i<=$reviewss->rate;$i++)
                        <i class="fa fa-star"></i>
                    @endfor
                    </div><!-- /.testimonial-rating -->
                    </div>
                </div>
                </div><!-- /.testimonial-title -->

               {{$reviewss->desc}}
                <div class="testimonial-sign">
                    <button class="btn btn-sm btn-primary" onclick="editReview()" type="button">
                        Edit 
                    </button>
                    <button class="btn btn-sm btn-danger" onclick="deleteReview({{$reviewss->id}})" type="button">
                        Remove 
                    </button>
                </div><!-- /.testimonial-sign -->
            </div><!-- /.testimonial-inner -->
        </div>

     @endforeach
      <br>
    <div class="col-sm-12">{{ $reviews->links() }}<br></div>
        
    </div>
    </div>



                            
</div>


                              
                        </div><!-- /.content -->
                    </div><!-- /.col-* -->
@endsection
@section('java')
<script >

function editReview(){

        bootbox.alert({message:'<br><div class="testimonial"><div class="testimonial-image"><img src="http://localhost:8000/images/user.png" alt=""></div><div class="testimonial-inner"><div class="testimonial-title"><div class="row"><div class="col-sm-7"><div lass="card-small"><div class="card-small-image"><a href="listing-detail.html"><img src="http://localhost:8000/images/duku.png" alt="Tasty Brazil Coffee"></a></div><div class="card-small-content"><h3><a href="listing-detail.html">Tenomed Cafe</a></h3><h3><a href="listing-detail.html"></a></h3><h4><a href="listing-detail.html"> Medan Tembung</a></h4><div class="card-small-price"></div></div></div></div><div class="col-sm-5"><div class="testimonial-rating"><div class="form-group input-rating">                        <input value="1" name="rate" id="rating-food-1" required="" type="radio">                    <label for="rating-food-1" class=""></label>                    <input value="2" name="rate" id="rating-food-2" required="" type="radio">                    <label for="rating-food-2" class=""></label>                    <input value="3" name="rate" id="rating-food-3" required="" type="radio">                    <label for="rating-food-3" class=""></label>                    <input value="4" name="rate" id="rating-food-4" required="" type="radio">                    <label for="rating-food-4" class=""></label>                    <input value="5" name="rate" id="rating-food-5" required="" type="radio">                    <label for="rating-food-5" class=""></label>                </div></div></div></div></div><textarea class="form-control" rows="5" id="desc" name="desc" required="">bagus banget</textarea></div></div>', size: 'large'});
    };
function deleteReview(data){
    bootbox.confirm({ 
    size: "small",
    message: "Are you sure, to delete the review? <br><br><br>", 
    callback: function(result){ 
        if(result==true){
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            console.log("Review " +data);
            $.ajax({
              url: '/user/review/'+data,              
              type: 'delete',

              data: {'idUser':'a', 'kafe':'b'},
              success: function( data ) {
                console.log("masuk sini");
                window.location('/user/review');   
              }
             });
        }
     }
  });
}


</script>
@endsection