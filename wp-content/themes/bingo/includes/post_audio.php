<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render audio iframe
 */
if ( ! function_exists( 'bingo_ruby_iframe_audio' ) ) {
	function bingo_ruby_iframe_audio() {
		//check audio link
		$post_id              = get_the_ID();
		$audio_url            = get_post_meta( $post_id, 'bingo_ruby_post_audio_url', true );
		$self_hosted_audio_id = get_post_meta( $post_id, 'bingo_ruby_post_audio_self_hosted', true );

		if ( ! empty( $self_hosted_audio_id ) ) {
			return bingo_ruby_iframe_audio_self_hosted( $self_hosted_audio_id );
		} else {
			if ( ( 'audio' != get_post_format() ) || empty( $audio_url ) ) {
				return false;
			}
			$iframe = wp_oembed_get( $audio_url, array( 'height' => 505, 'width' => 900 ) );

			if ( ! empty( $iframe ) ) {
				return $iframe;
			} else {
				return false;
			}
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $audio_id
 *
 * @return string
 * render self hosted audio
 */
if ( ! function_exists( 'bingo_ruby_iframe_audio_self_hosted' ) ) {
	function bingo_ruby_iframe_audio_self_hosted( $audio_id ) {

		$wp_version = floatval( get_bloginfo( 'version' ) );

		if ( $wp_version < "3.6" ) {
			return '<p class="ruby-error">' . esc_html__( 'Current WordPress version do not support self-hosted video, please update WordPress to latest version to display this video', 'bingo' ) . '</p>';
		}
		$self_hosted_url = wp_get_attachment_url( $audio_id );
		$params          = array(
			'src' => $self_hosted_url,
		);

		return wp_audio_shortcode( $params );
	}

}
