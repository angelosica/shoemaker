<?php
/**
 * Template Name: Contact
 *
 * Template for Shoemakermd.com contact
 *
 * @package understrap
 */
get_header();



 if (has_post_thumbnail( $post->ID ) ):
  $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'interior-hero'); ?>

  <section class="subpage-hero" style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url('<?php echo $image[0]; ?>');background-position:center center;background-size:cover;">

<?php else : ?>
    <section class="subpage-hero" style="background-color:#005b7f;">
<?php endif;  ?>


<!--
<section class="subpage-hero" style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url('<?php echo $image[0]; ?>');background-position:center center;">
-->


  <div class="container">
      <div class="row">
          <div class="col-xs-12 ">
	          <h2><?php the_title(); ?></h2>
          </div>
      </div>
  </div>
</section>

<section class="content">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-7">
				<div id="primary" class="content-area">
					<main id="main" class="site-main">

						<?php echo do_shortcode('[wpforms id="50" title="false" description="false"]'); ?>

            <?php
            if( have_rows('location', 'option') ):
              while ( have_rows('location', 'option') ) : the_row(); ?>

                <div class="hours-of-operation">
    							<div class="row">
    								<div class="col-xs-12 col-md-6">
    									<ul>
    										<li><strong><?php the_sub_field('city', 'option'); ?></strong><br/><?php the_sub_field('address', 'option'); ?><br/><?php the_sub_field('city', 'option'); ?>, Texas <?php the_sub_field('zipcode', 'option'); ?></li>
    										<li><i class="fas fa-phone"></i><a href="tel:<?php the_sub_field('phone_number', 'option'); ?>"><?php the_sub_field('phone_number', 'option'); ?></a></li>
    										<li><i class="fas fa-envelope"></i><a href="mailto:<?php the_sub_field('email', 'option'); ?>"><?php the_sub_field('email', 'option'); ?></a></li>
    									</ul>
    								</div>
    								<div class="col-xs-12 col-md-2">
    									<ul>
    										<li>Monday</li>
    										<li>Tuesday</li>
    										<li>Wednesday</li>
    										<li>Thursday</li>
    										<li>Friday</li>
    									</ul>
    								</div>
    								<div class="col-xs-12 col-md-4">
    									<ul>
    										<li><?php the_sub_field('mon_hours', 'option'); ?></li>
    										<li><?php the_sub_field('tue_hours', 'option'); ?></li>
    										<li><?php the_sub_field('wed_hours', 'option'); ?></li>
    										<li><?php the_sub_field('thu_hours', 'option'); ?></li>
    										<li><?php the_sub_field('fri_hours', 'option'); ?></li>
    									</ul>
    								</div>
    							</div>

                  <?php the_sub_field('embedded_google_map', 'option'); ?>

                  <!--
    							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7066.150565858757!2d-97.37717!3d27.684068!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8668f5b4933a4225%3A0x3ee8b6cbec96c4d3!2s5920+Saratoga+Blvd%2C+Corpus+Christi%2C+TX+78414%2C+USA!5e0!3m2!1sen!2sca!4v1543369163244" style="margin-top:15px;" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                -->
    						</div>

              <?php endwhile;
            endif;
            ?>

            <!--
						<div class="hours-of-operation">
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<ul>
										<li><strong>Corpus Christi</strong><br/>5920 Saratoga Blvd.<br/>Corpus Christi Texas 78414</li>
										<li><i class="fas fa-phone"></i><a href="tel:3619297088">361-929-7088</a></li>
										<li><i class="fas fa-envelope"></i><a href="mailto:info@shoemaker.com">info@shoemakermd.com</a></li>
									</ul>
								</div>
								<div class="col-xs-12 col-md-2">
									<ul>
										<li>Monday</li>
										<li>Tuesday</li>
										<li>Wednesday</li>
										<li>Thursday</li>
										<li>Friday</li>
									</ul>
								</div>
								<div class="col-xs-12 col-md-4">
									<ul>
										<li>8:00am - 5:00pm</li>
										<li>8:00am - 5:00pm</li>
										<li>8:00am - 5:00pm</li>
										<li>8:00am - 5:00pm</li>
										<li>8:00am - 5:00pm</li>
									</ul>
								</div>
							</div>

							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7066.150565858757!2d-97.37717!3d27.684068!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8668f5b4933a4225%3A0x3ee8b6cbec96c4d3!2s5920+Saratoga+Blvd%2C+Corpus+Christi%2C+TX+78414%2C+USA!5e0!3m2!1sen!2sca!4v1543369163244" style="margin-top:15px;" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>

						<div class="hours-of-operation">
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<ul>
										<li><strong>Beeville</strong><br/>1406 E Houston Ste C<br/>Beeville, Texas, 78102</li>
										<li><i class="fas fa-phone"></i><a href="tel:3619297088">361-929-7088</a></li>
										<li><i class="fas fa-envelope"></i><a href="mailto:info@shoemaker.com">info@shoemakermd.com</a></li>
									</ul>
								</div>
								<div class="col-xs-12 col-md-2">
									<ul>
										<li>Monday</li>
										<li>Tuesday</li>
										<li>Wednesday</li>
										<li>Thursday</li>
										<li>Friday</li>
									</ul>
								</div>
								<div class="col-xs-12 col-md-4">
									<ul>
										<li>2:00pm - 4:00pm</li>
										<li>CLOSED</li>
										<li>9:00am - 11:00am</li>
										<li>CLOSED</li>
										<li>CLOSED</li>
									</ul>
								</div>
							</div>

							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7018.803699210065!2d-97.732971!3d28.407129!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x866801a828fbbd75%3A0x1e6fba7d7758bf1f!2s1406+E+Houston+St%2C+Beeville%2C+TX+78102%2C+USA!5e0!3m2!1sen!2sca!4v1543370604684" style="margin-top:15px;" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>

						<div class="hours-of-operation">
							<div class="row">
								<div class="col-xs-12 col-md-6">
									<ul>
										<li><strong>Kingsville</strong><br/>509 E King Ave<br/>Kingsville, TX 78363</li>
										<li><i class="fas fa-phone"></i><a href="tel:3619297088">361-929-7088</a></li>
										<li><i class="fas fa-envelope"></i><a href="mailto:info@shoemaker.com">info@shoemakermd.com</a></li>
									</ul>
								</div>
								<div class="col-xs-12 col-md-2">
									<ul>
										<li>Monday</li>
										<li>Tuesday</li>
										<li>Wednesday</li>
										<li>Thursday</li>
										<li>Friday</li>
									</ul>
								</div>
								<div class="col-xs-12 col-md-4">
									<ul>
										<li>CLOSED</li>
										<li>12:30pm - 5:00pm</li>
										<li>CLOSED</li>
										<li>9:00am - 11:00am</li>
										<li>CLOSED</li>
									</ul>
								</div>
							</div>

							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7077.032256966684!2d-97.862828!3d27.51542!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x866628a82233280d%3A0x4d4dc079824bb13e!2s509+E+King+Ave%2C+Kingsville%2C+TX+78363%2C+USA!5e0!3m2!1sen!2sca!4v1543370706645" style="margin-top:15px;" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>

						</div>
          -->
					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<div class="col-xs-12 col-md-4 col-md-offset-1">
				<?php get_sidebar(); ?>
			</div>
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

<section class="logos">
	<div class="container-fluid text-center">
		<div class="row">
			<div class="col-xs-12 col-md-4">
				<img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/geneveve-bottom.png" />
			</div>
			<div class="col-xs-12 col-md-4">
				<img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/biote.png" />
			</div>
			<div class="col-xs-12 col-md-4">
				<img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/exilis.png" />
			</div>
		</div>
	</div>
</section>



<?php get_footer();
