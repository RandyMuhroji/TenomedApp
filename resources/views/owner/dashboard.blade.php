@extends('templates.owner.layout')

@section('content')
	<div class=""></div>
	<div class="x_content">
  	<div class="bs-example" data-example-id="simple-jumbotron">
  		@if($status == 0)
  		<div class="col-md-3"></div>
	    <div class="jumbotron col-md-6">
	      <h1>Hello, world!</h1>
	      <p>Please Complete information your cafe. to active this cafe <a href="/manage-cafe/settings/cafe" class="btn btn-primary sm">Clik here</a>
	      </p>
	    </div>
	    @endif
  	</div>    
  </div>
@stop