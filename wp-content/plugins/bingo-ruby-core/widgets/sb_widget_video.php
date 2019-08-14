<?php

//video widget
add_action( 'widgets_init', 'bingo_ruby_register_video_widget' );
function bingo_ruby_register_video_widget() {
	register_widget( 'bingo_ruby_video_widget' );
}

class bingo_ruby_video_widget extends WP_Widget {

	function __construct()
    {
		$widget_ops = array( 'classname' => 'sb-widget sb-widget-video', 'description' => esc_html__('[Sidebar Widget] Displays a video of your choosing.', 'bingo-core') );
		parent::__construct( 'bingo_ruby_video_widget', esc_html__('[SIDEBAR] - Video Widget','bingo-core'), $widget_ops );
	}

	function widget($args, $instance) {

		// Outputs the content of the widget
		extract($args, EXTR_SKIP);
		$title       = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
		$title_color = ( ! empty( $instance['title_color'] ) ) ? $instance['title_color'] : '';
		$video_embed = ( ! empty( $instance['video_embed'] ) ) ? $instance['video_embed'] : '';

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

		<div class="video-widget-wrap widget-content-wrap">

			<div class="entry">
				<?php if (strpos($video_embed,'.mp4') !== false) : ?>

					<video controls>
						<source src="<?php echo $video_embed; ?>" type="video/mp4">
					</video>

				<?php else : ?>
					<?php echo html_entity_decode($video_embed); ?>
				<?php endif; ?>
			</div>

		</div>
		<?php echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {
		$instance                = $old_instance;
		$instance['title']       = strip_tags( $new_instance['title'] );
		$instance['title_color'] = strip_tags( $new_instance['title_color'] );
		$instance['video_embed'] = esc_html( $new_instance['video_embed'] );

		return $instance;
	}

	function form( $instance ) {
		$defaults = array(
			'title'       => '',
			'title_color' => '',
			'video_embed' => '',

		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php  esc_html_e('Title', 'bingo-core'); ?>:
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" class="widefat" value="<?php echo esc_attr($instance['title']); ?>" /></label>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'video_embed' )); ?>"><?php esc_html_e('Embed code or self host video url:','bingo-core'); ?></label>
			<textarea rows="10" cols="50" id="<?php echo esc_attr($this->get_field_id( 'video_embed' )); ?>" name="<?php echo esc_attr($this->get_field_name('video_embed')); ?>" class="widefat"><?php echo esc_html($instance['video_embed']); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_color')); ?>"><?php esc_html_e('Title Text Color (hex value):', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_color')); ?>" value="<?php echo esc_attr($instance['title_color']); ?>"/>
		</p>
	<?php
	}
}
