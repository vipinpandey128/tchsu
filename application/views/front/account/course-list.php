<div class="course-item   col-md-6">

 <?php $url =  base_url($record[0]->board_url.'/'.$record[0]->url_slug.'.html'); ?>
    <div class="course-block">
        <div class="course-content">
            <div class="row mb-3">
                <div class="col-8"><span class="course-cat"><?php echo $record[0]->board_name ?></span></div>
                <div class="col-4"><span class="course-cat  <?php echo ($record1->course_status  == 'Active')? ' course-status' : 'course-status-inactive'  ?> pull-right"> <?php echo $record1->course_status ?> </span></div>
            </div>
           
           
            <h4><a href="<?php echo $url ?>"><?php echo $record[0]->title ?> </a></h4>    
            <p ><?php echo $record[0]->subject ?>  </p>
            <ul style="font-size: 12px">
                <li><b>Cousre Validate </b> &nbsp;  &nbsp; <?php echo date('d-M-Y ' ,strtotime($record1->course_start_date)) ?> &nbsp;&nbsp; To &nbsp;&nbsp; <?php echo date('d-M-Y' ,strtotime($record1->course_expiry_date)) ?> </li>
               
            </ul>
            <hr>



            <div class="course-meta">

                <?php if($record1->course_status == 'Active') { ?>
              
                 <span class="course-duration"><i class="far fa-file-alt"></i><?php echo $this->course_model->count_course_chapter_by_course_id($record[0]->course_id) ;  ?> &nbsp; &nbsp; <a href="<?php echo base_url('user/chapter/').$record[0]->url_slug ?>"> View Lessons </a> </span>  
                 <?php } else { ?>

                    <span class="course-duration"><i class="far fa-file-alt"></i><?php echo $this->course_model->count_course_chapter_by_course_id($record[0]->course_id) ;  ?> &nbsp; &nbsp;</span>
                <?php } ?>

             </div>
            </div>
        </div>
    </div>
