<?php 
/* 
Template Name: Home
*/

get_header(); ?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
  $img_ratio = 0;
  $args = array(
    'post_type'     =>  'slides',
    'post_status'   =>  'publish',
    'posts_per_page'  =>  1,
    'orderby' => 'ID',
    'order' => 'desc'
  );  
  $loop = new WP_Query($args);
  while ( $loop->have_posts() ) : $loop->the_post(); 
  $thumbnail_id_slide = get_post_thumbnail_id( get_the_ID() );
  $img_data = wp_get_attachment_metadata($thumbnail_id_slide, false);

  $ratio = $img_data['height'] / $img_data['width'];
  if($img_ratio < $ratio){
    $img_ratio = $ratio;
  }

  endwhile; 
  wp_reset_query(); 
?>
<section class="home-banner" style="height: calc(100vw * <?php echo $img_ratio; ?>);">
<div class="owl-carousel owl-theme">
<?php
  $args = array(
    'post_type'     =>  'slides',
    'post_status'   =>  'publish',
    'posts_per_page'  =>  1,
    'orderby' => 'ID',
    'order' => 'desc'
  );  
  $loop = new WP_Query($args);
  while ( $loop->have_posts() ) : $loop->the_post(); 
  $sliderimage = tmget_featured_image_src(get_the_ID());
  $external_url = get_field('external_link');
  
  $thumbnail_id_slide = get_post_thumbnail_id( get_the_ID() );
  $alt_slide = get_post_meta($thumbnail_id_slide, '_wp_attachment_image_alt', true);

  $img_data = wp_get_attachment_metadata($thumbnail_id_slide, false);

  $ratio = $img_data['height'] / $img_data['width'];
  ?>
  <div class="item">
  <img alt="<?php echo $alt_slide; ?>" src="<?php echo $sliderimage; ?>" width="<?php echo $img_data['width'] ?>" height="<?php echo $img_data['height'] ?>" style="width: 100%; height: auto;">
  <div class="container">
      <div class="box">
        <div class="innside">
          <?php echo get_the_content(); ?>
        </div>
        <a href="<?php echo $external_url; ?>" class="linkbtn" target="_blank">Explore products<i></i></a> </div>
    </div>
</div>
  <?php endwhile; wp_reset_query(); ?>

</div>
</section>

<script type="text/javascript">
jQuery(document).ready(function(e) {
jQuery('.home-banner .owl-carousel').owlCarousel({
loop:true,
margin:0,
nav:false, items:1, dots: true,
autoplay:true,
autoplayTimeout:7000, smartSpeed: 1500,
autoplaySpeed:false,
autoplayHoverPause:false,
autoHeight : true
  });
});</script>

<section id="maincontentwrap" style="position: relative; z-index: 1;">
  <div class="product-categories-section padd46px">
    <div class="container">
      <h2 class="subheading-orang margenbt30 text-center">Product Categories</h2>
      <?php
      //$prodterms = get_terms( 'product_cat', 'hide_empty=0&parent=0' );
      $prodterms = get_terms( 'product_cat', 'hide_empty=0' );
      /*echo '<pre>';
      print_r($prodterms);
      echo '</pre>';*/
      ?>
      <ul>
      <?php
      foreach ($prodterms as $prodterm) {
      $btax = 'product_cat_'.$prodterm->term_id;
      $display_home = get_field('display_on_homepage', $btax);
      /*echo '<pre>';
      print_r($display_home);
      echo '</pre>';*/

        if($display_home == 1){
        $prodtermlink = get_term_link($prodterm);
        $thumbnail_id = get_woocommerce_term_meta( $prodterm->term_id, 'thumbnail_id', true ); 
        $catimage = wp_get_attachment_url( $thumbnail_id );
        $img_data = wp_get_attachment_metadata($thumbnail_id, false);
        	?>
        	<li>
            <div class="imgfiled" style="height: 68px;"><a href="<?php echo $prodtermlink; ?>">
              <?php if($catimage) { ?>
              <img src="<?php echo $catimage; ?>" alt="<?php echo $prodterm->name; ?>" title="<?php echo $prodterm->name; ?>" width="<?php echo $img_data['width'] ?>" height="<?php echo $img_data['height'] ?>" style="width: 68px; height: 68px;">
              <?php } else { ?>
              <img src="<?php echo get_template_directory_uri(); ?>/images/no-img/cat_noimg.jpg" alt="<?php echo $prodterm->name; ?>" title="<?php echo $prodterm->name; ?>" width="68" height="68" style="width: 68px; height: 68px;">
              <?php } ?>
            </a></div>
            <div class="titletext"><a href="<?php echo $prodtermlink; ?>"><?php echo $prodterm->name; ?></a></div>
            <div class="textcon">
              <p>
              <?php //echo tm_excerpt($prodterm->description, 55); ?>
              <?php //echo $prodterm->description; ?>
              </p>
            </div>
          </li>
        	<?php
        }
      }
 ?>

      </ul>
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
  <div class="aboutus-section padd46px">
    <div class="container">
      <?php the_content(); ?>
    </div>
  </div>
  <div class="popular-products-section padd46px">
    <div class="container">
      <h2 class="subheading-orang margenbt30 text-center">Popular Products</h2>
      <div class="popular-list"><p class="linkall"><a href="<?php echo home_url(); ?>/products/">View All <i class="fa fa-fw"></i></a></p>
        <div class="owl-carousel owl-theme">
          <?php 
            while ( $loop->have_posts() ) : $loop->the_post();  ?>
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
            <?php endwhile;  ?>

        </div>

      </div>

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
                    })
                });
                </script> 
    </div>
  </div>
  <?php 
  } 
  wp_reset_query(); 
  $args = array(
    'post_type'     =>  'post',
    'post_status'   =>  'publish',
    'posts_per_page'  =>  3,
    'orderby' => 'ID',
    'order' => 'desc',
  );  

  $loop = new WP_Query($args);
  if($loop->have_posts()) {
  ?>

  <div class="blog-updates-section padd46px">
    <div class="container">
      <h2 class="subheading-orang margenbt30 text-center">Blog Updates</h2>
      <ul>
        <?php while ( $loop->have_posts() ) : $loop->the_post();  ?>

            <li>
              <div class="titletext"><?php echo get_the_title(); ?></div>
              <div class="textcon">
                <p><?php echo tm_excerpt(get_the_content(), 230); ?></p>
              </div>
              <p class="linktext"><a href="<?php echo get_the_permalink(); ?>">Read More <i class="fa fa-fw"></i></a></p>
            </li>
            <?php endwhile;  ?>
      </ul>
      <p class="linkall"><a href="<?php echo home_url(); ?>/blog/">View All <i class="fa fa-fw"></i></a></p>
    </div>
  </div>
  <?php wp_reset_query(); } ?>
</section>
<?php endwhile;  endif; ?>

<?php get_footer(); ?>