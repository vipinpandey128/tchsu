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
                            <h2>Edit Account Information</h2></div>
                        		<div class="row">
							<div class="col-md-12">
								<div class="welcome-msg ">																																
									<?php echo $this->session->flashdata('msg'); ?>
									<form method="post" class="woocommerce-form woocommerce-form-login form-signin login" id="profile_form">  
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="field-label">First Name :</label>
													<input type="text" class="form-control" value="<?php echo $RESULT[0]->fname; ?>" name="fname" required>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="field-label">Last Name :</label>
													<input type="text" class="form-control" value="<?php echo $RESULT[0]->lname; ?>" name="lname" required>
												</div>
											</div>
											<div class="clearfix"></div>
											<div class="col-sm-6">
												 <div class="form-group">
													<label class="field-label">Gender :</label>
													<select class="form-control" name="gender">
														<option value="male" <?php echo($RESULT[0]->gender=='male')?'selected':''; ?> >Male</option>
														<option value='female' <?php echo($RESULT[0]->gender=='female')?'selected':''; ?>>Female</option>
													</select>	
												</div>
											</div>
											
											<div class="clearfix"></div>										
											<div class="col-sm-6">
												<div class="form-group">
													<label class="field-label">Contact No. :</label>


													<input type="text" class="form-control" id="phone" name="contact_no" value="<?php echo $RESULT[0]->contact_no; ?>" required minlength="10" maxlength="10"  >
													<p id="tel-msg" style="color: red ;font-size: 12px"></p>
												</div>
											</div>
											
										   <div class="col-sm-6">
												<div class="form-group">
													<label class="field-label">GST IN</label>
														<input type="text" class="form-control" name="gst" value="<?php echo $RESULT[0]->gst; ?>" minlength="15" maxlength="15" >
												
												</div>
											</div>
										
											<div class="clearfix"></div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="field-label">Landmark :</label>
													<input type="text" class="form-control" name="landmark" value="<?php echo @$RESULT[0]->landmark; ?>" >
												</div>
											</div>
											
											<div class="col-sm-6">
												<div class="form-group">
													<label class="field-label">City :</label>
													<input type="text" class="form-control" name="city" value="<?php echo $RESULT[0]->city; ?>" required>
												</div>
											</div>
										
											<div class="col-sm-6">
												<div class="form-group">
													<label class="field-label">State :</label>
													<input type="text" class="form-control" name="state" value="<?php echo $RESULT[0]->state; ?>" required>
												</div>
											</div>
											
									    <div class="col-sm-6">
												<div class="form-group">
													<label class="field-label">Zip:</label>
													<input type="text" class="form-control" name="zip" value="<?php echo $RESULT[0]->zip; ?>" minlength="6" maxlength="6" required>
												</div>
											</div>
											<div class="clearfix"></div>
												<div class="col-sm-12">
												<div class="form-group">
													<label class="field-label">Address :</label>
													<input type="text" class="form-control" name="address" value="<?php echo $RESULT[0]->address; ?>" required>
												</div>
											</div>
										
											<div class="clearfix"></div>
											<div class="col-sm-12">
												   <div class="form-row">

							                            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit"  type="submit" name="updateprofile">Update</button>
							                 
							                      </div>

											
											</div>                
										</div> <!--- Row End -->
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


<!-- section end -->
<!-- breadcrumb End -->


<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script class="example">
$(document).ready(function(){
	$('#profile_form').parsley();	
});
</script>
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