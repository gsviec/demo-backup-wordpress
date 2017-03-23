<?php
/**
 * @package wpkube
 * @since wpkube 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
    <?php if (has_post_thumbnail()): ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="home-thumb boxed" >
            <?php the_post_thumbnail('large'); ?>
            </a>
        <?php endif; ?>
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
        </header><!-- .entry-header -->

        <div class="entry-content boxed">
            <?php the_content(); ?>
            <div class="post-footer">
                <?php $wpkube_share_buttons = wpkube_get_option('share_buttons'); ?>
                <?php if ( $wpkube_share_buttons ) { ?>
                <div class="share-buttons">
                    <span class="tweet-button share-button">
                    <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </span>
                    <span class="fb-button share-button">
                        <div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo get_permalink(); ?>" show_faces="false" width="70" layout="button_count"></fb:like>
                    </span>
                    <span class="gplus-button share-button">
                        <g:plusone size="medium" href="<?php the_permalink(); ?>"></g:plusone>
                    </span>
                    <span class="pinit-button share-button">
                        <?php $pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID)); ?>&media=<?php echo $pinterestimage[0]; ?>&description=<?php the_title(); ?>" class="pin-it-button" count-layout="vertical">Pin It</a>
                    </span>
                </div>
                <?php } ?>
                <p class="tags"><?php the_tags('#','#',''); ?></p>
            </div>
            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'palo-alto' ), 'after' => '</div>' ) ); ?>
        </div><!-- .entry-content -->
    </div><!-- .post-content -->

	<footer class="author-desc">
        <h3 class="section-title"><?php _e('Author Box', 'palo-alto'); ?></h3>
		<?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_meta('email'), '50' );  } ?>
        <p><span class="inline-icon-user"><?php the_author_posts_link(); ?></span></p>
		<p class="author-description"><?php the_author_meta('description'); ?></p>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
