<!doctype html>
<html lang="en">
<head>

 <title>   <?php  echo $course[0]->meta_title; ?> </title>
    
    <meta name="description" content="<?php  echo $course[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $course[0]->meta_keywords; ?>">
      <link rel="canonical" href="<?php  echo $course[0]->canonical; ?>">
      
    
<?php $this->load->view('front/layout/head'); ?>

  <style type="text/css">
    @media (min-width: 1200px){
       .container, .container-sm, .container-md, .container-lg, .container-xl {
          max-width: 1400px;
      }
    }
     
  </style>
</head>
<body id="top-header">
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->


<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-xl-8">
        <div class="title-block">
          <h1> <?php  echo $course[0]->title; ?></h1>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="<?php echo base_url() ?>">Home</a>
            </li>
             <li class="list-inline-item">/</li>
            <li class="list-inline-item">
             <a href="<?php echo base_url() ?><?php echo $course[0]->board_url;?>.html"><?php  echo $course[0]->board_name; ?></a>
            </li> 
            <li class="list-inline-item">/</li>
            <li class="list-inline-item">
             <?php  echo $course[0]->title; ?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="page-wrapper edutim-course-single edutim-course-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="course-sidebar">
                    <?php if(!empty( $course[0]->image)){ ?> 
                        <img src="<?php echo base_url('uploads/course/'). $course[0]->image; ?>" class="img-fluid  w-100" alt="<?php echo  $course[0]->img_tag ?>">
                    <?php }else{ ?>
                            <img src="<?php echo base_url('assets/front/'); ?>/images/course/course-1.jpg"  class="img-fluid  w-100" alt="<?php echo  $course[0]->img_tag ?>">
                      <?php   } ?>
                    <div class="course-widget course-details-info">
                        <ul>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="fa fa-money-bill"></i>Price :</span>
                                    <a href="#" class="d-inline-block">
                                        <h4 class="course-price">    
                                          <?php if($course[0]->special_price){ ?>
                                               <span class="price"> Rs. <?php echo $course[0]->special_price ?>/ <?php echo $course[0]->charges_type ?></span>  
                                               <span class="price"><del> Rs. <?php echo $course[0]->price ?>/ <?php echo $course[0]->charges_type ?></del></span>&nbsp;&nbsp;
                                              <?php } else{  ?>
                                               <span class="price">Rs.  <?php echo $course[0]->price ?>/ <?php echo $course[0]->charges_type ?></span>
                                             <?php } ?>
                                         </h4>
                                    </a>
                                </div>
                            </li>
                        
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="fa fa-university"></i>Standred :</span>
                                    <a href="#" class="d-inline-block"></a><a href="#"><?php  echo $course[0]->class; ?> </a>
                                </div>
                            </li>

                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="far fa-user"></i>Instructor :</span>
                                    <a href="<?php echo base_url('tutor-details/').$course[0]->tutor_refid ?>" class="d-inline-block"><?php  echo $course[0]->tutor_name; ?> </a>
                                </div>
                            </li>

                             <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="far fa-file-alt"></i>Lectures :</span>
                                   <?php echo $this->course_model->count_course_chapter_by_course_id($course[0]->id) ;  ?>
                                 
                                </div>
                            </li>
                       
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="far fa-calendar"></i>Updated :</span>
                                    <?php $course_chapter =  $this->course_model->last_course_chapter_by_course_id($course[0]->id) ; 
                                     echo date("d-M-y" , strtotime( $course_chapter['create_date'])) ?>
                                </div>
                            </li>
                        </ul>
                        <?php
                        $user_id = $this->session->userdata('USER_ID');
                        if(!empty($user_id)) { ?>
                        <!--    <div class="buy-btn">
                              <button class="button button-enroll-course btn btn-primary">
                                  Learn Now
                              </button>
                          </div>  
                          -->

                          <form method="post" action="<?php echo base_url('cart/add_to_cart_pageload');?>">
                             <input type="hidden" name="id" value="<?php echo $course[0]->id;?>">
                          
                           <div class="buy-btn">
                                <button type="submit" id="buybuttonsubmit"  class="button button-enroll-course btn btn-primary">
                                    Enroll Course 
                                </button>
                           </div>
                          </form>
                     
                         
                         <?php  }else{ ?>

                           <form method="post" action="<?php echo base_url('cart/add_to_cart_pageload');?>">
                             <input type="hidden" name="id" value="<?php echo $course[0]->id;?>">
                            
                           <div class="buy-btn">
                                <button type="submit" id="buybuttonsubmit"  class="button button-enroll-course btn btn-primary">
                                    Enroll Course 
                                </button>
                           </div>
                          </form>
                     
                        <?php }  ?>

                       
                    </div>
                </div>
            </div>
            <div class="col-lg-8">

                  <h4> <?php  echo $course[0]->title; ?></h4>
                  <h5><?php  echo $course[0]->board_name; ?> ,<?php  echo $course[0]->subject; ?>  </h5>
             
             
                <div class="tab-content edutim-course-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="single-course-details ">
                            <h4 class="course-title">Overview</h4>
   

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
                                                   <h5 class="section-title"> <?php echo $no; ?> - <?php echo $record->title; ?></h5>
                                                    <p class="section-desc"> <?php echo $record->description; ?></p>
                                              </div>
                                           </div>

                                          
                                       </li>
                                     <?php } ?>
                                     <?php } ?>
                                      </ul>
                                  </div>
                                </div>
      
                        </div>
                      </div>
                </div>
                 
                  </div>
                
            </div>


        </div>
    </div>
</section>

<!-- Related Course section start -->
<section class="section-padding related-course bg-grey">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="section-heading">
                    <h4>Related Courses You may Like</h4>
                </div>
            </div>
        </div>

           <div class="row course-gallery ">

                <?php if(count($course_board) > 0 ) { ?>
                  <?php foreach ($course_board as $key => $value) { ?>
                   <?php 
                      $data['record'] = $value;
                      $this->load->view('front/course/course-list' , $data); ?>
                  <?php } ?> 
                <?php } ?> 
      
     
        </div>
    </div>
</section>
<!-- Related Course section End -->

<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>
