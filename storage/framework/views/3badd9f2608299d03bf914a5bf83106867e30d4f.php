<?php $__env->startSection('content'); ?>
    <style>
      @media (max-width: 767px) {
        .hero-image-content {
            display: block !important;
        }
      }

      .hero-image-form-wrapper form [class^="hero-image-"]{
        margin-bottom: 10px;
      }

      .hero-image-form-wrapper form {
        padding-bottom: 10px;
      }

      .hero-image-inner {
        height: 345px;
        margin-top:59px;
      }
    </style>
    <div class="page-wrapper">

    <header class="header">
        <div class="header-wrapper">
            <div class="container">
                <div class="header-inner">
                    <div class="header-logo">
                        <a href="index-2.html">
                            <img src="<?php echo e(asset('')); ?>assets/img/logo-white.png" alt="Logo">
                            <span>Tenomed</span>
                        </a>
                    </div><!-- /.header-logo -->

                    <div class="header-content">
                        <div class="header-bottom">
                            <!-- /.header-action -->

                            <ul class="header-nav-primary nav nav-pills collapse navbar-collapse" style="font-weight: 500;">

                               
                            <?php if(Auth::check()): ?>

                                <?php if (\Entrust::can(('user'))) : ?>
                                 <li class="active" >
                                    <a href="/">Home </a>

                                </li>

                               <li>
                                    <a href="#">
                                    <?php if(Auth::user()->avatar==""): ?>
                                      <img src="<?php echo e(Auth::user()->getAvatarUrl()); ?>" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;"><span style="text-transform: capitalize;"><?php echo e(Auth::user()->name); ?></span> <i class="fa fa-chevron-down"></i></a>
                                    <?php else: ?>
                                      <img src="<?php echo e(asset('')); ?>images/<?php echo e(Auth::user()->avatar); ?>" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;"><span style="text-transform: capitalize;"><?php echo e(Auth::user()->name); ?></span><i class="fa fa-chevron-down"></i></a>
                                    <?php endif; ?>

                                    <ul class="sub-menu">
                                        <li><a href="user/profile">Profile</a></li>
                                        <li><a href="user/profile">Notifications</a></li>
                                        <li><a href="user/profile">Bookmarks</a></li>
                                        <li><a href="user/profile">Review</a></li>
                                        <li><a href="user/profile">Setting</a></li>
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
                                <?php endif; // Entrust::can ?>
                                <?php if (\Entrust::can(('owner'))) : ?>
                                   <li class="active" >
                                    <a href="<?php echo e(url('manage-cafe')); ?>">Manage Cafe</a>

                                  </li>
                                <?php endif; // Entrust::can ?>
                                <?php if (\Entrust::can(('admin'))) : ?>

                               <li>
                                   <li class="active" >
                                    <a href="<?php echo e(url('admin')); ?>">Admin Panel</a>

                                  </li>
                                    
                                </li>
                                <?php endif; // Entrust::can ?>

                            <?php else: ?>
                                <li class="active" >
                                    <a style="border: 1px solid white;padding: 10px 17px;margin-top: 10px;" data-toggle="modal" href="/login" onclick="openLoginModal();">Login</a>

                                </li>
                                <li class="active">
                                    <a data-toggle="modal" href="/register" onclick="openRegisterModal();">Sign Up</a>

                                </li>
                            <?php endif; ?>

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

    <div class="modal fade login" id="loginModal">
        <div class="modal-dialog login animated">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Login with</h4>
              </div>
              <div class="modal-body">
                  <div class="box">
                       <div class="content">
                          <div class="social">
                              <a class="circle github" href="#">
                                  <i class="fa fa-github fa-fw"></i>
                              </a>
                              <a id="google_login" class="circle google" href="#">
                                  <i class="fa fa-google-plus fa-fw"></i>
                              </a>
                              <a id="facebook_login" class="circle facebook" href="#">
                                  <i class="fa fa-facebook fa-fw"></i>
                              </a>
                          </div>
                          <div class="division">
                              <div class="line l"></div>
                                <span>or</span>
                              <div class="line r"></div>
                          </div>
                          <div class="error"></div>
                          <div class="form loginBox">
                              <form method="" action="#" accept-charset="UTF-8">
                              <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                              <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                              <input class="btn btn-default btn-login" type="button" value="Login" onclick="loginAjax()">
                              </form>
                          </div>
                       </div>
                  </div>
                  <div class="box">
                      <div class="content registerBox" style="display:none;">
                       <div class="form">
                          <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                          <input id="email" class="form-control" type="text" placeholder="Email" name="email">
                          <input id="password" class="form-control" type="password" placeholder="Password" name="password">
                          <input id="password_confirmation" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmation">
                          <input class="btn btn-default btn-register" type="button" value="Create account" name="commit">
                          </form>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <div class="forgot login-footer">
                      <span>Looking to
                           <a href="javascript: showRegisterForm();">create an account</a>
                      ?</span>
                  </div>
                  <div class="forgot register-footer" style="display:none">
                       <span>Already have an account?</span>
                       <a href="javascript: showLoginForm();">Login</a>
                  </div>
              </div>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="main-inner">
            <div class="content">
                <div class="mt-150">
                    <div class="hero-image">
                        <div class="hero-image-inner" style="background-image: url('<?php echo e(asset('')); ?>assets/img/pizza3.jpg');">
                            <!-- <div class="hero-image-content">
                                <div class="container">
                                    <h1>Tenomed</h1>

                                    <p>Find your favorite cafe and resto. Invite your friend and do an awesome hangout.</p>

                                </div>--><!-- /.container -->
                            <!--</div>--><!-- /.hero-image-content -->

                            <div class="hero-image-content">
                              <div class=" hero-image-form-wrapper" style="position:relative">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12 col-lg-12">
                                            <form method="get" action="/cari">
                                           <!--  <?php echo e(csrf_field()); ?> -->

                                              <div class="form-group row">

                                                 <div class="hero-image-location col-xs-12 col-sm-4">
                                                    <select class="form-control" title="Location" name="location" id="location">
                                                        <option selected="">Medan Kota</option>
                                                        <option>Medan Tuntungan</option>
                                                        <option>Medan Timur</option>
                                                        <option>Medan Tembung</option>
                                                        <option>Medan Sunggal</option>
                                                        <option>Medan Selayang</option>
                                                        <option>Medan Polonia</option>
                                                        <option>Medan Petisah</option>
                                                        <option>Medan Perjuangan</option>
                                                        <option>Medan Marelan</option>
                                                        <option>Medan Maimun</option>
                                                        <option>Medan Labuhan</option>
                                                        <option>Medan Petisah</option>
                                                        <option>Medan Perjuangan</option>
                                                    </select>
                                                 </div>

                                                  <div class="hero-image-keyword col-xs-12 col-sm-6">
                                                      <input type="text" class="form-control" placeholder="Keyword" name="kata">
                                                  </div>

                                                  <div class=" col-xs-4 col-xs-offset-8 col-sm-2 col-sm-offset-0">
                                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                                                  </div>

                                              </div><!-- /.form-group -->

                                                <!-- <div class="hero-image-category form-group">
                                                    <select class="form-control" title="Category" id="category" name="kategory">
                                                        <option value="" selected="">Coffe</option>
                                                        <option value="">Dessert And Bake</option>
                                                        <option value="">dinner</option>
                                                        <option value="">lunch</option>
                                                        <option value="">Drink</option>
                                                    </select>
                                                </div> --><!-- /.form-group --><!--
                                                <input type="hidden" name="_method" value="POST">
                                                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>"> -->

                                                <!-- <div class="hero-image-price form-group">
                                                    <input type="text" class="form-control" placeholder="Min. Price" name="price" value="0">
                                                </div> --><!-- /.form-group -->

                                            </form>
                                        </div><!-- /.col-* -->
                                    </div><!-- /.row -->
                                </div><!-- /.container -->
                              </div>
                            </div><!-- /.hero-image-form-wrapper -->
                        </div><!-- /.hero-image-inner -->
                    </div><!-- /.hero-image -->
                </div>

<div class="container">
    <div class="block background-white fullwidth pt0 pb0">
        <div class="partners">

    <a href="#">
        <img src="<?php echo e(asset('')); ?>assets/img/coffee.png" alt="">
        Coffee
    </a>
    <a href="#">
        <img src="<?php echo e(asset('')); ?>assets/img/dessert &bakes.png" alt="">
        Dessert & Bakes
    </a>
    <a href="#">
        <img src="<?php echo e(asset('')); ?>assets/img/dinner.png" alt="">
        Dinner
    </a>
    <a href="#">
        <img src="<?php echo e(asset('')); ?>assets/img/lunch.png" alt="">
        Lunch
    </a>
    <a href="#">
        <img src="<?php echo e(asset('')); ?>assets/img/luxurydinning.png" alt="">
        Drink
    </a>
</div><!-- /.partners -->

    </div>

    <div class="page-header">
    <h1>A recommended  &amp; Cafe </h1>
    <p>List of most recent interesting places our directory submitted <br>by our users. Check whats going on in the cafe.</p>
</div><!-- /.page-header -->

<div class="cards-simple-wrapper">
    <div class="row">



            <?php $__currentLoopData = $cafes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cafe): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

            <div class="col-sm-6 col-md-3">
                <div class="card-simple" data-background-image="<?php echo e(asset('')); ?>assets/images/<?php echo e(isset($cafe->image) ? $cafe->image : 'kafe.jpg'); ?>">
                    <div class="card-simple-background">
                        <div class="card-simple-content">
                            <h2><a href="listing-detail.html"><span style="text-transform: capitalize;"><?php echo e($cafe->name); ?></span></a></h2>
                            <div class="card-simple-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div><!-- /.card-rating -->

                            <div class="card-simple-actions">
                                <a href="detail/<?php echo e($cafe->id); ?>" class="fa fa-search"></a>
                            </div><!-- /.card-simple-actions -->
                        </div><!-- /.card-simple-content -->

                        <div class="card-simple-label" alt="availabe seat"><?php echo e(isset($cafe->seat) ? $cafe->seat : 0); ?> People</div>

                    </div><!-- /.card-simple-background -->
                </div><!-- /.card-simple -->
            </div><!-- /.col-* -->

 <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

    </div><!-- /.row -->
</div><!-- /.cards-simple-wrapper -->
  
</div><!-- /.container -->

            </div><!-- /.content -->
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
                &copy; 2015 All rights reserved. Created by <a href="#">Aviators</a>.
            </div><!-- /.footer-bottom-left -->

            <div class="footer-bottom-right">
                <ul class="nav nav-pills">
                    <li><a href="index-2.html">Home</a></li>
                    <li><a href="pricing.html">Pricing</a></li>
                    <li><a href="terms-conditions.html">Terms &amp; Conditions</a></li>
                    <li><a href="contact-1.html">Contact</a></li>
                </ul><!-- /.nav -->
            </div><!-- /.footer-bottom-right -->
        </div><!-- /.container -->
    </div>
</footer><!-- /.footer -->

</div><!-- /.page-wrapper -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.intro', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>