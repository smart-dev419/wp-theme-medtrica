<?php
define( 'THEME_NAME' , 'medtrica' );
define( 'THEME_VERSION', '1.0' );
define( 'THEME_DIR' , get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

// Post Thumbnails
add_theme_support( 'post-thumbnails' );

// Woocommerce
add_theme_support('woocommerce');


register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'medtrica' ),
		'top'  => __( 'Top Menu', 'medtrica' ),
		'footer'  => __( 'Footer Menu', 'medtrica' ),
	) );


/*

 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */

add_theme_support( 'html5', array(
	'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
) );



add_theme_support( 'post-formats', array(
	'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
) );



function careindia_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Widget Area', 'medtrica' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'medtrica' ),
		'before_widget' => '<div id="%1$s" class="widgetarea %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="blk-title">',
		'after_title'   => '</div>',
	) );


  register_sidebar( array(
    'name'          => __( 'Product Sidebar Area', 'medtrica' ),
    'id'            => 'sidebar-product-area',
    'description'   => __( 'Add widgets here to appear in your sidebar.', 'medtrica' ),
    'before_widget' => '',
    'after_widget'  => '</div></div>',
    'before_title'  => '<div class="blueheading text-uppercase">',
    'after_title'   => '</div><div class="blockside"><div class="sidemenu">',
  ) );


	register_sidebar( array(
    'name'          => __( 'Footer Area Bottom', 'medtrica' ),
    'id'            => 'footer-area-bottom',
    'description'   => __( 'Add widgets here to appear in your sidebar.', 'medtrica' ),
    'before_widget' => '',
    'after_widget'  => '',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );



  register_sidebar( array(
    'name'          => __( 'Footer Area 1', 'medtrica' ),
    'id'            => 'footer-area-1',
    'description'   => __( 'Add widgets here to appear in your footer.', 'medtrica' ),
    'before_widget' => '',
    'after_widget'  => '</div>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5><div class="textlink">',
  ) );



  register_sidebar( array(
    'name'          => __( 'Footer Area 2', 'medtrica' ),
    'id'            => 'footer-area-2',
    'description'   => __( 'Add widgets here to appear in your footer.', 'medtrica' ),
    'before_widget' => '',
    'after_widget'  => '</div>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5><div class="textlink">',
  ) );



  register_sidebar( array(
    'name'          => __( 'Footer Area 3', 'medtrica' ),
    'id'            => 'footer-area-3',
    'description'   => __( 'Add widgets here to appear in your footer.', 'medtrica' ),
    'before_widget' => '',
    'after_widget'  => '</div>',
    'before_title'  => '<h5>',
    'after_title'   => '</h5><div class="textlink">',
  ) );

  
}



add_action( 'widgets_init', 'careindia_widgets_init' );





//require get_template_directory() . '/inc/custom-header.php';



/**

 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */

//require get_template_directory() . '/inc/template-tags.php';


require get_template_directory() . '/includes/posttypes.php';


//require get_template_directory() . '/includes/shortcodes.php';
//require get_template_directory() . '/includes/customizer_custom.php';


/* ############################# Custom Functions that useful for the website ############################# */





// Featured Image src get

function tmget_featured_image_src($id) {

	$featimage = wp_get_attachment_image_src(get_post_thumbnail_id( $id ), 'full');

	$sourceimage = $featimage[0];

	return $sourceimage;

}



// Custom Display Fetured IMage on wordpress admin column

add_image_size('featured_preview', 100, 55, true);
add_image_size('woo_product_catalog_thumb', 210, 204, true);

// GET FEATURED IMAGE

function ST4_get_featured_image($post_ID) {

    $post_thumbnail_id = get_post_thumbnail_id($post_ID);

    if ($post_thumbnail_id) {

        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');

        return $post_thumbnail_img[0];

    }

}

// ADD NEW COLUMN

function ST4_columns_head($defaults) {

    $defaults['featured_image'] = 'Slider Image';

    return $defaults;

}

 

// SHOW THE FEATURED IMAGE

function ST4_columns_content($column_name, $post_ID) {

    if ($column_name == 'featured_image') {

        $post_featured_image = ST4_get_featured_image($post_ID);

        if ($post_featured_image) {

            echo '<img src="' . $post_featured_image . '" />';

        }

    }

}

// ONLY WORDPRESS DEFAULT PAGES

add_filter('manage_slides_posts_columns', 'ST4_columns_head', 10);

add_action('manage_slides_posts_custom_column', 'ST4_columns_content', 10, 2);





// content limit function

function tm_excerpt($x, $length)

{

  $x = strip_shortcodes( $x );

  $x = preg_replace('/<img[^>]+\>/i', '', $x);

  if(strlen($x)<=$length)

  {

    return strip_tags($x);

  }

  else

  {

    $y=substr($x,0,$length) . '...';

    return strip_tags($y);

  }

}







/* ############### BOF image sizes custom #################### */



add_image_size('blog-thumb', 389, 231, true);



/* ############### EOF image sizes custom #################### */





function shnk_get_cat_name(){

  $categories = get_the_category();

  if ( ! empty( $categories ) ) {

    $ccatname =  esc_html( $categories[0]->name );

  }

  return $ccatname;

}



function remove_shortcode_from_index( $content ) {

  $content = strip_shortcodes( $content );

  return $content;

}





function tmget_total_pageviews($id) {

  global $wpdb;

  

  $results = $wpdb->get_results( 

        $wpdb->prepare("SELECT * FROM wp_popularpostsdata WHERE `postid`=%d", $id) 

     );



  return $results[0]->pageviews;



}



/* ------ ajax code for custom enquiry form ----------- */

/*add_action('wp_head', 'change_cart_enquire_javascript');

function change_cart_enquire_javascript() {
?>
<script type="text/javascript" >
jQuery(document).ready(function($) {

    $('#sendenquire').click(function(){
      
      //alert(1);
      var mydata = $(this).data();
      

      //var termID= $('#locinfo').val();
      $('#menuajaxdisplay').html('<div class="menuloader" style="text-align:center;"><img src="<?php echo get_template_directory_uri(); ?>/images/loading_form.gif" /></div>');
      //console.log(mydata);
        var data = {
            action: 'change_cart_form_enquire',
            //whatever: 1234,
            id: 123456
        };
        $.post('<?php echo esc_url( home_url() ); ?>/wp-admin/admin-ajax.php', data, function(response) {
           // alert('Got this from the server: ' + response);
           $('#menuajaxdisplay').html(response);

        });
    });


});
</script>
<?php
}*/

add_action('wp_ajax_change_cart_form_enquire', 'change_cart_form_enquire_callback');
add_action( 'wp_ajax_nopriv_change_cart_form_enquire', 'change_cart_form_enquire_callback' );

function change_cart_form_enquire_callback() {
     global $wpdb; // this is how you get access to the database
     @session_start();

     //echo 'LINE458';
     /*echo '<pre>';
     print_r($_POST['pcartdata']);
     print_r($_SESSION);
     echo '</pre>';*/

     $unserdata = base64_decode($_POST['pcartdata']);
     $carprodata = unserialize($unserdata);
     /*echo '<pre>';
     print_r($carprodata);
     echo '</pre>';*/

     $prodtable = "<table cellpadding='3' cellspacing='0' border='1'>";
     $prodtable .= "<tr><td><strong>Product Name</strong></td><td><strong>Product Attribues</strong></td></tr>";
     foreach ($carprodata as $cartval) {
       $prodtable .= "<tr>";
       $prodtable .= "<td>".$cartval['product_name']."</td>";
       $prodtable .= "<td>";
       foreach ($cartval['product_attribues'] as $attkey => $attvalue) {
          $keylabel = explode('attribute_', $attkey);
          //print_r($keylabel[1]);
          $string = wc_attribute_label( $keylabel[1] );
          if(!empty($attvalue)) {
            $prodtable .= '<p class="attroption"><strong>'.$string.' : </strong>'.urldecode($attvalue).'</p>';
          }
        }
       $prodtable .= "</td>";
       $prodtable .= "</tr>";
     }
     $prodtable .= "</table>";
     //echo $prodtable;
     //die();


		if(empty($_SESSION['6_letters_code'] ) || strcasecmp($_SESSION['6_letters_code'], $_POST['plettercode']) != 0) {
			$errors .= "\n Please Enter Correct Code!";
		}

		if(empty($errors))
		{
			$message ="<strong> Dear Admin,</strong> <br> You have received a product(s) enquiry given below,<br><br>
				<table cellpadding='3' cellspacing='0' border='1'>
				    <tr>
					<td><strong>Name:</strong></td>
					<td>".$_POST['pname']."</td>
					</tr>
					<tr>
					<td><strong>Email:</strong></td>
					<td>".$_POST['pemail']."</td>
					</tr>
					<tr>
					<td><strong>Phone Number:</strong></td>
					<td>".$_POST['pphnumn']."</td>
					</tr>
					<tr>
					<td><strong>Message:</strong></td>
					<td>".$_POST['pmessage']."</td>
					</tr>
				    </table><br>";

        $message .= $prodtable;

				$message .="<br><strong>Regards,</strong><br>Medtrica's Team";
			      
        /* ################### DB INSERT DATE ################## */

          $wpdb->insert('wp_prodenquiry', array(
            'name' => $_POST['pname'],
            'email' => $_POST['pemail'],
            'phone' => $_POST['pphnumn'],
            'message' => $_POST['pmessage'],
            'product_data' => $unserdata,
            'created_date' => date('Y-m-d H:i:s'),
          ));

        /* ################### DB INSERT DATE ################## */


			      //$to='shashank.sharma@techmagnate.in,lisha.arora@techmagnate.com';
          $to='info@medtrica.com';
			      $headers2= 'MIME-Version: 1.0' . "\r\n";
			      $headers2 .= 'From: info@medtrica.com' . "\r\n";
			      $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			      //$headers2 .= 'Cc: lisha.arora@techmagnate.com' . "\r\n";
			      //$headers2 .= 'Bcc: lisha.arora@techmagnate.com' . "\r\n";
			     // $sentMail = @mail($to,"Medtrica: Products Inquire Received",$message,$headers2);

            $sentMail =  wp_mail( $to, "Medtrica: Products Inquire Received", $message, $headers2 );

					if($sentMail) //output success or failure messages
					{       
					    ?>
					        <script type="text/javascript">
					               window.location="<?php echo esc_url( home_url( '/' ) ); ?>product-thank-you/";
					        </script>
					    <?php
						exit;
					}

		}

		echo '<div class="errorsdisplay">'.$errors.'</a>';
     
     exit(); // this is required to return a proper result & exit is faster than die();
}

/* ------ ajax code for custom enquiry form ----------- */


/* ############################## Custom code to inject filter and modify function in woocommerce ######################### */



//Remove Sales Flash

add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');

function woo_custom_hide_sales_flash()

{

    return false;

}



remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10);

add_action('woocommerce_shop_loop_item_title', 'woocommerce_my_custom_loop_title',10);



if ( ! function_exists( 'woocommerce_my_custom_loop_title' ) ) {

   function woocommerce_my_custom_loop_title() {

?>

            <h3><?php the_title(); ?></h3>

<?php

    }

}



remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);

remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10);



remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);

add_action('woocommerce_after_shop_loop_item', 'woocommerce_my_custom_loop_add_to_cart',10);

if ( ! function_exists( 'woocommerce_my_custom_loop_add_to_cart' ) ) {

   function woocommerce_my_custom_loop_add_to_cart() {

      echo '<p class="linkbtn"><a href="'.get_the_permalink().'">View Detail <i class="fa fa-fw"></i></a></p>';

   }

}



// Disable product review (tab)

function woo_remove_review_product_tab($tabs) {

  unset($tabs['reviews']);          // Remove Reviews tab

  return $tabs;

}



add_filter( 'woocommerce_product_tabs', 'woo_remove_review_product_tab', 98 );



// Change the description tab title to product name

add_filter( 'woocommerce_product_tabs', 'wc_change_product_description_tab_title', 10, 1 );

function wc_change_product_description_tab_title( $tabs ) {

  global $post;

  if ( isset( $tabs['description']['title'] ) )

    $tabs['description']['title'] = 'Product Information';

  return $tabs;

}

// Change the description tab heading to product name

add_filter( 'woocommerce_product_description_heading', 'wc_change_product_description_tab_heading', 10, 1 );

function wc_change_product_description_tab_heading( $title ) {

  global $post;

  return $post->post_title;

}



// remove action from single product //

remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);

remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);

remove_action('woocommerce_after_single_product_summary','woocommerce_upsell_display',15);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);



// Change 'add to cart' text on single product page

add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_add_to_cart_text' );

function woocommerce_custom_add_to_cart_text() {

        //return __( 'Add to Enquire', 'woocommerce' );

        echo 'Add to Inquire Cart <i class="fa fa-fw"></i>';

}



/**@ Remove in all product type*/

function woo_remove_all_quantity_fields( $return, $product ) {

return true;

}

add_filter( 'woocommerce_is_sold_individually', 'woo_remove_all_quantity_fields', 10, 2 );



/*
 * Remove the default WooCommerce 3 JSON/LD structured data format
 */
function remove_output_structured_data() {
  remove_action( 'wp_footer', array( WC()->structured_data, 'output_structured_data' ), 10 ); // Frontend pages
  remove_action( 'woocommerce_email_order_details', array( WC()->structured_data, 'output_email_structured_data' ), 30 ); // Emails
}
add_action( 'init', 'remove_output_structured_data' );


/* ############################## Custom code to inject filter and modify function in woocommerce ######################### */

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

//Store the custom field
add_filter( 'woocommerce_add_cart_item_data', 'add_cart_item_custom_data_vase', 10, 2 );
function add_cart_item_custom_data_vase( $cart_item_meta, $product_id ) {
  global $woocommerce;
  /*echo '<pre>';
  print_r($_POST);
  echo '</pre>';
  die();*/
  $cart_item_meta['cartin'] = $_POST['cartin'];
  return $cart_item_meta; 
}

//Get it from the session and add it to the cart variable
function get_cart_items_from_session( $item, $values, $key ) {
    if ( array_key_exists( 'cartin', $values ) )
        $item[ 'woocom_cart_attr' ] = $values['cartin'];
    return $item;
}
add_filter( 'woocommerce_get_cart_item_from_session', 'get_cart_items_from_session', 1, 3 );

add_filter( 'wc_product_has_unique_sku', '__return_false', PHP_INT_MAX );

/* ============================================== Medtrica Custom menu page ================================== */


function wpdocs_register_inquire_page_pro(){
    add_menu_page( 
        __( 'Product Inquire Info', 'textdomain' ),
        'Product Inquire Info',
        'manage_options',
        'enquiredatapro',
        'product_inquiries_data',
        get_template_directory_uri().'/images/enquire_icon.jpg',
        60
    );

}
add_action( 'admin_menu', 'wpdocs_register_inquire_page_pro' );

function product_inquiries_data(){
  global $wpdb;
  /*$charset_collate = $wpdb->get_charset_collate();
  $table_name = $wpdb->prefix . 'new_product_inquiry_data';
  $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    name varchar(255),
    email varchar(255),
    phone varchar(255),
    message varchar(255),
    productdata varchar(255),
    producturl varchar(255),
    entrydate varchar(255),
    UNIQUE KEY id (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );*/
  ?>
  <h1 style="text-align:center; border-top:2px solid #000; border-bottom:2px solid #000; margin: 20px 0 20px 0; padding: 15px 0; background:#888888; color:#fff;">Product Inquire Information</h1>

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css">  
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#ncddatalist').DataTable();
    });
  </script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script>
  $( function(){
    $( "#date_start" ).datepicker({maxDate: '0'});
    $( "#date_end" ).datepicker({maxDate: '0'});
  });
  </script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <br>
  <table id="ncddatalist" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>SrNo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Message</th>
            <th>Product Data (size, cover, shape etc)</th>
            <th>Product Url</th>
            <th>Entry Date</th>
        </tr>
    </thead>
    <tbody>
      <?php
      global $wpdb;
      $rows = $wpdb->get_results ("SELECT * FROM `wp_new_product_inquiry_data`");
      $io = 1;
      foreach ($rows as $row)
      {
        echo '<tr>';
            echo '<td>'.$io.'</td>';
            echo '<td>'.$row->name.'</td>';
            echo '<td>'.$row->email.'</td>';
            echo '<td>'.$row->phone.'</td>';
            echo '<td>'.$row->message.'</td>';
            echo '<td>'.stripslashes($row->productdata).'</td>';
            echo '<td>'.$row->producturl.'</td>';
            echo '<td>'.$row->entrydate.'</td>';
            echo '</tr>';
            $io++;
      }
      ?>
    </tbody>
    <tfoot>
        <tr>
            <th>SrNo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Message</th>
            <th>Product Data (size, cover, shape etc)</th>
            <th>Product Url</th>
            <th>Entry Date</th>
        </tr>
    </tfoot>
  </table>

  <?php
}



/**
 * Register a custom menu page.
 */
function wpdocs_register_my_custom_menu_page(){
    add_menu_page( 
        __( 'Custom Menu Title', 'textdomain' ),
        'Cart Inquire Info',
        'manage_options',
        'enquiredata',
        'my_custom_menu_page',
        get_template_directory_uri().'/images/enquire_icon.jpg',
        60
    );

}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

require get_template_directory() . '/includes/Zebra_Pagination.php';

function my_custom_menu_page(){
    //esc_html_e( 'Admin Page Test', 'textdomain' );
    $records_per_page = 25;
    $pagination = new Zebra_Pagination();


  //var_dump($pagination);
    global $wpdb;
    //$active_rows = $wpdb->get_results( "SELECT * FROM 'participate'");
    $results = $wpdb->get_results( 'SELECT * FROM wp_prodenquiry order by `ID` DESC', OBJECT );

    
    ?>
    <style type="text/css">
    table td.label { font-weight: bold; }
    td strong.subhead { font-size: 20px; text-align: center; margin: 15px 0; display: inline-block; color: #D54E21; text-decoration: underline; }
    td h5 { color: #0073AA; text-decoration: underline;}

    table.countries { width: 100%; border:1px solid #AAA; margin-bottom: 20px; border-collapse: collapse; margin: 50px auto; }
    table.countries tr.even { background: #EFEFEF }
    table.countries th { background: #222; color: #FFF; font-weight: bold }
    table.countries td,
    table.countries th { padding: 5px 8px }
    table.countries td:hover { background: #FFFFCC }

    .Zebra_Pagination {
        clear: both;
        width: 100%;
        overflow: hidden;
    }

    .Zebra_Pagination ul {
        position: relative;
        left: 50%;
        list-style-type: none;
        margin: 0;
        padding: 0;
        float: left
    }

    .Zebra_Pagination li {
        position: relative;
        float: left;
        right: 50%
    }

    .Zebra_Pagination .pagination {
        display: inline-block;
    }

    .Zebra_Pagination li {
        display: inline;
    }

    .Zebra_Pagination a,
    .Zebra_Pagination span {
        padding: 6px 12px;
        color: #337AB7;
        text-decoration: none;
        background-color: #FFF;
        border: 1px solid #DDD;
        display: block;
        float: left;
        position: relative;
        margin-left: -1px;
    }

    .Zebra_Pagination li.active a {
        color: #FFF;
        cursor: default;
        background-color: #337AB7;
        border-color: #337AB7;
    }

    .Zebra_Pagination li a:hover,
    .Zebra_Pagination li span:hover {
        color: #23527C;
        background-color: #EEE;
        border-color: #DDD;
    }

    .Zebra_Pagination li.disabled a {
        color: #DEDEDE;
        background-color: transparent;
        border-color: #DEDEDE;
        cursor: default;
    }

    .Zebra_Pagination li.disabled a:hover {
        color: #DEDEDE;
        background-color: transparent;
        border-color: #DEDEDE;
    }
	

    </style>
    <h1 style="text-align:center; border-top:2px solid #000; border-bottom:2px solid #000; margin: 20px 0 20px 0; padding: 15px 0; background:#888888; color:#fff;">Cart Inquire Information</h1>
    
    <?php if($_REQUEST['action'] == 'viewmore') {

      $resultsingle = $wpdb->get_results( 'SELECT * FROM wp_prodenquiry WHERE ID='.$_REQUEST['enquiry_id'], OBJECT );
      /*echo '<pre>';
      print_r($resultsingle);
      echo '</pre>';*/
      /*$mktfeearr = unserialize($resultsingle[0]->participation_marketing_fee);
      $docarr = unserialize($resultsingle[0]->documents);
      $product_desc_sold = unserialize($resultsingle[0]->product_desc_sold);*/

      $productsinfo = unserialize($resultsingle[0]->product_data);

      /*-- Temporary commented ---*/
     /* $prodtable = "<table cellpadding='3' cellspacing='0' border='1'>";
       $prodtable .= "<tr><td><strong>Product Name</strong></td><td><strong>Product Attribues</strong></td></tr>";
       foreach ($productsinfo as $prodval) {
         $prodtable .= "<tr>";
         $prodtable .= "<td>".$prodval['product_name']."</td>";
         $prodtable .= "<td>";
         if($prodval['product_attribues']) {
           foreach ($prodval['product_attribues'] as $attkey => $attvalue) {
              //$keylabel = explode('attribute_', $attkey);
              //print_r($keylabel[1]);
              $string = wc_attribute_label( $attkey );
              $prodtable .= '<p class="attroption"><strong>'.$string.' : </strong>'.urldecode($attvalue).'</p>';
            }
          }
         $prodtable .= "</td>";
         $prodtable .= "</tr>";
       }
       $prodtable .= "</table>";*/

      ?>

      <table cellpadding="5" cellspacing="0" border="1" width="100%" align="left">
      <tr>
        <td width="30%" class="label">Inquire ID</td>
        <td><?php echo $resultsingle[0]->ID; ?></td>
      </tr>
      <tr>
        <td width="30%" class="label">Name</td>
        <td><?php echo $resultsingle[0]->name; ?></td>
      </tr>
      <tr>
        <td width="30%" class="label">Email</td>
        <td><?php echo $resultsingle[0]->email; ?></td>
      </tr>
      <tr>
        <td width="30%" class="label">Phone</td>
        <td><?php echo $resultsingle[0]->phone; ?></td>
      </tr>
     <!-- temporary commented <tr>
        <td width="30%" class="label">Products</td>
        <td>
        <?php //echo $prodtable; ?>
        </td>
      </tr> -->
      <tr>
        <td width="30%" class="label">Created Date</td>
        <td><?php echo $resultsingle[0]->created_date; ?></td>
      </tr>
      </table>

      <?php
  } else { ?>

  <?php

  /*$link = mysql_connect('medtricacom.ipowermysql.com', 'medtruser', 'Live@2017$medtrica');
      $db_selected = mysql_select_db('livemedtrica', $link);
  // set position of the next/previous page links
        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');

        // the MySQL statement to fetch the rows
        // note how we build the LIMIT
        // also, note the "SQL_CALC_FOUND_ROWS"
        // this is to get the number of rows that would've been returned if there was no LIMIT
        // see http://dev.mysql.com/doc/refman/5.0/en/information-functions.html#function_found-rows
        $MySQL = '
            SELECT
                *
            FROM
                wp_prodenquiry
            ORDER BY
                ID DESC
            LIMIT
                ' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '
        ';


        // if query could not be executed
        if (!($result = @mysql_query($MySQL)))

            // stop execution and display error message
            die(mysql_error());

        // fetch the total number of records in the table
        $rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows FROM wp_prodenquiry'));


        // pass the total number of records to the pagination class
        $pagination->records(count($results));

        // records per page
        $pagination->records_per_page($records_per_page);

        ?>

        <table class="countries" border="1">

        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Created Date</th>
          <th>View Info</th>
        </tr>

            <?php $index = 0?>

            <?php while ($row = mysql_fetch_assoc($result)):?>

            <?php
            if($index++ % 2) {
              $myclass = ' class="even"';
            } else {
              $myclass = '';
            }
            echo '<tr>';
            echo '<td>'.$row['ID'].'</td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['email'].'</td>';
            echo '<td>'.$row['phone'].'</td>';
            echo '<td>'.$row['created_date'].'</td>';
            echo '<td><a href="admin.php?page=enquiredata&action=viewmore&enquiry_id='.$row['ID'].'">View More</a></td>';
            echo '</tr>';
            ?>

            <?php endwhile?>

        </table>

        <div class="text-center">
        <?php

        // render the pagination links
        $pagination->render();
        ?>
        </div>

    <?php  */

    $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');

    $results1 = $wpdb->get_results( 'SELECT * FROM wp_prodenquiry order by `ID` DESC', OBJECT );


   /* $results_limtd = $wpdb->get_results('
            SELECT
                *
            FROM
                wp_prodenquiry
            ORDER BY
                ID DESC
            LIMIT
                ' . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '
        ');

    echo '<pre>';
    print_r($results_limtd);
    echo '</pre>';*/

    ?>

     <table class="countries" border="1">

        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Created Date</th>
          <th>View Info</th>
        </tr>
        <?php

        foreach ($results1 as $rvalue) {
          echo '<tr>';
          echo '<td>'.$rvalue->ID.'</td>';
          echo '<td>'.$rvalue->name.'</td>';
          echo '<td>'.$rvalue->email.'</td>';
          echo '<td>'.$rvalue->phone.'</td>';
          echo '<td>'.$rvalue->created_date.'</td>';
          echo '<td><a href="admin.php?page=enquiredata&action=viewmore&enquiry_id='.$rvalue->ID.'">View More</a></td>';
          echo '</tr>';
        }

        ?>

    </table>

    <?php
  }
}


function tm_popular_products( $atts ) {
  
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
    $popprods = '';
  if($loop->have_posts()) {
    $popprods .= '<ul>';
    while ( $loop->have_posts() ) : $loop->the_post();
    $popprods .= '<li><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
    endwhile;
    $popprods .= '</ul>';
    wp_reset_query(); 
  }

  return $popprods;
}
add_shortcode( 'tm-popular-products', 'tm_popular_products' );


/* ==================== BOF Custom ajax onchnage of product attribues sku ==================== */

/*add_action('wp_head', 'my_action_javascript');

function my_action_javascript() {
?>
<script type="text/javascript" >
jQuery(document).ready(function($) {
    $('.attrbsingleval select').change(function(){
     
      var variation_id = jQuery( 'input[name="variation_id"]' ).val();
      alert(variation_id);
    });
});
</script>
<?php }*/

add_action('wp_ajax_my_changing_sku', 'my_changing_sku_callback');
add_action( 'wp_ajax_nopriv_my_changing_sku', 'my_changing_sku_callback' );

function my_changing_sku_callback() {
     global $wpdb; // this is how you get access to the database

    //$whatever = 'ID=> '. $_POST['id'];
     $product_id = $_POST['product_id'];
     $variation_id = $_POST['id'];

     if(!empty($variation_id)) {
      $product = new WC_Product_Variation($variation_id);
     } else {
      $product = new WC_Product($product_id);
     }
     $sku = $product->get_sku();
     echo $sku;
     
     exit(); // this is required to return a proper result & exit is faster than die();
}

add_action('wp_ajax_my_changing_sku_new', 'my_changing_sku_new_callback');
add_action( 'wp_ajax_nopriv_my_changing_sku_new', 'my_changing_sku_new_callback' );

function my_changing_sku_new_callback() {
     global $wpdb; // this is how you get access to the database

      session_start();

      $product = new WC_Product_Variable( $_POST['product_id'] );
      $variations = $product->get_available_variations();

      $_SESSION['customattr'][$_POST['attrtaxonomy']] = $_POST['attrslug'];


      /*echo 'LINE 1095';
      echo '<pre>';
      print_r($_SESSION);
      echo '</pre>';*/

      
      foreach ($variations as $variation) {
        //$result=array_intersect($_SESSION['customattr'],$variation['attributes']);
        if($_SESSION['customattr'] == $variation['attributes']) {
          //echo 'SKU=> '.$variation['sku'];
          if(!empty($variation['sku'])){
            echo $variation['sku'];
          } else {
            echo 'NA';
          }
        }
      }
     
     exit(); // this is required to return a proper result & exit is faster than die();
}

/* ==================== EOF Custom ajax onchnage of product attribues sku ==================== */

add_filter('wp_get_attachment_image_attributes', 'change_attachement_image_attributes', 20, 2);
function change_attachement_image_attributes( $attr, $attachment ){
    /*// Get post parent
    $parent = 

    ( 'post_parent', $attachment);

    // Get post type to check if it's product
    $type = 

    ( 'post_type', $parent);
    if( $type != 'product' ){
        return $attr;
    }
*/
    /// Get title
    $title = get_the_title($attachment);

    //$attr['alt'] = $title;
    $attr['title'] = $title;

    return $attr;
}


add_image_size('pro_featured_preview', 100,100, true);

//remove ld json schema of yoast
function bybe_remove_yoast_json($data){
      $post_type = get_post_type();
      if( $post_type == 'page' || $post_type == 'post' || is_post_type_archive('product')) {
          return $data;
        } else {
      $data = array();
          return $data;
      }
}
add_filter('wpseo_json_ld_output', 'bybe_remove_yoast_json', 10, 1);


function custom_mini_cart() {
global $woocommerce;
?>
<div class="mtr-mini-cart">
<a class="click-toggle" href="#"><i></i>Cart (<?php echo WC()->cart->get_cart_contents_count(); ?>)</a>
<div class="mtr-popup">

	<?php
	foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
		
			$item_data = $cart_item['data'];
			$cart_attributes = $item_data->get_attributes();
			$cartin = $cart_item['cartin'];
			$product_id = $cart_item['product_id'];
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );	
			 ?>
             
             
			 <div class="clearfix woocommerce-cart-form__cart-item">
				<?php /*?><div class="space" width="2%">&nbsp;</div><?php */?>
				<div class="product-thumbnail">
				
				<?php echo get_the_post_thumbnail($product_id,'pro_featured_preview'); ?>
				</div>
                <div class="clearfix desc-block">
				 <div class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>" >
				 <?php  echo $_product->get_name(); ?>
				 </div>
				 
				 <div>
						<?php
						if(!empty($cartin)){
							echo '<div class="mtr-attr-list-item">';
							
							foreach ($cartin as $attkey => $attvalue) {
								$keylabel = explode('attribute_', $attkey);
								//print_r($keylabel[1]);
								$string = wc_attribute_label( $keylabel[1] );
								if($attvalue) {
									echo '<div class="mtr-attr-list">';
									echo '<div class="attroption"><span style="font-size:12px; color:#7d7d7d;">'.$string.' : </span>'.$attvalue.'</div>';
									echo '</div>';
								}
							}
							
							echo '</div>';
						}
						?>
				</div>	
                </div>
				 
				<div class="product-remove">
				
					<?php
					
						echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
							'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
							esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
							__( 'Remove this item', 'woocommerce' ),
							esc_attr( $product_id ),
							esc_attr( $_product->get_sku() )
						), $cart_item_key ); 
					?>
				</div>
				<?php /*?><div class="space" width="2%">&nbsp;</div><?php */?>
			 </div>
			 
			<?php
	}
?>
<?php
if($product_id!='')
{
	?>
  <a class="btn btn-primary stylecart_button" href="<?php echo home_url(); ?>/products" style=" color: #fff; float: left;" onClick="ga('send', 'event', { eventCategory: 'Keep Viewing', eventAction: 'Click/Touch', eventLabel: 'Header'});">Keep Viewing<i class="fa fa-fw"></i></a>
	<a class="btn btn-primary stylecart_button" href="<?php echo home_url(); ?>/cart" style=" color: #fff;" onClick="ga('send', 'event', { eventCategory: 'Go to Enquire', eventAction: 'Click/Touch', eventLabel: 'Header'});">Go To Enquire<i class="fa fa-fw"></i></a>
	<?php
}else{
	?>
	<h3 class="no-pro">Your cart is currently empty.</h3>
	<style>
	.no-pro {
		text-align: center;
		margin-top: 25px;
		font-size: 15px;
	}
	</style>
	<?php
}
?>
<!--</table>-->
</div>
</div>



<?php
 }
add_shortcode( 'custom-mini-cart', 'custom_mini_cart' );

//remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
//add_action( 'woocommerce_single_product_summary', 'woocommerce_template_loop_add_to_cart', 30 );
// =================================== 

function filter_plugin_updates( $value ) {
    unset( $value->response['woocommerce/woocommerce.php'] ); 
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );





add_shortcode( 'faq-qa', 'faq_qa' );
function faq_qa() {
  $term = get_queried_object();
  $head = get_field('faq_heading', $term);
      ?>


<div class="sec_faq">
  <h2><?php echo $head; ?></h2>
  <?php 
      while(have_rows('faqs', $term)) : the_row();
      $question = get_sub_field('question');
      $answer = get_sub_field('answer');
      ?>
        <h3 class="accordion"><?php echo $question; ?></h3>
        <div class="panel">
        <?php echo $answer; ?>
      </div>
    <?php endwhile; ?>
</div>
<style type="text/css">
.sec_faq {
    float: left;
    width: 100%;
    margin-bottom: 50px;
    margin-top: 10px;
} 
.accordion:after {
  content: '\002B'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: #777;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212"; /* Unicode character for "minus" sign (-) */
}

.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 9px;
  width: 100%;
  text-align: left;
  border: none;
  outline: none;
  transition: 0.4s;
  font-size: 16px;
  margin: 1px;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
<?php
 }


add_action('wp_ajax_single_product_enqiure_action', 'single_product_enqiure_action');
add_action( 'wp_ajax_nopriv_single_product_enqiure_action', 'single_product_enqiure_action' );

function single_product_enqiure_action() {
     global $wpdb;
     @session_start();
     /*$unserdata = base64_decode($_POST['pcartdata']);
     $carprodata = unserialize($unserdata);

     $prodtable = "<table cellpadding='3' cellspacing='0' border='1'>";
     $prodtable .= "<tr><td><strong>Product Name</strong></td><td><strong>Product Attribues</strong></td></tr>";
     foreach ($carprodata as $cartval) {
       $prodtable .= "<tr>";
       $prodtable .= "<td>".$cartval['product_name']."</td>";
       $prodtable .= "<td>";
       foreach ($cartval['product_attribues'] as $attkey => $attvalue) {
          $keylabel = explode('attribute_', $attkey);
          //print_r($keylabel[1]);
          $string = wc_attribute_label( $keylabel[1] );
          if(!empty($attvalue)) {
            $prodtable .= '<p class="attroption"><strong>'.$string.' : </strong>'.urldecode($attvalue).'</p>';
          }
        }
       $prodtable .= "</td>";
       $prodtable .= "</tr>";
     }
     $prodtable .= "</table>";*/
     //echo $prodtable;
     //die();

    if(empty($_SESSION['6_letters_code'] ) || strcasecmp($_SESSION['6_letters_code'], $_POST['plettercode']) != 0) {
      $errors .= "\n Please Enter Correct Code!";
    }

    if(empty($errors))
    {

      $chars = $_POST['pcartdata'];
      $founddata = str_replace("pa_","",$chars);
      if($founddata != ''){
        $addtr = "<tr>
          <td><strong>Product Data:</strong></td>
          <td>".$founddata."</td>
          </tr>";
      }
      else{
        $addtr = '';
      }

      $message ="<strong> Dear Admin,</strong> <br> You have received a product(s) enquiry given below,<br><br>
        <table cellpadding='3' cellspacing='0' border='1'>
            <tr>
          <td><strong>Name:</strong></td>
          <td>".$_POST['pname']."</td>
          </tr>
          <tr>
          <td><strong>Email:</strong></td>
          <td>".$_POST['pemail']."</td>
          </tr>
          <tr>
          <td><strong>Phone Number:</strong></td>
          <td>".$_POST['pphnumn']."</td>
          </tr>
          <tr>
          <td><strong>Message:</strong></td>
          <td>".$_POST['pmessage']."</td>
          </tr>
          ".$addtr."
          <tr>
          <td><strong>Product Url:</strong></td>
          <td>".get_the_permalink($_POST['product_id_fld'])."</td>
          </tr>
            </table><br>";
        $message .= $prodtable;
        $message .="<br><strong>Regards,</strong><br>Medtrica's Team";

          $wpdb->insert('wp_new_product_inquiry_data', array(
            'name' => $_POST['pname'],
            'email' => $_POST['pemail'],
            'phone' => $_POST['pphnumn'],
            'message' => $_POST['pmessage'],
            'productdata' => $founddata,
            'producturl' => get_the_permalink($_POST['product_id_fld']),
            'entrydate' => date('Y-m-d H:i:s'),
          ));

            $to='info@medtrica.com';
            //$to='amit.kumar@the-copyhouse.com';
            $headers2= 'MIME-Version: 1.0' . "\r\n";
            $headers2 .= 'From: info@medtrica.com' . "\r\n";
            $headers2 .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $sentMail =  wp_mail( $to, "Medtrica: Products Inquire Received", $message, $headers2 );
          if($sentMail)
          {       
              ?>
                  <script type="text/javascript">
                         window.location="<?php echo esc_url( home_url( '/' ) ); ?>product-thank-you/";
                  </script>
              <?php
            exit;
          }
    }
    echo '<div class="errorsdisplay">'.$errors.'</a>';
    exit(); // this is required to return a proper result & exit is faster than die();
}

function blog_cats_related_post() {

    $post_id = get_the_ID();
    $cat_ids = array();
    $categories = get_the_category( $post_id );

    if(!empty($categories) && is_wp_error($categories)):
        foreach ($categories as $category):
            array_push($cat_ids, $category->term_id);
        endforeach;
    endif;

    $current_post_type = get_post_type($post_id);
    $query_args = array( 

        'category__in'   => $cat_ids,
        'post_type'      => $current_post_type,
        'post_not_in'    => array($post_id),
        'posts_per_page'  => '5'


     );

    $related_cats_post = new WP_Query( $query_args );
?><ul class="loan-point-list relatedblogs"><?php
    if($related_cats_post->have_posts()): 
         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
            
                <li> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?>   </a> </li>
           
        <?php endwhile;
        wp_reset_postdata();
     endif;
?> </ul><?php 
}


function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/default.jpg";
  }
  return $first_img;
}

?>