<?php $coupon = $this->session->userdata('coupon_data'); ?>
<html>
<head>
    <?php $cms_page = $this->cms_model->get_cms_by_id(27);?>
 <title>   <?php  echo $cms_page[0]->meta_title; ?> </title>
    
    <meta name="description" content="<?php  echo $cms_page[0]->meta_description ; ?>">
    <meta name="keywords" content="<?php  echo $cms_page[0]->meta_keyword; ?>">
    
    
<?php $this->load->view('front/layout/head'); ?>
<style></style>
</head>
<body id="top-header">
<?php $this->load->view('front/layout/header'); ?>
<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-xl-8">
        <div class="title-block">
          <h1>Checkout</h1>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="#">Home</a>
            </li>
             <li class="list-inline-item">/</li>
            <li class="list-inline-item">
                Checkout
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $user_id = $this->session->userdata('USER_ID'); ?>
<?php $userdata = $this->user_model->get_user_by_id($user_id);?>
</section>


<main class="site-main woocommerce single single-product page-wrapper">
    <!--shop category start-->
    <section class="space-3">
        <div class="container">
            <div class="row">
                <section id="primary" class="content-area col-lg-12">
                    <main id="main" class="site-main" role="main">
                        <article id="post-8" class="post-8 page type-page status-publish hentry">
                            <div class="entry-content">

                             

                                    <div class="woocommerce-notices-wrapper"></div>
                                    <form name="checkout" method="post" class="checkout woocommerce-checkout row" enctype="multipart/form-data" novalidate="novalidate">
                                        <div class="col-lg-7 col-xl-7">
                                            <div class="col2-set" id="customer_details">
                                                <div class="col-12">
                                                    <div class="woocommerce-billing-fields">
                                                        <h3>Billing details</h3>

                                                        <div class="woocommerce-billing-fields__field-wrapper">
                                                        		<div class="row">
									
															<div class="col-sm-6">
																<div class="form-group">
																	<label  class="field-label">First Name <?php echo $userdata[0]->fname ?> <span style="color:red"> * </span> :</label>
																	<input type="text" class="form-control"  name="bfname" value="<?php echo $userdata[0]->fname ?>" required>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<label  class="field-label">Last Name:</label>
																	<input type="text" class="form-control"  name="blname"  value="<?php echo @$userdata[0]->lname ?>" >
																</div>
															</div>
															<div class="clearfix"></div>
															<div class="col-sm-6">
																<div class="form-group">
																	<label  class="field-label">Contact No. <span style="color:red"> * </span> :</label>
																	<input type="text" class="form-control" name="bcontact_no" minlength="10" maxlength="10"   required data-parsley-minlength="10"  data-parsley-type="digits" data-parsley-trigger="keyup" value="<?php echo @$userdata[0]->contact_no ?>" >
																</div>
															</div>
														
															
															<div class="clearfix"></div>
													
															<div class="col-sm-6">
																<div class="form-group">
																	<label  class="field-label">City <span style="color:red"> * </span> :</label>
																	<input type="text" class="form-control" name="bcity" value="<?php echo @$userdata[0]->city ?>" required>
																</div>
															</div>
															<div class="col-sm-6">
																<div class="form-group">
																	<label  class="field-label">State <span style="color:red"> * </span> :</label>
																	<input type="text" class="form-control" name="bstate"value="<?php echo @$userdata[0]->state ?>" required>
																	<input type="hidden" class="form-control" name="bcountry"value="India" required>
																</div>
															</div>
															
															<div class="col-sm-6">
																<div class="form-group">
																	<label  class="field-label">Pincode <span style="color:red"> * </span> :</label>
																	<input type="text" class="form-control" name="bpincode" minlength="6" maxlength="6" data-parsley-type="digits" value="<?php echo @$userdata[0]->zip ?>"  required>
																</div>
															</div>
														
															<div class="col-sm-12">
																<div class="form-group">
																	<label  class="field-label">Address <span style="color:red"> * </span> :</label>
																	<input type="text" class="form-control" name="baddress" value="" required>

																</div>
																<div class="clearfix"></div>		
															</div>

												
												
														</div>

													
					                                                           
                                                        </div>

                                                    </div>

                                                </div>

                                              
                                            </div>
                                        </div>

                                        <div class="col-lg-5 col-xl-5">
                                            <div id="order_review" class="woocommerce-checkout-review-order">
                                                <h3 id="order_review_heading">Your order</h3>
                                                <table class="shop_table woocommerce-checkout-review-order-table">
                                                    <thead>
                                                    <tr>
                                                       	<th scope="col">Course Name</th>
														
														<th>Subtotal</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    	<?php $this->load->view('front/checkout/onpage-items'); ?>	
                                                
                                                   
                                                    </tbody>
                                                    <tfoot>

                                                    <tr class="cart-subtotal">
                                                        <th>Subtotal</th>
                                                        <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo CURRENCY_SYMBOL; ?></span><?php echo  $this->cart->format_number($this->cart->total()); ?></span></td>
                                                    </tr>

                                                    <?php $discount_amount = 0; ?>
														<?php $total_amount = $this->cart->total();  ?>
														<?php if(!empty($coupon) && is_array($coupon)){ ?>
														<?php $discount_amount = ($total_amount*$coupon['discount'])/100;  ?>

													 <tr class="cart-subtotal">
													 	 <th> <?php echo $coupon['title'] ?> Discount</th>
													 	  <td><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">><?php echo CURRENCY_SYMBOL; ?></span><?php echo $discount_amount; ?></span></td>
													 </tr>
												
												     <?php } ?>



                                                    <tr class="order-total">
                                                        <th>Total</th>
                                                        <td><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo CURRENCY_SYMBOL; ?></span><?php echo $this->cart->format_number($total_amount-$discount_amount); ?></span></strong> </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>

                                                <div id="payment" class="woocommerce-checkout-payment">
                                                  
                                                    <div class="form-row place-order">
                                               

                                                        <div class="woocommerce-terms-and-conditions-wrapper">
                                                        	<div class="woocommerce-privacy-policy-text">
                                                        	<input type="checkbox" name="term"  required>  Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our
																	<a class="woocommerce-privacy-policy-link" target="_blank"  href="<?php echo base_url(); ?>return-policy" target="_blank"> privacy Policy. </a>
																</div>

                                                   
                                                        </div>

                                                        <button type="submit" name="order_palce"  class="button alt"  id="place_order" value="Place order" data-value="Place order">Place order</button>
                                                      	</div>
                                                </div>

                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div><!-- .entry-content -->

                        </article><!-- #post-## -->

                    </main><!-- #main -->
                </section>
            </div>
        </div>
    </section>
    <!--shop category end-->
</main>


<?php $this->load->view('front/layout/footer.php') ?>
<script src="<?php echo base_url('assets/admin/parsley/parsley.js'); ?>"></script>

</body>
</html>