<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Shoemaker
 */

get_header();
?>

<section class="subpage-hero">
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
			
					<?php
					if ( have_posts() ) :
			
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();
			
							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/content', get_post_type() );
			
						endwhile;
			
						the_posts_navigation();
			
					else :
			
						get_template_part( 'template-parts/content', 'none' );
			
					endif;
					?>
			
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

<?php
get_footer();
