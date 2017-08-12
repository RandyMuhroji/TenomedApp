@extends('layouts.userLayout')

@section('css')
<style type="text/css">
   
</style>
@endsection

@section('menu')


     <li class=""><a  href="{{url('user/profile')}}"><i class="fa fa-user"></i> Profile</a></li>
     <li ><a  href="{{url('user/chatting')}}"><i class="fa fa-user"></i> Chatting</a></li>
    <li ><a href="{{url('user/bookingList')}}"><i class="fa fa-envelope-o"></i> Booking Histories</a></li>
    <li ><a href="{{url('user/bookmarks')}}"><i class="fa fa-bars"></i> Bookmarks</a></li>
    <li class="active"><a href="{{url('user/review')}}"><i class="fa fa-bars"></i> Review</a></li>
    <li  ><a href="{{url('user/setting')}}"><i class="fa fa-pencil"></i> Setting</a></li>
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
            @if(Auth::user()->avatar!="")
                <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="">
            @else
                <img src="{{ asset('') }}images/user.png" alt="">
            @endif
            </div><!-- /.testimonial-image -->
           
            <div class="testimonial-inner">
                <div class="testimonial-title">
                <div class="row">
                <div class="col-sm-8">
                    <div class="card-small">
                      <div class="card-small-image">
                          <a href="#">
                              <img src="{{ asset('') }}images/{{$reviewss->image or 'duku.png'}}" alt="img">
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
                    <button class="btn btn-sm btn-primary" onclick="editReview('{{$reviewss->id}}', {{$reviewss->rate}}, '{{$reviewss->desc}}','{{$reviewss->name}}')" type="button">
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


 $(document).ready(function(){
    hideLoading();
  });
function editReview(id,rate,desc,name){

        bootbox.alert({message:'<form class="background-white p20 add-review" method="post" action="/user/updateReview/'+id+'">        <div class="review">        <div class="review-image">                                    <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="">                                </div><!-- /.review-image -->        <div class="review-inner">            <div class="review-title">                <h2><span style="text-transform: capitalize;">{{Auth::user()->name}}</span></h2>                                <span class="report">                    <span class="separator">•</span><i class="fa fa-flag" title="" data-toggle="tooltip" data-placement="top" data-original-title="Report"></i>                </span>                <div class="row">                <div class="form-group input-rating col-sm-8">                    <div class="rating-title">Rate This Cafe</div>                    <input value="1" name="rate" id="rating-food-1" required="" type="radio">                    <label for="rating-food-1" class=""></label>                    <input value="2" name="rate" id="rating-food-2" required="" type="radio" >                    <label for="rating-food-2" class="" ></label>                    <input value="3" name="rate" id="rating-food-3" required="" type="radio">                    <label for="rating-food-3" class=""></label>                    <input value="4" name="rate" id="rating-food-4" required="" type="radio">                    <label for="rating-food-4" class=""></label>                    <input value="5" name="rate" id="rating-food-5" required="" type="radio">                    <label for="rating-food-5" class=""></label>                </div><!-- /.col-sm-3 -->            </div>            <input type="hidden" name="idUser" value="{{Auth::user()->id}}">            <input type="hidden" name="parent" value="0">            <input type="hidden" name="_method" value="POST">            <input type="hidden" name="_token" value="{{ Session::token() }}">            <div class="row">                <div class="form-group col-sm-12">                    <label for="">Review Description</label>                    <textarea class="form-control" rows="5" id="desc" name="desc" required="">'+desc+'</textarea><div class="textarea-resize"></div><div class="textarea-resize"></div>                </div><!-- /.col-sm-6 -->                <div class="col-sm-8">                    <p>Required fields are marked <span class="required">*</span></p>                </div><!-- /.col-sm-8 -->                <div class="col-sm-4">                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-star"></i>Submit</button>                </div>            </div>                                       </div><!-- /.review-content-wrapper -->        </div><!-- /.review-inner -->    </div></form>', size: 'large'});
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
              url: '/user/deleteReview/'+data,              
              type: 'GET',

              data: {'idUser':'a', 'kafe':'b'},
              success: function( data ) {
                console.log(data);
                location.reload(); 
              }
             });
        }
     }
  });
}


</script>
@endsection