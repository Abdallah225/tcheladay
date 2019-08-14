<?php
//ads widget
add_action('widgets_init', 'bingo_ruby_register_ads_widget');
function bingo_ruby_register_ads_widget() {
    register_widget('bingo_ruby_sb_ad_widget');
}
//register widget
class bingo_ruby_sb_ad_widget extends WP_Widget
{
	//register widget
    function __construct()
    {
        $widget_ops = array('classname' => 'sb-widget sb-widget-ad', 'description' => esc_html__('[Sidebar Widget] Display your custom ads, your banner JS or Google Adsense code, Support Google Ads Responsive', 'bingo-core'));
        parent::__construct('bingo_ruby_sb_ad_widget', esc_html__('[SIDEBAR] - Advertisement Box', 'bingo-core'), $widget_ops);
    }

	//render widget
    function widget($args, $instance)
    {
	    extract( $args );
	    $title       = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
	    $title_color = ( ! empty( $instance['title_color'] ) ) ? $instance['title_color'] : '';
	    $ad_title    = ( ! empty( $instance['ad_title'] ) ) ? $instance['ad_title'] : '';
	    $url         = ( ! empty( $instance['url'] ) ) ? $instance['url'] : '';
	    $img         = ( ! empty( $instance['image_url'] ) ) ? $instance['image_url'] : '';
	    $google_ads  = ( ! empty( $instance['google_ads'] ) ) ? $instance['google_ads'] : '';

        echo $before_widget;

	    if ( ! empty( $title ) ) {
		    echo $before_title;
		    if ( ! empty( $title_color ) ) {
			    echo '<span style="color:' . esc_attr( $title_color ) . ';">' . esc_attr( $title ) . '</span>';
		    } else {
			    echo esc_attr( $title );
		    }
		    echo $after_title;
	    } ?>
        <div class="widget-ad-content-wrap widget-content-wrap clearfix">
	        <?php if ( ! empty( $ad_title ) ) : ?>
		        <div class="ad-title"><span><?php echo esc_html( $ad_title ); ?></span></div>
	        <?php endif; ?>
          <?php if(!empty($img)) : ?>
	          <div class="widget-ad-image">
            <?php if (!empty($url)) : ?>
                    <a class="widget-ad-link" target="_blank" href="<?php echo esc_url($url); ?>"><img class="ads-image" src="<?php echo esc_url($img); ?>" alt="<?php bloginfo('name') ?>"></a>
                <?php else : ?>
                    <img class="widget-ad-image-url" src="<?php echo esc_url($img); ?>" alt="<?php bloginfo('name') ?>">
                <?php endif; ?>
	          </div><!--# image ads -->
           <?php else : ?>
	          <div class="widget-ad-script">
		          <?php if ( ! empty( $google_ads ) && function_exists('bingo_ruby_ad_render_script') ) {
			          echo html_entity_decode( stripcslashes( bingo_ruby_ad_render_script( $google_ads, 'sidebar_ad' ) ) );
		          } ?>
	          </div>
            <?php endif; ?>
          </div>

        <?php  echo $after_widget;
    }

	//update forms
	function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance['title']       = strip_tags( $new_instance['title'] );
		$instance['title_color'] = strip_tags( $new_instance['title_color'] );
		$instance['ad_title']    = strip_tags( $new_instance['ad_title'] );
		$instance['url']         = strip_tags( $new_instance['url'] );
		$instance['image_url']   = strip_tags( $new_instance['image_url'] );
		$instance['google_ads']  = esc_js( $new_instance['google_ads'] );

		return $instance;
	}

	//form settings
	function form( $instance ) {
		$defaults = array(
			'title'       => '',
			'title_color' => '',
			'ad_title'    => esc_attr__( '- Advertisement -', 'bingo-core' ),
			'url'         => '',
			'image_url'   => '',
			'google_ads'  => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'bingo-core'); ?></strong></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('ad_title')); ?>"><?php esc_html_e('Ad Title:', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('ad_title')); ?>" name="<?php echo esc_attr($this->get_field_name('ad_title')); ?>" value="<?php echo esc_attr($instance['ad_title']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('Ads Link:', 'bingo-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php if( !empty($instance['url']) ) echo  esc_url($instance['url']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('image_url')); ?>"><?php esc_html_e('Ads Image Url:', 'bingo-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('image_url')); ?>" type="text" value="<?php if( !empty($instance['image_url']) ) echo esc_url($instance['image_url']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'google_ads' )); ?>"><?php esc_html_e('JS or Google AdSense Code:','bingo-core'); ?></label>
			<textarea rows="10" cols="50" id="<?php echo esc_attr($this->get_field_id( 'google_ads' )); ?>" name="<?php echo esc_attr($this->get_field_name('google_ads')); ?>" class="widefat"><?php echo html_entity_decode(stripcslashes($instance['google_ads'])); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_color')); ?>"><?php esc_html_e('Title Text Color (hex value):', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_color')); ?>" value="<?php echo esc_attr($instance['title_color']); ?>"/>
		</p>
		<p><?php esc_html_e('Please note: remove custom ad image and ad url if you want to use javascript code.','bingo-core'); ?></p>
	<?php
	}
}
