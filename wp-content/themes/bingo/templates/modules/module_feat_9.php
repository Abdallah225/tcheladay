<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * bingo_ruby_post_feat_9
 */
if ( ! function_exists( 'bingo_ruby_post_feat_9' ) ) {
	function bingo_ruby_post_feat_9( $options = array() ) {

		$str = '';
		$str .= '<article class="post-wrap post-feat-3">';

		if ( has_post_thumbnail() ) {
            $str .= '<div class="post-thumb-outer">';
			$str .= bingo_ruby_post_thumb_overlay();
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_1200x750','is-bg-thumb');
            $str .= bingo_ruby_post_format('is-big-icon is-absolute is-top-format');
            $str .= bingo_ruby_post_review_info( 'is-absolute is-big-review' );
            $str .= '</div>';
		} else {
            $str .= '<div class="post-thumb-outer post-no-thumb"></div>';
        }

		$str .= '<div class="post-header-outer is-header-overlay is-absolute is-light-text">';
		$str .= '<div class="post-header">';
		$str .= bingo_ruby_post_cat_info( 'is-light-text' );
		$str .= bingo_ruby_post_title( 'is-size-1' );
		$str .= bingo_ruby_post_meta_info( false);
		$str .= '</div><!--#post header-->';
		$str .= '</div>';

		$str .= '</article>';

		return $str;
	}
}

