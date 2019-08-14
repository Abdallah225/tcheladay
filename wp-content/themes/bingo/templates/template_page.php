<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $meta_cat
 *
 * @return string
 * render header category page
 */
if ( ! function_exists( 'bingo_ruby_render_page_header_category' ) ) {
	function bingo_ruby_render_page_header_category( $meta_cat ) {

		$cat_id    = bingo_ruby_core::get_page_cat_id();
		$header_bg = array();

		//get blog options
		$cat_name = get_cat_name( $cat_id );
		$cat_desc = category_description();
		if ( ! empty( $meta_cat['bingo_ruby_cat_bg'] ) ) {
			$header_bg['url'] = $meta_cat['bingo_ruby_cat_bg'];
		} else {
			$header_bg = bingo_ruby_core::get_option( 'category_header_background' );
		}

		//render
		$str = '';
		$str .= bingo_ruby_dimox_breadcrumb();
		if ( ! empty( $header_bg['url'] ) ) {
			$str .= '<div class="archive-page-header is-light-text has-bg-image" style="background-image: url(' . esc_url( $header_bg['url'] ) . ')">';
		} else {
			$str .= '<div class="archive-page-header">';
		};
		$str .= '<div class="archive-page-header-inner ruby-container">';
		$str .= '<h1 class="archive-title">';
		$str .= esc_attr( $cat_name );
		$str .= '</h1>';
		if ( ! empty( $cat_desc ) ) {
			$str .= '<div class="archive-desc">';
			$str .= html_entity_decode( esc_html( $cat_desc ) );
			$str .= '</div>';
		}

		$str .= '</div>';
		$str .= '</div><!--category header inner-->';
		$str .= '</div><!--category header-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render search header page
 */
if ( ! function_exists( 'bingo_ruby_render_page_header_search' ) ) {
	function bingo_ruby_render_page_header_search() {
		$search_title = get_search_query();

		$str          = '';
		$str .= '<div class="search-page-header">';
		$str .= '<div class="search-page-header-inner">';
		$str .= '<div class="search-decs"><span>' . esc_html__( 'search result for:', 'bingo' ) . '</span></div>';
		$str .= '<span>' . esc_html( $search_title ) . '</span>';
		$str .= '</div>';
		$str .= '</div>';

		return $str;

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render header archive page
 */
if ( ! function_exists( 'bingo_ruby_render_header_page_archive' ) ) {
	function bingo_ruby_render_header_page_archive() {

		//get blog options
		$archive_name = bingo_ruby_render_archive_title();
		$header_bg    = bingo_ruby_core::get_option( 'archive_header_background' );
        $tag_desc = tag_description();

		//render
		$str = '';
		if ( ! empty( $header_bg['url'] ) ) {
			$str .= '<div class="archive-page-header is-light-text has-bg-image" style="background-image: url(' . esc_url( $header_bg['url'] ) . '">';
		} else {
			$str .= '<div class="archive-page-header">';
		};
		$str .= '<div class="archive-page-header-inner ruby-container">';
		$str .= '<div class="archive-title-wrap">';
		$str .= '<h1 class="archive-title">';
        $str .= '<span class="page-subtitle">' . esc_html__( 'archive', 'bingo' ) . '</span>';
		$str .= esc_attr( $archive_name );
		$str .= '</h1>';
        if ( ! empty( $tag_desc ) ) {
            $str .= '<div class="archive-desc">' . html_entity_decode( esc_html( $tag_desc ) ) . '</div>';
        }
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div><!--archive header-->';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render archive title
 */
if ( ! function_exists( 'bingo_ruby_render_archive_title' ) ) {
	function bingo_ruby_render_archive_title() {

		if ( is_category() ) :
			return single_cat_title( '', false );
		elseif ( is_tag() ) :
			return single_tag_title( '', false );
		elseif ( is_author() ) :
			return get_the_author();
		elseif ( is_day() ) :
			return get_the_date();
		elseif ( is_month() ) :
			return get_the_date( 'F Y' );
		elseif ( is_year() ) :
			return get_the_date( 'Y' );
		elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
			return esc_html__( 'Asides', 'bingo' );
		elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
			return esc_html__( 'Galleries', 'bingo' );
		elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
			return esc_html__( 'Images', 'bingo' );
		elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
			return esc_html__( 'Videos', 'bingo' );
		elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
			return esc_html__( 'Quotes', 'bingo' );
		elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
			return esc_html__( 'Links', 'bingo' );
		elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
			return esc_html__( 'Statuses', 'bingo' );
		elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
			return esc_html__( 'Audios', 'bingo' );
		elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
			return esc_html__( 'Chats', 'bingo' );
		else :
			return esc_html__( 'Archives', 'bingo' );
		endif;
	}

}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render page box author
 */
if ( ! function_exists( 'bingo_ruby_page_box_author' ) ) {
	function bingo_ruby_page_box_author() {

		//check settings
		$bingo_ruby_single_post_box_author = bingo_ruby_core::get_option( 'single_post_box_author' );
		if ( empty( $bingo_ruby_single_post_box_author ) && is_single() ) {
			return false;
		}

		$bingo_ruby_author_id          = get_the_author_meta( 'ID' );
		$bingo_ruby_author_name        = get_the_author_meta( 'display_name' );
		$bingo_ruby_author_job         = '';
		$bingo_ruby_author_decs        = get_the_author_meta( 'description' );
		$bingo_ruby_author_social_data = bingo_ruby_social_profile_author( $bingo_ruby_author_id );
		$bingo_ruby_render_social      = bingo_ruby_render_social_icon( $bingo_ruby_author_social_data, false, true );

		if ( ! empty( $bingo_ruby_author_social_data['job'] ) ) {
			$bingo_ruby_author_job = $bingo_ruby_author_social_data['job'];
		}
		if ( ! empty( $bingo_ruby_author_social_data['description'] ) ) {
			$bingo_ruby_author_decs = $bingo_ruby_author_social_data['description'];
		}
		$str = '';
		$str .= '<div class="single-author-wrap author-page-wrap">';
		$str .= '<div class="single-author-inner clearfix">';
		$str .= '<div class="author-thumb-wrap">';
		$str .= get_avatar( get_the_author_meta( 'user_email' ), 140, '', $bingo_ruby_author_name );
		$str .= '</div><!--#author thumb -->';
		$str .= '<div class="author-content-wrap">';
		$str .= '<div class="author-title post-title">';
		$str .= '<a href="' . get_author_posts_url( $bingo_ruby_author_id ) . '">';
		$str .= '<h3>' . esc_html( $bingo_ruby_author_name, 'bingo' ) . '</h3>';
		$str .= '</a>';
		if ( ! empty( $bingo_ruby_author_job ) ) {
			$str .= '<span class="author-job">' . esc_html( $bingo_ruby_author_job, 'bingo' ) . '</span>';
		}
		$str .= '</div><!--#author title -->';
		if ( ! empty( $bingo_ruby_author_decs ) ) {
			$str .= '<div class="author-description">' . $bingo_ruby_author_decs . '</div>';
		}
		if ( ! empty( $bingo_ruby_render_social ) ) {
			$str .= '<div class="author-social social-tooltips">' . $bingo_ruby_render_social . '</div>';
		}
		$str .= '</div><!--#author content wrap -->';

		$str .= '</div><!--#author inner -->';
		$str .= '</div><!--#author box wrap -->';

		return $str;
	}
}
