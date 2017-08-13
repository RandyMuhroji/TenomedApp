@extends('templates.owner.layout')

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
                    <h2>Menus <a href="{{route('menus.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> @lang('general.app.create_new') </a></h2>
                    <div class="clearfix"></div>
                </div>
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
                            @if(count($menus))
                            @foreach ($menus as $row)
                            <tr id = "row{{$row->id}}">
                                <td>{{$row->name}}</td>
                                <td>{{$row->category}}</td>
                                <td>Rp.{{$row->price}}</td>
                                <td>
                                    <a  data-toggle="modal" data-target="#show_menu" class="btn btn-info btn-xs" onclick="setModalValue('{{$row}}')"><i class="fa fa-eye" title="View"></i> </a>
                                    <a href="#" data-toggle="modal" data-target="#edit_menu" class="btn btn-warning btn-xs" onclick="edit_menu('{{$row}}');"><i class="fa fa-pencil" title="Edit"></i> </a>
                                     <a data-toggle="modal" data-target="#delete_menu" class="btn btn-danger btn-xs delete" onclick="setname('{{$row->name}}','{{$row->id}}')"><i class="fa fa-trash-o" title="Delete"></i> </a>
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
<div id="show_menu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-cutlery"></i> &nbsp;<span class="title_menu"></span></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        About
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <p id="d_desc"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        Kategory
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <p id="d_kategori"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        Price
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <p id="d_price"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        Tags
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <p id="d_tag"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-5 col-xs-12 profile_left">
                <div class="profile_img">
                    <div id="crop-avatar">
                      <!-- Current avatar -->
                      <img id="d_img" style="width:100%;" >
                    </div>
                </div>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="edit_menu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-cutlery"></i> &nbsp;<span class="title_menu" id="title_menu"></span></h4>
      </div>
      <div class="modal-body">
      <form method="post" id="frmUpdate" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
          <input type="hidden" name="_method" value="put"> 
          <div class="form-group" style="margin-bottom: 20px;">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">Name <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="text" value="" id="dname" name="dname" class="form-control col-md-7 col-xs-12" autocomplete="false" required>

            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">Kategori <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
            <select name="dkategori" id="dkategori" class="form-control col-md-7 col-xs-12" required="">
                <option value="" selected=""></option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
            </select>
              
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">Price <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input type="text" value="" id="dprice" name="dprice" class="form-control col-md-7 col-xs-12" autocomplete="false" required>
              <span class="help-block" id="erorPrice"></span>

            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">Tag <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
              <input id="dtags_1" type="text" class="tags form-control" value="breakfast, Bread" name="tags" data-name="add a tag">
            <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;">
            </div>
            <div class="ln_solid"></div>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">About <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <textarea name="dabout" id="dabout" class="form-control col-md-7 col-xs-12" required=""></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">Image <span class="required">*</span>
            </label>
            <div class="col-md-7 col-sm-7 col-xs-12">
                <input type="file" name="image" id="image" class="col-md-7 col-xs-12" style="margin-top: 7px;">
            </div>
          </div>
     
        
      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-success">Save Change</button>
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>
 </form>
  </div>
</div>
<div id="delete_menu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Administrator</h4>
      </div>
      <form data-parsley-validate class="form-horizontal form-label-left">
            <div class="modal-body">
                <p>Are you sure delete menu <strong id="delete_name"></strong></p>
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

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('gantella/build/css/me.css')}}">
@stop

@section('js')
    <script type="text/javascript">
        var id;

        var setname = function(name,_id){
            $('#delete_name').html(name);
            id = _id;
        };

        var setModalValue= function(val){
            var obj_val = JSON.parse(val);
            $('.title_menu').text(obj_val['name']);
            $('#d_desc').text(obj_val['desc']);
            $('#d_kategori').text(obj_val['category']);
            $('#d_price').text(obj_val['price']);
            $('#d_tag').text(obj_val['tag']);
            var image = "/images/" + obj_val['images'];

            $("#d_img").prop("src",image);
            $("#d_img").attr("alt",obj_val['name']);
            $("#d_img").attr("title",obj_val['desc']);

        };
        function edit_menu(data){
            var obj_val = JSON.parse(data);
            $('#title_menu').text(obj_val['name']);
            $('#dname').val(obj_val['name']);
            $('#dkategori').val(obj_val['category']);
            $('#dprice').val(obj_val['price']);
            $('#dtags_1').val(obj_val['tag']);
            $('#dabout').val(obj_val['desc']);
            $('#frmUpdate').attr('action', "/manage-cafe/menus/"+obj_val['id']);
        };

        $('#submit_delete').click(function(){
            var token = $(this).data("token");
            $.ajax({
              url  :"/manage-cafe/menus/"+id,
              type : 'DELETE',
              dataType: "JSON",
              data:{
                  "id": id,
                  "_method": 'DELETE',
                  "_token": token,
              },
              success:function(msg){
                $('#delete_menu').modal('hide');
                $('#row'+id).remove();
                $('div#notification').show();
                $('div#notification p').text(msg['success']);
                $('div#notification').addClass('alert-success');
              }
        });
      });
    </script>
@stop