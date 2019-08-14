<?php
/**
 * Class bingo_ruby_hs_block_32
 */
if ( ! class_exists( 'bingo_ruby_hs_block_32' ) ) {
	class bingo_ruby_hs_block_32 extends bingo_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'hs-block hs-block-32';

			//query data
			$data_query = parent::get_data( $block );

			//render
			$str = '';
			$str .= parent::block_open( $block, $data_query );
			$str .= parent::block_header( $block );
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
			$str .= parent::block_content_open();

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

			$str     = '';
			$counter = 1;

			$str .= '<div class="block-content-holder">';
			while ( $data_query->have_posts() ) {

				$data_query->the_post();

				if ( 1 == $counter % 5 ) {
					$str .= '<div class="post-outer col-xs-12">';
					$str .= bingo_ruby_post_classic_2( $options );
					$str .= '</div><!--#post outer-->';
				} else {
					$str .= '<div class="post-outer col-sm-6 col-xs-12">';
					$str .= bingo_ruby_post_grid_1( $options );
					$str .= '</div><!--post outer-->';
				}

				$counter ++;
			}

			$str .= '</div><!--#block content holder-->';

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * init block options
		 */
		static function block_config() {
			return array(
				'filter'     => array(
					'category_id'    => true,
					'category_ids'   => true,
					'tags'           => true,
                    'post_id'        => true,
					'post_format'    => true,
					'authors'        => true,
					'orderby'        => true,
					'posts_per_page' => 5,
					'offset'         => true
				),
				'header'     => array(
					'title'        => esc_html__( 'latest posts', 'bingo' ),
					'title_url'    => true,
					'header_color' => true
				),
				'pagination' => array(
					'ajax_dropdown'      => true,
					'ajax_dropdown_id'   => true,
					'ajax_dropdown_text' => true,
					'pagination'         => array(),
				),
				'design'     => array(
					'excerpt'         => 20,
					'summary_type'    => true,
					'excerpt_classic' => 60,
					'block_style'     => true,
                    'margin_bottom' => true,
				)
			);
		}
	}
}
