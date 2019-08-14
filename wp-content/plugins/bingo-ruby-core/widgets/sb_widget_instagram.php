<?php
/**
 * instagram Widget
 * display instagram grid images
 */
add_action('widgets_init', 'bingo_ruby_register_instagram_widget');

function bingo_ruby_register_instagram_widget()
{
    register_widget('bingo_ruby_sb_instagram');
}

class bingo_ruby_sb_instagram extends WP_Widget {

	//register widget
	function __construct()
    {
		$widget_ops = array('classname'   => 'sb-instagram-widget','description' => esc_attr__( '[Sidebar Widget] Display Instagram Image grid in sidebar sections', 'bingo-core' ));
		parent::__construct( 'bingo_ruby_sb_instagram_widget', esc_attr__( '[SIDEBAR] - Instagram Grid', 'bingo-core' ), $widget_ops );
	}

	//render widget
    function widget($args, $instance)
    {
	    extract( $args, EXTR_SKIP );
	    $title           = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
	    $title_color     = ( ! empty( $instance['title_color'] ) ) ? $instance['title_color'] : '';
	    $instagram_token = ( ! empty( $instance['instagram_token'] ) ) ? $instance['instagram_token'] : '';
	    $num_images      = ( ! empty( $instance['num_image'] ) ) ? $instance['num_image'] : '';
	    $num_column      = ( ! empty( $instance['num_column'] ) ) ? $instance['num_column'] : 'col-xs-3';
	    $bottom_text     = ( ! empty( $instance['bottom_text'] ) ) ? $instance['bottom_text'] : '';
	    $click_popup     = ( ! empty( $instance['click_popup'] ) ) ? $instance['click_popup'] : '';
	    $tag             = ( ! empty( $instance['tag'] ) ) ? strip_tags( $instance['tag'] ) : '';

	    echo $before_widget;

	    if ( ! empty( $title ) ) {
		    echo $before_title;
		    if ( ! empty( $title_color ) ) {
			    echo '<span style="color:' . esc_attr( $title_color ) . ';">' . esc_attr( $title ) . '</span>';
		    } else {
			    echo esc_attr( $title );
		    }
		    echo $after_title;
	    }

	    $data_images = get_transient( 'bingo_ruby_sb_instagram_cache' );
	    if ( empty( $data_images ) ) {
		    $data_images = bingo_ruby_plugin_data_instagram( $instagram_token, 'bingo_ruby_sb_instagram_cache', $num_images, $tag );
	    };

	    if ( ! empty( $data_images->data ) ) : ?>
		    <div class="sb-instagram-content-wrap widget-content-wrap row clearfix">
			    <div class="sb-instagram-content-inner">

				    <?php foreach ($data_images->data as $post_data) : ?>
					    <div class="instagram-el <?php echo esc_attr($num_column) ?>">
						    <?php if(!empty($click_popup))  : ?>
							    <a href="<?php echo esc_url($post_data->images->standard_resolution->url) ?>" class="instagram-popup-el cursor-zoom" data-source="<?php if(!empty($post_data->user->username)){ echo esc_attr($post_data->user->username); } ?>"><img src="<?php echo esc_url($post_data->images->low_resolution->url) ?>" alt=""></a>
						    <?php else : ?>
							    <a href="<?php echo esc_html( $post_data->link ); ?>" target="_blank"><img src="<?php echo esc_url($post_data->images->low_resolution->url) ?>" alt=""></a>
						    <?php endif; ?>
					    </div>
				    <?php endforeach; ?>


			    </div><!--# instagram content inner -->
		    </div><!--# instagram content wrap -->

		    <?php if(!empty($bottom_text)) : ?>
			    <div class="instagram-bottom-text"><?php echo html_entity_decode(stripcslashes($bottom_text)); ?></div>
		    <?php endif; ?>

		    <?php if ( ! empty( $click_popup ) ) {
			    //enable popup images
			    wp_localize_script( 'bingo_ruby_script_main', 'bingo_ruby_sb_instagram_popup', '1' );
		    } ?>
	    <?php else :
		    if ( is_string( $data_images ) ) {
			    echo( strval( $data_images ) );
		    };
	    endif;

	    echo $after_widget;
    }

	//update forms
	function update( $new_instance, $old_instance ) {

		delete_transient( 'bingo_ruby_sb_instagram_cache' );
		$instance                    = $old_instance;
		$instance['title']           = strip_tags( $new_instance['title'] );
		$instance['title_color']     = strip_tags( $new_instance['title_color'] );
		$instance['instagram_token'] = strip_tags( $new_instance['instagram_token'] );
		$instance['num_image']       = absint( strip_tags( $new_instance['num_image'] ) );
		$instance['bottom_text']     = addslashes( $new_instance['bottom_text'] );
		$instance['num_column']      = strip_tags( $new_instance['num_column'] );
		$instance['click_popup']     = strip_tags( $new_instance['click_popup'] );
		$instance['tag']             = strip_tags( $new_instance['tag'] );

		return $instance;
	}

	
    //form settings
    function form($instance)
    {
	    $defaults = array(
		    'title'           => esc_html__( 'instagram grid', 'bingo-core' ),
		    'instagram_token' => '',
		    'num_image'       => 9,
		    'num_column'      => 'col-xs-4',
		    'bottom_text'     => '',
		    'click_popup'     => '',
		    'tag'             => '',
		    'title_color'     => '',

	    );
	    $instance = wp_parse_args( (array) $instance, $defaults );

	    ?>
	    <p><?php echo html_entity_decode( esc_html__( 'How to Create an app and generate your Instagram access token on: <a target="_blank" href="http://instagram.rubyThemes.com/">Instagram access token tutorial</a> website</p>', 'bingo-core' ) ); ?>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_attr_e('Title:', 'bingo-core') ?></strong></label>
		    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>"/>
	    </p>

	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id('instagram_token')); ?>"><strong><?php esc_attr_e('Instagram Access Token:', 'bingo-core') ?></strong></label>
		    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('instagram_token')); ?>" name="<?php echo esc_attr($this->get_field_name('instagram_token')); ?>" type="text" value="<?php echo esc_attr($instance['instagram_token']); ?>"/>
	    </p>

	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id('num_image')); ?>"><strong><?php esc_attr_e('Limit Image Number:', 'bingo-core') ?></strong></label>
		    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('num_image')); ?>" name="<?php echo esc_attr($this->get_field_name('num_image')); ?>" type="text" value="<?php echo esc_attr($instance['num_image']); ?>"/>
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id('tag')); ?>"><strong><?php esc_attr_e('Display Image With Tag:', 'bingo-core') ?></strong><span><?php echo esc_html__( ' (Leave blank if you want display your images)', 'bingo-core' ); ?></span></label>
		    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('tag')); ?>" name="<?php echo esc_attr($this->get_field_name('tag')); ?>" type="text" value="<?php echo esc_attr($instance['tag']); ?>"/>
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'num_column' )); ?>"><strong><?php esc_attr_e('Number of Columns:', 'bingo-core'); ?></strong></label>
		    <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'num_column' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'num_column' )); ?>" >
			    <option value="col-xs-6" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'col-xs-6' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('2 columns', 'bingo-core'); ?></option>
			    <option value="col-xs-4" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'col-xs-4' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('3 columns', 'bingo-core'); ?></option>
			    <option value="col-xs-3" <?php if( !empty($instance['num_column']) && $instance['num_column'] == 'col-xs-3' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('4 columns', 'bingo-core'); ?></option>
		    </select>
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id('bottom_text')); ?>"><strong><?php esc_attr_e('Bottom Text:', 'bingo-core') ?></strong></label>
		    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('bottom_text')); ?>" name="<?php echo esc_attr($this->get_field_name('bottom_text')); ?>" type="text" value="<?php echo esc_html($instance['bottom_text']); ?>"/>
	    </p>

	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'click_popup' )); ?>"><?php esc_attr_e('Popup When Click:','bingo-core') ?></label>
		    <input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'click_popup' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'click_popup' )); ?>" value="checked" <?php if( !empty( $instance['click_popup'] ) ) echo 'checked="checked"'; ?>  />
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id('title_color')); ?>"><?php esc_html_e('Title Text Color (hex value):', 'bingo-core'); ?></label>
		    <input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_color')); ?>" value="<?php echo esc_attr($instance['title_color']); ?>"/>
	    </p>

    <?php
    }
}

