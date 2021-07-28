<!doctype html>
<html lang="en">
<head>
     <?php $cms_page = $this->cms_model->get_cms_by_id(11);?>
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
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title">
                    <h1><?php echo $cms_page[0]->title; ?></h1>
                </div>
            </div>
            <div class="col-sm-6">
                <nav aria-label="breadcrumb" class="theme-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(''); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $cms_page[0]->title; ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<section class="about-page section-b-space">
    <div class="container">
        <div class="row">
           
            <div class="col-sm-12">
              <?php $cms_page = $this->cms_model->get_cms_by_id(11);?>
                <h2><?php echo $cms_page[0]->title; ?></h2>
        <p><?php echo $cms_page[0]->description; ?></p>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>
