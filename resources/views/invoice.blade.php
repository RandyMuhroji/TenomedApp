<!DOCTYPE html>
<html>


<!-- Mirrored from preview.byaviators.com/template/superlist/listing-submit.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 14 May 2017 15:06:29 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/libraries/owl.carousel/{{ asset('') }}assets/owl.carousel.css" rel="stylesheet" type="text/css" >
    <link href="{{ asset('') }}assets/libraries/colorbox/example1/colorbox.css" rel="stylesheet" type="text/css" >
    <link href="{{ asset('') }}assets/libraries/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/libraries/bootstrap-fileinput/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/css/superlist.css" rel="stylesheet" type="text/css" >

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}assets/favicon.png">
    <style type="text/css">
        .quantity {
  position: relative;
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button
{
  -webkit-appearance: none;
  margin: 0;
}

input[type=number]
{
  -moz-appearance: textfield;
}

.quantity input {
  width: 100%;
  height: 42px;
  line-height: 1.65;
  float: left;
  display: block;
  padding: 0;
  margin: 0;
  padding-left: 20px;
  margin-left: 0: 
  border: 1px solid #eee;
}

.quantity input:focus {
  outline: 0;
}

.quantity-nav {
  float: left;
  position: relative;
  height: 42px;
}

.quantity-button {
  position: relative;
  cursor: pointer;
  border-left: 1px solid #eee;
  width: 20px;
  text-align: center;
  color: #333;
  font-size: 13px;
  font-family: "Trebuchet MS", Helvetica, sans-serif !important;
  line-height: 1.7;
  -webkit-transform: translateX(-100%);
  transform: translateX(-100%);
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  -o-user-select: none;
  user-select: none;
}

.quantity-button.quantity-up {
  position: absolute;
  height: 50%;
  top: 0;
  border-bottom: 1px solid #eee;
}

.quantity-button.quantity-down {
  position: absolute;
  bottom: -1px;
  height: 50%;
}
    </style>

    <title>Tempat Nongkrong Medan</title>
</head>


<body class="">

<div class="page-wrapper">
    
    <header class="header">
    <div class="header-wrapper">
        <div class="container">
            <div class="header-inner">
                <div class="header-logo">
                    <a href="/">
                        <img src="{{ asset('') }}assets/img/logo.png" alt="Logo">
                        <span>Tenomed</span>
                    </a>
                </div><!-- /.header-logo -->

                <div class="header-content">
                    <div class="header-bottom">
                        

                        <ul class="header-nav-primary nav nav-pills collapse navbar-collapse">
   
                        <li class="active" >
                                <a href="/">Home </a>

                            </li>
                        @if(Auth::check())

                            @permission(('user'))

                           <li>
                                <a href="#">
                                @if(Auth::user()->avatar=="")
                                <img src="{{Auth::user()->getAvatarUrl()}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;">{{Auth::user()->name}} <i class="fa fa-chevron-down"></i></a>
                                @else
                                <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;">{{Auth::user()->name}} <i class="fa fa-chevron-down"></i></a>
                                @endif

                                <ul class="sub-menu">
                                    <li><a href="{{url('user/profile')}}">Profile</a></li>
                                    <li><a href="{{url('user/notification')}}">Notifications</a></li>
                                    <li><a href="{{url('user/bookmarks')}}">Bookmarks</a></li>
                                    <li><a href="{{url('user/review')}}">Review</a></li>
                                    <li><a href="{{url('user/setting')}}">Setting</a></li>
                                    <li>
                                        <a href="{{route('logout')}}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out pull-right"></i> @lang('general.logout.logout')
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                                    </li>
                                </ul>
                            </li>
                            @endpermission
                            
                        @else
                            <li class="active" >
                                <a style="border: 1px solid white;padding: 10px 17px;margin-top: 10px;" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Login</a>

                            </li>
                            <li class="active">
                                <a data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Sign Up</a>

                            </li>
                        @endif

                        </ul>

                        <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div><!-- /.header-bottom -->
                </div><!-- /.header-content -->
            </div><!-- /.header-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-wrapper -->
</header><!-- /.header -->

<input type="hidden" name="idUser" id="idUser" value="{{Auth::user()->id}}">


    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    


                    <div class="col-sm-8 col-lg-9">
                        <div class="content">
                            <div class="page-title">
                            <h1>Proforma Reservation</h1>
                        </div>
                        <div class="alert alert-icon alert-dismissible alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </button>
                     Booking Form Berhasil di simpan, silahkan lakukan pembayaran ke nomor rekening di bawah.
                </div>
                        <div class="content">
                    


                    <div class="invoice-wrapper" id="invoice-wrapper">
    <div class="invoice">
        <div class="invoice-header clearfix">
            <div class="invoice-logo">
                <i class="fa fa-rocket"></i> TENOMED - Penerbitan Proforma
            </div><!-- /.invoice-logo -->

            <div class="invoice-description">
                <strong>#{{$detail->id}} / {{$detail->persons}} Persons</strong>
                <span></span>
            </div>
        </div><!-- /.invoice-header -->

        <div class="invoice-info">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Client</h4>
                    {{Auth::user()->name}}<br>
                    {{Auth::user()->email}}
                    <hr>
                    Booking Name :{{$detail->name}}<br>
                    date :{{$detail->bookingDate}}<br>
                    Time :{{$detail->bookingTime}}<br>

                </div>

                

                <div class="col-sm-6">
                    <h4>Payment Details</h4>

                    <strong>Rekeneing :</strong> 10927836<br>
                    <strong>Atas Nama :</strong> TENOMED BANK<br>
                </div>
            </div>
        </div><!-- /.invoice-info -->

        <table class="invoice-table table">
            <thead>
            <tr>
                <th>#</th>
                <th>Item</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Unit Cost</th>
                <th>Total</th>
            </tr>
            </thead>

            <tbody>
            {{$subttl=0}}

            {{$i=0}}
            @foreach($menu as $menus)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$menus->name}}</td>
                    <td>{{$menus->desc}}</td>
                    <td>{{$menus->qunatity}}</td>
                    <td>Rp. {{$menus->price}}</td>
                    <td>Rp. {{$menus->qunatity*$menus->price}}</td>
                    {{$subttl=$subttl+$menus->qunatity*$menus->price}}
                    {{$i=$i+1}}
                </tr>
           @endforeach
            </tbody>
        </table>
<hr>
        <div class="invoice-summary clearfix">
            <dl class="dl-horizontal pull-right">
                <dt>Sub - Total amount:</dt>
                <dd>Rp. {{$subttl}}</dd>
               
                <dt>Grand Total:</dt>
                <dd>Rp. {{$subttl}}</dd>
            </dl>
        </div><!-- /.invoice-summary -->
    </div><!-- /.invoice -->
</div><!-- /.invoice-wrapper -->

                </div><!-- /.content -->










                        </div><!-- /.content -->
                    </div><!-- /.col-* -->

                    <div class="col-sm-4 col-lg-3">
                        <div class="sidebar">
                            <div class="widget">
    <h2 class="widgettitle">Recent Listings</h2>

    

    
        

        <div class="cards-small">
            <div class="card-small">
                <div class="card-small-image">
                    <a href="listing-detail.html">
                        <img src="{{ asset('') }}assets/img/tmp/product-2.jpg" alt="Tasty Brazil Coffee">
                    </a>
                </div><!-- /.card-small-image -->

                <div class="card-small-content">
                    <h3><a href="listing-detail.html">Tasty Brazil Coffee</a></h3>
                    <h4><a href="listing-detail.html">New York / Village</a></h4>

                    <div class="card-small-price">$180 / person</div>
                </div><!-- /.card-small-content -->
            </div><!-- /.card-small -->
        </div><!-- /.cards-small -->
    
        

        <div class="cards-small">
            <div class="card-small">
                <div class="card-small-image">
                    <a href="listing-detail.html">
                        <img src="{{ asset('') }}assets/img/tmp/product-3.jpg" alt="Healthy Breakfast">
                    </a>
                </div><!-- /.card-small-image -->

                <div class="card-small-content">
                    <h3><a href="listing-detail.html">Healthy Breakfast</a></h3>
                    <h4><a href="listing-detail.html">New York / Village</a></h4>

                    <div class="card-small-price">$180 / person</div>
                </div><!-- /.card-small-content -->
            </div><!-- /.card-small -->
        </div><!-- /.cards-small -->
    
        

        <div class="cards-small">
            <div class="card-small">
                <div class="card-small-image">
                    <a href="listing-detail.html">
                        <img src="{{ asset('') }}assets/img/tmp/product-4.jpg" alt="Coffee &amp; Newspaper">
                    </a>
                </div><!-- /.card-small-image -->

                <div class="card-small-content">
                    <h3><a href="listing-detail.html">Coffee &amp; Newspaper</a></h3>
                    <h4><a href="listing-detail.html">New York / Village</a></h4>

                    <div class="card-small-price">$180 / person</div>
                </div><!-- /.card-small-content -->
            </div><!-- /.card-small -->
        </div><!-- /.cards-small -->
    
</div><!-- /.widget -->

                            
                            <div class="widget">
    <h2 class="widgettitle">Filter</h2>

    <div class="background-white p20">
        <form method="post" action="http://preview.byaviators.com/template/superlist/listing-submit.html?">
            <div class="form-group">
                <label for="">Keyword</label>
                <input type="text" class="form-control" name="" id="">
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="">Category</label>

                <select class="form-control" title="Select Category">
                    <option>Automotive</option>
                    <option>Real Estate</option>
                </select>
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="">Location</label>
                <select class="form-control" title="Select Location">
                    <option>New York</option>
                    <option>San Francisco</option>
                </select>
            </div><!-- /.form-group -->

            <div class="form-group">
                <label for="">Starting Price</label>
                <input type="text" class="form-control" name="" id="">
            </div><!-- /.form-group -->

            <button class="btn btn-primary btn-block" type="submit">Search</button>
        </form>
    </div>
</div><!-- /.widget -->


                            <div class="widget">
    <h2 class="widgettitle">Working Hours</h2>

    <div class="p20 background-white">
        <div class="working-hours">
            <div class="day clearfix">
                <span class="name">Mon</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Tue</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Wed</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Thu</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Fri</span><span class="hours">07:00 AM - 07:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Sat</span><span class="hours">07:00 AM - 02:00 PM</span>
            </div><!-- /.day -->

            <div class="day clearfix">
                <span class="name">Sun</span><span class="hours">Closed</span>
            </div><!-- /.day -->
        </div>
    </div>
</div><!-- /.widget -->


                            <div class="widget">
    <h2 class="widgettitle">Categories</h2>

    <ul class="menu">
        <li><a href="#">Automotive</a></li>
        <li><a href="#">Jobs</a></li>
        <li><a href="#">Nightlife</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Transportation</a></li>
        <li><a href="#">Real Estate</a></li>
        <li><a href="#">Restaurants</a></li>
    </ul><!-- /.menu -->
</div><!-- /.wifget -->


                            <div class="widget">
    <h2 class="widgettitle">Archives</h2>

    <ul class="menu">
        <li><a href="#">August <strong class="pull-right">12</strong></a></li>
        <li><a href="#">July <strong class="pull-right">23</strong></a></li>
        <li><a href="#">June <strong class="pull-right">53</strong></a></li>
    </ul><!-- /.menu -->
</div><!-- /.wifget -->

                        </div><!-- /.sidebar -->
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.main-inner -->
    </div><!-- /.main -->

    <footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h2>About Superlist</h2>

                    <p>Superlist is directory template built upon Bootstrap and SASS to bring great experience in creation of directory.</p>
                </div><!-- /.col-* -->

                <div class="col-sm-4">
                    <h2>Contact Information</h2>

                    <p>
                        Your Street 123, Melbourne, Australia<br>
                        +1-123-456-789, <a href="#">sample@example.com</a>
                    </p>
                </div><!-- /.col-* -->

                <div class="col-sm-4">
                    <h2>Stay Connected</h2>

                    <ul class="social-links nav nav-pills">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                    </ul><!-- /.header-nav-social -->
                </div><!-- /.col-* -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.footer-top -->

    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-left">
                &copy; 2017 All rights reserved. 
            </div><!-- /.footer-bottom-left -->

            <div class="footer-bottom-right">
                <ul class="nav nav-pills">
                    <li><a href="/">Home</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#">Terms &amp; Conditions</a></li>
                    <li><a href="#">Contact</a></li>
                </ul><!-- /.nav -->
            </div><!-- /.footer-bottom-right -->
        </div><!-- /.container -->
    </div>
</footer><!-- /.footer -->

</div><!-- /.page-wrapper -->

<script src="{{ asset('') }}assets/js/jquery.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/js/map.js" type="text/javascript"></script>

<script src="{{ asset('') }}assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/libraries/bootstrap-sass/javascripts/bootstrap/carousel.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/libraries/bootstrap-sass/javascripts/bootstrap/tooltip.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/libraries/bootstrap-sass/javascripts/bootstrap/alert.js" type="text/javascript"></script>

<script src="{{ asset('') }}assets/libraries/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>

<script src="{{ asset('') }}assets/libraries/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="{{ asset('') }}assets/libraries/flot/jquery.flot.spline.js" type="text/javascript"></script>

<script src="{{ asset('') }}assets/libraries/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>

<script src="http://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing" type="text/javascript"></script>

<script type="text/javascript" src="{{ asset('') }}assets/libraries/jquery-google-map/infobox.js"></script>
<script type="text/javascript" src="{{ asset('') }}assets/libraries/jquery-google-map/markerclusterer.js"></script>
<script type="text/javascript" src="{{ asset('') }}assets/libraries/jquery-google-map/jquery-google-map.js"></script>

<script type="text/javascript" src="{{ asset('') }}assets/libraries/owl.carousel/owl.carousel.js"></script>
<script type="text/javascript" src="{{ asset('') }}assets/libraries/bootstrap-fileinput/fileinput.min.js"></script>

<script src="{{ asset('') }}assets/js/superlist.js" type="text/javascript"></script>
<script type="text/javascript">
        jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');

      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

    });
</script>

</body>

<!-- Mirrored from preview.byaviators.com/template/superlist/listing-submit.html by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 14 May 2017 15:06:29 GMT -->
</html>
