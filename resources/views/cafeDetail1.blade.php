@extends('layouts.intro')

@section('content')
<div class="page-wrapper">
    
   

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
                                <a href="/">Home </a>

                            </li>
                        @if(Auth::check())

                            @permission(('user'))

                           <li><input type="hidden" name="idUser" id="idUser" value="{{Auth::user()->id}}">
                           <input type="hidden" name="status" id="status" value="">
                           @if($bookmarks != "")
                           <input type="hidden" name="bokk" id="bokk" value="{{$bookmarks->status}}">
                           @endif
                           
                                <a href="#">
                                @if(Auth::user()->avatar=="")
                                <img src="{{Auth::user()->getAvatarUrl()}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;">{{Auth::user()->name}} <i class="fa fa-chevron-down"></i></a>
                                @else
                                <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;">{{Auth::user()->name}} <i class="fa fa-chevron-down"></i></a>
                                @endif

                                <ul class="sub-menu">
                                    <li><a href="user/profile">Profile</a></li>
                                    <li><a href="user/profile">Notifications</a></li>
                                    <li><a href="user/profile">Bookmarks</a></li>
                                    <li><a href="user/profile">Review</a></li>
                                    <li><a href="user/profile">Setting</a></li>
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
                                <a style="border: 1px solid white;padding: 10px 17px;margin-top: 10px;" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Login</a>

                            </li>
                            <li class="active">
                                <a data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Sign Up</a>

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
<!-- 
 <div class="modal fade login" id="loginModal">
              <div class="modal-dialog login animated">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Login with</h4>
                    </div>
                    <div class="modal-body">
                        <div class="box">
                             <div class="content">
                                <div class="social">
                                    <a class="circle github" href="#">
                                        <i class="fa fa-github fa-fw"></i>
                                    </a>
                                    <a id="google_login" class="circle google" href="#">
                                        <i class="fa fa-google-plus fa-fw"></i>
                                    </a>
                                    <a id="facebook_login" class="circle facebook" href="#">
                                        <i class="fa fa-facebook fa-fw"></i>
                                    </a>
                                </div>
                                <div class="division">
                                    <div class="line l"></div>
                                      <span>or</span>
                                    <div class="line r"></div>
                                </div>
                                <div class="error"></div>
                                <div class="form loginBox">
                                    <form method="" action="#" accept-charset="UTF-8">
                                    <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                    <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                    <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                                    </form>
                                </div>
                             </div>
                        </div>
                        <div class="box">
                            <div class="content registerBox" style="display:none;">
                             <div class="form">
                                <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                                <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                                <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                                <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                                <input class="btn btn-default btn-register" type="button" value="Create account" name="commit">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="forgot login-footer">
                            <span>Looking to
                                 <a href="javascript: showRegisterForm();">create an account</a>
                            ?</span>
                        </div>
                        <div class="forgot register-footer" style="display:none">
                             <span>Already have an account?</span>
                             <a href="javascript: showLoginForm();">Login</a>
                        </div>
                    </div>
                  </div>
              </div>
          </div> -->


    <div class="main">
        <div class="main-inner">
            <div class="content">
                <div class="mt-150">
    <div class="hero-image">
    <div class="hero-image-inner detail-banner" style="background-image: url('{{ asset('') }}assets/img/pizza3.jpg');">
        <div class="hero-image-content">
            <div class="container">
            
                <h1 class="detail-title">
                <span style="text-transform: capitalize;">{{ ($detail->name) }}</span>

            </h1>
            <div class="detail-banner-address" style="color: white;">
                <i class="fa fa-map-o"></i> {{ $detail->address }}
                <input type="hidden" name="kafe" id="kafe" value="{{ $detail->id }}">
            </div><!-- /.detail-banner-address -->
            		<div class="detail-banner-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-o"></i>
            </div><!-- /.detail-banner-rating -->
                 @if(Auth::check())
                    <div class="detail-banner-btn bookmark {{ $test }}" id="bookmarks">
                        <i class="fa fa-bookmark-o"></i> <span data-toggle="Bookmarked">Bookmark</span>
                    </div>
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
            <div class="detail-gallery-preview">
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

        <h2>We Are Here</h2>


        <div class="background-white p20">
                            <ul class="nav nav-pills nav-pills-rose">
                              <li class="active"><a href="#pill1" data-toggle="tab" class="btn btn-lg btn-danger" aria-expanded="true">Information</a></li>
                              <li class="{{$status}}"><a href="#pill2" data-toggle="tab" class="btn btn-lg btn-danger"  aria-expanded="false">Our Menu</a></li>
                              @if(Auth::check())
                              <li class=""><a href="#pill3" data-toggle="tab" class="btn btn-lg btn-danger"  aria-expanded="false">Review</a></li>
                              @endif
                              <li class=""><a href="#pill4" data-toggle="tab" class="btn btn-lg btn-danger"  aria-expanded="false">Working hour</a></li>
                              <li class=""><a href="#pill5" data-toggle="tab" class="btn btn-lg btn-danger"  aria-expanded="false">Facility</a></li>
                            </ul>
                            <div class="tab-content tab-space">
                                <div class="tab-pane active" id="pill1">
                                <div class="background-white p20">
            <div class="detail-vcard">
                <div class="detail-logo">
                    <img src="{{ asset('') }}assets/img/tmp/pragmaticmates-logo.png">
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
                <p>{{ $detail->desc }}</p>
            </div>
            
            <div class="detail-follow">
                <h5>Follow Us:</h5>
                <div class="follow-wrapper">
                    <a class="follow-btn facebook" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="follow-btn youtube" href="#"><i class="fa fa-youtube"></i></a>
                    <a class="follow-btn twitter" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="follow-btn tripadvisor" href="#"><i class="fa fa-tripadvisor"></i></a>
                    <a class="follow-btn google-plus" href="#"><i class="fa fa-google-plus"></i></a>
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

                <!-- Tab panes -->
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
                <h6 style="text-transform: capitalize;">{{ucfirst($kategoris->category)}}</h6>
                    
                        <div class="row">
                        @foreach($menu as $menus)
                            @if($menus->category==$kategoris->category)
                            <div class="col-sm-4">
                            <div class="card-small">
                            <div class="card-small-image">
                                <a href="#">
                                    <img src="{{ asset('') }}images/{{$menus->images or '204827lunch.png'}}" alt="Tasty Brazil Coffee">
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
            <div class="tab-pane" id="pill4">

                <h2 >Working Hours</h2>

                    <div class="p20 background-white">
                        <div class="working-hours">
                        <?php
                                $days= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                                $tmp = 0
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
    
                        <h2 >Our Facility</h2>
                            <div class="background-white p20">
                                    <ul class="detail-amenities">
                                        <li class="yes">WiFi</li>
                                        <li class="yes">Parking</li>
                                        <li class="no">Vine</li>
                                        <li class="yes">Terrace</li>
                                        <li class="no">Bar</li>
                                        <li class="yes">Take Away Coffee</li>
                                        <li class="no">Catering</li>
                                        <li class="yes">Raw Food</li>
                                        <li class="no">Delivery</li>
                                        <li class="yes">No-smoking room</li>
                                        <li class="no">Reservations</li>
                                    </ul>
                                </div>
                        </div>


            </div>

                                <div class="tab-pane" id="pill3">
                                        <div class="reviews">



 <form class="background-white p20 add-review" method="post" action="/sendReview">
@if(Auth::check())
<div class="review">
        <div class="review-image">
                @if(Auth::user()->avatar=="")
                    <img src="{{ asset('') }}images/user.png" alt="">
                @else
                    <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="">        
                @endif
        </div><!-- /.review-image -->

        <div class="review-inner">
            <div class="review-title">
                <h2>{{Auth::user()->name}}</h2>
                
                <span class="report">
                    <span class="separator">•</span><i class="fa fa-flag" title="" data-toggle="tooltip" data-placement="top" data-original-title="Report"></i>
                </span>
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

                </div><!-- /.col-sm-3 -->
            </div>
            <input type="hidden" name="idUser" value="{{Auth::user()->id}}">
            <input type="hidden" name="idCafe" value="{{ $detail->id }}">

            <input type="hidden" name="parent" value="0">
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
            <!-- <input type="_token" name="idCafe" value="{{ csrf_token() }}"> -->
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

           
        </form>
                
            </div><!-- /.review-content-wrapper -->

        </div><!-- /.review-inner -->
    </div>

@endif

    

</div>
                                </div>
                            </div>

            <!-- Nav tabs -->
            
        </div>

       


        
        

    </div><!-- /.col-sm-7 -->

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
                                <li><i class="fa fa-facebook"></i> Facebook</li>
                                <li><i class="fa fa-twitter"></i> Twitter</li>
                                <li><i class="fa fa-google-plus"></i> Google+</li>
                                <li><i class="fa fa-pinterest"></i> Pinterest</li>
                                <li><i class="fa fa-chain"></i> Link</li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col-sm-4 -->
                <div class="col-sm-4">
                    <div class="btn btn-secondary btn-claim"><i class="fa fa-hand-peace-o"></i> Claim</div>
                </div><!-- /.col-sm-4 -->
            </div><!-- /.detail-actions -->
        </div>

        <h2><span class="text-secondary">Recomended Cafe</span></h2>
        <div class="background-white p20">
            

            <div class="cards-small">
            <div class="card-small">
                <div class="card-small-image">
                    <a href="listing-detail.html">
                        <img src="{{ asset('') }}assets/img/tmp/product-2.jpg" alt="Tasty Brazil Coffee">
                    </a>
                </div><!-- /.card-small-image -->

                <div class="card-small-content">
                    <h3><a href="listing-detail.html">Tasty Brazil Coffee</a></h3>
                    <h4><a href="listing-detail.html">New York / Village</a></h4>

                    <div class="card-small-price">$180 / person</div>
                </div><!-- /.card-small-content -->
            </div><!-- /.card-small -->
            <div class="card-small">
                <div class="card-small-image">
                    <a href="listing-detail.html">
                        <img src="{{ asset('') }}assets/img/tmp/product-2.jpg" alt="Tasty Brazil Coffee">
                    </a>
                </div><!-- /.card-small-image -->

                <div class="card-small-content">
                    <h3><a href="listing-detail.html">Tasty Brazil Coffee</a></h3>
                    <h4><a href="listing-detail.html">New York / Village</a></h4>

                    <div class="card-small-price">$180 / person</div>
                </div><!-- /.card-small-content -->
            </div><!-- /.card-small -->
            
           
            <div class="card-small">
                <div class="card-small-image">
                    <a href="listing-detail.html">
                        <img src="{{ asset('') }}assets/img/tmp/product-2.jpg" alt="Tasty Brazil Coffee">
                    </a>
                </div><!-- /.card-small-image -->

                <div class="card-small-content">
                    <h3><a href="listing-detail.html">Tasty Brazil Coffee</a></h3>
                    <h4><a href="listing-detail.html">New York / Village</a></h4>

                    <div class="card-small-price">$180 / person</div>
                </div><!-- /.card-small-content -->
            </div><!-- /.card-small -->
        </div>
            
        </div>

        


        <h2>Send A Massagge</h2>

        <div class="detail-enquire-form background-white p20">
            <form method="post" action="http://preview.byaviators.com/template/superlist/listing-detail.html?">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="" id="">
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label for="">Email <span class="required">*</span></label>
                    <input type="email" class="form-control" name="" id="" required>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label for="">Message <span class="required">*</span></label>
                    <textarea class="form-control" name="" id="" rows="5" required></textarea>
                </div><!-- /.form-group -->

                <p>Required fields are marked <span class="required">*</span></p>

                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-paper-plane"></i>Send Message</button>
            </form>
        </div><!-- /.detail-enquire-form -->

        
    </div><!-- /.col-sm-5 -->

    
</div><!-- /.row -->



<div class="main ">
        <div class="main-inner ">
            <div class="container background-white">
                <div class="content ">
                    


                    <div class="mt-80 ">
    <div class="page-header">
    <br>
    <h2>Testimonials</h2>
</div><!-- /.page-header -->

<div class="row">
    @foreach($review as $reviews)
        <div class="col-sm-6">
            <div class="testimonial">
                <div class="testimonial-image" >
                    @if($reviews->avatar=="")
                    <img src="{{ asset('') }}images/uer.png" alt="">
                @else
                    <img src="{{ asset('') }}images/{{$reviews->avatar}}" alt="">        
                @endif
                </div><!-- /.testimonial-image -->

                <div class="testimonial-inner">
                    <div class="testimonial-title">
                        <h2 style="text-transform: capitalize;">{{$reviews->name}}</h2>

                        <div class="testimonial-rating">
                             @for($i=0;$i<$reviews->rate;$i++)
                            <i class="fa fa-star"></i>
                        @endfor
                        </div><!-- /.testimonial-rating -->
                    </div><!-- /.testimonial-title -->

                    {{$reviews->desc}}



                     @if(Auth::check())
                     <div class="testimonial-sign" id="reply" onclick="budi('{{$reviews->id}}')" style="cursor: pointer;">Reply</div>
                     <div class="" id="replyKu{{$reviews->id}}" style="display: none;">
                    <hr>
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

                            <input name="idUser" value="{{Auth::user()->id}}" type="hidden">
                                <input name="parent" value="{{$reviews->id}}" type="hidden">
                                <input type="hidden" name="idCafe" value="{{ $detail->id }}">
                                <input name="_method" value="POST" type="hidden">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                 <div class="col-sm-8" style="margin:0; padding:0;">
                                <input type="text" class="form-control" id="desc" name="desc" placeholder="Comment  here">
                                </div>
                                <div class="col-sm-2" style="margin-left:-2px; padding:0;">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-comment"></i> </button>
                                </div>
                                </div>
                        </form>


                            </div>
                    </div> <!-- abis  -->
                     @else
                     <div class="testimonial-sign" id="reply" onclick="location.href='/login'" style="cursor: pointer;">Reply</div>
                     @endif
                     @if(count($child))
                          @foreach($child as $childs)
                                @if($childs->parent_id === $reviews->id)
                                        <div class="row" style="margin:0; padding:0;">
                                            <form class="background-white p20 add-review " style="margin:0; padding:0;" method="post" action="/sendReview">
                                            <div class="review">
                                                <div class="col-sm-2" style="margin:0; padding:0;">
                                                    <div class="user">
                                                        @if($childs->avatar=="")
                                                            <img src="{{ asset('') }}images/user.png" alt="">
                                                        @else
                                                            <img src="{{ asset('') }}images/{{$childs->avatar}}" alt="">        
                                                        @endif  
                                                    </div>
                                                </div>
                                                <div class="col-sm-10" style="margin:0; padding:0;">
                                                    <span>{{$childs->desc}}</span>
                                                </div>
                                            </div>          
                                        </div>
                                    </form>
                                </div>
                                @endif
                            @endforeach
                    @endif
                </div><!-- /.testimonial-inner -->
            </div><!-- /.testimonial -->
        </div><!-- /.col-* -->
    @endforeach
 <div class="col-sm-12">{{ $review->links() }}<br></div></div>

</div>

                </div><!-- /.content -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div>

</div><!-- /.container -->

            </div><!-- /.content -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->

    <footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h2>About Superlist</h2>

                    <p>Superlist is directory template built upon Bootstrap and SASS to bring great experience in creation of directory.</p>
                </div><!-- /.col-* -->

                <div class="col-sm-4">
                    <h2>Contact Information</h2>

                    <p>
                        Your Street 123, Melbourne, Australia<br>
                        +1-123-456-789, <a href="#">sample@example.com</a>
                    </p>
                </div><!-- /.col-* -->

                <div class="col-sm-4">
                    <h2>Stay Connected</h2>

                    <ul class="social-links nav nav-pills">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                    </ul><!-- /.header-nav-social -->
                </div><!-- /.col-* -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-top -->

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-left">
                &copy; 2015 All rights reserved. Created by <a href="#">Aviators</a>.
            </div><!-- /.footer-bottom-left -->

            <div class="footer-bottom-right">
                <ul class="nav nav-pills">
                    <li><a href="index-2.html">Home</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                    <li><a href="terms-conditions.html">Terms &amp; Conditions</a></li>
                    <li><a href="contact-1.html">Contact</a></li>
                </ul><!-- /.nav -->
            </div><!-- /.footer-bottom-right -->
        </div><!-- /.container -->
    </div>
</footer><!-- /.footer -->

@endsection

