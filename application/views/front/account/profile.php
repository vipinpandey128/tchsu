<!doctype html>
<html>
<head>
    <?php $cms_page = $this->cms_model->get_cms_by_id(22);?>
 <title>   <?php  echo $cms_page[0]->meta_title; ?> </title>
    
    <meta name="description" content="<?php  echo $cms_page[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $cms_page[0]->meta_keyword; ?>">
    
    
<?php $this->load->view('front/layout/head'); ?>
<style></style>
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
                            <h2>My Dashboard</h2></div>
                      
                        <div class="box-account box-info">
                            <div class="row course-gallery ">
                                <?php if(count($order)>0){ ?>
                                    <table class="table">
                                        <thead>
                                            <th>#</th>
                                            <th>Course</th>
                                            
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                              <?php

                                               $i = 1;    
                                               foreach ($order as $key => $value) { ?>
                                                <?php $course = $this->order_model->get_item_data($value->id);
                                                  foreach ($course as $key2 => $value2) {
                                                    $record1 = $value2 ; 
                                                    $record = $this->course_model->get_course_detail_by_id($value2->pro_id) ; ?>
                                                    <?php if($record1->course_status == 'Active') { ?>
                                                    <tr>
                                                        <td><?php echo  $i++; ?></td>
                                                        <td>
                                                             &nbsp; &nbsp; <a href="<?php echo base_url('user/chapter/').$record[0]->url_slug ?>"> <?php echo $record[0]->title ?> </a> 
                                                        </td>
                                                       
                                                        <td> <?php echo $record1->course_status ?></td>
                                                    </tr>
                                                <?php } ?>

                                            
                                                <?php  }
                                               
                                              } ?>
                                            
                                        </tbody>
                                        
                                    </table>
                              
                              <?php }?>
                            </div> 
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<!-- section end -->
<!-- breadcrumb End -->

<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>