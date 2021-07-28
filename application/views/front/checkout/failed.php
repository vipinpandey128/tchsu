<!doctype html>
<html lang="en">
<head>

 <title>  Payment Failed </title>
    
 
<?php $this->load->view('front/layout/head'); ?>
<style></style>
</head>
<body id="top-header">
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->
<!-- About Section Start -->
<section class="about-section pt-50 " style="margin-top: 50px">
    <div class="container">
        <div class="row align-items-center justify-content-center">
              <div class="col-lg-6">
                <div class="success-text">
                    <center>
                        <img src="<?php echo base_url('images/') ?>error.png" style="width: 200px">
                    </center>
                    
                    
                      <h3><b>Your order # is: <b> <?php echo $ORDER_ID; ?></b></h3>
                        <?php echo $msg ?>
					   <?php echo @$msg2 ?>
					  
					
					  <p>
						<a href="<?php echo base_url('course'); ?>" class="button"><span>Continue Shopping</span></a>
					  </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>
