<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tenomed User Register</title>
    <link rel="shortcut icon" type="image/png" href="{{asset('tenomed/images/favicon.png')}}"/>

   <!-- Bootstrap -->
    <link href="{{asset('gantella/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('gantella/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('gantella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('gantella/vendors/animate.css/animate.min.css')}}" rel="stylesheet">
     <!-- PNotify -->
    <link href="{{asset('gantella/vendors/pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{asset('gantella/vendors/pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('gantella/vendors/pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet"> -->

    <!-- Custom Theme Style -->
    <link href="{{asset('gantella/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form role="form" method="post" action="{{ route('register') }}">
                        <h1>Register</h1>
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            @if ($errors->has('name'))
                            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                            @endif
                            <input type="text" class="form-control" id="name" name="name" placeholder="@lang('users.name')" value="{{ Request::old('name') ?: '' }}" required autofocus />
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            @if ($errors->has('email'))
                            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                            @endif
                            <input type="text" class="form-control" id="email" name="email" placeholder="@lang('users.email')" value="{{ Request::old('email') ?: '' }}" required/>
                        </div>
                        
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            @if ($errors->has('password'))
                            <span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>
                            @endif
                            <input type="password" class="form-control" id="password" name="password" placeholder="@lang('users.password')" required/>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>
                            @endif
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang('users.confirm_password')" required/>
                        </div>
                        <div>
                            <input type="hidden" name="role_id" value="3">
                            <button type="submit" class="btn btn-default submit">Register</button>
                            <a class="reset_pass" href="{{route('login')}}">@lang('general.login.login')</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Tenomed</h1>
                                <p>©2017 All Rights Reserved.</a></p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
 
    <!-- jQuery -->
    <script src="{{asset('gantella/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('gantella/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- PNotify -->
    <script src="{{asset('gantella/vendors/pnotify/dist/pnotify.js')}}"></script>
    <script src="{{asset('gantella/vendors/pnotify/dist/pnotify.buttons.js')}}"></script>
    <script src="{{asset('gantella/vendors/pnotify/dist/pnotify.nonblock.js')}}"></script>

    @if (Session::has('register_success'))
    <script>
        $(document).ready(function(){
            var notif = function() {
                return new new PNotify({
                    title: 'Register Success',
                    text: 'We sent you an activation code. Please check your email.',
                    type: 'success',
                    styling: 'bootstrap3'
                })
            }
            notif();
        });
    </script>
    @endif

</body>
</html>
