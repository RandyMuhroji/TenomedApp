@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-1 col-sm-1 col-xs-2">
                        <h2>Reservations</h2>
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
                                <th>@lang('users.action')</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Reservation Name</th>
                                <th>Reservation Code</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>@lang('users.action')</th>
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
                                <td>
                                    <a data-toggle="modal" data-target="#edit_user" href="#" class="btn btn-info btn-xs" onclick="getDetail('{{$row->name}}','{{$row->pengirim}}','{{$row->bank}}','{{$row->image}}');"><i class="fa fa-eye" title="View"></i> </a>
                                    <a data-toggle="modal" data-target="#update_reservation" 
                                    class="btn btn-warning btn-xs update"><i class="fa fa-pencil" title="Edit" onclick="setUpdate('{{$row->name}}','{{$row->id}}','{{$row->status}}','{{$row->desc}}')"></i> </a>
                                </td>
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

<div id="update_reservation" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Status Reservation</h4>
      </div>
      <form action = '/admin/reservation/confirmPayment/' method="POST" data-parsley-validate class="form-horizontal form-label-left" id = "frmUpdate">
            <div class="modal-body">
             <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
             <input type="hidden" name="_method" value="post">

             <input type="hidden" id="id_booking" name="id_booking" value=""> 
             <div class="form-group{{''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="update_name" disabled class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group{{''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Status <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" id="status" name="status" value = 2 class="form-control col-md-7 col-xs-12">   
                    <option value="0" >Pending</option>               
                    <option value="1" >Actived</option>
                    <option value="2" >Suspend</option>
                </select>
              </div>
            </div>
            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Description<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" rows="3" value="{{ Request::old('desc') ?: '' }}" id="desc" name="desc" class="form-control col-md-7 col-xs-12" required></textarea>
                @if ($errors->has('desc'))
                    <span class="help-block">{{ $errors->first('desc') }}</span>
                  @endif
              </div>
            </div>
          </div>

      <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save Change</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="edit_user" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bukti Pelunasan Tagihan</h4>
      </div>
      <form action = '' method="post" data-parsley-validate class="form-horizontal form-label-left" >
            <div class="modal-body">
             <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
             <input type="hidden" name="_method" value="put">
             <div class="form-group{{''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Booking Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="lihat_name" disabled class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group{{''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Pengirim <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="lihat_pengirim" disabled class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group{{''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Kode Bank <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="lihat_bank" disabled class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group{{''}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Bukti Bayar <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
              <img alt="img" id="lihat_img">
              </div>
            </div>
          </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>
@stop
@section('js')
<script>
 $(document).ready(function() {
      hideLoading();
   });
function setUpdate(name,_id,_status,desc){
      console.log('sukses');
      $('#update_name').val(name);
      //$('#frmUpdate').attr('action', "/admin/reservation/confirmPayment/");
      $("#status").val(_status);
      $("#desc").val(desc);
      $("#id_booking").val(_id);
    }
  function getDetail(name,an,bk,image){
    $('#lihat_name').val(name);
      $("#lihat_pengirim").val(an);
      $("#lihat_bank").val(bk);
      $('#lihat_img').attr('src', "{{ asset('') }}images/"+image);      
      $('#lihat_img').attr('width', "270px;");
  }
</script>
@endsection