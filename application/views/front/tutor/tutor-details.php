<!doctype html>
<html lang="en">
<head>

 <title>   <?php  echo $tutor[0]->meta_title; ?> </title>
    
    <meta name="description" content="<?php  echo $tutor[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $tutor[0]->meta_keywords; ?>">

      
    
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
          <h1> <?php  echo $tutor[0]->name; ?></h1>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="<?php echo base_url() ?>">Home</a>
            </li>

             <li class="list-inline-item">/</li>
             <li class="list-inline-item">
              <a href="">Tutor</a>
            </li>
            <li class="list-inline-item">/</li>
            <li class="list-inline-item">
             <?php  echo $tutor[0]->name; ?>
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
                <!-- Course Sidebar start -->
                <div class="course-sidebar">
                  <center>
                       <?php if(!empty( $tutor[0]->profile_pic)){ ?> 

                        <img src="<?php echo base_url('uploads/tutor/'). $tutor[0]->profile_pic; ?>"  alt="<?php echo  $tutor[0]->name ?>" style="height: 200px">

                    <?php }else{ ?>

                            <img src="<?php echo base_url('assets/front/'); ?>/images/course/course-1.jpg"   alt="<?php echo  $tutor[0]->name ?>" style="height: 200px">

                      <?php   } ?>

                  </center>
                 

                    <div class="course-widget course-details-info">
                        <ul>
                          
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="fa fa-university"></i>experience :</span>
                                    <a href="#" class="d-inline-block"></a><a href="#"><?php  echo $tutor[0]->experience; ?> </a>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="fa fa-user"></i>Gender :</span>
                                    <a href="#" class="d-inline-block"></a><a href="#"><?php  echo $tutor[0]->gender; ?> </a>
                                </div>
                            </li>

                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="fa fa-calendar-alt"></i>Age :</span>
                                    <a href="#" class="d-inline-block"></a><a href="#"><?php  echo $tutor[0]->age; ?> </a>
                                </div>
                            </li>

                            <li>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span><i class="far fa-map"></i>City :</span>
                                    <a href="#" class="d-inline-block"></a><a href="#"><?php  echo $tutor[0]->city; ?> </a>
                                </div>
                            </li>

                        </ul>
                     
                    </div>


                </div>
            </div>
            <div class="col-lg-8">
                  <h4> <?php  echo $tutor[0]->name; ?></h4>
                  <nav class="course-single-tabs learn-press-nav-tabs">
                    <div class="nav nav-tabs  course-nav" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
                      <a class="nav-item nav-link" id="nav-topics-tab" data-toggle="tab" href="#Specialization" role="tab" aria-controls="nav-profile" aria-selected="false">Specialization</a>
                      <a class="nav-item nav-link" id="nav-topics-tab" data-toggle="tab" href="#nav-topics" role="tab" aria-controls="nav-profile" aria-selected="false">Qualification</a>
                  
                    </div>
                </nav>
                <div class="tab-content edutim-course-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="single-course-details ">
                        <h4 class="course-title">Overview</h4>
                       <?php  echo $tutor[0]->details; ?> 
                    </div>
                    </div>

                    <div class="tab-pane fade" id="nav-topics" role="tabpanel" aria-labelledby="nav-topics-tab">
                       <div class="single-course-details ">
                        <h4 class="course-title">Qualification</h4>
                       <?php  echo $tutor[0]->qualification; ?>
                    </div>  
                    </div>  
                    <div class="tab-pane fade" id="Specialization" role="tabpanel" aria-labelledby="nav-topics-tab">
                       <div class="single-course-details ">
                        <h4 class="course-title">Specialization</h4>
                       <?php  echo $tutor[0]->specialization; ?>
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
