@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('users.users')</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="20%">@lang('users.name')</th>
                                <th width="25%">@lang('users.email')</th>
                                <th width="15%">@lang('users.roles')</th>
                                <th width="15%">Status</th>
                                <th width="10%">@lang('users.action')</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>@lang('users.name')</th>
                                <th>@lang('users.email')</th>
                                <th>@lang('users.roles')</th>
                                <th>Status</th>
                                <th>@lang('users.action')</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($users))
                            @foreach ($users as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>
                                    <button title="{{$row->desc}}" type="button" class="btn btn-success btn-xs">User</button>
                                </td>
                                <td>
                                @if($row->status == 0)
                                     <button title="{{$row->desc}}" type="button" class="btn btn-warning btn-xs">Pending</button>
                                @elseif($row->status == 1)
                                     <button title="{{$row->desc}}" type="button" class="btn btn-primary btn-xs">Actived</button>
                                @else 
                                     <button title="{{$row->desc}}" type="button" class="btn btn-warning btn-xs">Suspend</button>
                                @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-eye" title="View"></i> </a>
                                    <a data-toggle="modal" data-target="#edit_user" 
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

<div id="edit_user" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Status User</h4>
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

@section('js')
  <script>
    var setUpdate = function(name,_id,_status,desc){
      console.log('sukses');
      $('#update_name').val(name);
      $('#frmUpdate').attr('action', "/admin/users/"+_id);
      $("#status").val(_status);
      $("#desc").val(desc);
    }
  </script>

  @if ($errors->has('desc'))
    <script type="text/javascript">
      $('#edit_user').modal('show');
    </script>
  @endif
@stop()
