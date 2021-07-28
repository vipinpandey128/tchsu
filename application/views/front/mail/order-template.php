<?php

$shipping = $this->order_model->get_shipping_data($ORDER[0]->id);

$billing = $this->order_model->get_billing_data($ORDER[0]->id);

$items_data = $this->order_model->get_item_data($ORDER[0]->id);

?>
	<?php $link = $this->setting_model->get_all_setting();?>
<table bgcolor="#FFFFFF" cellspacing="0" cellpadding="10" border="0" width="100%" style="border:1px solid #e0e0e0">

	<tbody>
	    
	    <tr>
		    <td>
		        
		        
		        	<table cellspacing="0" cellpadding="0" border="0" width="100%">

					<thead>

						<tr>

							<th align="left" width="300" >
							    
							 
							 </th>
							 <th align="left" width="50" >
							    
							    <h2><b>INVOICE</b></h2>
							 </th>
							 <th align="left" width="300" >
							  
                    			
							    	
							 </th>

						
						</tr>

					</thead>

				
				</table>
		    </td>
		
		
									
		</tr>
	    
	    
	  
		<tr>
		    <td>
		        
		        
		        	<table cellspacing="0" cellpadding="0" border="0" width="100%">

					<thead>

						<tr>

							<th align="left" width="325" >
							    
							    	<img src="<?php echo base_url('uploads/').$link[0]->logo; ?>" style="width: 50%;" >
							    	
							 </th>
							 <th align="left" width="325" >
							  
                    				<p>Contact No. <strong> <?php echo $link[0]->phone; ?></strong><br>
                    				Email.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> <?php echo $link[0]->email; ?></strong><br>
                    				Address.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> <?php echo $link[0]->address_content; ?></strong><br>	GST No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong> <?php echo GSTNO ; ?></strong></p>
                    	
							    	
							 </th>

						
						</tr>

					</thead>

				
				</table>
		    </td>
		
		
									
		</tr>
		<tr><td><hr> </td></tr>
				
	

		<tr>

			<td valign="top">

				<h1 style="font-size:22px;font-weight:normal;line-height:22px;margin:0 0 11px 0">Hello, <?php echo $USER['0']->fname.' '.$USER['0']->lname; ?></h1>

				<p style="font-size:12px;line-height:16px;margin:0">

					Thank you for your order from 

					<a href="<?php echo base_url(); ?>" target="_blank"><?php echo base_url(); ?></a>.

					If you have any questions about your <span class="m_6814414099775668911il">order</span> please contact us at <a href="mailto:<?php echo INFOMAIL; ?>" style="color:#ff5200" target="_blank"><?php echo INFOMAIL; ?></a>.

				</p>

				<p style="font-size:12px;line-height:16px;margin:0">Your order confirmation is below. Thank you again for your business.</p>

			</td>

		</tr>

		<tr>

			<td>

				<h2 style="font-size:18px;font-weight:normal;margin:0">Your Order #<?php echo $ORDER[0]->id; ?> <small>(placed on 
				
				<?php 
				date_default_timezone_set('Asia/Calcutta'); 
				echo date('d-m-Y H:i:s A'); ?>)</small></h2>

			</td>

		</tr>

		<tr>

			<td>

				<table cellspacing="0" cellpadding="0" border="0" width="100%">

					<thead>

						<tr>


							<th align="left" width="325" bgcolor="#EAEAEA" style="font-size:13px;padding:5px 9px 6px 9px;line-height:1em">Billing Address</th>

						</tr>

					</thead>

					<tbody>

						<tr>

					

							<td valign="top" style="font-size:12px;padding:7px 9px 9px 9px;border-left:1px solid #eaeaea;border-bottom:1px solid #eaeaea;border-right:1px solid #eaeaea">

								<strong>Name : </strong><?php echo $billing[0]->fname.' '.$billing[0]->lname; ?> <br>

								<strong>Contact Number : </strong><?php echo $billing[0]->phone; ?><br>

								<strong>Address : </strong> <?php echo $billing[0]->address.', '. $billing[0]->landmark.', '. $billing[0]->city.', '.$billing[0]->pincode.', '.$billing[0]->state.', '.$billing[0]->country; ?>
                                <br>
                                <?php if($billing[0]->gst){ ?>
							   <strong>GST : </strong> <?php echo $shipping[0]->gst; ?>
							   <?php } ?>
							</td>

						</tr>

					</tbody>

				</table>

				<br>

				<table cellspacing="0" cellpadding="0" border="0" width="100%" style="border:1px solid #eaeaea">

					<thead>

						<tr>

							<th align="left" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px;text-align:center">Item</th>
				
							

							<th align="right" bgcolor="#EAEAEA" style="font-size:13px;padding:3px 9px;text-align:center">Total Amount</th>

						</tr>

					</thead>

					<tbody bgcolor="#F6F6F6">

					<?php if(count($items_data)>0){ ?>

					<?php foreach($items_data as $item): ?>
               
						<tr>

							<td align="center" valign="top" style="padding:3px 9px"><?php echo $item->item; ?><br></td>
						

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

				<p style="font-size:12px;margin:0 0 10px 0"></p>

			</td>

		</tr>

		<tr>

			<td bgcolor="#EAEAEA" align="center" style="background:#eaeaea;text-align:center">

				<center>

					<p style="font-size:12px;margin:0">Thank you, <strong><a href="<?php echo base_url(); ?>" target="_blank" ><?php echo base_url(); ?></a></strong></p>

				</center>

			</td>

		</tr>

	</tbody>

</table>