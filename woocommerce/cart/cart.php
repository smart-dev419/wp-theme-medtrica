<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.1.0
 */
@session_start();

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<?php /*
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>*/ ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.js"></script>

<?php


/*echo '<pre>LINE41';
print_r(WC()->cart->get_cart());
echo '</pre>';*/
$cartproductarr = array();
$i = 0;
foreach ( WC()->cart->get_cart() as $fcartkey => $fcartval ) {
	
	$item_data_cart = $fcartval['data'];
	$cart_post_attributes = $item_data_cart->get_attributes();

	$cart_product_info   = apply_filters( 'woocommerce_cart_item_product', $fcartval['data'], $fcartval, $fcartkey );
	
	$cartproductarr[$i]['product_name'] = get_the_title($fcartval['product_id']);
	$cartproductarr[$i]['product_attribues'] = $fcartval['cartin'];
	$i++;
}
/*echo '<pre>';
print_r($cartproductarr);
echo '</pre>';*/
//$postprod_data_sr = serialize($cartproductarr);
$postprod_data = base64_encode(serialize($cartproductarr));
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
     <form name="cart-enquire" id="cart-enquire" method="POST">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inquire for Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               
		<div class="form-group">
		<input type="text" name="yourname" id="yourname" value="" placeholder="Your Name *" class="form-control">
		</div>
		<div class="form-group">
		<input type="text" name="eemail" id="eemail" value="" placeholder="Email *" class="form-control">
		</div>
		<div class="form-group">
		<input type="text" name="phonemobile" id="phonemobile" value="" placeholder="Phone No." class="form-control">
		</div>

		<?php /*
		<div class="form-group">
		<input type="text" value="" placeholder="Message" class="form-control">
		</div>*/ ?>
		<input type="hidden" name="prodcart_data" id="prodcart_data" value='<?php echo $postprod_data; ?>'>
		
		<div class="form-group">
		<textarea name="commentsmessage" id="commentsmessage" placeholder="Message" class="form-control"></textarea>
		</div>
		
		<div class="form-group"><div class="input_box captcha_row"><em class="captcha_img">
                            <?php /*<img src="images/captcha-img.jpg" alt="" />*/ ?>
                            <img src="<?php echo esc_url( home_url() ); ?>/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' >
                            </em><input id="six_letters_code" name="six_letters_code" type="text" placeholder="Enter Code"><span id="captcha_validation" class="error <?php echo $classcaptcha; ?>"><?php echo $errors; ?></span><br>
							<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small></div>
				</div>


	   <div id="menuajaxdisplay"></div>


      </div>
      <div class="modal-footer">
      	<span class="cartajax_loader"></span>
      	<input type="RESET" class="btn btn-secondary" name="RESET">
      	<button id="sendenquire" class="btn btn-primary">SEND</button>        
      </div>
      </form>

<?php //echo do_shortcode('[contact-form-7 id="2242" title="INQUIRE FOR PRODUCTS -Pop Up Form" html_id="cart-enquire"]'); ?>



    </div>
  </div>
</div>
<?php

        $cartinfo = WC()->cart->get_cart();
        /*echo '<pre>';
        print_r($cartinfo);
        echo '</pre>';*/
        ?>
<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
	<?php do_action( 'woocommerce_before_cart_table' ); ?>

	<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
		<thead>
			<tr>
			<th class="space" width="2%">&nbsp;</th>
				<th class="product-thumbnail" width="12%"><?php _e( 'Product', 'woocommerce' ); ?></th>
				<th class="product-name" width="25%" >&nbsp;</th>
				<th class="product-name" width="50%"><?php _e( 'Selected Attributes', 'woocommerce' ); ?></th>
				<?php /*<th class="product-price"><?php _e( 'Price', 'woocommerce' ); ?></th>
				<th class="product-quantity"><?php _e( 'Quantity', 'woocommerce' ); ?></th>
				<th class="product-subtotal"><?php _e( 'Total', 'woocommerce' ); ?></th>*/ ?>
				<th class="product-remove" width="9%" style="text-align:center;">Remove</th>
				<th class="space" width="2%">&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			<?php do_action( 'woocommerce_before_cart_contents' ); ?>

			<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

				$item_data = $cart_item['data'];
    			$cart_attributes = $item_data->get_attributes();
    			$cartin = $cart_item['cartin'];
    			/*echo '<pre>';
    			print_r($cart_attributes);
    			echo '</pre>';*/
    			

				$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>
					<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

						<td class="space" width="2%">&nbsp;</td>
						<td class="product-thumbnail" width="12%" align="center">
							<?php
								/*echo '<pre>';
								print_r($product_id);
								echo '</pre>';*/
								//echo get_the_post_thumbnail( $product_id, 'woo_product_catalog_thumb' );

								$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

								if ( ! $product_permalink ) {
									echo $thumbnail;
								} else {
									printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
								}
							?>
						</td>

						<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>" width="25%" align="left">
							<?php
								if ( ! $product_permalink ) {
									echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;';
								} else {
									echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
								}

								// Meta data
								//echo WC()->cart->get_item_data( $cart_item );

								// Backorder notification
								if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
									echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>';
								}
							?>
						</td>
						
						<td width="50%" align="left">
						<?php
						if(!empty($cartin)){
							
							foreach ($cartin as $attkey => $attvalue) {
								$keylabel = explode('attribute_', $attkey);
								//print_r($keylabel[1]);
								$string = wc_attribute_label( $keylabel[1] );
								if($attvalue) {
									echo '<p class="attroption"><span style="font-size:12px; color:#7d7d7d;">'.$string.' : </span>'.$attvalue.'</p>';
								}
							}
						}

						/*echo '<pre>';
						print_r($cart_attributes);
						echo '</pre>';*/

						/*if(!empty($cart_attributes)){
							
							foreach ($cart_attributes as $attkey => $attvalue) {
								//$keylabel = explode('attribute_', $attkey);
								//print_r($keylabel[1]);
								$string = wc_attribute_label( $attkey );
								echo '<p class="attroption"><span style="font-size:12px; color:#7d7d7d;">'.$string.' : </span>'.urldecode($attvalue).'</p>';
							}
						}*/

						?>
						</td>
						<?php /*
						<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
							?>
						</td>

						<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->get_max_purchase_quantity(),
										'min_value'   => '0',
									), $_product, false );
								}

								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
						</td> ?>

						<td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
							<?php
								echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
							?>
						</td>*/ ?>
						<td class="product-remove" width="9%" align="center">
							<?php
								echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
									'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
									esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
									__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $_product->get_sku() )
								), $cart_item_key );
							?>
						</td>
						<td class="space" width="2%">&nbsp;</td>
					</tr>
					<?php
				}
			}
			?>

			<?php do_action( 'woocommerce_cart_contents' ); ?>

			<tr>
				<td colspan="6" class="actions">

					<?php if ( wc_coupons_enabled() ) { ?>
						<div class="coupon">
							<label for="coupon_code"><?php _e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'woocommerce' ); ?>" />
							<?php do_action( 'woocommerce_cart_coupon' ); ?>
						</div>
					<?php } ?>

					<div id="tabenquire">
					<?php /*<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>" />*/ ?>
					<!-- Button trigger modal -->
					<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					  Enquire Now
					</button> --> <div style="clear:both;">&nbsp;</div>
					<?php /*<button type="button" class="btn btn-primary stylecart_button" style="margin-right:30px; margin-bottom:12px;">Add More Products <i class="fa fa-fw"></i></button>*/ ?>
					<a class="btn btn-primary stylecart_button" href="<?php echo home_url(); ?>/products" style="margin-right:30px; margin-bottom:12px; color: #fff;">Add More Products <i class="fa fa-fw"></i></a>

					<button id="openenquirepop" type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary stylecart_button" style="margin-right:30px; margin-bottom:12px;">Enquire Now <i class="fa fa-fw"></i></button>

					<script type="text/javascript">
					jQuery(document).ready(function(){
						jQuery("#openenquirepop").click();
					});
					</script>

					</div>
					<?php do_action( 'woocommerce_cart_actions' ); ?>

					<?php wp_nonce_field( 'woocommerce-cart' ); ?>
				</td>
			</tr>

			<?php do_action( 'woocommerce_after_cart_contents' ); ?>
		</tbody>
	</table>
	<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
<?php /*
<div class="cart-collaterals">
	<?php
		/**
		 * woocommerce_cart_collaterals hook.
		 *
		 * @hooked woocommerce_cross_sell_display
		 * @hooked woocommerce_cart_totals - 10
		 *//*
	 	do_action( 'woocommerce_cart_collaterals' );
	?>
</div>*/ ?>

<?php do_action( 'woocommerce_after_cart' ); ?>
