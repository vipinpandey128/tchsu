

<?php foreach($CARTDATA as $item){ ?>
<input type="hidden" name="rowid[]" value="<?php echo $item['rowid'] ?>" />
 <input type="hidden"  id="qty<?php echo $item['rowid']; ?>" class="form-control input-number input-text qty text" value="<?php echo $item['qty']; ?>" data-value="<?php echo $item['qty']; ?>" min="1" max="<?php echo $item['max_course'] ?>">

<?php $course = $this->course_model->get_course_by_id($item['id']); ?>
<tr class="woocommerce-cart-form__cart-item cart_item">


    <td class="product-name" data-title="Product">

        <a href="javascript:void(0)"><?php echo $item['type']; ?></a>

    </td>

    <td class="product-name" data-title="Product">

       	<a href="javascript:void(0)"><?php echo $item['name']; ?></a>

    </td>
   <!--  <td class="product-price" data-title="Price">
         <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo CURRENCY_SYMBOL; ?></span><?php echo number_format($item['price']); ?></span>
    </td> -->
    <td class="product-subtotal" data-title="Total">
        <span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo CURRENCY_SYMBOL; ?></span><?php echo number_format($item['subtotal']); ?></span>
    </td>
	<td class="product-remove text-center">
       <a href="<?php echo base_url('cart/remove_cart_item/'.$item['rowid']); ?>" class="remove" aria-label="Remove this item" data-product_id="30" data-product_sku="">×</a>	
       <input type="hidden" name="qty[]" class="qty<?php echo $item['rowid']; ?>" value="<?php echo $item['qty']; ?>" > 	
    </td>

</tr>


<?php } ?>

