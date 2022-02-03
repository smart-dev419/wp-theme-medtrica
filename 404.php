<?php get_header(); ?>

<?php get_template_part( 'breadcrumb', 'index' ); ?>

<section id="maincontentwrap">
  <div class="innerpagewrap paddbt46px">
    <div class="container">
      <div class="row">
		
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
		 <div class="row notfndtext">
			<div class="col-sm-8 ltnotftext">
			<h2 class="nt-heading">404! Not Found</h2>
			<div class="row">
			<div class="col-sm-11">
			<p class="nt-foundmsg">The page you were looking for could not be found. Please use the navigation above or search to find what you are looking for.</p></div>
			</div>
			</div>
			<div class="col-sm-4"><img src="<?php echo get_template_directory_uri(); ?>/images/404.jpg" alt="404 not found"></div>
		</div>
		</div>
		<div class="col-sm-2"><!--Column left--></div>
		
		
	  <?php /*
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="pagetitle">
          <h1><span style="font-size: 80px;">404</span><br>Page Not Found</h1>
        </div>
        <p><?php _e( 'Sorry! The page you were looking for could not be found. Please use the navigation above or search to find what you are looking for.', 'rgcirc' ); ?></p>
        <div class="btn-row"><a href="<?php echo esc_url( home_url() ); ?>">Home <i class="fa fa-caret-right"></i></a> </div>
      </div>
	  */ ?>
    </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>