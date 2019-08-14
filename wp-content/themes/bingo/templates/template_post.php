<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $classes
 *
 * @return string
 * render post title
 */
if ( ! function_exists( 'bingo_ruby_post_title' ) ) {
	function bingo_ruby_post_title( $class_name = 'is-size-4' ) {

		//render
		$str = '';
		if ( is_sticky() ) {
			$str .= '<h2 class="post-title is-sticky entry-title ' . esc_attr( $class_name ) . '">';
		} else {
			$str .= '<h2 class="post-title entry-title ' . esc_attr( $class_name ) . '">';
		}
		$str .= '<a class="post-title-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark" title="' . esc_attr( get_the_title() ) . '">';
		$str .= get_the_title();
		$str .= '</a></h2><!--#post title-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render post meta info right
 */
if ( ! function_exists( 'bingo_ruby_post_meta_info_right' ) ) {
	function bingo_ruby_post_meta_info_right() {

		$counter_type = bingo_ruby_core::get_option( 'post_meta_info_right' );

		if ( 'none' == $counter_type ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<div class="post-meta-info-right">';
		if ( 'comment' == $counter_type ) {
			$str .= bingo_ruby_info_right_comment();
		} elseif ( 'view' == $counter_type ) {
			$str .= bingo_ruby_info_right_view();
		} elseif ( 'share' == $counter_type ) {
			$str .= bingo_ruby_info_right_share();
		}
		$str .= '</div>';

		return $str;

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 *
 * @return string
 * render meta info right comment
 */
if ( ! function_exists( 'bingo_ruby_info_right_comment' ) ) {
	function bingo_ruby_info_right_comment() {

		$comment_number = get_comments_number();
		$comment_number = intval( $comment_number );

		//check comment
		if ( $comment_number == 0 ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<span class="post-meta-counter post-meta-counter-comment">';
		$str .= '<i class="fa fa-comment" aria-hidden="true"></i>';
		$str .= '<span class="number-counter-comment">';
		if ( $comment_number > 1 ) {
			$str .= esc_attr( $comment_number );
		} elseif ( 1 == $comment_number ) {
			$str .= esc_attr( $comment_number );
		}
		$str .= '</span><!--#number counter comment-->';
		$str .= '</span><!--#post title comment-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 *
 * @return string
 * render meta info right view
 */
if ( ! function_exists( 'bingo_ruby_info_right_view' ) ) {
	function bingo_ruby_info_right_view() {

		if ( ! function_exists( 'bingo_ruby_plugin_view_total' ) ) {
			return false;
		}

		$total_view = bingo_ruby_plugin_view_total();

		//check view
		if ( empty ( $total_view ) ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<span class="post-meta-counter post-meta-counter-view">';
		$str .= '<i class="fa fa-bolt" aria-hidden="true"></i>';
		$str .= '<span class="number-counter-view">';
		$str .= esc_html( $total_view );
		$str .= '</span><!--#number counter view-->';
		$str .= '</span><!--#post title view-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 ** @return string
 * render mate info right share
 */
if ( ! function_exists( 'bingo_ruby_info_right_share' ) ) {
	function bingo_ruby_info_right_share() {

		if ( ! function_exists( 'bingo_ruby_plugin_total_share' ) ) {
			return false;
		}

		$total_share = bingo_ruby_plugin_total_share();

		//check share
		if ( empty( $total_share ) ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<span class="post-meta-counter post-meta-counter-share">';
		$str .= '<i class="fa fa-share-alt" aria-hidden="true"></i>';
		$str .= '<span class="number-counter-share">';
		$str .= esc_html( $total_share );
		$str .= '</span>';
		$str .= '</span>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $class_name
 *
 * @return string
 * render post category info
 */
if ( ! function_exists( 'bingo_ruby_post_cat_info' ) ) {
	function bingo_ruby_post_cat_info( $class_name = '', $primary = true ) {

		$categories       = get_the_category();
		$primary_category = get_post_meta( get_the_ID(), 'bingo_ruby_post_primary_category', true );

		//create classes
		$classes   = array();
		$classes[] = 'post-cat-info';
		$classes[] = 'clearfix';
		if ( ! empty( $class_name ) ) {
			$classes[] = $class_name;
		}
		$classes = implode( ' ', $classes );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $classes ) . '">';

		if ( empty( $primary_category ) || false === $primary ) {
			if ( ! empty( $categories ) && is_array( $categories ) ) {
				foreach ( $categories as $category ) {
					$str .= '<a class="cat-info-el cat-info-id-' . esc_attr( $category->term_id ) . '" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( $category->name ) . '">';
					$str .= esc_html( $category->name );
					$str .= '</a>';
				}
			}
		} else {

			//get name
			$primary_category_name = get_cat_name( $primary_category );

			$str .= '<a class="cat-info-el cat-info-id-' . esc_attr( $primary_category ) . '" href="' . get_category_link( $primary_category ) . '" title="' . esc_attr( $primary_category_name ) . '">';
			$str .= esc_html( $primary_category_name );
			$str .= '</a>';
		}


		$str .= '</div><!--#post cat info-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $excerpt_length
 * @param bool $display_shotrcode
 *
 * @return string
 *  render excerpt
 */
if ( ! function_exists( 'bingo_ruby_post_excerpt' ) ) {
	function bingo_ruby_post_excerpt( $excerpt_length = 20, $display_shotrcode = false ) {

		//check
		if ( empty( $excerpt_length ) ) {
			return false;
		}

		//render
		global $post;

		if ( ! empty( $post->post_excerpt ) ) {
			return '<div class="post-excerpt">' . esc_html( $post->post_excerpt ) . '</div><!--#excerpt-->';

		} else {
			$post_content = $post->post_content;
			if ( ! $display_shotrcode ) {
				$post_content = preg_replace( '`\[[^\]]*\]`', '', $post->post_content );
			}
			$post_content = stripslashes( wp_filter_nohtml_kses( $post_content ) );
			$post_content = wp_trim_words( $post_content, $excerpt_length, '' );
			if ( ! empty( $post_content ) ) {
				$post_content = $post_content . esc_html__( '...', 'bingo' );
			}

			return '<div class="post-excerpt">' . html_entity_decode( $post_content ) . '</div><!--#excerpt-->';
		}
	}
}

if ( ! function_exists( 'bingo_ruby_post_excerpt_classic' ) ) {
	function bingo_ruby_post_excerpt_classic() {

		//render
		global $post;

		$str = '';
		$str .= '<div class="post-excerpt post-excerpt-moretag clearfix entry">';
		ob_start();
		the_content( ' ' );
		$str .= ob_get_clean();
		$str .= '</div><!--#excerpt-->';

		return $str;


	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param array $override
 * @param string $meta_info_right
 * @param string $class_name
 *
 * @return string
 * render post meta info bar
 */
if ( ! function_exists( 'bingo_ruby_post_meta_info' ) ) {
	function bingo_ruby_post_meta_info( $enable_right = true, $class_name = '', $override = array() ) {

		//get options
		$meta_info_manager = bingo_ruby_core::get_option( 'post_meta_info_manager' );
		$meta_info_icon    = bingo_ruby_core::get_option( 'post_meta_info_icon' );

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
		$str .= '<div class="post-meta-info-left">';
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
		$str .= '</div><!--#post meta info left-->';

		//right meta
		if ( true === $enable_right ) {
			$str .= bingo_ruby_post_meta_info_right();
		}

		$str .= '</div><!--#post meta info-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $class_name
 *
 * @return string
 * render post meta info s
 */
if ( ! function_exists( 'bingo_ruby_post_meta_s' ) ) {
	function bingo_ruby_post_meta_s( $class_name = '' ) {

		//create classes
		$classes   = array();
		$classes[] = 'post-meta-info post-meta-s';
		if ( ! empty( $class_name ) ) {
			$classes[] = $class_name;
		}

		$classes = implode( ' ', $classes );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $classes ) . '">';
		$str .= bingo_ruby_meta_info_author();
		$str .= bingo_ruby_meta_info_date();
		$str .= '</div><!--#post meta info-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render meta date
 */
if ( ! function_exists( 'bingo_ruby_meta_info_date' ) ) {
	function bingo_ruby_meta_info_date( $meta_info_icon = false ) {

		$date_unix  = get_the_time( 'U', get_the_ID() );
		$human_time = bingo_ruby_core::get_option( 'human_time' );

		if ( ! empty( $human_time ) ) {
			$classes   = 'meta-info-el meta-info-date is-human-time';
            $text_time = '<span>' . sprintf( esc_html__( '%s ago', 'bingo' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ) . '</span>';
		} else {
			$classes   = 'meta-info-el meta-info-date';
			$text_time = get_the_date();
		}

		//render
		$str = '';
		$str .= '<span class="' . esc_attr( $classes ) . '">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="fa fa-clock-o"></i>';
		}
		$str .= '<time class="date published" datetime="' . date( DATE_W3C, $date_unix ) . '">' . $text_time . '</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $str .= '<time class="updated" datetime="' . get_the_modified_date( DATE_W3C ) . '">' . get_the_modified_date() . '</time>';
        }
		$str .= '</span><!--#meta info date-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render meta info author
 */
if ( ! function_exists( 'bingo_ruby_meta_info_author' ) ) {
	function bingo_ruby_meta_info_author( $meta_info_icon = false ) {

		//render
		$str = '';
		$str .= '<span class="meta-info-el meta-info-author vcard author">';

		if ( ! empty( $meta_info_icon ) ) {
			$str .= get_avatar( get_the_author_meta( 'user_email' ), 22, '', get_the_author_meta( 'display_name' ) );
		}

		$str .= '<a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '">';
		$str .= get_the_author_meta( 'display_name' );
		$str .= '</a>';
		$str .= '</span>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render category meta info
 */
if ( ! function_exists( 'bingo_ruby_meta_info_cat' ) ) {
	function bingo_ruby_meta_info_cat( $meta_info_icon = false, $primary = true ) {

		//check
		$categories       = get_the_category();
		$primary_category = get_post_meta( get_the_ID(), 'bingo_ruby_post_primary_category', true );

		if ( empty( $categories ) || ! array( $categories ) ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<span class="meta-info-el meta-info-cat">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="fa fa-folder-open-o" aria-hidden="true"></i>';
		}

		if ( empty( $primary_category ) || false === $primary ) {
			foreach ( $categories as $category ) {
				$str .= '<a class="info-cat-el" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( $category->name ) . '">';
				$str .= esc_html( $category->name );
				$str .= '</a>';
			}
			$str .= '</span><!--meta info category-->';
		} else {

			//get name
			$primary_category_name = get_cat_name( $primary_category );
			$str .= '<a class="info-cat-el" href="' . get_category_link( $primary_category ) . '" title="' . esc_attr( $primary_category_name ) . '">';
			$str .= esc_html( $primary_category_name );
			$str .= '</a>';

		}


		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render tag tag
 */
if ( ! function_exists( 'bingo_ruby_meta_info_tag' ) ) {
	function bingo_ruby_meta_info_tag( $meta_info_icon = false ) {

		//check
		$tags = get_the_tags();

		//render
		$str = '';
		$str .= '<span class="meta-info-el meta-info-tag">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="fa fa-tag"></i>';
		}
		if ( empty( $tags ) || ! is_array( $tags ) ) {
			$str .= '<span class="no-tags">' . esc_html__( 'No tags', 'bingo' ) . '</span>';
		} else {
			foreach ( $tags as $tag ) {
				$tag_link = get_tag_link( $tag->term_id );
				$str .= '<a class="info-tag-el" href="' . $tag_link . '" title="' . esc_attr( strip_tags( $tag->name ) ) . '">';
				$str .= esc_html( $tag->name );
				$str .= '</a>';
			}
		}
		$str .= '</span><!--#mete info tag-->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render view meta info
 */
if ( ! function_exists( 'bingo_ruby_meta_info_view' ) ) {
	function bingo_ruby_meta_info_view( $meta_info_icon = false ) {

		//check
		if ( ! function_exists( 'bingo_ruby_plugin_view_total' ) ) {
			return false;
		}

		$total_view = bingo_ruby_plugin_view_total();

		if ( empty ( $total_view ) ) {
			return false;
		}

		//render
		$str = '';
		$str .= '<span class="meta-info-el meta-info-view">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="fa fa-bolt" aria-hidden="true"></i>';
		}
		if ( 1 == $total_view ) {
			$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '">';
			$str .= esc_html__( '1 view', 'bingo' );
			$str .= '</a>';
		} else {
			$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '">';
			$str .= esc_html( $total_view ) . ' ' . esc_html__( 'views', 'bingo' );
			$str .= '</a>';
		};
		$str .= '</span><!--#meta info view-->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_info_icon
 *
 * @return string
 * render meta info comment
 */
if ( ! function_exists( 'bingo_ruby_meta_info_comment' ) ) {
	function bingo_ruby_meta_info_comment( $meta_info_icon = false ) {

		///check comment
		if ( ! comments_open() ) {
			return false;
		}
		$total_comment = get_comments_number();

		//render
		$str = '';
		$str .= '<span  class="meta-info-el meta-info-comment">';
		if ( ! empty( $meta_info_icon ) ) {
			$str .= '<i class="fa fa-comment-o"></i>';
		}
        $str .= '<a href="' . get_comments_link() . '" title="' . esc_attr( get_the_title() ) . '">';
		if ( 0 == $total_comment ) {
			$str .= esc_attr__( 'no comment', 'bingo' );
		} elseif ( 1 == $total_comment ) {
			$str .= esc_attr__( '1 comment', 'bingo' );
		} else {
            $str .= sprintf( esc_html__( '%s Comments', 'bingo' ), $total_comment );
		}
		$str .= '</a></span><!--#meta info comment-->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $class_name
 *
 * @return string
 * render post format icon
 */
if ( ! function_exists( 'bingo_ruby_post_format' ) ) {
	function bingo_ruby_post_format( $class_name = 'is-absolute', $enable_popup = false ) {

		//check options
		$post_format = bingo_ruby_core::get_option( 'post_format' );
		if ( empty( $post_format ) ) {
			return false;
		}

		$format_default = bingo_ruby_core::get_option( 'post_format_default' );
		$format_video   = bingo_ruby_core::get_option( 'post_format_video' );
		$format_gallery = bingo_ruby_core::get_option( 'post_format_gallery' );
		$format_audio   = bingo_ruby_core::get_option( 'post_format_audio' );

		$classes   = array();
		$classes[] = 'post-format-wrap';
		if ( ! empty( $class_name ) ) {
			$classes[] = $class_name;
		}

		$classes = implode( ' ', $classes );

		//render
		$str = '';

		switch ( get_post_format() ) {
			case 'video' :
				if ( ! empty( $format_video ) ) {
					$str .= '<span class="' . esc_attr( $classes ) . '">';
					$str .= '<span class="post-format is-video-format">';
					$str .= bingo_ruby_post_meta_info_media_duration();
					$str .= '</span>';
					$str .= '</span>';
				}
				break;
			case  'gallery' :
				if ( ! empty( $format_gallery ) ) {
					$str .= '<span class="' . esc_attr( $classes ) . '">';
					$str .= '<span class="post-format is-gallery-format"></span>';
					$str .= '</span>';
				}
				break;
			case 'audio' :
				if ( ! empty( $format_audio ) ) {
					$str .= '<span class="' . esc_attr( $classes ) . '">';
					$str .= '<span class="post-format is-audio-format">';
					$str .= bingo_ruby_post_meta_info_media_duration();
					$str .= '</span>';
					$str .= '</span>';
				}
				break;
			default :
				if ( ! empty( $format_default ) ) {
					$str .= '<span class="' . esc_attr( $classes ) . '">';
					$str .= '<span class="post-format is-default-format"></span>';
					$str .= '</span>';
				}
				break;
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool
 * render video duration
 */
if ( ! function_exists( 'bingo_ruby_post_meta_info_media_duration' ) ) {
	function bingo_ruby_post_meta_info_media_duration( $class_name = 'is-absolute' ) {

		$post_format    = get_post_format();
		$media_duration = '';
		$video_duration = get_post_meta( get_the_ID(), 'bingo_ruby_post_video_duration', true );
		$audio_duration = get_post_meta( get_the_ID(), 'bingo_ruby_post_audio_duration', true );

		if ( 'video' != $post_format && 'audio' != $post_format ) {
			return false;
		} else {
			if ( 'video' == $post_format && ! empty( $video_duration ) ) {
				$media_duration = $video_duration;
			};
			if ( 'audio' == $post_format && ! empty( $audio_duration ) ) {
				$media_duration = $audio_duration;
			};
		}

		//check video
		if ( empty( $video_duration ) && empty( $audio_duration ) ) {
			return false;
		}

		$classes   = array();
		$classes[] = 'post-meta-info-media-duration';
		if ( ! empty( $class_name ) ) {
			$classes[] = $class_name;
		}

		$classes = implode( ' ', $classes );
		//render
		$str = '';
		$str .= '<span class="' . esc_attr( $classes ) . '">';
		$str .= esc_html( $media_duration );
		$str .= '</span>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render page pagination as html
 */
if ( ! function_exists( 'bingo_ruby_page_pagination' ) ) {
	function bingo_ruby_page_pagination( $custom_query = null, $offset = 0 ) {
		global $wp_query, $wp_rewrite;

		if ( ! empty( $custom_query ) ) {
			$get_query = $custom_query;
		} else {
			$get_query = $wp_query;
		}

		if ( is_single() || ( $get_query->max_num_pages < 2 ) ) {
			return false;
		}

		//render pagination
		$str = '';
		$str .= '<div class="pagination-wrap clearfix">';
		$str .= '<div class="pagination-num">';
		$get_query->query_vars['paged'] > 1 ? $current = $get_query->query_vars['paged'] : $current = 1;
		$pagination = array(
			'total'     => $get_query->max_num_pages,
			'current'   => $current,
			'mid_size'  => 2,
			'prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i>',
			'next_text' => '<i class="fa fa-angle-right" aria-hidden="true"></i>',
			'type'      => 'plain'
		);
		if ( ! empty( $get_query->query_vars['s'] ) ) {
			$pagination['add_args'] = array( 's' => urlencode( get_query_var( 's' ) ) );
		}
		$str .= paginate_links( $pagination );
		$str .= '</div>';
		$str .= '<div class="pagination-text"><span>' . esc_html__( 'Page', 'bingo' ) . ' ' . esc_html( $pagination['current'] ) . esc_html__( ' of ', 'bingo' ) . esc_html( $pagination['total'] ) . '</span></div><!--#pagination text-->';
		$str .= '</div>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render post review info
 */
if ( ! function_exists( 'bingo_ruby_post_review_info' ) ) {
	function bingo_ruby_post_review_info( $class_name = 'is-absolute' ) {
		$post_id     = get_the_ID();
		$total_score = get_post_meta( $post_id, 'bingo_ruby_as', true );

		$enable_review = bingo_ruby_core::get_option( 'review_score_icon' );
		$check_review  = bingo_ruby_single_post_check_review();
		if ( false === $check_review || empty( $enable_review ) ) {
			return false;
		}

		$classes   = array();
		$classes[] = 'post-review-wrap';
		if ( ! empty( $class_name ) ) {
			$classes[] = $class_name;
		}
		$classes = implode( ' ', $classes );

		$str = '';
		$str .= '<div class="' . esc_attr( $classes ) . '">';
		$str .= '<span class="review-info-score">' . esc_attr( $total_score ) . '</span>';
		$str .= '</div><!--#post review info-->';

		return $str;

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|string
 * check smooth display
 */
if ( ! function_exists( 'bingo_ruby_check_smooth_style' ) ) {
	function bingo_ruby_check_smooth_style() {
		$site_smooth_display        = bingo_ruby_core::get_option( 'site_smooth_display' );
		$site_smooth_displays_style = bingo_ruby_core::get_option( 'site_smooth_display_style' );
		if ( ! empty( $site_smooth_display ) && ! empty( $site_smooth_displays_style ) ) {
			return $site_smooth_displays_style;
		} else {
			return false;
		}
	}
}