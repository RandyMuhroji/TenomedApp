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
                                <th>Review</th>
                                <th>Date</th>
                                <th>Rate</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Desc</th>
                                <th>Date</th>
                                <th>Rate</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($reviews))
                            @foreach ($reviews as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>{{$row->rate}}</td>
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