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
                                    <li><a href="{{url('user/profile')}}">Profile</a></li>
                                    <li><a href="{{url('user/notification')}}">Notifications</a></li>
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




    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-lg-3">
                        <div class="sidebar">
                            <div class="widget">
    <div class="user-photo">
        <a href="#">
        @if(Auth::user()->avatar=="")
            <img src="{{ asset('') }}images/user.png" alt="User Photo">
           <!--  <span class="user-photo-action">Click here to reupload</span> -->
        @else
            <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="User Photo">
        @endif
        </a>
    </div><!-- /.user-photo -->
</div><!-- /.widget -->


                            <div class="widget">

    <ul class="menu-advanced">
        <li ><a href="#"><i class="fa fa-user"></i> Profile</a></li>
        <li ><a href="{{url('user/notification')}}"><i class="fa fa-envelope-o"></i> Notification</a></li>
        <li ><a href="{{url('user/bookmarks')}}"><i class="fa fa-bars"></i> Bookmarks</a></li>
        <li ><a href="{{url('user/review')}}"><i class="fa fa-bars"></i> Review</a></li>
        <li class="active"><a href="{{url('user/setting')}}"><i class="fa fa-pencil"></i> Setting</a></li>
        <li><a href="{{url('logout')}}"  onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
</div><!-- /.widget -->

                        </div><!-- /.sidebar -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <div class="page-title">
    <h1>Edit Your Profile</h1>
</div><!-- /.page-title -->

<div class="background-white p20 mb30">
    <h3 class="page-title">
        Contact Information
        <a href="#" class="btn btn-primary btn-xs pull-right" id="tmbPass" >Change Password</a>
        <a href="#" class="btn btn-primary btn-xs pull-right" style="margin-right:3px;" id="tmbProfile">Profile Edit</a>
    </h3>
<div id="editProfile">



                            <div id="kv-avatar-errors-2" class="center-block" style="width:800px;display:none"></div>
                            <form class="form form-vertical" action="/user/update/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="kv-avatar center-block text-center" style="width:200px">

                                            <label for="avatar-2" >Avatar</label>
                                            <input id="avatar-2" name="avatar" type="file" class="file-loading" value="{{Auth::user()->avatar}}" >
                                        </div>
                                    </div>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="col-sm-8">
                                              <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label for="email">Email Address<span class="kv-reqd">*</span></label>
                                            <input type="email" class="form-control" id="email" onchange="check_email(jQuery('#email').val());" name="email" value="{{Auth::user()->email}}" required>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label for="name">Name<span class="kv-reqd">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" onchange="check_name();"  value="{{Auth::user()->name}}" required>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}" >
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}" >
                                          </div>
                                        </div>
                                        <div class="col-sm-12">
                                          <div class="form-group">
                                            <label for="bio">Bio</label>
                                             <textarea class="form-control" rows="7"  name="bio" id="bio">{{Auth::user()->bio}}</textarea>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <hr>
                                        <div class="text-right"> 
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </form>
                            </div>

                            <div id="editPassword" style="display: none;">
                              <div class="row " >
                                      <div class="form-group col-sm-7">
                                        <label>Old Password</label>
                                        <input type="password" class="form-control" onchange="check_password('{{Auth::user()->id}}');" name="password" id="password">
                                    </div>
                                    <div class="form-group col-sm-7">
                                        <label>New Password</label>
                                        <input type="password" class="form-control"  name="name" id="name">
                                    </div>
                                    <div class="form-group col-sm-7">
                                        <label>Re-password</label>
                                        <input type="password" class="form-control"  name="name" id="name">
                                    </div>
                                    <div class="center col-sm-7">
                                        <button type="submit" class="btn btn-primary btn-xl">Submit </button>
                                    </div>
                              </div>
                            </div>
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
<script>
    function check_password(id){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
        $.ajax({
          type: 'GET',
          url: '/cekPass?old='+$('#password').val()+'&id='+id,

          data: {'idUser':a, 'kafe':b},
          success: function( data ) {
             // $(".doko").load("/login");
             alert(data);
          }
         });
        // alert("ajshdu");
    };
</script>

