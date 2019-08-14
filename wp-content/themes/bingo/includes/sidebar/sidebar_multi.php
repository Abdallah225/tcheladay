<?php
/**
 * this file support multi sidebars
 */
if ( ! class_exists( 'bingo_ruby_multi_sidebar' ) ) {
	class bingo_ruby_multi_sidebar {


		/**-------------------------------------------------------------------------------------------------------------------------
		 * save sidebar to database
		 */
		static function save_custom_sidebar() {

			global $bingo_ruby_theme_options;

			$sidebar_data = array();

			if ( ! empty( $bingo_ruby_theme_options['bingo_ruby_multi_sidebar'] ) && is_array( $bingo_ruby_theme_options['bingo_ruby_multi_sidebar'] ) ) {
				foreach ( $bingo_ruby_theme_options['bingo_ruby_multi_sidebar'] as $sidebar ) {
					array_push( $sidebar_data, array(
							'id'   => 'bingo_ruby_sidebar_multi_' . self::name_to_id( $sidebar ),
							'name' => esc_attr( strip_tags( $sidebar ) ),
						)
					);
				}
			}

			delete_option( 'bingo_ruby_custom_multi_sidebars' );
			add_option( 'bingo_ruby_custom_multi_sidebars', $sidebar_data );
		}

		//name to id
		static function name_to_id($name)
		{
			$name = strtolower(strip_tags($name));
			$id = str_replace(array(' ', ',', '.', '"', "'", '/', "\\", '+', '=', ')', '(', '*', '&', '^', '%', '$', '#', '@', '!', '~', '`', '<', '>', '?', '[', ']', '{', '}', '|', ':',), '', $name);
			return $id;
		}
	}

	// save multi sidebar actions
	add_action( 'redux/options/bingo_ruby_theme_options/saved', array( 'bingo_ruby_multi_sidebar', 'save_custom_sidebar' ), 99 );
	add_action( 'redux/options/bingo_ruby_theme_options/reset', array( 'bingo_ruby_multi_sidebar', 'save_custom_sidebar' ), 99 );
	add_action( 'redux/options/bingo_ruby_theme_options/section/reset', array( 'bingo_ruby_multi_sidebar', 'save_custom_sidebar' ), 99 );
}
