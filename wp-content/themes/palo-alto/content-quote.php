<?php
/**
 * @package wpkube
 * @since wpkube 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('boxed'); ?>>
    <div class="post-content">
	<header class="entry-header">
        <div class="entry-meta">            
            <span class="post-cats"><?php the_category(' '); ?></span>
			<?php  //edit_post_link( __( 'Edit', 'palo-alto' ), ' <span class="sep">/</span> <span class="edit-link">', '</span>' );  ?>

		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-summary">
        <?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
