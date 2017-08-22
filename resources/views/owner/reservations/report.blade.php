@extends('templates.owner.layout')

@section('css')
<link href="{{asset('gantella/vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <div class="col-md-1 col-sm-1 col-xs-2">
                        <h2>Reservations</h2>
                    </div>

                    
                    <div class="clearfix"></div>
                </div>
                <div class="row">

                    
                <div class="x_content">
                <div class="well" style="overflow: auto">
                      <div class="col-md-2">
                      <label class="control-label col-md-12 col-sm-12 col-xs-12" style="padding: 10px;">Filter date</label>
                        </div>
                      <div class="col-md-4">
                        <form class="form-horizontal" action="/manage-cafe/report" action="get">
                          <fieldset>
                            <div class="control-group">
                              <div class="controls">
                                <div class="input-prepend input-group">
                                  <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                  <input type="text" style="width: 100%;" name="reservation" id="reservation" class="form-control" value="">
                                </div>
                              </div>
                            </div>
                          </fieldset>
                        
                      </div>
                        <button type="submit" class="btn btn-success">Filter</button>
                      </form>
                      
                    </div>
                      
                    </div>
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="150px">Reservation Name</th>
                                <th width="120px">Reservation Code</th>
                                <th width="120px">Date</th>
                                <th width="80px">Total</th>
                                <th width="80px">Detail</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Reservation Name</th>
                                <th>Reservation Code</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(count($reservations))
                            @foreach ($reservations as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->reserv_code}}</td>
                                <td>{{$row->bookingDate}} {{$row->bookingTime}}</td>
                                <td>Rp.{{$row->total}}</td>
                                <td><button data-toggle="modal" data-target="#show_detail" type="button" class="btn btn-warning" onclick="detail('{{$row->reserv_code}}','{{$row->name}}','{{$row->phone}}','{{$row->email}}','{{$row->bookingDate}} {{$row->bookingTime}}','{{$row->persons}}','{{$row->id}}','{{$row->total}}');">Detail</button></td>
                                
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

<div id="show_detail" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width: 75%;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail's Reservation</h4>
      </div>
      <form action = '' method="GET" data-parsley-validate class="form-horizontal form-label-left" id = "frmUpdate" > 
        <div class="modal-body">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Details Reservations </h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li id="code"></li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <ul class="list-unstyled timeline">
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="#" class="tag">
                            <span >Name</span>
                          </a>
                        </div>
                        <div class="block_content" ">
                          <h2 class="title">
                            <a id="name"></a>
                          </h2>
                        </div>
                      </div>
                    </li>
                    
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="#" class="tag">
                            <span >Email</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title">
                            <a id="email"></a>
                          </h2>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="#" class="tag">
                            <span >Phone</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title">
                            <a id="phone"></a>
                          </h2>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="#" class="tag">
                            <span >Date</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title">
                            <a id="date"></a>
                          </h2>
                        </div>
                      </div>
                    </li>
                  </ul>

                </div>
                <h2>Reservation Menu</h2>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Hover rows <small>Try hovering over the rows</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Picture</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody id="menuList">
                        
                      </tbody>
                      <tr>
                          <th colspan="4" style="text-align: center;">Total</th>
                          <th id="total">Total</th>
                        </tr>

                    </table>

                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>

  </div>
</div>
@stop

@section ('css')

@stop
@section('js')
<script>
  $(document).ready(function() {
     $("#frmUpdate").submit(function(e) {
      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/manage-cafe/reservvHist/',              
      type: 'GET',

      data: {'code':$(code).val()},
      success: function( data ) {
        alert(data);
      }
     });

     });

     //wal


     //akhir

  });
  function detail(code,name,phone, email, date,person,doko,total){
    $('#menuList').empty();
    $('#name').html(name);
    $('#phone').html(phone);
    $('#email').html(email);
    $('#date').html(date);
    $('#code').html(code);
    $('#total').html("Rp. "+total);

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/manage-cafe/cekReport/',              
      type: 'GET',

      data: {'id':doko},
      success: function( data ) {
        var i=0;
        data.forEach(function(element) {   
        var data=element["images"];
        if(element["images"]==""){
            data="lunch.png";
        }         
          $('#menuList').append(' <tr>                          <th scope="row"><img width="40px" src="{{ asset('') }}images/'+data+'" alt="img"></th>                          <td>'+element["name"]+'</td>                          <td>Rp.'+element["price"]+'</td>                          <td>'+element["qunatity"]+'</td>                          <td> Rp. '+element["total"]+'</td>                        </tr>');
          i++;
        });
      }
     });
  }
</script>
@endsection