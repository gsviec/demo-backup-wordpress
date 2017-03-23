<?php get_header(); ?>

<div class="content-title">
	<?php _e("404! We couldn't find the page!", 'sight'); ?>
</div>

<div class="entry">
	<div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
		<div class="post-content">
			<p><?php _e("The page you've requested can not be displayed. It appears you've missed your intended destination, either through a bad or outdated link, or a typo in the page you were hoping to reach.", 'sight'); ?></p>
		</div>
	</div>
</div>

<?php get_footer(); ?>
