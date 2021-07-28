<?php foreach($this->cart->contents() as $item){ ?>
 <tr class="cart_item">
	<td class="product-name">
	<?php echo $item['name']; ?>
	</td>
	<td class="product-total">
	<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><?php echo CURRENCY_SYMBOL ?></span><?php echo $this->cart->format_number($item['subtotal']); ?></span>						
	</td>
</tr>
<?php } ?>