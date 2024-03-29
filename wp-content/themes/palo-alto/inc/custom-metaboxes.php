<?php
/*	List all files for metaboxes 
	in the post screen

*/

/***
Video Metabox
***/
add_action('admin_init', 'wpkube_video_metabox');
function wpkube_video_metabox(){
    add_meta_box( 
        'wpkube_video',
        __( ' Featured video', 'palo-alto' ),
        'wpkube_video_metabox_form',
        'post' ,
		'side'
    );
}

function wpkube_video_metabox_form(){
	global $post;
	
	$default = array( 'video_provider' => '', 'video_id' => '' );
	$video_options = get_post_meta($post->ID, '_wpkube_video_options', true);
	$video_options = wp_parse_args($video_options, $default);
	
	wp_nonce_field('video_metabox_nonce_id','video_metabox_nonce');
?>
<div id="video-metabox">
	<p>
		<label for="video_id"><?php _e('Video URL', 'palo-alto'); ?></label>
		<input type="text" id="video_id" name="video_options[video_id]" value="<?php echo $video_options['video_id']; ?>" />
		<br /><small><?php _e('Insert video URL for Youtube or Vimeo. eg: http://www.youtube.com/watch?v=wq7ftOZBy0E', 'palo-alto'); ?></small>
	</p>
	<p class="description"><?php _e('NOTE: Video format support Youtube and Vimeo.','palo-alto'); ?></p>
</div>
<?php
}

add_action('save_post', 'wpkube_video_metabox_save');
function wpkube_video_metabox_save(){
	global $post, $shortname;
	
	if ( isset($post) )
		$post_id = $post->ID;
	else
		$post_id = 0;
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times

	if ( isset($_POST['video_metabox_nonce'] ) && !wp_verify_nonce( $_POST['video_metabox_nonce'], 'video_metabox_nonce_id' )  )
		return $post_id;

	// verify if this is an auto save routine. 
	// If it is our form has not been submitted, so we dont want to do anything
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;

  
	// Check permissions
	if ($post_id)
	{
		if ( !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
	}

	// OK, we're authenticated: we need to find and save the data

	$video_options = (isset($_POST['video_options']) ) ? $_POST['video_options'] : '';
	update_post_meta($post_id, '_wpkube_video_options', $video_options);
	return $post_id;
}

/***
Audio Metabox
***/
add_action('admin_init', 'wpkube_audio_metabox');
function wpkube_audio_metabox(){
    add_meta_box( 
        'wpkube_audio',
        __( ' Featured audio', 'palo-alto' ),
        'wpkube_audio_metabox_form',
        'post' ,
		'side'
    );
}

function wpkube_audio_metabox_form(){
	global $post;
	
	$default = array( 'audio_provider' => '', 'audio_id' => '' );
	$audio_options = get_post_meta($post->ID, '_wpkube_audio_options', true);
	$audio_options = wp_parse_args($audio_options, $default);
	
	wp_nonce_field('audio_metabox_nonce_id','audio_metabox_nonce');
?>
<div id="audio-metabox">
	<p>
		<label for="audio_id"><?php _e('Soundcloud URL', 'palo-alto'); ?></label>
		<input type="text" id="audio_id" name="audio_options[audio_id]" value="<?php echo $audio_options['audio_id']; ?>" />
		<br /><small><?php _e('Insert Soundcloud URL. eg: https://soundcloud.com/tonykakkar/hanju-tony-kakkar-ft-neha', 'palo-alto'); ?></small>
	</p>
</div>
<?php
}

add_action('save_post', 'wpkube_audio_metabox_save');
function wpkube_audio_metabox_save(){
	global $post, $shortname;
	
	if ( isset($post) )
		$post_id = $post->ID;
	else
		$post_id = 0;
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times

	if ( isset($_POST['audio_metabox_nonce'] ) && !wp_verify_nonce( $_POST['audio_metabox_nonce'], 'audio_metabox_nonce_id' )  )
		return $post_id;

	// verify if this is an auto save routine. 
	// If it is our form has not been submitted, so we dont want to do anything
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
		return $post_id;

  
	// Check permissions
	if ($post_id)
	{
		if ( !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
	}

	// OK, we're authenticated: we need to find and save the data

	$audio_options = (isset($_POST['audio_options']) ) ? $_POST['audio_options'] : '';
	update_post_meta($post_id, '_wpkube_audio_options', $audio_options);
	return $post_id;
}
?>