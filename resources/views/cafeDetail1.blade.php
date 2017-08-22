@extends('layouts.intro')


@section('css')
    <style>
      @media (max-width: 767px) {
        .hero-image-content {
            display: block !important;
        }
      }

      .hero-image-form-wrapper form [class^="hero-image-"]{
        margin-bottom: 10px;
      }

      .hero-image-form-wrapper form {
        padding-bottom: 10px;
      }

      .hero-image-inner {
        margin-top:59px;
      }
    </style>
    <script>
        $( function() {
        console.log("bulat="+($("#txtStar").val()));

        var x=0;
        var status="";
        if(($("#txtStar").val())%1==0){
            x=parseInt($("#txtStar").val());
            status="genab";
        }else{
            x=parseInt($("#txtStar").val())+1;
            status="ganjil";
        }
        console.log("x ="+x+"   status="+status);

        for(i=0;i<5;i++){
            
            if(i<x){
                if (status=="genab") {
                    $( "#bintang" ).append(' <i class="fa fa-star"></i> ');
                }else{
                    if(i==(x-1)){$( "#bintang" ).append(' <i class="fa fa-star-half-o"></i> ');}
                    else{$( "#bintang" ).append(' <i class="fa fa-star"></i> ');}
                }

            }else{
                $( "#bintang" ).append(' <i class="fa fa-star-o"></i> ');
            }

        }

    });

    </script>
@endsection


@section('content')
@if($rates!="")
    <input type="hidden" value="{{ round($rates->rank / $rates->jumlah,2)}}" name="txtStar" id="txtStar">
@else
    <input type="hidden" value="0" name="txtStar" id="txtStar">
@endif
<header class="header header-transparent">
    <div class="header-wrapper">
        <div class="container">
            <div class="header-inner">
                <div class="header-logo">
                    <a href="index-2.html">
                        <img src="{{ asset('') }}assets/img/logo-white.png" alt="Logo">
                        <span>Tenomed</span>
                    </a>
                </div><!-- /.header-logo -->

                <div class="header-content">
                    <div class="header-bottom">
                        <!-- /.header-action -->
                        <ul class="header-nav-primary nav nav-pills collapse navbar-collapse" style="font-weight: 500;">
                            
                            <li class="active" >
                                <a href="{{url('/')}}">Home </a>

                            </li>
                        @if(Auth::check())

                            @permission(('user'))

                           <li><input type="hidden" name="idUser" id="idUser" value="{{Auth::user()->id}}">
                           <input type="hidden" name="status" id="status" style="color: black" value="{{$cek}}">
                           
                                <a href="#">
                                @if(Auth::user()->avatar=="")
                                <img src="{{Auth::user()->getAvatarUrl()}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;"><span style="text-transform: capitalize;  color: white;">{{Auth::user()->name}}</span> <i class="fa fa-chevron-down"></i></a>
                                @else
                                <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;"><span style="text-transform: capitalize;  color: white;">{{Auth::user()->name}}</span>  <i class="fa fa-chevron-down"></i></a>
                                @endif

                                <ul class="sub-menu">
                                     <li><a href="{{url('user/profile')}}">Profile</a></li>
                                        <li><a href="{{url('user/bookingList')}}">Booking Histories</a></li>
                                        <li><a href="{{url('user/bookmarks')}}">Bookmarks</a></li>
                                        <li><a href="{{url('user/review')}}">Review</a></li>
                                        <li><a href="{{url('user/setting')}}">Setting</a></li>
                                        <li>
                                            <a href="{{route('logout')}}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i> @lang('general.logout.logout')
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                        </li>
                                </ul>
                            </li>
                            @endpermission
                            
                        @else
                            <li class="active" >
                                <a style="border: 1px solid white;padding: 10px 17px;margin-top: 10px;" data-toggle="modal" href="/login">Login</a>

                            </li>
                             <li class="active">
                                <a data-toggle="modal" href="register">Sign Up</a>

                            </li>
                        @endif

                        </ul>

                        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div><!-- /.header-bottom -->
                </div><!-- /.header-content -->
            </div><!-- /.header-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-wrapper -->
</header><!-- /.header -->
<div class="main">
    <div class="main-inner">
        <div class="content">
            <div class="mt-150">
                <div class="hero-image">
                    <div class="hero-image-inner detail-banner" style="background-image: url('{{ asset('') }}assets/img/pizza3.jpg');">
                        <div class="hero-image-content">
                            <div class="container">
                                <h1 class="detail-title">{{ $detail->name }}</h1>
                                <div class="detail-banner-address" style="color: white;">
                                    <i class="fa fa-map-o"></i> {{ $detail->address }}
                                    <input type="hidden" name="kafe" id="kafe" value="{{ $detail->id }}">
                                </div><!-- /.detail-banner-address -->
                                <div class="detail-banner-rating" id="bintang">

                                </div><!-- /.detail-banner-rating -->
                                 @if(Auth::check())
                                    <div class="detail-banner-btn bookmark {{ $test }}" id="bookmarks">
                                        <i class="fa fa-bookmark-o"></i> <span data-toggle="Bookmark">Bookmark</span>
                                    </div><!-- /.detail-claim -->
                                   
                                @else
                                    <div class="detail-banner-btn bookmark" id="bookmarks" onclick="window.open('/login');">
                                        <i class="fa fa-bookmark-o"></i> <span data-toggle="Bookmarked">Bookmark</span>
                                    </div><!-- /.detail-claim -->
                                   
                                @endif
                            </div><!-- /.container -->
                        </div><!-- /.hero-image-content -->
                    </div><!-- /.hero-image-inner -->
                </div><!-- /.hero-image -->
            </div>

            <br><br><br>
            <div class="container">
                <div class="row detail-content">


                    <div class="col-sm-7">
                        <div class="detail-gallery">
                            <div class="detail-gallery-preview background-white">
                                <a href="{{ asset('') }}images/cdf9f740db31b7af453465e39411b891.jpg ">
                                    <img src="{{ asset('')}}images/cdf9f740db31b7af453465e39411b891.jpg">
                                </a>
                            </div>
                            <ul class="detail-gallery-index">
                            @foreach($foto as $fotos)
                                <li class="detail-gallery-list-item active">
                                    <a data-target="{{ asset('') }}images/{{$fotos->filename}}">
                                        <img src="{{ asset('') }}images/{{$fotos->filename}}" alt="..." class="img-responsive">
                                    </a>
                                </li>
                            @endforeach
                                
                            </ul>
                        </div><!-- /.detail-gallery -->
                        <br>
                        <div class="background-white p20">
                            <ul class="nav nav-pills nav-pills-rose">
                              <li class="active"><a href="#pill1" class="label label-lg label-success" data-toggle="tab" aria-expanded="true">Information</a></li>
                              <li class=""><a href="#pill2" data-toggle="tab" class="label label-lg label-success" aria-expanded="false">Our Menu</a></li>
                              <li class=""><a href="#pill3" data-toggle="tab" class="label label-lg label-success" aria-expanded="false">Review</a></li>
                              <li class=""><a href="#pill4" data-toggle="tab" class="label label-lg label-success" aria-expanded="false">Working Hour</a></li>
                              <li class=""><a href="#pill5" data-toggle="tab" class="label label-lg label-success" aria-expanded="false">Facility</a></li>
                            </ul>
                        </div>
                        <br>
                        <div class="background-white p20">

                            <div class="tab-content tab-space">
                                <div class="tab-pane active" id="pill1">
                                    <div class="background-white p20">
                                        <div class="detail-vcard">
                                            <div class="detail-logo">
                                                <img src="{{ asset('') }}images/{{$detail->image or 'lunch.png'}}" alt="img">
                                            </div><!-- /.detail-logo -->

                                            <div class="detail-contact">
                                                <div class="detail-contact-email">
                                                    <i class="fa fa-envelope-o"></i> <a href="mailto:#">company@example.com</a>
                                                </div>
                                                <div class="detail-contact-phone">
                                                    <i class="fa fa-mobile-phone"></i> <a href="tel:#">{{ $detail->phone }}</a>
                                                </div>
                                                <div class="detail-contact-address">
                                                    <i class="fa fa-map-o"></i>
                                                    {{ $detail->address }}
                                                </div>
                                            </div><!-- /.detail-contact -->
                                        </div><!-- /.detail-vcard -->
                                        <div class="detail-description">
                                            <p>{{ $detail->desc or "No description yet" }}</p>
                                        </div>
                                        <div class="detail-follow">
                                            <h5>Follow Us:</h5>
                                            <div class="follow-wrapper">
                                                <a class="follow-btn facebook" href="{{$detail->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                                <a class="follow-btn twitter" href="{{$detail->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>
                                            </div><!-- /.follow-wrapper -->
                                        </div>
                                    </div>
                                    <ul id="listing-detail-location" class="nav nav-tabs" role="tablist">

                                        <li role="presentation" class="active">
                                            <a href="#simple-map-panel" aria-controls="simple-map-panel" role="tab" data-toggle="tab">
                                                <i class="fa fa-map"></i>Maps
                                            </a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#street-view-panel" aria-controls="street-view-panel" role="tab" data-toggle="tab">
                                                <i class="fa fa-street-view"></i>Street View
                                            </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="simple-map-panel">
                                            <div class="detail-map">
                                                <div class="map-position">
                                                    <div id="listing-detail-map"
                                                         data-transparent-marker-image="{{ asset('') }}assets/img/transparent-marker-image.png"
                                                         data-styles='[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"labels.text.fill","stylers":[{"color":"#b43b3b"}]},{"featureType":"poi.park","elementType":"geometry.fill","stylers":[{"hue":"#ff0000"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road","elementType":"geometry.fill","stylers":[{"lightness":"8"},{"color":"#bcbec0"}]},{"featureType":"road","elementType":"labels.text.fill","stylers":[{"color":"#5b5b5b"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#7cb3c9"},{"visibility":"on"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#abb9c0"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"color":"#fff1f1"},{"visibility":"off"}]}]'
                                                         data-zoom="15"
                                                         data-latitude="{{ $detail->lat }}"
                                                         data-longitude="{{ $detail->long }}"
                                                         data-icon="fa fa-coffee">
                                                    </div><!-- /#map-property -->
                                                </div><!-- /.map-property -->
                                            </div><!-- /.detail-map -->
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="street-view-panel">
                                            <div id="listing-detail-street-view"
                                                    data-latitude="{{ $detail->lat }}"
                                                    data-longitude="{{ $detail->long }}"
                                                    data-heading="225"
                                                    data-pitch="0"
                                                    data-zoom="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="pill2">
                                    @foreach($kategori as $kategoris)
                                        <h5 style="text-transform: capitalize;font-weight: 400; padding: 0; text-align: center;" class="alert alert-warning">{{ucfirst($kategoris->category)}}</h5>
                                            
                                        <div class="row">
                                            @foreach($menu as $menus)
                                                @if($menus->category==$kategoris->category)
                                                <div class="col-sm-4">
                                                    <div class="card-small">
                                                        <div class="card-small-image">
                                                            <a href="#">
                                                                <img src="{{ asset('') }}images/{{$menus->images or 'lunch.png'}}" alt="img">
                                                            </a>
                                                        </div><!-- /.card-small-image -->
                                                        <div class="card-small-content">
                                                            <h3><a href="#" style="text-transform: capitalize;">{{$menus->name}}</a></h3>
                                                            <h4><a href="#" style="text-transform: capitalize;">{{$menus->desc}}</a></h4>
                                                            <div class="card-small-price">Rp.{{$menus->price}}</div>
                                                        </div><!-- /.card-small-content -->
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div><!-- /.row -->
                                    @endforeach           
                                </div>
                                <div class="tab-pane" id="pill3">
                                    <div class="reviews">
                                        @if(Auth::check())
                                            <form class="background-white p20 add-review" method="Post" action="/sendReview">
                                                <div class="reviews">
                                                    <div class="review-image">
                                                        @if(Auth::user()->avatar=="")
                                                            <img src="{{Auth::user()->getAvatarUrl()}}" alt="">
                                                        @else
                                                            <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="">        
                                                        @endif
                                                    </div><!-- /.review-image -->


                                                    <div class="review-inner">
                                                        <div class="review-title">
                                                            <h2>{{Auth::user()->name}}</h2>
                                                            <!-- <span class="report">
                                                                <span class="separator">•</span><i class="fa fa-flag" title="" data-toggle="tooltip" data-placement="top" data-original-title="Report"></i>
                                                            </span> -->
                                                            <div class="row">
                                                                <div class="form-group input-rating col-sm-8">

                                                                    <div class="rating-title">Rate This Cafe</div>

                                                                    <input value="1" name="rate" id="rating-food-1" type="radio" required="">
                                                                    <label for="rating-food-1"></label>
                                                                    <input value="2" name="rate" id="rating-food-2" type="radio" required="">
                                                                    <label for="rating-food-2"></label>
                                                                    <input value="3" name="rate" id="rating-food-3" type="radio" required="">
                                                                    <label for="rating-food-3"></label>
                                                                    <input value="4" name="rate" id="rating-food-4" type="radio" required="">
                                                                    <label for="rating-food-4"></label>
                                                                    <input value="5" name="rate" id="rating-food-5" type="radio" required="">
                                                                    <label for="rating-food-5"></label>

                                                                    <input type="hidden" name="idUser" value="{{Auth::user()->id}}">
                                                                    <input type="hidden" name="idCafe" value="{{ $detail->id }}">
                                                                    <input type="hidden" name="parent" value="0">
                                                                    <input type="hidden" name="_method" value="POST">
                                                                    <input type="hidden" name="_token" value="{{ Session::token() }}">

                                                                </div><!-- /.col-sm-3 -->
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-sm-12">
                                                                    <label for="">Review Description</label>
                                                                    <textarea class="form-control" rows="5" id="desc" name="desc" required=""></textarea><div class="textarea-resize"></div>
                                                                </div><!-- /.col-sm-6 -->

                                                                <div class="col-sm-8">
                                                                    <p>Required fields are marked <span class="required">*</span></p>
                                                                </div><!-- /.col-sm-8 -->
                                                                <div class="col-sm-4">
                                                                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-star"></i>Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            Please <a href="{{url('login')}}"> Login </a>, to make a review!
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane" id="pill4">
                                    <h5 style="text-transform: capitalize;font-weight: 400; padding: 0; text-align: center;" class="alert alert-warning">Working Hours</h5>

                                    <div class="p20 background-white">
                                        <div class="working-hours">
                                            <?php
                                                $days= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                                                $tmp = 0;
                                            ?>
                                            @for ($i = 0; $i <= 6; $i++)
                                                <div class="day clearfix">
                                                    <span class="name">{{ $days[$i] }}</span><span class="hours">
                                                    @if(isset($jambuka[$tmp]) and $i == $jambuka[$tmp]->day)
                                                        {{$jambuka[$tmp]->open_hour}} Wib - {{$jambuka[$tmp]->close_hour}} Wib 
                                                        <?php  
                                                            $tmp += 1;
                                                        ?>
                                                    @else
                                                        Closed
                                                    @endif
                                                    </span>
                                                </div>
                                            @endfor     
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="pill5">
                                    <div class="widget">
                                        <h5 style="text-transform: capitalize;font-weight: 400; padding: 0; text-align: center;" class="alert alert-danger">Our Facility</h5>
                                        <div class="background-white p20">
                                            <ul class="detail-amenities">
                                                @if(count($highlight))
                                                    @foreach($highlight as $highlights)
                                                        <li class="yes" style="text-transform: capitalize;">{{$highlights->name}}</li>
                                                    @endforeach
                                                @else
                                                    <h5>There is no facility yet</h5>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <div class="background-white p20">
                            @if($rates != "")
                            <div class="detail-overview-rating">
                                <i class="fa fa-star"></i> <strong>{{ round($rates->rank / $rates->jumlah,2)}} / 5 </strong>from <a href="#">{{$rates->jumlah}} reviews</a>
                            </div>
                            @else
                            <div class="detail-overview-rating">
                                <i class="fa fa-star"></i> <strong>0 / 5 </strong>from <a href="#">0 reviews</a>
                            </div>
                            @endif

                            <div class="detail-actions row">
                                <div class="col-sm-4">
                                  @if(Auth::check())

                                    @permission(('user'))
                                    <div class="btn btn-primary btn-book" onclick="location.href='/booking/{{ $detail->id }}?id={{Auth::user()->id}}';"><i class="fa fa-shopping-cart"></i> Book Now</div>
                                    @endpermission
                                    
                                    @else
                                         <div class="btn btn-primary btn-book" onclick="location.href='/login'"><i class="fa fa-shopping-cart"></i> Book Now</div>
                                    @endif
                                </div><!-- /.col-sm-4 -->
                                <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                          <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="btn btn-secondary btn-share"><i class="fa fa-share-square-o"></i> Share
                                        <div class="share-wrapper">
                                            <ul class="share">
                                                <li><i class="fa fa-facebook doggo"></i><a href="https://www.facebook.com/sharer/sharer.php?u={{url('/')}}"  target="_blank">Facebook</a> </li>
                                                <li><i class="fa fa-twitter doggo"></i> <a href="https://twitter.com/intent/tweet?url={{url('/')}}"  target="_blank">Twitter</a></li>
                                                <li><i class="fa fa-google-plus doggo"></i><a href="https://plus.google.com/share?url={{url('/')}}"  target="_blank"> Google+</a></li>
                                              <!--  -->

                                            </ul>
                                        </div>
                                    </div>
                                </div><!-- /.col-sm-4 -->
                                <div class="col-sm-4">
                                    @if(Auth::check())
                                        <div class="btn btn-secondary btn-claim" onclick="report()"><i class="fa fa-hand-peace-o"></i> Report</div>
                                    @else
                                        <div class="btn btn-secondary btn-claim" onclick="window.open('/login');"><i class="fa fa-hand-peace-o"></i> Report</div>
                                    @endif
                                </div><!-- /.col-sm-4 -->
                            </div><!-- /.detail-actions -->
                        </div>
                        <h2><span class="text-secondary">Recent listing</span></h2>
                        <div class="background-white p20">
                            <div class="cards-small">
                                @foreach($recent as $item)
                                  <div class="card-small">
                                      <div class="card-small-image">
                                          <a href="listing-detail.html">
                                              <img src="{{ asset('') }}images/{{$item->image or kafe.png}}" alt="img">
                                          </a>
                                      </div><!-- /.card-small-image -->

                                      <div class="card-small-content">
                                          <h3><a href="/detail/{{$item->id}}">{{$item->name}}</a></h3>
                                          <h4><a href="/detail/{{$item->id}}">{{$item->desc}}</a></h4>
                                          <div class="/detail/{{$item->id}}">{{$item->seat}}/ person</div>
                                      </div><!-- /.card-small-content -->
                                  </div><!-- /.card-small -->
                                @endforeach
                            </div>
                        </div>
                        @if(Auth::check())
                            <h2>Send a massage</h2>
                            <form class="form form-vertical" action="/message" method="POST" id="dataku" enctype="multipart/form-data">
                                <div class="detail-enquire-form background-white p20">
                                    <div class="row" style="margin:0; padding:0;">
                                            <div class="cards-small" style="background-color: gray;">
                                                <div class="card-small">
                                                  <div class="user" style="float: left;">

                                                    @if(Auth::user()->avatar!="")
                                                         <img  src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="" >  
                                                    @else
                                                        <img  src="{{ asset('') }}images/user.png" alt="" >  
                                                    @endif 

                                                  </div><!-- /.card-small-image -->

                                                  <div class="card-small-content">
                                                      <h3 style="margin-top: 10px;">{{Auth::user()->name}}</h3>
                                                  </div><!-- /.card-small-content -->
                                                </div><!-- /.card-small -->
                                            </div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label for="">Message <span class="required">*</span></label>
                                        <textarea class="form-control" name="pesanChat" id="pesanChat" rows="5" required></textarea>
                                    </div><!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="images">File input</label>
                                        <input type="file" id="images" name="images">
                                    </div>
                                    <input type="hidden" value="{{$detail->user_id}}" name="untuk">
                                    <input type="hidden" value="{{$detail->id}}" name="kafe">

                                    <p>Required fields are marked <span class="required">*</span></p>

                                    <button class="btn btn-primary btn-block" id="btnSend" type="submit"><i class="fa fa-paper-plane"></i>Send Message</button>
                                </div><!-- /.detail-enquire-form -->
                            </form>
                        @endif
                    </div>
                </div>
                <br>
                
                <div class="mt-80 background-white " style="display: inherit;">
                    <div class="page-header">
                        <br><br>
                        <h1>Testimonials</h1>
                        <p>Read what our customers says about our cafe services and menu. Do you want to.</p>
                    </div>
                    <div class="row" style="padding: 20px;">
                   
                        @foreach($review as $reviews)

                           
                                <div class="col-sm-6">
                                    <div class="testimonial">
                                        <div class="testimonial-image" >
                                            @if($reviews->avatar=="")
                                                <img src="{{ asset('') }}images/user.png" alt="">
                                            @else
                                                <img src="{{ asset('') }}images/{{$reviews->avatar}}" alt="">        
                                            @endif
                                        </div>
                                        <div class="testimonial-inner">
                                            <div class="testimonial-title">
                                                <h2 style="text-transform: capitalize;">{{$reviews->name}}</h2>
                                                <div class="testimonial-rating">
                                                    @for($i=0;$i<5;$i++)
                                                        @if($i<$reviews->rate)
                                                            <i class="fa fa-star"></i>
                                                        @else
                                                            <i class="fa fa-star-o"></i>
                                                        @endif
                                                    @endfor
                                                    &nbsp;&nbsp;&nbsp;
                                                     @if(Auth::check())
                                                        @if($reviews->user_id==Auth::user()->id)
                                                       <!--  <span class="glyphicon glyphicon-edit" onclick="editReview('{{$reviews->id}}', {{$reviews->rate}}, '{{$reviews->description}}','{{$reviews->name}}')" style="color: gray; cursor: pointer;"></span> -->
                                                        <span class="glyphicon glyphicon-trash" onclick="deleteReview({{$reviews->id}})" style="color: gray; cursor: pointer;"></span>
                                                        @endif
                                                    @endif
                                                </div><!-- /.testimonial-rating -->

                                            </div>
                                            <p>{{$reviews->description}}</p>
                                            @if(Auth::check())
                                                <div class="testimonial-sign" >
                                                    <span id="reply" class="label label-primary" onclick="budi('{{$reviews->id}}')" style="cursor: pointer;">Reply</span> 
                                                    <span id="reply" class="label label-secondary" onclick="budi1('{{$reviews->id}}')" style="cursor: pointer;">View Comments</span> 
                                                </div>
                                                
                                                <div class="" id="replyKu{{$reviews->id}}" style="display: none;">
                                                    <div class="row" style="margin:0; padding:0;">
                                                        <form class="background-white p20 add-review " style="margin:0; padding:0;" method="post" action="/sendReview">
                                                            <div class="review">
                                                                <div class="col-sm-2" style="margin:0; padding:0;">
                                                                    <div class="user">
                                                                        @if(Auth::user()->avatar=="")
                                                                            <img src="{{Auth::user()->getAvatarUrl()}}" alt="">
                                                                        @else
                                                                            <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="">        
                                                                        @endif  
                                                                    </div>
                                                                </div>
                                                                <div class="">
                                                                    <input name="idUser" value="{{Auth::user()->id}}" type="hidden">
                                                                    <input name="parent" value="{{$reviews->id}}" type="hidden">
                                                                    <input type="hidden" name="idCafe" value="{{ $detail->id }}">
                                                                    <input name="_method" value="POST" type="hidden">
                                                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                                </div>
                                                                <div class="col-sm-8" style="margin:0; padding:0;">
                                                                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Comment  here">
                                                                </div>
                                                                <div class="col-sm-2" style="margin-left:-2px; padding:0;">
                                                                    <button type="submit" class="btn btn-primary"><i class="fa fa-comment"></i> </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="testimonial-sign" >
                                                    <span id="reply" class="label label-primary" onclick="location.href='/login'" style="cursor: pointer;">Reply</span> 
                                                    <span id="reply" class="label label-secondary" onclick="budi1('{{$reviews->id}}')" style="cursor: pointer;">View Comments</span> 
                                                </div>
                                            @endif                                   
                                            @if(count($child))
                                                <hr>
                                                <div class="" id="commentKu{{$reviews->id}}" style="display: none;">
                                                    @foreach($child as $childs)
                                                        <div class="row" style="margin:0; padding:0;">
                                                            @if($childs->parent_id === $reviews->id)
                                                                <div class="cards-small" style="background-color: gray;">
                                                                    <div class="card-small">
                                                                      <div class="user" style="float: left;">
                                                                            @if($childs->avatar=="")
                                                                                <img src="{{ asset('') }}images/user.png" alt="" >
                                                                            @else
                                                                                <img  src="{{ asset('') }}images/{{$childs->avatar}}" alt="" >        
                                                                            @endif
                                                                      </div><!-- /.card-small-image -->

                                                                      <div class="card-small-content">
                                                                            <div class="row">
                                                                                <div class="col-sm-8">
                                                                                    <h3>{{$childs->name}}</h3>
                                                                                    <div><p>{{$childs->description}}</p></div>
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    @if(Auth::check())
                                                                                        @if($childs->user_id==Auth::user()->id)
                                                                                        <!-- <span class="glyphicon glyphicon-edit" style="color: gray; cursor: pointer;"></span> -->
                                                                                        <span class="glyphicon glyphicon-trash" onclick="deleteReview({{$childs->id}})" style="color: gray; cursor: pointer;"></span>
                                                                                        @endif
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                      </div><!-- /.card-small-content -->
                                                                    </div><!-- /.card-small -->
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('java')
<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDIRkl1cY2ICLQfdp5ohLziL3brKgJeLoo",
    authDomain: "tenomed-7b6aa.firebaseapp.com",
    databaseURL: "https://tenomed-7b6aa.firebaseio.com",
    projectId: "tenomed-7b6aa",
    storageBucket: "tenomed-7b6aa.appspot.com",
    messagingSenderId: "214458013786"
  };
  firebase.initializeApp(config);

  var pesan= document.querySelector('#pesanChat');
hideLoading(); 
  $(document).ready(function() {
    hideLoading(); 
          //bootbox.alert("Hello world!");

     if($("#status").val()==1){
        $('#bookmarks').addClass("marked");
     } 


     $("#dataku").submit(function(e) {
        e.preventDefault(); // prevent page refresh

       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formdata = new FormData(this);  
         $.ajax({
          type: 'POST',
          url: '/message?status=1',
          data :formdata, 
          contentType: false,
          cache: false,
          processData: false,
          success: function( data ) {
            bootbox.alert("Message has been send");
            $("#dataku")[0].reset();
          }
         });
    });

    var rootchatref = firebase.database().ref('/');  
    var chatref = firebase.database().ref('/'+$("#idUser").val()+'_'+$("#kafe").val()); 
    

    // var dataSuk = [];
    // chatref.orderByChild('date').on('child_added', function(snapshot) {  
    //     // snapshot.forEach(function(data){
    //     //     $('#chat_data').prepend('<li class="left clearfix"><span class="chat-img pull-left"><img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" /></span><div class="chat-body clearfix"><div class="header"><strong class="primary-font">'+data.user+'</strong> <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>'+ data.date +'</small></div><p>'+data.msg+'</p></div></li>');
    //     // });
    //     var data = snapshot.val();
    //     // dataSuk.push(data);
    //     $('#chat_data').prepend('<li class="left clearfix"><span class="chat-img pull-left"><img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" /></span><div class="chat-body clearfix"><div class="header"><strong class="primary-font">'+data.user+'</strong> <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>'+ data.date +'</small></div><p>'+data.msg+'</p></div></li>');
    //     console.log(dataSuk);
    // });  


    $('#btnSend').click(function(){
        writeChat('user1', pesan.value);
    });
});

function writeChat(user, msg) {  
    var postData = {  
        msg : msg,  
        user: user,
        date: Date.now()
    };
    console.log(postData);
    // Get a key for a new Post.  
    var newPostKey = firebase.database().ref().child($("#idUser").val()+'_'+$("#kafe").val()).push().key;
    var updates = {};
    updates['/'+$("#idUser").val()+'_'+$("#kafe").val()+'/'+newPostKey] = postData;

    
    return firebase.database().ref().update(updates);
}



</script>
<script >



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


    function report(){
        bootbox.confirm({message:'        <form class="background-white p20 add-review" id="formReport" method="post" action="/sendReport">            <div class="row">                      <div class="col-sm-4">                                <div class="detail-logo">                                        <img src="{{ asset('') }}images/{{$detail->image or 'lunch.png'}}" alt="img" width="230">                                </div>                        </div><!-- /.col-* -->                    @if(Auth::check())<input type="hidden" name="idUser" value="{{Auth::user()->id}}">@endif                <input type="hidden" name="idCafe" value="{{ $detail->id }}">                <input type="hidden" name="_method" value="POST">                <input type="hidden" name="_token" value="{{ Session::token() }}">                      <div class="col-sm-8">                                <div class="form-group">                                        <h6>Laporkan Cafe ini</h6>                                        <div class="radio">                                                <input id="satu" type="radio" onclick="lain()" name="report" value="Memeberikan Informasi yang tidak valid" checked=""><label for="satu">Memeberikan Informasi yang tidak valid</label>                                        </div>                                        <div class="radio">                                                <input id="dua" type="radio" onclick="lain()" name="report" value="Menu tidak sesuai dengan Infomasi yang diberikan" ><label for="dua">Menu tidak sesuai dengan Infomasi yang diberikan </label>                                        </div>                                        <div class="radio">                                               <input id="tiga" type="radio" onclick="lain()" name="report" value="Menjual Makanan yang dilarang" ><label for="tiga">Menjual Makanan yang dilarang</label>                                        </div>                                        <div class="radio">                                                <input id="empat" type="radio" onclick="lain()" name="report" value="Pembatalan reservasi Secara" ><label for="empat">Pembatalan reservasi Secara Sepihak</label>                                        </div>                                        <div class="radio">                                                <input id="lima" type="radio" onclick="lain1()" name="report" value="Lainnya"><label for="lima">Lainnya</label>                                    </div>                        <div class="form-group" id="enam" style="display: none;">                            <input type="text" class="form-control" id="exampleInputText1" name="txtReport" placeholder="Report Detail">                        </div>                                </div>                                 </div><!-- /.col-* -->                </div>        </form>',size:'large',
            callback: function(result){ 
            if(result==true){
                $("#formReport").submit();
            }
         }
        });
    }
    function budi(aku){
       document.getElementById("replyKu"+aku).style.display='inherit';
    };
    function budi1(aku){
       document.getElementById("commentKu"+aku).style.display='inherit';
    };
    function lain(){

      document.getElementById("enam").style.display='none';

    }
    function lain1(){

      document.getElementById("enam").style.display='inherit';

    }

     $(function(){

    $('#bookmarks').click(function(){


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


         console.log("tes masuk");
         var a=$('#idUser').val();
         var b=$('#kafe').val();

         if($('#bookmarks').hasClass("marked")){
          $('#status').val(1);
         }else{
          $('#status').val(0);
         }
         console.log($('#status').val());
         $.ajax({
          type: 'GET',
          url: '/bookmarks?status='+$('#status').val()+'&cek='+$('#status').val(),

          data: {'idUser':a, 'kafe':b},
          success: function( data ) {

          }
         });
      });
  });
</script>
@endsection

