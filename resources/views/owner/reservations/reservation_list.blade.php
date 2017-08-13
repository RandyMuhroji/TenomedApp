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
                                        <button type="button" class="btn btn-primary btn-xs">Succes</button>
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
      <form action = '' method="post" data-parsley-validate class="form-horizontal form-label-left" id = "frmUpdate">
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
                        </div>
                      </div>
        </div>

      <div class="modal-footer">
            <button type="submit" class="btn btn-success">Confirm Attandance</button>
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
  function cek(doko) {
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    console.log("Review " +doko);
    $.ajax({
      url: '/manage-cafe/cekPayment/',              
      type: 'GET',

      data: {'id':doko},
      success: function( data ) {
        console.log(data);
        alert(data);
      }
     });
  }
</script>
@endsection