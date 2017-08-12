@extends('layouts.userLayout')

@section('css')
<style type="text/css">
    .table-responsive {height:180px;}
</style>
@endsection


@section('menu')
    <li class=""><a  href="{{url('user/profile')}}"><i class="fa fa-user"></i> Profile</a></li>
     <li ><a  href="{{url('user/chatting')}}"><i class="fa fa-user"></i> Chatting</a></li>
    <li class="active"><a href="{{url('user/bookingList')}}"><i class="fa fa-envelope-o"></i> Booking Histories</a></li>
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
                                <th>No</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>@lang('users.action')</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Booking Due</th>
                                <th>Status</th>
                                <th>@lang('users.action')</th>
                            </tr>
                        </tfoot>
                        <tbody>
                       <?php $i=1; ?>
                       
                        @foreach($data as $items)

                            <tr >
                                <td><?php echo $i; ?></td>
                                <td>{{ $items->name}}</td>
                                <td>{{ $items->bookingDue}}</td>
                                <td>
                                    @if($items->status=='0')
                                      <span class="label label-warning">Panding</span>
                                    @elseif($items->status=='1')
                                      <span class="label label-success">Accepted</span>
                                    @else
                                      <span class="label label-danger">Canceled</span>
                                     @endif

                                </td>

                                <td>
                                    <button class="btn btn-sm btn-primary" type="button" onclick="getProforma({{$items->id}})">Proforma</button>
                                    <!-- <button class="btn btn-sm btn-info" type="button" onclick="getProforma({{$items->id}})">Bukti Bayar</button> -->
                                    @if($items->status=='1')
                                      <button class="btn btn-sm btn-success" type="button" onclick="downloadPdf('{{ $items->id}}')">
                                        Invoice PDF
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            <?php $i++; ?>
                          @endforeach
                        </tbody>
                    </table>
                    <br>
                    <div class="col-sm-12">{{ $data->links() }}<br></div>
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
  <script>
 $(document).ready(function(){
  //alert("doko");
   hideLoading();
  });
    function getProforma(data){
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            console.log("Review " +data);
            $.ajax({
              url: '/invoice/'+data,              
              type: 'get',

              data: {'idUser':'a', 'kafe':'b'},
              success: function( data ) {
                bootbox.alert({size:"large",
                  message:$(data).find('#invoice-wrapper').html()});
              }
             });
    }
    function downloadPdf(data){
      // $.ajaxSetup({
      //         headers: {
      //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      //         }
      //       });
      //       console.log("Review " +data);
      //       $.ajax({
      //         url: '/user/InvoiceDownload/'+data,              
      //         type: 'get',

      //         data: {'idUser':'a', 'kafe':'b'},
      //         success: function( data ) {
      //         }
      //        });
      window.location.href = "/user/InvoiceDownload/"+data;
    }
  </script>

@endsection