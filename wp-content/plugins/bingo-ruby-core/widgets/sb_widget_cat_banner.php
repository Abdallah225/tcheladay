<?php
//ads widget
add_action('widgets_init', 'bingo_ruby_register_cat_banner_widget');
function bingo_ruby_register_cat_banner_widget() {
    register_widget('bingo_ruby_sb_cat_banner_widget');
}
//register widget
class bingo_ruby_sb_cat_banner_widget extends WP_Widget
{
	//register widget
    function __construct()
    {
        $widget_ops = array('classname' => 'sb-widget sb-widget-cat-banner', 'description' => esc_html__('[Sidebar Widget] Display banners with background image.', 'bingo-core'));
        parent::__construct('bingo_ruby_sb_cat_banner_widget', esc_html__('[SIDEBAR] - Banner Listing', 'bingo-core'), $widget_ops);
    }

	//render widget
    function widget($args, $instance)
    {
	    extract( $args );
	    $title_1      = ( ! empty( $instance['title_1'] ) ) ? $instance['title_1'] : '';
	    $url_1        = ( ! empty( $instance['url_1'] ) ) ? $instance['url_1'] : '';
	    $img_1        = ( ! empty( $instance['image_url_1'] ) ) ? $instance['image_url_1'] : '';
	    $title_2      = ( ! empty( $instance['title_2'] ) ) ? $instance['title_2'] : '';
	    $url_2        = ( ! empty( $instance['url_2'] ) ) ? $instance['url_2'] : '';
	    $img_2        = ( ! empty( $instance['image_url_2'] ) ) ? $instance['image_url_2'] : '';
	    $title_3      = ( ! empty( $instance['title_3'] ) ) ? $instance['title_3'] : '';
	    $url_3        = ( ! empty( $instance['url_3'] ) ) ? $instance['url_3'] : '';
	    $img_3        = ( ! empty( $instance['image_url_3'] ) ) ? $instance['image_url_3'] : '';
	    $title_4      = ( ! empty( $instance['title_4'] ) ) ? $instance['title_4'] : '';
	    $url_4        = ( ! empty( $instance['url_4'] ) ) ? $instance['url_4'] : '';
	    $img_4        = ( ! empty( $instance['image_url_4'] ) ) ? $instance['image_url_4'] : '';

	    echo $before_widget; ?>

        <div class="widget-cat-banner-content-wrap widget-content-wrap clearfix">
	        <?php if(!empty($img_1)) : ?>
		        <div class="widget-cat-banner-image cat-banner-1" style="background-image: url(<?php echo esc_url($img_1); ?>)">
			        <?php if (!empty($url_1)) : ?>
				        <a class="widget-cat-banner-link" target="_blank" href="<?php echo esc_url($url_1); ?>">
					        <?php if ( ! empty( $title_1 ) ) { ?>
						        <div class="cat-banner-overlay">
							        <h4><?php echo esc_attr( $title_1 ); ?></h4>
						        </div>
					        <?php } ?>
				        </a>
			        <?php else : ?>
				        <?php if ( ! empty( $title_1 ) ) { ?>
					        <div class="cat-banner-overlay">
						        <h4><?php echo esc_attr( $title_1 ); ?></h4>
					        </div>
				        <?php } ?>
			        <?php endif; ?>
		        </div>
	        <?php endif; ?>

	        <?php if(!empty($img_2)) : ?>
		        <div class="widget-cat-banner-image cat-banner-2" style="background-image: url(<?php echo esc_url($img_2); ?>)">
			        <?php if (!empty($url_2)) : ?>
				        <a class="widget-cat-banner-link" target="_blank" href="<?php echo esc_url($url_2); ?>">
					        <?php if ( ! empty( $title_2 ) ) { ?>
						        <div class="cat-banner-overlay">
							        <h4><?php echo esc_attr( $title_2 ); ?></h4>
						        </div>
					        <?php } ?>
				        </a>
			        <?php else : ?>
				        <?php if ( ! empty( $title_2 ) ) { ?>
					        <div class="cat-banner-overlay">
						        <h4><?php echo esc_attr( $title_2 ); ?></h4>
					        </div>
				        <?php } ?>
			        <?php endif; ?>
		        </div>
	        <?php endif; ?>


	        <?php if(!empty($img_3)) : ?>
		        <div class="widget-cat-banner-image cat-banner-3" style="background-image: url(<?php echo esc_url($img_3); ?>)">
			        <?php if (!empty($url_3)) : ?>
				        <a class="widget-cat-banner-link" target="_blank" href="<?php echo esc_url($url_3); ?>">
					        <?php if ( ! empty( $title_3 ) ) { ?>
						        <div class="cat-banner-overlay">
							        <h4><?php echo esc_attr( $title_3 ); ?></h4>
						        </div>
					        <?php } ?>
				        </a>
			        <?php else : ?>
				        <?php if ( ! empty( $title_3 ) ) { ?>
					        <div class="cat-banner-overlay">
						        <h4><?php echo esc_attr( $title_3 ); ?></h4>
					        </div>
				        <?php } ?>
			        <?php endif; ?>
		        </div>
	        <?php endif; ?>


	        <?php if(!empty($img_4)) : ?>
		        <div class="widget-cat-banner-image cat-banner-4" style="background-image: url(<?php echo esc_url($img_4); ?>)">
			        <?php if (!empty($url_4)) : ?>
				        <a class="widget-cat-banner-link" target="_blank" href="<?php echo esc_url($url_4); ?>">
					        <?php if ( ! empty( $title_4 ) ) { ?>
						        <div class="cat-banner-overlay">
							        <h4><?php echo esc_attr( $title_4 ); ?></h4>
						        </div>
					        <?php } ?>
				        </a>
			        <?php else : ?>
				        <?php if ( ! empty( $title_4 ) ) { ?>
					        <div class="cat-banner-overlay">
						        <h4><?php echo esc_attr( $title_4 ); ?></h4>
					        </div>
				        <?php } ?>
			        <?php endif; ?>
		        </div>
	        <?php endif; ?>

        </div>

        <?php  echo $after_widget;
    }


    //update forms
    function update($new_instance, $old_instance)
    {
	    $instance               = $old_instance;
	    $instance['title_1']      = strip_tags( $new_instance['title_1'] );
	    $instance['url_1']        = strip_tags( $new_instance['url_1'] );
	    $instance['image_url_1']  = strip_tags( $new_instance['image_url_1'] );
	    $instance['title_2']      = strip_tags( $new_instance['title_2'] );
	    $instance['url_2']        = strip_tags( $new_instance['url_2'] );
	    $instance['image_url_2']  = strip_tags( $new_instance['image_url_2'] );
	    $instance['title_3']      = strip_tags( $new_instance['title_3'] );
	    $instance['url_3']        = strip_tags( $new_instance['url_3'] );
	    $instance['image_url_3']  = strip_tags( $new_instance['image_url_3'] );
	    $instance['title_4']      = strip_tags( $new_instance['title_4'] );
	    $instance['url_4']        = strip_tags( $new_instance['url_4'] );
	    $instance['image_url_4']  = strip_tags( $new_instance['image_url_4'] );
        return $instance;
    }


	//form settings
	function form($instance)
	{
		$defaults = array(
			'title_1'      => '',
			'url_1'        => '',
			'image_url_1'  => '',
			'title_2'      => '',
			'url_2'        => '',
			'image_url_2'  => '',
			'title_3'      => '',
			'url_3'        => '',
			'image_url_3'  => '',
			'title_4'      => '',
			'url_4'        => '',
			'image_url_4'  => ''
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_1')); ?>"><strong><?php esc_html_e('Banner Title #1:', 'bingo-core'); ?></strong></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_1')); ?>" name="<?php echo esc_attr($this->get_field_name('title_1')); ?>" value="<?php echo esc_attr($instance['title_1']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('url_1')); ?>"><?php esc_html_e('Banner Link #1:', 'bingo-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('url_1')); ?>" name="<?php echo esc_attr($this->get_field_name('url_1')); ?>" type="text" value="<?php if( !empty($instance['url_1']) ) echo  esc_url($instance['url_1']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('image_url_1')); ?>"><?php esc_html_e('Banner Image Url #1:', 'bingo-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_url_1')); ?>" name="<?php echo esc_attr($this->get_field_name('image_url_1')); ?>" type="text" value="<?php if( !empty($instance['image_url_1']) ) echo esc_url($instance['image_url_1']); ?>"/>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_2')); ?>"><strong><?php esc_html_e('Banner Title #2:', 'bingo-core'); ?></strong></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_2')); ?>" name="<?php echo esc_attr($this->get_field_name('title_2')); ?>" value="<?php echo esc_attr($instance['title_2']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('url_2')); ?>"><?php esc_html_e('Banner Link #2:', 'bingo-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('url_2')); ?>" name="<?php echo esc_attr($this->get_field_name('url_2')); ?>" type="text" value="<?php if( !empty($instance['url_2']) ) echo  esc_url($instance['url_2']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('image_url_2')); ?>"><?php esc_html_e('Banner Image Url #2:', 'bingo-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_url_2')); ?>" name="<?php echo esc_attr($this->get_field_name('image_url_2')); ?>" type="text" value="<?php if( !empty($instance['image_url_2']) ) echo esc_url($instance['image_url_2']); ?>"/>
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_3')); ?>"><strong><?php esc_html_e('Banner Title #3:', 'bingo-core'); ?></strong></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_3')); ?>" name="<?php echo esc_attr($this->get_field_name('title_3')); ?>" value="<?php echo esc_attr($instance['title_3']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('url_3')); ?>"><?php esc_html_e('Banner Link #3:', 'bingo-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('url_3')); ?>" name="<?php echo esc_attr($this->get_field_name('url_3')); ?>" type="text" value="<?php if( !empty($instance['url_3']) ) echo  esc_url($instance['url_3']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('image_url_3')); ?>"><?php esc_html_e('Banner Image Url #3:', 'bingo-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_url_3')); ?>" name="<?php echo esc_attr($this->get_field_name('image_url_3')); ?>" type="text" value="<?php if( !empty($instance['image_url_3']) ) echo esc_url($instance['image_url_3']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title_4')); ?>"><strong><?php esc_html_e('Banner Title #4:', 'bingo-core'); ?></strong></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_4')); ?>" name="<?php echo esc_attr($this->get_field_name('title_4')); ?>" value="<?php echo esc_attr($instance['title_4']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('url_4')); ?>"><?php esc_html_e('Banner Link #4:', 'bingo-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('url_4')); ?>" name="<?php echo esc_attr($this->get_field_name('url_4')); ?>" type="text" value="<?php if( !empty($instance['url_4']) ) echo  esc_url($instance['url_4']); ?>"/>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('image_url_4')); ?>"><?php esc_html_e('Banner Image Url #4:', 'bingo-core'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('image_url_4')); ?>" name="<?php echo esc_attr($this->get_field_name('image_url_4')); ?>" type="text" value="<?php if( !empty($instance['image_url_4']) ) echo esc_url($instance['image_url_4']); ?>"/>
		</p>
	<?php
	}
}
