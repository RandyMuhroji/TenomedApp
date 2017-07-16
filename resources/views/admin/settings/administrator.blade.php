@extends('templates.admin.layout')

@section('content')
<div class="clearfix"></div>
<div id = "notification" class="alert " role="alert" hidden>
    <a  class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p></p>
</div>
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-1 col-sm-1 col-xs-2">
                        <h2>Administrator</h2>
                    </div>
                    <div class="col-md-11 col-sm-11 col-xs-12">
                        <h2 style="float:right;"><a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#add_admin">Create new &nbsp;&nbsp;<i class="fa fa-plus"></i> </a></h2>
                    </div>
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
                            <tr id="row{{$row->id}}">
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-xs">Administrator</button>
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
                                    <a data-toggle="modal" data-target="#update_admin" 
                                    class="btn btn-warning btn-xs update"><i class="fa fa-pencil" title="Edit" onclick="setUpdate('{{$row->name}}','{{$row->id}}','{{$row->status}}','{{$row->desc}}')"></i> </a>
                                    <a data-toggle="modal" data-target="#delete_admin" class="btn btn-danger btn-xs delete" onclick="setname('{{$row->name}}','{{$row->id}}')"><i class="fa fa-trash-o" title="Delete"></i> </a>
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

<div id="add_admin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Create New</h4>
      </div>
      <form method="post" action="{{ route('add_admin') }}" data-parsley-validate class="form-horizontal form-label-left">
    		<div class="modal-body">
    		 	<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
      		<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">Full Name <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name" class="form-control col-md-7 col-xs-12" autocomplete="false" required>
              @if ($errors->has('name'))
              <span class="help-block">{{ $errors->first('name') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">@lang('users.email') <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="email" value="{{ Request::old('email') ?: '' }}" id="email" name="email" class="form-control col-md-7 col-xs-12" autocomplete="false" required>
              @if ($errors->has('email'))
              <span class="help-block">{{ $errors->first('email') }}</span>
              @endif
            </div>
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">@lang('users.password') <span class="required">*</span>
            </label>
            <div class="col-md-5 col-sm-5 col-xs-12">
              <input type="password" id="password" name="password" class="form-control col-md-5 col-xs-12" required readonly>
              @if ($errors->has('password'))
            	<span class="help-block">{{ $errors->first('password') }}</span>
            	@endif	
            </div>
            <div class="col-md-2 col-sm-2 col-xs-12">
              <input type="button" id = "generatePassword" class="btn btn-success" value="&nbsp;&nbsp;&nbsp; Generate &nbsp;&nbsp;&nbsp; " style="float: right;" />
            </div>
          </div>
          <input type="hidden" name="role_id" value="1">           
        </div>
      	<div class="modal-footer">
      		<button type="submit" class="btn btn-success">Save Change</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>

  </div>
</div>

<div id="update_admin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Status Administrator</h4>
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

<div id="delete_admin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Administrator</h4>
      </div>
      <form data-parsley-validate class="form-horizontal form-label-left">
      		<div class="modal-body">
      			<p>Are you sure delete account <strong id="delete_name"></strong></p>
          </div>

      <div class="modal-footer">
      		<button id = "submit_delete" type="button" class="btn btn-success" data-token="{{ csrf_token() }}" >Delete</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>

  </div>
</div>
@stop

@section('js')
	<script type="text/javascript">
		var id;

		var setname = function(name,_id){
			$('#delete_name').html(name);
			id = _id;
		};

		var setUpdate = function(name,_id,_status,desc){
			console.log('sukses');
			$('#update_name').val(name);
			$('#frmUpdate').attr('action', "/admin/settings/administrator/update/"+_id);
			$("#status").val(_status);
			$("#desc").val(desc);
		}

		$(document).ready(function() {
			$('#generatePassword').click(function(){
					$pass = Math.random().toString(36).slice(-8);
					$('#password').val($pass);
			});

			$('#submit_delete').click(function(){
				var token = $(this).data("token");
        $.ajax({
	          url  :"/admin/settings/administrator/delete/"+id,
	          type : 'DELETE',
	          dataType: "JSON",
	          data:{
	              "id": id,
	              "_method": 'DELETE',
	              "_token": token,
	          },
	          success:function(msg){
	          	$('#delete_admin').modal('hide');
	            $('#row'+id).remove();
	            $('div#notification').show();
	            $('div#notification p').text(msg['success']);
	            $('div#notification').addClass('alert-success');
	          }
      	});
      });
    });
	</script>

	@if ($errors->has('email') || $errors->has('name') || $errors->has('password'))
  	<script type="text/javascript">
  		$('#add_admin').modal('show');
  	</script>
  @endif

  @if ($errors->has('desc'))
  	<script type="text/javascript">
  		$('#update_admin').modal('show');
  	</script>
  @endif
@stop
