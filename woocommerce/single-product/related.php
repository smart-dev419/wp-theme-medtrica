<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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

if ( $related_products ) : ?>

	<div class="popular-products-section similar-products padd46px">
		<div class="container">
			<h2 class="subheading-orang margenbt30 text-center">Similar Products</h2>

			<div class="popular-list">
				<div class="owl-carousel owl-theme">

					<?php 
					/*echo '<pre>';
					print_r(count($related_products));
					echo '</pre>';*/
					foreach ( $related_products as $related_product ) : ?>
						<?php
						$post_object = get_post( $related_product->get_id() );
					 	/*echo '<pre>';
						print_r($post_object->post_title);
						echo '</pre>';*/
						//setup_postdata( $GLOBALS['post'] =& $post_object );
						?>
					<div class="item">
						<figure>
						<?php if ( has_post_thumbnail($post_object->ID) ) { ?>
			              <?php echo get_the_post_thumbnail( $post_object->ID, 'woo_product_catalog_thumb' ); ?>
			            <?php } else {
			            	echo '<img src="'.get_template_directory_uri().'/images/no-img/210x204.png" alt="'.$post_object->post_title.'" title="'.$post_object->post_title.'">';
			            	} ?>
						
						</figure>
						<div class="content">
						<h3><a href="<?php echo get_the_permalink($post_object->ID); ?>"><?php echo $post_object->post_title; ?></a></h3>
						<div class="datainfo">
						<p><?php echo tm_excerpt($post_object->post_content, 75); ?></p>
						</div>
					</div>
					<p class="linkbtn"><a href="<?php echo get_the_permalink($post_object->ID); ?>">View Detail <i class="fa fa-fw"></i></a></p>
					</div>
					<?php endforeach; ?>

				</div>
			</div>

		</div>
	</div>

	<?php /*
	<section class="related products">
		<h2><?php esc_html_e( 'Related products', 'woocommerce' ); ?></h2>
		<?php woocommerce_product_loop_start(); ?>
			<?php foreach ( $related_products as $related_product ) : ?>
				<?php
				 	$post_object = get_post( $related_product->get_id() );
				 	/*echo '<pre>';
					print_r($post_object);
					echo '</pre>';*//*
					setup_postdata( $GLOBALS['post'] =& $post_object );
					wc_get_template_part( 'content', 'product' ); ?>
			<?php endforeach; ?>

		<?php woocommerce_product_loop_end(); ?>

	</section>*/ ?>

<?php endif;

wp_reset_postdata();
