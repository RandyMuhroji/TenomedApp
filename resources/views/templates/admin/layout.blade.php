<!DOCTYPE html>
<html lang="en">
  
<head>
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{$title or "Tenomed"}}</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('tenomed/images/favicon.png')}}"/>

  <!-- Bootstrap -->
  <link href="{{asset('gantella/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset('gantella/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

  <!-- NProgress -->
  <link href="{{asset('gantella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
  <!-- jQuery custom content scroller -->
  <link href="{{asset('gantella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')}}" rel="stylesheet"/>
  <!-- Datatables -->
  <link href="{{asset('gantella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('gantella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('gantella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('gantella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('gantella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
  
    <script src="{{ asset('') }}assets/js/bootbox.min.js" type="text/javascript"></script>
  <!-- Custom Theme Style -->
  <link href="{{asset('gantella/build/css/custom.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{asset('gantella/build/css/me.css')}}">

  @yield('css')
  <style type="text/css">
    div#loading2
        {
            display: none;
        /*    width:100px;*/
            /*height: 100px;*/
            position: fixed;
            top: 43%;
            left: 50%;
            text-align:center;
            opacity: 2%;
            /*margin-left: -50px;*/
            /*margin-top: -100px;*/
            text-overflow: ellipsis;
            z-index:1006;
            font-size: 16px;

        /*    background-color: orangered;*/

        } 

        #loading-overlay { 
            background-color: #212121;
            position:fixed;
            width:100%;
            height:100%;
            top: 0px;
            padding:70px;
            z-index:1005;
            overflow: hidden;
            text-overflow: ellipsis;
            opacity: 0.6;
            filter: alpha(opacity=60);
        }
        
        #loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1007;
            display:none;
        }
        #loader {
            display: block;
            position: relative;
            left: 50%;
            top: 50%;
            width: 150px;
            height: 150px;
            margin: -75px 0 0 -75px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #3498db;
            -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
            animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
        }

        #loader:before {
            content: "";
            position: absolute;
            top: 5px;
            left: 5px;
            right: 5px;
            bottom: 5px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #e74c3c;
            -webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
              animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
        }

        #loader:after {
            content: "";
            position: absolute;
            top: 15px;
            left: 15px;
            right: 15px;
            bottom: 15px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #f9c922;
            -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */
              animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */
        }

        @-webkit-keyframes spin {
            0%   {
                -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: rotate(0deg);  /* IE 9 */
                transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
            }
            100% {
                -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: rotate(360deg);  /* IE 9 */
                transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
            }
        }
        @keyframes spin {
            0%   {
                -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: rotate(0deg);  /* IE 9 */
                transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */
            }
            100% {
                -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: rotate(360deg);  /* IE 9 */
                transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */
            }
        }
  </style>
</head>

<body class="nav-md">
<div id="loading-overlay" hidden></div>
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Admin Panel</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              @if(Auth::user()->avatar != '')
                  <img src = "{{asset('')}}images/{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" class="img-circle profile_img">
              @else
                   <img src="{{asset('images/user.png')}}" alt="..." class="img-circle profile_img">
              @endif()
             
            </div>
            <div class="profile_info">
              <span>@lang('general.app.welcome'),</span>
              <h2>{{Auth::user()->name}}</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu menu_fixed">
              <div class="menu_section">
                  <h3>@lang('general.app.general')</h3>
                  <ul class="nav side-menu">
                      <li><a href="{{route('admin')}}"><i class="fa fa-home"></i> Dashboard </a></li>
                      <li><a href="/admin/messages"><i class="fa fa-envelope"></i> Messages</a></li>
                      <li><a href="{{route('cafes.index')}}"><i class="fa fa-coffee"></i> Cafes </a></li>
                      <li><a href="{{route('admin_reservation')}}"><i class="fa fa-coffee"></i> Confirmation Reservation</a></li>
                      <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> @lang('general.nav.users') </a></li>
                      <li><a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="{{route('admin_account')}}">Account</a></li>
                              <li><a href="{{route('admin_list')}}">Administrator</a></li>
                          </ul>
                      </li>
                  </ul>
              </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

   <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    @if(Auth::user()->avatar != '')
                        <img src = "{{asset('')}}images/{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}" >
                    @else
                         <img src="{{asset('images/user.png')}}" alt="...">
                    @endif()
                    {{Auth::user()->name}}
                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
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
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

     <!-- page content -->
      <div class="right_col" role="main">
          @include('templates.admin.partials.alerts')
          @yield('content')
      </div>
      <!-- /page content -->

     <!-- footer content -->
      <footer>
          <div class="pull-right">
              Tenomed 2017 - Manage Cafe
          </div>
          <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{asset('gantella/vendors/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('gantella/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('gantella/vendors/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
  <script src="{{asset('gantella/vendors/nprogress/nprogress.js')}}"></script>

  
  <script src="{{asset('gantella/vendors/Chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/gauge.js/dist/gauge.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/iCheck/icheck.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/skycons/skycons.js')}}"></script>
  <!-- jQuery custom content scroller -->
  <script src="{{asset('gantella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{asset('gantella/vendors/iCheck/icheck.min.js')}}"></script>
  <!-- Datatables -->
  <script src="{{asset('gantella/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
  <script src="{{asset('gantella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/jszip/dist/jszip.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
  <script src="{{asset('gantella/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{asset('gantella/build/js/custom.min.js')}}"></script>
  <!-- Google Analytics -->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-23581568-13', 'auto');
  ga('send', 'pageview');

 // showLoading();
     function showLoading(){
        $("#loader-wrapper").fadeIn(100,0);    
        $("#loader-wrapper").show();
        $("#loader-wrapper").css({visibility:"visible"});
        $("#loader-wrapper").css({display:"block"});

        $("#loading-overlay").css({opacity:"0.6"});
        $("#loading-overlay").fadeIn(100,0);    
        $("#loading-overlay").css({visibility:"visible"});
//        $("#loading-overlay").css({display:"block"});

    };
    //hide loading bar
    function hideLoading(){
//        $("#loading2").hide("slow");
//        $("#loading-overlay").hide("slow");
          $("#loader-wrapper").css({display:"none"});
          $("#loading-overlay").fadeTo(0, 1000);
          $("#loading-overlay").css({display:"none"});
    };
  </script>
@yield('js')
</body>
</html>