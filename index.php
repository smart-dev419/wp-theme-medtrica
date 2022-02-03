<?php get_header(); ?>

<?php get_template_part( 'breadcrumb', 'index' ); ?>



<section id="maincontentwrap">

  <div class="innerpagewrap paddbt46px">

    <div class="container">

      

      <div class="blog-section">

        <div class="blog-left">

          <?php /*

          <p>Find out all that is being said about us in media, and how people are joining us in bringing about the change. Know about the latest updates in CARE Internationa,l and access CARE's press releases. Keep in touch with the recent developments on project sites, events and success stories.</p>

          <p>The latest blogs from CARE India staff and partners around the world.</p>*/ ?>

        <?php
        if(is_author()) {  global $post;  $author_id = $post->post_author; ?>
         <h1 class="detalmainh_orng margenbt30">
          <strong><?php echo get_the_author_meta( 'display_name', $author_id ); ?> </strong></h1> 
        <?php echo get_the_author_meta( 'userdescription', $author_id );  ?>
          

          <ul class="post-list">

          <?php

          if ( have_posts() ) :

          $i = 1;

          while ( have_posts() ) : the_post();

            

            $postmeta = get_post_custom(get_the_ID());

            $post_image = $postmeta['blog_post_image'][0];

            

            /*if($i >= 3) {

              $featimage = wp_get_attachment_image_src($post_image, 'blog-thumb');

              $noimg = '389X231.jpg';

            } else {

              $featimage = wp_get_attachment_image_src($post_image, 'full');

              $noimg = '807X300.jpg';

            }*/

            $featimage = wp_get_attachment_image_src($post_image, 'blog-thumb');

            $noimg = '389X231.jpg';

            $sourceimage = $featimage[0];



            /*$content_img = get_the_content();

            preg_match_all('/<img[^>]+>/i',$content_img, $result); 

            //echo "<div class='contentthumb'>".$result[0][0]."</div>";

            $srcarr = explode('src="', $result[0][0]);

           

            $newsrcarr = explode('"', $srcarr[1]);          



            $image_url = $newsrcarr[0];



            // store the image ID in a var

            $image_id = tm_fisrt_get_image_id($image_url);

             

            // retrieve the thumbnail size of our image

            $image_thumb = wp_get_attachment_image_src($image_id, 'blog-thumb');

             

            if($sourceimage) {

              $imagesrc = $sourceimage;

            } else {

              $imagesrc = $image_thumb[0];

            }*/



            $imagesrc = $sourceimage;

            



            ?>

            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

              <div class="post-row">

                <div class="post-pic">

                  <?php if ( has_post_thumbnail() ) {

                    echo get_the_post_thumbnail( get_the_ID(), 'blog-thumb' );

                    } ?>

                </div>

                <div class="post-content"> <span class="post-cat"><i class="fa fa-list"></i>

                <?php

                $categories = get_the_category();

                if ( ! empty( $categories ) ) {

                    //echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';

                  echo esc_html( $categories[0]->name );

                }

                ?>

                </span>

                  <h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>

                  <p><?php echo tm_excerpt(get_the_content(), 370); ?> <a href="<?php the_permalink(); ?>">Read More</a></p>

                  

                  <?php get_template_part( 'author', 'meta' ); ?>

                </div>

              </div>

            </li>

            <?php



            $i++;

          endwhile;

          else :

            echo '<li>No Post Found!</li>';

          endif;



          ?>

          </ul>



          <?php }else{ ?>

        <h1 class="detalmainh_orng margenbt30"><strong>Blog</strong></h1>
          <ul class="post-list">

          <?php

          if ( have_posts() ) :

          $i = 1;

          while ( have_posts() ) : the_post();

            

            $postmeta = get_post_custom(get_the_ID());

            $post_image = $postmeta['blog_post_image'][0];


            $featimage = wp_get_attachment_image_src($post_image, 'blog-thumb');

            $noimg = '389X231.jpg';

            $sourceimage = $featimage[0];

            $imagesrc = $sourceimage;

            



            ?>

            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

              <div class="post-row">

                <div class="post-pic">

                  <?php if ( has_post_thumbnail() ) {

                    echo get_the_post_thumbnail( get_the_ID(), 'blog-thumb' );

                    } ?>

                </div>

                <div class="post-content"> <span class="post-cat"><i class="fa fa-list"></i>

                <?php

                $categories = get_the_category();

                if ( ! empty( $categories ) ) {

                  
                  echo esc_html( $categories[0]->name );

                }

                ?>

                </span>

                  <h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>

                  <p><?php echo tm_excerpt(get_the_content(), 370); ?> <a href="<?php the_permalink(); ?>">Read More</a></p>

                  

                  <?php get_template_part( 'author', 'meta' ); ?>

                </div>

              </div>

            </li>

            <?php



            $i++;

          endwhile;

          else :

            echo '<li>No Post Found!</li>';

          endif;



          ?>

          </ul>



       <?php    } /*

          <ul class="post-list">

            <li>

              <div class="post-row">

                <div class="post-pic"><img src="<?php echo get_template_directory_uri(); ?>/images/blog-post-example.jpg" alt=""></div>

                <div class="post-content"> <span class="post-cat"><i class="fa fa-list"></i> Disaster</span>

                  <h2><a href="#">Women and girls in the face of disasters</a></h2>

                  <p>Research across sectors in humanitarian work has demonstrated that disasters do not have the same impact on women, men, boys and girls of different age groups. The impact varies for marginalized sections of our communities who have already been facing the wrath of caste, religion, and ethnicity based discrimination during non-disaster times.  There are different needs due to the differential... <a href="#">Read More</a></p>

                  <div class="post-info"> <span class="post-by"><i class="fa fa-user"></i> Eilia Jafar</span> <span class="post-date"><i class="fa fa-calendar-o"></i> 3-Jan-2017</span> <span class="post-comments"><i class="fa fa-comment-o"></i> 2</span> <span class="post-like"><i class="fa fa-heart-o"></i> 10</span> <span class="post-seen"><i class="fa fa-eye"></i> 125</span> <span class="post-rating"><img src="<?php echo get_template_directory_uri(); ?>/images/star-img.png" alt=""></span> </div>

                </div>

              </div>

            </li>

            

          </ul>*/ ?>



          <?php 

          global $wp_query;

          $paged1 = (get_query_var('paged')) ? get_query_var('paged') : 1;

          $totalnumpages = $wp_query->max_num_pages;

          if($totalnumpages > 1) {

          ?>

          <div class="paginationrow">

          <p class="number-of-pages">Showing  <?php echo $paged1; ?> of <?php echo $totalnumpages; ?></p>



          <?php wp_pagenavi(); ?>

          </div>

          <?php } ?>



         

        </div>



        <?php get_sidebar(); ?>

        <?php /*

        <div class="blog-right">

          <div class="searchbox">

            <form>

              <div class="inputbox">

                <input placeholder="Search" type="text">

                <input type="button">

              </div>

            </form>

          </div>

          <div class="blk-title">Popular Articles</div>

          <div class="popular-articles">

            <ul>

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

              </li>

            </ul>

          </div>

          <div class="blk-title">Categories</div>

          <div class="category">

            <ul class="cat-list">

              <li><a href="#">Education <em>(15)</em></a></li>

              <li><a href="#">Health <em>(20)</em></a></li>

              <li><a href="#">Livelihood <em>(20)</em></a></li>

              <li><a href="#">Gender Transformative Change <em>(28)</em></a></li>

              <li><a href="#">Advocacy <em>(9)</em></a></li>

              <li><a href="#">Disaster <em>(19)</em></a></li>

            </ul>

          </div>

          <div class="blk-title">Most viewed</div>

          <div class="most-view">

            <ul class="most-view-list">

              <li>

                <div class="imgfield"><img src="<?php echo get_template_directory_uri(); ?>/images/Most-viewed-example.jpg" alt=""></div>

                <div class="articles-title"><a href="#">Things every child should be taught about gender, for an equitable society</a></div>

                <span class="articles-cat"><i class="fa fa-list"></i> Women</span><span class="date"><i class="fa fa-calendar-o"></i> 25-Jan-2017</span> </li>

              <li>

                <div class="imgfield"><img src="<?php echo get_template_directory_uri(); ?>/images/Most-viewed-example.jpg" alt=""></div>

                <div class="articles-title"><a href="#">Quality, the new mantra for small scale milk producers</a></div>

                <span class="articles-cat"><i class="fa fa-list"></i> Women</span><span class="date"><i class="fa fa-calendar-o"></i> 10-Oct-2016</span> </li>

              <li>

                <div class="imgfield"><img src="<?php echo get_template_directory_uri(); ?>/images/Most-viewed-example.jpg" alt=""></div>

                <div class="articles-title"><a href="#">I can also work as a smart nurse</a></div>

                <span class="articles-cat"><i class="fa fa-list"></i> Health</span><span class="date"><i class="fa fa-calendar-o"></i> 17-Aug-2016</span> </li>

            </ul>

          </div>

        </div>

        */ ?>



      </div>

    </div>

  </div>

  </div>

  </div>

</section>



<?php get_footer(); ?>