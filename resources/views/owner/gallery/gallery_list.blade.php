@extends('templates.owner.layout')

@section('content')



<div class="">
    <div class="clearfix"></div>
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">	
    		<div class="x_panel">
    			<div class="x_title">
                    <h2>Media Gallery <a data-toggle="modal" data-target="#add_album" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New Album</a></h2>
                    <div class="clearfix"></div>
                </div>

                @for ($i=0;$i<3;$i++)
                	<div class="row">
			          <div class="col-md-12">
			            <div class="x_panel">
			              <div class="x_title">
			                <h2>Media Gallery <small> gallery design </small></h2>
			                <ul class="nav navbar-right panel_toolbox">
			                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			                  </li>
			                  <li class="dropdown">
			                    <a onclick="setModalID('{{$i}}')" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></a>
			                  </li>
			                  <li><a class="close-link"><i class="fa fa-close"></i></a>
			                  </li>
			                </ul>
			                <div class="clearfix"></div>
			              </div>
			              <div class="x_content">

			                <div class="row">

			                  <p>Media gallery design emelents</p>

			                  @for($j = 0; $j<10;$j++)
			                  <div class="col-md-55">
			                    <div class="thumbnail">
			                      <div class="image view view-first">
			                        <img style="width: 100%; display: block;" src="{{asset('images/media.jpg')}}" alt="image" />
			                        <div class="mask">
			                          <p>Your Text</p>
			                          <div class="tools tools-bottom">
			                            <a href="#"><i class="fa fa-eye"></i></a>
			                            <a href="#"><i class="fa fa-pencil"></i></a>
			                            <a href="#"><i class="fa fa-times"></i></a>
			                          </div>
			                        </div>
			                      </div>
			                      <div class="caption">
			                        <p>Snow and Ice Incoming for the South</p>
			                      </div>
			                    </div>
			                  </div>
			                  @endfor
			                </div>
			              </div>
			            </div>
			          </div>
		        	</div>
                @endfor
    		</div>
      	</div>
    </div>
</div>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p id="value">Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="add_album" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Album</h4>
      </div>
      <div class="modal-body">
      	<form class="form-horizontal">
	        <div></div>
	        <div class="col-md-12 col-sm-12 col-xs-24">
	            <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Album Name ...">
	            <div id="error_add_album"></div>
	        </div>
	        <br/>
	    </form>
      </div>
      <div class="modal-footer">
      	<button type="button" id="submit" class="btn btn-success">Submit</button>
        <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>
@stop

@section('js')
	<script type="text/javascript">
		var setModalID = function(val){
			$("#value").text(val);
		};
	</script>

	<script type="text/javascript">
		$("button#submit").click(function(){
		   	$.ajax({
    		   	type: "POST",
				url: "{{ route('users.store') }}",
				data: $('form.contact').serialize(),
	        		success: function(msg){
	 	          		$("#thanks").html(msg)
	 		        	$("#form-content").modal('hide');	
	 		        },
				error: function(){
					alert("failure");
					}
	      		});
		});
	</script>
@stop

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('gantella/build/css/me.css')}}">
@stop