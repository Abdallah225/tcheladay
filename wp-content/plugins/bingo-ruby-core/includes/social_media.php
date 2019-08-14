<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $flickr_id
 * @param int $num_images
 * @param string $tags
 *
 * @return array|mixed
 * get flickr data
 */
if ( ! function_exists( 'bingo_ruby_plugin_data_flickr' ) ) {
	function bingo_ruby_plugin_data_flickr( $flickr_id, $num_images = 9, $tags = '' ) {
		if ( empty( $flickr_id ) ) {
			return array();
		};

		$bingo_ruby_args = array( 'timeout' => 100 );

		$response = wp_remote_get( 'http://api.flickr.com/services/feeds/photos_public.gne?format=json&id=' . urlencode( $flickr_id ) . '&nojsoncallback=1&tags=' . urlencode( $tags ), $bingo_ruby_args );
		if ( is_wp_error( $response ) || '200' != $response['response']['code'] ) {
			return array();
		}
		$response = wp_remote_retrieve_body( $response );
		$response = str_replace( "\\'", "'", $response );
		$content  = json_decode( $response, true );
		if ( is_array( $content ) ) {
			$content = array_slice( $content['items'], 0, $num_images );
			foreach ( $content as $i => $v ) {
				$content[ $i ]['media'] = preg_replace( '/_m\.(jp?g|png|gif)$/', '_q.\\1', $v['media']['m'] );
			}

			return $content;
		} else {
			return array();
		}

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $instagram_token
 * @param string $cache_name
 * @param int $num_images
 * @param string $tags
 *
 * @return array|mixed|object|string
 * get instagram data
 */
if ( ! function_exists( 'bingo_ruby_plugin_data_instagram' ) ) {
	function bingo_ruby_plugin_data_instagram( $instagram_token, $cache_name = '', $num_images = 9, $tags = '' ) {

		if ( ! empty( $instagram_token ) ) {
			$user = explode( ".", $instagram_token );

			if ( empty( $user[0] ) ) {
				return ' <p class="ruby-error">' . esc_html__( 'API error...', 'bingo-core' ) . '</p>';
			} else {
				$args_data = array(
					'sslverify' => false,
					'timeout'   => 100
				);

				if ( ! empty( $tags ) ) {
					$response = wp_remote_get( 'https://api.instagram.com/v1/tags/' . $tags . '/media/recent/?access_token=' . $instagram_token . '&count=' . $num_images, $args_data );
				} else {
					$response = wp_remote_get( 'https://api.instagram.com/v1/users/' . $user[0] . '/media/recent/?access_token=' . $instagram_token . '&count=' . $num_images, $args_data );
				}

				if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || 200 != $response['response']['code'] ) {
					return ' <p class="ruby-error">' . esc_html__( 'Configuration error or no pictures...', 'bingo-core' ) . '</p>';

				} else {

					$data_images = json_decode( wp_remote_retrieve_body( $response ) );
					set_transient( $cache_name, $data_images, 12000 );

					return $data_images;
				}
			}
		} else {
			return ' <p class="ruby-error">' . esc_html__( 'Empty instagram token...', 'bingo-core' ) . '</p>';
		}
	}
}
