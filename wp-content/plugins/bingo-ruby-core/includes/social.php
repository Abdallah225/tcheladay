<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * social like posts
 */
if ( ! function_exists( 'bingo_ruby_plugin_social_like' ) ) {
	function bingo_ruby_plugin_social_like() {

		global $bingo_ruby_theme_options;

		if ( ! is_single() ) {
			return false;
		}

		if ( empty( $bingo_ruby_theme_options['single_post_like'] ) ) {
			return false;
		}

		global $post;

		//get data
		$twitter_user = get_the_author_meta( 'twitter' );
		if ( ! empty( $twitter_user ) ) {
			$pos          = strpos( $twitter_user, 'twitter.com/' );
			$twitter_user = substr( $twitter_user, intval( $pos ) + 12 );
			$twitter_user = str_replace( '/', '', $twitter_user );
		} else {
			$twitter_user = get_bloginfo( 'name' );
		}

		//twitter
		$str = '';
		//facebook
		$str .= '<div class="single-post-like">';
		$str .= '<span class="like-el like-facebook">';
		$str .= '<iframe src="https://www.facebook.com/plugins/like.php?href=' . get_permalink() . '&amp;layout=button_count&amp;show_faces=false&amp;width=105&amp;action=like&amp;colorscheme=light&amp;height=21" style="border:none; overflow:hidden; width:105px; height:21px; background-color:transparent;"></iframe>';
		$str .= '</span>';
		//twitter
		$str .= '<span class="like-el like-twitter">';
		$str .= '<a href="https://twitter.com/share" class="twitter-share-button" data-url="' . get_permalink() . '" data-text="' . htmlspecialchars( urlencode( html_entity_decode( get_the_title(), ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" data-via="' . urlencode( $twitter_user ) . '" data-lang="en">tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		$str .= '</span>';
		//google
		$str .= '<span class="like-el like-google">';
		$str .= '<div class="g-plusone" data-size="medium" data-href="' . get_permalink() . '"></div>
                <script type="text/javascript">
                    (function() {
                        var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
                        po.src = "https://apis.google.com/js/plusone.js";
                        var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
                    })();
                </script>
                ';
		$str .= '</span>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param bool $single_option
 *
 * @return bool|string
 * render share to socials
 */
if ( ! function_exists( 'bingo_ruby_plugin_render_shares' ) ) {
	function bingo_ruby_plugin_render_shares( $single_option = false ) {

		//check ssl
		$protocol = 'http';
		if ( is_ssl() ) {
			$protocol = 'https';
		}

		global $post;
		global $bingo_ruby_theme_options;

		if ( true === $single_option && empty( $bingo_ruby_theme_options['single_post_share_top'] ) ) {
			return false;
		}

		$share_facebook   = false;
		$share_twitter    = false;
		$share_googleplus = false;
		$share_linkedin   = false;
		$share_pinterest  = false;
		$share_tumblr     = false;
		$share_reddit     = false;
		$share_vk         = false;
		$share_email      = false;


		//get data
		$twitter_user = get_the_author_meta( 'twitter' );

		if ( ! empty( $twitter_user ) ) {
			$pos          = strpos( $twitter_user, 'twitter.com/' );
			$twitter_user = substr( $twitter_user, intval( $pos ) + 12 );
			$twitter_user = str_replace( '/', '', $twitter_user );
		} else {
			$twitter_user = get_bloginfo( 'name' );
		}

		//post title
		$post_title = get_the_title();

		if ( false == $single_option ) {

			if ( ! empty( $bingo_ruby_theme_options['share_facebook'] ) ) {
				$share_facebook = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['share_twitter'] ) ) {
				$share_twitter = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['share_googleplus'] ) ) {
				$share_googleplus = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['share_linkedin'] ) ) {
				$share_linkedin = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['share_pinterest'] ) ) {
				$share_pinterest = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['share_tumblr'] ) ) {
				$share_tumblr = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['share_reddit'] ) ) {
				$share_reddit = true;
			}
			if ( ! empty( $bingo_ruby_theme_options['share_vk'] ) ) {
				$share_vk = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['share_email'] ) ) {
				$share_email = true;
			}

		} else {

			if ( ! empty( $bingo_ruby_theme_options['single_share_facebook'] ) ) {
				$share_facebook = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['single_share_twitter'] ) ) {
				$share_twitter = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['single_share_googleplus'] ) ) {
				$share_googleplus = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['single_share_linkedin'] ) ) {
				$share_linkedin = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['single_share_pinterest'] ) ) {
				$share_pinterest = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['single_share_tumblr'] ) ) {
				$share_tumblr = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['single_share_reddit'] ) ) {
				$share_reddit = true;
			}
			if ( ! empty( $bingo_ruby_theme_options['single_share_vk'] ) ) {
				$share_vk = true;
			}

			if ( ! empty( $bingo_ruby_theme_options['single_share_email'] ) ) {
				$share_email = true;
			}
		}

		if ( false == $single_option ) {
			$class_name = 'share-bar-el';
		} else {
			$class_name = 'single-share-bar-el';
		}

		//render
		$str         = '';
		$str_content = '';

		//facebook
		if ( ! empty( $share_facebook ) ) {
			$str_content .= '<a class="' . $class_name . ' icon-facebook" href="' . $protocol . '://www.facebook.com/sharer.php?u=' . urlencode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-facebook color-facebook"></i></a>';
		}
		//twitter
		if ( ! empty( $share_twitter ) ) {
			$str_content .= '<a class="' . $class_name . ' icon-twitter" href="' . $protocol . '://twitter.com/intent/tweet?text=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&amp;url=' . urlencode( get_permalink() ) . '&amp;via=' . urlencode( $twitter_user ) . '"><i class="fa fa-twitter color-twitter"></i>';
			$str_content .= bingo_ruby_twitter_ember_script();
			$str_content .= '</a>';
		}

		if ( ! empty( $share_googleplus ) ) {
			$str_content .= ' <a class="' . $class_name . ' icon-google" href="' . $protocol . '://plus.google.com/share?url=' . urlencode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-google color-google"></i></a>';
		}
		//pinterest
		if ( ! empty( $share_pinterest ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'bingo_ruby_840x500' );
			if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) and get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ) != '' ) {
				$pinterest_description = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true );
			} else {
				$pinterest_description = htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' );
			}
			$str_content .= '<a class="' . $class_name . ' icon-pinterest" href="' . $protocol . '://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . '&description=' . $pinterest_description . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-pinterest-p"></i></a>';
		}
		//linkedin
		if ( ! empty ( $share_linkedin ) ) {
			$str_content .= '<a class="' . $class_name . ' icon-linkedin" href="' . $protocol . '://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode( get_permalink() ) . '&amp;title=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-linkedin"></i></a>';
		}
		//tumblr
		if ( ! empty( $share_tumblr ) ) {
			$str_content .= ' <a class="' . $class_name . ' icon-tumblr" href="' . $protocol . '://www.tumblr.com/share/link?url=' . urlencode( get_permalink() ) . '&amp;name=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&amp;description=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-tumblr"></i></a>';
		}
		if ( ! empty( $share_reddit ) ) {
			$str_content .= '<a class="' . $class_name . ' icon-reddit" href="' . $protocol . '://www.reddit.com/submit?url=' . urlencode( get_permalink() ) . '&title=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-reddit-alien"></i></a>';
		}
		//vk
		if ( ! empty( $share_vk ) ) {
			$str_content .= '<a class="' . $class_name . ' icon-vk" href="' . $protocol . '://vkontakte.ru/share.php?url=' . urldecode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-vk"></i></a>';
		}
		//email
		if ( ! empty( $share_email ) ) {
			$str_content .= '<a class="' . $class_name . ' icon-email" href="mailto:?subject=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&BODY=' . urlencode( esc_html__( 'I found this article interesting and thought of sharing it with you. Check it out:', 'bingo-core' ) ) . urlencode( get_permalink() ) . '"><i class="fa fa-envelope"></i></a>';
		}

		//check empty
		if ( empty( $str_content ) ) {
			return false;
		}

		if ( false === $single_option ) {
			$str .= '<div class="social-sharing">';
			$str .= $str_content;
			$str .= '</div>';
		} else {
			$str .= $str_content;
		}

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render share bar
 */
if ( ! function_exists( 'bingo_ruby_plugin_info_share' ) ) {
	function bingo_ruby_plugin_info_share( $class_name = '' ) {

		global $bingo_ruby_theme_options;

		if ( empty( $bingo_ruby_theme_options['post_share_icon'] ) ) {
			return false;
		}

		//get content
		$content = bingo_ruby_plugin_render_shares();

		if ( empty( $content ) ) {
			return false;
		}

		$classes   = array();
		$classes[] = 'post-meta-share-inner';
		if ( ! empty( $class_name ) ) {
			$classes[] = $class_name;
		}
		$classes = implode( ' ', $classes );

		//render
		$str = '';
		$str .= '<div class="post-meta-info-share clearfix">';
		$str .= '<div class="' . esc_attr( $classes ) . '">';
		$str .= $content;
		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * sing big share at bottom
 * single_post_share_bottom
 */

if ( ! function_exists( 'bingo_ruby_plugin_share_big' ) ) {
	function bingo_ruby_plugin_share_big() {

		global $bingo_ruby_theme_options;
		global $post;

		if ( empty( $bingo_ruby_theme_options['single_post_share_bottom'] ) ) {
			return false;
		}

		$twitter_user = get_the_author_meta( 'twitter' );
		if ( ! empty( $twitter_user ) ) {
			$pos          = strpos( $twitter_user, 'twitter.com/' );
			$twitter_user = substr( $twitter_user, intval( $pos ) + 12 );
			$twitter_user = str_replace( '/', '', $twitter_user );
		} else {
			$twitter_user = get_bloginfo( 'name' );
		}

		//post title
		$post_title = get_the_title();

		$str = '';
		$str .= '<div class="single-post-share-big">';
		$str .= '<div class="single-post-share-big-inner">';

		$protocol = 'http';
		if(is_ssl()){
			$protocol = 'https';
		}

		//facebook
		if ( ! empty( $bingo_ruby_theme_options['single_share_big_facebook'] ) ) {
			$str .= '<a class="share-bar-el-big icon-facebook" href="'.$protocol.'://www.facebook.com/sharer.php?u=' . urlencode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-facebook color-facebook"></i><span>' . esc_html__( 'share on Facebook', 'bingo-core' ) . '</span></a>';
		}
		//twitter
		if ( ! empty( $bingo_ruby_theme_options['single_share_big_twitter'] ) ) {
			$str .= '<a class="share-bar-el-big icon-twitter" href="https://twitter.com/intent/tweet?text=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&amp;url=' . urlencode( get_permalink() ) . '&amp;via=' . urlencode( $twitter_user ) . '"><i class="fa fa-twitter color-twitter"></i><span>' . esc_html__( 'share on Twitter', 'bingo-core' ) . '</span>';
			$str .= bingo_ruby_twitter_ember_script();
			$str .= '</a>';
		}

		if ( ! empty( $bingo_ruby_theme_options['single_share_big_googleplus'] ) ) {
			$str .= ' <a class="share-bar-el-big icon-google" href="'.$protocol.'://plus.google.com/share?url=' . urlencode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-google color-google"></i><span>' . esc_html__( 'share on Google+', 'bingo-core' ) . '</span></a>';
		}
		//pinterest
		if ( ! empty( $bingo_ruby_theme_options['single_share_big_pinterest'] ) ) {
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'bingo_ruby_840x500' );
			if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) and get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true ) != '' ) {
				$pinterest_description = get_post_meta( get_the_ID(), '_yoast_wpseo_metadesc', true );
			} else {
				$pinterest_description = htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' );
			}
			$str .= '<a class="share-bar-el-big icon-pinterest" href="'.$protocol.'://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&amp;media=' . ( ! empty( $image[0] ) ? $image[0] : '' ) . '&description=' . $pinterest_description . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-pinterest"></i><span>' . esc_html__( 'share on Pinterest', 'bingo-core' ) . '</span></a>';
		}
		//linkedin
		if ( ! empty ( $bingo_ruby_theme_options['single_share_big_linkedin'] ) ) {
			$str .= '<a class="share-bar-el-big icon-linkedin" href="'.$protocol.'://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode( get_permalink() ) . '&amp;title=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-linkedin"></i><span>' . esc_html__( 'share on LinkedIn', 'bingo-core' ) . '</span></a>';
		}
		//tumblr
		if ( ! empty( $bingo_ruby_theme_options['single_share_big_tumblr'] ) ) {
			$str .= ' <a class="share-bar-el-big icon-tumblr" href="'.$protocol.'://www.tumblr.com/share/link?url=' . urlencode( get_permalink() ) . '&amp;name=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&amp;description=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-tumblr"></i><span>' . esc_html__( 'share on Tumblr', 'bingo-core' ) . '</span></a>';
		}
		if ( ! empty( $bingo_ruby_theme_options['single_share_big_reddit'] ) ) {
			$str .= '<a class="share-bar-el-big icon-reddit" href="'.$protocol.'://www.reddit.com/submit?url=' . urlencode( get_permalink() ) . '&title=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-reddit-alien"></i><span>' . esc_html__( 'share on Reddit', 'bingo-core' ) . '</span></a>';
		}
		//vk
		if ( ! empty( $bingo_ruby_theme_options['single_share_big_vk'] ) ) {
			$str .= '<a class="share-bar-el-big icon-vk" href="'.$protocol.'://vkontakte.ru/share.php?url=' . urldecode( get_permalink() ) . '" onclick="window.open(this.href, \'mywin\',\'left=50,top=50,width=600,height=350,toolbar=0\'); return false;"><i class="fa fa-vk"></i><span>' . esc_html__( 'share on VKontakte', 'bingo-core' ) . '</span></a>';
		}
		//email
		if ( ! empty( $bingo_ruby_theme_options['single_share_big_email'] ) ) {
			$str .= '<a class="share-bar-el-big icon-email" href="mailto:?subject=' . htmlspecialchars( urlencode( html_entity_decode( $post_title, ENT_COMPAT, 'UTF-8' ) ), ENT_COMPAT, 'UTF-8' ) . '&BODY=' . esc_attr__( 'I found this article interesting and thought of sharing it with you. Check it out:', 'bingo-core' ) . urlencode( get_permalink() ) . '"><i class="fa fa-envelope-o"></i><span>' . esc_html__( 'share on Email', 'bingo-core' ) . '</span></a>';
		}

		$str .= '</div>';
		$str .= '</div>';

		return $str;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return int|string
 * get post share total
 */
if ( ! function_exists( 'bingo_ruby_plugin_total_share' ) ) {
	function bingo_ruby_plugin_total_share() {

		global $post;

		//get URL
		$url   = get_permalink();
		$count = array();

		if ( empty( $url ) ) {
			return false;
		}

		$forgery = get_post_meta( get_the_ID(), 'bingo_ruby_post_forgery_share', true );
		$total   = intval( $forgery );

		$url_snip             = strtolower( strip_tags( $url ) );
		$url_snip             = str_replace( array(' ', ',', '.', '"', "'", '/', "\\", '+', '=', ')', '(', '*', '&', '^', '%', '$', '#', '@', '!', '~', '`', '<', '>', '?', '[', ']', '{', '}', '|', ':',), '', substr( $url_snip, 0, 40 ) );
		$url_shares_transient = 'bingo_ruby_share_' . $url_snip;
		$cache                = get_transient( $url_shares_transient );

		if ( $cache !== false ) {
			$count = $cache;
		} else {

			//facebook
			$json_string = wp_remote_get( 'http://graph.facebook.com/?ids=' . $url, array( 'timeout' => 100 ) );
			if ( ! is_wp_error( $json_string ) && isset( $json_string['body'] ) ) {
				$json              = json_decode( $json_string['body'], true );
				$count['facebook'] = isset( $json[ $url ]['share']['share_count'] ) ? intval( ( $json[ $url ]['share']['share_count'] ) ) : 0;
			} else {
				$count['facebook'] = 0;
			}

			//linkedin
			$json_string = wp_remote_get( "http://www.linkedin.com/countserv/count/share?url=$url&format=json", array( 'timeout' => 100 ) );
			if ( ! is_wp_error( $json_string ) && isset( $json_string['body'] ) ) {
				$json              = json_decode( $json_string['body'], true );
				$count['linkedin'] = isset( $json['count'] ) ? intval( $json['count'] ) : 0;
			} else {
				$count['linkedin'] = 0;
			}


			//Pinterest
			$json_string = wp_remote_get( 'http://api.pinterest.com/v1/urls/count.json?url=' . $url, array( 'timeout' => 100 ) );
			if ( ! is_wp_error( $json_string ) && isset( $json_string['body'] ) ) {
				$json_string        = preg_replace( '/^receiveCount\((.*)\)$/', "\\1", $json_string['body'] );
				$json               = json_decode( $json_string, true );
				$count['pinterest'] = isset( $json['count'] ) ? intval( $json['count'] ) : 0;
			} else {
				$count['pinterest'] = 0;
			}

			//google plus
			$count['plus_one'] = 0;
			$google_args       = array(
				'headers' => array( 'Content-type' => 'application/json-rpc' ),
				'body'    => '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]',
			);
			$google_url        = 'https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ';
			$json_string       = wp_remote_post( $google_url, $google_args, array( 'timeout' => 100 ) );
			if ( ! is_wp_error( $json_string ) && isset( $json_string['body'] ) ) {
				$data = json_decode( $json_string['body'] );
				if ( ! is_null( $data ) ) {
					if ( is_array( $data ) && count( $data ) == 1 ) {
						$data = array_shift( $data );
					}
					if ( isset( $data->result->metadata->globalCounts->count ) ) {
						$count['plus_one'] = $data->result->metadata->globalCounts->count;
					}
				}
			}

			//count all
			$count['all'] = $count['facebook'] + $count['pinterest'] + $count['plus_one'] + $count['linkedin'];

			set_transient( $url_shares_transient, $count, 10800 );
		}

		if ( is_array( $count ) && ! empty( $count['all'] ) ) {
			$total += intval($count['all']);
		}

		$total = bingo_ruby_core::show_over_100k( $total );

		return $total;
	}
}


/**
 * Class bingo_ruby_plugin_social_fan
 * social fan counter
 */
if ( ! class_exists( 'bingo_ruby_plugin_social_fan' ) ) {
	class bingo_ruby_plugin_social_fan {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $url
         * @param $fb_token
		 *
		 * @return bool
		 * count facebook follower
		 */
		static function count_facebook( $url, $fb_token ) {

			//check
			if ( empty( $url ) ) {
				return false;
			}

			$params = array(
				'sslverify' => false,
				'timeout'   => 100
			);

			$filter = array(
				array(
					'start_1' => 'id="PagesLikesCountDOMID"',
					'start_2' => '<span',
					'start_3' => '>',
					'end_4'   => '<span',
				),
				array(
					'start_1' => '["PagesLikesTab","renderLikesData",["',
					'start_2' => '},',
					'start_3' => '],',
					'end_4'   => '],[]],["PagesLikesTab"',
				)
			);

			$response = wp_remote_get( 'https://www.facebook.com/' . $url );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				$response = wp_remote_get( 'https://www.facebook.com/' . $url, $params );
			}

			if ( ! is_wp_error( $response ) && ! empty( $response['response']['code'] ) && '200' == $response['response']['code'] ) {

				//get content
				$response = wp_remote_retrieve_body( $response );

				if ( ! empty( $response ) && $response !== false ) {

					$flag            = false;
					$response_backup = $response;

					foreach ( $filter as $filter_el ) {
						$response = $response_backup;
						foreach ( $filter_el as $key => $value ) {

							$key = explode( '_', $key );
							$key = $key[0];

							if ( $key == 'start' ) {
								$key = false;
							} elseif ( $value == 'end' ) {
								$key = true;
							}

							$key = (bool) $key;

							$index = strpos( $response, $value );
							if ( $index === false ) {
								break;
							}

							if ( $key ) {
								$response = substr( $response, 0, $index );
								$flag     = true;

							} else {
								$response = substr( $response, $index + strlen( $value ) );
							}
						}

						//exit if found
						if ( $flag ) {
							break;
						}
					}

					if ( strlen( $response ) < 150 ) {
						$count = self::extract_one_number( $response );

						if ( is_numeric( $count ) && strlen( number_format( $count ) ) < 16 ) {
							return intval( $count );
						}
					}
				}
			};

			$fb_access_token = '448416428867912|r44uJAf2tUOaRMx6p3FqTkCLb_o';
			$response        = wp_remote_get( 'https://graph.facebook.com/v2.9/' . urlencode( $url ) . '?access_token=' . $fb_access_token . '&fields=fan_count', $params );
			if ( is_wp_error( $response ) || ! isset( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				$fb_access_token = '475738566139306|cdKu6-vf0ONwPMin-d2MQTFbbTI';
				$response        = wp_remote_get( 'https://graph.facebook.com/v2.9/' . urlencode( $url ) . '?access_token=' . $fb_access_token . '&fields=fan_count', $params );
			}
			if ( is_wp_error( $response ) || ! isset( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				$fb_access_token = '268065387024122|GwTNVDdLoHldYyjg0FWfYKLByvU';
				$response        = wp_remote_get( 'https://graph.facebook.com/v2.9/' . urlencode( $url ) . '?access_token=' . $fb_access_token . '&fields=fan_count', $params );
			}

            if ( is_wp_error( $response ) || ! isset( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
                $response        = wp_remote_get( 'https://graph.facebook.com/v2.9/' . urlencode( $url ) . '?access_token=' . $fb_token . '&fields=fan_count', $params );
            }

			if ( ! is_wp_error( $response ) && isset( $response['response']['code'] ) && '200' == $response['response']['code'] ) {
				$response = json_decode( wp_remote_retrieve_body( $response ) );
			}

			if ( ! empty( $response->fan_count ) ) {
				return $response->fan_count;
			} else {
				return false;
			}
		}

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param       $user
		 *
		 * @return int
		 * count twitter follower
		 */
		static function count_twitter( $user ) {
            //check options
            if ( empty( $user ) ) {
                return false;
            }

            $params = array(
                'timeout'   => 120,
                'sslverify' => false
            );

            $filter   = array(
                'start_1' => 'ProfileNav-item--followers',
                'start_2' => 'title',
                'end'     => '>'
            );
            $response = wp_remote_get( 'https://twitter.com/' . $user, $params );

            //check & return
            if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
                return false;
            }
            //get content
            $response = wp_remote_retrieve_body( $response );

            if ( ! empty( $response ) && $response !== false ) {
                foreach ( $filter as $key => $value ) {

                    $key = explode( '_', $key );
                    $key = $key[0];

                    if ( $key == 'start' ) {
                        $key = false;
                    } else if ( $value == 'end' ) {
                        $key = true;
                    }
                    $key = (bool) $key;

                    $index = strpos( $response, $value );
                    if ( $index === false ) {
                        return false;
                    }
                    if ( $key ) {
                        $response = substr( $response, 0, $index );
                    } else {
                        $response = substr( $response, $index + strlen( $value ) );
                    }
                }

                if ( strlen( $response ) > 100 ) {
                    return false;
                }

                if ( preg_match('([a-zA-Z].*[0-9]|[0-9].*[a-zA-Z])', $user) ) {
                    $check_user = strlen( self::extract_one_number( $user ) );
                    $check_strlen = strlen( self::extract_one_number( $response ) );

                    $count = substr( self::extract_one_number( $response ),0,( $check_strlen-$check_user ) );
                } else {
                    $count = self::extract_one_number( $response );
                }

                if ( ! is_numeric( $count ) || strlen( number_format( $count ) ) > 15 ) {
                    return false;
                }

                $count = intval( $count );

                return $count;
            } else {
                return false;
            }
		}

		static function extract_one_number( $str ) {
			return intval( preg_replace( '/[^0-9]+/', '', $str ), 10 );
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $api
		 *
		 * @return array
		 * count instagram followers
		 */
		static function count_instagram( $api ) {
			//check option
			if ( empty( $api ) ) {
				return false;
			}

			$users = explode( ".", $api );
			if ( empty( $users[0] ) ) {
				return false;
			}
			$data = array();
			$url  = 'https://api.instagram.com/v1/users/' . $users[0] . '/?access_token=' . $api;

			$params = array(
				'timeout' => 100
			);

			$response = wp_remote_get( $url, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( empty( $response['data']['counts']['followed_by'] ) || empty( $response['data']['username'] ) ) {
				return false;
			}

			$data['count']     = $response['data']['counts']['followed_by'];
			$data['user_name'] = $response['data']['username'];
			$data['url']       = 'http://instagram.com/' . $data['user_name'];

			return $data;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $token
		 *
		 * @return bool
		 * count dribbble followers
		 */
		static function  count_dribbble($token ) {
            if ( empty( $token ) ) {
                return false;
            }

            $params = array(
                'sslverify' => false,
                'timeout'   => 100,
            );

            $response = wp_remote_get( 'https://api.dribbble.com/v2/user?access_token=' . $token, $params );

            if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
                return false;
            }

            $response = json_decode( wp_remote_retrieve_body( $response ) );
            if ( ! empty( $response->followers_count ) ) {
                return $response->followers_count;
            } else {
                return false;
            }
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $user
		 * @param $channel
		 *
		 * @return bool
		 * count youtube Subscriber
		 */
		static function count_youtube( $user, $channel ) {
			//check
			if ( empty( $user ) && empty ( $channel ) ) {
				return false;
			};

			if ( ! empty( $user ) ) {
				$url = "https://www.googleapis.com/youtube/v3/channels?part=statistics&forUsername=" . $user . "&key=AIzaSyB9OPUPAtVh3_XqrByTwBTSDrNzuPZe8fo";
			} else {
				$url = 'https://www.googleapis.com/youtube/v3/channels?part=statistics&id=' . $channel . '&key=AIzaSyB9OPUPAtVh3_XqrByTwBTSDrNzuPZe8fo';
			};

			$params = array(
				'sslverify' => false,
				'timeout'   => 100
			);

			$response = wp_remote_get( $url, $params );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );
			if ( ! empty( $response->items[0]->statistics->subscriberCount ) ) {
				return $response->items[0]->statistics->subscriberCount;
			} else {
				return false;
			}
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $user
		 * @param $api
		 *
		 * @return bool
		 * count soundclound follower
		 */
		static function count_soundclound( $user, $api ) {

			//check
			if ( empty( $user ) || empty( $api ) ) {
				return false;
			}

			$url      = 'http://api.soundcloud.com/users/' . $user . '.json?consumer_key=' . $api;
			$response = wp_remote_get( $url, array( 'timeout' => 100 ) );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( empty( $response['followers_count'] ) || empty( $response['permalink_url'] ) ) {
				return false;
			};
			$data['count'] = esc_attr( $response['followers_count'] );
			$data['url']   = esc_url( $response['permalink_url'] );

			return $data;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $user
		 *
		 * @return bool|int
		 * counter pinterest followers
		 */
		static function count_pinterest( $user ) {
			//check
			if ( empty( $user ) ) {
				return false;
			}

			$response = get_meta_tags( 'http://pinterest.com/' . $user . '/' );
			if ( ! empty( $response ) && ! empty( $response['pinterestapp:followers'] ) ) {
				return intval( strip_tags( $response['pinterestapp:followers'] ) );
			} else {
				return false;
			}
		}

        
		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $user
		 *
		 * @return bool
		 * count vimeo followers
		 */
		static function count_vimeo( $user ) {
			//check
			if ( empty( $user ) ) {
				return false;
			};
			$url      = 'https://vimeo.com/api/v2/' . $user . '/info.json';
			$response = wp_remote_get( $url, array( 'timeout' => 100 ) );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = json_decode( wp_remote_retrieve_body( $response ) );
			if ( ! empty( $response->total_contacts ) ) {
				return $response->total_contacts;
			} else {
				return false;
			}
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $user
		 *
		 * @return bool
		 * count vk followers
		 */
		static function count_vk( $user ) {

			//check
			if ( empty( $user ) ) {
				return false;
			}

            $url      = 'https://api.vk.com/api.php?oauth=1&method=groups.getById&group_id=' . $user . '&fields=members_count&v=5.84&access_token=bfe56615bfe56615bfe56615dbbf80972fbbfe5bfe56615e469af218964b4ce9d500e7f';
			$args     = array( 'timeout' => 100, 'sslverify' => false );
			$response = wp_remote_get( $url, $args );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = wp_remote_retrieve_body( $response );
			$response = json_decode( $response, true );
			$result   = (int) $response['response'][0]['members_count'];

			return $result;

		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param $id
		 * @param $api
		 *
		 * @return bool
		 * count google follower
		 */
		static function count_google( $id, $api ) {

			//check
			if ( empty( $id ) || empty( $api ) ) {
				return false;
			}

			$url      = 'https://www.googleapis.com/plus/v1/people/' . $id . '?key=' . $api . '';
			$args     = array( 'timeout' => 100, 'sslverify' => false );
			$response = wp_remote_get( $url, $args );

			if ( is_wp_error( $response ) || empty( $response['response']['code'] ) || '200' != $response['response']['code'] ) {
				return false;
			}

			$response = wp_remote_retrieve_body( $response );
			$response = json_decode( $response, true );
			if ( isset( $response['circledByCount'] ) ) {
				$result = (int) $response['circledByCount'];

				return $result;
			} else {
				return false;
			}
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @param string $social
		 * @param array $option
		 *
		 * @return array|bool|int|mixed|string
		 * get count for sidebar widget and save to cache.
		 */
		static function get_sidebar_social_counter( $social = '', $option = array() ) {

			$cache_data_name = 'bingo_ruby_sb_social_fan_' . $social;
			$cache           = get_transient( $cache_data_name );

			if ( false === $cache && '' == $cache ) {
				$data        = '';
				$cache_hours = 9;
				switch ( $social ) {
					case 'facebook_page' :
						$data = bingo_ruby_plugin_social_fan::count_facebook( $option['facebook_page'], $option['facebook_token'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'twitter' :
						$data = bingo_ruby_plugin_social_fan::count_twitter( $option['twitter_user'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'instagram' :
						$data = bingo_ruby_plugin_social_fan::count_instagram( $option['instagram_api'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'youtube' :
						$data = bingo_ruby_plugin_social_fan::count_youtube( $option['youtube_user'], $option['youtube_channel'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'dribbble' :
						$data = bingo_ruby_plugin_social_fan::count_dribbble( $option['dribbble_user'], $option['dribbble_token'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'pinterest' :
						$data = bingo_ruby_plugin_social_fan::count_pinterest( $option['pinterest_user'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'soundcloud' :
						$data = bingo_ruby_plugin_social_fan::count_soundclound( $option['soundcloud_user'], $option['soundcloud_api'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'vimeo' :
						$data = bingo_ruby_plugin_social_fan::count_vimeo( $option['vimeo_user'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'vk' :
						$data = bingo_ruby_plugin_social_fan::count_vk( $option['vk_user'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
					case 'google' :
						$data = bingo_ruby_plugin_social_fan::count_google( $option['google_id'], $option['google_api'] );
						set_transient( $cache_data_name, $data, 60 * 60 * $cache_hours );
						break;
				}

				return $data;
			} else {
				return $cache;
			}
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $facebook_app_id
 *
 * @return bool
 * opengraph support
 */
if ( ! function_exists( 'bingo_ruby_opengraph_meta' ) ) {
	function bingo_ruby_opengraph_meta() {

		if ( class_exists( 'WPSEO_Frontend' ) ) {
			$yoast_social = get_option( 'wpseo_social' );
			if ( ! empty( $yoast_social['opengraph'] ) ) {
				return false;
			}
		}

		global $post;
		global $bingo_ruby_theme_options;

		if ( ! is_singular() || empty( $bingo_ruby_theme_options['open_graph'] ) ) {
			return false;
		}

		$facebook_app_id = '';
		$logo            = '';

		if ( ! empty( $bingo_ruby_theme_options['facebook_app_id'] ) ) {
			$facebook_app_id = $bingo_ruby_theme_options['facebook_app_id'];
		}

		if ( ! empty( $bingo_ruby_theme_options['header_logo'] ) ) {
			$logo = $bingo_ruby_theme_options['header_logo'];
		}

		if ( ! empty( $post->post_excerpt ) ) {
			$post_excerpt = $post->post_excerpt;
		} else {
			$post_content = preg_replace( '`\[[^\]]*\]`', '', $post->post_content );
			$post_content = stripslashes( wp_filter_nohtml_kses( $post_content ) );
			$post_excerpt = wp_trim_words( esc_html( $post_content ), 30, '' );
		}

		echo '<meta property="og:title" content="' . get_the_title() . '"/>';
		echo '<meta property="og:type" content="article"/>';
		echo '<meta property="og:url" content="' . get_permalink() . '"/>';
		echo '<meta property="og:site_name" content="' . get_bloginfo( 'name' ) . '"/>';
		echo '<meta property="og:description" content="' . esc_html( $post_excerpt ) . '"/>';

		if ( ! empty( $facebook_app_id ) ) {
			echo '<meta property="fb:app_id" content="' . $facebook_app_id . '" />';
		}

		if ( has_post_thumbnail( $post->ID ) ) {
			$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			echo '<meta property="og:image" content="' . esc_url( $thumbnail_src[0] ) . '"/>';
		} else {

			if ( ! empty( $logo['url'] ) ) {
				echo '<meta property="og:image" content="' . esc_url( $logo['url'] ) . '"/>';
			}
		}

		return false;
	}

	add_action( 'wp_head', 'bingo_ruby_opengraph_meta', 20 );

}

//ember twitter script
if ( ! function_exists( 'bingo_ruby_twitter_ember_script' ) ) {
	function bingo_ruby_twitter_ember_script() {

		if ( isset( $GLOBALS['bingo_ruby_twitter_ember'] ) && true === $GLOBALS['bingo_ruby_twitter_ember'] ) {
			return '';
		}

		$GLOBALS['bingo_ruby_twitter_ember'] = true;

		return '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
	}
}