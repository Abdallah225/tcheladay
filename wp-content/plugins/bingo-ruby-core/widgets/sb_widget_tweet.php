<?php
//Twitter Tweet widgets
add_action('widgets_init','bingo_ruby_register_twitter_widget');

function bingo_ruby_register_twitter_widget() {
    register_widget('bingo_ruby_twitter_widget');
}


class bingo_ruby_twitter_widget extends WP_Widget {

	//register widget
	function __construct()
    {
		$widget_ops = array('classname'   => 'sb-widget sb-widget-twitter', 'description' => esc_html__( '[Sidebar Widget] Display latest tweets in sidebar. This widget need to install oAuth Twitter Feed for Developers plugin', 'bingo-core' ));
		parent::__construct( 'bingo_ruby_twitter_widget', esc_html__( '[SIDEBAR] - Twitter tweets', 'bingo-core' ), $widget_ops );
	}

	//render widget
    function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters('widget_title', !empty($instance['title']) ? $instance['title'] : '', $instance);
        $title_color = (!empty($instance['title_color'])) ? $instance['title_color'] : '';
        $options['twitter_user'] = (!empty($instance['twitter_user'])) ? $instance['twitter_user'] : '';
        $options['num_tweets'] = (!empty($instance['num_tweets'])) ? $instance['num_tweets'] : 5;

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
		    <ul class="twitter-widget-inner">
			    <?php if ( function_exists( 'getTweets' ) ) :
				    $tweets_data = getTweets( $options['num_tweets'], $options['twitter_user'] );
				    if ( ! empty( $tweets_data ) && is_array( $tweets_data ) && empty( $tweets_data['error'] ) ) :
					    foreach ( $tweets_data as $tweet ) :
						    $tweet['text'] = preg_replace( '/\b([a-zA-Z]+:\/\/[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i', "<a href=\"$1\" class=\"twitter-link\">$1</a>", $tweet['text'] );
						    $tweet['text'] = preg_replace( '/\b(?<!:\/\/)(www\.[\w_.\-]+\.[a-zA-Z]{2,6}[\/\w\-~.?=&%#+$*!]*)\b/i', "<a href=\"http://$1\" class=\"twitter-link\">$1</a>", $tweet['text'] );
						    $tweet['text'] = preg_replace( "/\b([a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]*\@[a-zA-Z][a-zA-Z0-9\_\.\-]*[a-zA-Z]{2,6})\b/i", "<a href=\"mailto://$1\" class=\"twitter-link\">$1</a>", $tweet['text'] );
						    $tweet['text'] = preg_replace( '/([\.|\,|\:|\>|\{|\(]?)#{1}(\w*)([\.|\,|\:|\!|\?|\>|\}|\)]?)\s/i', "$1<a href=\"http://twitter.com/#search?q=$2\" class=\"twitter-link\">#$2</a>$3 ", $tweet['text'] );
						    $tweet['text'] = str_replace( 'RT', ' ', $tweet['text'] );

						    $time = strtotime( $tweet['created_at'] );
						    if ( ( abs( time() - $time ) ) < 86400 ) {
							    $h_time = sprintf( esc_html__( '%s ago', 'bingo-core' ), human_time_diff( $time ) );
						    } else {
							    $h_time = date( 'M j, Y', $time );
						    }
						    ?>

						    <li class="twitter-content post-excerpt">
							    <p><?php echo do_shortcode( $tweet['text'] ); ?></p>
							    <em class="twitter-timestamp"><?php echo esc_attr( $h_time ) ?></em>
						    </li>

					    <?php endforeach; ?>
				    <?php
				    else :
					    echo '<li><p class="ruby-error">' . $tweets_data['error'] . '</p></li>';
				    endif; ?>
			    <?php else : echo '<p class="ruby-error">' . esc_html__( 'Please install plugin name "oAuth Twitter Feed for Developers', 'bingo-core' ) . '</p>'; ?>
			    <?php endif; ?>

		    </ul><!-- twitter feed -->
	    </div><!-- widget content wrap -->

        <?php
        echo $after_widget;
    }

    //update form
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        delete_transient('bingo_ruby_tweet_feed');
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['title_color'] = strip_tags($new_instance['title_color']);
        $instance['twitter_user'] = strip_tags($new_instance['twitter_user']);
        $instance['num_tweets'] = absint(strip_tags($new_instance['num_tweets']));
        return $instance;
    }


    //from settings
    function form( $instance ) {

	    $defaults = array(
		    'title'        => esc_html__( 'Latest Tweets', 'bingo-core' ),
            'title_color' => '',
		    'twitter_user' => '',
		    'num_tweets'   => 5
	    );
	    $instance = wp_parse_args( (array) $instance, $defaults );
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><strong><?php esc_attr_e('Title:', 'bingo-core');?></strong></label>
            <input type="text" class="widefat"  id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'twitter_user' )); ?>"><strong><?php esc_attr_e('Twitter Name:', 'bingo-core');?></strong></label>
            <input type="text" class="widefat"  id="<?php echo esc_attr($this->get_field_id( 'twitter_user' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter_user' )); ?>" value="<?php echo esc_attr($instance['twitter_user']); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'num_tweets' )); ?>"><strong><?php esc_attr_e('Number of Tweets:', 'bingo-core');?></strong></label>
            <input type="text" class="widefat"  id="<?php echo esc_attr($this->get_field_id( 'num_tweets' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'num_tweets' )); ?>" value="<?php echo esc_attr($instance['num_tweets']); ?>"/>
        </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id('title_color')); ?>"><?php esc_html_e('Title Text Color (hex value):', 'bingo-core'); ?></label>
		    <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_color')); ?>" value="<?php echo esc_attr($instance['title_color']); ?>"/>
	    </p>
        <p><a href="http://dev.twitter.com/apps" target="_blank"><?php esc_attr_e('Create your Twitter App', 'bingo-core'); ?></a><?php esc_html_e('and install','bingo-core'); ?><a href="https://wordpress.org/plugins/oauth-twitter-feed-for-developers/"><?php esc_html_e('"oAuth Twitter Feed for Developers" Plugin','bingo-core');?></a></p>
    <?php
    }
}
