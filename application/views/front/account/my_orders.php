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
                            <h2>Orders History</h2>
                        </div>
                    	<div class="row">
							<div class="col-md-12">
								<div class="welcome-msg"> 
									<div class="table-responsive order-tabel account-order">
										<?php if(count($ORDER)>0){ ?>
										<table class="table table-order">
										
											<tbody>
												<?php foreach($ORDER as $ord){ ?>
												<tr>
													<td>#<?php echo $ord->id; ?></td>
												
													<td><b>Payment Status:</b> <?php echo ucfirst($ord->payment_status); ?>
														<br>
														<a href="<?php echo base_url('user/view_order/'.$ord->id); ?>" class="" style="margin-top:0px;">View Invoice</a>
													</td>	
															
													<td>
														<b>Amount Paid :</b> <?php echo CURRENCY_SYMBOL.$ord->final_amount; ?></br>
														<?php echo date('d-M-Y H:i' , strtotime($ord->create_date)) ; ?>
														
														
													</td>
												</tr>	
												<?php } ?>
											</tbody>
										</table>
										<?php }else{ ?>
											You have no orders.
										<?php } ?>
									</div>
								</div>
							</div>
					    </div>    
                    	
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $this->load->view('front/layout/footer.php') ?>
</body>
</html>