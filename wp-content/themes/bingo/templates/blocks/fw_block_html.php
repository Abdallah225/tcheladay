<?php
/**
 * Class bingo_ruby_fw_block_html
 * render has fullwidth block custom html
 */
if ( ! class_exists( 'bingo_ruby_fw_block_html' ) ) {
	class bingo_ruby_fw_block_html extends bingo_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'full_width';
			$block['block_classes'] = 'fw-block fw-block-html';

			//render
			$str = '';
			$str .= parent::block_open( $block );
			$str .= parent::block_header( $block );
			$str .= self::content( $block );
			$str .= parent::block_close();

			return $str;
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block block content
		 */
		static function content( $block ) {

			//render
			$str = '';

			$str .= parent::block_content_open();

			if ( ! empty( $block['block_options']['custom_html'] ) ) {
				$str .= '<div class="entry clearfix">';

				//render html
				$content = html_entity_decode( stripslashes( $block['block_options']['custom_html'] ) );

				$str .= $content;
				$str .= '</div>';
			}

			$str .= parent::block_content_close();

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * init block options
		 */
		static function block_config() {
			return array(
				'general' => array(
					'title'        => esc_html__( 'custom html', 'bingo' ),
					'title_url'    => true,
					'header_color' => true,
					'custom_html'  => true,
				),
				'design'  => array(
					'wrap_mode'  => true,
					'background' => true,
                    'margin_bottom' => true,
				)
			);
		}
	}
}
