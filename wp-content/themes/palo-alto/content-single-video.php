<?php
/**
 * @package wpkube
 * @since wpkube 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
    <div class="post-content">
        <header class="entry-header">
            <div class="entry-meta">
                <span class="post-cats"><?php the_category(', '); ?></span>
                <?php
                    wpkube_posted_on();
                ?>
                <?php  //edit_post_link( __( 'Edit', 'palo-alto' ), ' <span class="sep">/</span> <span class="edit-link">', '</span>' );  ?>

            </div><!-- .entry-meta -->
            <h1 class="entry-title"><?php the_title(); ?></h1>

		<?php wpkube_video_post(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content boxed">
		<?php the_content(); ?>
        <p class="tags"><?php the_tags('#','#',''); ?></p>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'palo-alto' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
    </div>
    <aside class="related-box boxed">
		<h3 class="section-title"><?php _e('Related Posts', 'palo-alto'); ?></h3>
		<?php wpkube_related_posts(); ?>
    </aside>

	<footer class="boxed">
		<?php $gravatar = md5(get_the_author_meta('user_email')); $default = get_template_directory_uri().'/images/avatar.png'; ?>
        <img class="author-avatar alignleft" src="http://www.gravatar.com/avatar/<?php echo $gravatar; ?>?d=<?php echo $default; ?>&amp;s=50" style="margin-top:5px;" alt="author avatar"  />
        <p><span class="inline-icon-user"><?php the_author_posts_link(); ?></span></p>
		<p class="author-description"><?php the_author_meta('description'); ?></p>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
