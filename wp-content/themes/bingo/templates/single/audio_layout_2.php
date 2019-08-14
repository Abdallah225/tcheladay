<?php
/**-------------------------------------------------------------------------------------------------------------------------
 *
 * @return string
 * render single post audio layout 2
 */
if ( ! function_exists( 'bingo_ruby_render_single_post_audio_2' ) ) {
	function bingo_ruby_render_single_post_audio_2() {
		$author_position               = bingo_ruby_single_post_check_author_position();
		$sidebar_name                  = bingo_ruby_single_check_sidebar_name();
		$sidebar_position              = bingo_ruby_single_check_sidebar_position();
		$review                        = bingo_ruby_single_post_check_review();
		$bingo_ruby_author_social_data = bingo_ruby_social_profile_author( get_the_author_meta( 'ID' ) );
		$bingo_ruby_render_social      = bingo_ruby_render_social_icon( $bingo_ruby_author_social_data, false, true );
		$bingo_ruby_author_decs        = get_the_author_meta( 'description' );
		$class_name                    = 'single-post-wrap single-post-format-2 single-post-audio-2';

		$str = '';
		//render
		$str .= bingo_ruby_page_open( $class_name, $review );
		$str .= bingo_ruby_page_open_inner( 'single-wrap is-author-' . esc_attr( $author_position ) . '', $sidebar_position );

		//render breadcrumb
		$str .= bingo_ruby_dimox_breadcrumb( true );

		$str .= bingo_ruby_page_content_open( 'single-inner', $sidebar_position );
		$str .= bingo_ruby_single_post_audio_classic();

		$str .= '<div class="single-post-content-outer single-box">';

		//render single entry
		$str .= '<div class="single-post-header">';
		$str .= bingo_ruby_post_cat_info();
		$str .= bingo_ruby_single_post_title();
		$str .= bingo_ruby_single_post_subtitle();
		$str .= bingo_ruby_single_post_meta_info();
		$str .= '</div><!--#single post header-->';

		// render single add top
		$str .= bingo_ruby_single_post_ad_top();

		$str .= bingo_ruby_single_post_action();

		//body
		$str .= '<div class="single-post-body">';

		if ( $author_position == 'top' && ( ! empty( $bingo_ruby_author_decs ) || ! empty( $bingo_ruby_render_social ) ) ) {
			$str .= '<div class="single-post-right">';
		}
		$str .= '<div class="single-content-wrap">';
		$str .= '<div class="single-entry-wrap">';
		$str .= bingo_ruby_single_post_entry();
        // render single add bottom
        $str .= bingo_ruby_single_post_ad_bottom();
		$str .= '</div><!--#single entry wrap-->';
        $str .= bingo_ruby_single_post_tag();
		if ( function_exists( 'bingo_ruby_plugin_social_like' ) ) {
			$str .= bingo_ruby_plugin_social_like();
		}
		if ( function_exists( 'bingo_ruby_plugin_share_big' ) ) {
			$str .= bingo_ruby_plugin_share_big();
		}
		$str .= bingo_ruby_single_comment();
		$str .= '</div><!--#single content wrap -->';

		if ( $author_position == 'top' && ( ! empty( $bingo_ruby_author_decs ) || ! empty( $bingo_ruby_render_social ) ) ) {
			$str .= '</div><!--#single post right -->';
			$str .= '<div class="single-post-left">';
			$str .= bingo_ruby_single_post_box_author( $author_position );
			$str .= '</div><!--#single post left -->';
		}
		$str .= bingo_ruby_single_post_schema_markup();
		$str .= '</div><!--#single post body -->';

		$str .= '</div><!--#single post content outer -->';

		$str .= '<div class="single-post-box-outer">';
		if ( $author_position == 'bottom' && ( ! empty( $bingo_ruby_author_decs ) || ! empty( $bingo_ruby_render_social ) ) ) {
			$str .= '<div class="single-box single-box-author">';
			$str .= bingo_ruby_single_post_box_author( $author_position );
			$str .= '</div>';
		}
		//render single box nav
		$str .= bingo_ruby_single_post_box_nav();
		// render widget section
		$str .= bingo_ruby_single_post_widget_section();
		//render single related
		$str .= bingo_ruby_single_post_box_related();
		$str .= '</div><!--#single post box outer -->';

		$str .= bingo_ruby_page_content_close();

		//render sidebar
		if ( 'none' != $sidebar_position ) {
			$str .= bingo_ruby_page_sidebar( $sidebar_name, true );
		}

		$str .= bingo_ruby_page_close_inner();
		$str .= bingo_ruby_page_close();

		return $str;
	}
}
