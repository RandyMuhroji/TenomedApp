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

                           <li><input type="hidden" name="idUser" value="{{Auth::user()->id}}">
                                <a href="#">
                                @if(Auth::user()->avatar=="")
                                <img src="{{Auth::user()->getAvatarUrl()}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;">{{Auth::user()->name}} <i class="fa fa-chevron-down"></i></a>
                                @else
                                <img src="{{ asset('') }}assets/img/tmp/{{Auth::user()->avatar}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;">{{Auth::user()->name}} <i class="fa fa-chevron-down"></i></a>
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


    <div class="main" >
        <div class="mt-150" style="background-image: url('{{ asset('') }}assets/img/pizza5.jpg');">
    <div class="document-title" );">
    <br><br><br><br>
        <h1>Row List cafe</h1>

        <ul class="breadcrumb">
            <li><a href="#">Superlist</a></li>
            <li><a href="#">Listing</a></li>
        </ul>
    </div>
</div></div>
                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <form class="filter" method="post" action="/cari">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <input type="text" placeholder="Keyword" class="form-control" id="kata" name="kata">
            </div><!-- /.form-group -->
        </div><!-- /.col-* -->

        <div class="col-sm-12 col-md-4">
        <input type="hidden" name="price" id="price" value="0">
            <div class="form-group">
                <select class="form-control" title="Select Location" id="location" name="location">
                    <option>Medan Kota</option>
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
            </div><!-- /.form-group -->
        </div><!-- /.col-* -->
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        <div class="col-sm-12 col-md-4">
            <div class="form-group">
                <select class="form-control" title="Select Category" id="category" name="category">
                   <option value="">Coffe</option>
                    <option value="">Dessert And Bake</option>
                    <option value="">dinner</option>
                    <option value="">lunch</option>
                    <option value="">Drink</option>
                </select>
            </div><!-- /.form-group -->
        </div><!-- /.col-* -->
    </div><!-- /.row -->

    <hr>

    <div class="row">
        <div class="col-sm-8">
            <div class="filter-actions">
                <a href="#"><i class="fa fa-close"></i> Reset Filter</a>
                <a href="#"><i class="fa fa-save"></i> Save Search</a>
            </div><!-- /.filter-actions -->
        </div><!-- /.col-* -->

        <div class="col-sm-4">
            <button type="submit" class="btn btn-primary">Redefine Search Result</button>
        </div><!-- /.col-* -->
    </div><!-- /.row -->
</form>

@foreach($data as $datas)
<div class="cards-row">
    
    
        <div class="card-row">
            <div class="card-row-inner">
                <div class="card-row-image" data-background-image="{{ asset('') }}assets/img/tmp/product-6.jpg">
                    <div class="card-row-label"><a href="listing-detail.html">Cafe</a></div><!-- /.card-row-label -->
                    
                        <div class="card-row-price">$28 / person</div><!-- -->
                    
                </div><!-- /.card-row-image -->

                <div class="card-row-body">
                    <h2 class="card-row-title"><a href="detail/{{ $datas->id}}">{{ $datas->name}}</a></h2>
                    
                    <div class="card-row-content"><p>{{ substr($datas->desc,1, 100) }}...</p></div><!-- /.card-row-content -->
                </div><!-- /.card-row-body -->

                <div class="card-row-properties">
                    <dl>
                        
                            <dd>Seat</dd><dt>{{ $datas->seat}}</dt>
                        
                            <dd>Rating</dd><dt><div class="detail-overview-rating">
                <i class="fa fa-star" style="background-color: gold;"></i> <strong>{{ round($rates->rank / $rates->jumlah,2)}} / 5 </strong>
            </div></dt>
                        
                            <dd>Phone</dd><dt>{{ $datas->phone}}</dt>
                        

                        
                            <dd>Location</dd><dt>{{ $datas->address}}</dt>
                        

                    </dl>
                </div><!-- /.card-row-properties -->
            </div><!-- /.card-row-inner -->
        </div><!-- /.card-row -->
</div><!-- /.cards-row -->
<br>
@endforeach
<div class="pager">
    <ul>
        <li><a href="#">Prev</a></li>
        <li><a href="#">5</a></li>
        <li class="active"><a>6</a></li>
        <li><a href="#">7</a></li>
        <li><a href="#">Next</a></li>
    </ul>
</div><!-- /.pagination -->


                        </div><!-- /.content -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-4 col-lg-3">
                        <div class="sidebar">
                            <div class="widget">
    <h2 class="widgettitle">Recent Listings</h2>

    

    
        

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
        </div><!-- /.cards-small -->
    
        

        <div class="cards-small">
            <div class="card-small">
                <div class="card-small-image">
                    <a href="listing-detail.html">
                        <img src="{{ asset('') }}assets/img/tmp/product-3.jpg" alt="Healthy Breakfast">
                    </a>
                </div><!-- /.card-small-image -->

                <div class="card-small-content">
                    <h3><a href="listing-detail.html">Healthy Breakfast</a></h3>
                    <h4><a href="listing-detail.html">New York / Village</a></h4>

                    <div class="card-small-price">$180 / person</div>
                </div><!-- /.card-small-content -->
            </div><!-- /.card-small -->
        </div><!-- /.cards-small -->
    
        

        <div class="cards-small">
            <div class="card-small">
                <div class="card-small-image">
                    <a href="listing-detail.html">
                        <img src="{{ asset('') }}assets/img/tmp/product-4.jpg" alt="Coffee &amp; Newspaper">
                    </a>
                </div><!-- /.card-small-image -->

                <div class="card-small-content">
                    <h3><a href="listing-detail.html">Coffee &amp; Newspaper</a></h3>
                    <h4><a href="listing-detail.html">New York / Village</a></h4>

                    <div class="card-small-price">$180 / person</div>
                </div><!-- /.card-small-content -->
            </div><!-- /.card-small -->
        </div><!-- /.cards-small -->
    
</div><!-- /.widget -->

                            
                            <div class="widget">
    <h2 class="widgettitle">Filter</h2>

    <div class="background-white p20">
        <form method="post" action="http://preview.byaviators.com/template/superlist/listing-row-sidebar.html?">
            <div class="form-group">
                <label for="">Keyword</label>
                <input type="text" class="form-control" name="" id="">
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="">Category</label>

                <select class="form-control" title="Select Category">
                    <option>Automotive</option>
                    <option>Real Estate</option>
                </select>
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="">Location</label>
                <select class="form-control" title="Select Location">
                    <option>New York</option>
                    <option>San Francisco</option>
                </select>
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="">Starting Price</label>
                <input type="text" class="form-control" name="" id="">
            </div><!-- /.form-group -->

            <button class="btn btn-primary btn-block" type="submit">Search</button>
        </form>
    </div>
</div><!-- /.widget -->


                            <div class="widget">
    <h2 class="widgettitle">Working Hours</h2>

    <div class="p20 background-white">
        <div class="working-hours">
            <div class="day clearfix">
                <span class="name">Mon</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Tue</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Wed</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Thu</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Fri</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Sat</span><span class="hours">07:00 AM - 02:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Sun</span><span class="hours">Closed</span>
            </div><!-- /.day -->
        </div>
    </div>
</div><!-- /.widget -->


                            <div class="widget">
    <h2 class="widgettitle">Categories</h2>

    <ul class="menu">
        <li><a href="#">Automotive</a></li>
        <li><a href="#">Jobs</a></li>
        <li><a href="#">Nightlife</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Transportation</a></li>
        <li><a href="#">Real Estate</a></li>
        <li><a href="#">Restaurants</a></li>
    </ul><!-- /.menu -->
</div><!-- /.wifget -->


                            <div class="widget">
    <h2 class="widgettitle">Archives</h2>

    <ul class="menu">
        <li><a href="#">August <strong class="pull-right">12</strong></a></li>
        <li><a href="#">July <strong class="pull-right">23</strong></a></li>
        <li><a href="#">June <strong class="pull-right">53</strong></a></li>
    </ul><!-- /.menu -->
</div><!-- /.wifget -->

                        </div><!-- /.sidebar -->
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
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

</div><!-- /.page-wrapper -->

@endsection
