<?php $coupon = $this->session->userdata('coupon_data'); ?>
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
                <div class="col-lg-6">
                    <h3>Login</h3>
                    	
                    <div class="theme-card">
                    	<p style="color: #333333;">If you have an account with us, please log in.</p>
                    	<?php $current_url = base_url('cart'); ?>
                        <form class="woocommerce -form woocommerce-form-login form-signin login"  action="<?php echo base_url('user/login?redirect='.$current_url); ?>" id="login-form" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required="">
                            </div>
                            <div class="form-group">
                                <label for="review">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required="">
                            </div>
                             <p class="form-row">

                                    <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                        
                            </p>
                        
                    </form>
                    </div>
                </div>
                <div class="col-lg-6 right-login">
                    <h3>New Customer</h3>
                    <div class="theme-card authentication-right">
                        <h6 class="title-font">Create A Account</h6>
                        <div  class="woocommerce -form woocommerce-form-login form-signin login"  >
                            <p>Sign up for a free account at our store. Registration is quick and easy. It allows you to be able to order from our shop. To start shopping click register.</p>
                         
                             <p class="form-row">

                                   <a href="<?php echo base_url('user/register'); ?>" class="woocommerce-button button woocommerce-form-login__submit">Create an Account</a>
                                
                            </p>

                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script>
$(document).ready(function(){
	$('#login-form').parsley();
});
</script>

</body>
</html>