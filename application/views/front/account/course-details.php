<!doctype html>
<html>
<head>
    <?php $cms_page = $this->cms_model->get_cms_by_id(24);?>
    <title>   <?php  echo $cms_page[0]->meta_title; ?> </title>
    <meta name="description" content="<?php  echo $cms_page[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $cms_page[0]->meta_keyword; ?>">
    <?php $this->load->view('front/layout/head'); ?>
</head>
<body id="top-header">
<?php $this->load->view('front/layout/header'); ?>
<main class="site-main page-wrapper woocommerce single single-course">
    <section class="">
        <div class="container">
            <div class="row">
              <div class="col-lg-3">
                <?php $this->load->view('front/account/left-menu'); ?>
              </div>
              <div class="col-lg-9">
                  <div class="dashboard-right">
                      <div class="dashboard">
                         <div class="row">
         
            <div class="col-lg-12">
              <div class="row">
                <div class="col-sm-10"> 
                   <h4> <?php  echo $course[0]->title; ?></h4>
                    <h5><?php  echo $course[0]->board_name; ?> ,<?php  echo $course[0]->subject; ?>  </h5>
                </div>
                <div class="col-sm-2">     
                  <?php $course_chapter =  $this->course_model->last_course_chapter_by_course_id($course[0]->id) ; 
                               echo date("d-M-y" , strtotime( $course_chapter['create_date'])) ?>
                                 
                </div>
              </div>
                <div class="tab-content edutim-course-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="single-course-details ">
                            <h4 class="course-title">Overview</h4>
                            <p>Standred : <?php  echo $course[0]->class; ?><br> 
                              Instructor :  <a href="<?php echo base_url('tutor-details/').$course[0]->tutor_refid ?>" class="d-inline-block"><?php  echo $course[0]->tutor_name; ?> </a>

                            </p>
   

                              <?php  echo $course[0]->description; ?> 
      
                        </div>
                      </div>
                </div>
                <hr>
                 <div class="tab-content edutim-course-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="single-course-details ">
                            <h4 class="course-title">Course Chapter</h4>
                              <div class="edutim-course-curriculum " >
                                  <div class="curriculum-scrollable">
                                     <ul class="curriculum-sections">
                                      <?php
                                      $course_chapter = $this->course_model->get_all_course_chapter_by_course_id($course[0]->id);?>
                                     <?php if(count($course_chapter)>0){ ?>
                                       <?php $no=0; foreach($course_chapter as $record){ $no++; ?>
                                         <li class="section">
                                            <div class="section-header">
                                             <div class="section-left">
                                              <div class="row">
                                                <div class="col-sm-10">
                                                  <h5 class="section-title"> <?php echo $no; ?> - <?php echo $record->title; ?></h5></div>
                                                <div class="col-sm-2">
                                                  <a href="<?php echo base_url('user/chapter_details/').$record->unique_id ?>" class="btn btn-sm btn-main">Expolre </a>
                                                </div>
                                              </div>
                                                 
                                                    <p class="section-desc"> <?php echo $record->description; ?></p>
                                              </div>
                                           </div>
                                           <hr>
                                       </li>
                                     <?php } ?>
                                     <?php } ?>
                                      </ul>
                                  </div>
                                </div>
      
                        </div>
                      </div>
                </div>

                <br>
                <br>
                <br>
                 
                  </div>
                
            </div>


        </div>  
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>