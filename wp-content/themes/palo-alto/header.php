<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package wpkube
 * @since wpkube 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->


<?php wp_head(); ?>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/selectivizr-min.js" type="text/javascript"></script>
<![endif]-->
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js" type="text/javascript"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="site-header sticky-nav" role="banner">
        <div class="container">
            <hgroup class="logo boxed">
                <?php palo_alto_the_custom_logo(); ?>
                
                <?php if ( wpkube_get_option('logo_text','1') ) { ?>
                <h2 class="site-title h1"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                <?php } ?>
                <?php if ( wpkube_get_option('tagline_text') ) { ?>
                    <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                <?php } ?>
            </hgroup>
            <div class="header-right">
                <nav role="navigation" class="site-navigation primary-navigation group">
                    <?php
                        if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu group' ) );
                        }
                    ?>
                </nav><!-- .site-navigation .main-navigation -->
                <?php get_search_form();?>
            </div><!-- .header-right -->
                <div class="menu-btn" data-effect="st-effect-4"></div>
        </div><!-- .container -->
	</header><!-- #masthead .site-header -->
    
	<div id="main" class="site-main boxed group">