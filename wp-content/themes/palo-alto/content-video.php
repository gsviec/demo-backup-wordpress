<?php
/**
 * @package wpkube
 * @since wpkube 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('boxed'); ?>>
	<?php
        $nothumb = "no-thumb";

        if (has_post_thumbnail()):
            $nothumb = "";
        endif;
    ?>
	
    <?php wpkube_video_post(); ?>
    
    <div class="post-content">
	<header class="entry-header <?php echo $nothumb; ?>">
        <div class="entry-meta">
			<?php				
				wpkube_posted_on();
			?>
            
            <span class="post-cats"><?php the_category(' '); ?></span>
			<?php  //edit_post_link( __( 'Edit', 'palo-alto' ), ' <span class="sep">/</span> <span class="edit-link">', '</span>' );  ?>

		</div><!-- .entry-meta -->
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'palo-alto' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<?php if ( 'post' == get_post_type() ) : ?>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary  <?php echo $nothumb; ?>">
        <?php the_excerpt(); ?>
        <div class="post-bottom">
            <p class="read-more"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'palo-alto' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php _e("Read more", 'palo-alto'); ?></a></p>
            <p class="tags"><?php the_tags('#','#',''); ?></p>
        </div>
	</div><!-- .entry-summary -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
