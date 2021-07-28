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
                          <div class="page-title">
                              <h2>Your  Course</h2>
                          </div>
           
                           <div class="row course-gallery ">
                                <?php if(count($order)>0){ ?>
                                <?php   foreach ($order as $key => $value) {
                                    $course = $this->order_model->get_item_data($value->id);
                                      foreach ($course as $key2 => $value2) {
                                        $data['record1'] = $value2 ; 
                                        $data['record'] = $this->course_model->get_course_detail_by_id($value2->pro_id) ; 
                                        $this->load->view('front/account/course-list' , $data);
                          
                                      }
                                  } ?>
                              <?php }else{ ?>
                                  <div class="col-sm-6 tex-center">
                                            <h3>No Course Found</h3>
                                  </div> 
                              <?php } ?>
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