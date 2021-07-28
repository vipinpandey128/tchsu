<?php $coupon = $this->session->userdata('coupon_data'); ?>
<html>
<head>
    <?php $cms_page = $this->cms_model->get_cms_by_id(17);?>
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
          <h1>Cart</h1>
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="#">Home</a>
            </li>
             <li class="list-inline-item">/</li>
            <li class="list-inline-item">
                Cart
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<main class="site-main woocommerce single single-product page-wrapper">
    <!--shop category start-->
    <section class="space-3">
    	<?php echo $this->session->flashdata('msg'); ?>		
		<?php if(count($CARTDATA)>0){ ?>

        <div class="container sm-center">
            <div class="row">
                <div class="col-lg-8">
                    <article id="post-6" class="post-6 page type-page status-publish hentry">
                        <!-- .entry-header -->
                        <div class="entry-content">
                            <div class="woocommerce"><div class="woocommerce-notices-wrapper"></div>
                                <form class="woocommerce-cart-form" action="#" method="">
                                    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                                        <thead>
                                        <tr>
                             
					                        <th scope="col">Type</th>
                                  <th scope="col">Name</th>
					                        <!-- <th scope="col">Price</th> -->
					                        <th scope="col">Total</th>
					                        <th scope="col">Remove</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $this->load->view('front/checkout/items'); ?>

                                        <tr>
                                            <td colspan="2" class="actions">
                                            	   <!-- <?php if(!$coupon){ ?>
                                            	   	<div class="coupon">
		                                                    <label for="coupon_code">Coupon:</label> 
		                                                    <input type="text" name="coupen" class="input-text coupeninput" id="coupon_code" value="" placeholder="Coupon code" placeholder="Enter Coupon Code"   minlength="10" maxlength="19"  id="coupen"  data-parsley-minlength="20" >
		                                                    <span class="input-group-addon applycoupen" type="submit" class="button" name="apply_coupon" >Apply </span>
		                                                    <p class="couponmsg" style="color: red; padding-top: 10px"></p>
		                                                </div>
													<br>
													<?php } ?>	 -->
					                        </td>
					                         <td  class="actions"></td>
					                         <td colspan="2" class="actions">
                                      
				                                <a href="<?php echo base_url('cart/empty_cart'); ?>">
				                                 <button type="button" class="button pull-right">
					                                	Clear Cart
					                                </button>
					                            </a>
                                             </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </div><!-- .entry-content -->
                    </article>
                </div>
                <div class="col-lg-4">
                    <div class="cart-collaterals">
                        <div class="cart_totals ">
                            <h2>Cart totals</h2>
                            <table cellspacing="0" class="shop_table shop_table_responsive">
                                <tbody>
                                <tr class="cart-subtotal">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal">
                                    	<span class="woocommerce-Price-amount amount">
                                    		<span class="woocommerce-Price-currencySymbol">
                                    			<?php echo CURRENCY_SYMBOL; ?>
                                    	    </span>
                                    	    <?php echo $this->cart->format_number($this->cart->total()); ?>
                                    	</span>
                                    </td>
                                </tr>
                                  <?php $discount_amount=0 ; ?>
			                    <?php $total_amount=$this->cart->total();?>
			                    <?php if(!empty($coupon) && is_array($coupon)){ ?>
			                    <?php $discount_amount=( $total_amount*$coupon[ 'discount'])/100; ?>
			                    <tr class="cart-subtotal">
			                        <td >
			                            <?php echo $coupon[ 'title'] ?> Discount: 
			                        </td>
			                         <td data-title="Subtotal"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo CURRENCY_SYMBOL; ?></span><?php echo CURRENCY_SYMBOL.$discount_amount ?></span></td>
			                    </tr>
			                    <tr>
			                    	<td>
			                    		<p  style="color: red; padding-top: 10px">Coupon Code Applied </p>
			                    	</td>
			                    </tr>
			                    <?php } ?>

                                <tr class="order-total">
                                    <th>Total</th>
                                    <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo CURRENCY_SYMBOL; ?></span><?php echo ($this->cart->format_number($total_amount-$discount_amount)); ?></span></strong> </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">

                            	 <a href="<?php echo base_url('checkout/onepage'); ?>" class="checkout-button button alt wc-forward" ><span> Proceed to checkout</span></a>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php } else{ ?> 
	    <div class="container">		
			<div class="empty-content text-center">		
				<img src="<?php echo base_url('assets/front/images/emptycart.png'); ?>">
				<h3>No courses in your cart.</h3>
				<br>
			
				<a href="<?php echo base_url(); ?>" >
                    <button class="btn btn-solid ">
                    	Continue Shopping
                    </button>
                </a>
						
				
			</div> 	
		</div>		
		<?php } ?>	

    </section>
    <!--shop category end-->
</main>


	<?php $this->load->view('front/layout/footer.php') ?>

    
    <script>
        $('.input-number').on('change', function(){ 

           var s = $(this);
           var a = parseInt($(this).val()) ;
           var b = parseInt($(this).attr('max')) ;
           var c = parseInt($(this).attr('data-value')) ;

           var id = $(this).attr('id');
           var classname = '.'+id;
           
         //  alert(id);


           if(a > b){

           alert("Sorry!!,  We have limited stock!!") ;  
            $(this).val(c);
                
           }else if (a==0) {
           	
              alert('Please put the value') ; 
                $(this).val(c);

           }else{

           		$(this).siblings().css('visibility','visible');
           		
           		$(classname).val(a);
           	    $(this).closest('form').submit();
           }
            
                 
        });
    </script>
    <script>
$(document).ready(function(){
	
	$(".applycoupen").on('click',function(){
		  var coupon = 	$('#coupen').val();

		  if(!coupon){
		  	 $('.couponmsg').html('Enter Coupon Code');
		  }
		  else{
		  	 $.ajax({
                url: "<?php echo base_url('checkout/apply_coupon') ?>",
                data : { coupon : coupon },
                type: "POST",
                 dataType: 'json',
                success: function(data) {
                     
                     if(data['error']==''){
                     	alert("Applied Successfully");
                     	location.reload();
                     }else{
                     	 $('.couponmsg').html(data['msg']);
                     }
                     
                       
                  }
                });
              return false ; 
		  }
              

          
      });


});


</script>
</body>
</html>