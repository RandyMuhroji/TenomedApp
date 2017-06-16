@extends('layouts.intro')


@section('content')


<div class="page-wrapper">
    
    <header class="header">
    <div class="header-wrapper">
        <div class="container">
            <div class="header-inner">
                <div class="header-logo">
                    <a href="index-2.html">
                        <img src="{{ asset('') }}assets/img/logo.png" alt="Logo">
                        <span>Tenomed</span>
                    </a>
                </div><!-- /.header-logo -->

                <div class="header-content">
                    <div class="header-bottom">
                        

                        <ul class="header-nav-primary nav nav-pills collapse navbar-collapse">
   
						<li class="active" >
                                <a href="/">Home </a>

                            </li>
                        @if(Auth::check())

                            @permission(('user'))

                           <li>
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




    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-lg-3">
                        <div class="sidebar">
                            <div class="widget">
    <div class="user-photo">
        <a href="#">
            <img src="{{ asset('') }}assets/img/tmp/agent-2.jpg" alt="User Photo">
           <!--  <span class="user-photo-action">Click here to reupload</span> -->
        </a>
    </div><!-- /.user-photo -->
</div><!-- /.widget -->


                            <div class="widget">

    <ul class="menu-advanced">
        <li><a href="listing-submit.html"><i class="fa fa-pencil"></i> Submit Listing</a></li>
        <li class="active"><a href="#"><i class="fa fa-user"></i> Edit Profile</a></li>
        <li><a href="#"><i class="fa fa-key"></i> Password</a></li>
        <li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
</div><!-- /.widget -->

                        </div><!-- /.sidebar -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <div class="page-title">
    <h1>Your Profile</h1>
</div><!-- /.page-title -->

<div class="background-white p20 mb30">
    <h3 class="page-title">
        Contact Information

        <a href="#" class="btn btn-primary btn-xs pull-right">Save</a>
    </h3>

    <div class="row">
        <div class="form-group col-sm-6">
            <label>Name</label>
            <input type="text" class="form-control" value="John">
        </div><!-- /.form-group -->

        <div class="form-group col-sm-6">
            <label>Surname</label>
            <input type="text" class="form-control" value="Doe">
        </div><!-- /.form-group -->

        <div class="form-group col-sm-6">
            <label>E-mail</label>
            <input type="text" class="form-control" value="sample@example.com">
        </div><!-- /.form-group -->

        <div class="form-group col-sm-6">
            <label>Phone</label>
            <input type="text" class="form-control" value="123-456-789">
        </div><!-- /.form-group -->
    </div><!-- /.row -->
</div>

<div class="background-white p20 mb30">
    <h3 class="page-title">
        Social Connections

        <a href="#" class="btn btn-primary btn-xs pull-right">Save</a>
    </h3>

    <div class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">Facebook</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" value="http://facebook.com/">
            </div><!-- /.col-* -->
        </div><!-- /.form-group -->

        <div class="form-group">
            <label class="col-sm-2 control-label">Twitter</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" value="http://twitter.com/">
            </div><!-- /.col-* -->
        </div><!-- /.form-group -->

        <div class="form-group">
            <label class="col-sm-2 control-label">Linkedin</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" value="http://linkedin.com/">
            </div><!-- /.col-* -->
        </div><!-- /.form-group -->

        <div class="form-group">
            <label class="col-sm-2 control-label">Dribbble</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" value="http://dribbble.com/">
            </div><!-- /.col-* -->
        </div><!-- /.form-group -->

        <div class="form-group">
            <label class="col-sm-2 control-label">Instagram</label>

            <div class="col-sm-9">
                <input type="text" class="form-control" value="http://instagram.com/">
            </div><!-- /.col-* -->
        </div><!-- /.form-group -->
    </div><!-- /.form-inline -->
</div><!-- /.background-white -->

<div class="background-white p20 mb30">
    <h3 class="page-title">
        Address

        <a href="#" class="btn btn-primary btn-xs pull-right">Save</a>
    </h3>

    <div class="row">
        <div class="form-group col-sm-6">
            <label>State</label>
            <input type="text" class="form-control" value="New York">
        </div><!-- /.form-group -->

        <div class="form-group col-sm-6">
            <label>City</label>
            <input type="text" class="form-control" value="New York City">
        </div><!-- /.form-group -->

        <div class="form-group col-sm-6">
            <label>Street</label>
            <input type="text" class="form-control" value="Everton Eve">
        </div><!-- /.form-group -->

        <div class="form-group col-sm-3">
            <label>House Number</label>
            <input type="text" class="form-control" value="123">
        </div><!-- /.form-group -->

        <div class="form-group col-sm-3">
            <label>ZIP</label>
            <input type="text" class="form-control" value="12345">
        </div><!-- /.form-group -->
    </div><!-- /.row -->
</div>

<div class="background-white p20 mb30">
    <h3 class="page-title">
        Biography

        <a href="#" class="btn btn-primary btn-xs pull-right">Save</a>
    </h3>

    <textarea class="form-control" rows="7"></textarea>
</div>

                        </div><!-- /.content -->
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