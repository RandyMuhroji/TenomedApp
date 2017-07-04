<?php $__env->startSection('content'); ?>
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo app('translator')->get('customers.customers'); ?> <a href="<?php echo e(route('customers.create')); ?>" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> <?php echo app('translator')->get('general.app.create_new'); ?> </a></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('customers.first_name'); ?></th>
                                <th><?php echo app('translator')->get('customers.last_name'); ?></th>
                                <th><?php echo app('translator')->get('customers.email'); ?></th>
                                <th><?php echo app('translator')->get('customers.postal_address'); ?></th>
                                <th><?php echo app('translator')->get('customers.physical_address'); ?></th>
                                <?php if (\Entrust::ability('','edit,delete')) : ?>
                                <th><?php echo app('translator')->get('customers.action'); ?></th>
                                <?php endif; // Entrust::ability ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?php echo app('translator')->get('customers.first_name'); ?></th>
                                <th><?php echo app('translator')->get('customers.last_name'); ?></th>
                                <th><?php echo app('translator')->get('customers.email'); ?></th>
                                <th><?php echo app('translator')->get('customers.postal_address'); ?></th>
                                <th><?php echo app('translator')->get('customers.physical_address'); ?></th>
                                <?php if (\Entrust::ability('','edit,delete')) : ?>
                                <th><?php echo app('translator')->get('customers.action'); ?></th>
                                <?php endif; // Entrust::ability ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if(count($customers)): ?>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($row->first_name); ?></td>
                                <td><?php echo e($row->last_name); ?></td>
                                <td><?php echo e($row->email); ?></td>
                                <td><?php echo e($row->postal_address); ?></td>
                                <td><?php echo e($row->physical_address); ?></td>
                                <td>
                                    <a href="<?php echo e(route('customers.edit', ['id' => $row->id])); ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil" title="Edit"></i> </a>
                                    <a href="<?php echo e(route('customers.show', ['id' => $row->id])); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o" title="Delete"></i> </a>
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