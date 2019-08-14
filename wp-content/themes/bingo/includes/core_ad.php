<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $ad_code
 *
 * @return array|bool
 * get spot id advertising code
 */
if ( ! function_exists( 'bingo_ruby_ad_get_spot_id' ) ) {
	function bingo_ruby_ad_get_spot_id( $ad_code ) {
		$data_ad = array();

		if ( empty( $ad_code ) ) {
			return false;
		}

		$ad_code = html_entity_decode( stripslashes( $ad_code ) );

		//check google ads code
		if ( preg_match( '/googlesyndication.com/', $ad_code ) ) {

			//get ads client
			$array_ad_client_code = explode( 'data-ad-client', $ad_code );
			if ( empty( $array_ad_client_code[1] ) ) {
				return false;
			}
			preg_match( '/"([a-zA-Z0-9-\s]+)"/', $array_ad_client_code[1], $match_data_ad_client );
			$data_ad_client = str_replace( array( '"', ' ' ), array( '' ), $match_data_ad_client[1] );

			//get ads slot
			$array_ad_slot_code = explode( 'data-ad-slot', $ad_code );
			if ( empty( $array_ad_slot_code[1] ) ) {
				return false;
			}
			preg_match( '/"([a-zA-Z0-9\s]+)"/', $array_ad_slot_code[1], $match_data_add_slot );
			$data_ad_slot = str_replace( array( '"', ' ' ), array( '' ), $match_data_add_slot[1] );

			if ( ! empty( $data_ad_client ) && ! empty( $data_ad_slot ) ) {
				$data_ad['data_ad_client'] = $data_ad_client;
				$data_ad['data_ad_slot']   = $data_ad_slot;
			}

			return $data_ad;

		} else {
			//not google ads
			return false;
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $type
 *
 * @return array
 * setup google advertising responsive size
 */
if ( ! function_exists( 'bingo_ruby_ad_get_size' ) ) {
	function bingo_ruby_ad_get_size( $type ) {
		if ( empty( $type ) ) {
			$type = 'header_ad';
		}
		$size = array();
		switch ( $type ) {
			case 'header_ad' :
			case 'content_ad' :
			case 'footer_ad' :
				$size = array(
					'des_w'   => '728',
					'des_h'   => '90',
					'table_w' => '468',
					'table_h' => '60',
					'phone_w' => '320',
					'phone_h' => '50'
				);
				break;
			case 'sidebar_ad' :
				$size = array(
					'des_w'   => '300',
					'des_h'   => '250',
					'table_w' => '160',
					'table_h' => '600',
					'phone_w' => '300',
					'phone_h' => '250'
				);
				break;
		}

		return $size;
	}
}

if ( ! function_exists( 'bingo_ruby_ad_render_script' ) ) {
	function bingo_ruby_ad_render_script( $ad_code, $type = 'sidebar_ad' ) {
		//check empty
		if ( empty( $ad_code ) ) {
			return false;
		}

		$data_ad = bingo_ruby_ad_get_spot_id( $ad_code );

		//return the code if not google
		if ( empty( $data_ad['data_ad_client'] ) || empty( $data_ad['data_ad_slot'] ) ) {
			return $ad_code;
		}

		//get google advertising cache
		$ad_cache = get_transient( 'bingo_ruby_ad_data_' . esc_attr( $data_ad['data_ad_client'] ) . '_' . $type );

		if ( empty( $ad_cache ) ) {

			$cache_time = 6;
			$size       = bingo_ruby_ad_get_size( $type );

			$str = '';
			$str .= '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>';
			$str .= '<!--header-->';
			$str .= '<script type="text/javascript">' . "\n";
			$str .= 'var screen_width = document.body.clientWidth;' . "\n";
			$str .= ' if ( screen_width >= 1110 ) {
                        document.write(\'<ins class="adsbygoogle" style="display:inline-block;width:' . $size['des_w'] . 'px;height:' . $size['des_h'] . 'px" data-ad-client="' . $data_ad['data_ad_client'] . '" data-ad-slot="' . $data_ad['data_ad_slot'] . '"></ins>\');
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    }';
			$str .= 'if ( screen_width >= 768  && screen_width < 1110 ) {
                        document.write(\'<ins class="adsbygoogle" style="display:inline-block;width:' . $size['table_w'] . 'px;height:' . $size['table_h'] . 'px" data-ad-client="' . $data_ad['data_ad_client'] . '" data-ad-slot="' . $data_ad['data_ad_slot'] . '"></ins>\');
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    }';

			$str .= 'if ( screen_width < 768 ) {
                        document.write(\'<ins class="adsbygoogle" style="display:inline-block;width:' . $size['phone_w'] . 'px;height:' . $size['phone_h'] . 'px" data-ad-client="' . $data_ad['data_ad_client'] . '" data-ad-slot="' . $data_ad['data_ad_slot'] . '"></ins>\');
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    }';

			$str .= '</script>' . "\n";

			//save to cache
			set_transient( 'bingo_ruby_ad_data_' . esc_attr( $data_ad['data_ad_client'] ) . '_' . $type, $str, $cache_time * 3600 );

			return $str;

		} else {
			return $ad_cache;
		}
	}
}