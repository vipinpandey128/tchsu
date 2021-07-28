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
    <section class="space-3">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
            <div class="col-lg-6">
                <h3>Reset Password</h3>
                  
                <div class="theme-card">
                    <?php echo $this->session->flashdata('msg'); ?>
       
                  <?php $current_url = base_url('checkout/onepage'); ?>
                    <form class="theme-form form-signin"  id="login-form" method="post">
                       
                        <div class="form-group">
                            <label for="email">New Password</label>
                            <input  type="password" id="npwd"  class="form-control" placeholder="******" required name="npwd" name="npwd" value="<?php echo set_value('npwd'); ?>">
                            <?php echo form_error('password'); ?>	
                        </div>
                        <div class="form-group">
                            <label for="review">Confirm Password</label>
                            <input type="password" id="cpwd"  class="form-control" placeholder="******" required name="cpwd" value="<?php echo set_value('cpwd'); ?>" data-parsley-equalto="#npwd"
					parsley-required="true" data-parsley-trigger="blur">
				<?php echo form_error('confirm_password'); ?>		
                        </div>
                    
                          <button type="submit" class="btn btn-solid" name="reset_password" style="width: 40%">Reset Password</button>
                        
                        
                </form>
                <br>
                 <br>
                 <a href="<?php echo base_url('user/login'); ?>" class="forgot ">Login ?</a>
                 
                  
                </div>
            </div>
           
        </div>
    </div>
</section>
</main>



<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){
	$('.form-signin').parsley();
});
</script>
</body>
</html>