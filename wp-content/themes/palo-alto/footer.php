<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package wpkube
 * @since wpkube 1.0
 */
?>

	</div><!-- #main .site-main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
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

            <?php if ( has_nav_menu( 'footer' ) ) { ?>
                <nav role="navigation" class="site-navigation footer-navigation group">
                    <?php
                        wp_nav_menu( array( 'theme_location' => 'footer', 'menu_class' => 'menu footer-menu group' ) );
                        get_search_form();
                    ?>
                </nav><!-- .site-navigation .main-navigation -->
            <?php } ?>
            
            <?php if ( wpkube_get_option('footer_content') ): ?>
                <div class="footer-content">
                    <?php echo esc_attr( wpkube_get_option('footer_content') ); ?>
                </div><!--.footer-content-->
            <?php endif; ?>

            <div class="site-info">
                <?php do_action( 'wpkube_credits' ); ?>
                <?php if ( wpkube_get_option('footer_credit') ): ?>
                <?php echo esc_attr( wpkube_get_option('footer_credit') ); ?>
                <?php else: ?>
                <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'palo-alto' ) ); ?>"></a>
                <p>&copy; <?php printf( __( '2015 - Plao Alto. All Rights Reserved. Design by %1$s / Code by %2$s', 'palo-alto' ), '<a href="'.esc_url('https://pixelbuddha.net/').'" class="site-link">PixelBuddha Team</a>', '<a href="'.esc_url('http://www.wpkube.com/').'" class="site-link">WPKube</a>' ); ?></p>
                <?php endif; ?>
            </div><!-- .site-info -->
            <div class="footer-social">
                <ul>
                    <?php if ( wpkube_get_option('fb_url') ) { ?>
                    <li><a href="<?php echo esc_url( wpkube_get_option('fb_url') ); ?>"><i class="fa fa-facebook-square"></i></a></li>
                    <?php } 
                        if ( wpkube_get_option('tw_url') ) { 
                    ?>
                    <li><a href="<?php echo esc_url( wpkube_get_option('tw_url') ); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } 
                        if ( wpkube_get_option('ig_url') ) { 
                    ?>
                    <li><a href="<?php echo esc_url( wpkube_get_option('ig_url') ); ?>"><i class="fa fa-instagram"></i></a></li>
                    <?php } 
                        if ( wpkube_get_option('pin_url') ) { 
                    ?>
                    <li><a href="<?php echo esc_url( wpkube_get_option('pin_url') ); ?>"><i class="fa fa-pinterest"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div><!-- container -->
	</footer> <!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->
<?php wp_footer(); ?>

</body>
</html>