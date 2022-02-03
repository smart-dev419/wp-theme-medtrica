<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product );

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" method="post" enctype='multipart/form-data'>
		
		<?php $attributesall = $product->get_attributes(); 

		if($attributesall) {
		?>

		<table class="variations" cellspacing="0">
		  <tbody>
		 <?php 

		foreach ( $attributesall as $attribute ) : ?>
		<?php
				$attribute_taxonomy = $attribute->get_taxonomy_object();
				$attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );
				/*echo '<pre>';
		      	print_r($attribute_taxonomy->attribute_name);
		      	echo '</pre>';*/

		      	$attrtaxname = $attribute_taxonomy->attribute_name;
				
		      ?>
			<tr>
				<td class="label"><label for="pa_<?php echo $attrtaxname; ?>"><strong><?php echo wc_attribute_label( $attribute->get_name() ); ?></strong></label></td>
			</tr>
			<tr class="attrvaluein">
				<td class="value">
					<select class="attrincart" name="cartin[attribute_pa_<?php echo $attrtaxname; ?>]" data-attribute_name="attribute_pa_<?php echo $attrtaxname; ?>" data-show_option_none="yes">
					<option value="">Choose an option</option>
					<?php foreach ( $attribute_values as $attribute_value ) {
						$value_name = esc_html( $attribute_value->name );
						?>
						<option value="<?php echo $value_name; ?>" class="attached enabled"><?php echo $value_name; ?></option>
					<?php } ?>
				</select>
				</td>
			</tr>

		<?php endforeach; ?>
		</tbody>
		</table>

		<?php } ?>
		
		<?php
			/**
			 * @since 2.1.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_button' );

			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_quantity' );

			woocommerce_quantity_input( array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $product->get_min_purchase_quantity(),
			) );

			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>

		<?php /* ?>
		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
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



	<script type="text/javascript">
		$(function() {
		    /*$("button.single_add_to_cart_button").click(function() {
		    	//alert('hello');
		        $("tr.attrvaluein").each(function() {
		        	
		        	var $select2 = $($(this).find("select.attrincart"));
		        	alert($select2);
		        	console.log($select2);
		            if($select2.val() == ""){
		                alert(this.value + " is a valid number");
		                return false;
		            } else {
		            	return true;
		            }
		        });
		        //return false;
		    });*/

		    $("button.single_add_to_cart_button").click(function() {
			    var counter = 0;
			    $("tr.attrvaluein").each(function() {
			    	var $select2 = $($(this).find("select.attrincart"));
			        if ($select2.val() == "") {
			        	//alert('hello');
			            $(this).addClass("redClass");
			            counter++;
			        } else {
			        	$(this).removeClass("redClass");
			        }
			    });
			    console.log(counter);

			    if(counter > 0){
			        alert("Please select the value.");
			        
			        return false;
			    }
			});

		});
	</script>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>
