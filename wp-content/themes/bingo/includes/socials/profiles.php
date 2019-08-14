<?php
/**---------------------------------------------------------------------------------------------------------------------
 * @return array
 * get social profile data
 */
if ( ! function_exists( 'bingo_ruby_social_profile_web' ) ) {
	function bingo_ruby_social_profile_web() {

		$social_data               = array();
		$social_data['facebook']   = bingo_ruby_core::get_option( 'social_facebook' );
		$social_data['twitter']    = bingo_ruby_core::get_option( 'social_twitter' );
		$social_data['googleplus'] = bingo_ruby_core::get_option( 'social_googleplus' );
		$social_data['pinterest']  = bingo_ruby_core::get_option( 'social_pinterest' );
		$social_data['linkedin']   = bingo_ruby_core::get_option( 'social_linkedin' );
		$social_data['tumblr']     = bingo_ruby_core::get_option( 'social_tumblr' );
		$social_data['flickr']     = bingo_ruby_core::get_option( 'social_flickr' );
		$social_data['instagram']  = bingo_ruby_core::get_option( 'social_instagram' );
		$social_data['skype']      = bingo_ruby_core::get_option( 'social_skype' );
		$social_data['snapchat']   = bingo_ruby_core::get_option( 'social_snapchat' );
		$social_data['myspace']    = bingo_ruby_core::get_option( 'social_myspace' );
		$social_data['youtube']    = bingo_ruby_core::get_option( 'social_youtube' );
		$social_data['bloglovin']  = bingo_ruby_core::get_option( 'social_bloglovin' );
		$social_data['digg']       = bingo_ruby_core::get_option( 'social_digg' );
		$social_data['dribbble']   = bingo_ruby_core::get_option( 'social_dribbble' );
		$social_data['soundcloud'] = bingo_ruby_core::get_option( 'social_soundcloud' );
		$social_data['vimeo']      = bingo_ruby_core::get_option( 'social_vimeo' );
		$social_data['reddit']     = bingo_ruby_core::get_option( 'social_reddit' );
		$social_data['whatsapp']   = bingo_ruby_core::get_option( 'social_whatsapp' );
		$social_data['vkontakte']  = bingo_ruby_core::get_option( 'social_vk' );
		$social_data['rss']        = bingo_ruby_core::get_option( 'social_rss' );

		return $social_data;
	}
}

/**---------------------------------------------------------------------------------------------------------------------
 * @param $author_id
 *
 * @return array
 * get author social data
 */
if ( ! function_exists( 'bingo_ruby_social_profile_author' ) ) {
	function bingo_ruby_social_profile_author( $author_id ) {

		$social_data                = array();
		$social_data['job']         = get_the_author_meta( 'job', $author_id );
		$social_data['website']     = get_the_author_meta( 'user_url', $author_id );
		$social_data['facebook']    = get_the_author_meta( 'facebook', $author_id );
		$social_data['twitter']     = get_the_author_meta( 'twitter', $author_id );
		$social_data['googleplus']  = get_the_author_meta( 'googleplus', $author_id );
		$social_data['pinterest']   = get_the_author_meta( 'pinterest', $author_id );
		$social_data['linkedin']    = get_the_author_meta( 'linkedin', $author_id );
		$social_data['tumblr']      = get_the_author_meta( 'tumblr', $author_id );
		$social_data['flickr']      = get_the_author_meta( 'flickr', $author_id );
		$social_data['instagram']   = get_the_author_meta( 'instagram', $author_id );
		$social_data['skype']       = get_the_author_meta( 'skype', $author_id );
		$social_data['snapchat']    = get_the_author_meta( 'snapchat', $author_id );
		$social_data['myspace']     = get_the_author_meta( 'myspace', $author_id );
		$social_data['youtube']     = get_the_author_meta( 'youtube', $author_id );
		$social_data['bloglovin']   = get_the_author_meta( 'bloglovin', $author_id );
		$social_data['digg']        = get_the_author_meta( 'digg', $author_id );
		$social_data['dribbble']    = get_the_author_meta( 'dribbble', $author_id );
		$social_data['soundcloud']  = get_the_author_meta( 'soundcloud', $author_id );
		$social_data['vimeo']       = get_the_author_meta( 'vimeo', $author_id );
		$social_data['reddit']      = get_the_author_meta( 'reddit', $author_id );
		$social_data['vkontakte']   = get_the_author_meta( 'vkontakte', $author_id );
		$social_data['rss']         = get_the_author_meta( 'rss', $author_id );
		$social_data['description'] = get_the_author_meta( 'description', $author_id );

		return $social_data;
	}
}