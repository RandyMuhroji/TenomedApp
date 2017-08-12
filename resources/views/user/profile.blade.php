@extends('layouts.userLayout')

@section('css')
<style type="text/css">

</style>
@endsection

@section('menu')

    <li class="active"><a  href="{{url('user/profile')}}"><i class="fa fa-user"></i> Profile</a></li>
     <li><a  href="{{url('user/chatting')}}"><i class="fa fa-user"></i> Chatting</a></li>
    <li ><a href="{{url('user/bookingList')}}"><i class="fa fa-envelope-o"></i> Booking Histories</a></li>
    <li ><a href="{{url('user/bookmarks')}}"><i class="fa fa-bars"></i> Bookmarks</a></li>
    <li ><a href="{{url('user/review')}}"><i class="fa fa-bars"></i> Review</a></li>
    <li ><a href="{{url('user/setting')}}"><i class="fa fa-pencil"></i> Setting</a></li>
    <li><a href="{{url('logout')}}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>

@endsection
@section('content')
    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <div class="page-title">
    <h1> Your Profile</h1>
</div><!-- /.page-title -->

<div class="background-white p20 mb30">
    <h3 class="page-title">
        Contact Information
            </h3>
<div id="editProfile">



                            <div id="kv-avatar-errors-2" class="center-block" style="width:800px;display:none"></div>
                            <form class="form form-vertical" action="/user/update/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="col-sm-8">
                                              <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label for="email">Email Address<span class="kv-reqd">*</span></label>
                                            <input type="email" class="form-control" id="email" onchange="check_email(jQuery('#email').val());" name="email" value="{{Auth::user()->email}}" required disabled="">
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label for="name">Name<span class="kv-reqd">*</span></label>
                                            <input type="text" class="form-control" id="name" name="name" onchange="check_name();"  value="{{Auth::user()->name}}" required disabled="">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}" disabled="">
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{Auth::user()->address}}" disabled="">
                                          </div>
                                        </div>
                                        <div class="col-sm-12">
                                          <div class="form-group">
                                            <label for="bio">Bio</label>
                                             <textarea class="form-control" rows="7" disabled="" name="bio" id="bio">{{Auth::user()->bio}}</textarea >
                                          </div>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <hr>
                                        
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
@endsection
  @section('java')
<script >
 $(document).ready(function(){
    hideLoading();
  });
</script>
@endsection