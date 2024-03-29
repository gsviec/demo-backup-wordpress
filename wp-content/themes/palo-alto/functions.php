<?php
/**
 * wpkube functions and definitions
 *
 * @package wpkube
 * @since wpkube 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since wpkube 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 900; /* pixels */
	
/**
 * Set global variabel for theme ooptions.
 *
 * @since wpkube 1.0
 */
$theme_options = get_option('upright_option');
//print_r($theme_options);

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'wpkube_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since wpkube 1.0
 */
function wpkube_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom form template tags for this theme.
	 */
	require( get_template_directory() . '/inc/form-template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer-simple.php' );
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Portfolio post type and additional metabox for it
	 */
	//require( get_template_directory() . '/inc/portfolio-post-type.php' );

	/**
	 * Custom metaboxes for post or page
	 */
	require( get_template_directory() . '/inc/custom-metaboxes.php' );


	require( get_template_directory() . '/inc/export-import-setting.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on wpkube, use a find and replace
	 * to change 'palo-alto' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'palo-alto', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );
    add_theme_support( "title-tag" );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Palo Alto 1.0
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 190,
		'flex-height' => true,
	) );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('thumb-954', 954, 535, true );
    add_image_size('thumb-430', 270, 170, true );
    add_image_size('thumb-slider', 1170, 515, true );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'palo-alto' ),
		'footer' => __( 'Footer Menu', 'palo-alto' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'audio', 'quote', 'video' ) );
}
endif; // wpkube_setup
add_action( 'after_setup_theme', 'wpkube_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function wpkube_register_custom_background() {
	$args = array(
		'default-color' => 'f4f4f4',
		'default-image' => '',
	);

	$args = apply_filters( 'wpkube_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
        add_theme_support( 'custom-background', $args );
	}
}
add_action( 'after_setup_theme', 'wpkube_register_custom_background' );

/**
 * Enqueue scripts and styles
 */
function wpkube_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_register_style( 'responsive', get_template_directory_uri() . '/responsive.css' );
	wp_enqueue_style( 'responsive' );
    wp_register_style( 'font-awesome', get_template_directory_uri() . '/fonts/font-awesome.css' );
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/js/jquery.imagesloaded.min.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'wpblog-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.min.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'upright', get_template_directory_uri() . '/js/upright.js', array( 'jquery' ), '20120206', true );
	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '20120206', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpkube_scripts' );

function wpkube_share_button_scripts() {
    echo '<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>';
    
    echo '<script type="text/javascript">
(function() {
    window.PinIt = window.PinIt || { loaded:false };
    if (window.PinIt.loaded) return;
    window.PinIt.loaded = true;
    function async_load(){
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.async = true;
        s.src = "http://assets.pinterest.com/js/pinit.js";
        var x = document.getElementsByTagName("script")[0];
        x.parentNode.insertBefore(s, x);
    }
    if (window.attachEvent)
        window.attachEvent("onload", async_load);
    else
        window.addEventListener("load", async_load, false);
})();
</script>';
}
add_action('wp_footer', 'wpkube_share_button_scripts');

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );


/**
 * Get theme option set by customizer
 */
function wpkube_get_option($optname, $default=''){

	return get_theme_mod($optname,$default);

}
add_filter('wp_list_categories', 'cat_count_span_inline');
function cat_count_span_inline($output) {
$output = str_replace('</a> (','<span> ',$output);
$output = str_replace(')','</span></a> ',$output);
return $output;
}

add_filter( 'post_class', 'mark_first_post' );

function mark_first_post( $classes )
{
    remove_filter( current_filter(), __FUNCTION__ );
    $classes[] = 'first-post';
    return $classes;
}
?>