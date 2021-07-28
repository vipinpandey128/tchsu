<-?php error_reporting(0) ;  ?> 
<!doctype html>

<html  lang="en">
<head>
<title><?php  echo $RESULT[0]->meta_title ; ?></title>
    <meta name="description" content="<?php  echo $RESULT[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $RESULT[0]->meta_keyword; ?>">
      <link rel="canonical" href="<?php  echo $RESULT[0]->canonical; ?>">
  
    
   <?php $this->load->view('front/layout/head'); ?>

</head>
<body style="overflow-x: hidden;">
<?php $this->load->view('front/layout/header'); ?>
<section class="p-0">
      <?php $slider = $this->slider_model->get_all_active_slider();?>
<div class="slide-1 home-slider hidden-mobile">
        <?php foreach($slider as $sliders ){ ?>
        <div>
            <div class="home  text-center" >
                <img src="<?php echo base_url();?>uploads/slider/<?php echo $sliders->image?>" alt="<?php echo $sliders->img_tag	?>" class="bg-img blur-up lazyload">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="slider-contain">
                                <div>
                                   <h4 style="color:fff;margin-top: -55px;font-size: 22px;"><?php echo $sliders->description ?></h4>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
         <?php } ?>
        
    </div>

     <div class="slide-2 visible-xs">
        <?php foreach($slider as $sliders ){ ?>
        <?php if($sliders->phoneimage) { ?>
            
            <center>
                  <img src="https://www.smartwaylighting.com/uploads/slider/<?php echo $sliders->phoneimage?>" alt="<?php echo $sliders->img_tag	?>" style="width:100%" >
            </center>
            
              
              
        
           
         <?php } ?>
         <?php } ?>
        
    </div>
</section>
<!-- Home slider end -->



<div class="breadcrumb-section">
    <div class="container">
        <div class="row promotion text-center">
            <div class="col-sm-4"><img src="<?php echo base_url('images/') ?>new.gif"> FLAT 10% OFF : USE CODE</div>
            <div class="col-sm-3 text-center">  <span style="color:red;color: red;font-weight: 800;border: 1px solid #b5b5b59c;padding: 10px 20px;"><b>SMARTWAY10</b></span></div>
            <div class="col-sm-5">&nbsp; 1 YEAR WARRANTY : ON ALL courseS </div>

        </div>
    </div>
</div>

<!-- Paragraph-->
<div class="title1 section-t-space">
   
        <h1 class="title-inner1">Shop by board<span style="font-size: small; color: #000000;" width="100%">
</h1>
</div>

<!-- course slider -->
<section class=" p-t-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="course-4 course-m no-arrow">

                <?php $parent = $this->board_model->get_board_by_parent('0');?>
                   <?php foreach($parent as $parents){ ?>
                    <div class="course-box ">
                        <a href="<?php echo $parents->url_slug;?>.html">
                        <div class="collection-banner p-right text-center">
                            <div class="img-part bg-size blur-up lazyloaded" style="background-image: url('<?php echo base_url('uploads/board/');?><?php echo $parents->image;?>'); background-size: cover; background-position: center center;">
                                <img src="<?php echo base_url('uploads/board/');?><?php echo $parents->image;?>" class="img-fluid blur-up lazyload bg-img" alt="" style="display: none;">
                            </div>
                            <div class="contain-banner">
                                <div>
                                
                                    <h2><?php echo $parents->title;?> <br> <span>View All </span></h2>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>

                     <?php }?>
                    
            </div>
        </div>
    </div>
</section>
<!-- course slider end -->
<!-- course slider -->




<!-- Parallax banner end -->
<br>

<!-- course slider end -->
<section style="padding-bottom: 30px;padding-top: 30px;">
    <div class="container">
        <div class="row">
                <div class="title1  col-12">
                     <h3 class="title-inner1 text-center">Words of Praise and Love from our Customers across India</h3>
                </div>
        </div>
        <div class="row">
            <div class="col-3 col-xs-3">
                <center>
                  <a href="https://www.facebook.com/SmartwayLightingTheFuture/" target="_blank">   <img src="<?php echo base_url('assets/front/'); ?>images/facebook-logo-1.png" class="sociallogo">
                <div class="rating"  style="padding-top: 0px;"> <img src="<?php echo base_url(''); ?>images/review.png" class="sociallogo"></div></a>
                </center>
               
            </div>
            <div class="col-3 col-xs-3">
                <center>
                  <a href="https://www.amazon.in/s?k=smartway&ref=nb_sb_noss_1" target="_blank">   <img src="<?php echo base_url('assets/front/'); ?>images/amazon_logo_RGB.jpg" class="sociallogo">
                <div class="rating"  style="padding-top: 0px;"><img src="<?php echo base_url(''); ?>images/review.png" class="sociallogo"></div></a>
                </center>
               
            </div>
            <div class="col-3 col-xs-3">
                <center>
                  <a href="https://www.instagram.com/smartwaylightings/" target="_blank">   <img src="<?php echo base_url('assets/front/'); ?>images/instagram-141049465.jpg" class="sociallogo">
                <div class="rating"  style="padding-top: 0px;"><img src="<?php echo base_url(''); ?>images/review.png" class="sociallogo"></div></a>
                </center>
               
            </div>  
            <div class="col-3 col-xs-3">
                <center>
                  <a href="https://www.pepperfry.com/site_course/search?q=smartway+lighting&as=0&src=os" target="_blank">   <img src="<?php echo base_url('assets/front/'); ?>images/pepperfry-new-logo_3.jpg" class="sociallogo">
                <div class="rating"  style="padding-top: 0px;"><img src="<?php echo base_url(''); ?>images/review.png" class="sociallogo"></div></a>
                </center>
               
            </div>
        </div>
    </div>
</section>

<section class="container">
        <?php if($BANNERDATA) { ?>
            <center>
                  <img src="https://www.smartwaylighting.com/uploads/slider/<?php echo $BANNERDATA[0]->image?>" alt="<?php echo $BANNERDATA[0]->img_tag	?>" style="width:100%" >
            </center>
         <?php } ?>
</section>

<!-- Tab course -->
<div class="title1 section-t-space">
<h2 class="title-inner1">Featured courses</h2>
</div>


<section class="section-b-space p-t-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="theme-tab">
                    <ul class="tabs tab-title">
                      
                        
                     
                    </ul>
                    <div class="tab-content-cls">
                        <div id="tab-4" class="tab-content active default">
                       
                         
                      
                           <div class="no-slider row">
                                 <?php foreach ($FeaturedPRO as $key => $course) { ?>
                                 <?php $course_images = $this->course_model->select_course_images($course->id);
                                                
                                                ?>
                               
                                <div class="course-box collection-banner">
                                    
                                     <?php 
                                                             $url =  base_url($course->cat_url.'/'.$course->url_slug.'.html');
                                                         ?>

                                                    <div class="img-wrapper  img-part">
                                                   
                                                  
                                                    <div class="front">
                                                        <?php if(count($course_images)>0){ ?>  
                                                        <a href="<?php echo $url ?>" class="bg-size blur-up lazyloaded" style="background-image: url('<?php echo base_url('uploads/course/'.$course_images[0]->image); ?>'); background-size: cover; background-position: center center; display: block;" tabindex="0"><img alt="<?php echo  $course_images[0]->img_tag?>" src="<?php echo base_url('uploads/course/'.$course_images[0]->image); ?>" class="img-fluid blur-up lazyload bg-img" style="display: none;"></a>
                                                        <?php } else{ ?>
                                                              <a href="<?php echo $url ?>">
                                                        <img src="<?php echo base_url('assets/front/images/course-no-image.jpg'); ?>" class="img-fluid blur-up lazyload "  alt="">
                                                    </a>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="back">
                                                        <?php if(count($course_images)>0){ ?>  
                                                         <?php if($course_images[1]->image){ ?> 
                                                        <a href="<?php echo $url ?>" class="bg-size blur-up lazyloaded" style="background-image: url('<?php echo base_url('uploads/course/'.$course_images[1]->image); ?>'); background-size: cover; background-position: center center; display: block;" tabindex="0"><img alt="<?php echo  $course_images[0]->img_tag?>" src="<?php echo base_url('uploads/course/'.$course_images[1]->image); ?>" class="img-fluid blur-up lazyload bg-img" style="display: none;"></a>
                                                        <?php } } else{ ?>
                                                              <a href="<?php echo $url ?>">
                                                          <img src="<?php echo base_url('assets/front/images/course-no-image.jpg'); ?>" class="img-fluid blur-up lazyload "  alt="">
                                                      </a>
                                                        <?php } ?>
                                                    </div>
                                                  
                                                </div>



                                    
                                    <div class="course-detail">
                                      
                                        <a href="<?php echo base_url($course->cat_url.'/'.$course->url_slug.'.html') ?>">
                                            <h6><?php echo $course->title; ?></h6>
                                        </a>
                                         <?php if(!$course->special_price==''){ ?>
                                            <h4>RS &nbsp; &nbsp;<?php echo $course->special_price; ?> </h4>
                                            <?php }else{ ?>
                                            <h4>RS &nbsp; &nbsp;<?php echo $course->price; ?> </h4>
                                            <?php }?>
                                          <?php if($course->qty>0){ ?>
                                            <div class="btn-shop addtocart" >

                                            <?php  $cartbutton = check_course_in_cart($course->id); ?>
                         
                                                <button type="button" data="<?php echo $course->id; ?>"  title="Add to cart" class="btn btn-solid <?php echo $cartbutton['class'] ?>"  style="width: 100%"> <?php echo $cartbutton['title'] ?></button>

                                                

                                                
                                            </div>
                                            <?php }else{ ?>
                                                    <div class="btn-shop addtocart"> 

                                                         <button type="button" class="btn btn-solid addedbutton "  style="width: 100%"><i class="ti-shopping-cart" ></i> Out of Stock</button>

                                                       
                                                     </div>
                                           <?php } ?>  

                                        
                                    </div>
                                </div>
                                <?php } ?>    
                            </div>

                      

                        </div>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <section class="service border-section small-section">
        <div class="container">
        <div class="row">
            <div class="col-6  col-md-3 service-block">
                <div class="media">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -117 679.99892 679">
                        <path d="m12.347656 378.382812h37.390625c4.371094 37.714844 36.316407 66.164063 74.277344 66.164063 37.96875 0 69.90625-28.449219 74.28125-66.164063h241.789063c4.382812 37.714844 36.316406 66.164063 74.277343 66.164063 37.96875 0 69.902344-28.449219 74.285157-66.164063h78.890624c6.882813 0 12.460938-5.578124 12.460938-12.460937v-352.957031c0-6.882813-5.578125-12.464844-12.460938-12.464844h-432.476562c-6.875 0-12.457031 5.582031-12.457031 12.464844v69.914062h-105.570313c-4.074218.011719-7.890625 2.007813-10.21875 5.363282l-68.171875 97.582031-26.667969 37.390625-9.722656 13.835937c-1.457031 2.082031-2.2421872 4.558594-2.24999975 7.101563v121.398437c-.09765625 3.34375 1.15624975 6.589844 3.47656275 9.003907 2.320312 2.417968 5.519531 3.796874 8.867187 3.828124zm111.417969 37.386719c-27.527344 0-49.851563-22.320312-49.851563-49.847656 0-27.535156 22.324219-49.855469 49.851563-49.855469 27.535156 0 49.855469 22.320313 49.855469 49.855469 0 27.632813-22.21875 50.132813-49.855469 50.472656zm390.347656 0c-27.53125 0-49.855469-22.320312-49.855469-49.847656 0-27.535156 22.324219-49.855469 49.855469-49.855469 27.539063 0 49.855469 22.320313 49.855469 49.855469.003906 27.632813-22.21875 50.132813-49.855469 50.472656zm140.710938-390.34375v223.34375h-338.375c-6.882813 0-12.464844 5.578125-12.464844 12.460938 0 6.882812 5.582031 12.464843 12.464844 12.464843h338.375v79.761719h-66.421875c-4.382813-37.710937-36.320313-66.15625-74.289063-66.15625-37.960937 0-69.898437 28.445313-74.277343 66.15625h-192.308594v-271.324219h89.980468c6.882813 0 12.464844-5.582031 12.464844-12.464843 0-6.882813-5.582031-12.464844-12.464844-12.464844h-89.980468v-31.777344zm-531.304688 82.382813h99.703125v245.648437h-24.925781c-4.375-37.710937-36.3125-66.15625-74.28125-66.15625-37.960937 0-69.90625 28.445313-74.277344 66.15625h-24.929687v-105.316406l3.738281-5.359375h152.054687c6.882813 0 12.460938-5.574219 12.460938-12.457031v-92.226563c0-6.882812-5.578125-12.464844-12.460938-12.464844h-69.796874zm-30.160156 43h74.777344v67.296875h-122.265625zm0 0" fill="#ff4c3b"></path> </svg>
                    <div class="media-body">
                        <h4> Free shipping</h4>
                        <p> No Extra Cost For shipping</p>
                    </div>
                </div>
            </div>
            <div class="col-6  col-md-3 service-block">
                <div class="media">
                   <img src="https://www.smartwaylighting.com/assets/front/images/earth.png" alt='earth logo'>
                    <div class="media-body">
                        <h4>World Class designs</h4>
                        <p>Exquisite international designs </p>
                    </div>

                </div>
            </div>
            <div class="col-6  col-md-3 service-block">
                <div class="media">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -14 512.00001 512">
                        <path d="m136.964844 308.234375c4.78125-2.757813 6.417968-8.878906 3.660156-13.660156-2.761719-4.777344-8.878906-6.417969-13.660156-3.660157-4.78125 2.761719-6.421875 8.882813-3.660156 13.660157 2.757812 4.78125 8.878906 6.421875 13.660156 3.660156zm0 0" fill="#ff4c3b"></path>
                        <path d="m95.984375 377.253906 50.359375 87.230469c10.867188 18.84375 35.3125 25.820313 54.644531 14.644531 19.128907-11.054687 25.703125-35.496094 14.636719-54.640625l-30-51.96875 25.980469-15c4.78125-2.765625 6.421875-8.878906 3.660156-13.660156l-13.003906-22.523437c1.550781-.300782 11.746093-2.300782 191.539062-37.570313 22.226563-1.207031 35.542969-25.515625 24.316407-44.949219l-33.234376-57.5625 21.238282-32.167968c2.085937-3.164063 2.210937-7.230469.316406-10.511719l-20-34.640625c-1.894531-3.28125-5.492188-5.203125-9.261719-4.980469l-38.472656 2.308594-36.894531-63.90625c-5.34375-9.257813-14.917969-14.863281-25.605469-14.996094-.128906-.003906-.253906-.003906-.382813-.003906-10.328124 0-19.703124 5.140625-25.257812 13.832031l-130.632812 166.414062-84.925782 49.03125c-33.402344 19.277344-44.972656 62.128907-25.621094 95.621094 17.679688 30.625 54.953126 42.671875 86.601563 30zm102.324219 57.238282c5.523437 9.554687 2.253906 21.78125-7.328125 27.316406-9.613281 5.558594-21.855469 2.144531-27.316407-7.320313l-50-86.613281 34.640626-20c57.867187 100.242188 49.074218 85.011719 50.003906 86.617188zm-22.683594-79.296876-10-17.320312 17.320312-10 10 17.320312zm196.582031-235.910156 13.820313 23.9375-12.324219 18.664063-23.820313-41.261719zm-104.917969-72.132812c2.683594-4.390625 6.941407-4.84375 8.667969-4.796875 1.707031.019531 5.960938.550781 8.527344 4.996093l116.3125 201.464844c3.789063 6.558594-.816406 14.804688-8.414063 14.992188-1.363281.03125-1.992187.277344-5.484374.929687l-123.035157-213.105469c2.582031-3.320312 2.914063-3.640624 3.425781-4.480468zm-16.734374 21.433594 115.597656 200.222656-174.460938 34.21875-53.046875-91.878906zm-223.851563 268.667968c-4.390625-7.597656-6.710937-16.222656-6.710937-24.949218 0-17.835938 9.585937-34.445313 25.011718-43.351563l77.941406-45 50 86.601563-77.941406 45.003906c-23.878906 13.78125-54.515625 5.570312-68.300781-18.304688zm0 0" fill="#ff4c3b"></path>
                        <path d="m105.984375 314.574219c-2.761719-4.78125-8.878906-6.421875-13.660156-3.660157l-17.320313 10c-4.773437 2.757813-10.902344 1.113282-13.660156-3.660156-2.761719-4.78125-8.878906-6.421875-13.660156-3.660156s-6.421875 8.878906-3.660156 13.660156c8.230468 14.257813 26.589843 19.285156 40.980468 10.980469l17.320313-10c4.78125-2.761719 6.421875-8.875 3.660156-13.660156zm0 0" fill="#ff4c3b"></path>
                        <path d="m497.136719 43.746094-55.722657 31.007812c-4.824218 2.6875-6.5625 8.777344-3.875 13.601563 2.679688 4.820312 8.765626 6.566406 13.601563 3.875l55.71875-31.007813c4.828125-2.6875 6.5625-8.777344 3.875-13.601562-2.683594-4.828125-8.773437-6.5625-13.597656-3.875zm0 0" fill="#ff4c3b"></path>
                        <path d="m491.292969 147.316406-38.636719-10.351562c-5.335938-1.429688-10.820312 1.734375-12.25 7.070312-1.429688 5.335938 1.738281 10.816406 7.074219 12.246094l38.640625 10.351562c5.367187 1.441407 10.824218-1.773437 12.246094-7.070312 1.429687-5.335938-1.738282-10.820312-7.074219-12.246094zm0 0" fill="#ff4c3b"></path>
                        <path d="m394.199219 7.414062-10.363281 38.640626c-1.429688 5.335937 1.734374 10.816406 7.070312 12.25 5.332031 1.425781 10.816406-1.730469 12.25-7.070313l10.359375-38.640625c1.429687-5.335938-1.734375-10.820312-7.070313-12.25-5.332031-1.429688-10.816406 1.734375-12.246093 7.070312zm0 0" fill="#ff4c3b"></path> </svg>
                    <div class="media-body">
                        <h4>festival offer</h4>
                        <p>Special Festival offer</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 service-block">
                <div class="media">
                     <div class="media border-0 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px">
                                        <g>
                                            <g>
                                                <g>
                                                    <path d="M498.409,175.706L336.283,13.582c-8.752-8.751-20.423-13.571-32.865-13.571c-12.441,0-24.113,4.818-32.865,13.569     L13.571,270.563C4.82,279.315,0,290.985,0,303.427c0,12.442,4.82,24.114,13.571,32.864l19.992,19.992     c0.002,0.001,0.003,0.003,0.005,0.005c0.002,0.002,0.004,0.004,0.006,0.006l134.36,134.36H149.33     c-5.89,0-10.666,4.775-10.666,10.666c0,5.89,4.776,10.666,10.666,10.666h59.189c0.014,0,0.027,0.001,0.041,0.001     s0.027-0.001,0.041-0.001l154.053,0.002c5.89,0,10.666-4.776,10.666-10.666c0-5.891-4.776-10.666-10.666-10.666l-113.464-0.002     L498.41,241.434C516.53,223.312,516.53,193.826,498.409,175.706z M483.325,226.35L226.341,483.334     c-4.713,4.712-11.013,7.31-17.742,7.32h-0.081c-6.727-0.011-13.025-2.608-17.736-7.32L56.195,348.746L302.99,101.949     c4.165-4.165,4.165-10.919,0-15.084c-4.166-4.165-10.918-4.165-15.085,0.001L41.11,333.663l-12.456-12.456     c-4.721-4.721-7.321-11.035-7.321-17.779c0-6.744,2.6-13.059,7.322-17.781L285.637,28.665c4.722-4.721,11.037-7.321,17.781-7.321     c6.744,0,13.059,2.6,17.781,7.322l57.703,57.702l-246.798,246.8c-4.165,4.164-4.165,10.918,0,15.085     c2.083,2.082,4.813,3.123,7.542,3.123c2.729,0,5.459-1.042,7.542-3.124l246.798-246.799l89.339,89.336     C493.128,200.593,493.127,216.546,483.325,226.35z" fill="#ff4c3b"></path>
                                                    <path d="M262.801,308.064c-4.165-4.165-10.917-4.164-15.085,0l-83.934,83.933c-4.165,4.165-4.165,10.918,0,15.085     c2.083,2.083,4.813,3.124,7.542,3.124c2.729,0,5.459-1.042,7.542-3.124l83.934-83.933     C266.966,318.982,266.966,312.229,262.801,308.064z" fill="#ff4c3b"></path>
                                                    <path d="M228.375,387.741l-34.425,34.425c-4.165,4.165-4.165,10.919,0,15.085c2.083,2.082,4.813,3.124,7.542,3.124     c2.731,0,5.459-1.042,7.542-3.124l34.425-34.425c4.165-4.165,4.165-10.919,0-15.085     C239.294,383.575,232.543,383.575,228.375,387.741z" fill="#ff4c3b"></path>
                                                    <path d="M260.054,356.065l-4.525,4.524c-4.166,4.165-4.166,10.918-0.001,15.085c2.082,2.083,4.813,3.125,7.542,3.125     c2.729,0,5.459-1.042,7.541-3.125l4.525-4.524c4.166-4.165,4.166-10.918,0.001-15.084     C270.974,351.901,264.219,351.9,260.054,356.065z" fill="#ff4c3b"></path>
                                                    <path d="M407.073,163.793c-2-2-4.713-3.124-7.542-3.124c-2.829,0-5.541,1.124-7.542,3.124l-45.255,45.254     c-2,2.001-3.124,4.713-3.124,7.542s1.124,5.542,3.124,7.542l30.17,30.167c2.083,2.083,4.813,3.124,7.542,3.124     c2.731,0,5.459-1.042,7.542-3.124l45.253-45.252c4.165-4.165,4.165-10.919,0-15.084L407.073,163.793z M384.445,231.673     l-15.085-15.084l30.17-30.169l15.084,15.085L384.445,231.673z" fill="#ff4c3b"></path>
                                                    <path d="M320.339,80.186c2.731,0,5.461-1.042,7.543-3.126l4.525-4.527c4.164-4.166,4.163-10.92-0.003-15.084     c-4.165-4.164-10.92-4.163-15.084,0.003l-4.525,4.527c-4.164,4.166-4.163,10.92,0.003,15.084     C314.881,79.146,317.609,80.186,320.339,80.186z" fill="#ff4c3b"></path>
                                                    <path d="M107.215,358.057l-4.525,4.525c-4.165,4.164-4.165,10.918,0,15.085c2.083,2.082,4.813,3.123,7.542,3.123     s5.459-1.041,7.542-3.123l4.525-4.525c4.165-4.166,4.165-10.92,0-15.085C118.133,353.891,111.381,353.891,107.215,358.057z" fill="#ff4c3b"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                <div class="media-body">
                                    <h4>online payment</h4>
                                    <p>Safe and Convenient</p>
                                </div>
                            </div>
                </div>
            </div>
        </div>
        </div>
    </section>


<!-- instagram section -->


<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>




    <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
             <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                       <div class="row">
                           <div class="col-12">
                                <div class="modal-bg">
                                     
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            
                                    <h2 id="msg" style="color:black" >newsletter</h2>
                                    <form class="subscribe-form-2 auth-form needs-validation" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
                                        <div class="form-group mx-sm-3">
                                            <input type="email" class="form-control" name="email" id="mce-EMAIL" placeholder="Enter your email" required="required">
                                            <button type="submit" class="btn btn-solid" id="mc-submit">subscribe</button>
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    <script>
    $(document).ready(function() {
   

   
});
    
    $(window).on('load',function(){
       
            
    if(localStorage.getItem('popState') != 'shown'){
        $("#exampleModal").delay(2000).fadeIn().modal('show');;
        localStorage.setItem('popState','shown')
    } 
    
     $('#popup-close').click(function(e) // You are clicking the close button
    {
    $('#exampleModal').fadeOut(); // Now the pop up is hiden.
    });
    $('#exampleModal').click(function(e) 
    {
    $('#exampleModal').fadeOut(); 
    });
        
  
    });
  
    </script>