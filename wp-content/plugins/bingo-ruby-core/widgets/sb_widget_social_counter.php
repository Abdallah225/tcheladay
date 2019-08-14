<?php
add_action( 'widgets_init', 'bingo_ruby_register_sb_social_counter' );

function bingo_ruby_register_sb_social_counter() {
	register_widget( 'bingo_ruby_sb_social_counter' );
}

class bingo_ruby_sb_social_counter extends WP_Widget {

	//register widget
	function __construct() {
		$widget_ops = array( 'classname'   => 'sb-widget sb-widget-social-counter',
		                     'description' => esc_html__( '[Sidebar Widget] Display number of social followers in sidebar sections', 'bingo-core' )
		);
		parent::__construct( 'bingo_ruby_sb_social_counter_widget', esc_html__( '[SIDEBAR] - Social Counter', 'bingo-core' ), $widget_ops );
	}

	//render widget
	function widget( $args, $instance ) {
		extract( $args );
		$title           = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
		$title_color     = ( ! empty( $instance['title_color'] ) ) ? $instance['title_color'] : '';
		$style           = ! empty( $instance['style'] ) ? $instance['style'] : 'style-1';
		$facebook_page   = ( ! empty( $instance['facebook_page'] ) ) ? $instance['facebook_page'] : '';
        $facebook_token   = ( ! empty( $instance['facebook_token'] ) ) ? $instance['facebook_token'] : '';
		$youtube_user    = ( ! empty( $instance['youtube_user'] ) ) ? $instance['youtube_user'] : '';
		$youtube_channel = ( ! empty( $instance['youtube_channel'] ) ) ? $instance['youtube_channel'] : '';
		$dribbble_user   = ( ! empty( $instance['dribbble_user'] ) ) ? $instance['dribbble_user'] : '';
		$dribbble_token  = ( ! empty( $instance['dribbble_token'] ) ) ? $instance['dribbble_token'] : '';
		$soundcloud_user = ( ! empty( $instance['soundcloud_user'] ) ) ? $instance['soundcloud_user'] : '';
		$soundcloud_api  = ( ! empty( $instance['soundcloud_api'] ) ) ? $instance['soundcloud_api'] : '';
		$instagram_api   = ( ! empty( $instance['instagram_api'] ) ) ? $instance['instagram_api'] : '';
		$twitter_user    = ( ! empty( $instance['twitter_user'] ) ) ? $instance['twitter_user'] : '';
		$pinterest_user  = ( ! empty( $instance['pinterest_user'] ) ) ? $instance['pinterest_user'] : '';
		$vimeo_user      = ( ! empty( $instance['vimeo_user'] ) ) ? $instance['vimeo_user'] : '';
		$vk_user         = ( ! empty( $instance['vk_user'] ) ) ? $instance['vk_user'] : '';
		$google_id       = ( ! empty( $instance['google_id'] ) ) ? $instance['google_id'] : '';
		$google_api      = ( ! empty( $instance['google_api'] ) ) ? $instance['google_api'] : '';

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

		<div class="widget-content-wrap">
			<div class="sb-social-counter social-counter-wrap <?php echo esc_attr($style) ?>">

				<?php
				//facebook counter
                if ( ! empty( $facebook_page ) || ! empty( $facebook_token ) ) :
                    $option['facebook_page'] = $facebook_page;
                    $option['facebook_token'] = $facebook_token;
                    $facebook_count          = bingo_ruby_plugin_social_fan::get_sidebar_social_counter( 'facebook_page', $option ); ?>
                    <div class="counter-element bg-facebook">
                        <a target="_blank" href="http://facebook.com/<?php echo urlencode($facebook_page); ?>" class="facebook" title="facebook">
							<span class="counter-element-inner">
								<i class="fa fa-facebook-square"></i>
								<span class="num-count"><?php echo esc_attr(bingo_ruby_core::show_over_100k($facebook_count)); ?></span>
								<span class="text-count"><?php esc_html_e('fans', 'bingo-core'); ?></span>
							</span>
                            <?php if ( 'style-2' == $style ) : ?>
                                <span class="counter-element-right"><?php esc_html_e('like','bingo-core'); ?></span>
                            <?php  endif; ?>
                        </a>
                    </div><!--facebook like count -->
                <?php  endif;

				//twitter counter
				if ( ! empty( $twitter_user ) ) :
					$option['twitter_user'] = $twitter_user;
					$twitter_count          = bingo_ruby_plugin_social_fan::get_sidebar_social_counter( 'twitter', $option ); ?>
					<div class="counter-element bg-twitter">
						<a target="_blank" href="http://twitter.com/<?php echo urlencode($twitter_user); ?>" class="twitter" title="twitter">
							<span class="counter-element-inner">
								<i class="fa fa-twitter"></i>
								<span class="num-count"><?php echo esc_attr(bingo_ruby_core::show_over_100k($twitter_count)); ?></span>
								<span class="text-count"><?php esc_html_e('followers', 'bingo-core'); ?></span>
							</span>
							<?php if ( 'style-2' == $style ) : ?>
								<span class="counter-element-right"><?php esc_html_e('follow','bingo-core'); ?></span>
							<?php  endif; ?>
						</a>
					</div><!--twitter follower count -->
				<?php endif;

				if ( ! empty( $pinterest_user ) ) :
					$option['pinterest_user'] = $pinterest_user;
					$pinterest_count  = bingo_ruby_plugin_social_fan::get_sidebar_social_counter( 'pinterest', $option ); ?>
					<div class="counter-element bg-pinterest">
						<a target="_blank" href="http://pinterest.com/<?php echo urlencode($pinterest_user); ?>" class="pinterest" title="pinterest">
							<span class="counter-element-inner">
							<i class="fa fa-pinterest"></i>
							<span class="num-count"><?php echo esc_attr(bingo_ruby_core::show_over_100k($pinterest_count)); ?></span>
							<span class="text-count"><?php esc_html_e('followers', 'bingo-core'); ?></span>
							</span>
							<?php if ( 'style-2' == $style ) : ?>
								<span class="counter-element-right"><?php esc_html_e('pin','bingo-core'); ?></span>
							<?php  endif; ?>
						</a>
					</div><!--pinterest follower count -->
				<?php endif;

				//youtube counter
				if ( ! empty( $youtube_user ) || !empty($youtube_channel) ) :
					$option['youtube_user'] = $youtube_user;
					$option['youtube_channel'] = $youtube_channel;
					$youtube_count          = bingo_ruby_plugin_social_fan::get_sidebar_social_counter( 'youtube', $option ); ?>
					<div class="counter-element bg-youtube">
						  <?php if($option['youtube_user']) : ?>
                            <a target="_blank" href="https://www.youtube.com/user/<?php echo esc_html( $youtube_user ); ?>" title="<?php esc_html_e('Youtube', 'bingo-core'); ?>">
                        <?php else : ?>
                            <a target="_blank" href="https://www.youtube.com/channel/<?php echo esc_html( $youtube_channel ); ?>" title="<?php esc_html_e('Youtube', 'bingo-core'); ?>">
                        <?php endif; ?>
							<span class="counter-element-inner">
							<i class="fa fa-youtube"></i>
							<span class="num-count"><?php echo esc_attr(bingo_ruby_core::show_over_100k($youtube_count)); ?></span>
							<span class="text-count"><?php esc_html_e('Subscribers', 'bingo-core'); ?></span>
							</span>
							<?php if ( 'style-2' == $style ) : ?>
								<span class="counter-element-right"><?php esc_html_e('subscribe','bingo-core'); ?></span>
							<?php  endif; ?>
						</a>
					</div><!--youtube subscribers count -->
				<?php endif;

				//instgarm counter
				if (!empty($instagram_api)):
					$option['instagram_api'] = $instagram_api;
					$data_instagram = bingo_ruby_plugin_social_fan::get_sidebar_social_counter('instagram', $option);
					if ( empty( $data_instagram ) ) {
						$data_instagram = array(
							'count'     => 0,
							'user_name' => '',
							'url'       => '',
						);
					} ?>
					<div class="counter-element bg-instagram">
						<a target="_blank" href="<?php echo esc_url($data_instagram['url']) ?>" title="instagram">
							<span class="counter-element-inner">
							<i class="fa fa-instagram"></i>
							<span class="num-count"><?php echo esc_attr(bingo_ruby_core::show_over_100k($data_instagram['count'])); ?></span>
							<span class="text-count"><?php esc_html_e('Followers', 'bingo-core'); ?></span>
							</span>
							<?php if ( 'style-2' == $style ) : ?>
								<span class="counter-element-right"><?php esc_html_e('follow','bingo-core'); ?></span>
							<?php  endif; ?>
						</a>
					</div><!--instagram follower count -->

				<?php endif;

				//soundcloud counter
				if ( ! empty( $soundcloud_user ) && ! empty( $soundcloud_api ) ):
					$option['soundcloud_user'] = $soundcloud_user;
					$option['soundcloud_api']  = $soundcloud_api;
					$soundcloud_data           = bingo_ruby_plugin_social_fan::get_sidebar_social_counter( 'soundcloud', $option );
					if ( empty( $soundcloud_data ) ) {
						$soundcloud_data = array(
							'url'   => '',
							'count' => ''
						);
					} ?>
					<div class="counter-element bg-soundcloud">
						<a target="_blank" href="<?php echo esc_url($soundcloud_data['url']); ?>" title="<?php esc_html_e('soundclound', 'bingo-core'); ?>">
							<span class="counter-element-inner">
							<i class="fa fa-soundcloud"></i>
							<span class="num-count"><?php echo esc_attr(bingo_ruby_core::show_over_100k($soundcloud_data['count'])); ?></span>
							<span class="text-count"><?php esc_html_e('Followers', 'bingo-core'); ?></span>
							</span>
							<?php if ( 'style-2' == $style ) : ?>
								<span class="counter-element-right"><?php esc_html_e('follow','bingo-core'); ?></span>
							<?php  endif; ?>
						</a>

					</div><!--soundcloud follower count -->
				<?php endif;

				//vimeo counter
				if ( ! empty( $vimeo_user ) ) :
					$option['vimeo_user'] = $vimeo_user;
					$vimeo_count          = bingo_ruby_plugin_social_fan::get_sidebar_social_counter( 'vimeo', $option ); ?>
					<div class="counter-element bg-vimeo">
						<a target="_blank" href="https://vimeo.com/<?php echo esc_attr($vimeo_user); ?>" title="vimeo">
							<span class="counter-element-inner">
							<i class="fa fa-vimeo-square"></i>
							<span class="num-count"><?php echo esc_attr(bingo_ruby_core::show_over_100k($vimeo_count)); ?></span>
							<span class="text-count"><?php esc_html_e('Likes', 'bingo-core'); ?></span>
							</span>
							<?php if ( 'style-2' == $style ) : ?>
								<span class="counter-element-right"><?php esc_html_e('like','bingo-core'); ?></span>
							<?php  endif; ?>
						</a>
					</div><!--vimeo follower count -->
				<?php endif;

				//dribbble counter

                if ( ! empty( $dribbble_user ) || !empty($dribbble_token) ) :
                    $option['dribbble_user'] = $dribbble_user;
                    $option['dribbble_token'] = $dribbble_token;
                    $dribbble_count          = bingo_ruby_plugin_social_fan::get_sidebar_social_counter( 'dribbble', $option ); ?>
                    <div class="counter-element bg-dribbble">
                        <a target="_blank" href="http://dribbble.com/<?php echo esc_attr($dribbble_user); ?>" title="<?php esc_html_e('dribbble', 'bingo-core'); ?>">
							<span class="counter-element-inner">
							<i class="fa fa-dribbble"></i>
							<span class="num-count"><?php echo esc_attr(bingo_ruby_core::show_over_100k($dribbble_count)); ?></span>
							<span class="text-count"><?php esc_html_e('Followers', 'bingo-core'); ?></span>
							</span>
                            <?php if ( 'style-2' == $style ) : ?>
                                <span class="counter-element-right"><?php esc_html_e('follow','bingo-core'); ?></span>
                            <?php  endif; ?>
                        </a>

                    </div><!--dribbble follower count -->
                <?php endif;

			//vk counter
			if ( ! empty( $vk_user ) ) :
				$option['vk_user'] = $vk_user;
				$vk_count          = bingo_ruby_plugin_social_fan::get_sidebar_social_counter( 'vk', $option ); ?>
				<div class="counter-element bg-vk">
					<a target="_blank" href="http://vk.com/<?php echo esc_attr($vk_user); ?>" title="vk">
							<span class="counter-element-inner">
							<i class="fa fa-vk"></i>
							<span class="num-count"><?php echo esc_attr(bingo_ruby_core::show_over_100k($vk_count)); ?></span>
							<span class="text-count"><?php esc_html_e('Members', 'bingo-core'); ?></span>
							</span>
						<?php if ( 'style-2' == $style ) : ?>
							<span class="counter-element-right"><?php esc_html_e('Member','bingo-core'); ?></span>
						<?php  endif; ?>
					</a>
				</div><!--vk follower count -->
			<?php endif;

			//google counter
			if ( ! empty( $google_id ) && ! empty( $google_api ) ):
				$option['google_id']  = $google_id;
				$option['google_api'] = $google_api;
				$google_data          = bingo_ruby_plugin_social_fan::get_sidebar_social_counter( 'google', $option ); ?>
				<div class="counter-element bg-google">
					<a target="_blank" href="http://plus.google.com/<?php echo esc_attr($google_id); ?>" title="<?php esc_html_e('google', 'bingo-core'); ?>">
						<span class="counter-element-inner">
								<i class="fa fa-google"></i>
								<span class="num-count"><?php echo esc_attr( bingo_ruby_core::show_over_100k( $google_data ) ); ?></span>
								<span class="text-count"><?php esc_html_e('Followers', 'bingo-core'); ?></span>
						</span>
						<?php if ( 'style-2' == $style ) : ?>
							<span class="counter-element-right"><?php esc_html_e('follow','bingo-core'); ?></span>
						<?php  endif; ?>
					</a>

				</div><!--google follower count -->
			<?php endif; ?>

			</div><!-- #social count wrap -->
		</div><!-- #widget content wrap -->

		<?php
		echo $after_widget;
	}

	//update widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//remove cache
		delete_transient( 'bingo_ruby_sb_social_fan_facebook_page' );
		delete_transient( 'bingo_ruby_sb_social_fan_twitter' );
		delete_transient( 'bingo_ruby_sb_social_fan_pinterest' );
		delete_transient( 'bingo_ruby_sb_social_fan_instagram' );
		delete_transient( 'bingo_ruby_sb_social_fan_youtube' );
		delete_transient( 'bingo_ruby_sb_social_fan_soundcloud' );
		delete_transient( 'bingo_ruby_sb_social_fan_vimeo' );
		delete_transient( 'bingo_ruby_sb_social_fan_dribbble' );
		delete_transient( 'bingo_ruby_sb_social_fan_vk' );
		delete_transient( 'bingo_ruby_sb_social_fan_google' );

		$instance['title']           = strip_tags( $new_instance['title'] );
		$instance['title_color']     = strip_tags( $new_instance['title_color'] );
		$instance['style']           = strip_tags( $new_instance['style'] );
		$instance['facebook_page']   = strip_tags( $new_instance['facebook_page'] );
        $instance['facebook_token']   = strip_tags( $new_instance['facebook_token'] );
		$instance['twitter_user']    = strip_tags( $new_instance['twitter_user'] );
		$instance['youtube_user']    = strip_tags( $new_instance['youtube_user'] );
		$instance['youtube_channel'] = strip_tags( $new_instance['youtube_channel'] );
		$instance['dribbble_user']   = strip_tags( $new_instance['dribbble_user'] );
		$instance['dribbble_token']  = strip_tags( $new_instance['dribbble_token'] );
		$instance['soundcloud_user'] = strip_tags( $new_instance['soundcloud_user'] );
		$instance['soundcloud_api']  = strip_tags( $new_instance['soundcloud_api'] );
		$instance['instagram_api']   = strip_tags( $new_instance['instagram_api'] );
		$instance['pinterest_user']  = strip_tags( $new_instance['pinterest_user'] );
		$instance['vimeo_user']      = strip_tags( $new_instance['vimeo_user'] );
		$instance['vk_user']         = strip_tags( $new_instance['vk_user'] );
		$instance['google_id']       = strip_tags( $new_instance['google_id'] );
		$instance['google_api']      = strip_tags( $new_instance['google_api'] );

		return $instance;
	}

	//form setting
	function form( $instance ) {

		$defaults = array(
			'title'           => esc_html__( 'stay connected', 'bingo-core' ),
			'title_color'     => '',
			'style'           => 'style-1',
			'youtube_user'    => '',
			'youtube_channel' => '',
			'dribbble_user'   => '',
			'dribbble_token'  => '',
			'twitter_user'    => '',
			'facebook_page'   => '',
            'facebook_token'   => '',
			'soundcloud_user' => '',
			'soundcloud_api'  => '',
			'pinterest_user'  => '',
			'instagram_api'   => '',
			'vimeo_user'      => '',
			'vk_user'         => '',
			'google_id'       => '',
			'google_api'      => ''

		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_attr_e('Title:','bingo-core') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php if(!empty($instance['title'])) echo esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><?php esc_attr_e('Style:', 'bingo-core'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>" >
				<option value="style-1" <?php if( !empty($instance['style']) && $instance['style'] == 'style-1' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 1', 'bingo-core'); ?></option>
				<option value="style-2" <?php if( !empty($instance['style']) && $instance['style'] == 'style-2' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 2', 'bingo-core'); ?></option>
			</select>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook_page' )); ?>"><strong><?php esc_attr_e('Facebook Page Name:', 'bingo-core');?></strong></label>
			<input type="text" class="widefat"   id="<?php echo esc_attr($this->get_field_id( 'facebook_page' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_page' )); ?>" value="<?php echo esc_attr($instance['facebook_page']); ?>" />
		</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'facebook_token' )); ?>"><?php esc_attr_e('Facebook Token (Client Access Token):','bingo-core') ?> </label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'facebook_token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook_token' )); ?>" value="<?php echo esc_attr($instance['facebook_token']); ?>"/>
        </p>
        <p><?php echo html_entity_decode( esc_html__( 'How to Create Facebook Access Token on: <a target="_blank" href="https://weblizar.com/blog/generate-facebook-access-token/">https://weblizar.com/blog/generate-facebook-access-token/</a></p>', 'bingo-core' ) ); ?></p>
        <p>
            <?php esc_html_e('This is an additional option, Use your token if the facebook counter cannot work correctly.', 'bingo-core'); ?>
        </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'twitter_user' )); ?>"><strong><?php esc_attr_e('Twitter Name:', 'bingo-core');?></strong></label>
			<input type="text"  class="widefat"  id="<?php echo esc_attr($this->get_field_id( 'twitter_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter_user' )); ?>" value="<?php echo esc_attr($instance['twitter_user']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'pinterest_user' )); ?>"><strong><?php esc_attr_e('Pinterest User Name:','bingo-core');?></strong> </label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'pinterest_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest_user' )); ?>" value="<?php echo esc_attr($instance['pinterest_user']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'instagram_api' )); ?>"><strong><?php esc_attr_e('Instagram Access Token Key:','bingo-core') ?></strong> </label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'instagram_api' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram_api' )); ?>" value="<?php echo esc_textarea($instance['instagram_api']); ?>"/>
		</p>
		<p><?php echo html_entity_decode( esc_html__( 'How to Create an app and generate your Instagram access token on: <a target="_blank" href="http://instagram.rubyThemes.com/">Instagram access token tutorial</a> website</p>', 'bingo-core' ) ); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'youtube_user' )); ?>"><strong><?php esc_attr_e('Youtube User Name:', 'bingo-core');?></strong></label>
			<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube_user' )); ?>" value="<?php echo esc_attr($instance['youtube_user']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'youtube_channel' )); ?>"><strong><?php esc_attr_e('Youtube Channel ID:', 'bingo-core');?></strong></label>
			<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'youtube_channel' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube_channel' )); ?>" value="<?php echo esc_attr($instance['youtube_channel']); ?>"/>
		</p>
		<p><?php esc_attr_e('Use channel ID if you can not enough subscriber to create username for channel. Make sure leave blank user name when input channel ID.','bingo-core') ?></p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'soundcloud_user' )); ?>"><strong><?php esc_attr_e('SoundCloud User Name:','bingo-core');?></strong> </label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'soundcloud_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'soundcloud_user' )); ?>" value="<?php echo esc_attr($instance['soundcloud_user']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'soundcloud_api' )); ?>"><?php esc_attr_e('Soundcloud API Key(Client ID) :','bingo-core') ?> </label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'soundcloud_api' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'soundcloud_api' )); ?>" value="<?php echo esc_attr($instance['soundcloud_api']); ?>"/>
		</p>
		<p><a target="_blank" href="http://soundcloud.com/you/apps/"><?php esc_attr_e('Generate your soundcloud app','bingo-core') ?></a></p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'vimeo_user' )); ?>"><strong><?php esc_attr_e('Vimeo User Name:','bingo-core');?></strong> </label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'vimeo_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vimeo_user' )); ?>" value="<?php echo esc_attr($instance['vimeo_user']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'dribbble_user' )); ?>"><strong><?php esc_attr_e('Dribbble User Name:', 'bingo-core');?></strong></label>
			<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dribbble_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble_user' )); ?>" value="<?php echo esc_attr($instance['dribbble_user']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'dribbble_token' )); ?>"><strong><?php esc_attr_e('Dribbble Token (Client Access Token):', 'bingo-core');?></strong></label>
			<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'dribbble_token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble_token' )); ?>" value="<?php echo esc_attr($instance['dribbble_token']); ?>" />
		</p>
		<p><a target="_blank" href="https://dribbble.com/account/applications/new"><?php esc_attr_e('Generate your dribbble app','bingo-core') ?></a></p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'vk_user' )); ?>"><strong><?php esc_attr_e('VK User Name/ID:', 'bingo-core');?></strong></label>
			<input type="text"  class="widefat" id="<?php echo esc_attr($this->get_field_id( 'vk_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vk_user' )); ?>" value="<?php echo esc_attr($instance['vk_user']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'google_id' )); ?>"><strong><?php esc_attr_e('Goolge+ ID:','bingo-core');?></strong> </label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'google_id' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'google_id' )); ?>" value="<?php echo esc_attr($instance['google_id']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'google_api' )); ?>"><?php esc_attr_e('Google API Key:','bingo-core') ?> </label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'google_api' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'google_api' )); ?>" value="<?php echo esc_attr($instance['google_api']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_color')); ?>"><?php esc_html_e('Title Text Color (hex value):', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_color')); ?>" value="<?php echo esc_attr($instance['title_color']); ?>"/>
		</p>
		<p><a target="_blank" href="https://console.developers.google.com/projectselector/apis/library/"><?php esc_attr_e('Google API Key, Click Here For More Details.','bingo-core') ?></a></p>
	<?php
	}
} 