<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * add tinymce to wysywyg
 */

if ( ! class_exists( 'bingo_ruby_plugin_shortcode' ) ) {
	return;
}

if ( ! function_exists( 'bingo_ruby_add_tinymce' ) ) {

	function bingo_ruby_add_tinymce() {

		global $typenow;

		if ( 'post' != $typenow && 'page' != $typenow ) {
			return false;
		}

		add_filter( 'mce_buttons', 'bingo_ruby_tinymce_add_button' );
		add_filter( 'mce_external_plugins', 'bingo_ruby_tinymce_plugin' );

	}

	add_action( 'admin_head', 'bingo_ruby_add_tinymce' );
}

if ( ! function_exists( 'bingo_ruby_tinymce_plugin' ) ) {
	function bingo_ruby_tinymce_plugin( $plugin_array ) {

		$plugin_array['bingo_ruby_shortcode'] = get_template_directory_uri() . '/backend/tinymce/tinymce_script.js';

		return $plugin_array;
	}
}

if ( ! function_exists( 'bingo_ruby_tinymce_add_button' ) ) {
	function bingo_ruby_tinymce_add_button( $buttons ) {

		array_push( $buttons, 'bingo_ruby_button_key' );

		return $buttons;
	}
}
