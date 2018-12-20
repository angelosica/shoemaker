<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Shoemaker
 */

get_header();


if (has_post_thumbnail( $post->ID ) ):
 $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'interior-hero'); ?>

 <section class="subpage-hero" style="background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url('<?php echo $image[0]; ?>');background-position:center center;background-size:cover;">

<?php else : ?>
   <section class="subpage-hero" style="background-color:#005b7f;">
<?php endif;  ?>


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
					while ( have_posts() ) :
						the_post();

						the_content();

					endwhile; // End of the loop.
					?>

					</main><!-- #main -->
				</div><!-- #primary -->
			</div>
			<div class="col-xs-8 col-xs-offset-2 col-md-4 col-md-offset-1">
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





<?php get_footer();
