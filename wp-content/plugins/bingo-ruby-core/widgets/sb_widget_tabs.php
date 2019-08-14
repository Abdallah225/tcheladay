<?php
add_action('widgets_init', 'bingo_ruby_register_block_tabs_widget');

function bingo_ruby_register_block_tabs_widget()
{
	register_widget('bingo_ruby_sb_widget_tab');
}

class bingo_ruby_sb_widget_tab extends WP_Widget
{

	//register widget
	function __construct()
	{
		$widget_ops = array('classname' => 'sb-widget sb-widget-tabs', 'description' => esc_html__('[Sidebar Widget] Display a tabbed content widget for your popular posts, recent posts and comments.','bingo-core'));
		parent::__construct('bingo_ruby_sb_widget_tab', esc_html__('[SIDEBAR] - Tabs widget', 'bingo-core'), $widget_ops);
	}

	//render widget
	function widget( $args, $instance ) {
		extract( $args );
		$title_post_popular      = ( ! empty( $instance['title_1'] ) ) ? $instance['title_1'] : '';
		$bingo_ruby_options['orderby']        = ! empty( $instance['orderby'] ) ? $instance['orderby'] : '';
		$bingo_ruby_options['posts_per_page'] = ! empty( $instance['number_post_popular'] ) ? $instance['number_post_popular'] : '';
		$title_post_recent      = ( ! empty( $instance['title_2'] ) ) ? $instance['title_2'] : '';
		$number_post_recent                   = ! empty( $instance['number_post_recent'] ) ? $instance['number_post_recent'] : '';

		//check empty
		if ( ! class_exists( 'bingo_ruby_query' ) || ! function_exists( 'bingo_ruby_post_list_4' ) ) {
			return false;
		}

		//query data
		$popular = bingo_ruby_query::get_data( $bingo_ruby_options );

		echo $before_widget; ?>

		<div class="widget-content-wrap">
		<ul id="widget-tab" class="clearfix widget-tab-nav widget-title">
			<li class="active">
                <a href="#widget-tab-popular">
                    <i class="fa fa-bolt"></i>
                    <?php if ( ! empty($title_post_popular)) : ?>
                        <?php echo esc_attr( $title_post_popular ); ?>
                    <?php else : ?>
                        <?php esc_html_e( 'Popular', 'bingo-core' ); ?>
                    <?php endif; ?>
                </a>
            </li>
			<li>
                <a href="#widget-tab-latest">
                    <i class="fa fa-clock-o"></i>
                    <?php if ( ! empty($title_post_recent)) : ?>
                        <?php echo esc_attr( $title_post_recent ); ?>
                    <?php else : ?>
                        <?php esc_html_e('Recent', 'bingo-core' ); ?>
                    <?php endif; ?>
                </a>
            </li>
		</ul>
		<div class="widget-tab-content">
			<div class="tab-pane active" id="widget-tab-popular">
				<div>
                    <?php  while ($popular->have_posts()) : $popular->the_post(); ?>
	                    <?php echo bingo_ruby_post_list_4(); ?>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
				</div><!-- #widget-tab-popular -->

			<div class="tab-pane" id="widget-tab-latest">
				<div>
					<?php $latest = new WP_Query('orderby=post_date&order=DESC&ignore_sticky_posts=1&posts_per_page=' . $number_post_recent );
					while ( $latest -> have_posts() ) : $latest -> the_post(); ?>
						<?php echo bingo_ruby_post_list_4(); ?>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
				</div><!-- #widget-tab-latest -->
		</div>
		</div>
		<?php
		echo $after_widget;
	}


	//update forms
	function update( $new_instance, $old_instance ) {
		$instance                        = $old_instance;
		$instance['title_1']      = strip_tags( $new_instance['title_1'] );
		$instance['orderby']             = strip_tags( $new_instance['orderby'] );
		$instance['number_post_popular'] = strip_tags( $new_instance['number_post_popular'] );
		$instance['title_2']      = strip_tags( $new_instance['title_2'] );
		$instance['number_post_recent']  = strip_tags( $new_instance['number_post_recent'] );

		return $instance;
	}

	//form settings
	function form($instance)
	{
		$defaults = array(
			'title_1'      => 'Popular',
			'orderby'             => 'popular',
			'number_post_popular' => '4',
			'title_2'      => 'Recent',
			'number_post_recent'  => '4',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_1')); ?>"><strong><?php esc_html_e('Title Post Popular:', 'bingo-core'); ?></strong></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_1')); ?>" name="<?php echo esc_attr($this->get_field_name('title_1')); ?>" value="<?php echo esc_attr($instance['title_1']); ?>"/>
		</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>"><?php esc_attr_e('Order By of "Popular":', 'bingo-core'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'orderby' )); ?>" >
                <option value="comment_count" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'comment_count' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Popular Post by Comments', 'bingo-core'); ?></option>
                <option value="popular" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'popular' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Popular Post by Views', 'bingo-core'); ?></option>
                <option value="top_review" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'top_review' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Best Review', 'bingo-core'); ?></option>
                <option value="post_type" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'post_type' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Post Type', 'bingo-core'); ?></option>
                <option value="rand" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'rand' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Random Post', 'bingo-core'); ?></option>
                <option value="author" <?php if( !empty($instance['author']) && $instance['orderby'] == 'author' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Author', 'bingo-core'); ?></option>
                <option value="alphabetical_order_asc" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'alphabetical_order_asc' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('alphabetical A->Z Posts', 'bingo-core'); ?></option>
                <option value="alphabetical_order_decs" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'alphabetical_order_decs' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('alphabetical Z->A Posts', 'bingo-core'); ?></option>
            </select>
        </p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'number_post_popular' )); ?>"><?php esc_attr_e('Number of "Popular" posts to show:','bingo-core') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_post_popular' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_post_popular' )); ?>" value="<?php if( !empty($instance['number_post_popular']) ) echo esc_attr($instance['number_post_popular']); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_2')); ?>"><strong><?php esc_html_e('Title Post Recent:', 'bingo-core'); ?></strong></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_2')); ?>" name="<?php echo esc_attr($this->get_field_name('title_2')); ?>" value="<?php echo esc_attr($instance['title_2']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'number_post_recent' )); ?>"><?php esc_attr_e('Number of "Recent" posts to show:','bingo-core') ?></label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_post_recent' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_post_recent' )); ?>" value="<?php if( !empty($instance['number_post_recent']) ) echo esc_attr($instance['number_post_recent']); ?>" />
		</p>
	<?php
	}
}
