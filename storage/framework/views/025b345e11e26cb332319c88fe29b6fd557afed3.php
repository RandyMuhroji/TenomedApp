<?php $__env->startSection('content'); ?>
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo app('translator')->get('users.users'); ?> <a href="<?php echo e(route('users.create')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> <?php echo app('translator')->get('general.app.create_new'); ?> </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="20%"><?php echo app('translator')->get('users.name'); ?></th>
                                <th width="25%"><?php echo app('translator')->get('users.email'); ?></th>
                                <th width="15%"><?php echo app('translator')->get('users.roles'); ?></th>
                                <th width="15%">Status</th>
                                <th width="10%"><?php echo app('translator')->get('users.action'); ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?php echo app('translator')->get('users.name'); ?></th>
                                <th><?php echo app('translator')->get('users.email'); ?></th>
                                <th><?php echo app('translator')->get('users.roles'); ?></th>
                                <th>Status</th>
                                <th><?php echo app('translator')->get('users.action'); ?></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if(count($users)): ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($row->name); ?></td>
                                <td><?php echo e($row->email); ?></td>
                                <td>
                                <?php $__currentLoopData = $row->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <button title="<?php echo e($r->description); ?>" type="button" class="btn btn-success btn-xs"><?php echo e($r->display_name); ?></button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </td>
                                <td>
                                <?php if($row->status == 0): ?>
                                     <button title="<?php echo e($r->description); ?>" type="button" class="btn btn-warning btn-xs">Pending</button>
                                <?php elseif($row->status == 1): ?>
                                     <button title="<?php echo e($r->description); ?>" type="button" class="btn btn-primary btn-xs">Actived</button>
                                <?php else: ?> 
                                     <button title="<?php echo e($r->description); ?>" type="button" class="btn btn-warning btn-xs">Actived</button>
                                <?php endif; ?>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-eye" title="View"></i> </a>
                                    <a href="<?php echo e(route('users.edit', ['id' => $row->id])); ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="<?php echo e(route('users.show', ['id' => $row->id])); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.admin.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>