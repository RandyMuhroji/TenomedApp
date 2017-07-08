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
			                            <a href="#" data-toogle="lightbox"
			                            ><i class="fa fa-eye"></i></a>
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
      <div class="modal-body">
      	<form class="form-horizontal">
	        <div></div>
	        <div class="col-md-12 col-sm-12 col-xs-24">
	            <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Album Name ...">
	            <div id="error_add_album"></div>
	        </div>
	        <br/>
	    </form>
      </div>
      <div class="modal-footer">
      	<button type="button" id="submit" class="btn btn-success">Submit</button>
        <!-- <button type="button" class="btn btn-success" data-dismiss="modal">Close</button> -->
      </div>
    </div>

  </div>
</div>

<div id="view_images" class="modal">
  <span class="close cursor" onclick="closeImage()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
      <div class="numbertext">1 / 4</div>
        <img src="<?php echo e(asset('images/media.jpg')); ?>" style="width:100%;height:50%">
    </div>

    <div class="mySlides">
      <div class="numbertext">2 / 4</div>
        <img src="<?php echo e(asset('images/media.jpg')); ?>" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">3 / 4</div>
        <img src="<?php echo e(asset('images/media.jpg')); ?>" style="width:100%">
    </div>

    <div class="mySlides">
      <div class="numbertext">4 / 4</div>
        <img src="<?php echo e(asset('images/media.jpg')); ?>" style="width:100%">
    </div>

    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>

    <div class="column">
    	<div class="thumbnail">
      		<img class="demo" src="<?php echo e(asset('images/media.jpg')); ?>" onclick="currentSlide(1)" alt="Nature">
		</div>
    </div>

    <div class="column">
    	<div class="thumbnail">
      		<img class="demo" src="<?php echo e(asset('images/media.jpg')); ?>" onclick="currentSlide(2)" alt="Nature">
		</div>
	</div>
    <div class="column">
      	<div class="thumbnail">
      		<img class="demo" src="<?php echo e(asset('images/media.jpg')); ?>" onclick="currentSlide(3)" alt="Nature">
		</div>
	</div>

    <div class="column">
      	<div class="thumbnail">
      		<img class="demo" src="<?php echo e(asset('images/media.jpg')); ?>" onclick="currentSlide(4)" alt="Nature">
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

	<script type="text/javascript">
		$("button#submit").click(function(){
		   	$.ajax({
    		   	type: "POST",
				url: "<?php echo e(route('users.store')); ?>",
				data: $('form.contact').serialize(),
	        		success: function(msg){
	 	          		$("#thanks").html(msg)
	 		        	$("#form-content").modal('hide');	
	 		        },
				error: function(){
					alert("failure");
					}
	      		});
		});
	</script>
	<script>
	function viewImage() {
	  document.getElementById('view_images').style.display = "block";
	}

	function closeImage() {
	  document.getElementById('view_images').style.display = "none";
	}

	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("demo");
	  var captionText = document.getElementById("caption");
	  if (n > slides.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
	    slides[i].style.display = "none";
	  }
	  for (i = 0; i < dots.length; i++) {
	    dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";
	  dots[slideIndex-1].className += " active";
	  captionText.innerHTML = dots[slideIndex-1].alt;
	}
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('gantella/build/css/me.css')); ?>">

	<style type="text/css">
		.row > .column {
		  padding: 0 8px;
		}

		.row:after {
		  content: "";
		  display: table;
		  clear: both;
		}

		.column {
		  float: left;
		  width: 25%;
		}

		/* The Modal (background) */
		.modal {
		  display: none;
		  position: fixed;
		  z-index: 1;
		  padding-top: 100px;
		  left: 0;
		  top: 0;
		  width: 100%;
		  height: 100%;
		  overflow: auto;
		  background-color: black;
		}

		/* Modal Content */
		.modal-content {
		  position: relative;
		  background-color: #fefefe;
		  margin: auto;
		  padding: 0;
		  width: 90%;
		  max-width: 1200px;
		}

		/* The Close Button */
		.close {
		  color: white;
		  position: absolute;
		  top: 10px;
		  right: 25px;
		  font-size: 35px;
		  font-weight: bold;
		}

		.close:hover,
		.close:focus {
		  color: #999;
		  text-decoration: none;
		  cursor: pointer;
		}

		.mySlides {
		  display: none;
		}

		/* Next & previous buttons */
		.prev,
		.next {
		  cursor: pointer;
		  position: absolute;
		  top: 50%;
		  width: auto;
		  padding: 16px;
		  margin-top: -50px;
		  color: white;
		  font-weight: bold;
		  font-size: 20px;
		  transition: 0.6s ease;
		  border-radius: 0 3px 3px 0;
		  user-select: none;
		  -webkit-user-select: none;
		}

		/* Position the "next button" to the right */
		.next {
		  right: 0;
		  border-radius: 3px 0 0 3px;
		}

		/* On hover, add a black background color with a little bit see-through */
		.prev:hover,
		.next:hover {
		  background-color: rgba(0, 0, 0, 0.8);
		}

		/* Number text (1/3 etc) */
		.numbertext {
		  color: #f2f2f2;
		  font-size: 12px;
		  padding: 8px 12px;
		  position: absolute;
		  top: 0;
		}

		.caption-container {
		  text-align: center;
		  background-color: black;
		  padding: 2px 16px;
		  color: white;
		}

		img.demo {
		  opacity: 0.6;
		}

		.active,
		.demo:hover {
		  opacity: 1;
		}

		img.hover-shadow {
		  transition: 0.3s
		}

		.hover-shadow:hover {
		  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)
		}
	</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.owner.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>