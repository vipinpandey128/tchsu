<!doctype html>
<html>
<head>
    <?php $cms_page = $this->cms_model->get_cms_by_id(20);?>
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
                <div class="col-md-2"></div>
                 <div class="col-md-8">
                <h3>Create account</h3>
                <div class="theme-card">
     
                    <form class="woocommerce-form woocommerce-form-login form-signin login" autocomplete="off" method="post">

                        <?php echo $this->session->flashdata('msg'); ?>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="fname">First Name</label>
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text form-control" id="fname" placeholder="First Name" name='fname' required value="<?php echo set_value('fname'); ?>">
                                <?php echo form_error('fname'); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control woocommerce-Input woocommerce-Input--text input-text" id="lname" name="lname" placeholder="Last Name" required value="<?php echo set_value('lname'); ?>">
                                <?php echo form_error('lname'); ?>
                            </div>
                        </div>
                        <bR>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control woocommerce-Input woocommerce-Input--text input-text" id="inputEmail" placeholder="Email" required name="email" value="<?php echo set_value('email'); ?>">
                                <?php echo form_error('email'); ?>
                            </div>
                              <div class="col-md-6">
                                <label for="Mobile">Mobile Number</label>
                                <input type="text" class="form-control woocommerce-Input woocommerce-Input--text input-text" id="phone"  required placeholder="Mobile Number" name="contact_no"  value="<?php echo set_value('contact_no'); ?>"  maxlength="10" minlenght = '10' />
                                 <p id="tel-msg" style="color:red"></p>

									<?php echo form_error('contact_no'); ?>

                            </div>
                        </div>
                        <bR>
                         <div class="form-row">
                         	 <div class="col-md-6">
                                <label for="inputPassword">Password</label>
                                <input type="password" class="form-control woocommerce-Input woocommerce-Input--text input-text" id="inputPassword" placeholder="*****" required  name="password" value="<?php echo set_value('password'); ?>">

								<?php echo form_error('password'); ?>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword">Confirm Password</label>
                                <input type="password" class="form-control woocommerce-Input woocommerce-Input--text input-text" id="inputPassword" placeholder="******" required name="confirm_password" value="<?php echo set_value('confirm_password'); ?>">

								<?php echo form_error('confirm_password'); ?>
                            </div>
                        </div>
                         <bR>
                         <div class="form-row">
                            <div class="col-lg-12">
                                <div class="g-recaptcha" data-sitekey="6LeTVfMUAAAAAGVnsnujwlG4acMf7oVSkctCgu0L"></div>
                            </div>

                        </div>
                    
                        <div class="form-row">   
                            <div class="col-lg-12">
                        
                                <button type="submit" class="woocommerce-button button woocommerce-form-login__submit"  type="submit" name="register">Create Account</button>
                                <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                 
                                </label>
                            </div>
                        </div>
                        <div class="form-row"> 
                        <div class=" col-lg-6">
                                <p class="">
                          
                                   <a href="<?php echo base_url('user/forgot_password'); ?>" class="forgot">Forgot Password?</a>
                               </p>

                            </div> 

                            <div class="form-row col-lg-6 ">
                                <p class="pull-left">
                          
                              <a href="<?php  echo base_url('user/login');?>" class="create-account text-left">Already have an account? <i class="fa fa-long-arrow-right"></i></a>
                            </p>
                              </div>
                            
                        </div>
                    </form>
                    <br><br>

             
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



<script type="text/javascript">
$(document).ready(function(){
   $('#tel-msg').empty(); 
    $('#phone').keypress(validateNumber);
   
    $('#phone').keyup(function () {
        if ($('#phone').val().length != 10) {

             $('#tel-msg').html('Enter 10 Digits Phone Number.'); 
             return false ; 
        }else{

              $('#tel-msg').empty(); 
        }

          
    });
});  


function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
        return true;
    }
};



</script>

</body>

</html>