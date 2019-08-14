<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $sidebar_position
 *
 * @return string
 * render related video for single post
 */
if ( ! function_exists( 'bingo_ruby_single_post_video_related' ) ) {
	function bingo_ruby_single_post_video_related( $sidebar_position = '' ) {

		$related_video = bingo_ruby_single_post_check_related_video();
		$title         = bingo_ruby_core::get_option( 'single_post_box_related_video_title' );

		if ( empty( $related_video ) ) {
			return false;
		}

		$str                        = '';
		$options                    = array();
		$options['related_post_id'] = get_the_ID();

		$options['posts_per_page'] = 3;
		if ( empty( $sidebar_position ) || 'none' == $sidebar_position ) {
			$options['posts_per_page'] = 5;
		}

		$data_query = bingo_ruby_related_video_get( $options );
		if ( empty( $data_query->max_num_pages ) ) {
			return false;
		}
		$options['related_page_max'] = $data_query->max_num_pages;

		$str .= '<div class="ruby-container single-post-box-related-video">';
		$str .= '<div class="box-related-video-wrap is-light-text">';

		//render header
		$str .= '<div class="box-related-video-header">';
		$str .= '<div class="widget-title block-title">';
		$str .= '<h3>' . esc_html( $title ) . '</h3>';
		$str .= '</div>';
		$str .= '</div>';

		//render content
		$str .= '<div class="box-related-content block-content-wrap row">';
		$str .= '<div class="block-content-inner clearfix">';
		$str .= bingo_ruby_related_video_listing( $data_query, $options );
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		//reset post data
		wp_reset_postdata();

		return $str;

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 *
 * @return string
 * render related video listing
 */
if ( ! function_exists( 'bingo_ruby_related_video_listing' ) ) {
	function bingo_ruby_related_video_listing( $data_query, $options ) {

		//check
		$data_layout = bingo_ruby_single_post_check_layout();

		if ( $data_layout['layout'] == '2' ) {
			$class_name = 'related-video-2';
		} elseif ( $data_layout['layout'] == '3' ) {
			$class_name = 'related-video-3';
		} else {
			$class_name = 'related-video-1';
		}

		$str = '';
		$str .= '<div class="related-video-slider-outer">';
		$str .= '<div class="slider-loader"></div>';
		$str .= '<div class="related-video-slider ' . $class_name . ' slider-init">';
		while ( $data_query->have_posts() ) {
			$data_query->the_post();
			$str .= '<div class="post-oute">';
			$str .= bingo_ruby_post_feat_5( $options );
			$str .= '</div><!--#post outer-->';
		}
		$str .= '</div><!--#slider-->';
		$str .= '</div><!--#slider outer-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|int|string
 * check video related
 */
if ( ! function_exists( 'bingo_ruby_single_post_check_related_video' ) ) {
	function bingo_ruby_single_post_check_related_video() {
		$video_related = get_post_meta( get_the_ID(), 'bingo_ruby_meta_post_video_related', true );
		if ( empty( $video_related ) || 'default' == $video_related ) {
			return bingo_ruby_core::get_option( 'single_post_box_related_video' );
		} else {
			if ( 1 == $video_related ) {
				return 1;
			} else {
				return false;
			}
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param array $options
 * @param int $paged
 *
 * @return bool|WP_Query
 * get video related data
 */
if ( ! function_exists( 'bingo_ruby_related_video_get' ) ) {
	function bingo_ruby_related_video_get( $options = array(), $paged = 1 ) {

		$where = bingo_ruby_core::get_option( 'single_post_box_related_video_where' );

		if ( empty( $options['related_post_id'] ) ) {
			$post_id = get_the_ID();
		} else {
			$post_id = $options['related_post_id'];
		}

		$data_cat = get_the_category( $post_id );
		$data_tag = get_the_tags( $post_id );

		//set query
		$param                     = array();
		$param['category_ids']     = '';
		$param['tags']             = '';
		$param['where']            = $where;
		$param['post_not_in']      = $post_id;
		$param['post_format']      = 'video';
		$options['posts_per_page'] = bingo_ruby_core::get_option( 'single_post_box_related_video_num' );

		if ( ! empty( $options['posts_per_page'] ) ) {
			$param['posts_per_page'] = $options['posts_per_page'];
		} else {
			$param['posts_per_page'] = 3;
		}

		//get cat
		if ( ! empty( $data_cat ) ) {
			$cat_id = array();
			foreach ( $data_cat as $category ) {
				$cat_id[] = $category->term_id;
			}
			$param['category_ids'] = implode( ',', $cat_id );
		}

		//get cat
		if ( ! empty( $data_tag ) ) {
			$tag_name = array();
			foreach ( $data_tag as $tag ) {
				$tag_name[] = $tag->slug;
			}
			$param['tags'] = implode( ',', $tag_name );
		}

		//get query
		$data_query = bingo_ruby_query::get_related( $param, $paged );

		return $data_query;
	}
}