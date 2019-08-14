<?php
add_action('widgets_init', 'bingo_ruby_register_contact_info_widget');

function bingo_ruby_register_contact_info_widget() {
	register_widget( 'bingo_ruby_contact_info_widget' );
}

class bingo_ruby_contact_info_widget extends WP_Widget{

	function __construct()
	{
		$widget_ops = array('classname' => 'sb-widget sb-widget-contact-info', 'description' => esc_html__('[Sidebar Widget] Display Contact Info','bingo-core'));
		parent::__construct('bingo_ruby_contact_info_widget', esc_html__('[SIDEBAR] - contact info', 'bingo-core'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );
		$title       = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
		$text        = ( ! empty( $instance['text'] ) ) ? $instance['text'] : '';
		$address     = ( ! empty( $instance['address'] ) ) ? $instance['address'] : '';
		$phone       = ( ! empty( $instance['phone'] ) ) ? $instance['phone'] : '';
		$mobile      = ( ! empty( $instance['mobile'] ) ) ? $instance['mobile'] : '';
		$fax         = ( ! empty( $instance['fax'] ) ) ? $instance['fax'] : '';
		$email       = ( ! empty( $instance['email'] ) ) ? $instance['email'] : '';
		$email_txt   = ( ! empty( $instance['emailtxt'] ) ) ? $instance['emailtxt'] : '';
		$web         = ( ! empty( $instance['web'] ) ) ? $instance['web'] : '';
		$web_text    = ( ! empty( $instance['webtxt'] ) ) ? $instance['webtxt'] : '';
		$title_color = ( ! empty( $instance['title_color'] ) ) ? $instance['title_color'] : '';

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

		echo '<div class="contact-info-container widget-content-wrap">';
		//text quote
		if ( $text ) {
			echo '<div class="contact-info-el text"><p>'. esc_attr( $text ) .'</p></div>';
		}

		//address
		if ( $address ) {
			echo '<div class="contact-info-el address">';
			echo '<i class="fa fa-map-signs"></i>';
			echo '<div class="bingo-info-wrap">';
			echo '<span class="bingo-contact-title">'. esc_html__('Address:', 'bingo-core') .'</span>';
			echo '<span class="bingo-contact-text">'. esc_attr( $address ) .'</span>';
			echo '</div>';
			echo '</div>';
		}

		//phone
		if ( $phone ) {
			echo '<div class="contact-info-el phone">';
			echo '<i class="fa fa-phone-square"></i>';
			echo '<div class="bingo-info-wrap">';
			echo '<span class="bingo-contact-title">'. esc_html__('Phone:', 'bingo-core') .'</span>';
			echo '<span class="bingo-contact-text">'. esc_attr( $phone ) .'</span>';
			echo '</div>';
			echo '</div>';
		}

		//mobile
		if ( $mobile ) {
			echo '<div class="contact-info-el mobile">';
			echo '<i class="fa fa-mobile"></i>';
			echo '<div class="bingo-info-wrap">';
			echo '<span class="bingo-contact-title">'. esc_html__('Mobile:', 'bingo-core') .'</span>';
			echo '<span class="bingo-contact-text">'. esc_attr( $mobile ) .'</span>';
			echo '</div>';
			echo '</div>';
		}

		//fax
		if ( $fax ) {
			echo '<div class="contact-info-el fax">';
			echo '<i class="fa fa-fax"></i>';
			echo '<div class="bingo-info-wrap">';
			echo '<span class="bingo-contact-title">'. esc_html__('Fax:', 'bingo-core') .'</span>';
			echo '<span class="bingo-contact-text">'. esc_attr( $fax ) .'</span>';
			echo '</div>';
			echo '</div>';
		}

		//email
		if ( $email ) {
			echo '<div class="contact-info-el email">';
			echo '<i class="fa fa-envelope"></i>';
			echo '<div class="bingo-info-wrap">';
			echo '<span class="bingo-contact-title">'. esc_html__('Email:', 'bingo-core') .'</span>';
			echo '<span class="bingo-contact-text">';
			echo '<a href="mailto:'. esc_attr( $email ) .'">';
			if($email_txt) {
				echo esc_attr( $email_txt );
			} else {
				echo esc_attr( $email );
			}
			echo '</a>';
			echo '</span>';
			echo '</div>';
			echo '</div>';
		}

		if ( $web ) {
			echo '<div class="contact-info-el web">';
			echo '<i class="fa fa-internet-explorer"></i>';
			echo '<div class="bingo-info-wrap">';
			echo '<span class="bingo-contact-title">'. esc_html__('Website:', 'bingo-core') .'</span>';
			echo '<span class="bingo-contact-text">';
			echo '<a href="'. esc_url( $web ) .'">';
			if ( $web_text ) {
				echo esc_attr( $web_text );
			} else {
				echo esc_attr( $web );
			}
			echo '</a>';
			echo '</span>';
			echo '</div>';
			echo '</div>';
		}

        echo '</div>';

		echo $after_widget;

	}


	function update( $new_instance, $old_instance ) {

		$instance = $new_instance;

		$instance['title']       = strip_tags( $new_instance['title'] );
		$instance['text']        = strip_tags( $new_instance['text'] );
		$instance['address']     = $new_instance['address'];
		$instance['phone']       = $new_instance['phone'];
		$instance['mobile']      = $new_instance['mobile'];
		$instance['fax']         = $new_instance['fax'];
		$instance['email']       = $new_instance['email'];
		$instance['emailtxt']    = $new_instance['emailtxt'];
		$instance['web']         = $new_instance['web'];
		$instance['webtxt']      = $new_instance['webtxt'];
		$instance['title_color'] = $new_instance['title_color'];

		return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'title'       => esc_html__( 'Contact Info', 'bingo-core' ),
			'text'        => '',
			'address'     => '',
			'phone'       => esc_html__( '123-456-789', 'bingo-core' ),
			'mobile'      => '',
			'fax'         => '',
			'email'       => esc_html__( 'email@support.com', 'bingo-core' ),
			'emailtxt'    => esc_html__( 'email@support.com', 'bingo-core' ),
			'web'         => '',
			'webtxt'      => '',
			'title_color' => '',
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'bingo-core' ); ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'text' )); ?>"><?php esc_html_e('Text:','bingo-core'); ?></label>
			<textarea rows="10" cols="50" id="<?php echo esc_attr($this->get_field_id( 'text' )); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" class="widefat"><?php echo esc_html($instance['text']); ?></textarea>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr( $this->get_field_name('address')); ?>" value="<?php echo esc_attr( $instance['address'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone:', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" value="<?php echo esc_attr( $instance['phone'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('mobile')); ?>"><?php esc_html_e('Mobile:', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('mobile')); ?>" name="<?php echo esc_attr($this->get_field_name('mobile')); ?>" value="<?php echo esc_attr( $instance['mobile'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('fax')); ?>"><?php esc_html_e('Fax:', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('fax')); ?>" name="<?php echo esc_attr($this->get_field_name('fax')); ?>" value="<?php echo esc_attr( $instance['fax'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" value="<?php echo esc_attr( $instance['email'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('emailtxt')); ?>"><?php esc_html_e('Email Link Text:', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('emailtxt')); ?>" name="<?php echo esc_attr($this->get_field_name('emailtxt')); ?>" value="<?php echo esc_attr( $instance['emailtxt'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('web')); ?>"><?php esc_html_e('Website URL:', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('web')); ?>" name="<?php echo esc_attr( $this->get_field_name('web')); ?>" value="<?php echo esc_url( $instance['web'] ); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('webtxt')); ?>"><?php esc_html_e('Website URL Text:', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('webtxt')); ?>" name="<?php echo esc_attr($this->get_field_name('webtxt')); ?>" value="<?php echo esc_attr( $instance['webtxt'] ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_color')); ?>"><?php esc_html_e('Title Text Color (hex value):', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_color')); ?>" value="<?php echo esc_attr($instance['title_color']); ?>"/>
		</p>
<?php
	}
}