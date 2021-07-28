<!doctype html>
<html lang="en">
<head>
<title>   <?php  echo $cms_page[0]->meta_title; ?> </title>  
<meta name="description" content="<?php  echo $cms_page[0]->meta_description ; ?>">
<meta name="keywords" content="<?php  echo $cms_page[0]->meta_keyword; ?>">
<link rel="canonical" href="<?php  echo $cms_page[0]->canonical; ?>">
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
          <?php if($cms_page[0]->image) {?>
          <center><img src="<?php echo base_url('uploads/board/');?><?php echo $cms_page[0]->image;?>" alt="<?php  echo $cms_page[0]->title; ?>" class="img-fluid" style="width: 50px"></center>
        <?php } ?>
          <h1> <?php  echo $cms_page[0]->title; ?> </h1>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="#">Home</a>
            </li>
             <li class="list-inline-item">/</li>
            <li class="list-inline-item">
              <?php  echo $cms_page[0]->title; ?> 
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section-padding course">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="blog-sidebar mt-5 mt-lg-0">
              <!--   <div class="widget widget-search">
                    <form role="search" class="search-form">
                        <input type="text" class="form-control" placeholder="Search">
                        <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                    </form>
                </div> -->

              <form method="get" id="filter">  
                <div class="widget widget_categories">
                    <h4 class="widget-title">Board</h4>
                    <ul>
                            <?php $parent = $this->board_model->get_board_by_parent('0');?>
                                <?php foreach($parent as $parents){ ?>

                              <li><a href="<?php echo base_url() ?><?php echo $parents->url_slug;?>.html"><?php echo $parents->code;?></a></li>

                                <?php  }  ?>
                              
                    </ul>
                    <hr>


                    <h4 class="widget-title">Subject</h4>
                    <ul>
                        <?php $subject = $this->subject_model->get_all_active_subject();;?>
                        <select class="form-control " name="subject" required>
                            <option value=''>Select subject</option>
                        
                            <?php foreach ($subject as $key=> $value) { ?>
                              <option value="<?php echo $value->title ?>" <?php  echo (@$_GET['subject'] == $value->title )?"selected":""   ?> ><?php echo $value->title ?> </option>
                            <?php } ?>
                        </select>
                      
                    </ul>
                    <hr>
                     <h4 class="widget-title">Class</h4>
                    <ul>
                       
                       <select class="form-control " name="class" required>
                          <option value=''>Select class</option>
                          <?php for ($i=1; $i <=12 ; $i++) { ?>
                            <option <?php  echo (@$_GET['class'] ==$i )?"selected":""   ?> > <?php echo $i ?></option>
                          <?php  } ?> 
                        </select>
                      
                    </ul>


                </div>
              </form>
            
          
          </div>
        </div>
        <div class="col-sm-9">
            <div class="row course-gallery ">
              <?php if(count($course) > 0 ) { ?>
                  <?php foreach ($course as $key => $value) { ?>
                   <?php 
                      $data['record'] = $value;
                      $this->load->view('front/course/course-list' , $data); ?>
                  <?php } ?> 
                <?php }else{ ?>

                <div class="col-sm-6 tex-center">
                  <h3>No Course Found</h3>
                </div> 


                <?php  } ?> 
            </div>


        </div>
      </div>
    </div>
</section>
<?php $this->load->view('front/layout/footer.php') ?>
<script type="text/javascript">
  $(document).ready(function(){
   $('.form-control').change(function(){
       $('#filter').submit();
    });
});

</script>
</body>
</html>
