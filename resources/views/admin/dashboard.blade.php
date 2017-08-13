@extends('templates.admin.layout')

@section('content')

@stop

@section ('css')


@stop

@section('js')
<script>
	showLoading();
	$(document).ready(function() {
      hideLoading();
  });
</script>
@endsection