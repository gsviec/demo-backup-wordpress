<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package wpkube
 * @since wpkube 1.0
 */

get_header(); ?>
		<section id="primary" class="content-area boxed">
            <div class="search-result">
                <h3 class="section-title"><span><?php printf( __( 'Search results for %s', 'palo-alto' ), '<span>' . get_search_query() . '</span>' ); ?></span></h3>
                <div class="search-count"><?php /* Search Count */ $allsearch = new WP_Query("s=$s&showposts=-1"); $count = $allsearch->post_count; echo $count . ' Items Found'; wp_reset_query(); ?>
                </div>
            </div>

			<div id="content" class="site-content group" role="main">

			<?php if ( have_posts() ) : ?>


				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content' ); ?>

				<?php endwhile; ?>

				<?php wpkube_pagenavi(); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'search' ); ?>

			<?php endif; ?>

			</div><!-- #content .site-content -->
		</section><!-- #primary .content-area -->

<?php get_footer(); ?>