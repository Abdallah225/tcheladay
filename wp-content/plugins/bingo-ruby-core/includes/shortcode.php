<?php

if ( ! class_exists( 'bingo_ruby_plugin_shortcode' ) ) {
	class bingo_ruby_plugin_shortcode {

		protected static $instance = null;

		//init
		function __construct() {

			//add shortcodes
			add_shortcode( 'button', array( $this, 'shortcode_button' ) );
			add_shortcode( 'dropcap', array( $this, 'shortcode_dropcap' ) );
			add_shortcode( 'accordion', array( $this, 'shortcode_accordion_group' ) );
			add_shortcode( 'accordion-item', array( $this, 'ruby_accordion_item' ) );
			add_shortcode( 'row', array( $this, 'shortcode_row' ) );
			add_shortcode( 'column', array( $this, 'shortcode_column' ) );

			//add author
			add_filter( 'user_contactmethods', array( $this, 'additional_author_info' ) );

		}

		static function get_instance() {

			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param null $content
		 *
		 * @return string
		 */
		static function shortcodes_helper( $content = null ) {
			$content = do_shortcode( shortcode_unautop( $content ) );
			$content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
			$content = preg_replace( '#<br \/>#', '', $content );

			return trim( $content );
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $attrs
		 * @param null $content
		 *
		 * @return string
		 * button shortcode
		 */
		static function shortcode_button( $attrs, $content = null ) {
			extract( shortcode_atts( array(
				'type'   => '',
				'color'  => '',
				'target' => '',
				'link'   => ''
			), $attrs ) );

			$classes      = array();
			$style_inline = '';
			$str          = '';

			$classes[] = 'btn shortcode-btn';
			if ( ! empty( $type ) ) {
				$classes[] = 'is-' . strip_tags( $type );
			} else {
				$classes[] = 'is-default';
			}

			if ( ! empty( $color ) ) {
				$style_inline = 'style="background-color: ' . strip_tags( $color ) . '"';
			}

			if ( ! empty( $link ) ) {
				$link = esc_url( $link );
			} else {
				$link = '#';
			}

			if ( ! empty( $target ) ) {
				$target = 'target="_blank"';
			} else {
				$target = '';
			}

			$classes = implode( ' ', $classes );

			$str .= '<a class="' . $classes . '" ' . $style_inline . ' ' . $target . ' href="' . $link . '">';
			$str .= esc_attr( $content );
			$str .= '</a>';

			return $str;

		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $attrs
		 * @param null $content
		 *
		 * @return string
		 * dropcap shortcode
		 */
		static function shortcode_dropcap( $attrs, $content = null ) {
			extract( shortcode_atts( array(
				'type' => '',
			), $attrs ) );

			$classes   = array();
			$classes[] = 'shortcode-dropcap';

			if ( empty( $type ) ) {
				$classes[] = 'is-default';
			} else {
				$classes[] = 'is-' . esc_attr( $type );
			}

			$classes = implode( ' ', $classes );

			return '<span class="' . esc_attr( $classes ) . '">' . $content . '</span>';
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $attrs
		 * @param null $content
		 *
		 * @return string
		 * accordion shortcode
		 */
		static function shortcode_accordion_group( $attrs, $content = null ) {
			return '<div class="shortcode-accordion">' . self::shortcodes_helper( $content ) . ' </div>';
		}


		static function ruby_accordion_item( $attrs, $content = null ) {
			extract( shortcode_atts( array(
				'title' => '',
			), $attrs ) );

			if ( empty( $title ) ) {
				$title = '';
			}

			$str = '';
			$str .= '<h3 class="accordion-item-title">' . $title . '</h3>';
			$str .= '<div class="accordion-item-content accordion-hide">' . self::shortcodes_helper( $content ) . '</div>';

			return $str;

		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $attrs
		 * @param null $content
		 *
		 * @return string
		 * row shortcodes
		 */
		static function shortcode_row( $attrs, $content = null ) {
			return '<div class="shortcode-row row clearfix">' . self::shortcodes_helper( $content ) . '</div>';
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $attrs
		 * @param null $content
		 *
		 * @return string
		 * column shortcode
		 */
		static function shortcode_column( $attrs, $content = null ) {

			extract( shortcode_atts( array(
				'width' => ''
			), $attrs ) );

			if ( empty( $width ) ) {
				$width = '100%';
			}

			switch ( $width ) {
				case '50%'  :
					return '<div class="shortcode-col col-sm-6 col-sx-12">' . self::shortcodes_helper( $content ) . '</div>';
				case '33%'  :
					return '<div class="shortcode-col col-sm-4 col-sx-12">' . self::shortcodes_helper( $content ) . '</div>';
				case '66%' :
					return '<div class="shortcode-col col-sm-8 col-sx-12">' . self::shortcodes_helper( $content ) . '</div>';
				case '25%' :
					return '<div class="shortcode-col col-sm-3 col-sx-12">' . self::shortcodes_helper( $content ) . '</div>';
				default :
					return '<div class="shortcode-col col-xs-12">' . self::shortcodes_helper( $content ) . '</div>';
			}
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * author information
		 */
		static function additional_author_info() {
			return array(
				'job'        => esc_html__( 'Job Name', 'bingo-core' ),
				'facebook'   => esc_html__( 'Facebook', 'bingo-core' ),
				'twitter'    => esc_html__( 'Twitter', 'bingo-core' ),
				'googleplus' => esc_html__( 'Google Plus', 'bingo-core' ),
				'pinterest'  => esc_html__( 'Pinterest', 'bingo-core' ),
				'linkedin'   => esc_html__( 'LinkedIn', 'bingo-core' ),
				'tumblr'     => esc_html__( 'Tumblr', 'bingo-core' ),
				'flickr'     => esc_html__( 'Flickr', 'bingo-core' ),
				'instagram'  => esc_html__( 'Instagram', 'bingo-core' ),
				'skype'      => esc_html__( 'Skype', 'bingo-core' ),
				'snapchat'   => esc_html__( 'Snapchat', 'bingo-core' ),
				'myspace'    => esc_html__( 'Myspace', 'bingo-core' ),
				'youtube'    => esc_html__( 'Youtube', 'bingo-core' ),
				'bloglovin'  => esc_html__( 'Bloglovin', 'bingo-core' ),
				'digg'       => esc_html__( 'Digg', 'bingo-core' ),
				'dribbble'   => esc_html__( 'Dribbble', 'bingo-core' ),
				'soundcloud' => esc_html__( 'SoundCloud', 'bingo-core' ),
				'vimeo'      => esc_html__( 'Vimeo', 'bingo-core' ),
				'reddit'     => esc_html__( 'Reddit', 'bingo-core' ),
				'vkontakte'  => esc_html__( 'VKontakte', 'bingo-core' ),
				'rss'        => esc_html__( 'RSS', 'bingo-core' ),
			);
		}

	}

	//init shortcode
	bingo_ruby_plugin_shortcode::get_instance();
}
