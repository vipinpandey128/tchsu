
<?php $course_images = $this->course_model->select_course_images($RESULT[0]->id); ?>
<?php $course_one_image = $this->course_model->select_course_images_by_id($RESULT[0]->id);?>
<?php if(count($course_images)>0){?>
	 
    <div class="row">
        <div class="col-2 p-0">
            <div class="slider-nav">
            	<?php $j = 0; foreach($course_images as $images){  ?>
                <div><img src="<?php echo base_url('uploads/course/'.$images->thumb_image); ?>" alt="<?php echo $images->img_tag; ?>" class="img-fluid blur-up lazyload"></div>
              		   <?php $j++; } ?>
            </div>
        </div>
        <div class="col-10">
             <div class="course-slick">
	  	   <?php $j = 0; foreach($course_images as $images){  ?>
        		<div>
        			<center>
        				<img src="<?php echo base_url('uploads/course/'.$images->image); ?>" alt="<?php echo $images->img_tag; ?>" class="img-fluid course-img-height blur-up lazyload image_zoom_cls-<?php echo $j ?>" >
        			</center>
        		</div>
       	   <?php $j++; } ?>
    </div>
        </div>
    </div>

<?php }else{ ?>
 <div class="row">
      <div class="col-10">
<img src="<?php echo base_url('assets/front/images/course-no-image.jpg'); ?>" style="width:100%" >
      </div>
    </div>
<?php } ?>