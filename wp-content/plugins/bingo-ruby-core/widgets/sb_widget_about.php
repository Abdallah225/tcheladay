<?php
//About widget
add_action('widgets_init', 'bingo_ruby_register_about_widget');
function bingo_ruby_register_about_widget()
{
    register_widget('bingo_ruby_about_widget');
}

class bingo_ruby_about_widget extends WP_Widget
{
    function __construct()
    {
        $widget_ops = array('classname' => 'sb-widget-about', 'description' => esc_html__('[Sidebar Widget] Display short biography in sidebar sections', 'bingo-core'));
        parent::__construct('bingo_ruby_sb_about_widget', esc_html__('[SIDEBAR] - About Me', 'bingo-core'), $widget_ops);
    }

    function widget($args, $instance)
    {
	    extract( $args );
	    $title           = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
	    $title_color     = ( ! empty( $instance['title_color'] ) ) ? $instance['title_color'] : '';
	    $text            = ( ! empty( $instance['text'] ) ) ? $instance['text'] : '';
	    $about_title     = ( ! empty( $instance['about_title'] ) ) ? $instance['about_title'] : '';
	    $about_subtitle  = ( ! empty( $instance['about_subtitle'] ) ) ? $instance['about_subtitle'] : '';
	    $image           = ( ! empty( $instance['logo_image'] ) ) ? $instance['logo_image'] : '';
	    $signature_image = ( ! empty( $instance['signature_image'] ) ) ? $instance['signature_image'] : '';

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
	        <?php if (!empty($image)) : ?>
	            <div class="about-widget-image">
		            <img data-no-retina src="<?php echo esc_url($image); ?>" alt="<?php bloginfo() ?>"/>
		            <?php if (!empty($about_title)) : ?>
			            <div class="about-title post-title"><h3><?php echo esc_attr($about_title); ?></h3></div><!--#about title-->
		            <?php endif; ?>
		            <?php if (!empty($about_subtitle)) : ?>
			            <div class="about-subtitle"><h3><?php echo esc_attr($about_subtitle); ?></h3></div><!--#about subtitle-->
		            <?php endif; ?>
	            </div><!--#image-->
	        <?php endif; ?>

	        <div class="about-content-wrap post-excerpt">

	            <?php if (!empty($text)) : ?>
	                <div class="about-content entry"><?php echo do_shortcode($text); ?></div><!--about-content-->
	            <?php endif; ?>

	            <?php if (!empty($signature_image)) : ?>
		        <div class="signature-img"><img src="<?php echo esc_url($signature_image); ?>" alt="<?php bloginfo() ?>"/></div><!--#image signature-->
	            <?php endif; ?>

	        </div><!--#about me content -->
		</div>

        <?php
        echo $after_widget;
    }

	function update( $new_instance, $old_instance ) {
		$instance                    = $old_instance;
		$instance['title']           = strip_tags( $new_instance['title'] );
		$instance['title_color']     = strip_tags( $new_instance['title_color'] );
		$instance['about_title']     = strip_tags( $new_instance['about_title'] );
		$instance['about_subtitle']  = strip_tags( $new_instance['about_subtitle'] );
		$instance['text']            = $new_instance['text'];
		$instance['logo_image']      = strip_tags( $new_instance['logo_image'] );
		$instance['signature_image'] = strip_tags( $new_instance['signature_image'] );

		return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'title'           => esc_html__( 'About me', 'bingo-core' ),
			'title_color'     => '',
			'text'            => '',
			'about_title'     => '',
			'about_subtitle'  => '',
			'logo_image'      => '',
			'signature_image' => ''
		);
        $instance = wp_parse_args( (array) $instance, $defaults ); ?>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title:','bingo-core');?></label>
		    <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php if( !empty($instance['title']) ) echo esc_attr($instance['title']); ?>" />
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'logo_image' )); ?>"><?php esc_html_e('About Image Url (optional):','bingo-core'); ?></label>
		    <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'logo_image' )); ?>" name="<?php echo esc_attr($this->get_field_name('logo_image')); ?>" value="<?php if( !empty($instance['logo_image']) ) echo esc_url($instance['logo_image']); ?>" />
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'about_title' )); ?>"><?php esc_html_e('About title (Only display on about image):','bingo-core'); ?></label>
		    <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'about_title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'about_title' )); ?>" value="<?php if( !empty($instance['about_title']) ) echo esc_attr($instance['about_title']); ?>" />
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'about_subtitle' )); ?>"><?php esc_html_e('About subtitle:','bingo-core'); ?></label>
		    <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'about_subtitle' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'about_subtitle' )); ?>" value="<?php if( !empty($instance['about_subtitle']) ) echo esc_attr($instance['about_subtitle']); ?>" />
	    </p>
	    <p>
		    <label for="<?php echo esc_html($this->get_field_id( 'text' )); ?>"><?php esc_html_e('About text:','bingo-core'); ?></label>
		    <textarea rows="10" cols="50" id="<?php echo esc_attr($this->get_field_id( 'text' )); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" class="widefat"><?php echo esc_html($instance['text']); ?></textarea>
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'signature_image' )); ?>"><?php esc_html_e('Signature Image Url (optional):','bingo-core'); ?></label>
		    <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'signature_image' )); ?>" name="<?php echo esc_attr($this->get_field_name('signature_image')); ?>" value="<?php if( !empty($instance['signature_image']) ) echo esc_url($instance['signature_image']); ?>" />
	    </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_color')); ?>"><?php esc_html_e('Title Text Color (hex value):', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_color')); ?>" value="<?php echo esc_attr($instance['title_color']); ?>"/>
		</p>
    <?php
    }
}
?>
