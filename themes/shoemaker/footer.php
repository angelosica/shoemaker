<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shoemaker
 */

?>
<section class="logos">
	<div class="container-fluid text-center">
		<div class="row">
      <?php
      if( have_rows('logo', 'options') ):
        while ( have_rows('logo', 'options') ) : the_row(); ?>
          <div class="col-xs-12 col-md-4">
    				<a href="<?php the_sub_field('link', 'options'); ?>"><img alt="" src="<?php the_sub_field('logo', 'options'); ?>" /></a>
    			</div>
        <?php endwhile;
      endif;
      ?>
		</div>
	</div>
</section>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-md-3 text-center">
					<img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo-white.png" />
					<p><a class="phone" href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a></p>
					<ul class="social-links">
						<li><a href="<?php the_field('facebook', 'option'); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
						<li><a href="<?php the_field('twitter', 'option'); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a href="<?php the_field('youtube', 'option'); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-md-6">
					<h3>Quick Links</h3>
					<div class="row">
						<div class="col-xs-12 col-md-4">
							<ul>
								<?php
								if( have_rows('col_1', 'option') ):
									while ( have_rows('col_1', 'option') ) : the_row(); ?>
										<li><a href="<?php the_sub_field('link_url', 'option'); ?>"><?php the_sub_field('link_title', 'option'); ?></a></li>
									<?php endwhile;
								endif;
								?>
							</ul>
						</div>
						<div class="col-xs-12 col-md-4">
							<ul>
								<?php
								if( have_rows('col_2', 'option') ):
									while ( have_rows('col_2', 'option') ) : the_row(); ?>

										<li><a href="<?php the_sub_field('link_url', 'option'); ?>"><?php the_sub_field('link_title', 'option'); ?></a></li>
									<?php endwhile;
								endif;
								?>
							</ul>
						</div>
						<div class="col-xs-12 col-md-4">
							<ul>
								<?php
								if( have_rows('col_3', 'option') ):
									while ( have_rows('col_3', 'option') ) : the_row(); ?>
										<li><a href="<?php the_sub_field('link_url', 'option'); ?>"><?php the_sub_field('link_title', 'option'); ?></a></li>
									<?php endwhile;
								endif;
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-3">
					<h3>Locations</h3>
					<ul>
						<?php
						if( have_rows('location', 'option') ):
							while ( have_rows('location', 'option') ) : the_row(); ?>

								<li><?php the_sub_field('address', 'option'); ?><br/><?php the_sub_field('city', 'option'); ?>, Texas <?php the_sub_field('zipcode', 'option'); ?></li>

							<?php endwhile;
						endif;
						?>
					</ul>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


</body>
</html>
