<!doctype html>
<html>
  <?php $cms_page = $this->cms_model->get_cms_by_id(24);?>
 <title>   <?php  echo $cms_page[0]->meta_title; ?> </title>
    
    <meta name="description" content="<?php  echo $cms_page[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $cms_page[0]->meta_keyword; ?>">
      <link rel="canonical" href="<?php  echo $cms_page[0]->canonical; ?>">
<head>
<?php $this->load->view('front/layout/head'); ?>
</head>
<body>
<!--- Start Header -->
<?php $this->load->view('front/layout/header'); ?>
<!--- End Header -->



<!-- section start -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
 
            <div class="col-lg-12">
                <div class="dashboard-right">
                    <div class="dashboard">
                        <?php $link = $this->setting_model->get_all_setting();?>
                         <div class="row" style="padding:10px 0px">
                            <div class="col-sm-7">
                                <div class="page-title">
                                <h2>Order #<?php echo $ORDER[0]->id ?> </h2>
                            </div>
                             </div>
                            <div class="col-sm-5 ">
                                <button class="btn btn-primary btn-update " id="print_btn" onclick="return print_invoice('invoice_print'); " style="margin-bottom: 5px;">Print</button>
                                	
                            </div>
                            </div>
                            <hr>
                      
               
                       <div class="row">
							<div class="col-md-12">
								<div class="welcome-msg"> 
									<div class="table-responsive order-tabel" id="invoice_print">
										<?php
						
										$billing = $this->order_model->get_billing_data($ORDER[0]->id);
										$items_data = $this->order_model->get_item_data($ORDER[0]->id);
										?>
									
                            			   
                            			    	<table width="100%" >
                            			
                            					<tbody>
                            						<tr>
                            							<td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;" >
                            								 	<img src="<?php echo base_url('uploads/').$link[0]->logo; ?>" style="width:250px;" >
                            							</td>
                            						
                            							<td valign="top" style="text-align:right ; font-size:12px;padding:20px 9px 9px 9px;">
                            								<p> <strong> <?php echo $link[0]->phone; ?></strong><br>
                            							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> <?php echo $link[0]->email; ?></strong><br>
                            								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> <?php echo $link[0]->address_content; ?></strong>  <br>
                            								GST No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> <?php echo GSTNO ?></strong>  
                            								</p>
                            								
                            							
                            							</td>							
                            						</tr>
                            					</tbody>
                            				</table>        
                                                     
                                         
										<table bgcolor="#FFFFFF" cellspacing="0" cellpadding="10" border="1" width="100%" style="border:1px solid #e0e0e0">
											<tbody>		
												<tr >
													<td style="padding:15px;">
														<p>Order Information</p>
														<p><strong>Order Date</strong> : <?php echo date('d-m-Y H:i:s',strtotime($ORDER[0]->create_date)); ?></p>
														<p><strong>Order Status</strong> : <?php echo ucfirst($ORDER[0]->status); ?></p>				
													</td>
												</tr>
												<tr>
													<td border="0">
														<table cellspacing="0" cellpadding="0" border="1" width="100%" style="border:1px solid #eaeaea">
															<thead>
																<tr>
																
																	<th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em"> Billing Address</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																
																	<td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">
																		<strong>Name : </strong><?php echo $billing[0]->fname.' '.$billing[0]->lname; ?> <br>
																		<strong>Contact Number : </strong><?php echo $billing[0]->phone; ?><br>
																	<strong>Address : </strong> <?php echo $billing[0]->address.', '. $billing[0]->city.', '.$billing[0]->pincode.', '.$billing[0]->state.', '.$billing[0]->country; ?>
                                                                        <br>
                                                                       
																	</td>
																</tr>
															</tbody>
														</table>
														<br>
														<table cellspacing="0" cellpadding="0" border="1" width="100%" style="border:1px solid #eaeaea">
															<thead>
																<tr>							
																	<th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px;text-align:center">Item</th>
																
																	<th align="center" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px;text-align:center">Total Amount</th>
																</tr>
															</thead>
															<tbody bgcolor="#F6F6F6">
															<?php if(count($items_data)>0){ ?>
															<?php foreach($items_data as $item): ?>
													
																<tr>
																	<td align="center" valign="top" style="padding:3px 9px">
																	    <?php  $url =  $this->course_model->get_course_url($item->pro_id);?>
																	<a href="<?php echo $url ?>" target="blank"><?php echo $item->item; ?></a>
																		<br>
															
																	</td>
																	
																	<td align="center" valign="top" style="padding:3px 9px"><span><?php echo CURRENCY_SYMBOL." ".$item->sub_total; ?></span></td>
																</tr>
															<?php endforeach; ?>	
															<?php } ?>	
															</tbody>					
															<tfoot >
																<tr>
																	<td colspan="" align="right" style="padding:3px 9px">Subtotal</td>
																	<td align="center" style="padding:3px 9px"><span><?php echo CURRENCY_SYMBOL." ".$ORDER[0]->total_amount; ?></span></td>
																</tr>
																<?php if(!empty($ORDER[0]->coupon)){ ?>
																<?php $coupon_data = json_decode($ORDER[0]->coupon); ?>
																<?php //print_r($coupon_data); ?>
																<tr>
																	<td colspan="" align="right" style="padding:3px 9px">Discount(<?php echo $coupon_data->discount; ?>%)</td>
																	<td align="center" style="padding:3px 9px"><span>-<?php echo CURRENCY_SYMBOL." ".$ORDER[0]->discount_amount; ?></span></td>
																</tr>
																<?php } ?>
																<tr>
																	<td colspan="" align="right" style="padding:3px 9px"><strong> Total</strong></td>
																	<td align="center" style="padding:3px 9px"><strong><span><?php echo CURRENCY_SYMBOL." ".$ORDER[0]->final_amount; ?></span></strong></td>
																</tr>
															</tfoot>
														</table>
													
													</td>
												</tr>
												
											</tbody>
										</table>
									</div>

									<br>
								   </br>
									
								
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section end -->

<?php $this->load->view('front/layout/footer.php') ?>
<script>
$(document).ready(function(){
	$('#print_btn').click({
		//$('#invoice_print').print();
	});
	//$('#invoice_print').print();
});

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