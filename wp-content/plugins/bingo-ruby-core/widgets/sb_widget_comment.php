<?php
add_action('widgets_init', 'bingo_ruby_register_block_comments_widget');

function bingo_ruby_register_block_comments_widget()
{
	register_widget('bingo_ruby_sb_widget_comments');
}

class bingo_ruby_sb_widget_comments extends WP_Widget
{

	//register widget
	function __construct()
	{
		$widget_ops = array('classname' => 'sb-widget sb-widget-comments', 'description' => esc_html__('[Sidebar Widget] Display latest comments on the website.','bingo-core'));
		parent::__construct('bingo_ruby_sb_widget_comments', esc_html__('[SIDEBAR] - Recent Comments', 'bingo-core'), $widget_ops);
	}

	//render widget
	function widget( $args, $instance ) {
        extract($args, EXTR_SKIP);

		$title          = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
		$title_color    = ( ! empty( $instance['title_color'] ) ) ? $instance['title_color'] : '';
		$number_comment = ! empty( $instance['number_comment'] ) ? $instance['number_comment'] : '';

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

		<div class="widget-comments-wrap widget-content-wrap">
			<ul class="ruby-recent-comments">
				<?php
				$args_comments = array(
					'number' => $number_comment,
					'status' => 'approve' );
				$comments = get_comments( $args_comments );
				if ( $comments ) {
					foreach ( $comments as $comment ) {
						?>
						<li>
							<div class="comment-img">
								<?php echo get_avatar( $comment, '65' ); ?>
							</div>
							<div class="comment-list-content">
								<div class="post-title is-size-6"><span><?php echo strip_tags($comment->comment_author); ?></span></div>
								<p class="comment-tab-content">
									<a href="<?php echo get_permalink($comment->comment_post_ID); ?>" title="<?php echo strip_tags($comment->comment_author); ?><?php echo get_the_title($comment->comment_post_ID); ?>">
										<?php echo wp_trim_words( strip_tags( $comment->comment_content ), 10 ); ?>
									</a>
								</p>
							</div>
						</li>
					<?php
					}
				}?>
			</ul>
		</div><!-- #widget comments wrap -->
		<?php
		echo $after_widget;
	}

	//update forms
	function update( $new_instance, $old_instance ) {
		$instance                   = $old_instance;
		$instance['title']          = strip_tags( $new_instance['title'] );
		$instance['title_color']    = strip_tags( $new_instance['title_color'] );
		$instance['number_comment'] = strip_tags( $new_instance['number_comment'] );

		return $instance;
	}

	//form settings
	function form($instance)
	{
		$defaults = array(
			'title'          => esc_attr__( 'latest comments', 'bingo-core' ),
			'title_color'    => '',
			'number_comment' => '4'
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_attr_e('Title:', 'bingo-core') ?></strong></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'number_comment' )); ?>"><?php esc_attr_e('Number of "Comments" to show:','bingo-core') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_comment' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_comment' )); ?>" value="<?php if( !empty($instance['number_comment']) ) echo esc_attr($instance['number_comment']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_color')); ?>"><?php esc_html_e('Title Text Color (hex value):', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_color')); ?>" value="<?php echo esc_attr($instance['title_color']); ?>"/>
		</p>
	<?php
	}
}
