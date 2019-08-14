<?php
/**
 * Class bingo_ruby_core
 * this file manager options for theme
 */
if ( ! class_exists( 'bingo_ruby_core' ) ) {
	class bingo_ruby_core {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $option_name
		 *
		 * @return string
		 * load value from theme options
		 */
		static function get_option( $option_name ) {

			//set default values
			if ( empty( $GLOBALS['bingo_ruby_theme_options'] ) ) {
				$GLOBALS['bingo_ruby_theme_options'] = bingo_ruby_redux_default_config();
			}

			$bingo_ruby_theme_options = $GLOBALS['bingo_ruby_theme_options'];

			//check empty value
			if ( empty( $bingo_ruby_theme_options[ $option_name ] ) ) {
				return false;
			} else {
				//return option value
				return $bingo_ruby_theme_options[ $option_name ];
			}
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $number
		 *
		 * @return int|string
		 * show over 100k
		 */
		static function show_over_100k( $number ) {
			$number = intval( $number );
			if ( $number > 1000000 ) {
				$number = round( $number / 1000000, 2 ) . esc_attr__( 'M', 'bingo' );
			} elseif ( $number > 10000 ) {
				$number = round( $number / 1000, 1 ) . esc_attr__( 'K', 'bingo' );
			} elseif ( $number > 1000 ) {
				$number = round( $number / 1000, 2 ) . esc_attr__( 'K', 'bingo' );
			}

			return $number;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return mixed
		 * get category page id
		 */
		static function get_page_cat_id() {
			global $wp_query;

			return $wp_query->get_queried_object_id();
		}
	}
}