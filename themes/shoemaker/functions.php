<?php
/**
 * Shoemaker functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shoemaker
 */

if ( ! function_exists( 'shoemaker_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shoemaker_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Shoemaker, use a find and replace
		 * to change 'shoemaker' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shoemaker', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'interior-hero', 1920, 220, true );

		add_filter( 'image_size_names_choose', 'shoemaker_custom_sizes' );
		function shoemaker_custom_sizes( $sizes ) {
		    return array_merge( $sizes, array(
		        'interior-hero' => __( 'Interior Hero' ),
		    ) );
		}

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'shoemaker' ),
		) );

		// Register Custom Navigation Walker
		require_once get_template_directory() . '/wp-bootstrap-navwalker.php';
		//require_once get_template_directory() . '/wp_bootstrap_navwalker.php';

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'shoemaker_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'shoemaker_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shoemaker_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'shoemaker_content_width', 640 );
}
add_action( 'after_setup_theme', 'shoemaker_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shoemaker_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shoemaker' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shoemaker' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'shoemaker_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shoemaker_scripts() {

	wp_enqueue_style('shoemaker-bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');

	wp_enqueue_style('shoemaker-fontawesome', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css');

	wp_enqueue_style( 'shoemaker-style', get_stylesheet_uri() );

	wp_enqueue_style('shoemaker-smartmenu', get_template_directory_uri() . '/smartmenu/jquery.smartmenus.bootstrap.css', array('shoemaker-bootstrap'));
	
	wp_enqueue_script( 'shoemaker-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'shoemaker-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	//wp_enqueue_script( 'shoemaker-bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array('jquery'), '3.3.4', true );
	wp_enqueue_script( 'shoemaker-bootstrap-js-local', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), null, true );
	
	wp_enqueue_script( 'shoemaker-smartmenu-js', get_template_directory_uri() . '/smartmenu/jquery.smartmenus.js', array('jquery','shoemaker-bootstrap-js-local'), '3.3.4', true );
	
	wp_enqueue_script( 'shoemaker-smartmenu-boot-js', get_template_directory_uri() . '/smartmenu/jquery.smartmenus.bootstrap.js', array('jquery','shoemaker-bootstrap-js-local','shoemaker-smartmenu-js'), '3.3.4', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shoemaker_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

}

remove_filter ('acf_the_content', 'wpautop');

function get_excerpt($limit, $source = null){
    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'...';
    return $excerpt;
}

function testimonials_init() {
    $args = array(
      'label' => 'Testimonials',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'testimonials'),
        'query_var' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
        );
    register_post_type( 'testimonials', $args );
}
add_action( 'init', 'testimonials_init' );






// Register and load the widget
function wpb_load_widget() {
    register_widget( 'request_an_appointment' );
		register_widget( 'we_want_your_feedback' );
		register_widget( 'testimonial_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class request_an_appointment extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'request_an_appointment',

// Widget name will appear in UI
__('1. Request an Appointment', 'request_an_appointment_domain'),

// Widget description
array( 'description' => __( 'Add a \'Request an Appointment\' button to sidebar', 'request_an_appointment_domain' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )

echo '<a href="https://client.blackbearnj.com/shoemaker/request-an-appointment/"><img class="img-responsive" alt="" src="https://client.blackbearnj.com/shoemaker/wp-content/themes/shoemaker/assets/img/request-an-appointment.png" /></a>';

echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'request_an_appointment_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class request_an_appointment ends here



// Creating the widget
class we_want_your_feedback extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'we_want_your_feedback',

// Widget name will appear in UI
__('2. We want your feedback', 'we_want_your_feedback_domain'),

// Widget description
array( 'description' => __( 'Add a \'We Want Your Feedback\' button to sidebar', 'we_want_your_feedback_domain' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )

echo '<a href="http://s.trackbackinc.com/s3/Dr-Stan-Shoemaker" target="_blank"><img class="img-responsive" alt="" src="https://client.blackbearnj.com/shoemaker/wp-content/themes/shoemaker/assets/img/we-want-your-feedback.png" /></a>';

echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'we_want_your_feedback_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class request_an_appointment ends here





// Creating the widget
class testimonial_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'testimonial_widget',

// Widget name will appear in UI
__('3. Testimonial Widget', 'testimonial_widget_domain'),

// Widget description
array( 'description' => __( 'Add a Testimonial slider to sidebar', 'testimonial_widget_domain' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )

echo '<div class="sidebar-testimonials">
	<h3 style="text-transform:uppercase;">Testimonials</h3>





<div class="carousel slide" data-ride="carousel" id="quote-carousel">

  <div class="carousel-inner">';

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

		<div class="item <?php echo esc_attr( $class ); ?>">

			<?php echo get_excerpt(150); ?>
			<h4><?php the_title(); ?></h4>
			<h5><?php the_field('review_title'); ?></h5>

		</div>

		<?php endwhile;

echo '


  </div>
</div>
<a href="https://client.blackbearnj.com/shoemaker/testimonials">View all testimonials</a>
</div>';

echo $args['after_widget'];
}

// Widget Backend
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'testimonial_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php
}

// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class request_an_appointment ends here
