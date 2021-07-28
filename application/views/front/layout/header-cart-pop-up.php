 <ul class="show-div shopping-cart">
<?php $cart_content = $this->cart->contents(); ?>

	<?php if(count($cart_content)>0){ ?>

		<?php foreach($cart_content as $item){ ?>

	    <?php $course_images = $this->course_model->select_course_images($item['id']); ?>
	    <?php $pro_url = $this->course_model->get_course_url($item['id']);  ?>


		<li>
            <div class="media">
                <a href="#">
                	<?php if(count($course_images)>0){ ?>
						<img src="<?php echo base_url('uploads/course/'.$course_images[0]->image); ?>" class="mr-3">
					<?php } else { ?>
						<img src="<?php echo base_url('assets/front/images/course-no-image.jpg'); ?>" class="mr-3">
					<?php } ?>
                	
                </a>
                <div class="media-body">
                    <a href="#">
                        <h4><?php echo character_limiter($item['name'],14); ?></h4>
                    </a>
                    <h4><span><?php echo $item['qty']; ?> x <?php echo CURRENCY_SYMBOL." ".$item['price']; ?></span></h4>
                </div>
            </div>
            <div class="close-circle"><a href="<?php echo base_url('cart/remove_cart_item/'.$item['rowid']); ?>"><i class="fa fa-times" aria-hidden="true"></i></a></div>
        </li>
					
    	<?php } ?>
		<?php $discount_amount = 0; ?>
		<?php $total_amount = $this->cart->total(); ?>
		<?php if(!empty($coupon) && is_array($coupon)){ ?>

			<?php $discount_amount = ($total_amount*$coupon['discount'])/100;  ?>

		<?php } ?>
	
		 <li>
            <div class="total">
                <h5>subtotal : <span><?php echo CURRENCY_SYMBOL.($this->cart->format_number($total_amount-$discount_amount)); ?></span></h5>
            </div>
        </li>
        <li>
            <div class="buttons"><a href="<?php echo base_url('cart');?>" class="view-cart">view cart</a> <a href="<?php echo base_url('checkout/onepage'); ?>" class="checkout">checkout</a></div>
        </li>
	<?php }else{ ?>
	cart empty
<?php } ?>
</ul>
