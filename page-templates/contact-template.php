<?php 

/* 

Template Name: Contact Template

*/

get_header(); ?>

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php get_template_part( 'breadcrumb', 'index' ); ?>

<section id="maincontentwrap">

  <div class="innerpagewrap paddbt46px">

    <div class="container">

      <h1 class="detalmainh_orng margenbt30"><strong><?php the_title(); ?></strong></h1>

      

      

      <div class="row">
    
    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">

      <?php //the_content(); ?>
      
      <h3>We've been building relationships and serving the medical community since 2001. Let us know how we can be of service to you today.</h3>
      <strong>For your convenience, you can reach us at:</strong>
      <div class="row">
      <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="contactdetail" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

      <!--<iframe class="iframemap" style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13247.496722530157!2d-118.3623393!3d33.8928941!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xad49dffbb6e58517!2sMedtrica+Solutions+USA!5e0!3m2!1sen!2sus!4v1498745627463" width="350" height="300" frameborder="0" allowfullscreen="allowfullscreen"></iframe>-->
      <div>
      <h3 class="titlehead">Medtrica <span itemprop="addressCountry">USA</span></h3>
      <span itemprop="streetAddress">4001 Inglewood Ave</span><br>
      <span itemprop="addressLocality">Bldg 101-128<br>
      Redondo Beach, CA<br>
      USA</span> <span itemprop="postalCode">90278</span><br>

      <span class="lable">Toll Free:</span> <span itemprop="telephone">877-703-1079</span><br>

      <span class="lable">Fax:</span> <span itemprop="faxNumber">310-263-9098</span><br>

      <span class="lable">Email:</span> <a href="mailto:info@medtrica.com">info@medtrica.com</a>

      </div>
      </div>
      </div>
      <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
      <div class="contactdetail" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">

      <iframe class="iframemap" style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2611.3879938879995!2d-122.65726568396427!3d49.11726597931364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5485d1d655ea6469%3A0xba34573959fbbc49!2sMedtrica!5e0!3m2!1sen!2sca!4v1498744788282" width="350" height="300" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
      <div>
      <h3 class="titlehead">Medtrica <span itemprop="addressCountry">CANADA</span></h3>
      <span itemprop="streetAddress">3525 191 St, Unit 1</span><br>
      <span itemprop="addressLocality">Surrey, BC Canada</span><br>
      <span itemprop="postalCode">V3Z 0P6</span><br>

      <span class="lable">Tel:</span> <span itemprop="telephone">877-703-1079 ext 1</span><br>

      <span class="lable">Fax:</span> <span itemprop="faxNumber">310-263-9098</span><br>

      <span class="lable">Email:</span> <a href="mailto:info@medtrica.com"><span itemprop="email">info@medtrica.com</span></a>

      </div>
      </div>
      </div>
      </div>

      <?php /*
      <h2>Looking for&nbsp;medical supplies? We are the best&nbsp;medical supplies store in Canada and USA.</h2>
      <h2>Contact Us to find out how fast &amp; reliable we really are!</h2>
      <p>We’ve been building relationships and serving the medical community since 2001.  Let us know how we can be of service to you today.</p>
      <h2>For your convenience, you can reach us at:</h2>
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="contactdetail"><iframe class="iframemap" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13247.496722530157!2d-118.3623393!3d33.8928941!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xad49dffbb6e58517!2sMedtrica+Solutions+USA!5e0!3m2!1sen!2sus!4v1498745627463" width="350" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
          <h3 class="titlehead">USA</h3>
          
            <p>4001 Inglewood Ave<br>
              Bldg 101-128<br>
              Redondo Beach, CA<br>
              USA 90278</p>
              <p><span class="lable">Toll Free:</span> 877-703-1079</p>
              <p><span class="lable">Fax:</span> 310-263-9098</p>
              <p><span class="lable">Email:</span> <a href="mailto:info@medtrica.com">info@medtrica.com</a></p>
              
              
          </div>
        </div>
        <div class="col col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="contactdetail">
          <iframe  class="iframemap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2611.3879938879995!2d-122.65726568396427!3d49.11726597931364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5485d1d655ea6469%3A0xba34573959fbbc49!2sMedtrica!5e0!3m2!1sen!2sca!4v1498744788282" width="350" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
          <h3 class="titlehead">CANADA</h3>
          
            <p>Unit #104A – 6350 204th St<br>
              Langley, BC Canada<br>
              V2Y 2V1</p>
              <p><span class="lable">Tel:</span> 604-510-5049</p>
              <p><span class="lable">Fax:</span> 604-510-5039</p>
              <p><span class="lable">Email:</span> <a href="mailto:info@medtrica.com">info@medtrica.com</a></p>
              
              
          </div>
        </div>
      </div>
      */ ?>

    </div>

    <div class="col col-sm-12 col-md-4 col-lg-4 col-xl-4">
    <div class="enquiryform">
  <div class="title">Enquiry Form</div>
  
  <?php echo do_shortcode('[contact-form-7 id="279" title="Medtrica Contact Form"]'); ?>

  <?php /*
  <div class="wpcf7">
    <form action="" method="post" class="wpcf7-form" novalidate>
      <div class="inputrow">
        <input name="your-name" value="" placeholder="Name*" type="text">
      </div>
      <div class="inputrow">
        <input name="your-phone" value="" placeholder="Phone*" type="tel">
      </div>
      <div class="inputrow">
        <input name="your-email" value="" placeholder="Email*" type="email">
      </div>
      <div class="inputrow">
        <textarea name="your-message" placeholder="Comment*"></textarea>
      </div>
      <div class="inputrow"> <span class="your-captcha">
        <input name="your-captcha" value="" autocomplete="off" placeholder="Security Code" type="text" class="cuptchacode">
        </span><span class="cuptch"> <img alt="captcha" src="https://www.careindia.org/wp-content/uploads/wpcf7_captcha/1265181954.png" width="72" height="24"> </span> </div>
      <p class="text-center" style="margin-bottom:0px;">
        <input value="Submit" class="wpcf7-submit" type="submit">
      </p>
    </form>
  </div>
  */ ?>


</div>

    </div>



      </div>



    </div>

  </div>

</section>

<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>