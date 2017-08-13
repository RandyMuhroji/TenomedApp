@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>@lang('general.app.confirm.delete.title') <a href="{{route('cafes.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> @lang('general.nav.back') </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p>@lang('general.app.confirm.delete.question') <strong>{{$cafe->name}}</strong></p>

                    <form method="POST" action="{{ route('cafes.destroy', ['id' => $cafe->id]) }}">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger">@lang('general.form.delete') {{$cafe->name}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
     $(document).ready(function() {
      hideLoading();
   });
</script>
@endsection