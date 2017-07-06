<!DOCTYPE html>
<html lang="en">
  
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo e(isset($title) ? $title : "Tenomed"); ?></title>
  <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('tenomed/images/favicon.png')); ?>"/>

  <!-- Bootstrap -->
  <link href="<?php echo e(asset('gantella/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?php echo e(asset('gantella/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">

  <!-- NProgress -->
  <link href="<?php echo e(asset('gantella/vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
  <!-- jQuery custom content scroller -->
  <link href="<?php echo e(asset('gantella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css')); ?>" rel="stylesheet"/>
  <!-- Datatables -->
  <link href="<?php echo e(asset('gantella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('gantella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('gantella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('gantella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')); ?>" rel="stylesheet">
  <link href="<?php echo e(asset('gantella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')); ?>" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="<?php echo e(asset('gantella/build/css/custom.min.css')); ?>" rel="stylesheet">

  <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"><i class="fa fa-paw"></i> <span>Manage Cafe</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?php echo e(Auth::user()->getAvatarUrl()); ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span><?php echo app('translator')->get('general.app.welcome'); ?>,</span>
              <h2><?php echo e(Auth::user()->name); ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3><?php echo app('translator')->get('general.app.general'); ?></h3>
                <ul class="nav side-menu">
                     <li><a href="<?php echo e(route('owner')); ?>"><i class="fa fa-home"></i> <?php echo app('translator')->get('general.nav.home'); ?> </a></li>
                    <li><a href="<?php echo e(route('menus.index')); ?>"><i class="fa fa-plus"></i>Menu</a></li>
                    <li><a href="<?php echo e(route('gallery.index')); ?>"><i class="fa fa-file-image-o"></i>Gallery</a></li>
                    <li><a href="<?php echo e(route('messages.index')); ?>"><i class="fa fa-envelope"></i>Messages</a></li>
                    <li><a href="<?php echo e(route('reviews.index')); ?>"><i class="fa fa-book"></i>Reviews</a></li>
                    <li><a><i class="fa fa-cog"></i> Setting <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                              <li><a href="<?php echo e(route('owner_account')); ?>">Account</a></li>
                              <li><a href="<?php echo e(route('owner_cafe')); ?>">Cafe</a></li>
                          </ul>
                      </li>
                </ul>
            </div>
        </div>
          <!-- /sidebar menu -->
        </div>
      </div>

   <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo e(Auth::user()->getAvatarUrl()); ?>" alt=""><?php echo e(Auth::user()->name); ?>

                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li>
                    <a href="<?php echo e(route('logout')); ?>"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                      <i class="fa fa-sign-out pull-right"></i> <?php echo app('translator')->get('general.logout.logout'); ?>
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo e(csrf_field()); ?>

                    </form>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

     <!-- page content -->
      <div class="right_col" role="main">
          <?php echo $__env->make('templates.admin.partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
          <?php echo $__env->yieldContent('content'); ?>
      </div>
      <!-- /page content -->

     <!-- footer content -->
      <footer>
          <div class="pull-right">
              Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?php echo e(asset('gantella/vendors/jquery/dist/jquery.min.js')); ?>"></script>
  <!-- Bootstrap -->
  <script src="<?php echo e(asset('gantella/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
  <!-- FastClick -->
  <script src="<?php echo e(asset('gantella/vendors/fastclick/lib/fastclick.js')); ?>"></script>
  <!-- NProgress -->
  <script src="<?php echo e(asset('gantella/vendors/nprogress/nprogress.js')); ?>"></script>
  <!-- jQuery custom content scroller -->
  <script src="<?php echo e(asset('gantella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo e(asset('gantella/vendors/iCheck/icheck.min.js')); ?>"></script>
  <!-- Datatables -->
  <script src="<?php echo e(asset('gantella/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/datatables.net-buttons/js/buttons.flash.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/datatables.net-buttons/js/buttons.print.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/jszip/dist/jszip.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/pdfmake/build/pdfmake.min.js')); ?>"></script>
  <script src="<?php echo e(asset('gantella/vendors/pdfmake/build/vfs_fonts.js')); ?>"></script>

  <!-- Custom Theme Scripts -->
  <script src="<?php echo e(asset('gantella/build/js/custom.min.js')); ?>"></script>
  <!-- Google Analytics -->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-23581568-13', 'auto');
  ga('send', 'pageview');

  </script>
<?php echo $__env->yieldContent('js'); ?>
</body>
</html>