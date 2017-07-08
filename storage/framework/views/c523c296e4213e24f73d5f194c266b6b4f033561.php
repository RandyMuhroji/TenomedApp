<?php $__env->startSection('content'); ?>



<div class="">
    <div class="clearfix"></div>
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">	
    		<div class="x_panel">
    			<div class="x_title">
                    <h2>Media Gallery <a data-toggle="modal" data-target="#add_album" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New Album</a></h2>
                    <div class="clearfix"></div>
                </div>

                <?php for($i=0;$i<3;$i++): ?>
                	<div class="row">
			          <div class="col-md-12">
			            <div class="x_panel">
			              <div class="x_title">
			                <h2>Media Gallery <small> gallery design </small></h2>
			                <ul class="nav navbar-right panel_toolbox">
			                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			                  </li>
			                  <li class="dropdown">
			                    <a onclick="setModalID('<?php echo e($i); ?>')" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i></a>
			                  </li>
			                  <li><a class="close-link"><i class="fa fa-close"></i></a>
			                  </li>
			                </ul>
			                <div class="clearfix"></div>
			              </div>
			              <div class="x_content">

			                <div class="row">

			                  <p>Media gallery design emelents</p>

			                  <?php for($j = 0; $j<10;$j++): ?>
			                  <div class="col-md-55">
			                    <div class="thumbnail">
			                      <div class="image view view-first">
			                        <img style="width: 100%; display: block;" src="<?php echo e(asset('images/media.jpg')); ?>" alt="image" />
			                        <div class="mask">
			                          <p>Your Text</p>
			                          <div class="tools tools-bottom">
			                            <a href="#"><i class="fa fa-eye"></i></a>
			                            <a href="#"><i class="fa fa-pencil"></i></a>
			                            <a href="#"><i class="fa fa-times"></i></a>
			                          </div>
			                        </div>
			                      </div>
			                      <div class="caption">
			                        <p>Snow and Ice Incoming for the South</p>
			                      </div>
			                    </div>
			                  </div>
			                  <?php endfor; ?>
			                </div>
			              </div>
			            </div>
			          </div>
		        	</div>
                <?php endfor; ?>
    		</div>
      	</div>
    </div>
</div>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p id="value">Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="add_album" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Album</h4>
      </div>
      <form method="post" action="<?php echo e(route('galery_album')); ?>" data-parsley-validate class="form-horizontal form-label-left">
      		<div class="modal-body">
      		 <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"> 
      		<?php if(Session::has('album_name')): ?>
                <div class="form-group<?php echo e(' has-error'); ?>">
            <?php else: ?>
            	<div class="form-group<?php echo e(' '); ?>">
            <?php endif; ?>
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Album Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" id="album_name" name="album_name">
                    <?php if(Session::has('album_name')): ?>
                    <span class="help-block"><?php echo Session::get('album_name'); ?></span>
                    <?php endif; ?>
                </div>
            </div>
      </div>
      <div class="modal-footer">
      		<button type="submit" class="btn btn-success">Save Change</button>
            <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
	<script type="text/javascript">
		var setModalID = function(val){
			$("#value").text(val);
		};
	</script>

	<?php if(Session::has('album_name')): ?>
        <script type="text/javascript">
           $('#add_album').modal('show');
        </script>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('gantella/build/css/me.css')); ?>">
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.owner.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>