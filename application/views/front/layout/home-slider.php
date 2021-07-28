<header class="masthead">
		<div class="owl-carousel owl-home-slider">
        <?php $y=0; foreach($SLIDERDATA as $slider): ?>
			<div class="item" style="background-image:url(<?php echo base_url('assets/front/images/banner.jpg') ?>);" >
			<div class="slider-content">
			<div class="container">
			  <div class="row">
				<div class="col-md-6">
					<?php echo $slider->description;?>
					
				   <a href="<?php echo $slider->button_link;?>" class="btn btn-default"><?php echo $slider->button_title;?> <i class="fa fa-long-arrow-right"></i></a> 
				</div>
				
				<div class="col-md-6">
					<img src="<?php echo base_url('uploads/slider/')?><?php echo $slider->image;?>">
				</div>
				</div>
			  </div>
			</div>
			</div>
            	<?php  $y++; endforeach; ?> 
		</div>
    </header>