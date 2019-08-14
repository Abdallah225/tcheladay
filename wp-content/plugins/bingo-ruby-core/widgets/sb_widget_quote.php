<?php
//quote widget
add_action('widgets_init', 'bingo_ruby_register_widget_quote_fw');

function bingo_ruby_register_widget_quote_fw()
{
    register_widget('bingo_ruby_widget_quote_fw');
}

//register widget
class bingo_ruby_widget_quote_fw extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'ruby-widget-quote is-full-widget', 'description' => esc_html__('Show quote text', 'bingo-core'));
        parent::__construct('bingo_ruby_widget_quote_fw', esc_html__('[SIDEBAR] - Quote Text*', 'bingo-core'), $widget_ops);
    }

	//load widget
	function widget( $args, $instance ) {
		extract( $args );
		$quote_text   = ( ! empty( $instance['quote_text'] ) ) ? $instance['quote_text'] : '';
		$img          = ( ! empty( $instance['image_url'] ) ) ? $instance['image_url'] : '';
		$quote_social = ( ! empty( $instance['quote_social'] ) ) ? $instance['quote_social'] : '';

		//check empty
		if ( ! function_exists( 'bingo_ruby_social_profile_web' ) || ! function_exists( 'bingo_ruby_render_social_icon' ) ) {
			return false;
		}

        //render
        echo $before_widget; ?>

	    <div class="widget-content-wrap">
		    <div class="quote-text-content">
			    <?php if ( ! empty( $img ) ) : ?>
				    <img class="quote-image" src="<?php echo esc_url($img); ?>" alt="<?php bloginfo('name') ?>">
			    <?php endif; ?>
			    <?php if(!empty($quote_text)) : ?>
				    <div class="quote-text">
					    <p><?php echo esc_html( $quote_text ) ?></p>
				    </div>
			    <?php endif; ?>
			    <?php if ( ! empty( $quote_social ) ) : ?>
				    <div class="quote-social">
					    <?php $bingo_ruby_social_profile = bingo_ruby_social_profile_web(); ?>
					    <?php echo bingo_ruby_render_social_icon( $bingo_ruby_social_profile ); ?>
				    </div>
			    <?php endif; ?>
		    </div>
	    </div>


        <?php  echo $after_widget;

    }

	//update
	function update( $new_instance, $old_instance ) {
		$instance               = $old_instance;
		$instance['image_url']  = strip_tags( $new_instance['image_url'] );
		$instance['quote_text'] = strip_tags( $new_instance['quote_text'] );
		$instance['quote_social']     = strip_tags( $new_instance['quote_social'] );

		return $instance;
	}

	//load form
	function form( $instance ) {
		$defaults = array(
			'image_url'    => '',
			'quote_text'   => '',
			'quote_social' => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults );  ?>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id('image_url')); ?>"><?php esc_html_e('Ads Image Url:', 'bingo-core'); ?></label>
		    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_url')); ?>" name="<?php echo esc_attr($this->get_field_name('image_url')); ?>" type="text" value="<?php if( !empty($instance['image_url']) ) echo esc_url($instance['image_url']); ?>"/>
	    </p>

	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'quote_text' )); ?>"><?php esc_html_e('Quote text:','bingo-core'); ?></label>
		    <textarea rows="10" cols="50" id="<?php echo esc_attr($this->get_field_id( 'quote_text' )); ?>" name="<?php echo esc_attr($this->get_field_name('quote_text')); ?>" class="widefat"><?php echo esc_html($instance['quote_text']); ?></textarea>
	    </p>

	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'quote_social' )); ?>"><?php esc_html_e('Show Social When Click:','bingo-core') ?></label>
		    <input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'quote_social' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'quote_social' )); ?>" value="checked" <?php if( !empty( $instance['quote_social'] ) ) echo 'checked="checked"'; ?>  />
	    </p>

    <?php
    }
}

?>