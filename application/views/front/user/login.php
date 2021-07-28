<!doctype html>
<html>
<head>
    <?php $cms_page = $this->cms_model->get_cms_by_id(15);?>
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
                <div class="col-md-6">
                    <div class="woocommerce-notices-wrapper"></div>
                    <h2 class="font-weight-bold mb-4">Login</h2>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <form class="woocommerce-form woocommerce-form-login form-signin login" action="<?php echo base_url('user/login?redirect='.@$current_url); ?>" id="login-form" method="post">
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="email">Email address&nbsp;<span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" name="email" id="email" autocomplete="email" value="" placeholder=" Email">
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="password">Password&nbsp;<span class="required">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text form-control" type="password" name="password" id="password" autocomplete="current-password" placeholder="password">
                        </p>
                        <p class="form-row">

                            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                        
                        </p>

                              <div class="form-row"> 
                        <div class=" col-lg-6">
                                <p class="">
                          
                                   <a href="<?php echo base_url('user/forgot_password'); ?>" class="forgot">Forgot Password?</a>
                               </p>

                            </div> 

                            <div class="form-row col-lg-6 ">
                                <p class="pull-left">
                          
                               <a href="<?php echo base_url('user/register'); ?>" class="create-account pull-right">Create Account <i class="fa fa-long-arrow-right"></i></a>
                            </p>
                              </div>
                            
                        </div>


                    </form>
                </div>
             
            </div>
        </div>
    </section>
    <!--shop board end-->
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