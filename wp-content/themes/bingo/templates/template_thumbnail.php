<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $size
 * @param string $class_name
 *
 * @return string
 * render post list thumbnail
 */
if ( ! function_exists( 'bingo_ruby_post_thumbnail' ) ) {
	function bingo_ruby_post_thumbnail( $size, $class_name = '' ) {

		//get config
		$ruby_holder = bingo_ruby_core::get_option( 'thumb_holder' );

		//create class
		$classes   = array();
		$classes[] = $class_name;
		$classes[] = 'post-thumb';
		$classes[] = 'is-image';
		if ( ! empty( $ruby_holder ) ) {
			$classes[] = 'ruby-holder';
		}
		$classes = implode( ' ', $classes );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $classes ) . '">';
		$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '" rel="bookmark">';
		$str .= '<span class="thumbnail-resize">';
		$str .= '<span class="thumbnail-image">' . get_the_post_thumbnail( get_the_ID(), $size ) . '</span>';
		$str .= '</span><!--#thumbnail resize-->';
		$str .= '</a>';

		//add edit link
		if ( current_user_can( 'edit_posts' ) ) {
			$str .= '<a class="post-editor" target="_blank" href="' . get_edit_post_link() . '">' . esc_html__( 'edit', 'bingo' ) . '</a>';
		}

		$str .= '</div><!--#post thumbnail-->';


		return $str;
	}
}

/**
 * @param $size
 *
 * @return string
 * render featured image in single page
 */
if ( ! function_exists( 'bingo_ruby_render_image_single' ) ) {
	function bingo_ruby_render_image_single( $size ) {

		//check single page
		if ( ! has_post_thumbnail() ) {
			return false;
		}

		//get config
		$holder = bingo_ruby_core::get_option( 'thumb_holder' );

		//create class
		$classes   = array();
		$classes[] = 'post-thumb';
		$classes[] = 'is-image';
		$classes[] = 'single-post-thumb-outer';
		if ( ! empty( $holder ) ) {
			$classes[] = 'ruby-holder';
		}
		$classes               = implode( ' ', $classes );
		$full_image_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $classes ) . '">';
		$str .= '<a href="' . $full_image_attachment[0] . '" title="' . esc_attr( get_the_title() ) . '" rel="bookmark">';
		$str .= '<span class="thumbnail-resize">';
		$str .= '<span class="thumbnail-image">' . get_the_post_thumbnail( get_the_ID(), $size ) . '</span>';
		$str .= '</span><!--#thumbnail resize-->';
		$str .= '</a>';

		$str .= '</div><!--#post thumbnail-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render post thumbnail overlay
 */
if ( ! function_exists( 'bingo_ruby_post_thumb_overlay' ) ) {
	function bingo_ruby_post_thumb_overlay() {
		return '<div class="post-thumb-overlay"></div>';
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $class_name
 *
 * @return string
 * bingo_ruby_post_popup_thumbnail_gallery_slider
 */
if ( ! function_exists( 'bingo_ruby_post_popup_thumbnail_gallery_slider' ) ) {
	function bingo_ruby_post_popup_thumbnail_gallery_slider( $class_name = '' ) {

		$size     = 'bingo_ruby_crop_1200x750';
		$size_nav = 'bingo_ruby_crop_540x370';
		$gallery  = get_post_meta( get_the_ID(), 'bingo_ruby_post_gallery_data', false );

		//create class
		$classes   = array();
		$classes[] = $class_name;
		$classes[] = 'post-thumb popup-post-gallery-slider-outer';
		$classes[] = 'is-gallery is-slider';
		$classes   = implode( ' ', $classes );

		//render
		$str = '';
		$str .= '<div class="' . esc_attr( $classes ) . '">';
		$str .= '<div class="popup-post-gallery-slider">';
		foreach ( $gallery as $gallery_id ) {
			if ( ! empty( $gallery_id ) ) {
				$image_attachment = wp_get_attachment_image_src( $gallery_id, $size );
				$caption          = get_post_field( 'post_excerpt', $gallery_id );
				$str .= '<div class="popup-post-gallery-slider-el">';
				$str .= '<div class="popup-post-gallery-slider-image" style="background-image:url(' . esc_url( $image_attachment[0] ) . ')"></div>';
				if ( ! empty( $caption ) ) {
					$str .= '<span class="thumb-caption">' . esc_html( $caption ) . '</span>';
				}
				$str .= '</div>';
			}
		}
		$str .= '</div><!--#slider-->';

		//slider nav
		$str .= '<div class="popup-gallery-slider-nav slider-nav">';
		foreach ( $gallery as $gallery_id ) {
			if ( ! empty( $gallery_id ) ) {
				$image_attachment_nav = wp_get_attachment_image_src( $gallery_id, $size_nav );
				$str .= '<div class="popup-gallery-slider-nav-el">';
				$str .= '<div class="popup-post-gallery-slider-image popup-post-gallery-slider-image-nav" style="background-image:url(' . esc_url( $image_attachment_nav[0] ) . ')"></div>';
				$str .= '</div>';
			}
		}
		$str .= '</div><!--#slider nav-->';
		$str .= '</div><!--#post thumbnail-->';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render thumbnail for post popup gallery
 */
if ( ! function_exists( 'bingo_ruby_post_popup_thumbnail_image' ) ) {
	function bingo_ruby_post_popup_thumbnail_image() {

		$size             = 'bingo_ruby_370x250';
		$image_id         = get_post_thumbnail_id();
		$caption          = get_post_field( 'post_excerpt', $image_id );
		$image_attachment = wp_get_attachment_image_src( $image_id, $size );

		$str = '';
		$str .= '<div class="post-thumb">';
		$str .= '<a href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '" rel="bookmark">';
		$str .= '<span class="popup-post-featured-image" style="background-image:url(' . esc_url( $image_attachment[0] ) . ')"></span>';
		$str .= '</a>';
		$str .= '</div>';
		if ( ! empty( $caption ) ) {
			$str .= '<span class="thumb-caption">' . esc_html( $caption ) . '</span>';
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed
 *
 * render post classic thumbnail gallery
 */
if ( ! function_exists( 'bingo_ruby_post_thumbnail_gallery' ) ) {
	function bingo_ruby_post_thumbnail_gallery( $size = '', $class_name = '' ) {
		$gallery_type = get_post_meta( get_the_ID(), 'bingo_ruby_post_gallery_type', true );
		$enable_popup = bingo_ruby_core::get_option( 'show_thumbnail_gallery_popup' );
		$unique_id    = uniqid();

		//render
		$str = '';
		if ( 'slider' == $gallery_type ) {
			$str .= bingo_ruby_post_thumbnail_gallery_slider( $size, $class_name, $unique_id );
		} else {
			$str .= bingo_ruby_post_thumbnail_gallery_grid( $size, $class_name, $unique_id );
		}

		//render popup for gallery
		if ( ! empty( $enable_popup ) ) {
			$str .= bingo_ruby_post_thumbnail_gallery_popup( $unique_id );
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $class_name
 * render thumbnail gallery
 */
if ( ! function_exists( 'bingo_ruby_post_thumbnail_gallery_slider' ) ) {
	function bingo_ruby_post_thumbnail_gallery_slider( $size, $class_name, $unique_id ) {

		//get and check data
		$data_gallery = get_post_meta( get_the_ID(), 'bingo_ruby_post_gallery_data', false );
		if ( empty( $data_gallery ) || ! is_array( $data_gallery ) ) {
			return false;
		}

		$enable_popup = bingo_ruby_core::get_option( 'show_thumbnail_gallery_popup' );

		//check size
		if ( empty( $size ) ) {
			$size = 'bingo_ruby_crop_750x450';
		}

		//create class name
		$classes   = array();
		$classes[] = 'post-thumb-outer post-thumb-gallery-outer is-gallery is-slider';
		if ( ! empty( $class_name ) ) {
			$classes[] = $class_name;
		}
		$classes = implode( ' ', $classes );

		//render
		$str     = '';
		$counter = 1;

		$str .= '<div class="' . esc_attr( $classes ) . '">';
		$str .= '<div class="slider-loader"></div>';
		$str .= '<div class="post-thumb post-thumb-gallery-slider slider-init">';
		foreach ( $data_gallery as $image_id ) {

			$image_caption = get_post_field( 'post_excerpt', $image_id );

			if ( ! empty( $enable_popup ) ) {
				$str .= '<div class="post-thumb-gallery-slider-el ruby-thumb-galley-popup" data-post_index="' . esc_attr( $counter - 1 ) . '" data-effect="mpf-ruby-effect" data-mfp-src="#ruby-thumbnail-popup-gallery-' . esc_attr( $unique_id ) . '">';
			} else {
				$str .= '<div class="post-thumb-gallery-slider-el">';
				$str .= '<a class="post-link-absolute" href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '" rel="bookmark"></a>';
			}
			$str .= wp_get_attachment_image( $image_id, $size );
			if ( ! empty( $image_caption ) ) {
				$str .= '<span class="thumb-caption">' . esc_attr( $image_caption ) . '</span>';
			}
			$str .= '</div>';
			$counter ++;
		}

		$str .= '</div>';
		$str .= '</div>';

		return $str;

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $size
 * @param $class_name
 *
 * @return string
 *
 * render post classic thumbnail gallery grid
 */
if ( ! function_exists( 'bingo_ruby_post_thumbnail_gallery_grid' ) ) {
	function bingo_ruby_post_thumbnail_gallery_grid( $size, $class_name, $unique_id ) {

		//get and check data
		$data_gallery = get_post_meta( get_the_ID(), 'bingo_ruby_post_gallery_data', false );
		if ( empty( $data_gallery ) || ! is_array( $data_gallery ) ) {
			return false;
		}

		//enable popup
		$enable_popup = bingo_ruby_core::get_option( 'show_thumbnail_gallery_popup' );

		//check size
		if ( empty( $size ) ) {
			$size = 'bingo_ruby_crop_540x540';
		}

		//create class name
		$classes   = array();
		$classes[] = 'post-thumb-outer post-thumb-gallery-outer is-gallery is-grid';
		if ( ! empty( $class_name ) ) {
			$classes[] = $class_name;
		}
		$classes = implode( ' ', $classes );

		//render
		$str     = '';
		$counter = 1;

		$str .= '<div class="' . esc_attr( $classes ) . '">';
		$str .= '<div class="slider-loader"></div>';
		$str .= '<div class="post-thumb post-thumb-gallery-grid slider-init">';

		foreach ( $data_gallery as $image_id ) {
			if ( ! empty( $enable_popup ) ) {
				$str .= '<div class="post-thumb-gallery-grid-el ruby-thumb-galley-popup" data-post_index="' . esc_attr( $counter - 1 ) . '" data-effect="mpf-ruby-effect" data-mfp-src="#ruby-thumbnail-popup-gallery-' . $unique_id . '">';
			} else {
				$str .= '<div class="post-thumb-gallery-grid-el">';
				$str .= '<a class="post-link-absolute" href="' . get_permalink() . '" title="' . esc_attr( get_the_title() ) . '" rel="bookmark"></a>';
			}
			$str .= wp_get_attachment_image( $image_id, $size );
			$str .= '</div>';
			$counter ++;
		}

		$str .= '</div>';
		$str .= '</div><!--#thumbnail outer-->';

		return $str;

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool
 * slider popup when click on gallery post
 */
if ( ! function_exists( 'bingo_ruby_post_thumbnail_gallery_popup' ) ) {
	function bingo_ruby_post_thumbnail_gallery_popup( $unique_id ) {

		$post_id = get_the_ID();
		//get and check data
		$data_gallery = get_post_meta( $post_id, 'bingo_ruby_post_gallery_data', false );
		if ( empty( $data_gallery ) || ! is_array( $data_gallery ) ) {
			return false;
		}

		//nav size
		$size_nav = 'bingo_ruby_crop_540x370';

		$str = '';
		$str .= '<div id="ruby-thumbnail-popup-gallery-' . esc_attr( $unique_id ) . '" class="popup-thumbnail-slider-outer mfp-hide mfp-animation">';
		$str .= '<div class="popup-thumbnail-slider-holder">';
		$str .= '<div class="popup-thumbnail-slider-inner">';
		//slider loader
		$str .= '<div class="slider-loader"></div>';

		$str .= '<div class="popup-thumbnail-slider slider-init">';
		foreach ( $data_gallery as $image_id ) {

			$image_caption = get_post_field( 'post_excerpt', $image_id );

			$str .= '<div class="popup-thumbnail-slider-el">';
			$str .= '<div class="popup-thumbnail-slider-image-holder">';
			$str .= '<div class="popup-thumbnail-slider-image">';
			$str .= wp_get_attachment_image( $image_id, 'full' );
			if ( ! empty( $image_caption ) ) {
				$str .= '<span class="thumb-caption">' . esc_attr( $image_caption ) . '</span>';
			}
			$str .= '</div>';
			$str .= '</div>';
			$str .= '</div>';
		}

		$str .= '</div><!--#popup slider-->';

		$str .= '<div class="popup-thumbnail-slider-nav slider-nav slider-init">';
		foreach ( $data_gallery as $image_id ) {
			$str .= '<div class="popup-thumbnail-slider-nav-el">';
			$str .= wp_get_attachment_image( $image_id, $size_nav );
			$str .= '</div>';
		}
		$str .= '</div><!--#popup slider nav-->';
		$str .= '</div><!--#popup slider inner-->';
		$str .= '</div><!--#popup slider holder-->';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $unique_id
 *
 * @return string
 * render post thumbnail popup video
 */
if ( ! function_exists( 'bingo_ruby_post_thumbnail_video_popup' ) ) {
	function bingo_ruby_post_thumbnail_video_popup() {

		$enable_popup = bingo_ruby_core::get_option( 'show_thumbnail_video_popup' );
		$post_format  = get_post_format();

		if ( empty( $enable_popup ) || 'video' != $post_format ) {
			return false;
		}

		$str = '';
		$str .= '<div class="popup-thumbnail-video-outer mfp-hide mfp-animation">';
		$str .= '<div class="popup-thumbnail-video-holder">';
		$str .= '<div class="popup-thumbnail-video-inner post-thumb-outer post-thumb-video-outer">';
		$str .= '<div class="post-thumb iframe-video">';
		$str .= bingo_ruby_iframe_video();
		$str .= '</div>';
		$str .= '<div class="post-header">';
		$str .= bingo_ruby_post_title( 'is-size-2' );
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		return $str;

	}
}