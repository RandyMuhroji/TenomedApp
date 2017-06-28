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
    <script src="{{ asset('') }}assets/js/login-register.js" type="text/javascript"></script>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('') }}assets/favicon.png">

    <title>Tempat Nongkrong Medan</title>
    <style type="text/css">
      ul.pager li.active span {
          background-color: rgba(0, 159, 139, 0.7);
          color: white;
      }

      .hero-image-location:before, .hero-image-category:before, .hero-image-price:before, .hero-image-keyword:before {
        padding-left: 25px;
      }
    </style>


    <style>
      .header {
        position: fixed;
        right: 0;
        left: 0;
        top: 0;
        z-index: 99999;
      }

      .header .header-wrapper {
        transition: background .5s;
      }

      .header.opaque .header-wrapper {
        background: rgba(0, 159, 139, 1);
      }

      .header.opaque .header-wrapper a {
        color: #fff !important;
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
    </style>

    <script>
        $(document).ready(function(){
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

          $('.bootstrap-select > button').click(function(){
            $('.bootstrap-select').addClass('open');
          })
        });
    </script>
</head>


<body class="" id="loadContent">


@yield('content')

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
<script>

   // $(function(){
   //  if($('#bokk').val()==1){
   //    $('#bookmarks').addClass('marked');
   //  }

   // });


$(function(){
     
    $('#tmbPass').click(function(){
      document.getElementById("editProfile").style.display='none';
       document.getElementById("editPassword").style.display='inherit';

  });
});
$(function(){
     
    $('#tmbProfile').click(function(){
      document.getElementById("editProfile").style.display='inherit';
       document.getElementById("editPassword").style.display='none';

  });
});

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
