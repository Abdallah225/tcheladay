<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post
 */
if ( ! function_exists( 'bingo_ruby_render_single_post' ) ) {
	function bingo_ruby_render_single_post() {

		$str = '';

		while ( have_posts() ) {
			the_post();
			$str .= '<div class="single-post-outer clearfix">';
			$str .= bingo_ruby_render_single_post_layout();
			$str .= '</div>';
		}

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render single post layout
 */
if ( ! function_exists( 'bingo_ruby_render_single_post_layout' ) ) {
	function bingo_ruby_render_single_post_layout() {
		//check
		$data_layout = bingo_ruby_single_post_check_layout();
		if ( ! isset( $data_layout['format'] ) || ! isset( $data_layout['layout'] ) || ! isset( $data_layout['video_popup'] ) ) {
			return false;
		}

		$post_id              = get_the_ID();
		$param                = array();
		$param['video_popup'] = $data_layout['video_popup'];

		$param['thumb_size'] = get_post_meta( $post_id, 'bingo_ruby_single_post_featured_size', true );
		if ( empty( $param['thumb_size'] ) || 'default' == $param['thumb_size'] ) {
			$param['thumb_size'] = bingo_ruby_core::get_option( 'single_post_featured_size' );
		}

		if ( 'thumbnail' == $data_layout['format'] ) {
			if ( ! empty( $data_layout['layout'] ) && 'crop' == $param['thumb_size'] && ( 2 == $data_layout['layout'] || 3 == $data_layout['layout'] || 4 == $data_layout['layout'] ) ) {
				$param['thumb_size'] = 'bingo_ruby_crop_1200x750';
			}

			switch ( $data_layout['layout'] ) {
				case '2' :
					return bingo_ruby_render_single_post_layout_2( $param );
				case '3' :
					return bingo_ruby_render_single_post_layout_3( $param );
				case '4' :
					return bingo_ruby_render_single_post_layout_4( $param );
				case '5' :
					return bingo_ruby_render_single_post_layout_5( $param );
                case '6' :
                    return bingo_ruby_render_single_post_layout_6( $param );
				default :
					return bingo_ruby_render_single_post_layout_1( $param );
			}
		} elseif ( 'video' == $data_layout['format'] ) {
			switch ( $data_layout['layout'] ) {
				case '2' :
					return bingo_ruby_render_single_post_video_2();
				case '3' :
					return bingo_ruby_render_single_post_video_3();
				default :
					return bingo_ruby_render_single_post_video_1();
			}
		} elseif ( 'audio' == $data_layout['format'] ) {
			switch ( $data_layout['layout'] ) {
				case '2' :
					return bingo_ruby_render_single_post_audio_2();
				case '3' :
					return bingo_ruby_render_single_post_audio_3();
				default :
					return bingo_ruby_render_single_post_audio_1();
			}
		} elseif ( 'gallery' == $data_layout['format'] ) {
			$data_layout['format'] = 'gallery';
			if ( 'slider' == $data_layout['gallery_type'] ) {
				switch ( $data_layout['layout'] ) {
					case '2' :
						return bingo_ruby_render_single_post_gallery_slider_2();
					case '3' :
						return bingo_ruby_render_single_post_gallery_slider_3();
					default :
						return bingo_ruby_render_single_post_gallery_slider_1();
				}
			} elseif ( 'grid' == $data_layout['gallery_type'] ) {
				switch ( $data_layout['layout'] ) {
					case '2' :
						return bingo_ruby_render_single_post_gallery_grid_2();
					default :
						return bingo_ruby_render_single_post_gallery_grid_1();
				}
			}
		} else {
			return bingo_ruby_render_single_post_layout_1( $param );
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render single page layout
 */

if ( ! function_exists( 'bingo_ruby_render_single_page_layout' ) ) {
	function bingo_ruby_render_single_page_layout() {

		$data_layout = bingo_ruby_single_post_check_layout_featured();

		switch ( $data_layout ) {
			case '2' :
				return bingo_ruby_render_single_page_layout_2();
			case '3' :
				return bingo_ruby_render_single_page_layout_3();
			case '4' :
				return bingo_ruby_render_single_page_layout_4();
			case '5' :
				return bingo_ruby_render_single_page_layout_5();
			default :
				return bingo_ruby_render_single_page_layout_1();
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $class
 * @param bool $review
 * render open single post wrapper
 */
if ( ! function_exists( 'bingo_ruby_page_content_open' ) ) {
	function bingo_ruby_page_content_open( $class_name = '', $sidebar_position = '' ) {

		//create wrap class
		$classes   = array();
		$classes[] = 'ruby-content-wrap';
		$classes[] = esc_attr( $class_name );
		if ( 'none' == $sidebar_position ) {
			$classes[] = 'content-without-sidebar col-xs-12';
		} else {
			$classes[] = 'col-sm-8 col-xs-12 content-with-sidebar';
		};

		$classes = implode( ' ', $classes );

		//render
		return '<div class="' . esc_attr( $classes ) . '">';
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post title
 */
if ( ! function_exists( 'bingo_ruby_single_post_title' ) ) {
	function bingo_ruby_single_post_title() {
		$str = '';
		$str .= '<div class="single-title post-title entry-title is-size-1">';
		$str .= '<h1>';
		$str .= get_the_title();
		$str .= '</h1>';
		$str .= '</div><!--#single title-->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post date full
 */
if ( ! function_exists( 'bingo_ruby_single_post_info_date_full' ) ) {
	function bingo_ruby_single_post_info_date_full() {
		$date_unix = get_the_time( 'U', get_the_ID() );
		$text_time = get_the_date( 'M. d, Y' ) . ' ' . esc_html__( 'at', 'bingo' ) . ' ' . get_the_date( 'g:i a' );

		$str = '';
		$str .= '<div class="meta-info-date-full">';
		$str .= '<span class="mate-info-date-icon"><i class="fa fa-clock-o"></i></span>';
		$str .= '<span class="meta-info-date-full-inner">';
		$str .= ' ';
		$str .= '<time class="date update" datetime="' . date( DATE_W3C, $date_unix ) . '">' . esc_html( $text_time ) . '</time>';
		$str .= '</span>';
		$str .= '</div>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render total share
 */
if ( ! function_exists( 'bingo_ruby_single_post_share_total' ) ) {
	function bingo_ruby_single_post_share_total() {

		if ( ! function_exists( 'bingo_ruby_plugin_total_share' ) ) {
			return false;
		}

		$total_share = bingo_ruby_plugin_total_share();

		//render
		$str = '';
		$str .= '<div class="single-post-share-total">';
		$str .= '<i class="icon-share fa fa-share"></i>';
		$str .= '<div class="total-content">';
		$str .= '<span class="total-number share-total-number">' . esc_html( $total_share ) . '</span>';
		$str .= '<span class="total-caption share-total-caption">' . esc_html__( 'shares', 'bingo' ) . '</span>';
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * render total share
 */
if ( ! function_exists( 'bingo_ruby_single_post_view_total' ) ) {
	function bingo_ruby_single_post_view_total() {

		if ( ! function_exists( 'bingo_ruby_plugin_view_total' ) ) {
			return false;
		}
		$view_total = bingo_ruby_plugin_view_total();

		//render
		$str = '';
		$str .= '<div class="single-post-view-total">';
		$str .= '<i class="icon-view fa fa-bolt" aria-hidden="true"></i>';
		$str .= '<div class="total-content">';
		$str .= '<span class="total-number view-total-number">' . esc_html( $view_total ) . '</span>';
		$str .= '<span class="total-caption view-total-caption">' . esc_html__( 'views', 'bingo' ) . '</span>';
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post title
 */
if ( ! function_exists( 'bingo_ruby_single_post_subtitle' ) ) {
	function bingo_ruby_single_post_subtitle() {

		//get subtitle
		$subtitle = get_post_meta( get_the_ID(), 'bingo_ruby_post_title_sub', true );
		if ( empty( $subtitle ) ) {
			return false;
		}

		$str = '';
		$str .= '<div class="single-subtitle">';
		$str .= '<h3>';
		$str .= esc_html( $subtitle );
		$str .= '</h3>';
		$str .= '</div><!--#single subtitle-->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single add top
 */
if ( ! function_exists( 'bingo_ruby_single_post_ad_top' ) ) {
	function bingo_ruby_single_post_ad_top() {
		$bingo_ruby_ad_style  = bingo_ruby_core::get_option( 'header_ad_type_single' );
		$bingo_ruby_ad_script = bingo_ruby_core::get_option( 'header_ad_script_single' );
		$bingo_ruby_ad_image  = bingo_ruby_core::get_option( 'header_ad_image_single' );
		$bingo_ruby_ad_url    = bingo_ruby_core::get_option( 'header_ad_url_single' );

		$str = '';
		if ( ! empty( $bingo_ruby_ad_image['url'] ) || ! empty( $bingo_ruby_ad_script ) ) {
			$str .= '<div class="banner-ad-wrap banner-ad-top-single">';
			$str .= '<div class="banner-ad-inner">';
			if ( 'script' == $bingo_ruby_ad_style && ! empty( $bingo_ruby_ad_script ) ) {
				$str .= html_entity_decode( stripslashes( bingo_ruby_ad_render_script( $bingo_ruby_ad_script, 'content_ad' ) ) );
			} elseif ( ! empty( $bingo_ruby_ad_image['url'] ) ) {
				if ( ! empty( $bingo_ruby_ad_url ) ) {
					$str .= '<a class="banner-ad-image" href="' . esc_url( $bingo_ruby_ad_url ) . '" target="_blank">';
					$str .= '<img src="' . esc_url( $bingo_ruby_ad_image['url'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
					$str .= '</a>';
				} else {
					$str .= '<div class="banner-ad-image">';
					$str .= '<img src="' . esc_url( $bingo_ruby_ad_image['url'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
					$str .= '</div>';
				}
			} else {
				return false;
			}
			$str .= '</div>';
			$str .= '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single add bottom
 */
if ( ! function_exists( 'bingo_ruby_single_post_ad_bottom' ) ) {
	function bingo_ruby_single_post_ad_bottom() {
		$bingo_ruby_ad_style  = bingo_ruby_core::get_option( 'bottom_ad_type_single' );
		$bingo_ruby_ad_script = bingo_ruby_core::get_option( 'bottom_ad_script_single' );
		$bingo_ruby_ad_image  = bingo_ruby_core::get_option( 'bottom_ad_image_single' );
		$bingo_ruby_ad_url    = bingo_ruby_core::get_option( 'bottom_ad_url_single' );

		$str = '';
		if ( ! empty( $bingo_ruby_ad_image['url'] ) || ! empty( $bingo_ruby_ad_script ) ) {
			$str .= '<div class="banner-ad-wrap banner-ad-bottom-single">';
			$str .= '<div class="banner-ad-inner">';
			if ( 'script' == $bingo_ruby_ad_style && ! empty( $bingo_ruby_ad_script ) ) {
				$str .= html_entity_decode( stripslashes( bingo_ruby_ad_render_script( $bingo_ruby_ad_script, 'content_ad' ) ) );
			} elseif ( ! empty( $bingo_ruby_ad_image['url'] ) ) {
				if ( ! empty( $bingo_ruby_ad_url ) ) {
					$str .= '<a class="banner-ad-image" href="' . esc_url( $bingo_ruby_ad_url ) . '" target="_blank">';
					$str .= '<img src="' . esc_url( $bingo_ruby_ad_image['url'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
					$str .= '</a>';
				} else {
					$str .= '<div class="banner-ad-image">';
					$str .= '<img src="' . esc_url( $bingo_ruby_ad_image['url'] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
					$str .= '</div>';
				}
			} else {
				return false;
			}
			$str .= '</div>';
			$str .= '</div>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * single post entry
 */
if ( ! function_exists( 'bingo_ruby_single_post_entry' ) ) {
	function bingo_ruby_single_post_entry() {
		$str = '';

		$str .= '<div class="entry single-entry clearfix">';
		$str .= bingo_ruby_single_post_content();
		$str .= '</div>';

		return $str;
	}

}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post content
 */
if ( ! function_exists( 'bingo_ruby_single_post_content' ) ) {
	function bingo_ruby_single_post_content() {

		$review          = bingo_ruby_single_post_check_review();
		$review_position = bingo_ruby_single_post_check_review_position();

		$str = '';

		if ( true === $review && 'top' == $review_position ) {
			$str .= bingo_ruby_post_review( 'is-left-top' );
		}

		ob_start();
		the_content();
		$str .= ob_get_clean();

		//single pagination
		$str .= wp_link_pages(
			array(
				'before'      => '<div class="single-page-links clearfix"><div class="pagination-num">',
				'after'       => '</div></div>',
				'link_before' => '<span class="page-numbers">',
				'link_after'  => '</span>',
				'echo'        => false
			)
		);

		if ( true === $review && 'bottom' == $review_position ) {
			$str .= bingo_ruby_post_review( 'is-bottom' );
		}

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post meta info
 */
if ( ! function_exists( 'bingo_ruby_post_review' ) ) {
	function bingo_ruby_post_review( $add_classes = '' ) {
		$post_id        = get_the_ID();
		$review_summary = get_post_meta( $post_id, 'bingo_ruby_review_summary', true );
		$total_score    = get_post_meta( $post_id, 'bingo_ruby_as', true );
		$review_data    = array(
			array(
				'bingo_ruby_cd' => get_post_meta( $post_id, 'bingo_ruby_cd1', true ),
				'bingo_ruby_cs' => get_post_meta( $post_id, 'bingo_ruby_cs1', true ),
			),
			array(
				'bingo_ruby_cd' => get_post_meta( $post_id, 'bingo_ruby_cd2', true ),
				'bingo_ruby_cs' => get_post_meta( $post_id, 'bingo_ruby_cs2', true ),
			),
			array(
				'bingo_ruby_cd' => get_post_meta( $post_id, 'bingo_ruby_cd3', true ),
				'bingo_ruby_cs' => get_post_meta( $post_id, 'bingo_ruby_cs3', true ),
			),
			array(
				'bingo_ruby_cd' => get_post_meta( $post_id, 'bingo_ruby_cd4', true ),
				'bingo_ruby_cs' => get_post_meta( $post_id, 'bingo_ruby_cs4', true ),
			),
			array(
				'bingo_ruby_cd' => get_post_meta( $post_id, 'bingo_ruby_cd5', true ),
				'bingo_ruby_cs' => get_post_meta( $post_id, 'bingo_ruby_cs5', true ),
			),
			array(
				'bingo_ruby_cd' => get_post_meta( $post_id, 'bingo_ruby_cd6', true ),
				'bingo_ruby_cs' => get_post_meta( $post_id, 'bingo_ruby_cs6', true ),
			),
			array(
				'bingo_ruby_cd' => get_post_meta( $post_id, 'bingo_ruby_cd7', true ),
				'bingo_ruby_cs' => get_post_meta( $post_id, 'bingo_ruby_cs7', true ),
			),
		);

		//render
		$str = '';
		$str .= '<div class="review-box-wrap ' . esc_attr( $add_classes ) . '">';
		$str .= '<div class="review-box-inner">';
		$str .= '<div class="review-title block-title widget-title"><h3>' . esc_html__( 'Review overview', 'bingo' ) . '</h3></div>';
		$str .= '<div class="review-content-wrap">';
		foreach ( $review_data as $data ) {
			if ( ! empty( $data['bingo_ruby_cd'] ) ) {
				$str .= '<div class="review-el">';
				$str .= '<div class="review-el-inner">';
				$str .= '<span class="review-description">' . esc_attr( $data['bingo_ruby_cd'] ) . '</span>';
				$str .= '<span class="review-info-score">' . esc_attr( $data['bingo_ruby_cs'] ) . '</span>';
				$str .= '</div>';
				$str .= '<div class="score-bar-wrap">';
				$str .= '<div class="score-bar" style="width:' . esc_attr( $data['bingo_ruby_cs'] * 10 ) . '%"></div>';
				$str .= '</div>';
				$str .= '</div><!--#reivew el-->';
			}
		}

		$str .= '<div class="review-summary-wrap">';
		$str .= '<div class="review-summary-inner">';
		$str .= '<div class="post-review-info">';
		$str .= '<span class="review-info-score">' . esc_attr( $total_score ) . '</span>';
		$str .= '</div><!--#post review info-->';
		$str .= '<h3>' . esc_html__( 'Summary', 'bingo' ) . '</h3>';
		$str .= '<p class="review-summary-desc review-summary-review">';
		$str .= esc_html( $review_summary );
		$str .= '</p>';
		$str .= '</div><!--#reivew summary inner -->';
		$str .= '</div><!--#reivew summary wrap -->';

		$str .= '</div><!--#reivew content wrap -->';
		$str .= '</div><!--#reivew box inner -->';
		$str .= '</div><!--#reivew box wrap -->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post meta info
 */
if ( ! function_exists( 'bingo_ruby_single_post_meta_info' ) ) {
	function bingo_ruby_single_post_meta_info() {
		//get options
		$meta_info_manager = bingo_ruby_core::get_option( 'single_post_meta_info_manager' );
		$meta_info_icon    = bingo_ruby_core::get_option( 'single_post_meta_info_icon' );

		//override default setting
		if ( ! empty( $override ) && is_array( $override ) ) {
			$meta_info_manager['enabled'] = $override;
		}

		//check
		if ( empty( $meta_info_manager['enabled'] ) || ! is_array( $meta_info_manager['enabled'] ) ) {
			return false;
		}

		//create classes
		$classes   = array();
		$classes[] = 'post-meta-info';
		if ( ! empty( $class_name ) ) {
			$classes[] = $class_name;
		}
		if ( ! empty( $meta_info_icon ) ) {
			$classes[] = 'is-show-icon';
		} else {
			$classes[] = 'is-hide-icon';
		}
		$classes = implode( ' ', $classes );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $classes ) . '">';
		foreach ( $meta_info_manager['enabled'] as $key => $val ) {
			switch ( $key ) {
				case 'date' :
					$str .= bingo_ruby_meta_info_date( $meta_info_icon );
					break;
				case 'author' :
					$str .= bingo_ruby_meta_info_author( $meta_info_icon );
					break;
				case 'cate' :
					$str .= bingo_ruby_meta_info_cat( $meta_info_icon );
					break;
				case 'tag' :
					$str .= bingo_ruby_meta_info_tag( $meta_info_icon );
					break;
				case 'view' :
					$str .= bingo_ruby_meta_info_view( $meta_info_icon );
					break;
				case 'comment' :
					$str .= bingo_ruby_meta_info_comment( $meta_info_icon );
					break;
			};
		}

		$str .= '</div><!--#post meta info-->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post share bar
 */
if ( ! function_exists( 'bingo_ruby_single_post_action' ) ) {
	function bingo_ruby_single_post_action() {

		if ( ! function_exists( 'bingo_ruby_plugin_render_shares' ) ) {
			return false;
		}
		$counter_type = bingo_ruby_core::get_option( 'single_post_counter_type' );
		$social_share = bingo_ruby_plugin_render_shares( true );
		if ( empty( $counter_type ) && empty( $social_share ) ) {
			return false;
		}

		$str = '';
		$str .= '<div class="single-post-action clearfix">';

		if ( 'share' == $counter_type ) {
			$str .= '<div class="single-post-counter">';
			$str .= bingo_ruby_single_post_share_total();
			$str .= '</div><!--#post counter-->';
		} elseif ( 'view' == $counter_type ) {
			$str .= '<div class="single-post-counter">';
			$str .= bingo_ruby_single_post_view_total();
			$str .= '</div><!--#post counter-->';
		} elseif ( 'all' == $counter_type ) {
			$str .= '<div class="single-post-counter">';
			$str .= bingo_ruby_single_post_view_total();
			$str .= bingo_ruby_single_post_share_total();
			$str .= '</div><!--#post counter-->';
		}
		$str .= '<div class="single-post-share-header">';
		$str .= $social_share;
		$str .= '</div><!--#single post share header-->';
		$str .= '</div><!--#single post action-->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single box author
 */
if ( ! function_exists( 'bingo_ruby_single_post_box_author' ) ) {
	function bingo_ruby_single_post_box_author( $author_position ) {
		//check settings
		$bingo_ruby_single_post_box_author = bingo_ruby_core::get_option( 'single_post_box_author' );
		if ( empty( $bingo_ruby_single_post_box_author ) && is_single() ) {
			return false;
		}

		$classes = array();

		$classes[] = 'single-author-wrap';
		if ( empty( $author_position ) ) {
			$classes[] = 'single-author-top';
		} elseif ( $author_position == 'top' ) {
			$classes[] = 'single-author-top';
		} else {
			$classes[] = 'single-author-bottom';
		}

		$classes = implode( ' ', $classes );

		$bingo_ruby_author_id          = get_the_author_meta( 'ID' );
		$bingo_ruby_author_name        = get_the_author_meta( 'display_name' );
		$bingo_ruby_author_job         = '';
		$bingo_ruby_author_decs        = html_entity_decode( get_the_author_meta( 'description' ) );
		$bingo_ruby_author_social_data = bingo_ruby_social_profile_author( $bingo_ruby_author_id );
		$bingo_ruby_render_social      = bingo_ruby_render_social_icon( $bingo_ruby_author_social_data, false, true );

		if ( ! empty( $bingo_ruby_author_social_data['job'] ) ) {
			$bingo_ruby_author_job = $bingo_ruby_author_social_data['job'];
		}
		if ( ! empty( $bingo_ruby_author_social_data['description'] ) ) {
			$bingo_ruby_author_decs = $bingo_ruby_author_social_data['description'];
		}
		$str = '';
		$str .= '<div class="' . $classes . '">';
		$str .= '<div class="single-author-inner clearfix">';
		$str .= '<div class="author-thumb-wrap">';
		$str .= get_avatar( get_the_author_meta( 'user_email' ), 140, '', $bingo_ruby_author_name );
		$str .= '</div><!--#author thumb -->';
		$str .= '<div class="author-content-wrap">';
		$str .= '<div class="author-title">';
		$str .= '<a href="' . get_author_posts_url( $bingo_ruby_author_id ) . '">';
		$str .= '<h3>' . esc_html( $bingo_ruby_author_name ) . '</h3>';
		$str .= '</a>';
		if ( ! empty( $bingo_ruby_author_job ) ) {
			$str .= '<span class="author-job">' . esc_html( $bingo_ruby_author_job ) . '</span>';
		}
		$str .= '</div><!--#author title -->';
		if ( ! empty( $bingo_ruby_author_decs ) && $author_position == 'bottom' ) {
			$str .= '<div class="author-description">' . $bingo_ruby_author_decs . '</div>';
		}
		$str .= '<div class="ruby-author-bttom-wrap">';
		$str .= '<div class="ruby-author-links">';
		$str .= '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID', $bingo_ruby_author_id ) ) ) . '">' . esc_html__( 'view all posts', 'bingo' ) . '</a>';
		$str .= '</div>';
		if ( ! empty( $bingo_ruby_render_social ) ) {
			$str .= '<div class="author-social social-tooltips">' . $bingo_ruby_render_social . '</div>';
		}
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div><!--#author box wrap -->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single navigation
 */
if ( ! function_exists( 'bingo_ruby_single_post_box_nav' ) ) {
	function bingo_ruby_single_post_box_nav() {
		//check settings
		$bingo_ruby_single_post_box_author = bingo_ruby_core::get_option( 'single_post_box_nav' );
		if ( empty( $bingo_ruby_single_post_box_author ) && is_single() ) {
			return false;
		}

		$bingo_ruby_post_previous = get_adjacent_post( false, '', true );
		$bingo_ruby_post_next     = get_adjacent_post( false, '', false );
		if ( empty( $bingo_ruby_post_next ) && empty( $bingo_ruby_post_previous ) ) {
			return false;
		}

		$str = '';
		$str .= '<nav class="single-nav single-box row">';
		$str .= '<div class="col-sm-6 col-xs-12 nav-el nav-left post-title is-size-6">';
		if ( ! empty( $bingo_ruby_post_previous ) ) {
			$str .= '<a href="' . get_permalink( $bingo_ruby_post_previous->ID ) . '" rel="bookmark" title="' . esc_attr( get_the_title( $bingo_ruby_post_previous->ID ) ) . '">';
			$str .= '<span class="ruby-nav-icon nav-left-icon"><i class="fa fa-angle-left"></i></span>';
			$str .= '<span class="ruby-nav-link nav-left-link">' . get_the_title( $bingo_ruby_post_previous->ID ) . '</span>';
			$str .= '</a>';
		}
		$str .= '</div>';
		$str .= '<div class="col-sm-6 col-xs-12 nav-el nav-right post-title is-size-6">';
		if ( ! empty( $bingo_ruby_post_next ) ) {
			$str .= '<a href="' . get_permalink( $bingo_ruby_post_next->ID ) . '" rel="bookmark" title="' . esc_attr( get_the_title( $bingo_ruby_post_next->ID ) ) . '">';
			$str .= '<span class="ruby-nav-icon nav-right-icon"><i class="fa fa-angle-right"></i></span>';
			$str .= '<span class="ruby-nav-link nav-right-link">' . get_the_title( $bingo_ruby_post_next->ID ) . '</span>';
			$str .= '</a>';
		}
		$str .= '</div>';
		$str .= '</nav>';

		return $str;

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post schema makeup
 */
if ( ! function_exists( 'bingo_ruby_single_post_schema_markup' ) ) {
	function bingo_ruby_single_post_schema_markup() {

		$protocol = 'http';
		if ( is_ssl() ) {
			$protocol = 'https';
		}

		$publisher = get_the_author_meta( 'display_name' );
		if ( empty( $publisher ) ) {
			$publisher = get_bloginfo( 'name' );
		}

		//publisher logo
		$logo = bingo_ruby_core::get_option( 'header_logo' );

		if ( ! empty( $logo['url'] ) ) {
			$publisher_logo = esc_url( $logo['url'] );
		}

		$post_title  = get_the_title();
		$post_date   = get_the_time( 'U' );
		$post_update = get_the_modified_time( 'U' );

		$full_image_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

		$str = '';
		$str .= '<meta itemscope itemprop="mainEntityOfPage"  itemType="' . $protocol . '://schema.org/WebPage" itemid="' . get_permalink() . '"/>';

		//headline
		$str .= '<meta itemprop="headline " content="' . esc_attr( $post_title ) . '">';

		//author
		$str .= '<span style="display: none;" itemprop="author" itemscope itemtype="' . $protocol . '://schema.org/Person">';
		$str .= '<meta itemprop="name" content="' . esc_attr( get_the_author_meta( 'display_name' ) ) . '">';
		$str .= '</span>';

		//image
		$str .= '<span style="display: none;" itemprop="image" itemscope itemtype="' . $protocol . '://schema.org/ImageObject">';
		$str .= '<meta itemprop="url" content="' . $full_image_attachment[0] . '">';
		$str .= '<meta itemprop="width" content="' . $full_image_attachment[1] . '">';
		$str .= '<meta itemprop="height" content="' . $full_image_attachment[2] . '">';
		$str .= '</span>';

		//publisher
		$str .= '<span style="display: none;" itemprop="publisher" itemscope itemtype="' . $protocol . '://schema.org/Organization">';
		$str .= '<span style="display: none;" itemprop="logo" itemscope itemtype="' . $protocol . '://schema.org/ImageObject">';
		if ( ! empty( $publisher_logo ) ) {
			$str .= '<meta itemprop="url" content="' . $publisher_logo . '">';
		}
		$str .= '</span>';
		$str .= '<meta itemprop="name" content="' . $publisher . '">';
		$str .= '</span>';

		$str .= '<meta itemprop="datePublished" content="' . date( DATE_W3C, $post_date ) . '"/>';
		$str .= '<meta itemprop="dateModified" content="' . date( DATE_W3C, $post_update ) . '"/>';

		//review
		$enable_review = bingo_ruby_single_post_check_review();

		if ( ! empty( $enable_review ) ) {
			$total_score    = get_post_meta( get_the_ID(), 'bingo_ruby_as', true );
			$review_summary = get_post_meta( get_the_ID(), 'bingo_ruby_review_summary', true );

			$str .= '<span itemprop="itemReviewed" itemscope itemtype="' . $protocol . '://schema.org/Thing">';
			$str .= '<meta itemprop="name " content = "' . esc_attr( $post_title ) . '">';
			$str .= '</span>';

			$str .= '<meta itemprop="reviewBody" content = "' . esc_attr( $review_summary ) . '">';

			//ratting
			$str .= '<span style="display: none;" itemprop="reviewRating" itemscope itemtype="' . $protocol . '://schema.org/Rating">';
			$str .= '<meta itemprop="worstRating" content = "1">';
			$str .= '<meta itemprop="bestRating" content = "10">';
			$str .= '<meta itemprop="ratingValue" content = "' . $total_score . '">';
			$str .= '</span>';

		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post box related
 */
if ( ! function_exists( 'bingo_ruby_single_post_box_related' ) ) {
	function bingo_ruby_single_post_box_related() {

		$post_id = get_the_ID();

		$check = bingo_ruby_core::get_option( 'single_post_box_related' );
		if ( empty( $check ) ) {
			return false;
		}

		$data_query = bingo_ruby_related_get();
		$check_ajax = bingo_ruby_single_post_check_ajax();

		if ( empty( $check ) || empty( $data_query->post_count ) ) {
			return false;
		}

		$title              = bingo_ruby_core::get_option( 'single_post_box_related_title' );
		$style_meta_related = get_post_meta( $post_id, 'bingo_ruby_single_post_box_related_layout', true );

		if ( ! empty( $style_meta_related ) && 'default' != $style_meta_related ) {
			$style = $style_meta_related;
		} else {
			$style = bingo_ruby_core::get_option( 'single_post_box_related_layout' );
		}

		if ( empty( $style ) ) {
			$style = 1;
		}

		$page_current = 1;
		$page_max     = $data_query->max_num_pages;

		//render
		if ( ! empty( $title ) ) {
			$class_name = 'single-post-box-related has-header-block clearfix box-related-' . $style;
		} else {
			$class_name = 'single-post-box-related clearfix box-related-' . $style;
		}
		$str = '';
		if ( 'scroll_related' == $check_ajax && $page_max > 1 ) {
			$str .= '<div class="' . esc_attr( $class_name ) . '" data-related_post_id="' . $post_id . '" data-related_style="' . esc_attr( $style ) . '" data-related_page_current="' . esc_attr( $page_current ) . '" data-related_page_max="' . esc_attr( $page_max ) . '">';
		} else {
			$str .= '<div class="' . esc_attr( $class_name ) . '">';
		}
		if ( ! empty( $title ) ) {
			$str .= '<div class="box-related-header block-header-wrap">';
			$str .= '<div class="block-header-inner">';
			$str .= '<div class="block-title">';
			$str .= '<h3>' . esc_html( $title ) . '</h3>';
			$str .= '</div>';
			$str .= '</div>';
			$str .= '</div><!--#related header-->';
		}

		$str .= '<div class="box-related-content block-content-wrap row">';
		switch ( $style ) {
			case '1' :
				$str .= bingo_ruby_related_listing_style_1( $data_query );
				break;
			case '2' :
				$str .= bingo_ruby_related_listing_style_2( $data_query );
				break;
			case '3' :
				$str .= bingo_ruby_related_listing_style_3( $data_query );
				break;
			case '4' :
				$str .= bingo_ruby_related_listing_style_4( $data_query );
				break;
		}
		$str .= '</div><!--#related content-->';
		if ( 'scroll_related' == $check_ajax && $page_max > 1 ) {
			$str .= '<div class="box-related-footer">';
			$str .= '<div class="related-infinite-scroll clearfix">';
			$str .= '<div class="ajax-animation"><span class="ajax-animation-icon"></span></div>';
			$str .= '</div><!--infinite scrolling-->';
			$str .= '</div>';
		}
		$str .= '</div>';
		wp_reset_postdata();

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post widget fw
 */
if ( ! function_exists( 'bingo_ruby_single_post_widget_section' ) ) {
	function bingo_ruby_single_post_widget_section() {
		$bingo_ruby_single_post_widget_section = bingo_ruby_core::get_option( 'single_post_widget_section' );

		$str = '';
		if ( ! empty( $bingo_ruby_single_post_widget_section ) ) {
			$str .= '<div class="single-box single-widget row>';
			if ( is_active_sidebar( 'bingo_ruby_single_post_section' ) ) {
				ob_start();
				dynamic_sidebar( 'bingo_ruby_single_post_section' );
				$str .= ob_get_clean();
			}
			$str .= '</div><!--single widget-->';
		}

		return $str;

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single tag
 */
if ( ! function_exists( 'bingo_ruby_single_post_tag' ) ) {
	function bingo_ruby_single_post_tag() {

		//check
		$tags = get_the_tags();

		//render
		$str = '';
		$str .= '<span class="single-post-tag">';

		if ( empty( $tags ) || ! is_array( $tags ) ) {
			return false;
		} else {
			$str .= '<span class="single-tag-text">' . esc_html__( 'Tags :', 'bingo' ) . '</span>';
			foreach ( $tags as $tag ) {
				$tag_link = get_tag_link( $tag->term_id );
				$str .= '<a class="single-tag-el" href="' . $tag_link . '" title="' . esc_attr( strip_tags( $tag->name ) ) . '">';
				$str .= esc_html( $tag->name );
				$str .= '</a>';
			}
		}
		$str .= '</span><!--#single post tag-->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single comment
 */
if ( ! function_exists( 'bingo_ruby_single_comment' ) ) {
	function bingo_ruby_single_comment() {

		//check comment box
		$bingo_ruby_comment_box = bingo_ruby_check_comment_box();
		if ( empty( $bingo_ruby_comment_box ) ) {
			return false;
		}

		$str    = '';
		$button = bingo_ruby_core::get_option( 'single_post_box_comment_button' );

		//enable for ajax cal
		global $withcomments;
		$withcomments = true;

		if ( ! empty( $button ) ) {
			$str .= '<div class="single-post-box single-post-box-comment is-show-btn">';
			$comment_number = get_comments_number();
			$comment_number = intval( $comment_number );

			$str .= '<div class="box-comment-btn-wrap">';
			$str .= '<a href="#" class="box-comment-btn">';
			$str .= '<i class="fa fa-comments"></i>';
			if ( $comment_number > 1 ) {
				$str .= esc_html__( 'show', 'bingo' ) . ' ' . esc_attr( $comment_number ) . ' ' . esc_html__( 'comments', 'bingo' );
			} elseif ( 1 == $comment_number ) {
				$str .= esc_html__( 'show', 'bingo' ) . ' ' . esc_attr( $comment_number ) . ' ' . esc_html__( 'comment', 'bingo' );
			} else {
				$str .= esc_html__( 'add a comment', 'bingo' );
			}

			$str .= '</a>';
			$str .= '<div class="ajax-animation"><span class="ajax-animation-icon"></span></div>';
			$str .= '</div>';
			$str .= '<div class="box-comment-content">';

			//render comment box
			ob_start();
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			$str .= ob_get_clean();

			$str .= '</div>';
			$str .= '</div>';
		} else {
			$str .= '<div class="single-post-box single-post-box-comment">';
			$str .= '<div class="box-comment-content">';

			//render comment box
			ob_start();
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			$str .= ob_get_clean();

			$str .= '</div>';
			$str .= '</div>';
		}

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $size
 * render single featured
 */
if ( ! function_exists( 'bingo_ruby_single_post_thumbnail' ) ) {
	function bingo_ruby_single_post_thumbnail( $param = array() ) {
		$bingo_thumb_url     = get_the_post_thumbnail_url();
		$bingo_thumb_type    = substr( $bingo_thumb_url, - 4 );
		$bingo_thumb_caption = get_post( get_post_thumbnail_id() )->post_excerpt;

		if ( ( empty( $param['thumb_size'] ) || empty( $bingo_thumb_type ) || 'crop' == $param['thumb_size'] ) && $bingo_thumb_type != '.gif' ) {
			$size = 'bingo_ruby_crop_750x450';
		} else {
			$size = $param['thumb_size'];
		}

		//render
		$str = '';
		if ( has_post_thumbnail() ) {
			$str .= '<div class="single-post-thumb-outer">';
			$str .= '<div class="post-thumb">';
			$str .= get_the_post_thumbnail( get_the_ID(), $size );
			if ( ! empty( $bingo_thumb_caption ) ) {
				$str .= '<div class="single-post-excerpt">';
				$str .= $bingo_thumb_caption;
				$str .= '</div>';
			}
			$str .= '</div>';
			if ( ! empty( $param['video_popup'] ) ) {
				$str .= bingo_ruby_single_post_popup_video();
			}

			$str .= '</div>';
		}

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $size
 * render thumb page
 */
if ( ! function_exists( 'bingo_ruby_page_thumb_classic' ) ) {
	function bingo_ruby_page_thumb_classic( $param = array() ) {

		$post_id             = get_the_ID();
		$param['thumb_size'] = get_post_meta( $post_id, 'bingo_ruby_page_featured_size', true );
		if ( empty( $param['thumb_size'] ) || 'default' == $param['thumb_size'] ) {
			$param['thumb_size'] = bingo_ruby_core::get_option( 'single_page_featured_size' );
		}

		if ( 'crop' == $param['thumb_size'] ) {
			$size = 'bingo_ruby_crop_750x450';
		} else {
			$size = 'full';
		}

		//render
		$str = '';
		if ( has_post_thumbnail() ) {
			$str .= '<div class="single-post-thumb-outer">';
			$str .= '<div class="post-thumb">';
			$str .= get_the_post_thumbnail( $post_id, $size );
			$str .= '</div>';
			$str .= '</div>';
		}

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $class_name
 *
 * @return string
 * render single post video popup
 */
if ( ! function_exists( 'bingo_ruby_single_post_popup_video' ) ) {
	function bingo_ruby_single_post_popup_video( $class_name = 'is-big-icon is-light-text is-absolute' ) {
		$auto_play = bingo_ruby_single_post_check_autoplay();

		$classes   = array();
		$classes[] = 'single-post-popup-video-btn post-format-wrap';
		//create class
		if ( ! empty( $class_name ) ) {
			$classes[] = $class_name;
		}
		$classes = implode( ' ', $classes );

		if ( ! empty( $auto_play ) ) {
			$classes_auto_play = 'single-post-popup-video video-playlist-autoplay';
		} else {
			$classes_auto_play = 'single-post-popup-video';
		}

		$str = '';
		$str .= '<a href="#" data-effect="mpf-ruby-effect" class="' . esc_attr( $classes ) . '">';
		$str .= '<span class="post-format is-video-format"></span>';
		$str .= '</a>';

		$str .= '<div class="' . esc_attr( $classes_auto_play ) . ' mfp-hide mfp-animation">';
		$str .= '<div class="popup-thumbnail-video-holder">';
		$str .= '<div class="single-post-popup-video-inner popup-thumbnail-video-inner post-thumb-outer">';
		$str .= '<div class="post-thumb iframe-video">';
		$str .= bingo_ruby_iframe_video();
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post video classic
 */
if ( ! function_exists( 'bingo_ruby_single_post_video_classic' ) ) {
	function bingo_ruby_single_post_video_classic() {
		$auto_play = bingo_ruby_single_post_check_autoplay();

		if ( ! empty( $auto_play ) ) {
			$classes = 'single-post-video-outer video-playlist-autoplay';
		} else {
			$classes = 'single-post-video-outer';
		}

		//render
		$str = '';
		$str .= '<div class="single-post-thumb-outer ' . $classes . '">';
		$str .= '<div class="post-thumb iframe-video">';
		$str .= bingo_ruby_iframe_video();
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render single post video classic
 */
if ( ! function_exists( 'bingo_ruby_single_post_audio_classic' ) ) {
	function bingo_ruby_single_post_audio_classic() {

		//render
		$str = '';
		$str .= '<div class="single-post-thumb-outer single-post-audio-outer">';
		$str .= '<div class="post-thumb iframe-audio">';
		$str .= bingo_ruby_iframe_audio();
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}