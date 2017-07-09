@extends('templates.owner.layout')

@section('content')
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
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->category}}</td>
                                <td>{{$row->price}}</td>
                                <td>
                                    <a  data-toggle="modal" data-target="#show_menu" class="btn btn-info btn-xs" onclick="setModalValue('{{$row}}')"><i class="fa fa-eye" title="View"></i> </a>
                                    <a href="{{ route('users.edit', ['id' => $row->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
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
<div id="show_menu" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><i class="fa fa-cutlery"></i> &nbsp;<span class="title_menu"></span></h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        Nama
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <p>sesuatu</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        Nama
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <p>sesuatu</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        Nama
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <p>sesuatu</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        Nama
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <p>sesuatu</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="profile_img">
                    <div id="crop-avatar">
                      <!-- Current avatar -->
                      <img class = "image_menu img-responsive avatar-view" src="" alt="Avatar" title="Change the avatar">
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
@stop

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('gantella/build/css/me.css')}}">
@stop

@section('js')
    <script type="text/javascript">
        var setModalValue= function(val){
            var obj_val = JSON.parse(val);
            $('.title_menu').text(obj_val['name']);

            var image = "/images/" + obj_val['images'];

            $(".image_menu").prop("src",image);
            $(".image_menu").attr("alt",obj_val['name']);
            $(".image_menu").attr("title",obj_val['desc']);

        };
    </script>
@stop