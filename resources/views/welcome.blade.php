

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
@endsection

@section('content')
  

    <header class="header opaque">
        <div class="header-wrapper">
            <div class="container">
                <div class="header-inner">
                    <div class="header-logo">
                        <a href="/">
                            <img src="{{ asset('') }}assets/img/logo-white.png" alt="Logo">
                            <span>Tenomed</span>
                        </a>
                    </div><!-- /.header-logo -->

                    <div class="header-content">
                        <div class="header-bottom">
                            <!-- /.header-action -->

                            <ul class="header-nav-primary nav nav-pills collapse navbar-collapse" style="font-weight: 500;">

                               
                            @if(Auth::check())

                                @permission(('user'))
                                 <li class="active" >
                                    <a href="/" style="color: white;">Home </a>

                                </li>

                               <li>
                                    <a href="#">
                                    @if(Auth::user()->avatar=="")
                                      <img src="{{Auth::user()->getAvatarUrl()}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;"><span style="text-transform: capitalize; color: white;">{{Auth::user()->name}}</span> <i class="fa fa-chevron-down"></i></a>
                                    @else
                                      <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;"><span style="text-transform: capitalize; color: white;">{{Auth::user()->name}}</span><i class="fa fa-chevron-down"></i></a>
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
                                @permission(('owner'))
                                   <li class="active" >
                                    <a href="{{url('manage-cafe')}}">Manage Cafe</a>

                                  </li>
                                @endpermission
                                @permission(('admin'))

                               <li>
                                   <li class="active" >
                                    <a href="{{url('admin')}}">Admin Panel</a>

                                  </li>
                                    
                                </li>
                                @endpermission

                            @else
                                <li class="active" >
                                    <a style="border: 1px solid white;padding: 10px 17px; color: white; margin-top: 10px;" data-toggle="modal" href="/login" onclick="openLoginModal();">Login</a>

                                </li>
                                <li class="active">
                                    <a data-toggle="modal" href="/register" style="color: white;" onclick="openRegisterModal();">Sign Up</a>

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
    </div>

    <div class="main">
        <div class="main-inner">
            <div class="content">
                <div class="mt-150">
                    <div class="hero-image">
                        <div class="hero-image-inner" style="background-image: url('{{ asset('') }}assets/img/pizza3.jpg');">
                            <!-- <div class="hero-image-content">
                                <div class="container">
                                    <h1>Tenomed</h1>

                                    <p>Find your favorite cafe and resto. Invite your friend and do an awesome hangout.</p>

                                </div>--><!-- /.container -->
                            <!--</div>--><!-- /.hero-image-content -->

                            <div class="hero-image-content">
                              <div class=" hero-image-form-wrapper" style="position:relative">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12">
                                   

                                            <form method="get" action="/cari">
                                           <!--  {{ csrf_field() }} -->

                                              <div class="form-group row">

                                                 <div class="hero-image-location col-xs-12 col-sm-4">
                                                    <select class="form-control" title="Location" name="location" id="location">
                                                        <option selected="">Medan Kota</option>
                                                        <option>Medan Tuntungan</option>
                                                        <option>Medan Timur</option>
                                                        <option>Medan Tembung</option>
                                                        <option>Medan Sunggal</option>
                                                        <option>Medan Selayang</option>
                                                        <option>Medan Polonia</option>
                                                        <option>Medan Petisah</option>
                                                        <option>Medan Perjuangan</option>
                                                        <option>Medan Marelan</option>
                                                        <option>Medan Maimun</option>
                                                        <option>Medan Labuhan</option>
                                                        <option>Medan Petisah</option>
                                                        <option>Medan Perjuangan</option>
                                                    </select>
                                                 </div>

                                                  <div class="hero-image-keyword col-xs-12 col-sm-6">
                                                      <input type="text" class="form-control" placeholder="Keyword" name="kata">
                                                      <input type="hidden" class="form-control" placeholder="Keyword" name="menu">
                                                  </div>

                                                  <div class=" col-xs-4 col-xs-offset-8 col-sm-2 col-sm-offset-0">
                                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                                                  </div>

                                              </div>                                            </form>
                                        </div><!-- /.col-* -->
                                    </div><!-- /.row -->
                                </div><!-- /.container -->
                              </div>
                            </div><!-- /.hero-image-form-wrapper -->
                        </div><!-- /.hero-image-inner -->
                    </div><!-- /.hero-image -->
                </div>

<div class="container">
    <!-- <div class="block background-white fullwidth pt0 pb0">
        <div class="partners">

        <a href="/cari?menu=coffe&location&kata=">
            <img src="{{ asset('') }}assets/img/coffee.png" alt="">
            Coffee
        </a>
        <a href="/cari?menu=Dessert & Bake&location=&kata=">
            <img src="{{ asset('') }}assets/img/dessert &bakes.png" alt="">
            Dessert & Bakes
        </a>
        <a href="/cari?menu=Dinner&location=&kata=">
            <img src="{{ asset('') }}assets/img/dinner.png" alt="">
            Dinner
        </a>
        <a href="/cari?menu=Lunch&location=&kata=">
            <img src="{{ asset('') }}assets/img/lunch.png" alt="">
            Lunch
        </a>
        <a href="/cari?menu=Drink&location=&kata=">
            <img src="{{ asset('') }}assets/img/luxurydinning.png" alt="">
            Drink
        </a>
      </div>
    </div> -->

    <div class="page-header">
    <h1>A recommended  &amp; Cafe </h1>
    <p>List of most recent interesting places our directory submitted <br>by our users. Check whats going on in the cafe.</p>
</div><!-- /.page-header -->

<div class="cards-simple-wrapper">
    <div class="row">


            @foreach($rate as $cafe)

            <div class="col-sm-6 col-md-3">
                <div class="card-simple" data-background-image="{{ asset('') }}images/{{$cafe->image or 'kafe.jpg'}}">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="detail/{{$cafe->id}}"><span style="text-transform: capitalize;">{{$cafe->name}}</span></a></h2>
                            <div class="card-simple-rating">
                             <?php
                              if($cafe->total==null){$cafe->total=0;}
                                if((int)$cafe->total==$cafe->total){
                                  $sts="genab";
                                  $x=(int)$cafe->total;
                                }else{
                                  $sts="ganjil";
                                   $x=((int)$cafe->total)+1;
                              }
                              for($i=0;$i<5;$i++){
                                if($i<$x){
                                  if($sts=="genab"){echo('<i class="fa fa-star"></i>');}
                                  else{
                                    if($i==($x-1)){
                                      echo('<i class="fa fa-star-half-o"></i>');
                                    }else{
                                      echo('<i class="fa fa-star"></i>');
                                    }
                                  }
                                }else{
                                  echo('<i class="fa fa-star-o"></i>');
                                }
                              }
                            ?>
                            </div><!-- /.card-rating -->

                            <div class="card-simple-actions">
                                <a href="detail/{{$cafe->id}}" class="fa fa-search"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        <div class="card-simple-label" alt="availabe seat">{{$cafe->seat or 0}} People</div>

                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->

 @endforeach

    </div><!-- /.row -->
</div><!-- /.cards-simple-wrapper -->
  
</div><!-- /.container -->

            </div><!-- /.content -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->

@endsection
@section('java')
<script>
  $(document).ready(function(){
    hideLoading();
  });
</script>
@endsection