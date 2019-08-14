<?php
/**
 * Class bingo_ruby_post_support
 * check post format for classic and single layout
 */
if ( ! function_exists( 'bingo_ruby_check_post_format' ) ) {
	function bingo_ruby_check_post_format() {

		$post_format = get_post_format();
		$post_id     = get_the_ID();

		if ( 'video' == $post_format ) {
			$url             = get_post_meta( $post_id, 'bingo_ruby_post_video_url', true );
            $embed_code      = get_post_meta( $post_id, 'bingo_ruby_post_video_embed', true );
			$self_host_video = get_post_meta( $post_id, 'bingo_ruby_post_video_self_hosted', true );

			if ( ! empty( $url ) || ! empty( $self_host_video ) || ! empty( $embed_code ) ) {
				return 'video';
			} else {
				return 'thumbnail';
			}
		} elseif ( 'audio' == $post_format ) {
			$url             = get_post_meta( $post_id, 'bingo_ruby_post_audio_url', true );
			$self_host_audio = get_post_meta( $post_id, 'bingo_ruby_post_audio_self_hosted', true );

			if ( ! empty( $url ) || ! empty( $self_host_audio ) ) {
				return 'audio';
			} else {
				return 'thumbnail';
			}
		} elseif ( 'gallery' == $post_format ) {
			$gallery = get_post_meta( $post_id, 'bingo_ruby_post_gallery_data', false );
			if ( ! empty( $gallery ) ) {
				return 'gallery';
			} else {
				return 'thumbnail';
			}
		} else {
			return 'thumbnail';
		}
	}
}
