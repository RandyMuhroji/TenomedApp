@extends('layouts.userLayout')

@section('css')
<style type="text/css">
    .table-responsive {height:180px;}
</style>
@endsection


@section('menu')
     <li ><a href="{{url('user/profile')}}"><i class="fa fa-user"></i> Profile</a></li>
    <li class="active"><a href="{{url('user/bookingList')}}"><i class="fa fa-envelope-o"></i>Booking Histories</a></li>
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
                <h1>Booking Histories</h1>
            </div><!-- /.page-title -->

              <div class="background-white p20 mb30">
                  <h3 class="page-title">
                    Booking List
                      
                  </h3>
                  <div class="row">
                  <div class="col-sm-12">



                     <div class="x_content">
                <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>@lang('users.action')</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>@lang('users.action')</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr >
                                <td>aku</td>
                                <td>aku</td>
                                <td>aku</td>
                                <td>
                                   aku
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </div>


                  </div>
                  </div>
                </div>
            </div><!-- /.content -->
        </div><!-- /.col-* -->
@endsection

@section('java')
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
@endsection