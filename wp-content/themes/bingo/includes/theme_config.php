<?php
/**
 * this file register config options for theme
 */
if ( ! class_exists( 'bingo_ruby_theme_config' ) ) {
	class bingo_ruby_theme_config {


		##################################################
		###                                            ###
		###              COMPOSER CONFIG               ###
		###                                            ###
		##################################################

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return mixed
		 * get all sidebar after load
		 */
		static function get_all_sidebar() {

			if ( ! is_admin() ) {
				return false;
			}

			return $GLOBALS['wp_registered_sidebars'];
		}

		//header style config values
		static function header_style() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => esc_html__( 'Style 1 (Default)', 'bingo' ),
				'2' => esc_html__( 'Style 2', 'bingo' ),
				'3' => esc_html__( 'Style 3', 'bingo' ),
				'4' => esc_html__( 'Style 4', 'bingo' ),
				'5' => esc_html__( 'Style 5', 'bingo' ),
				'6' => esc_html__( 'Style 6', 'bingo' ),
				'7' => esc_html__( 'Style 7', 'bingo' ),
				'8' => esc_html__( 'Style 8', 'bingo' ),
				'9' => esc_html__( 'Style 9', 'bingo' )
			);

		}

		//topbar style config values
		static function topbar_style() {
			return array(
				'1' => esc_html__( 'Style 1 (Dark Style)', 'bingo' ),
				'2' => esc_html__( 'Style 2 (Light Style)', 'bingo' ),
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * select category
		 */
		static function category_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			$ruby_categories = get_categories( array(
				'hide_empty' => 0,
			) );

			$ruby_category_array_walker = new bingo_ruby_category_array_walker;
			$ruby_category_array_walker->walk( $ruby_categories, 4 );
			$ruby_categories_buffer = $ruby_category_array_walker->cat_array;

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0" selected="selected">' . esc_html__( '-- All categories --', 'bingo' ) . '</option>';
			foreach ( $ruby_categories_buffer as $ruby_category_name => $category_id ) {
				$str .= '<option value="' . esc_attr( $category_id ) . '">';
				$str .= esc_html( $ruby_category_name );
				$str .= '</option>';
			}

			$str .= '</select><!--#category select-->';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * select category
		 */
		static function categories_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			if ( ! is_admin() ) {
				return false;
			}

			$ruby_categories = get_categories( array(
				'hide_empty' => 0,
			) );

			$ruby_category_array_walker = new bingo_ruby_category_array_walker;
			$ruby_category_array_walker->walk( $ruby_categories, 4 );
			$ruby_categories_buffer = $ruby_category_array_walker->cat_array;

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select" multiple="multiple">';
			$str .= '<option value="0" selected="selected">' . esc_html__( '-- Disable --', 'bingo' ) . '</option>';
			foreach ( $ruby_categories_buffer as $ruby_category_name => $category_id ) {
				$str .= '<option value="' . esc_attr( $category_id ) . '">';
				$str .= esc_html( $ruby_category_name );
				$str .= '</option>';
			}

			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * format dropdown select
		 */
		static function post_format_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0" selected="selected">' . esc_html__( '-- All --', 'bingo' ) . '</option>';
			$str .= '<option value="default">' . esc_html__( 'Default', 'bingo' ) . '</option>';
			$str .= '<option value="gallery">' . esc_html__( 'Gallery', 'bingo' ) . '</option>';
			$str .= '<option value="video">' . esc_html__( 'Video', 'bingo' ) . '</option>';
			$str .= '<option value="audio">' . esc_html__( 'Audio', 'bingo' ) . '</option>';
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * Order config
		 */
		static function orderby_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			$orderby_data = array(
				'date_post'               => esc_html__( 'Latest Post', 'bingo' ),
				'comment_count'           => esc_html__( 'Popular Comment', 'bingo' ),
				'popular'                 => esc_html__( 'Popular View', 'bingo' ),
				'top_review'              => esc_html__( 'Popular Review', 'bingo' ),
				'post_type'               => esc_html__( 'Post Type', 'bingo' ),
				'rand'                    => esc_html__( 'Random', 'bingo' ),
                'modified'                => esc_html__( 'Last Modified Date', 'bingo' ),
				'author'                  => esc_html__( 'Author', 'bingo' ),
				'alphabetical_order_decs' => esc_html__( 'Title DECS', 'bingo' ),
				'alphabetical_order_asc'  => esc_html__( 'Title ACS', 'bingo' )
			);

			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			foreach ( $orderby_data as $val => $title ) {
				$str .= '<option value="' . esc_attr( $val ) . '">' . esc_html( $title ) . '</option>';
			}
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * select author
		 */
		static function author_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			return wp_dropdown_users( array(
				'show_option_all' => esc_html__( 'All Authors', 'bingo' ),
				'orderby'         => 'ID',
				'class'           => 'ruby-field',
				'echo'            => 0,
				'hierarchical'    => true
			) );
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param string $display_default
		 *
		 * @return array
		 * sidebar name options config
		 */
		static function sidebar_name( $display_default = '' ) {

			$sidebar_options = array();
			$custom_sidebars = get_option( 'bingo_ruby_custom_multi_sidebars', '' );

			//add default sidebar
			if ( true === $display_default ) {
				$sidebar_options['bingo_ruby_default_from_theme_options'] = esc_html__( 'Default From Theme Options', 'bingo' );
			};

			//handle sidebar option
			$sidebar_options['bingo_ruby_sidebar_default'] = esc_html__( 'Default Sidebar', 'bingo' );
			if ( ! empty( $custom_sidebars ) && is_array( $custom_sidebars ) ) {
				foreach ( $custom_sidebars as $sidebar ) {
					$sidebar_options[ $sidebar['id'] ] = $sidebar['name'];
				};
			};

			return $sidebar_options;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param bool $default
		 *
		 * @return array
		 * sidebar position config
		 */
		static function sidebar_position( $default = true ) {

			if ( ! is_admin() ) {
				return false;
			}

			$template_directory_uri = get_template_directory_uri();

			$sidebar = array(
				'none'  => array(
					'alt'   => 'none sidebar',
					'img'   => $template_directory_uri . '/theme_options/assets/sidebar-none.png',
					'title' => esc_html__( 'None', 'bingo' )
				),
				'left'  => array(
					'alt'   => 'left sidebar',
					'img'   => $template_directory_uri . '/theme_options/assets/sidebar-left.png',
					'title' => esc_html__( 'Left', 'bingo' )
				),
				'right' => array(
					'alt'   => 'right sidebar',
					'img'   => $template_directory_uri . '/theme_options/assets/sidebar-right.png',
					'title' => esc_html__( 'Right', 'bingo' )
				)
			);

			//load default setting
			if ( true === $default ) {
				$sidebar['default'] = array(
					'alt'   => 'Default',
					'img'   => $template_directory_uri . '/theme_options/assets/sidebar-default.png',
					'title' => esc_html__( 'Default', 'bingo' )
				);
			};

			return $sidebar;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * enable or disable dropdown select
		 */
		static function enable_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0">' . esc_html__( '-- Disable --', 'bingo' ) . '</option>';
			$str .= '<option value="1"  selected="selected">' . esc_html__( 'Enable', 'bingo' ) . '</option>';
			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * summary select config
		 */
		static function summary_dropdown_select() {

			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="excerpt">' . esc_html__( 'Use Post Excerpt', 'bingo' ) . '</option>';
			$str .= '<option value="moretag">' . esc_html__( 'Use More Tag', 'bingo' ) . '</option>';
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * position dropdown select
		 */
		static function position_dropdown_select() {
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0">' . esc_html__( 'Float Left', 'bingo' ) . '</option>';
			$str .= '<option value="1">' . esc_html__( 'Float Right', 'bingo' ) . '</option>';
			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * viewmore dropdown select
		 */
		static function viewmore_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0"  selected="selected">' . esc_html__( '-- Disable --', 'bingo' ) . '</option>';
			$str .= '<option value="1">' . esc_html__( 'Enable', 'bingo' ) . '</option>';
			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * wrapper mode config
		 */
		static function wrapmode_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0">' . esc_html__( 'Full Width', 'bingo' ) . '</option>';
			$str .= '<option value="1" selected="selected">' . esc_html__( 'Has Wrapper', 'bingo' ) . '</option>';
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * ajax filter type
		 */
		static function ajax_filter_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			$ajax_filter_dropdown_select_data = array(
				'0'        => esc_html__( '-- Disable --', 'bingo' ),
				'category' => esc_html__( 'by categories', 'bingo' ),
				'tag'      => esc_html__( 'by tags plug', 'bingo' ),
				'author'   => esc_html__( 'by authors', 'bingo' ),
				'popular'  => esc_html__( 'by popular', 'bingo' ),

			);

			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			foreach ( $ajax_filter_dropdown_select_data as $val => $title ) {
				$str .= '<option value="' . esc_attr( $val ) . '">' . esc_html( $title ) . '</option>';
			}
			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * pagination select config
		 */
		static function pagination_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="0" selected="selected">' . esc_html__( ' -- Disable -- ', 'bingo' ) . '</option>';
			$str .= '<option value="next_prev">' . esc_html__( 'Next Prev', 'bingo' ) . '</option>';
			$str .= '<option value="loadmore">' . esc_html__( 'Load More', 'bingo' ) . '</option>';
			$str .= '<option value="infinite_scroll">' . esc_html__( 'infinite Scroll', 'bingo' ) . '</option>';
			$str .= '</select>';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * block style select
		 */
		static function style_dropdown_select() {
			if ( ! is_admin() ) {
				return false;
			}

			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="light" selected="selected">' . esc_html__( 'Light ', 'bingo' ) . '</option>';
			$str .= '<option value="dark">' . esc_html__( 'Dark', 'bingo' ) . '</option>';
			$str .= '</select>';

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * post order config
		 */
		static function post_orders() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'date_post'               => esc_html__( 'Latest Post', 'bingo' ),
				'comment_count'           => esc_html__( 'Popular Comment', 'bingo' ),
				'popular'                 => esc_html__( 'Popular View', 'bingo' ),
				'top_review'              => esc_html__( 'Popular Review', 'bingo' ),
				'post_type'               => esc_html__( 'Post Type', 'bingo' ),
				'rand'                    => esc_html__( 'Random', 'bingo' ),
                'modified'                => esc_html__( 'Last Modified Date', 'bingo' ),
				'author'                  => esc_html__( 'Author', 'bingo' ),
				'alphabetical_order_decs' => esc_html__( 'Title DECS', 'bingo' ),
				'alphabetical_order_asc'  => esc_html__( 'Title ACS', 'bingo' ),
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * viewmore dropdown select
		 */
		static function textarea_custom_html( $data ) {

			//render
			$str = '';
			if ( ! function_exists( 'wp_editor' ) ) {
				$str .= '<textarea class="ruby-field" rows="9" name="' . $data['block_name'] . '">' . $data['block_content'] . '</textarea>'; //text area
			} else {
				ob_start();
				wp_editor( wp_specialchars_decode( $data['block_content'] ), 'tinymce_' . $data['block_id'], array(
					'editor_class'  => 'ruby-textarea ruby-html ruby-tinymce',
					'textarea_name' => $data['block_name'],
					'media_buttons' => true,
					'wpautop'       => false
				) );
				$str .= ob_get_clean();
			}

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return string
		 * gird style select
		 */
		static function grid_style_dropdown_select() {

			if ( ! is_admin() ) {
				return false;
			}

			//render
			$str = '';
			$str .= '<select class="ruby-field ruby-field-select">';
			$str .= '<option value="1" selected="selected">' . esc_html__( ' -- Style 1 -- ', 'bingo' ) . '</option>';
			$str .= '<option value="2">' . esc_html__( 'style 2', 'bingo' ) . '</option>';
			$str .= '<option value="3">' . esc_html__( 'style 3', 'bingo' ) . '</option>';
			$str .= '<option value="4">' . esc_html__( 'style 4', 'bingo' ) . '</option>';
			$str .= '</select>';

			return $str;
		}


		##################################################
		###                                            ###
		###              METABOXES CONFIG              ###
		###                                            ###
		##################################################

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * metabox review position
		 */
		static function metabox_review_box_position() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'top'     => $template_directory_uri . '/theme_options/assets/review-top.png',
				'bottom'  => $template_directory_uri . '/theme_options/assets/review-bottom.png',
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox sidebar config
		 */
		static function metabox_sidebar_position() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/sidebar-default.png',
				'none'    => $template_directory_uri . '/theme_options/assets/sidebar-none.png',
				'left'    => $template_directory_uri . '/theme_options/assets/sidebar-left.png',
				'right'   => $template_directory_uri . '/theme_options/assets/sidebar-right.png',
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox blog layout config
		 */
		static function metabox_blog_layout() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'layout_classic'       => $template_directory_uri . '/theme_options/assets/blog-classic-1.png',
				'layout_classic_lite'  => $template_directory_uri . '/theme_options/assets/blog-classic-2.png',
				'layout_grid'          => $template_directory_uri . '/theme_options/assets/blog-grid-1.png',
				'layout_grid_small'    => $template_directory_uri . '/theme_options/assets/blog-grid-2.png',
				'layout_overlay_small' => $template_directory_uri . '/theme_options/assets/blog-overlay.png',
				'layout_list'          => $template_directory_uri . '/theme_options/assets/blog-list-1.png',
				'layout_list_small'    => $template_directory_uri . '/theme_options/assets/blog-list-2.png',
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox single post video layout config
		 */
		static function metabox_single_post_layout_video() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'1'       => $template_directory_uri . '/theme_options/assets/single-video-1.png',
				'2'       => $template_directory_uri . '/theme_options/assets/single-video-2.png',
				'3'       => $template_directory_uri . '/theme_options/assets/single-video-3.png',
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox single post video layout config
		 */
		static function metabox_single_post_layout_audio() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'1'       => $template_directory_uri . '/theme_options/assets/single-audio-1.png',
				'2'       => $template_directory_uri . '/theme_options/assets/single-audio-2.png',
				'3'       => $template_directory_uri . '/theme_options/assets/single-audio-3.png',
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox single post gallery layout config
		 */
		static function metabox_single_post_layout_gallery_slider() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'1'       => $template_directory_uri . '/theme_options/assets/single-gallery-slider-1.png',
				'2'       => $template_directory_uri . '/theme_options/assets/single-gallery-slider-2.png',
				'3'       => $template_directory_uri . '/theme_options/assets/single-gallery-slider-3.png',
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox single post gallery layout config
		 */
		static function metabox_single_post_layout_gallery_grid() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'1'       => $template_directory_uri . '/theme_options/assets/single-gallery-grid-1.png',
				'2'       => $template_directory_uri . '/theme_options/assets/single-gallery-grid-2.png',
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox sidebar config
		 */
		static function metabox_post_layout() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'1'       => $template_directory_uri . '/theme_options/assets/single-featured-1.png',
				'2'       => $template_directory_uri . '/theme_options/assets/single-featured-2.png',
				'3'       => $template_directory_uri . '/theme_options/assets/single-featured-3.png',
				'4'       => $template_directory_uri . '/theme_options/assets/single-featured-4.png',
				'5'       => $template_directory_uri . '/theme_options/assets/single-featured-5.png',
				'6'       => $template_directory_uri . '/theme_options/assets/single-featured-6.png',
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * metabox sidebar config
		 */
		static function metabox_box_related_layout() {

			if ( ! is_admin() ) {
				return false;
			}

			//template URL
			$template_directory_uri = get_template_directory_uri();

			return array(
				'default' => $template_directory_uri . '/theme_options/assets/default.png',
				'1'       => $template_directory_uri . '/theme_options/assets/blog-list-1.png',
				'2'       => $template_directory_uri . '/theme_options/assets/blog-grid-1.png',
				'3'       => $template_directory_uri . '/theme_options/assets/blog-grid-2.png',
				'4'       => $template_directory_uri . '/theme_options/assets/blog-overlay.png',
			);
		}


		##################################################
		###                                            ###
		###            THEME OPTIONS CONFIG            ###
		###                                            ###
		##################################################


		//featured type config values
		static function featured_type() {

			$template_directory_uri = get_template_directory_uri();

			return array(
				'slider_hw'      => array(
					'alt'   => 'wrapper slider',
					'img'   => $template_directory_uri . '/theme_options/assets/wrapper-slider-hw.png',
					'title' => esc_attr__( 'Wrapper Slider', 'bingo' )
				),
				'grid_slider_fw' => array(
					'alt'   => 'grid full width',
					'img'   => $template_directory_uri . '/theme_options/assets/feat-grid-fw.png',
					'title' => esc_attr__( 'Grid FullWidth', 'bingo' )
				),
				'grid_slider_hw' => array(
					'alt'   => 'grid style 1',
					'img'   => $template_directory_uri . '/theme_options/assets/feat-grid-3.png',
					'title' => esc_attr__( 'Grid Style 1', 'bingo' )
				),
				'grid_hw'        => array(
					'alt'   => 'grid style 2',
					'img'   => $template_directory_uri . '/theme_options/assets/feat-grid-2.png',
					'title' => esc_attr__( 'Grid Style 2', 'bingo' )
				),
				'carousel'       => array(
					'alt'   => 'carousel slider',
					'img'   => $template_directory_uri . '/theme_options/assets/feat-carousel.png',
					'title' => esc_attr__( 'Carousel', 'bingo' )
				),
				'none'           => array(
					'alt'   => 'none',
					'img'   => $template_directory_uri . '/theme_options/assets/none.png',
					'title' => esc_attr__( 'None', 'bingo' )
				),
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * page layout config values
		 */
		static function blog_layout() {

			$template_directory_uri = get_template_directory_uri();

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'layout_classic'       => array(
					'alt'   => 'classic layout',
					'img'   => $template_directory_uri . '/theme_options/assets/blog-classic-1.png',
					'title' => esc_html__( 'Classic 1', 'bingo' )
				),
				'layout_classic_lite'  => array(
					'alt'   => 'classic lite layout',
					'img'   => $template_directory_uri . '/theme_options/assets/blog-classic-2.png',
					'title' => esc_html__( 'Classic 2', 'bingo' )
				),
				'layout_grid'          => array(
					'alt'   => 'grid layout',
					'img'   => $template_directory_uri . '/theme_options/assets/blog-grid-1.png',
					'title' => esc_html__( 'Grid 1', 'bingo' )
				),
				'layout_grid_small'    => array(
					'alt'   => 'small grid layout',
					'img'   => $template_directory_uri . '/theme_options/assets/blog-grid-2.png',
					'title' => esc_html__( 'Grid 2', 'bingo' )
				),
				'layout_overlay_small' => array(
					'alt'   => 'List and grid layout',
					'img'   => $template_directory_uri . '/theme_options/assets/blog-overlay.png',
					'title' => esc_html__( 'Overlay grid', 'bingo' )
				),
				'layout_list'          => array(
					'alt'   => 'list layout',
					'img'   => $template_directory_uri . '/theme_options/assets/blog-list-1.png',
					'title' => esc_html__( 'List 1', 'bingo' )
				),
				'layout_list_small'    => array(
					'alt'   => 'small list layout',
					'img'   => $template_directory_uri . '/theme_options/assets/blog-list-2.png',
					'title' => esc_html__( 'List 2', 'bingo' )
				),
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * blog ajax pagination
		 */
		static function blog_pagination() {

			if ( ! is_admin() ) {
				return false;
			}

			$option = array(
				'number'          => esc_html__( 'Numeric', 'bingo' ),
				'loadmore'        => esc_html__( 'Load More', 'bingo' ),
				'infinite_scroll' => esc_html__( 'Infinite Scroll', 'bingo' ),
			);

			return $option;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * post layout theme options config
		 */
		static function single_post_layout() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-1.png',
					'title' => esc_attr__( 'Style 1', 'bingo' )
				),
				'2' => array(
					'alt'   => 'style 2',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-2.png',
					'title' => esc_attr__( 'Style 2', 'bingo' )
				),
				'3' => array(
					'alt'   => 'style 3',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-3.png',
					'title' => esc_attr__( 'Style 3', 'bingo' )
				),
				'4' => array(
					'alt'   => 'style 4',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-4.png',
					'title' => esc_attr__( 'Style 4', 'bingo' )
				),
				'5' => array(
					'alt'   => 'style 5',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-5.png',
					'title' => esc_attr__( 'Style 5', 'bingo' )
				),
				'6' => array(
					'alt'   => 'style 6',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-featured-6.png',
					'title' => esc_attr__( 'Style 6', 'bingo' )
				),
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * single post audio layout theme options config
		 */
		static function single_post_layout_video() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-video-1.png',
					'title' => esc_attr__( 'Style 1', 'bingo' )
				),
				'2' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-video-2.png',
					'title' => esc_attr__( 'Style 2', 'bingo' )
				),
				'3' => array(
					'alt'   => 'style 3',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-video-3.png',
					'title' => esc_attr__( 'Style 3', 'bingo' )
				)
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * single post audio layout theme options config
		 */
		static function single_post_layout_audio() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-audio-1.png',
					'title' => esc_attr__( 'Style 1', 'bingo' )
				),
				'2' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-audio-2.png',
					'title' => esc_attr__( 'Style 2', 'bingo' )
				),
				'3' => array(
					'alt'   => 'style 3',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-audio-3.png',
					'title' => esc_attr__( 'Style 3', 'bingo' )
				)
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * single post gallery slider layout theme options config
		 */
		static function single_post_layout_gallery_slider() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-gallery-slider-1.png',
					'title' => esc_attr__( 'Style 1', 'bingo' )
				),
				'2' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-gallery-slider-2.png',
					'title' => esc_attr__( 'Style 2', 'bingo' )
				),
				'3' => array(
					'alt'   => 'style 3',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-gallery-slider-3.png',
					'title' => esc_attr__( 'Style 3', 'bingo' )
				)
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * single post gallery grid layout theme options config
		 */
		static function single_post_layout_gallery_grid() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-gallery-grid-1.png',
					'title' => esc_attr__( 'Style 1', 'bingo' )
				),
				'2' => array(
					'alt'   => 'style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/single-gallery-grid-2.png',
					'title' => esc_attr__( 'Style 2', 'bingo' )
				)
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * box position theme options config
		 */
		static function review_box_position() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'bottom' => array(
					'alt'   => 'bottom position',
					'img'   => get_template_directory_uri() . '/theme_options/assets/review-bottom.png',
					'title' => esc_attr__( 'at the bottom', 'bingo' )
				),
				'top'    => array(
					'alt'   => 'top position',
					'img'   => get_template_directory_uri() . '/theme_options/assets/review-top.png',
					'title' => esc_attr__( 'at the top', 'bingo' )
				),
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * related layout theme options config
		 */
		static function related_layout() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'1' => array(
					'alt'   => 'related style 1',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-list-1.png',
					'title' => esc_attr__( 'Style 1', 'bingo' )
				),
				'2' => array(
					'alt'   => 'related style 2',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-grid-1.png',
					'title' => esc_attr__( 'style 2', 'bingo' )
				),
				'3' => array(
					'alt'   => 'related style 3',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-grid-2.png',
					'title' => esc_attr__( 'style 3', 'bingo' )
				),
				'4' => array(
					'alt'   => 'related style 4',
					'img'   => get_template_directory_uri() . '/theme_options/assets/blog-overlay.png',
					'title' => esc_attr__( 'style 4', 'bingo' )
				)
			);
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array|bool
		 * text color style
		 */
		static function text_style() {

			if ( ! is_admin() ) {
				return false;
			}

			return array(
				'is-light-text' => array(
					'alt'   => 'text light',
					'img'   => get_template_directory_uri() . '/theme_options/assets/text-light.png',
					'title' => esc_html__( 'Light', 'bingo' )
				),
				'is-dark-text'  => array(
					'alt'   => 'text dark',
					'img'   => get_template_directory_uri() . '/theme_options/assets/text-dark.png',
					'title' => esc_html__( 'Dark', 'bingo' )
				),
			);
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * post right meta config
		 */
		static function post_meta_right_element() {
			if ( function_exists( 'bingo_ruby_plugin_render_shares' ) ) {
				return array(
					'none'    => esc_html__( 'None', 'bingo' ),
					'view'    => esc_html__( 'Total Views', 'bingo' ),
					'comment' => esc_html__( 'Total Comments', 'bingo' ),
					'share'   => esc_html__( 'Total Shares', 'bingo' )
				);
			} else {
				return array(
					'none'    => esc_html__( 'None', 'bingo' ),
					'comment' => esc_html__( 'Total Comments', 'bingo' )
				);
			}
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * post right meta config
		 */
		static function single_counter_type_element() {
			if ( function_exists( 'bingo_ruby_plugin_render_shares' ) ) {
				return array(
					0       => esc_html__( 'None', 'bingo' ),
					'share' => esc_html__( 'Total Shares', 'bingo' ),
					'view'  => esc_html__( 'Total Views', 'bingo' ),
					'all'   => esc_html__( 'Total Shares/Views', 'bingo' )
				);
			} else {
				return array(
					0 => esc_html__( 'None', 'bingo' ),
				);
			}
		}
	}
}


if ( ! class_exists( 'bingo_ruby_category_array_walker' ) ) {
	class bingo_ruby_category_array_walker extends Walker {

		var $tree_type = 'category';
		var $cat_array = array();
		var $db_fields = array(
			'id'     => 'term_id',
			'parent' => 'parent'
		);

		public function start_lvl( &$output, $depth = 0, $args = array() ) {
		}

		public function end_lvl( &$output, $depth = 0, $args = array() ) {
		}

		public function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
			$this->cat_array[ str_repeat( ' - ', $depth ) . $object->name . ' - [ ID: ' . $object->term_id . ' / Posts: ' . $object->category_count . ' ]' ] = $object->term_id;
		}

		public function end_el( &$output, $object, $depth = 0, $args = array() ) {
		}

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * ajax custom html (WYSWYG)
 */
if ( ! function_exists( 'bingo_ruby_ajax_composer_html' ) ) {
	add_action( 'wp_ajax_bingo_ruby_ajax_composer_html', 'bingo_ruby_ajax_composer_html' );

	function bingo_ruby_ajax_composer_html() {

		$data                  = array();
		$data['block_id']      = '';
		$data['block_name']    = '';
		$data['block_content'] = '';

		//get and validate request data
		if ( ! empty( $_POST['data']['block_id'] ) ) {
			$data['block_id'] = esc_attr( $_POST['data']['block_id'] );
		}

		if ( ! empty( $_POST['data']['block_name'] ) ) {
			$data['block_name'] = esc_attr( $_POST['data']['block_name'] );
		}

		if ( ! empty( $_POST['data']['block_content'] ) ) {
			$data['block_content'] = stripslashes( $_POST['data']['block_content'] );
		}

		$data_response = bingo_ruby_theme_config::textarea_custom_html( $data );
		die( json_encode( $data_response ) );
	}
}