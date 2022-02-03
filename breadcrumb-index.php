<section class="breadcrumb">

	<div class="container"> 
<?php /* ?><div class="inner" itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><?php */ ?>
<div class="inner">
	<?php   $post_type = get_post_type();
	if( $post_type == 'page' || $post_type == 'post' || is_post_type_archive('product')) {
	if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb();
		}
	} else {
	if(function_exists('bcn_display')) {
		bcn_display();
		}
	}?>
	
</div>

		
	</div>

</section>