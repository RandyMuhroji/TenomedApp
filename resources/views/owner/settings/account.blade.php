@extends('templates.owner.layout')

@section('content')

<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="row">
                        <div class="col-md-1 col-sm-1 col-xs-2">
                            <h2>Acccount</h2>
                        </div>
                        <div class="col-md-11 col-sm-11 col-xs-12">
                            <h2 style="float:right;"><a href="#" target="_blank" class="btn btn-info btn-xs">Show Profile &nbsp;<i class="fa fa-eye"></i> </a></h2>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
               
                <div class="x_content">
                	<div class="row">
	                    <div class="col-md-1 col-sm-1 col-xs-2">
	                    </div>
	                    <div class="col-md-8 col-sm-8 col-xs-16">
	                      <h4>Edit Profile</h4>
	                      <div class="ln_solid"></div>
	                    </div>
	                </div>
                    <br />
                    <form method="post" action="/manage-cafe/settings/account/{{$user->id}}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Full Name <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$user->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avatar">Avatar
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="file" id="avatar" name="avatar" class="col-md-7 col-xs-12">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avatar">Phone Number
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="phone" name="phone" class="form-control col-md-7 col-xs-12" value="{{$user->phone}}">
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avatar">Address
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="address" name="address" class="form-control col-md-7 col-xs-12" value="{{$user->address}}">
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('bio') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="avatar">A little bit about yourself
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="form-control" rows="3" id="bio" name="bio" class="form-control col-md-7 col-xs-12" >{{$user->bio}}</textarea>
                            </div>
                        </div>

                        <br/>
                        <div class="form-group">

                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success">@lang('general.form.save_changes')</button>
                            </div>
                        </div>


                        <div class="ln_solid"></div>

                        
                    	<div class="row">
    	                    <div class="col-md-1 col-sm-1 col-xs-2">
    	                    </div>
    	                    <div class="col-md-8 col-sm-8 col-xs-16">
    	                      <h4>Security</h4>
    	                      <div class="ln_solid"></div>
    	                    </div>
    	                </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">@lang('users.email') <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{$user->email}}" id="email" name="email" class="form-control col-md-7 col-xs-12" disabled>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">@lang('users.password') <span class="required">*</span>
                            </label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="password" class="form-control col-md-5 col-xs-12" required disabled value="{{$user->password}}">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12" style="margin-left: 1.1%;">
                                  <input type="button" data-toggle="modal" data-target="#changePassword" class="btn btn-success" value="Change Password" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->


<div id="changePassword" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header" >
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
        </div>
        <form id="frmChangePassword" method="post" action="{{ route('change_password') }}" data-parsley-validate class="form-horizontal form-label-left">
          <div class="modal-body">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                @if(Session::has('current_password'))
                    <div class="form-group{{' has-error'}}">
                @else
                <div class="form-group{{ $errors->has('current_password') ? ' has-error' : '' }}">
                @endif
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Current Password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" class="form-control col-md-7 col-xs-12" id="current_password" name="current_password">
                        @if ($errors->has('current_password'))
                        <span class="help-block">{{ $errors->first('current_password') }}</span>
                        @elseif(Session::has('current_password'))
                        <span class="help-block">{!! Session::get('current_password') !!}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"> New Password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="password" name="password" class="form-control col-md-7 col-xs-12">
                        @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="confirm_password">Retry Password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control col-md-7 col-xs-12">
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save Change</button>
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>
  </div>
</div>


<!-- End Modal -->

@stop

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('gantella/build/css/me.css')}}">
@stop

@section('js')

     @if (Session::has('errors') or Session::has('current_password'))
        <script type="text/javascript">
           $('#changePassword').modal('show');
        </script>
    @endif
@stop

