<!doctype html>
<html>
<head>
   <title>      <?php $cms_page = $this->cms_model->get_cms_by_id(13);?>
 <title>   <?php  echo @$cms_page[0]->meta_title; ?> </title>
    
    <meta name="description" content="<?php  echo @$cms_page[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo @$cms_page[0]->meta_keyword; ?>">
      <link rel="canonical" href="<?php  echo @$cms_page[0]->canonical; ?>">
      
            
      
         <meta property="og:title" content="<?php  echo $cms_page[0]->meta_title; ?>" />
    <meta property="og:description" content="<?php  echo $cms_page[0]->meta_description ; ?>" />
    <meta property="og:url" content="<?php echo  base_url(uri_string()); ?>" />
    
    
    <meta property="og:image" content="" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en" />
    
<?php $this->load->view('front/layout/head'); ?>
<style></style>
</head>
<body>
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->
<section class="breadcrumb-section">
	<div class="container">
		<div class="row">
       <div class="col-sm-6">
                <div class="page-title">
                    <h1><?php echo $cms_page[0]->title; ?></h1></div>
            </div>
			<div class="col-sm-6">
				<ul class="breadcrumb custom-bread">
					<li><a href="<?php echo base_url(''); ?>">Home</a> / </li><li><?php echo $cms_page[0]->title; ?></li>
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="custom_section">
  <div class="container">
  <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
   <div class="aboutText">

   <?php $cms_page = $this->cms_model->get_cms_by_id(13);?>
                <h2><?php echo $cms_page[0]->title; ?></h2>
        <p><?php echo $cms_page[0]->description; ?></p>

   </div>
  </div>
  </div>
  </div>
</section>


<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>
