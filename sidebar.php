<div class="blog-right">
  <div class="searchbox">
    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	    <div class="inputbox">
	        <input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	        <input type="submit" class="search-submit" value="<?php echo esc_attr_x( '', 'submit button' ) ?>" />
	    </div>
	</form>
  </div>

  <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
  <?php dynamic_sidebar( 'sidebar-1' ); ?>
  <?php endif; ?>
  
  <div class="blk-title">Popular Articles</div>
  <div class="popular-articles">
    <ul>


      <?php 
          $args = array(
              'post_type'     =>  'post',
              'post_status'   =>  'publish',
              'posts_per_page'  =>  3,
              'orderby' => 'ID',
              'order' => 'desc'
            );  

            $loop = new WP_Query($args);

            while ( $loop->have_posts() ) : $loop->the_post();
            $categories = get_the_category();
            ?>

           <li>
              <div class="imgfield">
              <?php if ( has_post_thumbnail() ) {
                echo get_the_post_thumbnail( get_the_ID(), 'blog_sidebar_thumb' );
              } ?>
              <?php /*<img src="<?php echo get_template_directory_uri(); ?>/images/popular-articles-example.jpg" alt="">*/ ?>
              </div>
              <div class="content"> 
              <?php if ( ! empty( $categories ) ) { ?>
              <span class="articles-cat">
              <i class="fa fa-list"></i> <?php echo esc_html( $categories[0]->name ); ?>
              </span>
              <?php } ?>

                <div class="articles-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></div>
                <span class="date"><i class="fa fa-calendar-o"></i> <?php echo get_the_date(); ?></span> </div>
            </li>

            <?php endwhile; wp_reset_query(); ?>

            <?php /*
      <li>
        <div class="imgfield"><img src="<?php echo get_template_directory_uri(); ?>/images/popular-articles-example.jpg" alt=""></div>
        <div class="content"> <span class="articles-cat"><i class="fa fa-list"></i> Health</span>
          <div class="articles-title"><a href="#">From a housewife to a working woman</a></div>
          <span class="date"><i class="fa fa-calendar-o"></i> 13-Jan-2017</span> </div>
      </li>
      <li>
        <div class="imgfield"><img src="<?php echo get_template_directory_uri(); ?>/images/popular-articles-example.jpg" alt=""></div>
        <div class="content"> <span class="articles-cat"><i class="fa fa-list"></i> Health</span>
          <div class="articles-title"><a href="#">Timely help and counselling saves new-born from neonatal sepsis</a></div>
          <span class="date"><i class="fa fa-calendar-o"></i> 10-Nov-2016</span> </div>
      </li>
      <li>
        <div class="imgfield"><img src="<?php echo get_template_directory_uri(); ?>/images/popular-articles-example.jpg" alt=""></div>
        <div class="content"> <span class="articles-cat"><i class="fa fa-list"></i> Livelihood</span>
          <div class="articles-title"><a href="#">There is no smallholder agriculture without women</a></div>
          <span class="date"><i class="fa fa-calendar-o"></i> 03-Nov-2016</span> </div>
      </li>*/ ?>

    </ul>
  </div>


  <?php /*if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

  <?php dynamic_sidebar( 'sidebar-2' ); ?>

  <?php endif;*/ ?>



  </div>

</div>