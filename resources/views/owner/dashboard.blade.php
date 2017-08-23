@extends('templates.owner.layout')
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
  		@if($status == 0)
  		<div class="col-md-3"></div>
	    <div class="jumbotron col-md-6">
	      <h1>Hello, world!</h1>
	      <p>Please Complete information your cafe. to active this cafe <a href="/manage-cafe/settings/cafe" class="btn btn-primary sm">Clik here</a>
	      </p>
	    </div>
	    @endif
	    <div class="row tile_count">
      
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Reserve Pending</span>
              @if(count($pending))
              <div class="count">{{$pending[0]->id}}</div>
              @else
                <div class="count">0</div>
              @endif
              <span class="count_bottom"> All Time</span>
            </div>

            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Reserve Succed</span>
              @if(count($sukses))
                <div class="count">{{$sukses[0]->id}}</div>
              @else
                <div class="count">0</div>
              @endif
              <span class="count_bottom"> All Time</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Reserve Suspend</span>
              @if(count($cancel))
                <div class="count">{{$cancel[0]->id}}</div>
              @else
                <div class="count">0</div>
              @endif
              <span class="count_bottom"> All Time</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Reserve Done</span>
              @if(count($done))
                <div class="count">{{$done[0]->id}}</div>
              @else
                <div class="count">0</div>
              @endif
              <span class="count_bottom"> All Time</span>
            </div>
          </div>
          
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
                  @if(count($populerCafe))
                    @foreach($populerCafe as $items)
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
                        <p>{{$items->kecamatan}}</p>
                      </div>
                    </article>
                    @endforeach
                    @endif
                  </div>
                </div>
              </div>

            <!-- <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Popular Food's</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                   
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tbody><tr>
                      <th style="width:37%;">
                        <p>Top 5</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Name</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class="">Percent</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tbody><tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>IOS </p>
                            </td>
                            <td>30%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>Android </p>
                            </td>
                            <td>10%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Blackberry </p>
                            </td>
                            <td>20%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>Symbian </p>
                            </td>
                            <td>15%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Others </p>
                            </td>
                            <td>30%</td>
                          </tr>
                        </tbody></table>
                      </td>
                    </tr>
                  </tbody></table>
                </div>
              </div>
            </div> -->


            <!-- <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Popular Drink's</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                   
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tbody><tr>
                      <th style="width:37%;">
                        <p>Top 5</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Name</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class="">Percent</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 15px 10px 10px 0px; width: 140px; height: 140px;"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tbody><tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>IOS </p>
                            </td>
                            <td>30%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>Android </p>
                            </td>
                            <td>10%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Blackberry </p>
                            </td>
                            <td>20%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>Symbian </p>
                            </td>
                            <td>15%</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Others </p>
                            </td>
                            <td>30%</td>
                          </tr>
                        </tbody></table>
                      </td>
                    </tr>
                  </tbody></table>
                </div>
              </div>
            </div> -->
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel fixed_height_320">
                  <div class="x_title">
                    <h2>TENOMED-Top Transaction</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  
                  <div class="x_content">
                  <table class="" style="width:100%">
                    <tbody>
                    <tr>
                      <th>
                        <p>#</p>
                      </th>
                      <th style="width:37%;">
                        <p>Name</p>
                      </th>
                      <th>
                          <p class="">Address</p>
                      </th>
                      <th>
                          <p class="">Total Transection</p>
                      </th>
                    @if(count($topTrans))
                      @foreach($topTrans as $items1)
                        <tr>

                          <td style="padding: 5px;">
                              <img width="40px" src="{{ asset('') }}images/{{$items1->image or 'kafe.png'}}" alt="img">
                          </td>
                          <td><p> {{$items1->name}} </p></td>
                          <td>{{$items1->kecamatan}}</td>
                          <td>{{$items1->total}} Times</td>
                        </tr>
                      @endforeach
                    @endif
                  </tbody></table>
                </div>



                </div>
              </div>

          </div>

  	</div>    
  </div>
@stop
