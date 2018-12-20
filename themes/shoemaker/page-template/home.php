<?php
/**
 * Template Name: Home
 *
 * Template for Shoemakermd.com homepage
 *
 * @package understrap
 */

get_header(); ?>

<section class="hero" style="position:relative;background: url('<?php the_field('background_image'); ?>') center center no-repeat scroll;">
  <div class="container" style="position:absolute;bottom:0;">
      <div class="row">
          <div class="col-xs-12 col-md-4 hero-content text-center hero-content">

            <!--
	          <img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/innovations-in-health.png" />
	          <p>Presents</p>
	          <img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/geneveve.png" />
	          <p>For Treatment Of Vaginal Rejuvenation &amp; Urinary Incontinence</p>
-->

            <?php echo get_field('content'); ?>

          </div>
      </div>
  </div>
</section>

<section class="services-bar">
	<div class="container-fluid">
		<div class="row">

      <?php
      $blue_box_1 = get_field('blue_box_1');
      if( $blue_box_1 ): ?>
        <a href="<?php echo $blue_box_1['url']; ?>">
          <div class="col-md-5ths col-xs-12 dark-blue">
            <div class="child">
              <img src="<?php echo $blue_box_1['image']; ?>" />
              <p><?php echo $blue_box_1['text']; ?></p>
            </div>
          </div>
        </a>
      <?php endif; ?>

      <?php
      $blue_box_2 = get_field('blue_box_2');
      if( $blue_box_2 ): ?>
        <a href="<?php echo $blue_box_2['url']; ?>">
          <div class="col-md-5ths col-xs-12 light-blue">
            <div class="child">
              <img src="<?php echo $blue_box_2['image']; ?>" />
              <p><?php echo $blue_box_2['text']; ?></p>
            </div>
          </div>
        </a>
      <?php endif; ?>

      <?php
      $blue_box_3 = get_field('blue_box_3');
      if( $blue_box_3 ): ?>
        <a href="<?php echo $blue_box_3['url']; ?>">
          <div class="col-md-5ths col-xs-12 dark-blue">
            <div class="child">
              <img src="<?php echo $blue_box_3['image']; ?>" />
              <p><?php echo $blue_box_3['text']; ?></p>
            </div>
          </div>
        </a>
      <?php endif; ?>

      <?php
      $blue_box_4 = get_field('blue_box_4');
      if( $blue_box_4 ): ?>
        <a href="<?php echo $blue_box_4['url']; ?>">
          <div class="col-md-5ths col-xs-12 light-blue">
            <div class="child">
              <img src="<?php echo $blue_box_4['image']; ?>" />
              <p><?php echo $blue_box_4['text']; ?></p>
            </div>
          </div>
        </a>
      <?php endif; ?>

      <?php
      $blue_box_5 = get_field('blue_box_5');
      if( $blue_box_5 ): ?>
        <a href="<?php echo $blue_box_5['url']; ?>">
          <div class="col-md-5ths col-xs-12 dark-blue">
            <div class="child">
              <img src="<?php echo $blue_box_5['image']; ?>" />
              <p><?php echo $blue_box_5['text']; ?></p>
            </div>
          </div>
        </a>
      <?php endif; ?>
		</div>
	</div>
</section>

<section class="welcome">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-10 col-md-offset-1 home-content">
				<?php the_field('home_content'); ?>
			</div>
		</div>
	</div>
</section>

<section class="testimonial">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-2">
				<h1 class="heading-small">Talking About Us</h1>
			</div>
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<div class="carousel slide" data-ride="carousel" id="quote-carousel">
        <!-- Bottom Carousel Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#quote-carousel" data-slide-to="1"></li>
          <li data-target="#quote-carousel" data-slide-to="2"></li>
        </ol>

        <!-- Carousel Slides / Quotes -->
        <div class="carousel-inner">

          <?php
          $args = array( 'post_type' => 'testimonials' );
      		$loop = new WP_Query( $args );
      		$first = TRUE;
      		while ( $loop->have_posts() ) : $loop->the_post();

      		$class = "";
      	   	if($first)
      	   	{
      	      $class = "active";
      	      $first = FALSE;
      	   	}
      		?>

      		<div class="item  <?php echo esc_attr( $class ); ?>">

            <blockquote>
              <div class="row">
                <div class="col-xs-12 home-testimonial">
	                <h2><?php the_title(); ?></h2>
	                <h4><?php the_field('review_title'); ?></h4>
                  <p><?php echo get_excerpt(250); ?></p>
                </div>
              </div>
            </blockquote>



      		</div>

          <?php endwhile; wp_reset_postdata(); ?>

        </div>

        <!-- Carousel Buttons Next/Prev -->
        <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
        <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
      </div>
		</div>
	</div>
</section>

<section class="featured">
	<div class="container-fluid text-center">
		<div class="row">
			<h2>Featured Services</h2>

      <?php
      if( have_rows('featured_services') ):
        while ( have_rows('featured_services') ) : the_row(); ?>

        <a href="<?php the_sub_field('link'); ?>">
  				<div class="col-xs-12 col-md-4" style="background-image:url('<?php the_sub_field('image'); ?>');">
  					<p class="banner"><?php the_sub_field('title'); ?></p>
  				</div>
  			</a>

        <?php endwhile;
      endif;
      ?>
		</div>
	</div>
</section>

<section class="newsletter">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<h1 class="heading-small">Newsletter</h1>
				<p class="subheading"><em>we'd love to hear from you!</em></p>
			</div>
			<div class="col-xs-12 col-md-8">
				<div class="subscribe_now">
          <form class="subscribe_form">
            <div class="input-group">
              <input type="text" class="form-control" name="email" placeholder="Enter your email...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Subscribe</button>
              </span>
            </div>
            <em style="margin-top:10px;">We respect your privacy!</em>
          </form>
        </div>
			</div>
		</div>
	</div>
</section>



<?php get_footer(); ?>
