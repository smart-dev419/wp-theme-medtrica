<?php
/**
 * Variable product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/variable.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */
 
@session_start();
 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
//$_SESSION = array();

global $product;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' );?>

<?php
/*

// custom work will do here 

<form class="cart" method="post" enctype='multipart/form-data'>
<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
</form>
*/
?>

<?php /*
<form class="variations_form cart" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo htmlspecialchars( wp_json_encode( $available_variations ) ) ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>

	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'woocommerce' ); ?></p>
	<?php else : ?>
		<table class="variations" cellspacing="0">
			<tbody>
				<?php 
				/*echo '<pre>';
				print_r($attributes);
				echo '</pre>';*//*

				foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<td class="label"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></td>
					</tr>	
					<tr>
						<td class="value attrbsingleval">
							<?php
								$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( stripslashes( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) ) : $product->get_variation_default_attribute( $attribute_name );
								wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
								echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) : '';
							?>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>

		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		<div class="single_variation_wrap">
			<?php
				/**
				 * woocommerce_before_single_variation Hook.
				 *//*
				do_action( 'woocommerce_before_single_variation' );

				/**
				 * woocommerce_single_variation hook. Used to output the cart button and placeholder for variation data.
				 * @since 2.4.0
				 * @hooked woocommerce_single_variation - 10 Empty div for variation data.
				 * @hooked woocommerce_single_variation_add_to_cart_button - 20 Qty and cart button.
				 *//*
				do_action( 'woocommerce_single_variation' );

				/**
				 * woocommerce_after_single_variation Hook.
				 *//*
				do_action( 'woocommerce_after_single_variation' );
			?>
		</div>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	<?php endif; ?>

	<?php do_action( 'woocommerce_after_variations_form' ); ?>
</form>
*/ ?>

<form class="cart" method="post" enctype='multipart/form-data'>

		<?php /*
		<table class="variations" cellspacing="0">
			<tbody>
				<?php 
				

				foreach ( $attributes as $attribute_name => $options ) : ?>
					<tr>
						<td class="label"><label for="<?php echo sanitize_title( $attribute_name ); ?>"><?php echo wc_attribute_label( $attribute_name ); ?></label></td>
					</tr>	
					<tr>
						<td class="value attrbsingleval">
							<?php
								$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( stripslashes( urldecode( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ) ) : $product->get_variation_default_attribute( $attribute_name );
								wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
								echo end( $attribute_keys ) === $attribute_name ? apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'woocommerce' ) . '</a>' ) : '';
							?>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
*/ ?>

		<table class="variations" cellspacing="0">
		  <tbody>
		 <?php 
			
		//$product = new WC_Product_Variable( $product->get_id() );
		/*$variations = $product->get_available_variations();
		$var_data = [];
		foreach ($variations as $variation) {
		if($variation['variation_id'] == $variation_id){
		$var_data[] = $variation['attributes'];
		}
		}	

		echo '<pre>';
		print_r($variations);
		echo '</pre>';*/

		foreach ( $attributes as $attrkey => $attribute ) : ?>
		<?php
				//$attribute_taxonomy = $attribute->get_taxonomy_object();
				//$attribute_values = wc_get_product_terms( $product->get_id(), '4-way-stretch-fabric-cover', array( 'fields' => 'all' ) );
				/*echo '<pre>';
		      	print_r($attribute_taxonomy->attribute_name);
		      	echo '</pre>';*/
		      	/*$getattrtaxval = get_term_by('slug', '4-way-stretch-fabric-cover', $attrkey);
				echo '<pre>';
				print_r($getattrtaxval);
				echo '</pre>';*/

		      	$attrtaxname = $attrkey;
				
		      ?>
			
			<tr>
				<td class="label"><label for="<?php echo $attrtaxname; ?>"><strong><?php echo wc_attribute_label( $attrkey ); ?></strong></label></td>
			</tr>
			<tr class="attrvaluein">
				<td class="value">
					<select class="attrincart allselectopts" name="cartin[attribute_<?php echo $attrtaxname; ?>]" data-attribute_name="attribute_<?php echo $attrtaxname; ?>" get-attr-vals="<?php echo $attrtaxname; ?>" data-show_option_none="yes">
					<option value="">Choose an option</option>
					<?php foreach ( $attribute as $attribute_value ) {
						$getattrtaxval = get_term_by('slug', $attribute_value, $attrkey);
						$value_name = $getattrtaxval->name;
						?>
						<option data-taxonomy='<?php echo 'attribute_'.$attrkey; ?>' data-slug='<?php echo $attribute_value; ?>' value='<?php echo $value_name; ?>' class="attached enabled"><?php echo $value_name; ?></option>
					<?php } ?>
				</select>
				</td>
			</tr>

		<?php endforeach; ?>
		</tbody>
		</table>			

		<?php /* ?>
		<button type="submit" onclick="ga('send', 'event', { eventCategory: 'Add to Inquire Cart', eventAction: 'Click/Touch', eventLabel: 'Body'});" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
		<?php */ ?>

		<?php
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_button' );
		?>
	</form>
	

	<?php /*cart enquire new code starts*/

		//if($_SERVER['REMOTE_ADDR'] == '122.180.209.147')
		//{
	
			?>
			<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.validate.js"></script>
			
			<!-- <button id="newenquirevar" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal24">Enquire Now</button> -->

			<button data-toggle="modal" data-target="#myModal24" id="newenquirevar" type="button" onclick="ga('send', 'event', { eventCategory: 'Inquire Now', eventAction: 'Click/Touch', eventLabel: 'Body'});"  class="single_add_to_cart_button button alt newinquirebtn"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

			<!-- Modal -->
			<!-- Modal -->
			<div class="modal fade" id="myModal24" tabindex="-1" role="dialog" aria-labelledby="myModal24Label" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      
			     <form name="product-enquire-fm" id="product-enquire-fm" method="POST">
			      <div class="modal-header">
			        <h5 class="modal-title" id="myModal24Label">Inquire for Products</h5>
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
					<input type="hidden" name="product_sku_sel" id="product_sku_sel" value=''>
					<input type="hidden" name="product_id_fld" id="product_id_fld" value='<?php echo get_the_id(); ?>'>
					<div class="form-group">
					<textarea name="commentsmessage" id="commentsmessage" placeholder="Message" class="form-control"></textarea>
					</div>
					<div class="form-group"><div class="input_box captcha_row"><em class="captcha_img">
                    <img src="<?php echo esc_url( home_url() ); ?>/captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' >
                    </em><input id="six_letters_code" name="six_letters_code" type="text" placeholder="Enter Code"><span id="captcha_validation" class="error <?php echo $classcaptcha; ?>"><?php echo $errors; ?></span><br>
					<small>Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh</small></div>
					</div>
				   <div id="menuajaxdisplay"></div>
			      </div>
			      <div class="modal-footer">
			      	<span class="productajax_loader"></span>
			      	<input type="RESET" class="btn btn-secondary" name="RESET">
			      	<button id="sendenquire" class="btn btn-primary">SEND</button>        
			      </div>
			      </form>
			    </div>
			  </div>
			</div>
		<?php

	
		
		//}

		/*cart enquire new code ends*/ ?>

<script type="text/javascript" >
	jQuery(document).ready(function($) {
		$("tr.attrvaluein").each(function() {
			
			$(this).find(".attrincart").change(function(){
				$('.sku').html('<span>Loading...</span>');
				//var attrcart = $(this).attr("data-slug");
				//var attrcart = $(this).data("slug");
				var attrcart = $(this).find(':selected').data('slug');
				var attrtax = $(this).find(':selected').data('taxonomy');
				//alert(attrcart);

				var data = {
					action: 'my_changing_sku_new',
					product_id: <?php echo get_the_ID(); ?>,
					attrslug: attrcart,
					attrtaxonomy: attrtax
				};
				$.post('<?php echo esc_url( home_url() ); ?>/wp-admin/admin-ajax.php', data, function(response) {
					// alert('Got this from the server: ' + response);
					$('.sku').html(response);
					$('.product_sku').val(response);
				});

			});
			/*$($(this).("select.attrincart")).change(function(){
				alert($(this).val());
			}*/
		});
	});
</script>

<script type="text/javascript" >
jQuery(document).ready(function($) {
    $('.attrbsingleval select').change(function(){
     
     $('.sku').html('<span>Loading...</span>');

     setTimeout(function(){ 
      var variation_id = jQuery( 'input[name="variation_id"]' ).val();
      //alert(variation_id);

		var data = {
			action: 'my_changing_sku',
			product_id: <?php echo get_the_ID(); ?>,
			id: variation_id
		};
		$.post('<?php echo esc_url( home_url() ); ?>/wp-admin/admin-ajax.php', data, function(response) {
			// alert('Got this from the server: ' + response);
			$('.sku').html(response);
		});


       }, 300);
    });
});
</script>
<?php
do_action( 'woocommerce_after_add_to_cart_form' );