<?php
// Re-define meta box path and URL
$bingo_ruby_template_directory = get_template_directory();

//including config file
require_once $bingo_ruby_template_directory . '/metaboxes/panels/post.php';
require_once $bingo_ruby_template_directory . '/metaboxes/panels/post_ajax.php';
require_once $bingo_ruby_template_directory . '/metaboxes/panels/gallery.php';
require_once $bingo_ruby_template_directory . '/metaboxes/panels/video.php';
require_once $bingo_ruby_template_directory . '/metaboxes/panels/audio.php';
require_once $bingo_ruby_template_directory . '/metaboxes/panels/review.php';
require_once $bingo_ruby_template_directory . '/metaboxes/panels/sidebar.php';
require_once $bingo_ruby_template_directory . '/metaboxes/panels/comment.php';
require_once $bingo_ruby_template_directory . '/metaboxes/panels/author.php';
require_once $bingo_ruby_template_directory . '/metaboxes/panels/post_forgery.php';
require_once $bingo_ruby_template_directory . '/metaboxes/panels/page.php';
require_once $bingo_ruby_template_directory . '/metaboxes/panels/composer.php';


/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * meta box config
 */
if ( ! function_exists( 'bingo_ruby_theme_meta_boxes_config' ) ) {
	function bingo_ruby_theme_meta_boxes_config( $meta_boxes ) {

		if ( ! class_exists( 'RW_Meta_Box' ) ) {
			return false;
		}

        $meta_boxes[] = bingo_ruby_metabox_single_post_video();
        $meta_boxes[] = bingo_ruby_metabox_single_post_audio();
        $meta_boxes[] = bingo_ruby_metabox_single_post_gallery();
		$meta_boxes[] = bingo_ruby_metabox_single_page();
		$meta_boxes[] = bingo_ruby_metabox_single_post_review();
		$meta_boxes[] = bingo_ruby_metabox_single_post_options();
		$meta_boxes[] = bingo_ruby_metabox_single_post_ajax();
		$meta_boxes[] = bingo_ruby_metabox_single_post_review();
		$meta_boxes[] = bingo_ruby_metabox_sidebar();
		$meta_boxes[] = bingo_ruby_metabox_comment_box();
		$meta_boxes[] = bingo_ruby_metabox_author_box();
		if ( function_exists( 'bingo_ruby_plugin_view_add' ) ) {
			$meta_boxes[] = bingo_ruby_metabox_single_post_forgery();
		}
		$meta_boxes[] = bingo_ruby_metabox_composer();

		return $meta_boxes;
	}

	//initialize the meta-box class
	add_filter( 'rwmb_meta_boxes', 'bingo_ruby_theme_meta_boxes_config' );

};

/**-------------------------------------------------------------------------------------------------------------------------
 * after post title priority
 */
if ( ! function_exists( 'bingo_ruby_metabox_priority_top' ) ) {
	function bingo_ruby_metabox_priority_top() {

		if ( ! is_admin() ) {
			return false;
		}

		global $post, $wp_meta_boxes;
		do_meta_boxes( get_current_screen(), 'top', $post );
		unset( $wp_meta_boxes[ get_post_type( $post ) ]['top'] );

		return false;
	}

	add_action( 'edit_form_after_title', 'bingo_ruby_metabox_priority_top' );
}