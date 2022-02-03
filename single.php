<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'breadcrumb', 'index' ); ?>



<section id="maincontentwrap">

  <div class="innerpagewrap paddbt46px">

    <div class="container">

      <h1 class="detalmainh_orng margenbt30"><strong><?php echo get_the_title(); ?></strong></h1>

      <div class="blog-section blog-details">

        <div class="blog-left">

          <div class="post-row bordernone">

            <div class="post-content">

              <?php

              $categories = get_the_category();

              if ( ! empty( $categories ) ) { ?>

              <span class="post-cat"><i class="fa fa-list"></i> 

              <?php 

              //echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';

                echo esc_html( $categories[0]->name );

              ?>

              </span>

              <?php } ?>


				<figure><?php the_post_thumbnail(); ?></figure>
              <?php the_content(); ?>

           
              <?php echo do_shortcode('[faq-qa]'); ?>
             

              <?php get_template_part( 'author', 'meta' ); ?>
              <?php /*
              <div class="post-info"> <span class="post-by"><i class="fa fa-user"></i> Eilia Jafar</span> <span class="post-date"><i class="fa fa-calendar-o"></i> 3-Jan-2017</span> <span class="post-comments"><i class="fa fa-comment-o"></i> 2</span> <span class="post-like"><i class="fa fa-heart-o"></i> 10</span> <span class="post-seen"><i class="fa fa-eye"></i> 125</span> <span class="post-rating"><img src="<?php echo get_template_directory_uri(); ?>/images/star-img.png" alt=""></span> </div>
              */ ?>


            </div>

          </div>

          <?php /*
          <div class="social-share"> <span>Share this:</span><br>

            <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/social-share-icon.jpg" alt=""></a> </div>
            */ ?>

          <div class="next-prev-links">
          <span class="prevlink"><?php previous_post_link('%link', '<i class="fa fa-fw"></i>Prev Post'); ?> </span>
          <span class="nextlink"><?php next_post_link('%link', 'Next Post<i class="fa fa-fw"></i>'); ?></span>
          </div>


          <div class="commentdisplay">
          <?php 
          // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;

          ?>
          </div>
          <?php /*
          <div class="next-prev-links"> <span class="prevlink"><a href="#" rel="prev"><i class="fa fa-fw"></i>Prev Post</a> </span> <span class="nextlink"><a href="#" rel="next">Next Post<i class="fa fa-fw"></i></a></span></div>
          */ ?>

        </div>

        <?php get_sidebar(); ?>

    </div>

  </div>

  </div>

  </div>

</section>

<?php endwhile; ?>

<?php endif; ?>



  
  <?php
$related = get_posts( 
    array( 
        'category__in' => wp_get_post_categories( $post->ID ), 
        'numberposts'  => 5, 
        'post__not_in' => array( $post->ID ) 
    ) 
);

//print_r($related); 
?>

  <div class="popular-products-section padd46px">
    <div class="container">
      <h2 class="subheading-orang margenbt30 text-center">Related Post</h2>
      <div class="popular-list">
        <div class="owl-carousel owl-theme">
          <?php      if( $related ) { 
    foreach( $related as $post ) {
        setup_postdata($post); ?>
           <div class="item">

            <figure>
             <?php if ( has_post_thumbnail() ) { ?>
              <?php echo get_the_post_thumbnail(); ?>
              
            <?php } else { echo get_the_post_thumbnail();
              echo '<img src="'.get_template_directory_uri().'/images/no-img/210x204.png" alt="'.get_the_title().'" title="'.get_the_title().'">';
              } ?>
            </figure>
            
            <div class="content">
              <h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
              <div class="datainfo">
                <p><?php echo tm_excerpt(get_the_content(), 75); ?></p>
              </div>
            </div>
            <p class="linkbtn"><a href="<?php echo get_permalink(); ?>">View Detail <i class="fa fa-fw"></i></a></p>
          </div>
                       <?php     }
    wp_reset_postdata();
} ?>

        </div>

      </div>

      <script type="text/javascript">

                jQuery(document).ready(function(e) {
                    jQuery('.popular-list .owl-carousel').owlCarousel({
                    loop:false,
                    margin:28, dots: false,
                    responsiveClass:true,  items:4,
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

  
<?php get_footer(); ?>