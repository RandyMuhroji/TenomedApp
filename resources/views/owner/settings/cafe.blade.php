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
                <textarea class="form-control col-md-7 col-xs-12" rows="3" name="desc">{{$cafe->desc}}</textarea>
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
                        <input type="checkbox" class="flat change" name='days[]' value="0" {{isset($days[0]) ? 'checked' : '' }} > Sunday
                        <input type="text" name="close_hours[]" class="form-control timePic time end" value="{{ isset($close_hours['0']) ? $close_hours['0'] : '' }}"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start" value="{{ isset($open_hours['0']) ? $open_hours['0'] : '' }}">
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat change" value="1" name="days[]" {{isset($days[1]) ? 'checked' : '' }}> Monday 
                        <input type="text" name="close_hours[]" class="form-control timePic time end" value="{{ isset($close_hours['1']) ? $close_hours['1'] : '' }}"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start" value="{{ isset($open_hours['1']) ? $open_hours['1'] : '' }}">
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat change" value="2" name = 'days[]' {{isset($days[2]) ? 'checked' : '' }}> Tuesday
                        <input type="text" name="close_hours[]" class="form-control timePic time end" value="{{ isset($close_hours['2']) ? $close_hours['2'] : '' }}"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start" value="{{ isset($open_hours['2']) ? $open_hours['2'] : '' }}">
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat change" value="3" name = 'days[]' {{isset($days[3]) ? 'checked' : '' }}>
                         Wednesday
                        <input type="text" name="close_hours[]" class="form-control timePic time end" value="{{ isset($close_hours['3']) ? $close_hours['3'] : '' }}"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start" value="{{ isset($open_hours['3']) ? $open_hours['3'] : '' }}">
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat change" value="4" name = 'days[]' {{isset($days[4]) ? 'checked' : '' }}> Thursday
                        <input type="text" name="close_hours[]" class="form-control timePic time end" value="{{ isset($close_hours['4']) ? $close_hours['4'] : '' }}"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start" value="{{ isset($open_hours['4']) ? $open_hours['4'] : '' }}">
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat change" value="5" name = 'days[]' {{isset($days[5]) ? 'checked' : '' }}>
                         Friday
                        <input type="text" name="close_hours[]" class="form-control timePic time end" value="{{ isset($close_hours['5']) ? $close_hours['5'] : '' }}"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start" value="{{ isset($open_hours['5']) ? $open_hours['5'] : '' }}">
                      </div>
                    </p>
                  </li>
                  <li>
                    <p>
                      <div class="datepairExample">
                        <input type="checkbox" class="flat change" value="6" name = 'days[]' {{isset($days[6]) ? 'checked' : '' }}> Saturday
                        <input type="text" name="close_hours[]" class="form-control timePic time end" value="{{ isset($close_hours['6']) ? $close_hours['6'] : '' }}"> 
                        <label class="control-label lbl">To</label>
                        <input type="text" name="open_hours[]" class="form-control timePic time start" value="{{ isset($open_hours['6']) ? $open_hours['6'] : '' }}">
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
                <input id="tags_1" type="text" class="tags form-control col-md-7 col-xs-12"" value="{{$highlights}}" name="highlights" data-name="add new" />
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

  <script>

    $('.datepairExample .time').timepicker({
        'showDuration': true,
        'timeFormat': 'h:i A'
    });

    $('.datepairExample').datepair();


    $(document).ready(function(){
      $(".change").change(function() {
        if(this.checked){
            alert($(this).val());
        }
        console.log('udah masok ni');
      });
    })
  </script>
  <script src="{{asset('gantella/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
@stop

