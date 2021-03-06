<?php $__env->startSection('content'); ?>
	
	<div class="x_panel">
	  <div class="x_title">
	    <h2><i class="fa fa-bars"></i> Vertical Tabs <small>Float left</small></h2>
	    
	    <div class="clearfix"></div>
	  </div>
	  <div class="x_content">

	    <div class="col-xs-3">
	      <!-- required for floating -->
	      <!-- Nav tabs -->
	      <ul class="nav nav-tabs tabs-left">
	        <li class="active"><a href="#home" data-toggle="tab">Home</a>
	        </li>
	        <li><a href="#profile" data-toggle="tab">Profile</a>
	        </li>
	        <li><a href="#messages" data-toggle="tab">Messages</a>
	        </li>
	        <li><a href="#settings" data-toggle="tab">Settings</a>
	        </li>
	      </ul>
	    </div>

	    <div class="col-xs-9">
	      <!-- Tab panes -->
	      <div class="tab-content">
	        <div class="tab-pane active" id="home">
	          <p class="lead">Home tab</p>
	          <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
	            synth. Cosby sweater eu banh mi, qui irure terr.</p>
	        </div>
	        <div class="tab-pane" id="profile">Profile Tab.</div>
	        <div class="tab-pane" id="messages">Messages Tab.</div>
	        <div class="tab-pane" id="settings">Settings Tab.</div>
	      </div>
	    </div>

	    <div class="clearfix"></div>

	  </div>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.owner.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>