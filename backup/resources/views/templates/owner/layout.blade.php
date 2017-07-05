<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title or "Tenomed"}}</title>

    <link rel="shortcut icon" type="image/png" href="{{asset('tenomed/images/favicon.png')}}"/>
    <!-- Bootstrap -->
    <link href="{{asset('tenomed/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('tenomed/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('tenomed/css/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('tenomed/css/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('tenomed/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('tenomed/css/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="{{asset('tenomed/css/custom.min.css')}}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{asset('tenomed/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('tenomed/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('tenomed/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('tenomed/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('tenomed/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
    @yield('css')
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Manage Cafe</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="{{Auth::user()->getAvatarUrl()}}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>@lang('general.app.welcome'),</span>
                            <h2>{{Auth::user()->name}}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>@lang('general.app.general')</h3>
                            <ul class="nav side-menu">
                                 <li><a href="{{route('owner')}}"><i class="fa fa-home"></i> @lang('general.nav.home') </a></li>
                                <li><a href="{{route('menus.index')}}"><i class="fa fa-plus"></i>Menu</a></li>
                                <li><a href="#"><i class="fa fa-plus"></i>Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                   <!--  <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div> -->
                    <!-- /menu footer buttons -->
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
                                    <img src="{{Auth::user()->getAvatarUrl()}}" alt="">{{Auth::user()->name}}
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
                Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{asset('tenomed/js/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('tenomed/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('tenomed/js/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{asset('tenomed/js/nprogress.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('tenomed/js/icheck.min.js')}}"></script>
<!-- Datatables -->
<script src="{{asset('tenomed/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('tenomed/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('tenomed/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('tenomed/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('tenomed/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('tenomed/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('tenomed/js/buttons.print.min.js')}}"></script>
<script src="{{asset('tenomed/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('tenomed/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('tenomed/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('tenomed/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('tenomed/js/datatables.scroller.min.js')}}"></script>
<script src="{{asset('tenomed/js/jszip.min.js')}}"></script>
<script src="{{asset('tenomed/js/pdfmake.min.js')}}"></script>
<script src="{{asset('tenomed/js/vfs_fonts.js')}}"></script>
<!-- jQuery Tags Input -->
<!-- <script src="{{asset('tenomed/js/jquery.tagsinput.js')}}"></script> -->
<!-- Custom Theme Scripts -->
<script src="{{asset('tenomed/js/custom.min.js')}}"></script>

<!-- jQuery Smart Wizard -->
<script src="{{asset('tenomed/js/jquery.smartWizard.js')}}"></script>

<!-- Datatables -->
<script>
    $(document).ready(function() {
        var handleDataTableButtons = function() {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
                    buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm"
                    },
                    {
                        extend: "excel",
                        className: "btn-sm"
                    },
                    {
                        extend: "pdfHtml5",
                        className: "btn-sm"
                    },
                    {
                        extend: "print",
                        className: "btn-sm"
                    },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[ 1, 'asc' ]],
            'columnDefs': [
            { orderable: false, targets: [0] }
            ]
        });
        $datatable.on('draw.dt', function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();
    });
</script>
<!-- /Datatables -->

@yield('js')

</body>
</html>