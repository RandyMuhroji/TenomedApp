<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tenomed User Register</title>
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('tenomed/images/favicon.png')); ?>"/>

   <!-- Bootstrap -->
    <link href="<?php echo e(asset('gantella/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(asset('gantella/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(asset('gantella/vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo e(asset('gantella/vendors/animate.css/animate.min.css')); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('gantella/build/css/custom.min.css')); ?>" rel="stylesheet">
</head>

<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form role="form" method="post" action="<?php echo e(route('register')); ?>">
                        <h1>Register</h1>
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <?php if($errors->has('name')): ?>
                            <span class="help-block"><strong><?php echo e($errors->first('name')); ?></strong></span>
                            <?php endif; ?>
                            <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo app('translator')->get('users.name'); ?>" value="<?php echo e(Request::old('name') ?: ''); ?>" required autofocus />
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <?php if($errors->has('email')): ?>
                            <span class="help-block"><strong><?php echo e($errors->first('email')); ?></strong></span>
                            <?php endif; ?>
                            <input type="text" class="form-control" id="email" name="email" placeholder="<?php echo app('translator')->get('users.email'); ?>" value="<?php echo e(Request::old('email') ?: ''); ?>" required/>
                        </div>
                        
                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <?php if($errors->has('password')): ?>
                            <span class="help-block"><strong><?php echo e($errors->first('password')); ?></strong></span>
                            <?php endif; ?>
                            <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo app('translator')->get('users.password'); ?>" required/>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <?php if($errors->has('password_confirmation')): ?>
                            <span class="help-block"><strong><?php echo e($errors->first('password_confirmation')); ?></strong></span>
                            <?php endif; ?>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="<?php echo app('translator')->get('users.confirm_password'); ?>" required/>
                        </div>
                        <div>
                            <input type="hidden" name="role_id" value="3">
                            <button type="submit" class="btn btn-default submit">Register</button>
                            <a class="reset_pass" href="<?php echo e(route('login')); ?>"><?php echo app('translator')->get('general.login.login'); ?></a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Tenomed</h1>
                                <p>©2017 All Rights Reserved.</a></p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
