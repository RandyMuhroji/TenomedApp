@extends('templates.admin.layout')
@section('css')
    <link href="{{asset('gantella/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('gantella/vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet">
    <link href="{{asset('gantella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- <link href="{{asset('gantella/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link href="{{asset('gantella/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('gantella/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <link href="{{asset('gantella/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
@endsection

@section('js')
	
	<script src="{{asset('gantella/vendors/moment/min/moment.min.js')}}"></script>
	<script src="{{asset('gantella/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('gantella/vendors/fastclick/lib/fastclick.js')}}"></script>
	<!-- NProgress -->
	<script src="{{asset('gantella/vendors/nprogress/nprogress.js')}}"></script>
	<!-- jQuery custom content scroller -->
	<script src="{{asset('gantella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<!-- iCheck -->
	<script src="{{asset('gantella/vendors/iCheck/icheck.min.js')}}"></script>
@endsection
@section('content')
	<div class=""></div>
	<div class="x_content">
  	<div class="bs-example" data-example-id="simple-jumbotron">
	    <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">
                  	@if(count($user))
                  		{{$user[0]->total}}
                  	@else
                  		0
                  	@endif
                  </div>
                  <h3>New Users</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">
                  	@if(count($cafe))
                  		{{$cafe[0]->total}}
                  	@else
                  		0
                  	@endif
                  </div>
                  <h3>New Cafes</h3>
                </div>
              </div>
            </div>
          
          <div class="row">


            <div class="row">
              <div class="col-md-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Popular Cafes </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  @if(count($populer))
                  	@foreach($populer as $items)
                    <article class="media event">
                    	<div class="pull-left date">
	                   		@if($items->name)
	                    		<img width="100%" src="{{ asset('') }}images/{{$items->image}}" alt="img">
	                   		@else
	                    		<img width="100p%" src="{{ asset('') }}images/kafe.jpg" alt="img">
	                   		@endif
                   		</div>
                      <div class="media-body">
                        <a class="title" href="#">{{$items->name}}</a>
                        <p>{{$items->address}}</p>
                      </div>
                    </article>
                    @endforeach
                    @endif
                  </div>
                </div>
              </div>

              
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel fixed_height_320">
                  <div class="x_title">
                    <h2>Top Transaction</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="widget_summary">
                      <div class="w_left w_25">
                        <span>1.5.2</span>
                      </div>
                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </div>
                      <div class="w_right w_20">
                        <span>123k</span>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                    <div class="widget_summary">
                      <div class="w_left w_25">
                        <span>1.5.3</span>
                      </div>
                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </div>
                      <div class="w_right w_20">
                        <span>53k</span>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                      <div class="w_left w_25">
                        <span>1.5.4</span>
                      </div>
                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </div>
                      <div class="w_right w_20">
                        <span>23k</span>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                      <div class="w_left w_25">
                        <span>1.5.5</span>
                      </div>
                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </div>
                      <div class="w_right w_20">
                        <span>3k</span>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                      <div class="w_left w_25">
                        <span>0.1.5.6</span>
                      </div>
                      <div class="w_center w_55">
                        <div class="progress">
                          <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                            <span class="sr-only">60% Complete</span>
                          </div>
                        </div>
                      </div>
                      <div class="w_right w_20">
                        <span>1k</span>
                      </div>
                      <div class="clearfix"></div>
                    </div>

                  </div>
                </div>
              </div>

            </div>
          </div>
          <br>
          <br>
          <br>

  	</div>    
  </div>
@stop
