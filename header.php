<!DOCTYPE html>

<html lang="en">

<head>

<!-- Required meta tags -->

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta content='no' name='apple-mobile-web-app-capable'>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title><?php wp_title(' '); ?><?php /*if(wp_title(' ', false)) { echo ' -'; } ?> <?php bloginfo('name');*/ ?></title>
 <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon" />

<?php wp_head(); ?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/4.0.0-beta-bootstrap.min.css">
<script defer src="https://use.fontawesome.com/686cfbd2f9.js"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.min.css">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.default.min.css">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/jquery.mmenu.all.css">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/easy-responsive-tabs.css">

<link type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">

<link type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsive.css" rel="stylesheet">


<style type="text/css">
  .nt-heading { color: #22186f; font-size: 36px;
    font-weight: 500;
     }
  .nt-foundmsg {
    color: #22186f;
    font-size: 16px;
    margin-top: 10px;
  }
  .ltnotftext {
    margin-top: 52px;
  }
  .notfndtext {
    margin: 50px 0;
  }
  @media only screen and (max-width: 600px)  {
    .ltnotftext {
      margin-top: 0;
    }
    .notfndtext {
      margin: 0;
    }
    .nt-heading {
      font-size: 30px;
    }
    .nt-foundmsg { font-size: 14px;  }
  }
</style>

</head>

<body <?php body_class(); ?>>
	
	<div id="page">
<div id="mob-menu" style="display:none;">
<?php wp_nav_menu( array(

            'theme_location' => 'primary',

            'items_wrap'      => '<ul>%3$s</ul>',

            'container'         => false

)); ?>
</div>

<section id="mainheader">

  <div class="toprow">

    <div class="container">

      <div class="logo" itemtype="http://schema.org/Organization" itemscope ><a href="<?php echo esc_url( home_url() ); ?>" itemprop="url"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Medtrica Logo" itemprop="logo" width="311" height="68"/></a></div>

      <div class="searchbl">

      <?php /*
        <form>

          <input type="text" value="" placeholder="Search our store..."/>

          <button><span>Search<i class="icon"></i></span></button>

        </form>*/ ?>


        <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url() ); ?>">
          <input type="search" id="woocommerce-product-search-field-0" class="search-field" placeholder="Search products…" value="<?php echo $_REQUEST['s']; ?>" name="s">
          <button><span>Search<i class="icon"></i></span></button>
          <input type="hidden" name="post_type" value="product">
        </form>


      </div>

    </div>

  </div>

  <div class="btrow">

    <div class="container">
<a href="#mob-menu" class="menuicon"><span>Menu</span></a>
      <div class="menu">

        

        <?php /*

        <ul>

          <li><a href="#">Home</a></li>

          <li><a href="#">About</a></li>

          <li><a href="#">Products</a></li>

          <li><a href="#">OEM / Private Label</a></li>

          <li><a href="#">Blog</a></li>

          <li><a href="#">Contact Us</a></li>

        </ul>*/ ?>

        

        <?php wp_nav_menu( array(

            'theme_location' => 'primary',

            'items_wrap'      => '<ul>%3$s</ul>',

            'container'         => false

        )); ?>

      </div>

      <!--<div class="carticon"><a href="<?php //echo esc_url( home_url() ); ?>/cart"><i></i>Cart (<?php //echo WC()->cart->get_cart_contents_count(); ?>)</a></div>-->

	   <div class="carticon">
	   <?php echo do_shortcode('[custom-mini-cart]');?>
	   </div>
		
	  
	  
      <div class="socialicon">
      <a href="<?php echo of_get_option('twitter_link_social'); ?>" rel="nofollow" target="_blank">&nbsp;</a>
      <a href="<?php echo of_get_option('youtube_link_social'); ?>" rel="nofollow" target="_blank">&nbsp;</a>
      <a href="<?php echo of_get_option('facebook_link_social'); ?>" rel="nofollow" target="_blank">&nbsp;</a>
      <a href="<?php echo of_get_option('linedin_link_social'); ?>" rel="nofollow" target="_blank">&nbsp;</a>
      <a href="<?php echo of_get_option('pintrest_link_social'); ?>" rel="nofollow" target="_blank">&nbsp;</a>
      </div>
      <?php if(of_get_option('phone_num_header')) { ?>
      <div class="callicon"><i></i> <a href="tel:<?php echo '18777031079'; ?>" onclick="ga('send', 'event', { eventCategory: 'Phone Call Tracking', eventAction: 'Click/Touch', eventLabel: 'Header'});"><?php echo of_get_option('phone_num_header'); ?></a></div>
      <?php } ?>
      
    </div>

  </div>

</section>