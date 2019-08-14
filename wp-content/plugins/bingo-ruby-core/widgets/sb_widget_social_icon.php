<?php
//social widget
add_action( 'widgets_init', 'bingo_ruby_register_social_widget' );

function bingo_ruby_register_social_widget() {
	register_widget( 'bingo_ruby_social_widget' );
}


class bingo_ruby_social_widget extends WP_Widget {

	//register widget
	function __construct()
    {
		$widget_ops = array('classname'   => 'social-bar-widget','description' => esc_attr__( '[Sidebar Widget] Display social icon in sidebar sections', 'bingo-core' ));
		parent::__construct( 'bingo_ruby_social_widget', esc_attr__( '[SIDEBAR] - Social Bar Icon', 'bingo-core' ), $widget_ops );
	}


	//render widget
	function widget( $args, $instance ) {

		//check empty
		if ( ! function_exists( 'bingo_ruby_social_profile_web' ) || ! function_exists( 'bingo_ruby_render_social_icon' ) ) {
			return false;
		}

		extract( $args );

		$title             = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
		$title_color       = ( ! empty( $instance['title_color'] ) ) ? $instance['title_color'] : '';
		$option            = ! empty( $instance['option'] ) ? $instance['option'] : '';
		$new_tab           = ( ! empty( $instance['new_tab'] ) ) ? $instance['new_tab'] : '';
		$enable_icon_color = ( ! empty( $instance['enable_color'] ) ) ? $instance['enable_color'] : '';
		$facebook          = ( ! empty( $instance['facebook'] ) ) ? $instance['facebook'] : '';
		$twitter           = ( ! empty( $instance['twitter'] ) ) ? $instance['twitter'] : '';
		$googleplus        = ( ! empty( $instance['googleplus'] ) ) ? $instance['googleplus'] : '';
		$pinterest         = ( ! empty( $instance['pinterest'] ) ) ? $instance['pinterest'] : '';
		$linkedin          = ( ! empty( $instance['linkedin'] ) ) ? $instance['linkedin'] : '';
		$tumblr            = ( ! empty( $instance['tumblr'] ) ) ? $instance['tumblr'] : '';
		$flickr            = ( ! empty( $instance['flickr'] ) ) ? $instance['flickr'] : '';
		$instagram         = ( ! empty( $instance['instagram'] ) ) ? $instance['instagram'] : '';
		$skype             = ( ! empty( $instance['skype'] ) ) ? $instance['skype'] : '';
		$snapchat          = ( ! empty( $instance['snapchat'] ) ) ? $instance['snapchat'] : '';
		$myspace           = ( ! empty( $instance['myspace'] ) ) ? $instance['myspace'] : '';
		$youtube           = ( ! empty( $instance['youtube'] ) ) ? $instance['youtube'] : '';
		$bloglovin         = ( ! empty( $instance['bloglovin'] ) ) ? $instance['bloglovin'] : '';
		$digg              = ( ! empty( $instance['digg'] ) ) ? $instance['digg'] : '';
		$dribbble          = ( ! empty( $instance['dribbble'] ) ) ? $instance['dribbble'] : '';
		$soundcloud        = ( ! empty( $instance['soundcloud'] ) ) ? $instance['soundcloud'] : '';
		$vimeo             = ( ! empty( $instance['vimeo'] ) ) ? $instance['vimeo'] : '';
		$reddit            = ( ! empty( $instance['reddit'] ) ) ? $instance['reddit'] : '';
		$whatsapp          = ( ! empty( $instance['whatsapp'] ) ) ? $instance['whatsapp'] : '';
		$vkontakte         = ( ! empty( $instance['vkontakte'] ) ) ? $instance['vkontakte'] : '';
		$rss               = ( ! empty( $instance['rss'] ) ) ? $instance['rss'] : '';

        $class_name   = array();
        $class_name[] = 'icon-social';
        if ( ! empty( $enable_icon_color ) ) {
            $class_name[] = 'is-color';
        }
        $class_name = implode( ' ', $class_name );

		$website_social_data = bingo_ruby_social_profile_web();

        echo $before_widget;

		if ( ! empty( $title ) ) {
			echo $before_title;
			if ( ! empty( $title_color ) ) {
				echo '<span style="color:' . esc_attr( $title_color ) . ';">' . esc_attr( $title ) . '</span>';
			} else {
				echo esc_attr( $title );
			}
			echo $after_title;
		}?>

		<div class="widget-content-wrap">
			<div class="widget-social-link-info social-tooltips">
                <?php if ($option == 'is-theme-option') : ?>
                    <?php  if ( ! empty( $new_tab )) {
                        $newtab = true;
                    } else {
                        $newtab = false;
                    } ?>
				<?php echo bingo_ruby_render_social_icon( $website_social_data, $enable_icon_color, $newtab ); ?>
                 <?php else : ?>
                    <?php
                    if ( ! empty( $new_tab )) {
                        $newtab = 'target="_blank"';
                    } else {
                        $newtab = '';
                    }
                    if ( ! empty( $facebook ) ) {
                        echo '<a class="icon-facebook ' . $class_name . '" title="facebook" href="' . esc_url( $facebook ) . '" ' . $newtab . '><i class="fa fa-facebook" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $twitter ) ) {
                        echo '<a class="icon-twitter ' . $class_name . '" title="twitter" href="' . esc_url( $twitter ) . '" ' . $newtab . '><i class="fa fa-twitter" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $googleplus ) ) {
                        echo '<a class="icon-google ' . $class_name . '" title="google+" href="' . esc_url( $googleplus ) . '" ' . $newtab . '><i class="fa fa-google" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $pinterest ) ) {
                        echo '<a class="icon-pinterest ' . $class_name . '" title="pinterest" href="' . esc_url( $pinterest ) . '" ' . $newtab . '><i class="fa fa-pinterest" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $linkedin ) ) {
                        echo '<a class="icon-linkedin ' . $class_name . '" title="linkedin" href="' . esc_url( $linkedin ) . '" ' . $newtab . '><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $tumblr ) ) {
                        echo '<a class="icon-tumblr ' . $class_name . '" title="tumblr" href="' . esc_url( $tumblr ) . '" ' . $newtab . '><i class="fa fa-tumblr" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $flickr ) ) {
                        echo '<a class="icon-flickr ' . $class_name . '" title="flickr" href="' . esc_url( $flickr ) . '" ' . $newtab . '><i class="fa fa-flickr" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $instagram ) ) {
                        echo '<a class="icon-instagram ' . $class_name . '" title="instagram" href="' . esc_url( $instagram ) . '" ' . $newtab . '><i class="fa fa-instagram" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $skype ) ) {
                        echo '<a class="icon-skype ' . $class_name . '" title="skype" href="' . esc_url( $skype ) . '" ' . $newtab . '><i class="fa fa-skype" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $snapchat ) ) {
                        echo '<a class="icon-snapchat ' . $class_name . '" title="snapchat" href="' . esc_url( $snapchat ) . '" ' . $newtab . '><i class="fa fa-snapchat-ghost" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $myspace ) ) {
                        echo '<a class="icon-myspace ' . $class_name . '" title="myspace" href="' . esc_url( $myspace ) . '" ' . $newtab . '><i class="fa fa-users" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $youtube ) ) {
                        echo '<a class="icon-youtube ' . $class_name . '" title="youtube" href="' . esc_url( $youtube ) . '" ' . $newtab . '><i class="fa fa-youtube" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $bloglovin ) ) {
                        echo '<a class="icon-bloglovin ' . $class_name . '" title="bloglovin" href="' . esc_url( $bloglovin ) . '" ' . $newtab . '><i class="fa fa-heart" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $digg ) ) {
                        echo '<a class="icon-digg ' . $class_name . '" title="digg" href="' . esc_url( $digg ) . '" ' . $newtab . '><i class="fa fa-digg" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $dribbble ) ) {
                        echo '<a class="icon-dribbble ' . $class_name . '" title="dribbble" href="' . esc_url( $dribbble ) . '" ' . $newtab . '><i class="fa fa-dribbble" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $soundcloud ) ) {
                        echo '<a class="icon-soundcloud ' . $class_name . '" title="soundcloud" href="' . esc_url( $soundcloud ) . '" ' . $newtab . '><i class="fa fa-soundcloud" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $vimeo ) ) {
                        echo '<a class="icon-vimeo ' . $class_name . '" title="vimeo" href="' . esc_url( $vimeo ) . '" ' . $newtab . '><i class="fa fa-vimeo-square" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $reddit ) ) {
                        echo '<a class="icon-reddit ' . $class_name . '" title="reddit" href="' . esc_url( $reddit ) . '" ' . $newtab . '><i class="fa fa-reddit" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $whatsapp ) ) {
                        echo '<a class="icon-whatsapp ' . $class_name . '" title="whatsapp" href="' . esc_url( $whatsapp ) . '" ' . $newtab . '><i class="fa fa-whatsapp" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $vkontakte ) ) {
                        echo '<a class="icon-vk ' . $class_name . '" title="vkontakte" href="' . esc_url( $vkontakte ) . '" ' . $newtab . '><i class="fa fa-vk" aria-hidden="true"></i></a>';
                    }
                    if ( ! empty( $rss ) ) {
                        echo '<a class="icon-rss ' . $class_name . '" title="rss" href="' . esc_url( $rss ) . '" ' . $newtab . '><i class="fa fa-rss" aria-hidden="true"></i></a>';
                    }
                    ?>
                <?php endif; ?>
			</div>
		</div>

        <?php echo $after_widget;
    }


	function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$instance['title']        = strip_tags( $new_instance['title'] );
		$instance['title_color']  = strip_tags( $new_instance['title_color'] );
		$instance['option']       = strip_tags( $new_instance['option'] );
		$instance['facebook']     = strip_tags( $new_instance['facebook'] );
		$instance['twitter']      = strip_tags( $new_instance['twitter'] );
		$instance['googleplus']   = strip_tags( $new_instance['googleplus'] );
		$instance['pinterest']    = strip_tags( $new_instance['pinterest'] );
		$instance['linkedin']     = strip_tags( $new_instance['linkedin'] );
		$instance['tumblr']       = strip_tags( $new_instance['tumblr'] );
		$instance['flickr']       = strip_tags( $new_instance['flickr'] );
		$instance['instagram']    = strip_tags( $new_instance['instagram'] );
		$instance['skype']        = strip_tags( $new_instance['skype'] );
		$instance['snapchat']     = strip_tags( $new_instance['snapchat'] );
		$instance['myspace']      = strip_tags( $new_instance['myspace'] );
		$instance['youtube']      = strip_tags( $new_instance['youtube'] );
		$instance['bloglovin']    = strip_tags( $new_instance['bloglovin'] );
		$instance['digg']         = strip_tags( $new_instance['digg'] );
		$instance['dribbble']     = strip_tags( $new_instance['dribbble'] );
		$instance['soundcloud']   = strip_tags( $new_instance['soundcloud'] );
		$instance['vimeo']        = strip_tags( $new_instance['vimeo'] );
		$instance['reddit']       = strip_tags( $new_instance['reddit'] );
		$instance['whatsapp']     = strip_tags( $new_instance['whatsapp'] );
		$instance['vkontakte']    = strip_tags( $new_instance['vkontakte'] );
		$instance['rss']          = strip_tags( $new_instance['rss'] );
		$instance['new_tab']      = strip_tags( $new_instance['new_tab'] );
		$instance['enable_color'] = strip_tags( $new_instance['enable_color'] );

		return $instance;
	}


    function form($instance) {
	    $defaults = array(
		    'title'        => esc_attr__( 'find us on socials', 'bingo-core' ),
		    'title_color'  => '',
		    'option'       => '',
		    'facebook'     => '',
		    'twitter'      => '',
		    'googleplus'   => '',
		    'pinterest'    => '',
		    'linkedin'     => '',
		    'tumblr'       => '',
		    'flickr'       => '',
		    'instagram'    => '',
		    'skype'        => '',
		    'snapchat'     => '',
		    'myspace'      => '',
		    'youtube'      => '',
		    'bloglovin'    => '',
		    'digg'         => '',
		    'dribbble'     => '',
		    'soundcloud'   => '',
		    'vimeo'        => '',
		    'reddit'       => '',
		    'whatsapp'     => '',
		    'vkontakte'    => '',
		    'rss'          => '',
		    'new_tab'      => true,
		    'enable_color' => false
	    );
	    $instance = wp_parse_args( (array) $instance, $defaults );
	    ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title :','bingo-core') ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php if (!empty($instance['title'])) echo esc_attr($instance['title']); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'option' )); ?>"><?php esc_attr_e('Select default theme option or custom show icon social:', 'bingo-core'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'option' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'option' )); ?>" >
                <option value="is-theme-option" <?php if( !empty($instance['option']) && $instance['option'] == 'is-theme-option' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Theme Option', 'bingo-core'); ?></option>
                <option value="is-custom-url" <?php if( !empty($instance['option']) && $instance['option'] == 'is-custom-url' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Use Custom', 'bingo-core'); ?></option>
            </select>
        </p>
        <p><?php echo html_entity_decode(esc_html__( 'To set theme option for social link, Please go to: <strong>BINGO OPTIONS -> Share & Socials -> Site Social Profiles</strong>', 'bingo-core' )); ?></p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>"><?php esc_html_e('Facebook Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>" value="<?php if( !empty($instance['facebook']) ) echo esc_url($instance['facebook']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>"><?php esc_html_e('Twitter Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>" value="<?php if( !empty($instance['twitter']) ) echo esc_url($instance['twitter']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'googleplus' )); ?>"><?php esc_html_e('Googleplus Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'googleplus' )); ?>" name="<?php echo esc_attr($this->get_field_name('googleplus')); ?>" value="<?php if( !empty($instance['googleplus']) ) echo esc_url($instance['googleplus']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>"><?php esc_html_e('Pinterest Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>" name="<?php echo esc_attr($this->get_field_name('pinterest')); ?>" value="<?php if( !empty($instance['pinterest']) ) echo esc_url($instance['pinterest']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>"><?php esc_html_e('LinkedIn Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>" value="<?php if( !empty($instance['linkedin']) ) echo esc_url($instance['linkedin']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>"><?php esc_html_e('Tumblr Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>" name="<?php echo esc_attr($this->get_field_name('tumblr')); ?>" value="<?php if( !empty($instance['tumblr']) ) echo esc_url($instance['tumblr']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'flickr' )); ?>"><?php esc_html_e('Flickr Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'flickr' )); ?>" name="<?php echo esc_attr($this->get_field_name('flickr')); ?>" value="<?php if( !empty($instance['flickr']) ) echo esc_url($instance['flickr']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>"><?php esc_html_e('Instagram Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>" value="<?php if( !empty($instance['instagram']) ) echo esc_url($instance['instagram']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'skype' )); ?>"><?php esc_html_e('Skype Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'skype' )); ?>" name="<?php echo esc_attr($this->get_field_name('skype')); ?>" value="<?php if( !empty($instance['skype']) ) echo esc_url($instance['skype']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'snapchat' )); ?>"><?php esc_html_e('Snapchat Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'snapchat' )); ?>" name="<?php echo esc_attr($this->get_field_name('snapchat')); ?>" value="<?php if( !empty($instance['snapchat']) ) echo esc_url($instance['snapchat']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'myspace' )); ?>"><?php esc_html_e('Myspace Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'myspace' )); ?>" name="<?php echo esc_attr($this->get_field_name('myspace')); ?>" value="<?php if( !empty($instance['myspace']) ) echo esc_url($instance['myspace']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>"><?php esc_html_e('Youtube Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>" value="<?php if( !empty($instance['youtube']) ) echo esc_url($instance['youtube']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'bloglovin' )); ?>"><?php esc_html_e('Bloglovin Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'bloglovin' )); ?>" name="<?php echo esc_attr($this->get_field_name('bloglovin')); ?>" value="<?php if( !empty($instance['bloglovin']) ) echo esc_url($instance['bloglovin']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'digg' )); ?>"><?php esc_html_e('Digg Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'digg' )); ?>" name="<?php echo esc_attr($this->get_field_name('digg')); ?>" value="<?php if( !empty($instance['digg']) ) echo esc_url($instance['digg']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>"><?php esc_html_e('Dribbble Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>" name="<?php echo esc_attr($this->get_field_name('dribbble')); ?>" value="<?php if( !empty($instance['dribbble']) ) echo esc_url($instance['dribbble']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'soundcloud' )); ?>"><?php esc_html_e('Soundcloud Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'soundcloud' )); ?>" name="<?php echo esc_attr($this->get_field_name('soundcloud')); ?>" value="<?php if( !empty($instance['soundcloud']) ) echo esc_url($instance['soundcloud']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'vimeo' )); ?>"><?php esc_html_e('Vimeo Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'vimeo' )); ?>" name="<?php echo esc_attr($this->get_field_name('vimeo')); ?>" value="<?php if( !empty($instance['vimeo']) ) echo esc_url($instance['vimeo']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'reddit' )); ?>"><?php esc_html_e('Reddit Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'reddit' )); ?>" name="<?php echo esc_attr($this->get_field_name('reddit')); ?>" value="<?php if( !empty($instance['reddit']) ) echo esc_url($instance['reddit']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'whatsapp' )); ?>"><?php esc_html_e('Whatsapp Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'whatsapp' )); ?>" name="<?php echo esc_attr($this->get_field_name('whatsapp')); ?>" value="<?php if( !empty($instance['whatsapp']) ) echo esc_url($instance['whatsapp']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'vkontakte' )); ?>"><?php esc_html_e('Vkontakte Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'vkontakte' )); ?>" name="<?php echo esc_attr($this->get_field_name('vkontakte')); ?>" value="<?php if( !empty($instance['vkontakte']) ) echo esc_url($instance['vkontakte']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>"><?php esc_html_e('RSS Url:','bingo-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>" name="<?php echo esc_attr($this->get_field_name('rss')); ?>" value="<?php if( !empty($instance['rss']) ) echo esc_url($instance['rss']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('new_tab')); ?>"><?php esc_attr_e('Open in new tab','bingo-core'); ?></label>
            <input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id('new_tab')); ?>" name="<?php echo esc_attr($this->get_field_name('new_tab')); ?>" value="true" <?php if (!empty($instance['new_tab'])) echo 'checked="checked"'; ?>  />
        </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id('enable_color')); ?>"><?php esc_attr_e('Enable icon color','bingo-core'); ?></label>
		    <input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id('enable_color')); ?>" name="<?php echo esc_attr($this->get_field_name('enable_color')); ?>" value="true" <?php if (!empty($instance['enable_color'])) echo 'checked="checked"'; ?>  />
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id('title_color')); ?>"><?php esc_html_e('Title Text Color (hex value):', 'bingo-core'); ?></label>
		    <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_color')); ?>" value="<?php echo esc_attr($instance['title_color']); ?>"/>
	    </p>
    <?php
    }
}
