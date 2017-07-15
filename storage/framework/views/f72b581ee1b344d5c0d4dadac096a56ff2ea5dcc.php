<?php $__env->startSection('content'); ?>
	<div class=""></div>
	<div class="x_content">
  	<div class="bs-example" data-example-id="simple-jumbotron">
  		<?php if($status == 0): ?>
  		<div class="col-md-3"></div>
	    <div class="jumbotron col-md-6">
	      <h1>Hello, world!</h1>
	      <p>Please Complete information your cafe. to active this cafe <a href="/manage-cafe/settings/cafe" class="btn btn-primary sm">Clik here</a>
	      </p>
	    </div>
	    <?php endif; ?>
  	</div>    
  </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.owner.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>