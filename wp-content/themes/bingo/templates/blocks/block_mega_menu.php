<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * Class bingo_ruby_mega_block_cat (without child)
 */
if ( ! class_exists( 'bingo_ruby_mega_block_cat' ) ) {
	class bingo_ruby_mega_block_cat extends bingo_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {
			$text_style = bingo_ruby_core::get_option( 'mega_menu_cat_text_style' );

			//add block data
			$block['block_type']    = 'full_width';
			$block['wrap_mode']     = 'full_width';
			$block['block_classes'] = 'block-mega-menu ' . $text_style . '';

			$str        = '';
			$data_query = parent::get_data( $block );

			//render
			$str .= parent::block_open( $block, $data_query );
			$str .= self::content( $block, $data_query );
			$str .= parent::block_footer( $block );
			$str .= parent::block_close();

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block block content
		 */
		static function content( $block, $data_query ) {

			//check
			if ( empty( $block['block_options'] ) ) {
				return false;
			}

			//render
			$str = '';
			$str .= parent::block_content_open( 'row' );

			//check empty
			if ( $data_query->have_posts() ) {
				$str .= self::listing( $data_query, $block['block_options'] );
			} else {
				$str .= parent::no_content();
			}

			$str .= parent::block_content_close();

			//reset post data
			wp_reset_postdata();

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $data_query
		 * @param array $options
		 *
		 * @return string
		 * render listing
		 */
		static function listing( $data_query, $options = array() ) {

			$str = '';

			while ( $data_query->have_posts() ) {

				$data_query->the_post();

				$str .= '<div class="post-outer ruby-col-5">';
				$str .= bingo_ruby_post_grid_m2();
				$str .= '</div>';

			}

			return $str;
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * Class bingo_ruby_mega_block_cat (with child)
 */
if ( ! class_exists( 'bingo_ruby_mega_block_cat_sub' ) ) {
	class bingo_ruby_mega_block_cat_sub extends bingo_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {
			$text_style = bingo_ruby_core::get_option( 'mega_menu_cat_text_style' );
			//add block data
			$block['block_type']    = 'full_width';
			$block['wrap_mode']     = 'full_width';
			$block['block_classes'] = 'block-mega-menu block-mega-menu-sub ' . $text_style . '';

			$str = '';

			//query data
			$data_query = parent::get_data( $block );

			//render
			$str .= parent::block_open( $block, $data_query );
			$str .= self::content( $block, $data_query );
			$str .= parent::block_footer( $block );
			$str .= parent::block_close();

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block block content
		 */
		static function content( $block, $data_query ) {

			//check
			if ( empty( $block['block_options'] ) ) {
				return false;
			}

			//render
			$str = '';
			$str .= parent::block_content_open( 'row' );

			//check empty
			if ( $data_query->have_posts() ) {
				$str .= self::listing( $data_query, $block['block_options'] );
			} else {
				$str .= parent::no_content();
			}

			$str .= parent::block_content_close();

			//reset post data
			wp_reset_postdata();

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $data_query
		 * @param array $options
		 *
		 * @return string
		 * render listing
		 */
		static function listing( $data_query, $options = array() ) {

			$str = '';

			while ( $data_query->have_posts() ) {

				$data_query->the_post();

				$str .= '<div class="post-outer col-xs-3">';
				$str .= bingo_ruby_post_grid_m2();
				$str .= '</div>';

			}

			return $str;
		}
	}
}


if ( ! function_exists( 'bingo_ruby_mega_cat_setup' ) ) {
	function bingo_ruby_mega_block_cat_setup( $param = array() ) {

		$block               = array();
		$block['block_id']   = '';
		$block['block_name'] = 'bingo_ruby_mega_block_cat';

		$block['block_options'] = array();
		if ( ! empty( $param['category_id'] ) ) {
			$block['block_options']['category_id'] = $param['category_id'];
			$block['block_options']['orderby']     = 'date_post';
		}

		$block['block_options']['posts_per_page'] = '5';

		if ( ! empty( $param['item_has_children'] ) ) {
			$block['block_name']                      = 'bingo_ruby_mega_block_cat_sub';
			$block['block_options']['posts_per_page'] = '4';
		}
		if ( ! empty( $param['item_id'] ) ) {
			$block['block_id'] = 'ruby_mega_' . $param['item_id'];
		}
		if ( ! empty( $param['pagination'] ) ) {
			$block['block_options']['pagination'] = esc_attr( $param['pagination'] );
		}

		return $block;
	}
}
