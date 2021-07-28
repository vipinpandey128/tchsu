<!doctype html>

<html>
<head>
<?php $this->load->view('front/layout/head'); ?>
</head>

<body>

<!--- Start Header -->

<?php $this->load->view('front/layout/header'); ?>

<!--- End Header -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h2><?php  echo @$RESULT[0]->title; ?></h2></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php  echo @$RESULT[0]->title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="section-b-space ratio_asos">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 collection-filter">
                    <!-- side-bar colleps block stat -->
                    <div class="collection-filter-block">
                        <!-- brand filter start -->
                        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
                        <div class="collection-collapse-block open">
                            <h3 class="collapse-block-title">board</h3>
                            <div class="collection-collapse-block-content">
                                <div class="collection-brand-filter">
                                    <?php $parent = $this->board_model->get_board_by_parent('0');?>
                                    <?php foreach($parent as $parents){ ?>
                                    <div class="custom-control custom-checkbox collection-filter-checkbox">
                                       
                                      <a href="<?php echo $parents->url_slug;?>.html"><?php echo $parents->title;?></a>

                                    </div>
                                    <?php }?>
                    
                                </div>
                            </div>
                        </div>
                        <!-- color filter start here -->
                      
                        <!-- price filter start here -->
                       
                    </div>
               
                </div>
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
         
          
                                   

                                <div class="course-wrapper-grid">
                                        <div class="row">
                                        <?php if(count($courseS)>0){ ?>
                                              <?php foreach($courseS as $course){ //print_r($course);?>
                                                <?php $course_images = $this->course_model->select_course_images($course->id); ?>
                                                  <div class="col-6 col-xl-3 col-md-4 col-xs-6 col-grid-box">
                                                  <div class="course-box">
                                                      <div class="img-wrapper">
                                                        <?php 
                                                             $url =  base_url($RESULT[0]->url_slug.'/'.$course->url_slug.'.html');
                                                         ?>
                                                          <div class="front">
                                                            <a href="<?php echo $url ?>">
                                                             <?php if(count($course_images)>0){ ?>

                                                                <img src="<?php echo base_url('uploads/course/'.$course_images[0]->image); ?>" class="img-fluid blur-up lazyload " >
                                                                <?php } else{ ?>
                                                                <img src="<?php echo base_url('assets/front/images/course-no-image.jpg'); ?>" class="img-fluid blur-up lazyload ">
                                                                   <?php } ?>
                                                    
                                                              </a>
                                                          </div>
                                                          

                                                      </div>
                                                      <div class="course-detail">
                                                          <div>
 
                                                              <a href="<?php echo $url ?>">
                                                                <h6><?php echo $course->title; ?></h6>
                                                              </a>
                                                              

                                                            
                                                               <?php if(!$course->special_price==''){ ?>
                                                                  <h4>RS.<?php echo $course->special_price; ?> </h4>
                                                               <?php }else{ ?>
                                                                 <h4>RS.<?php echo $course->price; ?> </h4>
                                                                <?php }?>

                                                            <?php if($course->qty>0){ ?>
                                                            <div class="btn-shop addtocart">

                                                               <?php  $cartbutton = check_course_in_cart($course->id); ?>

                                                                 <button type="button" data="<?php echo $course->id; ?>"  title="Add to cart" class="btn btn-solid <?php echo $cartbutton['class'] ?>"  style="width: 100%"><i class="ti-shopping-cart" ></i> <?php echo $cartbutton['title'] ?></button>
                                                                  
                                                            </div>
                                                            <?php }else{ ?>
                                                              <div class="btn-shop addtocart"> 

                                                                 <button type="button" class="btn btn-solid addedbutton "  style="width: 100%"><i class="ti-shopping-cart" ></i> Out of Stock</button>

                                                               
                                                             </div>
                                                           <?php } ?>  

                                                             
                                                          </div>
                                                      </div>
                                                  </div>
                                                  </div>
                                              <?php } ?>
                                            <?php }else{ ?>
                                               <div class="col-md-12 col-sm-6">Sorry ! No courses Found
                                              </div>
                                             <?php } ?>  
                                            
                                          
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
<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>