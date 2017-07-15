@extends('templates.owner.layout')

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
                                <th>Cafe</th>
                                <th>Reservation Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>@lang('users.action')</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cafe</th>
                                <th>Reservation Name</th>
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
                                @foreach($cafes as $c)
                                    @if($row->cafe_id == c.cafe_id)
                                    <td>{{$c->name}}</td>
                                    @endif
                                @endforeach
                                <td>{{$row->name}}</td>
                                <td>{{$row->date}}</td>
                                <td>
                                    @if($row->status == 1)
                                        <button type="button" class="btn btn-primary btn-xs">Succes</button>
                                    @elseif($row->status == 0)
                                        <button type="button" class="btn btn-primary btn-xs">Pending</button>
                                    @else
                                         <button  type="button" class="btn btn-warning btn-xs">Expired</button>
                                    @endif
                                </td>
                                <td>Total</td>
                                <td>
                                    <a  data-toggle="modal" data-target="#show_menu" class="btn btn-info btn-xs" onclick="setModalValue('{{$row}}')"><i class="fa fa-eye" title="View"></i> </a>
                                    <a data-toggle="modal" data-target="#update_reservation" 
                                    class="btn btn-warning btn-xs update"><i class="fa fa-pencil" title="Edit" onclick="setUpdate('{{$row->name}}','{{$row->id}}','{{$row->status}}','{{$row->desc}}')"></i> </a>
                                    <a href="{{ route('users.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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
      <form action = '' method="post" data-parsley-validate class="form-horizontal form-label-left" id = "frmUpdate">
            <div class="modal-body">
             <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
             <input type="hidden" name="_method" value="put">
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
@stop

@section ('css')

@stop