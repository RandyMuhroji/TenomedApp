<?php $__env->startSection('content'); ?>
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo app('translator')->get('users.edit_user'); ?> <a href="<?php echo e(route('users.index')); ?>" class="btn btn-info btn-xs"><i class="fa fa-chevron-left"></i> <?php echo app('translator')->get('general.nav.back'); ?> </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form method="post" action="<?php echo e(route('users.update', ['id' => $user->id])); ?>" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"><?php echo app('translator')->get('users.name'); ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?php echo e($user->name); ?>" id="name" name="name" class="form-control col-md-7 col-xs-12">
                                <?php if($errors->has('name')): ?>
                                <span class="help-block"><?php echo e($errors->first('name')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><?php echo app('translator')->get('users.email'); ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" value="<?php echo e($user->email); ?>" id="email" name="email" class="form-control col-md-7 col-xs-12">
                                <?php if($errors->has('email')): ?>
                                <span class="help-block"><?php echo e($errors->first('email')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('role_id') ? ' has-error' : ''); ?>">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="brand_id"><?php echo app('translator')->get('users.roles'); ?> <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="role_id" name="role_id">
                                    <?php if(count($roles)): ?>
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>" <?php echo e($row->id == $user->roles[0]->id ? 'selected="selected"' : ''); ?>><?php echo e($row->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <?php if($errors->has('role_id')): ?>
                                <span class="help-block"><?php echo e($errors->first('role_id')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" name="_token" value="<?php echo e(Session::token()); ?>">
                                <input name="_method" type="hidden" value="PUT">
                                <button type="submit" class="btn btn-success"><?php echo app('translator')->get('general.form.save_changes'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>