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
                <h2>Forgot Your Password</h2>
                  <?php echo $this->session->flashdata('msg'); ?>
                <form  class="woocommerce-form woocommerce-form-login form-signin login"  method="post" autofocus="off">
                    <div class="form-row">
                        <div class="col-md-12">
                            <input type="text" class="form-control" id="email" placeholder="example@domain.com" required name="email" value="<?php echo set_value('email'); ?>" />

                            <?php echo form_error('email'); ?>                
                        </div>

                    </div>
                        <br>

                    <div class="form-row">

                            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit"  type="submit" name="forgot_password">Log in</button>
                 
                      </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--Section ends-->
</main>


<?php $this->load->view('front/layout/footer.php') ?>

<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>

<script class="example">

$(document).ready(function(){

	$('.login').parsley();

});

</script>

</body>

</html>