<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php

$termid = get_queried_object()->term_id;
$btax = 'product_cat_'.$termid;
$cbanner_img = get_field('category_banner_image', $btax);
$download_link = get_field('download_link', $btax);
$download_link_2 = get_field('download_link_2', $btax);
$download_link_3 = get_field('download_link_3', $btax);

/*echo '<pre>';
print_r($cbanner_img);
echo '</pre>';*/

?>

	<?php get_template_part( 'breadcrumb', 'index' ); ?>

	<section id="maincontentwrap">
	<div class="detailmainrow">
    <div class="container">

    <!-- BOF Custom Woocommerce category herarchy display -->
	<div class="leftpaneldetail">
	    <?php if ( is_active_sidebar( 'sidebar-product-area' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-product-area' ); ?>

        <script type="text/javascript">
        	jQuery(document).ready(function(){
        		jQuery(".product-categories").children().each(function(){
	        		if(jQuery(this).hasClass("current-cat")){
	        			jQuery(".product-categories").prepend(jQuery(this).clone());
	        			jQuery(".product-categories li:first-child").show();
	        			jQuery(this).remove();
	        		}else if(jQuery(this).hasClass("current-cat-parent")){
	        			jQuery(".product-categories").prepend(jQuery(this).clone());
	        			jQuery(".product-categories li:first-child").show();
	        			jQuery(this).remove();
	        		}
        		}).show();
        	});
        </script>

        <?php endif; ?>
		
        <?php /*
	    <div class="blueheading text-uppercase">Product categories</div>
	    <div class="blockside">
	      <div class="sidemenu">
	        <ul>
	          <li class="active"><a href="#">Therapeutic Mattresses</a>
	            <ul>
	              <li><a href="#">Pressure Reducing</a></li>
	              <li><a href="#">Pressure Relief</a></li>
	            </ul>
	          </li>
	          <li><a href="#">Stretcher Mattresses</a></li>
	          <li><a href="#">Endoscopy & Respiratory</a></li>
	          <li><a href="#">O.R./Surgery Table Pads</a></li>
	          <li><a href="#">Patient Safety</a></li>
	          <li><a href="#">Overlay Pads</a></li>
	          <li><a href="#">Pediatric Products</a></li>
	          <li><a href="#">Psychiatric Mattresses</a></li>
	          <li><a href="#">Positioning Straps</a></li>
	          <li><a href="#">Positioning Pads</a></li>
	          <li><a href="#">Bariatric Products</a></li>
	          <li><a href="#">Medical Imaging / X-Ray Table Pads</a></li>
	        </ul>
	      </div>
	    </div>
	    */ ?>
	    <?php /*
	    <div class="blueheading text-uppercase">Similar categories</div>
	    <div class="blockside">
	      <div class="sidemenu">
	        <ul>
	          <li><a href="#">Mattress Covers</a></li>
	          <li><a href="#">Overlay Pads</a></li>
	          <li><a href="#">Bariatric Products</a></li>
	        </ul>
	      </div>
	    </div>
	    */ ?>

	    <?php 
	    /*echo 'LINE90';
	    echo '<pre>';
	    print_r($download_link);
	    echo '</pre>';*/
	    ?>
	    <?php if($download_link || $download_link_2 || $download_link_3) { ?>
	    <div class="blueheading text-uppercase">Downloads</div>
	    <div class="blockside">
	      <ul class="downloadsicon">
	      	<?php if($download_link) { ?>
	        <li><a href="<?php echo $download_link['url']; ?>" class="pdficon" target="_blank"><?php echo $download_link['title']; ?></a><i>&nbsp;</i></li>
	        <?php } ?>
	        <?php if($download_link_2) { ?>
	        <li><a href="<?php echo $download_link_2['url']; ?>" class="pdficon" target="_blank"><?php echo $download_link_2['title']; ?></a><i>&nbsp;</i></li>
	        <?php } ?>
	        <?php if($download_link_3) { ?>
	        <li><a href="<?php echo $download_link_3['url']; ?>" class="pdficon" target="_blank"><?php echo $download_link_3['title']; ?></a><i>&nbsp;</i></li>
	        <?php } ?>
	      </ul>
	    </div>
	    <?php } ?>
		<div class="g_review_badge">
			<a target="_blank" href="https://www.google.com/maps/place/Medtrica/@49.0660122,-122.696381,17z/data=!3m1!4b1!4m5!3m4!1s0x5485d1d655ea6469:0xba34573959fbbc49!8m2!3d49.0660122!4d-122.6941923?hl=en "><img class="alignleft size-medium wp-image-2417" src="https://medtrica.com/wp-content/uploads/2019/05/bestinbusiness.jpg" width alt="Google-Customer-Reviews" /></a>
		</div>
	  </div>
	  <!-- EOF Custom Woocommerce category herarchy display -->

	  <div class="rightpaneldetail">
	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		//do_action( 'woocommerce_before_main_content' );
	?>

    <?php /*<header class="woocommerce-products-header">*/ ?>

		<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

			<h1 class="woocommerce-products-header__title page-title detalmainh"><?php woocommerce_page_title(); ?></h1>

		<?php endif; ?>

		<?php if($cbanner_img) { ?>
			<p class="borderimgfull"><img src="<?php echo $cbanner_img['url']; ?>" alt="<?php echo $cbanner_img['alt']; ?>"></p>
		<?php } ?>
		
		<?php
			/**
			 * woocommerce_archive_description hook.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */

			do_action( 'woocommerce_archive_description' );

		?>

    <?php /*</header>*/ ?>

		<?php if ( have_posts() ) : ?>

			<?php
				/**
				 * woocommerce_before_shop_loop hook.
				 *
				 * @hooked wc_print_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				
				do_action( 'woocommerce_before_shop_loop' );

			?>

			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/**
						 * woocommerce_shop_loop hook.
						 *
						 * @hooked WC_Structured_Data::generate_product_data() - 10
						 */
						do_action( 'woocommerce_shop_loop' );
					?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

					
				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php
				/**
				 * woocommerce_no_products_found hook.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			?>

		<?php endif; ?>

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
	</div>

	<?php
	$args = array(
	              'post_type'     =>  'product',
	              'post_status'   =>  'publish',
	              'posts_per_page'  =>  8,
	              'orderby' => 'ID',
	              'order' => 'desc',
	              'meta_query'    => array(
	                array(
	                    'key'       => 'popular_product',
	                    'value'     => 1,
	                    'compare'   => '=',
	                )
	              )
	            );  

	            $loop = new WP_Query($args);

	if($loop->have_posts()) {
	?>
	<div class="popular-products-section padd46px">
	    <div class="container">
	      <h2 class="subheading-orang margenbt30 text-center">Popular Products</h2>
	      <div class="popular-list">
	        <div class="owl-carousel owl-theme">

	          <?php 
	          
	            while ( $loop->have_posts() ) : $loop->the_post();
	            ?>

	           <div class="item">
	            <figure>
	             <?php if ( has_post_thumbnail() ) { ?>
	              <?php echo get_the_post_thumbnail( get_the_ID(), 'woo_product_catalog_thumb' ); ?>
	              <?php /*<img src="<?php echo get_template_directory_uri(); ?>/images/popular-products-img1.jpg" alt="" />*/ ?>
	            <?php } else {
              	echo '<img src="'.get_template_directory_uri().'/images/no-img/210x204.png" alt="'.get_the_title().'" title="'.get_the_title().'">';
              } ?>
	            </figure>
	            
	            <div class="content">
	              <h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
	              <div class="datainfo">
	                <p><?php echo tm_excerpt(get_the_content(), 75); ?></p>
	                <?php /*<p>Why Dartex™ Cover Fabric?  Dartex™ stretch fabrics are unmatched in comfort,</p>*/ ?>
	              </div>
	            </div>
	            <p class="linkbtn"><a href="<?php echo get_permalink(); ?>">View Detail <i class="fa fa-fw"></i></a></p>
	          </div>
	            <?php endwhile; ?>
	        </div>
	      </div>

	      <script type="text/javascript">
	                jQuery(document).ready(function(e) {
	                    jQuery('.popular-list .owl-carousel').owlCarousel({
	                    loop:false,
	                    margin:28,
	                    dots: false,
	                    responsiveClass:true,
	                    items:5,
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
	                    })
	                });

	                </script> 
	    </div>
	  </div>
	  <?php wp_reset_query(); }  ?>
         


       

          <?php
	
	?>
	<div class="popular-products-section padd46px">
	    <div class="container">
 <?php   $term = get_queried_object();  
 $related_blogs= get_field( 'related_blog', $term ); 
if( $related_blogs){ ?>
	      <h2 class="subheading-orang margenbt30 text-center">Related Blog</h2>
	      <div class="popular-list rlatedblog">
	        <div class="owl-carousel owl-theme">
              <?php foreach( $related_blogs as $ac ){       ?>

	           <div class="item">
               <a href="<?php   echo $ac['url']; ?>">
	            <figure>
	              	               <img  src="<?php echo $ac['image']; ?>"  alt="">

	            </figure>
	            
	            <div class="content">
	              <h3><?php   echo $ac['title']; ?></h3>
	              <div class="datainfo">
	                <p><?php $descrip= $ac['description']; echo substr($descrip, 0, 50); ?></p>
	              
	              </div>
	            </div></a>
		          </div>
	            <?php } ?>
	        </div>
	      </div>
<?php } ?>
	      <script type="text/javascript">
	                jQuery(document).ready(function(e) {
	                    jQuery('.popular-list .owl-carousel').owlCarousel({
	                    loop:false,
	                    margin:28,
	                    dots: false,
	                    responsiveClass:true,
	                    items:5,
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
	                            items:4,
	                            nav:true,
	                            margin:30                   
	                        }
	                    }
	                    })
	                });

	                </script> 
	    </div>
	  </div>


	</section>

<?php get_footer( 'shop' ); ?>
