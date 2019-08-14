<?php
/**
 * Class bingo_ruby_fw_block_4
 */
if ( ! class_exists( 'bingo_ruby_fw_block_4' ) ) {
	class bingo_ruby_fw_block_4 extends bingo_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']                     = 'full_width';
			$block['block_classes']                  = 'fw-block fw-block-4';
			$block['block_options']['no_found_rows'] = true;
			if ( ! empty( $block['block_options']['grid_style'] ) ) {
				$block['block_classes'] = 'fw-block fw-block-4 is-grid-style-' . esc_attr( $block['block_options']['grid_style'] );
			}

			//check empty
			if ( empty( $block['block_options']['slides_per_page'] ) ) {
				$block['block_options']['slides_per_page'] = 1;
			}

			$block['block_options']['posts_per_page'] = $block['block_options']['slides_per_page'] * 5;

			//query data
			$data_query = parent::get_data( $block );

			//render
			$str = '';
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
		 * @param       $data_query
		 * @param array $options
		 *
		 * @return string
		 * render listing
		 */
		static function listing( $data_query, $options = array() ) {

			$str     = '';
			$counter = 1;
			$total   = $data_query->post_count;
			$loop    = intval( floor( $total / 5 ) );

			if ( $loop > 1 ) {
				$str .= '<div class="fw-block-4-slider-outer">';
				$str .= '<div class="slider-loader"></div>';
				$str .= '<div class="fw-block-4-slider slider-init">';
			}

			for ( $i = 1; $i <= $loop; $i ++ ) {
				$str .= '<div class="fw-block-4-slider-el">';
				while ( $data_query->have_posts() ) {
					$data_query->the_post();

					if ( 1 == $counter || 2 == $counter ) {
						$str .= '<div class="post-outer ruby-post-top col-sm-6 col-xs-12">';
						$str .= '<div class="post-outer-nth-' . esc_attr( $counter ) . '">';
						$str .= bingo_ruby_post_feat_6( $options );
						$str .= '</div>';
						$str .= '</div>';
					} else {
						if ( 3 == $counter || 4 == $counter || 5 == $counter ) {
							if ( $loop == 1 && 3 == $counter ) {
								$str .= '<div class="ruby-coll-scroll">';
							}
							$str .= '<div class="post-outer ruby-post-bottom col-sm-4 col-xs-12">';
							$str .= '<div class="post-outer-nth-' . esc_attr( $counter ) . '">';
							$str .= bingo_ruby_post_feat_4( $options );
							$str .= '</div>';
							$str .= '</div>';
							if ( $loop == 1 && 5 == $counter ) {
								$str .= '</div>';
							}
						}
					}
					if ( $counter >= 5 ) {
						//reset counter
						$counter = 1;
						break;
					} else {
						$counter ++;
					}
				}
				$str .= '</div>';
			}

			if ( $loop > 1 ) {
				$str .= '</div><!--#slider-->';
				$str .= '</div><!--#slider outer-->';
			}

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * init block options
		 */
		static function block_config() {
			return array(
				'filter' => array(
					'category_id'     => true,
					'category_ids'    => true,
					'tags'            => true,
                    'post_id'         => true,
					'post_format'     => true,
					'authors'         => true,
					'orderby'         => true,
					'slides_per_page' => 1,
					'offset'          => true
				),
				'design' => array(
					'grid_style'    => true,
					'background'    => true,
					'margin_bottom' => true,
				)
			);
		}
	}
}
