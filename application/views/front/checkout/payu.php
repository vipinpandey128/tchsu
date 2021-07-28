<!doctype html>
<html>
<head>
<?php $this->load->view('front/layout/head'); ?>
<style>
.checkout .form-control {
    height: 30px;
    border-radius: 0px;
}
.checkout label {  margin-bottom: 0px; font-weight:bold;}
.checkout .form-group {  margin-bottom: 10px; }
.checkout .panel-heading {border-left: 4px solid #3f9444; font-weight:bold; }
</style>
</head>
<body>
<?php $coupon = $this->session->userdata('coupon_data'); ?>
<?php //print_r($coupon); ?>
<!--- Start Header -->
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->
<section class="breadcrumb-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<ul class="breadcrumb custom-bread">
					<li><a href="<?php echo base_url(''); ?>">Home</a></li>
					<li>Checkout</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="cart checkout">
	<div class="container">
		<div class="inner-page-title" id="coupon_apply">
			<h1>Checkout</h1>
		</div>
		<form action="<?= $action; ?>/_payment" method="post" id="payuForm" name="payuForm">
                        <input type="hidden" name="key" value="<?=$mkey ?>" />
                        <input type="hidden" name="hash" value="<?= $hash ?>"/>
                        <input type="hidden" name="txnid" value="<?= $tid ?>" />
                        <div class="form-group">
                            <label class="control-label">Total Payable Amount</label>
                            <input class="form-control" name="amount" value="<?= $amount ?>"  readonly/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Your Name</label>
                            <input class="form-control" name="firstname" id="firstname" value="<?= $name ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input class="form-control" name="email" id="email" value="<?= $mailid ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Phone</label>
                            <input class="form-control" name="phone" value="<?= $phoneno ?>" readonly />
                        </div>
                        <div class="form-group">
                            
                              <input type="hidden" class="form-control" name="courseinfo" value="<?= $courseinfo ?>" readonly/>   
                            
                        </div>
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <input class="form-control" name="address1" value="<?= $address ?>" readonly/>     
                        </div>
                        <div class="form-group">
                            <input name="surl" value="<?= @$success ?>" size="64" type="hidden" />
                            <input name="furl" value="<?= @$failure ?>" size="64" type="hidden" />                             
                            <input type="hidden" name="service_provider" value="" size="64" /> 
                            <input name="curl" value="<?= @$failure ?> " type="hidden" />
                        </div>
                        <div class="form-group text-center">
                        <input type="submit" value="Pay Now" class="btn btn-success" /></td>
                        </div>
                    </form>
    
    
</div>
</section>



<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>
<script>
$(document).ready(function(){
	$('#same_as_shipping').click(function(){
		if($(this).prop('checked')==true)
		{
			$('input[name=sfname]').val($('input[name=bfname]').val());
			$('input[name=slname]').val($('input[name=blname]').val());
			$('input[name=scontact_no]').val($('input[name=bcontact_no]').val());
			$('input[name=saddress]').val($('input[name=baddress]').val());
			$('input[name=scity]').val($('input[name=bcity]').val());
			$('input[name=sstate]').val($('input[name=bstate]').val());
			$('input[name=spincode]').val($('input[name=bpincode]').val());
			$('input[name=scountry]').val($('input[name=bcountry]').val());			
		}else
		{
			$('input[name=sfname]').val('');
			$('input[name=slname]').val('');
			$('input[name=scontact_no]').val('');
			$('input[name=saddress]').val('');
			$('input[name=scity]').val('');
			$('input[name=sstate]').val('');
			$('input[name=spincode]').val('');
			$('input[name=scountry]').val('');	
		}
	});	
	$('.checkout').parsley()
});
</script>

</body>
</html>