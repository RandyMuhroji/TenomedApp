<?php $__env->startSection('content'); ?>
<div class="">

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo app('translator')->get('orders.orders'); ?></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th><?php echo app('translator')->get('orders.order_number'); ?></th>
                                <th><?php echo app('translator')->get('orders.date'); ?></th>
                                <th><?php echo app('translator')->get('orders.customer'); ?></th>
                                <th><?php echo app('translator')->get('orders.total_amount'); ?></th>
                                <th><?php echo app('translator')->get('orders.status'); ?></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th><?php echo app('translator')->get('orders.order_number'); ?></th>
                                <th><?php echo app('translator')->get('orders.date'); ?></th>
                                <th><?php echo app('translator')->get('orders.customer'); ?></th>
                                <th><?php echo app('translator')->get('orders.total_amount'); ?></th>
                                <th><?php echo app('translator')->get('orders.status'); ?></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php if(count($orders)): ?>
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($row->order_number); ?></td>
                                <td><?php echo e($row->transaction_date); ?></td>
                                <td><?php echo e($row->customer->getFullName()); ?></td>
                                <td><?php echo e($row->total_amount); ?></td>
                                <td><?php echo e($row->status); ?></td>
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