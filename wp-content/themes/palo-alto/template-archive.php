<?php
/*
Template Name: Archives
*/

get_header(); ?>

		<div id="primary" class="content-area boxed">
			<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>

                        <?php if (has_post_thumbnail()): ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="home-thumb boxed" >
                            <?php the_post_thumbnail('large'); ?>
                            </a>
                        <?php endif; ?>
                    </header><!-- .entry-header -->

                    <div class="entry-content boxed">
                        <?php the_content(); ?>
                        <p class="post-tags"><?php the_tags('<span class="icon-tag hidden-text-icon">Tags</span> ', ', ', ''); ?></p>
                        <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'palo-alto' ), 'after' => '</div>' ) ); ?>
                    </div><!-- .entry-content -->
    
                    <div class="archive-template-content">
                        <div class="archive-col">
                            <h3 class="archive-title"><?php _e('Authors','palo-alto'); ?></h3>
                            <ul>
                                <?php wp_list_authors(); ?>
                            </ul>
                        </div>
                        <div class="archive-col">
                            <h3 class="archive-title"><?php _e('Latest Posts','palo-alto'); ?></h3>
                            <ul>
                                <?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 20, 'format' => 'html' ) ); ?>
                            </ul>
                        </div>
                        <div class="archive-col">
                            <h3 class="archive-title"><?php _e('Categories','palo-alto'); ?></h3>
                            <ul>
                                <?php wp_list_categories('title_li='); ?>
                            </ul>
                        </div>
                        <div class="archive-col">
                            <h3 class="archive-title"><?php _e('Posts by Month','palo-alto'); ?></h3>
                            <ul>
                                <?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 12 ) ); ?>
                            </ul>
                        </div>
                    </div><!--.archive-template-content-->
                </article><!-- #post-<?php the_ID(); ?> -->

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->


<?php get_footer(); ?>