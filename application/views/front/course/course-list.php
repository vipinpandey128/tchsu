<div class="course-item  col-lg-4 col-md-6">
 <?php $url =  base_url($record->board_url.'/'.$record->url_slug.'.html'); ?>
    <div class="course-block">
        <div class="course-img">
            <a href="<?php echo $url ?>">
            <?php if(!empty($record->image)){ ?> 

                <img src="<?php echo base_url('uploads/course/').$record->image; ?>" class="img-fluid" alt="<?php echo $record->img_tag ?>">

            <?php }else{ ?>

                 <img src="<?php echo base_url('assets/front/'); ?>/images/course/course-1.jpg"  class="img-fluid" alt="<?php echo $record->img_tag ?>">

           <?php   } ?>

            <?php if($record->special_price){ ?>
                          <div class="course-price "> Rs. <?php echo $record->special_price ?>/<?php echo $record->charges_type ?> </div>
            <?php } else{  ?>
                            <div class="course-price ">Rs.  <?php echo $record->price ?>/<?php echo $record->charges_type ?> </div>
            <?php } ?>

           </a>
        </div>
        
        <div class="course-content">
           <span class="course-cat"><?php echo $record->board_name ?></span>
            <h4><a href="<?php echo $url ?>"><?php echo $record->title ?> </a></h4>    
            <p class="mb-3"><?php echo $record->subject ?>  </p>
        
            <hr>

                <div class="course-meta">
                    <?php if($record->special_price){ ?>
                          <span class="course-student"> Rs. <?php echo $record->special_price ?></span>/<?php echo $record->charges_type ?>

                         <span class="course-student"><del> Rs. <?php echo $record->price ?></del>/<?php echo $record->charges_type ?>
                     </span>&nbsp;&nbsp;
                    <?php } else{  ?>
                             <span class="course-student">Rs.  <?php echo $record->price ?>/<?php echo $record->charges_type ?>
                         </span>
                    <?php } ?>
                     <span class="course-duration"><i class="far fa-file-alt"></i><?php echo $this->course_model->count_course_chapter_by_course_id($record->id) ;  ?> Lessons</span>
                    
                          
                 </div>


            </div>
            

        </div>
    </div>
