@extends('templates.admin.layout')

@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title}} <a href="{{route('cafes.index')}}" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> @lang('general.nav.back') </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form method="post" action="{{ route('cafes.update', ['id' => $cafe->id]) }}" data-parsley-validate class="form-horizontal form-label-left">
                  

                    <div class="row">
                      <div class="col-md-1 col-sm-1 col-xs-2">
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-16">
                        <h4>Cafe Information</h4>
                        <div class="ln_solid"></div>
                      </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cafe Name  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$cafe->name}}" id="name" name="name" class="form-control col-md-7 col-xs-12" required >
                            @if ($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" value="{{$cafe->phone}}" id="phone" name="phone" class="form-control col-md-7 col-xs-12">
                            @if ($errors->has('phone'))
                            <span class="help-block">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="address" value="{{$cafe->lat}}" id="address" name="address" class="form-control col-md-7 col-xs-12" >
                            @if ($errors->has('address'))
                            <span class="help-block">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('lat') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Latitude <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-5">
                            <input type="text" value="{{$cafe->lat}}" id="lat" name="lat" class="form-control col-md-7 col-xs-12" >
                            @if ($errors->has('lat'))
                            <span class="help-block">{{ $errors->first('lat') }}</span>
                            @endif
                        </div>

                        <label class="control-label col-md-2 col-sm-2 col-xs-12" for="address">longitude <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-5">
                            <input type="text" value="{{$cafe->long}}" name="lng" class="form-control col-md-7 col-xs-12">
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
                            <button type="submit" class="btn btn-success">Save</button>
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
  <script type="text/javascript">
    $(document).ready(function(){
       $("#generatePassword").click(function(){
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for( var i=0; i < 20; i++ )
                text += possible.charAt(Math.floor(Math.random() * possible.length));

            $("#password").val(text);
       });

      function initialize() {
         var lat = $("#lat").val(); 
         var lat = $("#lng").val(); 
         var latlng = new google.maps.LatLng(lat,lng);
          var map = new google.maps.Map(document.getElementById('map'), {
            center: latlng,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          });
          var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            draggable: true,
            anchorPoint: new google.maps.Point(0, -29)
         });
          var input = document.getElementById('searchInput');
          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
          var geocoder = new google.maps.Geocoder();
          var autocomplete = new google.maps.places.Autocomplete(input);
          autocomplete.bindTo('bounds', map);
          var infowindow = new google.maps.InfoWindow();   
          autocomplete.addListener('place_changed', function() {
              infowindow.close();
              marker.setVisible(false);
              var place = autocomplete.getPlace();
              if (!place.geometry) {
                  window.alert("Autocomplete's returned place contains no geometry");
                  return;
              }
        
              // If the place has a geometry, then present it on a map.
              if (place.geometry.viewport) {
                  map.fitBounds(place.geometry.viewport);
              } else {
                  map.setCenter(place.geometry.location);
                  map.setZoom(17);
              }
             
              marker.setPosition(place.geometry.location);
              marker.setVisible(true);          
          
              bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
              infowindow.setContent(place.formatted_address);
              infowindow.open(map, marker);
             
          });
          // this function will work on marker move event into map 
          google.maps.event.addListener(marker, 'dragend', function() {
              geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {        
                    bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
                    infowindow.setContent(results[0].formatted_address);
                    infowindow.open(map, marker);
                }
              }
              });
          });
      }
      function bindDataToForm(address,lat,lng){
         document.getElementById('address').value = address;
         document.getElementById('lat').value = lat;
         document.getElementById('lng').value = lng;
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    });
  </script>
@stop