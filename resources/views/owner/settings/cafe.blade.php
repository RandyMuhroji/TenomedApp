@extends('templates.owner.layout')

@section('content')
<div class="">
  <div class="clearfix"></div>
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <div class="row">
            <div class="col-md-1 col-sm-1 col-xs-2">
              <h2>Cafe</h2>
            </div>
            <div class="col-md-11 col-sm-11 col-xs-12">
              <h2 style="float:right;"><a href="#" target="_blank" class="btn btn-info btn-xs">Show Cafe &nbsp;<i class="fa fa-eye"></i> </a></h2>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="clearfix"></div>
          <form method="post" action="/manage-cafe/settings/cafe/{{$cafe->id}}" data-parsley-validate class="form-horizontal form-label-left">            
            <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-2">
              </div>
              <div class="col-md-8 col-sm-8 col-xs-16">
                <h4>General Information</h4>
                <div class="ln_solid"></div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cafe Name  <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="{{ $cafe->name }}" id="name" name="name" class="form-control col-md-7 col-xs-12" required>
                  @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
                  @endif
              </div>
            </div>           

            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control col-md-7 col-xs-12" rows="3"></textarea>
                  @if ($errors->has('desc'))
                <span class="help-block">{{ $errors->first('desc') }}</span>
                  @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('desc') ? ' has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Operation Cafe <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <ul class="to_do">
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat" name = 'days[]' value="0"> Sunday
                        <input type="text" name="close_hours[]" class="form-control timePic time end"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start">
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat" value="1" name="days[]"> Monday 
                        <input type="text" name="close_hours[]" class="form-control timePic time end"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start">
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat" value="2" name = 'days[]'> Tuesday
                        <input type="text" name="close_hours[]" class="form-control timePic time end"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start">
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat" value="3" name = 'days[]'>
                         Wednesday
                        <input type="text" name="close_hours[]" class="form-control timePic time end"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start">
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat" value="4" name = 'days[]'> Thursday
                        <input type="text" name="close_hours[]" class="form-control timePic time end" > 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start" >
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat" value="5" name = 'days[]'>
                         Friday
                        <input type="text" name="close_hours[]" class="form-control timePic time end"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start">
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat" value="6" name = 'days[]' onchange="change()"> Saturday
                        <input type="text" name="close_hours[]" class="form-control timePic time end"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start">
                      </div>
                    </p>
                  </li>
                </ul>
              </div>
            </div>

            <div class ="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Highlights
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="tags_1" type="text" class="tags form-control col-md-7 col-xs-12"" value="" name="highlights" data-name="add new" />
              </div>
            </div>

            <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-2">
              </div>
              <div class="col-md-8 col-sm-8 col-xs-16">
                <h4>Location</h4>
                <div class="ln_solid"></div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">address <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="address" value="{{ $cafe->address }}" id="address" name="address" class="form-control col-md-7 col-xs-12" readonly>
                @if ($errors->has('address'))
                <span class="help-block">{{ $errors->first('address') }}</span>
                @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Latitude <span class="required" readonly>*</span>
              </label>
              <div class="col-md-2 col-sm-2 col-xs-5">
                  <input type="text" value="{{ $cafe->lat }}" id="lat" name="lat" class="form-control col-md-7 col-xs-12" readonly>
                  @if ($errors->has('lat'))
                  <span class="help-block">{{ $errors->first('lat') }}</span>
                  @endif
              </div>

              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="address">longitude <span class="required">*</span>
              </label>
              <div class="col-md-2 col-sm-2 col-xs-5">
                  <input type="text" value="{{ $cafe->long }}" id="lng" name="lng" class="form-control col-md-7 col-xs-12" readonly>
                  @if ($errors->has('lng'))
                  <span class="help-block">{{ $errors->first('lng') }}</span>
                  @endif
              </div>
            </div>

            <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="searchInput">
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">
                <div class="map" id="map" style="width: 100%; height: 300px;"></div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-1 col-sm-1 col-xs-2">
              </div>
              <div class="col-md-8 col-sm-8 col-xs-16">
                <h4>Contact</h4>
                <div class="ln_solid"></div>
              </div>
            </div>

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone  <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" value="{{ $cafe->phone }}" id="phone" name="phone" class="form-control col-md-7 col-xs-12">
                @if ($errors->has('phone'))
                <span class="help-block">{{ $errors->first('phone') }}</span>
                @endif
              </div>
            </div>


            <div class="ln_solid"></div>

            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <button type="submit" class="btn btn-success">Save Change</button>
                <button type="reset" class="btn btn-warning">Reset</button>
              </div>
            </div>
          </form>
        </div>                               
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAW37jHGYhQbPOwY4aolCYQpgBak4oiGyA&libraries=places"></script>
  <link rel="stylesheet" href="{{asset('gantella/build/css/maps.css')}}">
  <link rel="stylesheet" href="{{asset('gantella/build/css/jquery.timepicker.css')}}">
  <link rel="stylesheet" href="{{asset('gantella/build/css/lib/bootstrap-datepicker.css')}}">

  <style type="text/css">
    .timePic{
      width: 20%;
      float: right;
      height: 25px !important;
    }
    .lbl{
      width: 5%;
      float: right; 
      text-align: center !important;
      line-height: 20px;
    }
  </style>
@stop

@section('js')
  <script src="{{asset('gantella/build/js/maps.js')}}"></script>
  <script src="{{asset('gantella/build/js/jquery.timepicker.js')}}"> </script>
  <script src="{{asset('gantella/build/js/lib/bootstrap-datepicker.js')}}"> </script>
  <script src="{{asset('gantella/build/js/lib/site.js')}}"> </script>
  <script src="{{asset('gantella/build/js/datepair.js')}}"> </script>
  <script src="{{asset('gantella/build/js/jquery.datepair.js')}}"> </script>

  <!-- <script>
    var step1 = function(){
      console.log("step1 click");

      return $('#stepExample1').timepicker({ 'step': 30, 'timeFormat': 'h:i A' });
    };
    var step2 = function() {
      console.log("step2 click");
      return $('#stepExample2').timepicker({
        'start': $('#stepExample1').val(),
        'step': 30,
        'timeFormat': 'h:i A',
        'minTime': $('#stepExample1').val(),
        'maxTime': '11:30pm ',
        'showDuration': true
      });
    };
</script> -->
  <script>

    $('.datepairExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'h:i A'
    });

    $('.datepairExample').datepair();


    $(document).ready(function(){
      $(".sesuatu").change(function() {
        if(this.checked)
         alert($(this).val());
      });
    })
  </script>
  <script src="{{asset('gantella/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
@stop

