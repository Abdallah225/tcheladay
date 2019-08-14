<?php
/**
 * Class bingo_ruby_hs_block_advertising
 * render has fullwidth block code
 */
if ( ! class_exists( 'bingo_ruby_hs_block_advertising' ) ) {
	class bingo_ruby_hs_block_advertising extends bingo_ruby_block {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $block
		 *
		 * @return string
		 * render block layout
		 */
		static function render( $block ) {

			//add block data
			$block['block_type']    = 'has_sidebar';
			$block['block_classes'] = 'hs-block hs-block-ad block-ad';

			//render
			$str = '';
			$str .= parent::block_open( $block );
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

			if ( ! empty( $block['block_options']['ad_title'] ) ) {
				$str .= '<div class="ad-title"><span>' . esc_html( $block['block_options']['ad_title'] ) . '</span></div>';
			}
			$str .= '<div class="ad-wrap">';
			if ( ! empty( $block['block_options']['ad_image'] ) ) {

				if ( ! empty( $block['block_options']['ad_url'] ) ) {
					$str .= '<a href="' . esc_url( $block['block_options']['ad_url'] ) . '" target="_blank">';
					$str .= '<img src="' . esc_url( $block['block_options']['ad_image'] ) . '" alt="' . esc_attr__( 'advertising banner', 'bingo' ) . '">';
					$str .= '</a>';
				} else {
					$str .= '<img src="' . esc_url( $block['block_options']['ad_image'] ) . '" alt="' . esc_attr__( 'advertising banner', 'bingo' ) . '">';
				}
			} else {
				if ( ! empty( $block['block_options']['ad_script'] ) ) {
					$str .= html_entity_decode( stripslashes( bingo_ruby_ad_render_script( $block['block_options']['ad_script'], 'content_ad' ) ) );
				}
			}
			$str .= '</div>';

			$str .= parent::block_content_close();

			return $str;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * init block options
		 */
		static function block_config() {
			return array(
				'header'     => array(
					'ad_title' => esc_html__( '- Advertisement -', 'bingo' )
				),
				'advertising' => array(
					'ad_image'  => true,
					'ad_url'    => true,
					'ad_script' => true,
                    'margin_bottom' => true,
				)
			);
		}
	}
}
