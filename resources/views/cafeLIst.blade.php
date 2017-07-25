@extends('layouts.intro')

@section('content')

<div class="page-wrapper">

    <header class="header header-transparent opaque">
        <div class="header-wrapper">
            <div class="container">
                <div class="header-inner">
                    <div class="header-logo">
                        <a href="{{url('/')}}">
                            <img src="{{ asset('') }}assets/img/logo-white.png" alt="Logo">
                            <span>Tenomed</span>
                        </a>
                    </div><!-- /.header-logo -->

                    <div class="header-content">
                        <div class="header-bottom">
                            <!-- /.header-action -->
                            <ul class="header-nav-primary nav nav-pills collapse navbar-collapse" style="font-weight: 500;">

                                <li class="active" >
                                    <a href="/" style="color: white;">Home </a>

                                </li>
                            @if(Auth::check())

                                @permission(('user'))

                               <li><input type="hidden" name="idUser" value="{{Auth::user()->id}}">
                                    <a href="#">
                                    @if(Auth::user()->avatar=="")
                                    <img src="{{Auth::user()->getAvatarUrl()}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;"><span style="text-transform: capitalize;  color: white;">{{Auth::user()->name}}</span> <i class="fa fa-chevron-down"></i></a>
                                    @else
                                    <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;"><span style="text-transform: capitalize;  color: white;">{{Auth::user()->name}}</span> <i class="fa fa-chevron-down"></i></a>
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

    <div class="main" style="margin-top:100px;display:block">
        <!-- <div class="mt-150" style="background-image: url('{{ asset('') }}assets/img/pizza5.jpg');">
            <div class="document-title">
            <br><br><br><br>
                <h1>Row List cafe</h1>

                <ul class="breadcrumb">
                    <li><a href="#">Superlist</a></li>
                    <li><a href="#">Listing</a></li>
                </ul>
            </div>
        </div> -->

        <div class="col-sm-4 col-lg-3">
            <div class="sidebar">
                
                <div class="widget">
                  <h2 class="widgettitle">Recent Listings</h2>
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
                      </div><!-- /.cards-small -->
                </div><!-- /.widget -->
                
            </div><!-- /.sidebar -->
        </div><!-- /.col-* -->

        <div class="col-sm-8 col-lg-9">
            <div class="content">
                <form class="filter" method="get" action="/cari">
                    <div class="row">

                          <div class="col-sm-12 col-lg-12">
                                            <form method="get" action="/cari">
                                           <!--  {{ csrf_field() }} -->

                                              <div class="form-group row">

                                                 <div class="   col-xs-12 col-sm-4">
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
                                                  </div>

                                                  <div class=" col-xs-4 col-xs-offset-8 col-sm-2 col-sm-offset-0">
                                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                                                  </div>

                                              </div><!-- /.form-group -->

                                                <!-- <div class="hero-image-category form-group">
                                                    <select class="form-control" title="Category" id="category" name="kategory">
                                                        <option value="" selected="">Coffe</option>
                                                        <option value="">Dessert And Bake</option>
                                                        <option value="">dinner</option>
                                                        <option value="">lunch</option>
                                                        <option value="">Drink</option>
                                                    </select>
                                                </div> --><!-- /.form-group --><!--
                                                <input type="hidden" name="_method" value="POST">
                                                <input type="hidden" name="_token" value="{{ Session::token() }}"> -->

                                                <!-- <div class="hero-image-price form-group">
                                                    <input type="text" class="form-control" placeholder="Min. Price" name="price" value="0">
                                                </div> --><!-- /.form-group -->

                                            </form>
                                        </div><!-- /.col-* -->

                    </div>
                </form>


        <div class="card-row">
            <div class="card-row-inner">
              <div class="card-row-body">

                @foreach($data as $datas)
                      <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="card-simple" data-background-image="{{ asset('') }}images/{{$datas->image or 'kafe.jpg'}}">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="{{url('detail/'.$datas->id)}}" style="">{{$datas->name}}</a></h2>
                            <div class="card-simple-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div><!-- /.card-rating -->

                            <div class="card-simple-actions">
                                <a href="detail/{{$datas->id}}" class="fa fa-search"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        
                        <div class="card-simple-label" alt="availabe seat">{{$datas->seat or 0}} People</div>
                        
                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->
                @endforeach

              </div>
            </div>
            {{ $data->links() }}
            <br>
          </div>
          <br><br>
                

            </div><!-- /.content -->
        </div><!-- /.col-* -->

    </div>

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
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul><!-- /.nav -->
                </div><!-- /.footer-bottom-right -->
            </div><!-- /.container -->
        </div>
    </footer><!-- /.footer -->

</div><!-- /.page-wrapper -->

@endsection
