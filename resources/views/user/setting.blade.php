@extends('layouts.userLayout')

@section('css')
<style type="text/css">
    .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
    }
    .kv-avatar .file-input {
        display: table-cell;
        max-width: 220px;
    }
    .when-error{border-color: pink;}
    .kv-reqd {
        color: red;
        font-family: monospace;
        font-weight: normal;
    }

     .header {
        position: fixed;
        right: 0;
        left: 0;
        top: 0;
        z-index: 99;
      }

      .header .header-wrapper {
        transition: background .5s;
      }

      .header.opaque .header-wrapper {
        background: rgba(0, 159, 139, 1);
      }

      .header.opaque .header-wrapper a {
        color: #fff !important;
      }
</style>
@endsection

@section('menu')

     <li ><a href="{{url('user/profile')}}"><i class="fa fa-user"></i> Profile</a></li>
    <li ><a href="{{url('user/bookingList')}}"><i class="fa fa-envelope-o"></i> Booking Histories</a></li>
    <li ><a href="{{url('user/bookmarks')}}"><i class="fa fa-bars"></i> Bookmarks</a></li>
    <li ><a href="{{url('user/review')}}"><i class="fa fa-bars"></i> Review</a></li>
    <li class="active"><a href="{{url('user/setting')}}"><i class="fa fa-pencil"></i> Setting</a></li>
    <li><a href="{{url('logout')}}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>

@endsection
@section('content')
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
@endsection

@section('java')
<script >

 $(document).ready(function(){
    hideLoading();
  });

var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' + 
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="glyphicon glyphicon-tag"></i>' +
    '</button>'; 
$("#avatar-2").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showBrowse: false,
    browseOnZoneClick: true,
    removeLabel: '',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-2',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="{{ asset('') }}images/user.png" alt="Your Avatar" style="width:160px"><h6 class="text-muted">Click to select</h6>',
    layoutTemplates: {main2: '{preview}  {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});

$(function(){
     
    $('#tmbPass').click(function(){
      document.getElementById("editProfile").style.display='none';
       document.getElementById("editPassword").style.display='inherit';

  });
});

$(function(){
    $('#tmbProfile').click(function(){
      document.getElementById("editProfile").style.display='inherit';
       document.getElementById("editPassword").style.display='none';

  });
});
function check_email(email){
    email = email.replace(/ /g,'');
//        $('#email_add').val(email);
    if(email !== ""){
        var x=email;
        var atpos=x.indexOf("@"); var sppos=x.indexOf(" "); 
        var tdpos=x.indexOf(":"); var dotpos=x.lastIndexOf(".");
        if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length || sppos>=0 || tdpos>=0) {
            bootbox.alert("<strong>ERR001</strong> - not a valid e-mail abootboxddress example: user@yahoo.com");
            $('#email').addClass('when-error');
            $('#email').focus();
            return false;
        }
        
    }
};


</script>
@endsection