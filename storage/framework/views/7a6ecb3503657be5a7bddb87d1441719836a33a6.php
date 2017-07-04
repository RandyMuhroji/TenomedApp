<?php $__env->startSection('content'); ?>
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Cafes <a href="<?php echo e(route('cafes.create')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> <?php echo app('translator')->get('general.app.create_new'); ?> </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Cafe Name</th>
                                <th>Owner</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th><?php echo app('translator')->get('users.action'); ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Cafe Name</th>
                                <th>Owner</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th><?php echo app('translator')->get('users.action'); ?></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if(count($cafes)): ?>
                            <?php $__currentLoopData = $cafes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($row->name); ?></td>
                                <td><?php echo e($row->owner); ?></td>
                                <td><?php echo e($row->address); ?></td>
                                <td>
                                    <?php if($row->status == 1): ?>
                                        <button type="button" class="btn btn-primary btn-xs">Activated</button>
                                    <?php else: ?>
                                         <button  type="button" class="btn btn-warning btn-xs">Suspended</button>
                                    <?php endif; ?>
                                </td>
                                <td>
                                	<a href="#" class="btn btn-info btn-xs" target="_blank"><i class="fa fa-eye" title="View"></i> </a>
                                    <a href="<?php echo e(route('cafes.edit', ['id' => $row->id])); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit" title="Edit"></i> </a>
                                    <a href="<?php echo e(route('cafes.show', ['id' => $row->id])); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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