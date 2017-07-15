@extends('templates.owner.layout')

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
                                <th>User</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Total</th>
                                <th>@lang('users.action')</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cafe Name</th>
                                <th>Owner</th>
                                <th>User</th>
                                <th>Total</th>
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
                                <td>{{$row->category}}</td>
                                <td>{{$row->price}}</td>
                                <td>
                                    <a  data-toggle="modal" data-target="#show_menu" class="btn btn-info btn-xs" onclick="setModalValue('{{$row}}')"><i class="fa fa-eye" title="View"></i> </a>
                                    <a href="{{ route('users.edit', ['id' => $row->id]) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="{{ route('users.show', ['id' => $row->id]) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                </td>
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

@section ('css')

@stop