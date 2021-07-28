<!doctype html>
<html>
<head>
    <?php $cms_page = $this->cms_model->get_cms_by_id(24);?>
 <title>   <?php  echo $cms_page[0]->meta_title; ?> </title>
    
    <meta name="description" content="<?php  echo $cms_page[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $cms_page[0]->meta_keyword; ?>">
    
    
<?php $this->load->view('front/layout/head'); ?>
<style></style>
</head>
<body id="top-header">
<?php $this->load->view('front/layout/header'); ?>

<main class="site-main page-wrapper woocommerce single single-course">
    <section class="">
        <div class="container">
            <div class="row">
              
               <div class="col-lg-3">
                <?php $this->load->view('front/account/left-menu'); ?>
            

            </div>
                <div class="col-lg-9">
                    <div class="dashboard-right">
                        <div class="dashboard">
                            <div class="page-title">
                                <h2>Change Password</h2></div>
                            	<div class="row">
    							<div class="col-md-12">
    								<div class="welcome-msg dashboard">
    									<?php echo $this->session->flashdata('msg'); ?>	
    								<form class="changepassword woocommerce-form woocommerce-form-login form-signin login" id="profile_form" method="post">
    									<input type="hidden" value="<?php echo $RESULT[0]->password; ?>" name="form_key">
    									<div class="form-group">
    										<label>Old Password</label>
    										<input type="password" name="opwd" placeholder="enter old password" class="form-control custom-size" required> 
    									</div>
    					
    									<div class="form-group">
    										<label>New Password</label>
    										<input type="password" name="npwd" placeholder="enter new password" class="form-control custom-size" id='npwd' required> 
    									</div>
    					
    									<div class="form-group">
    										<label>Confirm Password</label>
    										<input type="password" name="cpwd" placeholder="enter confirm password" class="form-control custom-size" data-parsley-equalto="#npwd" required> 
    									</div>

                                               <div class="form-row">

                                                        <button type="submit" class="woocommerce-button button woocommerce-form-login__submit"  type="submit" name="changepass">Submit</button>
                                             
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
    </section>
</main>
<!--- End Header -->


<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){
	$('#profile_form').parsley();	
});
</script>

</body>
</html>