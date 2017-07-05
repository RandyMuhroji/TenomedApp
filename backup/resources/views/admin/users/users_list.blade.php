@extends('templates.admin.layout')

@section('content')
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('users.users') <a href="{{route('users.create')}}" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> @lang('general.app.create_new') </a></h2>
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
                                @foreach($row->roles as $r)
                                    <button title="{{$r->description}}" type="button" class="btn btn-success btn-xs">{{$r->display_name}}</button>
                                @endforeach
                                </td>
                                <td>
                                @if($row->status == 0)
                                     <button title="{{$r->description}}" type="button" class="btn btn-warning btn-xs">Pending</button>
                                @elseif($row->status == 1)
                                     <button title="{{$r->description}}" type="button" class="btn btn-primary btn-xs">Actived</button>
                                @else 
                                     <button title="{{$r->description}}" type="button" class="btn btn-warning btn-xs">Actived</button>
                                @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-eye" title="View"></i> </a>
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

@stop
