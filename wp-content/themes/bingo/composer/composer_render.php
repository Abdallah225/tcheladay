<?php
/**
 * this file render ruby composer layouts
 */
if ( ! class_exists( 'bingo_ruby_composer_render' ) ) {
	class bingo_ruby_composer_render {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return bool|string
		 * render page composer
		 */
		static function render_page() {

			//check
			global $paged;
			$paged = intval( get_query_var( 'paged' ) );
			if ( empty( $paged ) ) {
				$paged = intval( get_query_var( 'page' ) );
			}

			$page_composer_data = bingo_ruby_composer_action::get_composer_data( get_the_ID() );
			if ( empty( $page_composer_data ) || ! is_array( $page_composer_data ) || $paged > 1 ) {
				return false;
			}

			//render sections
			$str = '';
			foreach ( $page_composer_data as $section_data ) {
				$str .= self::render_section( $section_data );
			}

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $section_data
		 *
		 * @return string
		 * render page section
		 */
		static function render_section( $section_data ) {
			//check
			if ( empty( $section_data['section_type'] ) ) {
				return false;
			}

			//render
			$str = '';
			switch ( $section_data['section_type'] ) {
				case 'section_full_width' :
					$str .= self::render_section_fw( $section_data );
					break;
				case 'section_has_sidebar' :
					$str .= self::render_section_hs( $section_data );
					break;
			}

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $section_data
		 *
		 * @return string
		 * render fw section
		 */
		static function render_section_fw( $section_data ) {
			//check blocks
			if ( empty( $section_data['blocks'] ) || ! is_array( $section_data['blocks'] ) ) {
				return false;
			}

			if ( ! empty( $section_data['section_id'] ) ) {
				$section_id = $section_data['section_id'];
			} else {
				$section_id = '';
			}

			//render
			$counter    = 1;
			$last_check = false;
			$str        = '';

			$str .= self::open_section_fw( $section_id );
			foreach ( $section_data['blocks'] as $block ) {

				if ( true === self::check_sb_block_third( $block ) ) {
					if ( 1 == $counter ) {
						$str .= '<div class="block-third-outer clearfix ruby-container">';
						$last_check = true;
					}
					$counter ++;
				} else {
					//close div if not enough one third block
					if ( $counter <= 3 && true === $last_check ) {
						$str .= '</div><!--#block third outer-->';

						//reset counter
						$counter    = 1;
						$last_check = false;
					}
				}

				$str .= ruby_composer_block::render( 'section_full_width', $block );

				if ( $counter > 3 ) {
					$str .= '</div><!--#block third outer-->';
					//reset counter
					$counter    = 1;
					$last_check = false;
				}
			}

			//close third outer at the end of fullwidth section
			if ( 1 !== $counter ) {
				$str .= '</div><!--#block third outer-->';
			}

			$str .= self::close_section_fw();

			return $str;

		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $section_data
		 *
		 * @return string
		 * render has sidebar section
		 */
		static function render_section_hs( $section_data ) {
			//check blocks
			if ( empty( $section_data['blocks'] ) || ! is_array( $section_data['blocks'] ) ) {
				return false;
			}

			if ( ! empty( $section_data['section_id'] ) ) {
				$section_id = $section_data['section_id'];
			} else {
				$section_id = '';
			}

			//check sidebar position
			if ( ! empty( $section_data['section_sidebar_position'] ) ) {
				$sidebar_position = $section_data['section_sidebar_position'];
			} else {
				$sidebar_position = 'right';
			}

			//check sidebar name
			if ( ! empty( $section_data['section_sidebar'] ) ) {
				$sidebar_name = $section_data['section_sidebar'];
			} else {
				$sidebar_name = 'bingo_ruby_sidebar_default';
			}


			//render
			$counter    = 1;
			$last_check = false;
			$str        = '';
			$str .= self::open_section_hs( $section_id, $sidebar_position );

			//content
			$str .= self::open_section_hs_content( $sidebar_position );
			foreach ( $section_data['blocks'] as $block ) {

				//clear float
				if ( true === self::check_sb_block_half( $block ) ) {
					$last_check = true;
					$counter ++;

				} else {
					if ( true === $last_check && $counter == 2 ) {
						$str .= '<div class="clearfix"></div>';
					}
					//reset counter
					$counter    = 1;
					$last_check = false;
				}

				//render block
				$str .= ruby_composer_block::render( 'section_has_sidebar', $block );

				//clear float bottom if haft block
				if ( $counter > 2 ) {
					$str .= '<div class="clearfix"></div>';
					$counter = 1;
				}
			}
			$str .= self::close_section_hs_content();

			//render sidebar
			$str .= self::open_sidebar();
			$str .= self::render_sidebar( $sidebar_name );
			$str .= self::close_sidebar();

			$str .= self::close_section_hs();

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $sidebar_name
		 *
		 * @return bool|string
		 * render sidebar
		 */
		static function render_sidebar( $sidebar_name ) {

			//check sidebar
			if ( empty( $sidebar_name ) ) {
				return false;
			}

			ob_start();
			if ( is_active_sidebar( $sidebar_name ) ) {
				dynamic_sidebar( $sidebar_name );
			}

			return ob_get_clean();

		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $section_id
		 *
		 * @return string
		 * open section full width
		 */
		static function open_section_fw( $section_id ) {
			if ( ! empty( $section_id ) ) {
				return '<div id="' . esc_attr( $section_id ) . '" class="ruby-section-fw ruby-section">';
			} else {
				return '<div class="ruby-section-fw ruby-section">';
			}
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * close fw section
		 */
		static function close_section_fw() {
			return '</div><!--#fullwidth section-->';
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $section_id
		 * @param string $sidebar_position
		 *
		 * @return string
		 *
		 */
		static function open_section_hs( $section_id, $sidebar_position = 'right' ) {
			$str = '';
			if ( ! empty( $section_id ) ) {
				$str .= '<div id="' . esc_attr( $section_id ) . '" class="ruby-section ruby-section-hs row is-sidebar-' . esc_attr( $sidebar_position ) . '">';
				$str .= '<div class="ruby-container">';
			} else {
				$str .= '<div class="ruby-section ruby-section-hs row is-sidebar-' . esc_attr( $sidebar_position ) . '">';
				$str .= '<div class="ruby-container">';
			}

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * close sidebar section
		 */
		static function close_section_hs() {
			return '</div></div><!--#has sidebar section-->';
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param string $sidebar_position
		 *
		 * @return string
		 * open has content of section has sidebar
		 */
		static function open_section_hs_content( $sidebar_position = 'right' ) {
			if ( 'none' == $sidebar_position ) {
				return '<div class="ruby-content-wrap content-without-sidebar col-xs-12">';
			} else {
				return '<div class="ruby-content-wrap content-with-sidebar col-sm-8 col-xs-12">';
			}
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * close sidebar section content
		 */
		static function close_section_hs_content() {
			return '</div><!--#ruby container-->';
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * render sidebar wrap
		 */
		static function open_sidebar() {

			//sticky config
			$sticky = bingo_ruby_core::get_option( 'sticky_sidebar' );

			if ( ! empty( $sticky ) ) {
				return '<aside class="sidebar-wrap col-sm-4 col-xs-12" ' . bingo_ruby_schema::markup( 'sidebar' ) . '><div class="ruby-sidebar-sticky"><div class="sidebar-inner">';
			} else {
				return '<aside class="sidebar-wrap col-sm-4 col-xs-12" ' . bingo_ruby_schema::markup( 'sidebar' ) . '><div class="sidebar-inner">';
			}

		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * close sidebar wrap
		 */
		static function close_sidebar() {

			//sticky config
			$sticky = bingo_ruby_core::get_option( 'sticky_sidebar' );

			if ( ! empty( $sticky ) ) {
				return '</div></div></aside>';
			} else {
				return '</div></aside>';
			}
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * check block 50% width
		 */
		static function check_sb_block_half( $block ) {
			$data_name = array(
				'bingo_ruby_hs_block_15',
				'bingo_ruby_hs_block_16',
				'bingo_ruby_hs_block_17',
				'bingo_ruby_hs_block_18'
			);

			//check
			$check = false;
			if ( ! empty( $block['block_name'] ) && in_array( $block['block_name'], $data_name ) ) {
				$check = true;
			}

			return $check;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * check block 33.33% width
		 */
		static function check_sb_block_third( $block ) {
			$data_name = array(
				'bingo_ruby_fw_block_t1',
				'bingo_ruby_fw_block_t2',
				'bingo_ruby_fw_block_t3',
				'bingo_ruby_fw_block_t4',
			);

			//check
			$check = false;
			if ( ! empty( $block['block_name'] ) && in_array( $block['block_name'], $data_name ) ) {
				$check = true;
			}

			return $check;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * create dynamic css for composer page
		 */
		static function dynamic_style() {

			$page_id = get_the_ID();

			if ( 'page-composer.php' != get_page_template_slug( $page_id ) ) {
				return false;
			}
			$cache_name = 'bingo_ruby_composer_dynamic_style_cache';
			$str        = '';

			$cache = get_post_meta( $page_id, $cache_name, true );

			if ( empty( $cache ) ) {
				//get cache
				$page_composer_data = bingo_ruby_composer_action::get_composer_data( $page_id );
				if ( empty( $page_composer_data ) || ! is_array( $page_composer_data ) ) {
					return false;
				}

				foreach ( $page_composer_data as $section_data ) {
					//check blocks
					if ( empty( $section_data['blocks'] ) || ! is_array( $section_data['blocks'] ) ) {
						return false;
					}

					foreach ( $section_data['blocks'] as $block ) {
						//render background
						if ( ! empty( $block['block_options']['background'] ) ) {
							$str .= '#' . $block['block_id'];
							$str .= '{ background-color: ' . $block['block_options']['background'] . ' !important;}';
						};

						if ( ! empty( $block['block_options']['margin_bottom'] ) ) {
							$str .= '#' . $block['block_id'] . '.ruby-block-wrap';
							$str .= '{ margin-bottom: ' . $block['block_options']['margin_bottom'] . 'px !important;}';
						};

						if ( ! empty( $block['block_options']['header_color'] ) ) {
							$str .= '#' . $block['block_id'] . ' .post-title a:hover, #' . $block['block_id'] . ' .post-title a:focus,';
							$str .= '#' . $block['block_id'] . ' .block-header-inner';
							$str .= '{ color: ' . $block['block_options']['header_color'] . ';}';

						}

					}
				}

				//save to database
				$cache = addslashes( $str );
				delete_post_meta( $page_id, $cache_name );
				update_post_meta( $page_id, $cache_name, $cache );

			} else {
				$str .= stripslashes( $cache );
			}

			wp_add_inline_style( 'bingo_ruby_style_default', $str );

			return false;
		}
	}
}

//add custom style
if ( class_exists( 'bingo_ruby_composer_render' ) ) {
	add_action( 'wp_enqueue_scripts', array( 'bingo_ruby_composer_render', 'dynamic_style' ) );
}
