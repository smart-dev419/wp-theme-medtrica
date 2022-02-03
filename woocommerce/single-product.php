<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
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
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<?php get_template_part( 'breadcrumb', 'index' ); ?>

<section id="maincontentwrap">
  <div class="detailmainrow">
    <div class="container">
      <?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		//do_action( 'woocommerce_before_main_content' );
	?>
      <?php while ( have_posts() ) : the_post(); ?>
      <?php wc_get_template_part( 'content', 'single-product' ); ?>
<?php /* ?>
      <script type="application/ld+json">
            {
              "@context": "http://schema.org/",
              "@type": "Product",
              "name": "<?php echo get_the_title(); ?>",
              "image": "<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>",
              "description": "<?php echo get_the_excerpt(); ?>",
              "brand": {
                "@type": "Thing",
                "name": "Medtrica"
              }
            }
          </script>
<?php */ ?>
      <?php endwhile; // end of the loop. ?>
      <?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action( 'woocommerce_after_main_content' );
	?>
      <?php
		/**
		 * woocommerce_sidebar hook.
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */
		//do_action( 'woocommerce_sidebar' );
	?>
    </div>
  </div>
  

  <?php

  $relatedargs = array(
    'posts_per_page' => 6,
  );

  woocommerce_related_products($relatedargs);


  ?>
  <script type="text/javascript">
                jQuery(document).ready(function(e) {
                    jQuery('.popular-list .owl-carousel').owlCarousel({
                    loop:false,
                    margin:28, dots: false,
                    responsiveClass:true,  items:5,
                    responsive:{
                        0:{
                            items:1,
                            nav:false
                        },
                        640:{
                            items:2,
                            nav:false,
                            margin:10
                            
                        },
                        768:{
                            items:3,
                            nav:true,
                            margin:10
                            
                        },
                        992:{
                            items:3,
                            nav:true,
                            margin:30
                            
                        },
                        1200:{
                            nav:true
                            
                        }
                    }
    });
                });
                </script> 


  
  
</section>
<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */

