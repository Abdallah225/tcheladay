<?php
//ads widget
add_action( 'widgets_init', 'bingo_ruby_register_subscribe_widget' );

function bingo_ruby_register_subscribe_widget() {
	register_widget( 'bingo_ruby_sb_subscribe_widget' );
}

//register widget
class bingo_ruby_sb_subscribe_widget extends WP_Widget
{
	//register widget
	function __construct() {
		$widget_ops = array(
			'classname'   => 'sb-widget-subscribe',
			'description' => esc_html__( '[Sidebar Widget] Display subscribe form, support MailChimp for WP plugin.', 'bingo-core' )
		);
		parent::__construct( 'bingo_ruby_sb_subscribe_widget', esc_html__( '[SIDEBAR] - Subscribe Box', 'bingo-core' ), $widget_ops );
	}


	//render widget
	function widget( $args, $instance ) {
		extract( $args );
		$title               = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
		$style               = ! empty( $instance['style'] ) ? $instance['style'] : 'is-dark-text';
		$mail_text           = ( ! empty( $instance['mail_text'] ) ) ? $instance['mail_text'] : '';
		$subscribe_shortcode = ( ! empty( $instance['subscribe_shortcode'] ) ) ? $instance['subscribe_shortcode'] : '';
		$background_mail     = ( ! empty( $instance['background_mail'] ) ) ? $instance['background_mail'] : '';
		$border_mail         = ( ! empty( $instance['border_mail'] ) ) ? $instance['border_mail'] : '';
		$icon_mail           = ( ! empty( $instance['icon_mail'] ) ) ? $instance['icon_mail'] : '';
		$subscribe_big       = ( ! empty( $instance['subscribe_big'] ) ) ? $instance['subscribe_big'] : '';

		$add_classes = array();
		if ( ! empty( $background_mail ) ) {
			$add_classes[] = 'is-color-bg';
		} else {
			$add_classes[] = 'no-color-bg';
		}
		if ( ! empty( $subscribe_big ) ) {
			$add_classes[] = 'subscribe-big';
		} else {
			$add_classes[] = 'subscribe-medium';
		}
		$add_classes[] = $style;

		$add_classes = implode( ' ', $add_classes );

		echo $before_widget; ?>

	    <div class="widget-content-wrap">
	    <div class="subscribe-wrap <?php echo esc_attr($add_classes) ?>" <?php if ( !empty($background_mail) || !empty($border_mail) ) : ?> style="<?php if ( !empty($background_mail) ) : ?>background-color: <?php echo esc_attr($background_mail) ?><?php endif; ?>; <?php if (!empty($border_mail)) : ?>border: 4px solid rgba(0,0,0,.1);<?php endif; ?>" <?php endif; ?>>
		    <?php if (!empty($icon_mail)) : ?>
		    <span class="subscribe-icon-mail"><i class="fa fa-envelope-o"></i></span>
	        <?php endif; ?>

		    <div class="subscribe-title-wrap"><h3><?php echo esc_html( $title ) ?></h3></div>

		    <?php if (!empty($mail_text)) : ?>
			    <div class="subscribe-text-wrap"><?php echo do_shortcode($mail_text); ?></div>
		    <?php endif; ?>
		    <div class="subscribe-content-wrap">
			    <div class="subscribe-form-wrap">
				    <?php echo do_shortcode( $subscribe_shortcode ); ?>
			    </div>
		    </div>
	    </div>
	    </div>
        <?php  echo $after_widget;
    }

	//update forms
	function update( $new_instance, $old_instance ) {
		$instance                        = $old_instance;
		$instance['title']               = strip_tags( $new_instance['title'] );
		$instance['style']               = strip_tags( $new_instance['style'] );
		$instance['mail_text']           = $new_instance['mail_text'];
		$instance['subscribe_shortcode'] = strip_tags( $new_instance['subscribe_shortcode'] );
		$instance['background_mail']     = strip_tags( $new_instance['background_mail'] );
		$instance['border_mail']         = strip_tags( $new_instance['border_mail'] );
		$instance['icon_mail']           = strip_tags( $new_instance['icon_mail'] );
		$instance['subscribe_big']       = strip_tags( $new_instance['subscribe_big'] );

		return $instance;
	}

	//form settings
	function form( $instance ) {
		$defaults = array(
			'title'               => esc_html__( 'Subscribe Newsletter', 'bingo-core' ),
			'style'               => 'is-dark-text',
			'mail_text'           => esc_html__( 'Get all latest content delivered straight to your inbox.', 'bingo-core' ),
			'subscribe_shortcode' => '',
			'background_mail'     => '',
			'border_mail'         => '',
			'icon_mail'           => true,
			'subscribe_big'       => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'bingo-core'); ?></strong></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($instance['title']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><?php esc_attr_e('Select Text Color For Subscribe Form:', 'bingo-core'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>" >
				<option value="is-dark-text" <?php if( !empty($instance['style']) && $instance['style'] == 'is-dark-text' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Dark Text', 'bingo-core'); ?></option>
				<option value="is-light-text" <?php if( !empty($instance['style']) && $instance['style'] == 'is-light-text' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Light Text', 'bingo-core'); ?></option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo esc_html($this->get_field_id( 'mail_text' )); ?>"><?php esc_html_e('Mail text:','bingo-core'); ?></label>
			<textarea rows="10" cols="50" id="<?php echo esc_html($this->get_field_id( 'mail_text' )); ?>" name="<?php echo esc_html($this->get_field_name('mail_text')); ?>" class="widefat"><?php echo esc_html($instance['mail_text']); ?></textarea>
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('subscribe_shortcode')); ?>"><?php esc_html_e('Subscribe shortcode:', 'bingo-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('subscribe_shortcode')); ?>" name="<?php echo esc_attr($this->get_field_name('subscribe_shortcode')); ?>" type="text" value="<?php if( !empty($instance['subscribe_shortcode']) ) echo  esc_attr($instance['subscribe_shortcode']); ?>"/>
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Custom CSS Background Color:', 'bingo-core'); ?></strong></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('background_mail')); ?>" name="<?php echo esc_attr($this->get_field_name('background_mail')); ?>" value="<?php echo esc_attr($instance['background_mail']); ?>"/>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'border_mail' )); ?>"><?php esc_html_e('Enable Border For Subscribe:','bingo-core') ?></label>
			<input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'border_mail' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'border_mail' )); ?>" value="checked" <?php if( !empty( $instance['border_mail'] ) ) echo 'checked="checked"'; ?>  />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'icon_mail' )); ?>"><?php esc_html_e('Show Icon Mail:','bingo-core') ?></label>
			<input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'icon_mail' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'icon_mail' )); ?>" value="checked" <?php if( !empty( $instance['icon_mail'] ) ) echo 'checked="checked"'; ?>  />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'subscribe_big' )); ?>"><?php esc_html_e('Display Big Subscribe In Top Footer Full-width Section:','bingo-core') ?></label>
			<input class="widefat" type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'subscribe_big' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'subscribe_big' )); ?>" value="checked" <?php if( !empty( $instance['subscribe_big'] ) ) echo 'checked="checked"'; ?>  />
		</p>

	<?php
	}
}