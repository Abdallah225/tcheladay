<?php
/**
 * Class bingo_ruby_hs_block_17
 */
if ( ! class_exists( 'bingo_ruby_hs_block_17' ) ) {
	class bingo_ruby_hs_block_17 extends bingo_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'hs-block is-block-half hs-block-17 col-sm-6 col-xs-12 block-bg-full';

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

			$str  = '';
			$flag = true;

			while ( $data_query->have_posts() ) {

				$data_query->the_post();

				if ( true === $flag ) {
					$str .= bingo_ruby_post_overlay_1( $options );
					$flag = false;
					continue;
				} else {
					$str .= bingo_ruby_post_list_3();
				}
			}

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
					'posts_per_page' => 4,
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
					'pagination'         => array(
						'loadmore'        => false,
						'infinite_scroll' => false,
					),
				),
                'design'     => array(
                    'margin_bottom' => true,
                )
			);
		}
	}
}
