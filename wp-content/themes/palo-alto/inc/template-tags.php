<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package wpkube
 * @since wpkube 1.0
 */

if ( ! function_exists( 'wpkube_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since wpkube 1.0
 */
function wpkube_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = 'site-navigation paging-navigation';
	if ( is_single() )
		$nav_class = 'site-navigation post-navigation';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="assistive-text"><?php _e( 'Post navigation', 'palo-alto' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'palo-alto' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'palo-alto' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'palo-alto' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'palo-alto' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif; // wpkube_content_nav

if ( ! function_exists( 'wpkube_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since wpkube 1.0
 */
function wpkube_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'palo-alto' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'palo-alto' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'palo-alto' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'palo-alto' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'palo-alto' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>, 
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					<?php edit_comment_link( __( '(Edit)', 'palo-alto' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for wpkube_comment()

if ( ! function_exists( 'wpkube_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since wpkube 1.0
 */
function wpkube_posted_on() {
	printf( __( '<time class="entry-date" datetime="%3$s">%3$s</time>', 'palo-alto' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'M d' ) ),
		esc_html( get_the_date() )
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category
 *
 * @since wpkube 1.0
 */
function wpkube_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so wpkube_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so wpkube_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in wpkube_categorized_blog
 *
 * @since wpkube 1.0
 */
function wpkube_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'wpkube_category_transient_flusher' );
add_action( 'save_post', 'wpkube_category_transient_flusher' );

/**
 * Convert the gallery shortcode to flexslider
 *
 * @since wpkube 1.0
 */
function wpkube_image_gallery_post($size = 'full', $id = '') {

	global $post;

	$pattern = get_shortcode_regex();
    preg_match('/'.$pattern.'/s', $post->post_content, $matches);
	if ( isset($matches[2]) && is_array($matches) && $matches[2] == 'gallery') {
		if ( $shortcode_arg = shortcode_parse_atts($matches[3]) ){
			if ( isset($shortcode_arg['ids']) ){
				$args = array( 'post_type' => 'attachment', 
							'post__in' => explode(',', $shortcode_arg['ids']), 
							'orderby' => 'menu_order', 
							'order' => 'ASC' );
			}
		}
	}
	
	if($images = get_posts($args)) {
		if ($id) $divid = ' id="' . $id . '" ';
		?>
		<div <?php echo $divid ?> class="flexslider">
		<ul class="slides">
		<?php
		$i=1;
		$total_slide = count($images);
		foreach($images as $image) {
		?>
			<li>
				<?php echo wp_get_attachment_image($image->ID,$size); ?>
				<p class="gallery-caption"><?php echo $image->post_excerpt; ?></p>
				<p class="gallery-slide-desc"><span><?php echo  $i . __(' of ', 'palo-alto') . $total_slide; ?></span></p>
				</li>
		<?php
			$i++;
		} ?>
		</ul>
		</div>
	<?php
		$slides_html = 1;
	}else{
		$slides_html = 0;
	}
	return $slide_html;
}

/**
 * Get all featured image from portfolio post type to flexslider
 *
 * @since wpkube 1.0
 */
function wpkube_image_posts( $args = '', $size = 'full', $id = '') {
	if($images = get_posts($args)) {
		if ($id) $divid = ' id="' . $id . '" ';
		?>
		<div<?php echo $divid; ?> class="flexslider">
		<ul class="slides">
		<?php
		$i=1;
		$total_slide = count($images);
		foreach($images as $image) {
			//print_r($image);
		?>
			<li>
			<?php echo get_the_post_thumbnail($image->ID, $size); ?>
				<div class="gallery-caption">
					<?php 
						//if ( $image->post_type == 'portfolio'){
						the_taxonomies('post='.$image->ID.'&before=<div class="entry-meta">&after=</div>&sep=, &template=<span class="hide">%s:</span> %l');
						//}
                    ?>
                	<a href="<?php echo get_permalink($image->ID); ?>" class="slide-title" ><?php echo $image->post_title;  ?></a>
                    <article class="boxed">
						<header>
                            <div class="entry-meta">
                            <?php
                                /* translators: used between list items, there is a space after the comma */
                                $categories_list = get_the_category_list( __( ', ', 'palo-alto' ) );
                                if ( $categories_list && wpkube_categorized_blog() ) {
                                    //printf( __( '%1$s ', 'palo-alto' ), $categories_list ); 
                                } // End if categories 
								wpkube_posted_on();
                            ?>
                            	<span class="sep">/</span> <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'palo-alto' ), __( '1 Comment', 'palo-alto' ), __( '% Comments', 'palo-alto' ) ); ?></span>
                            </div>
							<h2 class="post-title h1"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						</header>

					</article>
                 </div>
				<p class="gallery-slide-desc"><span><?php echo  $i . __(' of ', 'palo-alto') . $total_slide; ?></span></p>
			</li>
		<?php
			$i++;
		}
		?>
		</ul>
		</div>
	<?php
		$slides_html = 1;
	}else{
		$slides_html = 0;
	}
	return $slides_html;
}

/**
 * Get the portfolio detail metadata
 *
 * @since wpkube 1.0
 */
function wpkube_portfolio_detail(){
	global $post;
	$portfolio_meta = get_post_meta( $post->ID, '_wpkube_portfolio_options', true );
	?>
	<ul>
    	<li><?php the_excerpt(); ?></li>
        <li>
            <div class="entry-meta"><?php _e('Client', 'palo-alto'); ?></div>
            <h3><?php echo $portfolio_meta['client_name'];  ?></h3>
        </li>
        <li>
            <div class="entry-meta"><?php _e('Year', 'palo-alto'); ?></div>
            <h3><?php echo $portfolio_meta['year'];  ?></h3>
        </li>
        <li>
            <div class="entry-meta"><?php _e('Visit', 'palo-alto'); ?></div>
            <h3><?php echo $portfolio_meta['client_url'];  ?></h3>
        </li>
    </ul>
<?php
}

/**
 * Page Navigation
 *
 * @since wpkube 1.0
 */
function wpkube_pagenavi(){
	global $wp_query, $theme_options;
	$show_number = 2;
	$total = $wp_query->max_num_pages;

	if ( $total > 1 )  {
		if ( !$current_page = get_query_var('paged') )
			$current_page = 1;

		if ( !get_option('permalink_structure' ) ){
			$format = '&paged=%#%';
			if ( is_home() ) $format = '?paged=%#%';
		}else
			$format = '/page/%#%/';

		if ( is_search() ){
			$format = '&paged=%#%';
		}

		echo '<nav class="page-navigation">';
		$paginate =  paginate_links(array(
			'base' => untrailingslashit(get_pagenum_link(1)) . '%_%',
			'format' => $format,
			'current' => $current_page,
			'total' => $total,
			'show_all' => true,
			'type' => 'array',
			'prev_text' => '&larr;',
			'next_text' => '&rarr;',
		));
		$fi = 0;
		$prev = '';
		$first = '';
		$left_dot = '';
		if ( strpos( $paginate[0], 'prev' ) !== false ){
			$fi = 1;
			$prev = '<li>' . $paginate[0] . '</li>';
			if ( ($current_page - $show_number ) > 1 ){
				$fi = $current_page - $show_number;
				$first = '<li>' . preg_replace('/>[^>]*[^<]</', '>First<', $paginate[1]) . '</li>';
				$left_dot = '<li><span>...</span></li>';
			}
		}
		$la = count($paginate) - 1;
		$next = '';
		$last = '';
		$right_dot = '';
		if ( strpos( $paginate[count($paginate) - 1], 'next' ) !== false ){
			$la = count($paginate) - 2;
			$next = '<li>' . $paginate[count($paginate) - 1] . '</li>';
			if ( ($current_page + $show_number ) < $total ){
				$la = $current_page + $show_number;
				$last = '<li>' . preg_replace('/>[^>]*[^<]</', '>Last<', $paginate[count($paginate) - 2]) . '</li>';
				$right_dot = '<li><span>...</span></li>';
			}
		}
		
		echo '<ul class="page_navi clearfix">';
		echo $first . $left_dot;
		echo $prev;
		for ( $i = $fi; $i <= $la; $i++ ){
			echo '<li>' . $paginate[$i] .'</li>';
		}
		echo $right_dot . $last;
		echo $next;
		echo '</ul>';
		echo '</nav>';
	}else{
		echo '<nav class="page-navigation">';
		echo '<span class="page-of">'. __('Page 1 of 1', 'palo-alto') . '</span>';
		echo '</nav>';
	}
}
	
/**
 * Breadcrumbs
 *
 * @since wpkube 1.0
 */
function wpkube_breadcrumb() {
	if ( !is_front_page() ) {
		echo '<div id="breadcrumbs"> <a href="';
		echo home_url();
		echo '">';
		_e('Home', 'palo-alto');
		echo "</a> ";
	}

	if ( (is_category() || is_single()) && !is_attachment() ) {
		$category = get_the_category();
		if (count($category) > 0){
			$ID = $category[0]->cat_ID;
			if ( $ID )	echo get_category_parents($ID, TRUE, ' ', FALSE );
		}
	}

	if(is_single() || is_page()) {the_title();}
	if(is_tag()){ echo "Tag: ".single_tag_title('',FALSE); }
	if(is_404()){ echo "404 - Page not Found"; }
	if(is_search()){ echo "Search"; }
	if(is_year()){ echo get_the_time('Y'); }
	if(is_month()){ echo get_the_time('F Y'); }

	echo "</div>";	
}

/* get video embed string, attached on featured video on the post writing screen */
function wpkube_video_post( $post_id = '' ){
	global $post;
	if ( !$post_id ) $post_id = $post->ID;
	$embed = '';
	if ( 'video' == get_post_format($post_id)){
		$video_options = get_post_meta($post_id, '_wpkube_video_options', true );
		
        if ( $video_options ) {
            $parsed_video_url = parse_url($video_options['video_id']);
            if ( strpos($parsed_video_url['host'],'vimeo.com') !== false ){
                if ( $vimeocolor = wpkube_get_option('content_link_color')) $vimeocolor = ltrim($vimeocolor,'#');
                else $vimeocolor = '00c0ff';

                $embed = '<div class="video-container"><iframe src="http://player.vimeo.com/video'. $parsed_video_url['path'] .'?title=0&amp;byline=0&amp;portrait=0&amp;color='. $vimeocolor .'" ></iframe></div>';
            } elseif( strpos($parsed_video_url['host'],'youtube.com') !== false ){
                $args = wp_parse_args( $parsed_video_url['query'], array('v'=>''));
                $embed = '<div class="video-container"><iframe src="http://www.youtube.com/embed/' . $args['v'] . '?wmode=transparent&amp;autohide=1&amp;egm=0&amp;hd=1&amp;iv_load_policy=3&amp;modestbranding=1&amp;rel=0&amp;showinfo=0&amp;showsearch=0" allowfullscreen></iframe></div>';
            } else{
                $embed = '';
            }
        }
	}else{
		$embed = '';
	}	
	echo $embed;
}

/* get audio embed string, attached on featured audio on the post writing screen */
function wpkube_audio_post( $post_id = '' ){
	global $post;
	if ( !$post_id ) $post_id = $post->ID;
	$embed = '';
	if ( 'audio' == get_post_format($post_id)){
		$audio_options = get_post_meta($post_id, '_wpkube_audio_options', true );
		
        if ( $audio_options ) {
            $parsed_audio_url = $audio_options['audio_id'];
            echo '<div class="audio-container"><iframe width="100%" height="160" border="no" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.$parsed_audio_url.'&auto_play=false&hide_related=false&visual=true"></iframe></div>';
        }
	}else{
		$embed = '';
	}	
	echo $embed;
}

if ( ! function_exists( 'palo_alto_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Palo Alto 1.0
 */
function palo_alto_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

?>