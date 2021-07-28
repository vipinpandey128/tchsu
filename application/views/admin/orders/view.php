<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Website; ?>  | Invoice </title>
  <?php $this->load->view('admin/layout/head_css'); ?>
  <?php $this->load->view('admin/layout/tiny-mce'); ?>
  <style>
  @media print {
   a[href]:after {
      content: none !important;
   }
   #print_btn{display:none;}
}
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $this->load->view('admin/layout/header'); ?>	
  <!-- Left side column. contains the logo and sidebar -->
<?php $this->load->view('admin/layout/sidebar'); ?>	
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Order #<?php echo $ORDER[0]->id ?></h1>
      
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url('admin/orders/listing'); ?>">All Orders</a></li>
	
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<div class="box">
		<div class="box-body">
            <div class="box box-primary">            
            <div class="row" style="padding:10px 0px">
                <div class="col-sm-6">	<button class="btn btn-warning btn-update pull-right1" id="print_btn" onclick="return print_invoice('invoice_print'); " style="margin-bottom: 5px;">Print Invoice</button></div>
                <div class="col-sm-6">
                    	<?php if($ORDER[0]->shipment_id) { ?>
            			<a class="btn btn-warning btn-update " href="<?php echo base_url('shiprocket/label/').$ORDER[0]->shipment_id ?>"  target="_blank" style="margin-bottom: 5px;">Print Label</a>
            			<a class="btn btn-warning btn-update " href="<?php echo base_url('shiprocket/tracking/').$ORDER[0]->shipment_id ?>"  target="_blank" style="margin-bottom: 5px;">Track Shiprocket</a>
            			<a class="btn btn-warning btn-update " href="<?php echo base_url('shiprocket/trackingFrontend/').$ORDER[0]->id.'/'.$ORDER[0]->shipment_id ?>"  target="_blank" style="margin-bottom: 5px;">Track FrontEnd</a>
            			<!--<a class="btn btn-warning btn-update " href="<?php echo base_url('shiprocket/trackingAWBFrontend/').$ORDER[0]->id.'/'.$ORDER[0]->awb_id ?>"  target="_blank" style="margin-bottom: 5px;">Track AWB FrontEnd</a>-->
            			<a class="btn btn-warning btn-update " href="<?php echo base_url('shiprocket/details/').$ORDER[0]->order_id ?>"  target="_blank" style="margin-bottom: 5px;">Shipment Details/ Genrate AWBID</a>
            			<a class="btn btn-warning btn-update " href="<?php echo base_url('shiprocket/invoice/').$ORDER[0]->order_id ?>" target="_blank"  style="margin-bottom: 5px;">Shipment Invoice</a>
            			<?php } ?>
                </div>
            </div>
            <div class="table-responsive order-tabel" id="invoice_print"><br>
		
		
			<?php
				$user = $this->user_model->get_user_by_id($ORDER[0]->user_id);
				
			
				$shipping = $this->order_model->get_shipping_data($ORDER[0]->id);
				$billing = $this->order_model->get_billing_data($ORDER[0]->id);
				$items_data = $this->order_model->get_item_data($ORDER[0]->id);
			?>
			<?php $link = $this->setting_model->get_all_setting();?>
			
	<div class="table-responsive order-tabel" id="invoice_print">		
    <table bgcolor="#FFFFFF" cellspacing="0" cellpadding="10" border="1" width="100%" style="border:1px solid #e0e0e0">
	<tbody>		
		<tr >
			<td border="0">
			   
			    	<table width="100%" >
			
					<tbody>
						<tr>
							<td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;width: 33%;" >
								 	<img src="<?php echo base_url('uploads/').$link[0]->logo; ?>" style="width:250px;" >
							</td>
							<td style="font-size:12px;padding:7px 9px 9px 9px;width: 33%;">
							    <h2 style="text-align:center"><b>INVOICE</b></h2>
							</td>
							<td valign="top" style="font-size:12px;padding:20px 9px 9px 9px;">
								<p>Contact No. <strong> <?php echo $link[0]->phone; ?></strong><br>
								Email.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> <?php echo $link[0]->email; ?></strong><br>
								Address.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> <?php echo $link[0]->address_content; ?></strong>  <br>
								GST No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> <?php echo GSTNO ?></strong>  
								</p>
								
							
							</td>							
						</tr>
					</tbody>
				</table>
				<br>
				<table cellspacing="0" cellpadding="0" border="1" width="100%" style="border:1px solid #eaeaea">
					<thead>
						<tr>
							<th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Order Information</th>
							<th width="10" style="border: none !important;"></th>
							<th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Account Information</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
								<p><strong>Order</strong> : #<?php echo $ORDER[0]->id ?>
								<br><strong>Order Date</strong> : <?php echo date('d-M-Y h:i:s a',strtotime($ORDER[0]->create_date)); ?>
							
                                <br><strong>Payment Status</strong> : <?php echo ucfirst($ORDER[0]->payment_status); ?></p>
							</td>
							<td></td>
							<td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
								<p><strong>Customer Name</strong> : <a href="<?php echo base_url('admin/user/profile/'.$user[0]->id); ?>"><?php echo $user[0]->fname.' '.$user[0]->lname; ?></a>
								<br><strong>Email</strong> : <?php echo $user[0]->email; ?>
								<br><strong>Contact</strong> : <?php echo $user[0]->contact_no; ?>
								</p>
						
								
							</td>							
						</tr>
					</tbody>
				</table>
				<bR>
				
				<table cellspacing="0" cellpadding="0" border="1" width="100%" style="border:1px solid #eaeaea">
				    <thead>
						<tr>
							<th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Shipping Address</th>
							<th width="10" style="border: none !important;"></th>
							<th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Billing Address</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
								            
                								
                								<?php 
                								
                								$shipping_details =  $this->order_model->get_shipping_data($ORDER[0]->id) ;
                								
                							
                								
                								echo "<p><b>".$shipping_details[0]->fname." ". $shipping_details[0]->lname."</b> ";
                								echo "<br> <b>Phone:  &nbsp;   &nbsp; </b>".$shipping_details[0]->phone."";
                								echo "<br> <b>Address: &nbsp;  &nbsp; </b>". $shipping_details[0]->address.", ". $shipping_details[0]->city.",";
                								echo $shipping_details[0]->state.", ". $shipping_details[0]->country.",". $shipping_details[0]->pincode."<br>";
                									echo " <b>Landmark: &nbsp; &nbsp; </b>  ".$shipping_details[0]->landmark."<br>";
                									
                									if($shipping_details[0]->gst){
                									echo " <b>GST:  &nbsp;   &nbsp; </b>".$shipping_details[0]->gst."";
                									}
                									echo "</p>" ; 
                								?>
								            
							</td>
							<td></td>
							<td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
								            <?php 
								            
								                $billing_details =  $this->order_model->get_billing_data($ORDER[0]->id) ;
								            
								                if($billing_details) { ?>
								         
                								<?php 
                								
                								
                								
                							
                								
                								echo "<p><b>".$billing_details[0]->fname." ". $billing_details[0]->lname."</b>";
                								echo "<br> <b>Phone:   &nbsp; &nbsp;</b>".$billing_details[0]->phone."";
                								echo " <br><b>Address:  &nbsp; &nbsp;</b>". $billing_details[0]->address.", ". $billing_details[0]->city.",";
                								echo $billing_details[0]->state.", ". $billing_details[0]->country.",". $billing_details[0]->pincode."";
                									echo " <br><b>Landmark: &nbsp; &nbsp; </b> : ".$billing_details[0]->landmark."";
                									
                									if($billing_details[0]->gst){
                									echo "<br> <b>GST:  </b>".$billing_details[0]->gst."";
                									}
                								echo "</p>" ; 	
                								
                							}	?>
								            
								            
								        </td>
								    </tr>
								    	</tbody>
								</table>
				<br>
				<table cellspacing="0" cellpadding="0" border="1" width="100%" style="border:1px solid #eaeaea">
					<thead>
						<tr>							
							<th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px;text-align:center">Item</th>
							<th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px;text-align:center">Image</th>
							<th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px;text-align:center">Net Amount</th>
							<th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px;text-align:center">Tax Rate %</th>
							<th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px;text-align:center">Tax Amount</th>
							<th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px;text-align:center">Qty</th>
							<th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px;text-align:center">Total Amount</th>
						</tr>
					</thead>
					<tbody bgcolor="#F6F6F6">
					<?php if(count($items_data)>0){ ?>
					<?php foreach($items_data as $item): ?>
					
					<?php  $url =  $this->course_model->get_course_url($item->pro_id);?>
					 <?php $course_images = $this->course_model->select_course_images($item->pro_id);?>
						<tr>
							<td align="center" valign="top" style="padding:3px 9px"><a href="<?php echo $url ?>" target="blank"><?php echo $item->item; ?></a><br>
							
							</td align="center">
								<td style="padding:10px">
							    <?php if(count($course_images)>0){ ?>  
							 
                                 <img alt="<?php echo  $course_images[0]->img_tag?>" src="<?php echo base_url('uploads/course/'.$course_images[0]->image); ?>"  style="width:80px">
                                    <?php } else{ ?>
                                      
                                    <img src="<?php echo base_url('assets/front/images/course-no-image.jpg'); ?>" class="img-fluid blur-up lazyload "  alt="" style="width:80px">
                             
                            <?php } ?>
                
							</td>
							
							<td align="center" valign="top" style="padding:3px 9px"><?php echo CURRENCY_SYMBOL." ".round($item->price/1.12,1); ?><br>
							
							</td>
							<td align="center" valign="top" style="padding:3px 9px"> 12 % GST
							
							</td>

							<td align="center" valign="top" style="padding:3px 9px"><?php echo CURRENCY_SYMBOL." ".round($item->price*$item->qty-$item->price*$item->qty/1.12,1); ?><br>
							
							</td>
	 						
							<td align="center" valign="top" style="padding:3px 9px"><?php echo $item->qty; ?></td>
							<td align="center" valign="top" style="padding:3px 9px"><span><?php echo CURRENCY_SYMBOL." ".$item->sub_total; ?></span></td>
						</tr>
					<?php endforeach; ?>	
					<?php } ?>	
					</tbody>					
				    	<tfoot >
						<tr>
							<td colspan="6" align="right" style="padding:3px 9px">Subtotal</td>
							<td align="center" style="padding:3px 9px"><span><?php echo CURRENCY_SYMBOL." ".$ORDER[0]->total_amount; ?></span></td>
						</tr>
						<?php if(!empty($ORDER[0]->coupon)){ ?>
						<?php $coupon_data = json_decode($ORDER[0]->coupon); ?>
						<?php //print_r($coupon_data); ?>
						<tr>
							<td colspan="6" align="right" style="padding:3px 9px">Discount(<?php echo $coupon_data->discount; ?>%)</td>
							<td align="center" style="padding:3px 9px"><span>-<?php echo CURRENCY_SYMBOL." ".$ORDER[0]->discount_amount; ?></span></td>
						</tr>
						<?php } ?>
						<tr>
							<td colspan="6" align="right" style="padding:3px 9px"><strong>Grand Total</strong></td>
							<td align="center" style="padding:3px 9px"><strong><span><?php echo CURRENCY_SYMBOL." ".$ORDER[0]->final_amount; ?></span></strong></td>
						</tr>
					</tfoot>
				</table>
		
				<div class="row">
				   
				   
				     <div class="col-sm-6">
				        <div style="padding: 20px">
				            	<p> Reviews - We would love to see how the course looks at your place.Kindly share your valuable  Review.</p>
				            	<br>
				            	<img src="<?php echo base_url('images/Smartway Lighting (review) 1.png'); ?>" style="width: 25%;" >
				        </div>
				        
				    </div> 
				   
				</div>
			
			</td>
		</tr>
	
		
	</tbody>
</table>
									</div></div>
           
			</div>
        </div>
		</div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->  
<?php $this->load->view('admin/layout/footer'); ?>
</div>
<!-- ./wrapper -->
<?php $this->load->view('admin/layout/footer_js'); ?>
<script class="example">
function print_invoice(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
</body>
</html>
