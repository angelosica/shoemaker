<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shoemaker
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header>
	<!-- Navigation -->
  	<nav class="navbar navbar-default navbar-static-top opaque-navbar" role="navigation">
      <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo get_site_url(); ?>"><img class="logo" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/logo.png"></a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->


          <?php
					wp_nav_menu( array(
					    'theme_location'    => 'menu-1',
					    'depth'             => 3,
					    'container'         => 'div',
					    'container_class'   => 'collapse navbar-collapse navbar-right',
					    'container_id'      => 'bs-example-navbar-collapse-1',
					    'menu_class'        => 'nav navbar-nav',
					    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					    'walker'            => new WP_Bootstrap_Navwalker(),
					) );
					?>



          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
  </nav>
	</header>

	<div id="content" class="site-content">
