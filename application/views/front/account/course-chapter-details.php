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
<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-xl-8">
        <div class="title-block">
          <h1><?php  echo $course[0]->chapter_title; ?></h1>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="#">Home</a>
            </li>
            <li class="list-inline-item">/</li> 
            <li class="list-inline-item">
              <a href="#"><?php  echo $course[0]->title; ?></a>
            </li>
             <li class="list-inline-item">/</li>
            <li class="list-inline-item">
               <?php  echo $course[0]->chapter_title; ?>
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
            <div class="col-lg-8">
                <nav class="course-single-tabs learn-press-nav-tabs">
                    <div class="nav nav-tabs  course-nav" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Overview</a>
                      <a class="nav-item nav-link" id="nav-topics-tab" data-toggle="tab" href="#nav-video" role="tab" aria-controls="nav-profile" aria-selected="false">Video</a>
                      <a class="nav-item nav-link" id="nav-topics-tab" data-toggle="tab" href="#nav-documents" role="tab" aria-controls="nav-profile" aria-selected="false">Documents</a>
                      <a class="nav-item nav-link" id="nav-topics-tab" data-toggle="tab" href="#nav-image" role="tab" aria-controls="nav-profile" aria-selected="false">Image</a>
                  
                      <a class="nav-item nav-link" id="nav-feedback-tab" data-toggle="tab" href="#nav-feedback" role="tab" aria-controls="nav-contact" aria-selected="false">Reviews</a>
                    </div>
                </nav>
                  <div class="tab-content edutim-course-content" id="nav-tabContent">
                    <div class="tab-pane  active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="single-course-details ">
                            <h4 class="course-title">Overview</h4>
                            
                              <?php  echo $course[0]->chapter_description; ?> 

                           
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-video" role="tabpanel" aria-labelledby="nav-topics-tab">
                        <div class="edutim-course-curriculum ">
                          <div class="curriculum-scrollable">
                                
                              <ul class="curriculum-sections">

                                <?php
                           
                                 $course_chapter_session = $this->course_model->get_all_course_chapter_session_by_chapter_id($course[0]->chapter_id , 'Video');?>
                                  <?php if(count($course_chapter_session)>0){ ?>
                                  <?php $no=0; foreach($course_chapter_session as $record){ $no++; ?>


                                  <li class="section">
                                    <div class="section-header">
                                        <div class="section-left ">
                                          <div class="row">
                                            <div class="col-lg-8"><h5 class="section-title "><?php echo ucwords($record->title)  ?></h5></div>
                                            <div class="col-lg-4"> <a  class="btn btn-sm btn-main" href="<?php echo $record->link ?>" target="_blank">
                                              Video
                                             
                                            </a></div>
                                          </div>
                                        </div>
                                    </div>

                                    <ul class="section-content">
                                      <p class="section-desc"><?php echo $record->description ?></p>
                                  
                                    </ul>
                                </li>

                                   <?php } ?>
                                     <?php } ?>


                              </ul>
                           </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-documents" role="tabpanel" aria-labelledby="nav-topics-tab">
                        <div class="edutim-course-curriculum ">
                          <div class="curriculum-scrollable">
                                
                              <ul class="curriculum-sections">

                               <?php
                           
                                      $course_chapter_session = $this->course_model->get_all_course_chapter_session_by_chapter_id($course[0]->chapter_id , 'Documents');?>

                                     <?php if(count($course_chapter_session)>0){ ?>
                                       <?php $no=0; foreach($course_chapter_session as $record){ $no++; ?>


                                  <li class="section">
                                    <div class="section-header">
                                        <div class="section-left ">
                                          <div class="row">
                                            <div class="col-lg-8"><h5 class="section-title "><?php echo ucwords($record->title)  ?></h5></div>
                                            <div class="col-lg-4">
                                                  <?php if(!empty($record->file)){ ?>
                                                   <a href="<?php echo base_url('uploads/course/documents/').$record->file; ?>" 
                                                    class="btn btn-sm btn-main"  target="_blank"> File </a>
                                                   <?php } ?>
                                            </div>
                                          </div>
                                        </div>
                                    </div>

                                    <ul class="section-content">
                                      <p class="section-desc"><?php echo $record->description ?></p>
                                  
                                    </ul>
                                </li>

                                   <?php } ?>
                                     <?php } ?>

                              </ul>
                           </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-image" role="tabpanel" aria-labelledby="nav-topics-tab">
                        <div class="edutim-course-curriculum ">
                          <div class="curriculum-scrollable">
                                
                              <ul class="curriculum-sections">

                              <?php
                           
                                      $course_chapter_session = $this->course_model->get_all_course_chapter_session_by_chapter_id($course[0]->chapter_id , 'Image');?>
                                     <?php if(count($course_chapter_session)>0){ ?>
                                       <?php $no=0; foreach($course_chapter_session as $record){ $no++; ?>


                                  <li class="section">
                                    <div class="section-header">
                                        <div class="section-left ">
                                          <div class="row">
                                            <div class="col-lg-8"><h5 class="section-title "><?php echo ucwords($record->title)  ?></h5></div>
                                           
                                          </div>
                                        </div>
                                    </div>

                                    <ul class="section-content">
                                      <p class="section-desc"><?php echo $record->description ?></p>

                                        <?php if(!empty($record->file)){ ?> 
                                          <img src="<?php echo base_url('uploads/course/image/').$record->file; ?>" width="50%">
                                        <?php } ?>
                                  
                                    </ul>
                                </li>

                                   <?php } ?>
                                     <?php } ?>


                              </ul>
                           </div>
                        </div>
                    </div>
                 
                    <div class="tab-pane fade" id="nav-feedback" role="tabpanel" aria-labelledby="nav-feedback-tab">
                        <div id="course-reviews">
                        <h3 class="course-review-head">Reviews</h3>
                        
                    </div>
                    </div>
                  </div>
                
            </div>

            <div class="col-lg-4">
                <!-- Course Sidebar start -->
                <div class="course-sidebar course-sidebar-2">

                    <div class="course-latest">
                        <h4>Othre Chapter</h4>
                        <ul class="recent-posts course-popular">
                             <?php
                                      $course_chapter = $this->course_model->get_all_course_chapter_by_course_id($course[0]->id);?>
                                     <?php if(count($course_chapter)>0){ ?>
                                       <?php $no=0; foreach($course_chapter as $record){ $no++; ?>

                                           <li>
                                
                                <div class="widget-post-body">
                                    <h6> <a href="<?php echo base_url('user/chapter_details/').$record->unique_id ?>" > <?php echo $record->title; ?> </a></h6>
                                   
                                </div>
                            </li>
                                      
                                     <?php } ?>
                                     <?php } ?>

                         
                         
                        </ul>
                    </div>
                </div>
<!-- Course Sidebar end -->
            </div>
        </div>
    </div>
</section>

<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>