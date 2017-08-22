@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-1 col-sm-1 col-xs-2">
                        <h2>Cafes</h2>
                    </div>
                    <div class="col-md-11 col-sm-11 col-xs-12">
                        <h2 style="float:right;"><a href="{{route('cafes.create')}}" class="btn btn-primary btn-xs">Create new &nbsp;&nbsp;<i class="fa fa-plus"></i> </a></h2>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Cafe Name</th>
                                <th>Owner</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Report</th>
                                <th>@lang('users.action')</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cafe Name</th>
                                <th>Owner</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Report</th>
                                <th>@lang('users.action')</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($cafes))
                            @foreach ($cafes as $row)
                            <tr>
                                <td><a href="/detail/{{$row->id}}" target="_blank">{{$row->name}}</a></td>
                                <td>{{$row->owner}}</td>
                                <td>{{$row->address}}</td>
                                <td>
                                    @if($row->status == 1)
                                        <button type="button" class="btn btn-success btn-xs">Activated</button>
                                    @elseif($row->status == 0)
                                        <button type="button" class="btn btn-primary btn-xs">Pending</button>
                                    @else
                                         <button  type="button" class="btn btn-warning btn-xs">Suspend</button>
                                    @endif
                                </td>

                                <td>
                                  <a data-toggle="modal" data-target="#report_show" class="btn btn-danger btn-xs update" onclick="getReport('{{$row->id}}');"><i class="fa fa-angle-double-right" title="Edit" ></i> {{$row->jlhReport}} Times</a>
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#update_cafe" class="btn btn-warning btn-xs update"><i class="fa fa-pencil" title="Edit" onclick="setUpdate('{{$row->name}}','{{$row->id}}','{{$row->status}}','{{$row->rDesc}}')"></i> </a>
                                    <a href="{{ route('cafes.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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

<div id="update_cafe" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Status Cafe</h4>
      </div>
      <form method="post" data-parsley-validate class="form-horizontal form-label-left" id = "frmUpdate">
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

<div id="report_show" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Report Spam Detail's</h4>
      </div>
      <form method="post" data-parsley-validate class="form-horizontal form-label-left" id = "frmUpdate">
            
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Report List</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>User Name</th>
                          <th>Report Description</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody id="reportList23">
                        
                      </tbody>
                    </table>

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
     function setUpdate(name,_id,_status,desc){
        console.log(_status);
        $('#update_name').val(name);
        $('#frmUpdate').attr('action', "/admin/cafes/"+_id);
        $("#status").val(_status);
        $("#desc").val(desc);
    }
    function getReport(id){
      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });
      console.log('masuk');
      //alert('/reportList?id='+id);
       $.ajax({
        type: 'GET',
        url: 'admin/reportList?id='+id,

        data: {'idUser':'a', 'kafe':'b'},
        success: function( data ) {
          //alert(data);
          $('#reportList23').html(data);
        }
       });
    }
    $(document).ready(function() {

      hideLoading();
   });
</script>

@if ($errors->has('desc'))
<script type="text/javascript">
    $('#update_cafe').modal('show');
</script>
@endif

@stop