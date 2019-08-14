<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render blog listing layout
 */
if ( ! function_exists( 'bingo_ruby_blog_layout' ) ) {
	function bingo_ruby_blog_layout( $bingo_ruby_options ) {

		global $wp_query;

		//get settings
		if ( empty( $bingo_ruby_options['blog_layout'] ) ) {
			$bingo_ruby_options['blog_layout'] = 'layout_classic';
		}

		if ( empty( $bingo_ruby_options['blog_sidebar_position'] ) ) {
			$bingo_ruby_options['blog_sidebar_position'] = 'right';
		}

		if ( empty( $bingo_ruby_options['blog_sidebar_name'] ) ) {
			$bingo_ruby_options['blog_sidebar_name'] = 'bingo_ruby_sidebar_default';
		}

		//create class
		$classes   = array();
		$classes[] = 'blog-wrap';
		$classes[] = 'is-' . esc_attr( $bingo_ruby_options['blog_layout'] );
		if ( ! empty( $bingo_ruby_options['big_first'] ) ) {
			$classes[] = 'has-big-first';
		} else {
			$classes[] = 'no-big-first';
		}
		$classes = implode( ' ', $classes );
		$str     = '';

		//render
		if ( have_posts() ) {
			$str .= '<div class="' . esc_attr( $classes ) . '">';
			$str .= bingo_ruby_page_open_inner( 'blog-inner', $bingo_ruby_options['blog_sidebar_position'] );
			$str .= bingo_ruby_page_content_open( 'content-wrap', $bingo_ruby_options['blog_sidebar_position'] );

			switch ( $bingo_ruby_options['blog_layout'] ) {
				case 'layout_classic' :
					$str .= bingo_ruby_blog_layout_classic( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_classic_lite' :
					$str .= bingo_ruby_blog_layout_classic_lite( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_list' :
					$str .= bingo_ruby_blog_layout_list( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_list_small' :
					$str .= bingo_ruby_blog_layout_list_small( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_grid' :
					$str .= bingo_ruby_blog_layout_grid( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_grid_small' :
					$str .= bingo_ruby_blog_layout_grid_small( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_overlay_small' :
					$str .= bingo_ruby_blog_layout_overlay_small( $wp_query, $bingo_ruby_options );
					break;
			}

			$str .= bingo_ruby_page_content_close();

			//render sidebar
			if ( ! empty( $bingo_ruby_options['blog_sidebar_position'] ) && 'none' != $bingo_ruby_options['blog_sidebar_position'] ) {
				$str .= bingo_ruby_page_sidebar( $bingo_ruby_options['blog_sidebar_name'], true );
			}

			$str .= bingo_ruby_page_close_inner();
			$str .= '</div>';
		} else {
			$str .= bingo_ruby_blog_no_content();
		}

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render blog listing layout for author page include author box
 */
if ( ! function_exists( 'bingo_ruby_blog_author_layout' ) ) {
	function bingo_ruby_blog_author_layout( $bingo_ruby_options ) {

		global $wp_query;

		//get settings
		if ( empty( $bingo_ruby_options['blog_layout'] ) ) {
			$bingo_ruby_options['blog_layout'] = 'layout_classic';
		}

		if ( empty( $bingo_ruby_options['blog_sidebar_position'] ) ) {
			$bingo_ruby_options['blog_sidebar_position'] = 'right';
		}

		if ( empty( $bingo_ruby_options['blog_sidebar_name'] ) ) {
			$bingo_ruby_options['blog_sidebar_name'] = 'bingo_ruby_sidebar_default';
		}

		//create class
		$classes   = array();
		$classes[] = 'blog-wrap';
		$classes[] = 'is-' . esc_attr( $bingo_ruby_options['blog_layout'] );
		if ( ! empty( $bingo_ruby_options['big_first'] ) ) {
			$classes[] = 'has-big-first';
		} else {
			$classes[] = 'no-big-first';
		}
		$classes = implode( ' ', $classes );

		$str = '';
		//render
		if ( have_posts() ) {
			$str .= '<div class="' . esc_attr( $classes ) . '">';
			$str .= bingo_ruby_page_open_inner( 'blog-inner', $bingo_ruby_options['blog_sidebar_position'] );
			$str .= bingo_ruby_page_content_open( 'content-wrap', $bingo_ruby_options['blog_sidebar_position'] );
			$bingo_ruby_author_social_data = bingo_ruby_social_profile_author( get_the_author_meta( 'ID' ) );
			$bingo_ruby_render_social      = bingo_ruby_render_social_icon( $bingo_ruby_author_social_data, false, true );
			$bingo_ruby_author_decs        = get_the_author_meta( 'description' );

			//author box
			if ( ! empty( $bingo_ruby_author_decs ) || ! empty( $bingo_ruby_render_social ) ) {
				$str .= bingo_ruby_page_box_author();
			}

			switch ( $bingo_ruby_options['blog_layout'] ) {
				case 'layout_classic' :
					$str .= bingo_ruby_blog_layout_classic( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_classic_lite' :
					$str .= bingo_ruby_blog_layout_classic_lite( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_list' :
					$str .= bingo_ruby_blog_layout_list( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_list_small' :
					$str .= bingo_ruby_blog_layout_list_small( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_grid' :
					$str .= bingo_ruby_blog_layout_grid( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_grid_small' :
					$str .= bingo_ruby_blog_layout_grid_small( $wp_query, $bingo_ruby_options );
					break;
				case 'layout_overlay_small' :
					$str .= bingo_ruby_blog_layout_overlay_small( $wp_query, $bingo_ruby_options );
					break;
			}

			$str .= bingo_ruby_page_close_inner();

			//render sidebar
			if ( ! empty( $bingo_ruby_options['blog_sidebar_position'] ) && 'none' != $bingo_ruby_options['blog_sidebar_position'] ) {
				$str .= bingo_ruby_page_sidebar( $bingo_ruby_options['blog_sidebar_name'], true );
			}

			$str .= bingo_ruby_page_close_inner();
			$str .= '</div>';
		} else {
			$str .= bingo_ruby_blog_no_content();
		}

		return $str;

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render classic layout
 */
if ( ! function_exists( 'bingo_ruby_blog_layout_classic' ) ) {
	function bingo_ruby_blog_layout_classic( $data_query, $bingo_ruby_options ) {

		$str = '';

		while ( $data_query->have_posts() ) {
			$data_query->the_post();
			$str .= bingo_ruby_post_classic_1( $bingo_ruby_options );
		}

		//blog pagination
		$str .= bingo_ruby_page_pagination();

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * render classic layout
 */
if ( ! function_exists( 'bingo_ruby_blog_layout_classic_lite' ) ) {
	function bingo_ruby_blog_layout_classic_lite( $data_query, $bingo_ruby_options ) {

		$str = '';

		while ( $data_query->have_posts() ) {
			$data_query->the_post();
			$str .= bingo_ruby_post_classic_2( $bingo_ruby_options );
		}

		//blog pagination
		$str .= bingo_ruby_page_pagination();

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * render list layout
 */
if ( ! function_exists( 'bingo_ruby_blog_layout_list' ) ) {
	function bingo_ruby_blog_layout_list( $data_query, $bingo_ruby_options ) {

		$flag = true;
		$str  = '';

		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( ( true === $flag ) && ! empty( $bingo_ruby_options['big_first'] ) ) {
				$str .= '<div class="first-post-wrap col-sx-12">';
				if ( $bingo_ruby_options['1st_classic_layout'] == 'classic_1' || empty( $bingo_ruby_options['1st_classic_layout'] ) ) {
					$str .= bingo_ruby_post_classic_1( $bingo_ruby_options );
				} else {
					$str .= bingo_ruby_post_classic_2( $bingo_ruby_options );
				}
				$str .= '</div>';
				$flag = false;
				continue;
			}

			$str .= bingo_ruby_post_list_1( $bingo_ruby_options );

		}

		//blog pagination
		$str .= bingo_ruby_page_pagination();

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render small list layout
 */
if ( ! function_exists( 'bingo_ruby_blog_layout_list_small' ) ) {
	function bingo_ruby_blog_layout_list_small( $data_query, $bingo_ruby_options ) {

		$flag = true;
		$str  = '';

		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( ( true === $flag ) && ! empty( $bingo_ruby_options['big_first'] ) ) {
				$str .= '<div class="first-post-wrap col-sx-12">';
				if ( empty( $bingo_ruby_options['blog_1st_classic_layout'] ) || 'classic_1' == $bingo_ruby_options['blog_1st_classic_layout'] ) {
					$str .= bingo_ruby_post_classic_1( $bingo_ruby_options );
				} else {
					$str .= bingo_ruby_post_classic_2( $bingo_ruby_options );
				}
				$str .= '</div>';
				$flag = false;
				continue;
			}

			$str .= bingo_ruby_post_list_2( $bingo_ruby_options );

		}

		//blog pagination
		$str .= bingo_ruby_page_pagination();

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render grid layout
 */
if ( ! function_exists( 'bingo_ruby_blog_layout_grid' ) ) {
	function bingo_ruby_blog_layout_grid( $data_query, $bingo_ruby_options ) {

		$flag = true;
		$str  = '';

		//check fullwidth
		if ( ! empty( $bingo_ruby_options['blog_sidebar_position'] ) && 'none' == $bingo_ruby_options['blog_sidebar_position'] ) {
			$classes_col = 'post-outer col-sm-4 col-xs-12';
		} else {
			$classes_col = 'post-outer col-sm-6 col-xs-12';
		}

		if ( empty( $bingo_ruby_options['big_first'] ) ) {
			$str .= '<div class="blog-content-inner">';
		}

		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( ( true === $flag ) && ! empty( $bingo_ruby_options['big_first'] ) ) {
				$str .= '<div class="post-outer first-post-wrap col-sx-12">';
				if ( empty( $bingo_ruby_options['blog_1st_classic_layout'] ) || 'classic_1' == $bingo_ruby_options['blog_1st_classic_layout'] ) {
					$str .= bingo_ruby_post_classic_1( $bingo_ruby_options );
				} else {
					$str .= bingo_ruby_post_classic_2( $bingo_ruby_options );
				}
				$str .= '</div>';

				$str .= '<div class="blog-content-inner">';

				$flag = false;
				continue;
			} else {

				//render block
				$str .= '<div class="' . esc_attr( $classes_col ) . '">';
				$str .= bingo_ruby_post_grid_2( $bingo_ruby_options );
				$str .= '</div><!--#grid outer-->';
			}

		}

		$str .= '</div>';

		//blog pagination
		$str .= bingo_ruby_page_pagination();

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * render gird small layout
 */
if ( ! function_exists( 'bingo_ruby_blog_layout_grid_small' ) ) {
	function bingo_ruby_blog_layout_grid_small( $data_query, $bingo_ruby_options ) {

		$flag = true;
		$str  = '';

		//check fullwidth
		if ( ! empty( $bingo_ruby_options['blog_sidebar_position'] ) && 'none' == $bingo_ruby_options['blog_sidebar_position'] ) {
			$classes_col = 'post-outer col-sm-3 col-xs-6';
		} else {
			$classes_col = 'post-outer col-sm-4 col-xs-6';
		}

		if ( empty( $bingo_ruby_options['big_first'] ) ) {
			$str .= '<div class="blog-content-inner">';
		}

		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( ( true === $flag ) && ! empty( $bingo_ruby_options['big_first'] ) ) {
				$str .= '<div class="post-outer first-post-wrap col-sx-12">';
				if ( empty( $bingo_ruby_options['blog_1st_classic_layout'] ) || 'classic_1' == $bingo_ruby_options['blog_1st_classic_layout'] ) {
					$str .= bingo_ruby_post_classic_1( $bingo_ruby_options );
				} else {
					$str .= bingo_ruby_post_classic_2( $bingo_ruby_options );
				}
				$str .= '</div>';

				$str .= '<div class="blog-content-inner">';

				$flag = false;
				continue;
			} else {
				//render block
				$str .= '<div class="' . esc_attr( $classes_col ) . '">';
				$str .= bingo_ruby_post_grid_m2( $bingo_ruby_options );
				$str .= '</div><!--#grid outer-->';
			}

		}

		$str .= '</div>';

		//blog pagination
		$str .= bingo_ruby_page_pagination();

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * render gird overlay small
 */
if ( ! function_exists( 'bingo_ruby_blog_layout_overlay_small' ) ) {
	function bingo_ruby_blog_layout_overlay_small( $data_query, $bingo_ruby_options ) {

		$flag = true;
		$str  = '';

		//check fullwidth
		if ( ! empty( $bingo_ruby_options['blog_sidebar_position'] ) && 'none' == $bingo_ruby_options['blog_sidebar_position'] ) {
			$classes_col = 'post-outer col-sm-4 col-xs-12';
		} else {
			$classes_col = 'post-outer col-sm-6 col-xs-12';
		}

		if ( empty( $bingo_ruby_options['big_first'] ) ) {
			$str .= '<div class="blog-content-inner">';
		}

		while ( $data_query->have_posts() ) {
			$data_query->the_post();

			if ( ( true === $flag ) && ! empty( $bingo_ruby_options['big_first'] ) ) {
				$str .= '<div class="post-outer first-post-wrap col-sx-12">';
				if ( empty( $bingo_ruby_options['blog_1st_classic_layout'] ) || 'classic_1' == $bingo_ruby_options['blog_1st_classic_layout'] ) {
					$str .= bingo_ruby_post_classic_1( $bingo_ruby_options );
				} else {
					$str .= bingo_ruby_post_classic_2( $bingo_ruby_options );
				}
				$str .= '</div>';

				$str .= '<div class="blog-content-inner">';

				$flag = false;
				continue;
			} else {

				//render block
				$str .= '<div class="' . esc_attr( $classes_col ) . '">';
				$str .= bingo_ruby_post_feat_4( $bingo_ruby_options );
				$str .= '</div><!--#overlay outer-->';

			}

		}

		$str .= '</div>';

		//blog pagination
		$str .= bingo_ruby_page_pagination();

		return $str;

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render no content
 */
if ( ! function_exists( 'bingo_ruby_blog_no_content' ) ) {
	function bingo_ruby_blog_no_content() {

		$str = '';

		$str .= '<div class="main-content-wrap row clearfix">';
		$str .= '<div class="ruby-container">';
		$str .= '<div class="search-no-result post-title">';
		$str .= '<h3>' . esc_html__( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bingo' ) . '</h3>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}