@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Cafes <a href="{{route('cafes.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> @lang('general.app.create_new') </a></h2>
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
                                <th>@lang('users.action')</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cafe Name</th>
                                <th>Owner</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>@lang('users.action')</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($cafes))
                            @foreach ($cafes as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->owner}}</td>
                                <td>{{$row->address}}</td>
                                <td>
                                    @if($row->status == 1)
                                        <button type="button" class="btn btn-primary btn-xs">Activated</button>
                                    @else
                                         <button  type="button" class="btn btn-warning btn-xs">Suspended</button>
                                    @endif
                                </td>
                                <td>
                                	<a href="#" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-eye" title="View"></i> </a>
                                    <a href="{{ route('cafes.edit', ['id' => $row->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-edit" title="Edit"></i> </a>
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
@stop