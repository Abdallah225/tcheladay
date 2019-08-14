<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param      $social_profiles
 * @param      $class_name
 * @param bool $new_tab
 * @param bool $enable_icon
 *
 * @return string
 * render social bar
 */
if ( ! function_exists( 'bingo_ruby_render_social_icon' ) ) {
	function bingo_ruby_render_social_icon( $social_profiles, $enable_color = false, $new_tab = true, $enable_show_icon = false, $custom = false ) {

		//check empty
		if ( empty( $social_profiles ) ) {
			return false;
		}

		if ( $new_tab == true ) {
			$newtab = 'target="_blank"';
		} else {
			$newtab = '';
		}

		$class_name = array();

		$class_name[] = 'icon-social';

		if ( ! empty( $enable_color ) ) {
			$class_name[] = 'is-color';
		}

		$class_name = implode( ' ', $class_name );

		extract( shortcode_atts(
				array(
					'website'    => '',
					'facebook'   => '',
					'twitter'    => '',
					'googleplus' => '',
					'pinterest'  => '',
					'linkedin'   => '',
					'tumblr'     => '',
					'flickr'     => '',
					'instagram'  => '',
					'skype'      => '',
					'snapchat'   => '',
					'myspace'    => '',
					'youtube'    => '',
					'bloglovin'  => '',
					'digg'       => '',
					'dribbble'   => '',
					'soundcloud' => '',
					'vimeo'      => '',
					'reddit'     => '',
					'whatsapp'   => '',
					'vkontakte'  => '',
					'rss'        => '',
				), $social_profiles
			)
		);

		$str         = '';
		$str_content = '';

		if ( ! empty( $website ) ) {
			$str_content .= '<a class="icon-website ' . $class_name . '" title="website" href="' . esc_url( $website ) . '" ' . $newtab . '><i class="fa fa-link" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $facebook ) ) {
			if ( $enable_show_icon == true ) {
				$str_content .= '<a class="icon-facebook ' . $class_name . '" title="facebook" href="' . esc_url( $facebook ) . '" ' . $newtab . '><i class="fa fa-facebook-square" aria-hidden="true"></i></a>';
			} else {
				$str_content .= '<a class="icon-facebook ' . $class_name . '" title="facebook" href="' . esc_url( $facebook ) . '" ' . $newtab . '><i class="fa fa-facebook" aria-hidden="true"></i></a>';
			}
		}
		if ( ! empty( $twitter ) ) {
			$str_content .= '<a class="icon-twitter ' . $class_name . '" title="twitter" href="' . esc_url( $twitter ) . '" ' . $newtab . '><i class="fa fa-twitter" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $googleplus ) ) {
			$str_content .= '<a class="icon-google ' . $class_name . '" title="google+" href="' . esc_url( $googleplus ) . '" ' . $newtab . '><i class="fa fa-google" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $pinterest ) ) {
			$str_content .= '<a class="icon-pinterest ' . $class_name . '" title="pinterest" href="' . esc_url( $pinterest ) . '" ' . $newtab . '><i class="fa fa-pinterest" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $linkedin ) ) {
			$str_content .= '<a class="icon-linkedin ' . $class_name . '" title="linkedin" href="' . esc_url( $linkedin ) . '" ' . $newtab . '><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $tumblr ) ) {
			$str_content .= '<a class="icon-tumblr ' . $class_name . '" title="tumblr" href="' . esc_url( $tumblr ) . '" ' . $newtab . '><i class="fa fa-tumblr" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $flickr ) ) {
			$str_content .= '<a class="icon-flickr ' . $class_name . '" title="flickr" href="' . esc_url( $flickr ) . '" ' . $newtab . '><i class="fa fa-flickr" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $instagram ) ) {
			$str_content .= '<a class="icon-instagram ' . $class_name . '" title="instagram" href="' . esc_url( $instagram ) . '" ' . $newtab . '><i class="fa fa-instagram" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $skype ) ) {
			$str_content .= '<a class="icon-skype ' . $class_name . '" title="skype" href="' . esc_url( $skype ) . '" ' . $newtab . '><i class="fa fa-skype" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $snapchat ) ) {
			$str_content .= '<a class="icon-snapchat ' . $class_name . '" title="snapchat" href="' . esc_url( $snapchat ) . '" ' . $newtab . '><i class="fa fa-snapchat-ghost" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $myspace ) ) {
			$str_content .= '<a class="icon-myspace ' . $class_name . '" title="myspace" href="' . esc_url( $myspace ) . '" ' . $newtab . '><i class="fa fa-users" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $youtube ) ) {
			$str_content .= '<a class="icon-youtube ' . $class_name . '" title="youtube" href="' . esc_url( $youtube ) . '" ' . $newtab . '><i class="fa fa-youtube" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $bloglovin ) ) {
			$str_content .= '<a class="icon-bloglovin ' . $class_name . '" title="bloglovin" href="' . esc_url( $bloglovin ) . '" ' . $newtab . '><i class="fa fa-heart" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $digg ) ) {
			$str_content .= '<a class="icon-digg ' . $class_name . '" title="digg" href="' . esc_url( $digg ) . '" ' . $newtab . '><i class="fa fa-digg" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $dribbble ) ) {
			$str_content .= '<a class="icon-dribbble ' . $class_name . '" title="dribbble" href="' . esc_url( $dribbble ) . '" ' . $newtab . '><i class="fa fa-dribbble" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $soundcloud ) ) {
			$str_content .= '<a class="icon-soundcloud ' . $class_name . '" title="soundcloud" href="' . esc_url( $soundcloud ) . '" ' . $newtab . '><i class="fa fa-soundcloud" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $vimeo ) ) {
			$str_content .= '<a class="icon-vimeo ' . $class_name . '" title="vimeo" href="' . esc_url( $vimeo ) . '" ' . $newtab . '><i class="fa fa-vimeo-square" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $reddit ) ) {
			$str_content .= '<a class="icon-reddit ' . $class_name . '" title="reddit" href="' . esc_url( $reddit ) . '" ' . $newtab . '><i class="fa fa-reddit" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $whatsapp ) ) {
			$str_content .= '<a class="icon-whatsapp ' . $class_name . '" title="whatsapp" href="' . esc_url( $whatsapp ) . '" ' . $newtab . '><i class="fa fa-whatsapp" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $vkontakte ) ) {
			$str_content .= '<a class="icon-vk ' . $class_name . '" title="vkontakte" href="' . esc_url( $vkontakte ) . '" ' . $newtab . '><i class="fa fa-vk" aria-hidden="true"></i></a>';
		}
		if ( ! empty( $rss ) ) {
			$str_content .= '<a class="icon-rss ' . $class_name . '" title="rss" href="' . esc_url( $rss ) . '" ' . $newtab . '><i class="fa fa-rss" aria-hidden="true"></i></a>';
		}

        //custom socials
        if ( true === $custom ) {

            //social 1
            $social_1_url = bingo_ruby_core::get_option('custom_social_1_url');
            $social_1_name = bingo_ruby_core::get_option('custom_social_1_name');
            $social_1_icon = bingo_ruby_core::get_option('custom_social_1_icon');
            if ( ! empty( $social_1_url ) && ! empty( $social_1_name ) ) {
                $str_content .= '<a class="' . $class_name . ' color-' . esc_attr( $social_1_name ) . '" title="' . esc_attr( $social_1_name ) . '" href="' . esc_url( $social_1_url ) . '" ' . $newtab . '><i class="fa ' . esc_attr( $social_1_icon ) . '"></i></a>';
            }

            //social 2
            $social_2_url  = bingo_ruby_core::get_option( 'custom_social_2_url' );
            $social_2_name = bingo_ruby_core::get_option( 'custom_social_2_name' );
            $social_2_icon = bingo_ruby_core::get_option( 'custom_social_2_icon' );
            if ( ! empty( $social_2_url ) && ! empty( $social_2_name ) ) {
                $str_content .= '<a class="' . $class_name . ' color-' . esc_attr( $social_2_name ) . '" title="' . esc_attr( $social_2_name ) . '" href="' . esc_url( $social_2_url ) . '" ' . $newtab . '><i class="fa ' . esc_attr( $social_2_icon ) . '"></i></a>';
            }

            //social 3
            $social_3_url  = bingo_ruby_core::get_option( 'custom_social_3_url' );
            $social_3_name = bingo_ruby_core::get_option( 'custom_social_3_name' );
            $social_3_icon = bingo_ruby_core::get_option( 'custom_social_3_icon' );
            if ( ! empty( $social_3_url ) && ! empty( $social_3_name ) ) {
                $str_content .= '<a class="' . $class_name . ' color-' . esc_attr( $social_3_name ) . '" title="' . esc_attr( $social_3_name ) . '" href="' . esc_url( $social_3_url ) . '" ' . $newtab . '><i class="fa ' . esc_attr( $social_3_icon ) . '"></i></a>';
            }
        }

		$str .= $str_content;

		if ( $enable_show_icon == true && ! empty( $str_content ) ) {
			$str .= '<span class="show-social"><i class="ruby-icon-show"></i></span>';
			$str .= '<span class="close-social"><i class="ruby-icon-close"></i></span>';
		}

		return $str;
	}

}
