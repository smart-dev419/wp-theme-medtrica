<div class="post-info">
<span class="post-by"><i class="fa fa-user"></i> <em><?php echo get_the_author(); ?></em></span>
<span class="post-date"><i class="fa fa-calendar-o"></i> <em><?php echo get_the_date('j-M-Y'); ?></em></span> 
<?php /*<span class="post-seen"><i class="fa fa-eye"></i> <em><?php echo tmget_total_pageviews(get_the_ID()); ?></em></span> */ ?>
</div>

<?php if(is_single()) { ?>

<div class="author_bio">
                
               <!--  <h3 style="font-weight: bold;margin-bottom: 20px;">About Author</h3> -->
                <?php $email =  get_the_author_meta( 'user_email'); ?>
           
                     <div class="comment-content">
                         <p> 
                         	<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"> <img alt="<?php the_author_meta( 'display_name'); ?>" src="<?php echo get_avatar_url($email); ?>"></a> 
                         	<?php echo nl2br(get_the_author_meta('description')); ?></p>
                     </div>
                     <div class="clearfix"></div>

			 <div class="related_post">
			 	<h3 style="font-weight: bold;">Related Posts</h3>
			 	<ul>
			     <?php
					$related = get_posts( array( 
						'category__in' => wp_get_post_categories($post->ID),
						'numberposts' => 2,
						'post__not_in' => array($post->ID) 
					));
					if( $related ) foreach( $related as $post ) {
						setup_postdata($post); ?>
			          <li> <a href="<?php the_permalink(); ?>"><?php the_title(); ?> </a></li>
				<?php } wp_reset_postdata(); ?>                
				      </ul>
				   </div>                   
</div>

<?php } ?>
<?php /*
<script type="text/javascript">
jQuery(document).ready(function(e) {
    jQuery(".blog-section .blog-left .post-row .post-content .post-info span").each(function(index, element) {
        if(jQuery(this).find("em").contents().length < 1){
			jQuery(this).css("display", "none");
			}
    });
});
</script>*/ ?>