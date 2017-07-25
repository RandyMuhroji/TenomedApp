<!DOCTYPE html>
<html>


<!-- Mirrored from preview.byaviators.com/template/superlist/ by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 14 May 2017 15:03:57 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/libraries/owl.carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" >
    <link href="{{ asset('') }}assets/libraries/colorbox/example1/colorbox.css" rel="stylesheet" type="text/css" >
    <link href="{{ asset('') }}assets/libraries/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/libraries/bootstrap-fileinput/fileinput.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('') }}assets/css/superlist.css" rel="stylesheet" type="text/css" >

    <!-- <link href="{{ asset('') }}css/login-register.css" rel="stylesheet" />
    <link href="{{ asset('') }}css/bootstrap.css" rel="stylesheet" /> -->

    <script src="{{ asset('') }}assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/js/bootstrap.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/css/bootstrap.min.css" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/js/login-register.js" type="text/javascript"></script>
    <script src="{{ asset('') }}assets/js/bootbox.min.js" type="text/javascript"></script>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}assets/favicon.png">

    @yield('css')

    <title>Tempat Nongkrong Medan</title>
    <style type="text/css">
    

.wizard {
    margin: 20px auto;
    background: #fff;
}

    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;
    
}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}

@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}

      ul.pager li.active span {
          background-color: rgba(0, 159, 139, 0.7);
          color: white;
      }

      .hero-image-location:before, .hero-image-category:before, .hero-image-price:before, .hero-image-keyword:before {
        padding-left: 25px;
      }
      .kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
    margin: 0;
    padding: 0;
    border: none;
    box-shadow: none;
    text-align: center;
    }
    .kv-avatar .file-input {
        display: table-cell;
        max-width: 220px;
    }
    
    .kv-reqd {
        color: red;
        font-family: monospace;
        font-weight: normal;
    }
    header{
        color: white;
    } 
      .when-error{border-color: pink;}
     .header {
        position: fixed;
        right: 0;
        left: 0;
        top: 0;
        z-index: 99;
        color: white;
      }

      .header .header-wrapper {
        transition: background .5s;
      }

      .header.opaque .header-wrapper {
        background: rgba(0, 159, 139, 1);
      }

      .header.opaque .header-wrapper a {
      }

      .col-ticket {
        position: relative;
        min-height: 1px;
        padding-left: 15px;
        padding-right: 15px;
        float:left;
        box-shadow: 1px 1px 0px #ddd;
        margin: 10px;
      }
      .menu-advanced{
        color: black;
      } 
      .hero-image-location{
        padding-left: 15px;
      }
          </style>
</head>


<body class="" id="loadContent">
<div class="page-wrapper">
    @yield('content')
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <h2>About Tenomed</h2>

                        <p>The biggest online reservaion cafes in medan,</p>
                    </div><!-- /.col-* -->

                    <div class="col-sm-4">
                        <h2>Contact Information</h2>

                        <p>
                            Jln. Pukat Banting IV No.81, Mandala BY PASS, Medan<br>
                            +62821-6115-1070, <a href="#">tenomed01@gmail.com</a>
                        </p>
                    </div><!-- /.col-* -->

                    <div class="col-sm-4">
                        <h2>Stay Connected</h2>

                        <ul class="social-links nav nav-pills">
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul><!-- /.header-nav-social -->
                    </div><!-- /.col-* -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.footer-top -->

        <div class="footer-bottom">
            <div class="container">
                <div class="footer-bottom-left">
                    &copy; 2015 All rights reserved. Created by <a href="#">The Fighters</a>.
                </div><!-- /.footer-bottom-left -->

                <div class="footer-bottom-right">
                    <ul class="nav nav-pills">
                        <li><a href="/">Home</a></li>
                        <li><a href="pricing.html">Pricing</a></li>
                        <li><a href="terms-conditions.html">Terms &amp; Conditions</a></li>
                        <li><a href="contact-1.html">Contact</a></li>
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


<script src="{{ asset('') }}assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>
<!-- <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46172202-1', 'auto');
  ga('send', 'pageview');

</script> -->


<!-- <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs1.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKS3CDCrE1R7PeCYK0JmpL2V%2fkQ%2faUJpnR8PGvznCPtV2kaOJDLe0LHZMBNqqw%2b6%2f3ACEyU06lZy1rWAqB%2bpL%2bXHfbvfXca%2fhnlrNayx6vvjNh3S3JI2d52sYAdgX0V6UM2FOE6Dvp8aRqT1bbZS%2bXUsQA%2bzcHwiEV00s1uximTHLx3kiM6iMKMaT7guxdV6n8GgDk1cLXW3JDZZXhOAfM%2fLFAj2HUTw%2f%2fAlmH4eg5ZcPjUv8yHxviyuheZFIw72rQHsM8IrRyMSf%2b9r4HCmfzoOp7hK7pETr0D%2fzyEVyTDU%2bVY%2fKbKogyfMME8vp0OoeyriYI%2fs8fDOUpG9qJKiRXKeOjSz5Bsx3qgfGmNedosu6eQRQEaPoI6Jubi6U0lGqZDAuum8LQFpArb1ehyPNkSYcZvgu70dItvqxAGiS0trbUeCmi2atIg3cZfRU7wlrZv8oMS8%2ffL034yjJoxnRTaovy54wPAaEP07u62nmYHSpdsqupX1s%2f%2bE3StwNkKvarDsSpRq5asoltQgpwpUjFk5TX0aHyJHvNdTdT%2bybHKwl76UCxVJX96waOyJtTFMIJv%2fv2hAqYA7cn8nvF6CP0xnwiMGykIH0YDG6CWxKdWwkssOgX8r9lwHwEuK8hIQ2N0SCO1oESPjzT3ZF3t17dgsH22h574SYWugertBZq2zE%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};
</script> -->

<meta name="csrf-token" content="{{ csrf_token() }}" />
   @yield('java')
<script>

$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();

              materialKit.initFormExtendedDatetimepickers();

    });


     var wHeight = $(window).innerHeight();
          var presetHeights = $('.hero-image').outerHeight() / 2 - 70;
          console.log(presetHeights);
          var scroll_pos = 0;

          function processScroll() {
            scroll_pos = $(this).scrollTop();
            if((!(presetHeights == null || scroll_pos == 0) && presetHeights <= scroll_pos) || presetHeights <=0)
              $(".header").removeClass('header-transparent').addClass('opaque');
            else {
              $(".header").addClass('header-transparent').removeClass('opaque');
            }
          }

          processScroll();

          $(document).scroll(processScroll);

  


});
var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' + 
    'onclick="alert(\'Call your custom code here.\')">' +
    '<i class="glyphicon glyphicon-tag"></i>' +
    '</button>'; 
$("#avatar-2").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    showBrowse: false,
    browseOnZoneClick: true,
    removeLabel: '',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-2',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="{{ asset('') }}images/user.png" alt="Your Avatar" style="width:160px"><h6 class="text-muted">Click to select</h6>',
    layoutTemplates: {main2: '{preview}  {remove} {browse}'},
    allowedFileExtensions: ["jpg", "png", "gif"]
});

   // $(function(){
   //  if($('#bokk').val()==1){
   //    $('#bookmarks').addClass('marked');
   //  }

   // });

function check_email(email){
        email = email.replace(/ /g,'');
//        $('#email_add').val(email);
        if(email !== ""){
            var x=email;
            var atpos=x.indexOf("@"); var sppos=x.indexOf(" "); 
            var tdpos=x.indexOf(":"); var dotpos=x.lastIndexOf(".");
            if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length || sppos>=0 || tdpos>=0) {
                bootbox.alert("<strong>ERR001</strong> - not a valid e-mail abootboxddress example: user@yahoo.com");
                $('#email').addClass('when-error');
                $('#email').focus();
                return false;
            }
            else{
              bootbox.alert("<strong>ERR002</strong> - not a valid name mustbe entereds");
                $('#email').removeClass('when-error');
                check_username(email);
            }
        }
    };




    function check_name(){
        if($('#name').val() === ""){
          bootbox.alert("<strong>ERR002</strong> - not a valid name must be entered!");
           $('#name').addClass('when-error');
                $('#name').focus();
                return false;
        }
        else{
                $('#name').removeClass('when-error');
                check_username(email);
            }
    };

     function budi(aku){

       document.getElementById("replyKu"+aku).style.display='inherit';
    };


function editReview(){

        bootbox.alert({message:'<br><div class="testimonial"><div class="testimonial-image"><img src="http://localhost:8000/images/user.png" alt=""></div><div class="testimonial-inner"><div class="testimonial-title"><div class="row"><div class="col-sm-7"><div lass="card-small"><div class="card-small-image"><a href="listing-detail.html"><img src="http://localhost:8000/images/duku.png" alt="Tasty Brazil Coffee"></a></div><div class="card-small-content"><h3><a href="listing-detail.html">Tenomed Cafe</a></h3><h3><a href="listing-detail.html"></a></h3><h4><a href="listing-detail.html"> Medan Tembung</a></h4><div class="card-small-price"></div></div></div></div><div class="col-sm-5"><div class="testimonial-rating"><div class="form-group input-rating">                        <input value="1" name="rate" id="rating-food-1" required="" type="radio">                    <label for="rating-food-1" class=""></label>                    <input value="2" name="rate" id="rating-food-2" required="" type="radio">                    <label for="rating-food-2" class=""></label>                    <input value="3" name="rate" id="rating-food-3" required="" type="radio">                    <label for="rating-food-3" class=""></label>                    <input value="4" name="rate" id="rating-food-4" required="" type="radio">                    <label for="rating-food-4" class=""></label>                    <input value="5" name="rate" id="rating-food-5" required="" type="radio">                    <label for="rating-food-5" class=""></label>                </div></div></div></div></div><textarea class="form-control" rows="5" id="desc" name="desc" required="">bagus banget</textarea></div></div>', size: 'large'});
    };
function deleteReview(data){
    bootbox.confirm({ 
    size: "small",
    message: "Are you sure, to delete the review? <br><br><br>", 
    callback: function(result){ 
        if(result==true){
            $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            console.log("Review " +data);
            $.ajax({
              url: '/user/review/'+data,              
              type: 'delete',

              data: {'idUser':'a', 'kafe':'b'},
              success: function( data ) {
                console.log("masuk sini");
                window.location('/user/review');   
              }
             });
        }
     }
  });
}




  $(function(){

    $('#bookmarks').click(function(){


$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': {!! json_encode(csrf_token()) !!};,
        //     }
        // });
         console.log("tes masuk");
         var a=$('#idUser').val();
         var b=$('#kafe').val();

         if($('#bookmarks').hasClass("marked")){
         // alert('cong');
          $('#status').val(1);
         }else{
          $('#status').val(0);
         }
         $.ajax({
          type: 'GET',
          url: '/bookmarks?status='+$('#status').val(),

          data: {'idUser':a, 'kafe':b},
          success: function( data ) {
             // $(".doko").load("/login");
             //alert(data);
          }
         });
      });
  });


// $(function(){

//     $('#detailCafe').click(function(){



//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });
//          console.log("tes cafe");
//          var a=$('#idUser').val();
//          var b=$('#kafe').val();
//          $.ajax({
//           type: 'GET',
//           url: 'detail/'+$('#idCafe').val(),

//           data: {'idUser':a, 'kafe':b},
//           success: function( data ) {
//             // $(".dokok").load(data);
//             // alert(data);
//               document.getElementById("loadContent").innerHTML=data;
//              //alert(data);
//           }
//          });
//       });
//   });


</script>

</body>


<!-- Mirrored from preview.byaviators.com/template/superlist/ by HTTrack Website Copier/3.x [XR&CO'2013], Sun, 14 May 2017 15:05:37 GMT -->
</html>
