<?php 
/*
Template Name: Thank You
*/
get_header(); ?>

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'breadcrumb', 'index' ); ?>

<?php /*

<section class="breadcrumb">

  <div class="container">

    <ul>

      <li><a href="#">Home</a></li>

      <li><span>About</span></li>

    </ul>

  </div>

</section>*/ ?>

<section id="maincontentwrap">

  <div class="innerpagewrap paddbt46px">

    <div class="container">

      <h1 class="detalmainh_orng margenbt30"><strong><?php the_title(); ?></strong></h1>

      <?php the_content(); ?>

      <?php
       global $woocommerce;
       
       $woocommerce->cart->empty_cart();

      ?>

    <?php /*

      <h1 class="detalmainh_orng margenbt30"><strong>About Medtrica</strong></h1>

      <p class="float-right ml-4"><img src="<?php echo get_template_directory_uri(); ?>/images/patients-img.jpg" alt=""></p>

      <p class="tagline margenbt30"><span class="teg">Medtrica |</span><span class="pra">Your Fastest & Most Reliable <br>

        Medical Manufacturing Company</span></p>

      <p align="justify">Medtrica provides medical professionals with the items and materials necessary to care for their patients in every way. We have 3 manufacturing facilities located in Canada, and 2 sales offices – one in Langley, BC and one in Los Angeles, CA. We specialize only in durable and disposable 100% medical grade for everyday usage in hospitals, clinics, surgery centers and long-term care facilities. We are registered with the FDA, Health Canada, and TSSA for medical product manufacturing.</p>

      <p align="justify">Medtrica manufactures high-value, high-quality medical products that are designed to optimize patient safety, patient comfort, and facility budgetary needs.</p>

      <p align="justify">Our products include standard, bariatric and psychiatric therapeutic bed and stretcher mattresses; endoscopy and respiratory precleaning and protection products, overlay pads, positioning pads, medical imaging/X-ray pads, O.R./surgery table pads, positioning straps and other patient safety products, pediatric products, and bariatric products. All of our products are safe, latex free and many are environmentally friendly.</p>

      <p align="justify">Medtrica offers component customization (including sizing) for all of our products in order to meet the needs of each facility we serve. We also offer very competitive prices. All warrantied products carry non-prorated warranties. Medtrica’s positive reputation has been the result of helping medical facilities to care for their patients with competitively priced high value, high-quality products. Medtrica would be proud to supply you with everything you need to do your job and do it well. Call us today and we can start discussing your needs and going over our products with you in more detail.</p>

      <p>&nbsp;</p>

      <div class="testimonialwrap margenbt45">

        <div class="testimonial">

          <p><i class="fa fa-fw"></i><span class="testid">Ten years ago, the idea of providing healthcare professionals with top quality medical supplies at an affordable price on a consistent basis was just a vision.<i class="fa fa-fw rightqout"></i></span></p>

          <span class="name">- Robert Penz, Our CEO</span> </div>

        <div class="pdfpannel text-center" > <a href="#" > <img src="<?php echo get_template_directory_uri(); ?>/images/large-pdf-icon.png" alt=""><br>

          Medtrica Company Overview</a> </div>

      </div>

      <div class="clearfix"></div>

      <div class="your-patients-section"> <img src="<?php echo get_template_directory_uri(); ?>/images/your-patients-img.jpg" alt="">

        <div class="textdata">

          <h2>What You (And Your Patients) Need— With Just One Call</h2>

          <p>We realize that the less time you spend ordering medical supplies means more time doing what you need to do – like caring for patients.  Which is why we’ve taken the extra step to create a wide verity of standard and custom sized product line-ups in the industry—featuring, literally, hundreds and hundreds of SKUs.</p>

        </div>

      </div>

      <div class="competition-section">

        <h2>Trusted By Healthcare Professionals (And The Competition)</h2>

        <p align="justify">Over the past dozen years, we’ve established a well-earned reputation for providing premium quality medical supplies…and without the expected premium costs.  As impressive as this is, what’s more remarkable is that a good portion of the products we manufacturer are not, necessarily for our end-user clients…they’re for our competition.</p>

        <p align="justify">That’s right, other medical supply companies are fully aware of the exceptional quality of the products we manufacture…and they’ve contracted us to produce similar products for them.</p>

      </div>

      */ ?>



    </div>

  </div>

</section>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>