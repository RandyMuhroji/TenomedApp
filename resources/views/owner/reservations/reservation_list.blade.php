@extends('templates.owner.layout')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-1 col-sm-1 col-xs-2">
                        <h2>Reservations<a href="#" data-toggle="modal" data-target="#show_attandance" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Confirmation Attandance</a></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="150px">Reservation Name</th>
                                <th width="120px">Reservation Code</th>
                                <th width="120px">Date</th>
                                <th width="80px">Status</th>
                                <th width="80px">Total</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Reservation Name</th>
                                <th>Reservation Code</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($reservations))
                            @foreach ($reservations as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->reserv_code}}</td>
                                <td>{{$row->bookingDate}} {{$row->bookingTime}}</td>
                                <td>
                                    @if($row->status == 1)
                                        <button type="button" class="btn btn-success btn-xs">Succed</button>
                                    @elseif($row->status == 0)
                                        <button type="button" class="btn btn-primary btn-xs">Pending</button>
                                    @else
                                         <button  type="button" class="btn btn-warning btn-xs">Expired</button>
                                    @endif
                                </td>
                                <td>Rp.{{$row->total}}</td>
                                
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="show_attandance" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Status Reservation</h4>
      </div>
      <form action = '' method="GET" data-parsley-validate class="form-horizontal form-label-left" id = "frmUpdate" > 
        <div class="modal-body">
             <div class="form-group">
                        <label class="col-sm-3 control-label">Reservation Code</label>

                        <div class="col-sm-9">
                          <div class="input-group">
                            <span class="input-group-btn">
                              <button type="button" class="btn btn-primary" onclick="cek(jQuery('#code').val());">Check</button>
                            </span>
                            <input type="text" id="code" name="code" class="form-control">

                          </div>
                          <p id="gagal" style="color: red; display: none;">Booking Code is invalid</p>
                        </div>
                        <div id="loadData" style="display: none;">
                        <hr>
                        <h3>Your Booking Detail</h3>
                        <label class="col-sm-3 control-label">Booking Name</label>
                        <div class="col-sm-9">
                          <div class="input-group col-sm-12">
                            
                            <input type="text" id="Bname" name="code" class="form-control" disabled="">
                          </div>
                        </div>
                        <label class="col-sm-3 control-label">Persons</label>
                        <div class="col-sm-9">
                          <div class="input-group col-sm-12">
                            
                            <input type="hidden" id="Bpersons" name="code" class="form-control" disabled="">
                            <input type="text" id="Bpersons1" name="code" class="form-control" disabled="">
                          </div>
                        </div>
                        <label class="col-sm-3 control-label">Booking Date</label>
                        <div class="col-sm-9">
                          <div class="input-group col-sm-12">
                            
                            <input type="text" id="Bdate" name="code" class="form-control" disabled="">
                          </div>
                        </div>
                        <label class="col-sm-3 control-label">Total Bayar</label>
                        <div class="col-sm-9">
                          <div class="input-group col-sm-12">
                            
                            <input type="hidden" id="Btotal"  name="code" class="form-control" disabled="">
                             <input type="text" id="Btotal1"  name="code" class="form-control" disabled="">
                          </div>
                        </div>
                        </div>
                      </div>
        </div>

      <div class="modal-footer">
            <button type="submit" class="btn btn-success" id="btnConfirm" style="display: none">Confirm Attandance</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>

  </div>
</div>
@stop

@section ('css')

@stop
@section('js')
<script>
  $(document).ready(function() {
     $("#frmUpdate").submit(function(e) {
      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/manage-cafe/reservvHist/',              
      type: 'GET',

      data: {'code':$(code).val()},
      success: function( data ) {
        alert(data);
      }
     });

     });

     //wal


     //akhir

  });
  function cek(doko) {
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/manage-cafe/cekPayment/',              
      type: 'GET',

      data: {'id':doko},
      success: function( data ) {

        console.log(data[0]['pStatus']);
        if(data=="gadak"){
          $("#gagal").html("Booking Code is Invalid!");
          document.getElementById("gagal").style.display='inherit';
          document.getElementById("loadData").style.display='none';
          document.getElementById("btnConfirm").style.display='none';
          
        }else{
          if(data[0]['pStatus']=='0'){
            $("#gagal").html("Your Booking is pending!, Please contact TENOMED ADMIN");
            document.getElementById("gagal").style.display='inherit';
            document.getElementById("loadData").style.display='none';
            document.getElementById("btnConfirm").style.display='none';
          }else if(data[0]['pStatus']=='2'){
            $("#gagal").html("Your Booking is Cancel!, Please contact TENOMED ADMIN");
            document.getElementById("gagal").style.display='inherit';
            document.getElementById("loadData").style.display='none';
            document.getElementById("btnConfirm").style.display='none';
          }else{
            document.getElementById("gagal").style.display='none';
            document.getElementById("loadData").style.display='inherit';
            document.getElementById("btnConfirm").style.display='inherit';
            console.log("data="+data[0]['name']);
            $('#frmUpdate').attr('action', "/manage-cafe/reservvHist/");
            $("#Bname").val(data[0]['Bname']);
            $("#Bpersons").val(data[0]['persons']);
            $("#Bpersons1").val(data[0]['persons']+" Persons");
            $("#Bdate").val(data[0]['bookingDate']+" "+data[0]['bookingTime']);
            $("#Btotal").val(data[0]['total']);
            $("#Btotal1").val("Rp. "+data[0]['total']);
          }
        }
      }
     });
  }
</script>
@endsection