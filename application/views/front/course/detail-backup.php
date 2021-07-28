<!doctype html>
<html lang="en">
<head>
    <title>   <?php  echo $RESULT[0]->meta_title; ?> </title>
    <meta name="description" content="<?php  echo $RESULT[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $RESULT[0]->meta_keywords; ?>">
     <link rel="canonical" href="<?php  echo @$RESULT[0]->canonical; ?>">
    <meta property="og:title" content="<?php  echo $RESULT[0]->meta_title; ?>" />
    <meta property="og:description" content="<?php  echo $RESULT[0]->meta_description ; ?>" />
    <meta property="og:url" content="<?php echo  base_url(uri_string()); ?>" />
    <?php $course_images = $this->course_model->select_course_images($RESULT[0]->id); ?>
    <meta property="og:image" content="<?php echo base_url('uploads/course/'.$course_images[0]->image); ?>" alt="<?php echo $course_images[0]->img_tag; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en" />
    
<?php $this->load->view('front/layout/head'); ?>

   <script>
   {
        "@context": "https://schema.org/", 
  "@type": "course", 
  "name": "<?php  echo $RESULT[0]->title; ?>",
  "image": "<?php echo base_url('uploads/course/'.$course_images[0]->image); ?>",
  "description": "<?php  echo $RESULT[0]->meta_description ; ?>",
  "brand": "Smartway Lighting",
  "sku": "<?php  echo $RESULT[0]->sku; ?>",
  "offers": {
    "@type": "AggregateOffer",
    "url": "<?php echo  base_url(uri_string()); ?>",
    "priceCurrency": "INR",
    <?php if($RESULT[0]->special_price){ ?>
     "lowPrice": "<?php  echo $RESULT[0]->special_price; ?>",
      "highPrice": "<?php  echo $RESULT[0]->price; ?>"
    <?php }else{ ?>
     "lowPrice": "<?php  echo $RESULT[0]->price; ?>",
      "highPrice": "<?php  echo $RESULT[0]->price; ?>",
    <?php } ?>
  }
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "VideoObject",
  "name": "<?php  echo $RESULT[0]->title; ?>",
  "description": "<?php  echo $RESULT[0]->meta_description ; ?>",
  "thumbnailUrl": "<?php echo base_url('uploads/course/'.$course_images[0]->image); ?>",
  "uploadDate": "<?php  echo $RESULT[0]->create_date ; ?>",
  "duration": "PT0M56S",
  "contentUrl": "<?php echo base_url('uploads/course/').$RESULT[0]->video; ?>"
}
    </script>
</head>
<body>
<!--- Start Header -->
<?php $this->load->view('front/layout/header'); ?>
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h1>  <?php echo $RESULT[0]->title; ?></h1></div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
                        <?php $course_cat = $this->board_model->get_board_by_id($RESULT[0]->board_refid);?>   
                        <li class="breadcrumb-item"><a href="<?php  echo base_url().$course_cat[0]->url_slug;?>.html"><?php  echo $course_cat[0]->title;?></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                          <?php echo character_limiter( $RESULT[0]->title,23); ?> 
                         </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<section>
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                       <?php $this->load->view('front/course/course-gallery');  ?>
                </div>
                <div class="col-lg-6 rtl-text">
                    <div class="course-right">
                        <h3><?php echo $RESULT[0]->title; ?></h3>
                         <div class="row">
                            <?php if($RESULT[0]->special_price) { ?>
                                 <div class=" col-6">
                                    <h2><?php echo CURRENCY_SYMBOL.' '.$this->cart->format_number($RESULT[0]->special_price); ?></h2>
                                    <h4><del><?php echo CURRENCY_SYMBOL.' '.$this->cart->format_number($RESULT[0]->price); ?></del></h4>
                                 <input type="hidden" class="hidden_price" value="<?php echo $RESULT[0]->special_price;?>" >
                                 </div>
                              
                               <?php }else{ ?>
                               <div class=" col-6">
                                     <h2>
                                  <?php echo CURRENCY_SYMBOL.' '.$this->cart->format_number($RESULT[0]->price); ?></h2>
                                 <input type="hidden" class="hidden_price" value="<?php echo $RESULT[0]->price;?>" >
                               </div>
                               
                                 </div>
                              <?php } ?>
                        </div>
                        <br>
                          <?php $course_cat = $this->board_model->get_board_by_id($RESULT[0]->board_refid); ?>   
                          <h6 class="course-title size-text"> board : - <a href="<?php  echo base_url().$course_cat[0]->url_slug;?>.html"><?php  echo $course_cat[0]->title;?></a></h6>
                        <form method="post" action="<?php echo base_url('cart/add_to_cart_pageload');?>">
                             <input type="hidden" name="id" value="<?php echo $RESULT[0]->id;?>">
                             <input type="hidden" name="final_price" value="<?php echo ($RESULT[0]->special_price)?$RESULT[0]->special_price:$RESULT[0]->price ?>" class="final_price">
                        <div class="course-description border-course">
                            <h6 class="course-title">Quantity
                            <?php if($RESULT[0]->qty == 0){ ?> 
                              <span  style="BACKGROUND: RED;font-size: 9px;color: #fff;padding: 5px 10px;float:none"><span  style="float:none">zero stock - We will be back in Stock soon!</span></span> 
                            <?php }elseif($RESULT[0]->qty < 10){ ?>
                            <span  style="BACKGROUND: RED;font-size: 9px;color: #fff;padding: 5px 10px;float:none"><span class="blink" style="float:none"> Only  <?php echo trim($RESULT[0]->qty) ?> Left, hurry up!</span>
                           </span> 
                            <?php } ?>
                            </h6>
                            <div class="qty-box">
                                <div class="input-group">
                                      <div class="input-group">
                                      <input type="number" name="qty" class="form-control input-number" value="1"  min="1" max="<?php echo trim($RESULT[0]->qty) ?>">
                                  </div>  
                                  </div>
                            </div>
                        </div>
                        <div class="course-buttons">
                          <?php if($RESULT[0]->qty>0){ ?>
                          <div class="btn-shop addtocart">
                             <?php  $cartbutton = check_course_in_cart($RESULT[0]->id); ?>
                               <button type="button" data="<?php echo $RESULT[0]->id; ?>"  title="Add to cart" class="btn btn-solid <?php echo $cartbutton['class'] ?>"><i class="ti-shopping-cart" ></i> <?php echo $cartbutton['title'] ?></button>
                                <button type="submit" id="buybuttonsubmit" class="btn btn-solid"> Buy Now</button>
                          </div>
                          <?php }else{ ?>
                            <div class="btn-shop addtocart"> 
                               <button type="button" class="btn btn-solid addedbutton "  style="width: 100%"><i class="ti-shopping-cart" ></i> Out of Stock</button>
                           </div>
                         <?php }  ?>
                        </div>
                         </form>
                        <div class="border-course" style="word-break: unset;text-align:justify">
                            <h6 class="course-title"></h6>
                              <?php echo $RESULT[0]->short_description; ?>
                        </div>
                        <div>
                            <?php  
                            $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";  
                            $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];  
                            
                            ?>  
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<hr>
<section class="tab-course m-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="tab-content nav-material" id="top-tabContent">
                    <div class="tab-pane fade show active" id="top-home" role="tabpanel" aria-labelledby="top-home-tab">
                       <div class="row">
                          <div class="col-sm-7">
                            <h3 style="color: black">Dimensions</h3>
                             <?php echo $RESULT[0]->description; ?>
                          </div>
                          <div class="col-sm-5">
                            <?php if($RESULT[0]->video){ ?>
                              <h3 style="color: black">Video</h3>
                                <center>
                                          <video  controls style="width:100%">
                                              <source src="<?php echo base_url('uploads/course/').$RESULT[0]->video; ?>" type="video/mp4">
                                              Your browser does not support the video tag.
                                            </video>
                                </center>
                              <?php } ?>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Paragraph-->
<div class="title1 section-t-space">
    <h2 class="title-inner1">Similar courses</h2>
</div>
<!-- course slider -->
<section class="section-b-space p-t-0 ratio_asos">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="course_4 course-m no-arrow">
                    <?php foreach($coursescat as $course){ ?>
                         <?php 
                         $course_cat = $this->board_model->get_board_by_id($course->board_refid); 
                         ?>   
                        <?php
                         $course_images = $this->course_model->select_course_images($course->id);
                          ?>
                        <?php 
                                 $url =  base_url($course_cat[0]->url_slug.'/'.$course->url_slug.'.html');
                           ?>   
                    <div class="course-box collection-banner">

                         <div class="img-wrapper  img-part">
                            <?php if($course->is_latest=='yes') { ?>   <div class="lable-block"><span class="lable3">new</span></div><?php } ?>
                      
                        <div class="front">
                            <?php if(count($course_images)>0){ ?>  
                            <a href="<?php echo $url ?>" class="bg-size blur-up lazyloaded" style="background-image: url('<?php echo base_url('uploads/course/'.$course_images[0]->image); ?>'); background-size: cover; background-position: center center; display: block;" tabindex="0"><img alt="<?php echo  $course_images[0]->img_tag?>" src="<?php echo base_url('uploads/course/'.$course_images[0]->image); ?>" class="img-fluid blur-up lazyload bg-img" style="display: none;"></a>
                            <?php } else{ ?>
                                  <a href="<?php echo $url ?>">
                            <img src="<?php echo base_url('assets/front/images/course-no-image.jpg'); ?>" class="img-fluid blur-up lazyload "  >
                        </a>
                            <?php } ?>
                        </div>
                        <div class="back">
                             <?php if(count($course_images)>0){ ?> 
                             <?php if($course_images[1]->image){ ?> 
                            <a href="<?php echo $url ?>" class="bg-size blur-up lazyloaded" style="background-image: url('<?php echo base_url('uploads/course/'.$course_images[1]->image); ?>'); background-size: cover; background-position: center center; display: block;" tabindex="0"><img alt="<?php echo  $course_images[0]->img_tag?>" src="<?php echo base_url('uploads/course/'.$course_images[1]->image); ?>" class="img-fluid blur-up lazyload bg-img" style="display: none;"></a>
                            <?php } }else{ ?>
                                  <a href="<?php echo $url ?>">
                              <img src="<?php echo base_url('assets/front/images/course-no-image.jpg'); ?>" class="img-fluid blur-up lazyload "  >
                          </a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="course-detail">
                            <a href="<?php echo $url ?>">
                                <h6><?php echo character_limiter( $course->title,23); ?></h6>
                            </a>
                        </div>
                    </div>
                     <?php }?>
                   </div>
            </div>
        </div>
    </div>
</section>
<!-- course slider end -->


<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/front/') ?>js/jquery.elevatezoom.js"></script>

<script>
$(document).ready(function(){
   $("#minutesInput").on('keyup keypress blur change', function(e) {
     let a =    <?php echo trim($RESULT[0]->qty) ?> ; 
    if($(this).val() >= a){
      $(this).val(a);
      return false;
    }

  });
  

});
</script>
<script>
        $('.input-number').on('change', function(){ 
           var s = $(this);
           var a = parseInt($(this).val()) ;
           var b = parseInt($(this).attr('max')) ;
           var id = $(this).attr('id');
           var classname = '.'+id;
           if(a > b){

           alert("Sorry!!,  We have limited stock!!") ;  
           $(this).val(1);
                
           }else if (a==0) {
            
              alert('Please put the value') ; 
                     $(this).val(1);
           }else{
              $(this).val(a);
               
           }
        });
</script>


