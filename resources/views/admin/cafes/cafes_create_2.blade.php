@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Create Cafe <a href="{{route('cafes.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> @lang('general.nav.back') </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="{{ route('cafes.store') }}" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cafe Name  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('name') ?: '' }}" id="name" name="name" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone  <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="{{ Request::old('phone') ?: '' }}" id="phone" name="phone" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('phone'))
                                <span class="help-block">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">address <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="address" value="{{ Request::old('address') ?: '' }}" id="address" name="address" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('address'))
                                <span class="help-block">{{ $errors->first('address') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Latitude <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-5">
                                <input type="text" value="{{ Request::old('lat') ?: '' }}" id="lat" name="lat" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('lat'))
                                <span class="help-block">{{ $errors->first('lat') }}</span>
                                @endif
                            </div>

                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="address">longitude <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-5">
                                <input type="text" value="{{ Request::old('lng') ?: '' }}" id="lng" name="lng" class="form-control col-md-7 col-xs-12">
                                @if ($errors->has('lng'))
                                <span class="help-block">{{ $errors->first('lng') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for=>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="searchInput" class="input-controls" type="text" placeholder="Enter a location">
     <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                            </div>
                        </div>


                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <button type="submit" class="btn btn-success">@lang('general.form.create_record')</button>
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
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAW37jHGYhQbPOwY4aolCYQpgBak4oiGyA&libraries=places"></script>
    <style type="text/css">
        .input-controls {
          margin-top: 10px;
          border: 1px solid transparent;
          border-radius: 2px 0 0 2px;
          box-sizing: border-box;
          -moz-box-sizing: border-box;
          height: 32px;
          outline: none;
          box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }
        #searchInput {
          background-color: #fff;
          font-family: Roboto;
          font-size: 15px;
          font-weight: 300;
          margin-left: 12px;
          padding: 0 11px 0 13px;
          text-overflow: ellipsis;
          width: 50%;
        }
        #searchInput:focus {
          border-color: #4d90fe;
        }
    </style>
@stop

@section('js')
   {{asset('tenomed/js/map_edit.js')}}
   <script>
        $(document).ready(function() {
      hideLoading();
   });
   </script>
@stop