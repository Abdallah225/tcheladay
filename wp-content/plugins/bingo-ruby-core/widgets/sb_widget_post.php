<?php
add_action( 'widgets_init', 'bingo_ruby_register_block_post_widget' );

function bingo_ruby_register_block_post_widget() {
	register_widget( 'bingo_ruby_sb_widget_post' );
}

class bingo_ruby_sb_widget_post extends WP_Widget
{
	//register widget
    function __construct()
    {
        $widget_ops = array('classname' => 'sb-widget sb-widget-post', 'description' => esc_html__('[Sidebar Widget] Display posts with custom query in sidebar section','bingo-core'));
        parent::__construct('bingo_ruby_sb_widget_post', esc_html__('[SIDEBAR] - Posts widget', 'bingo-core'), $widget_ops);
    }

	//render widget
	function widget( $args, $instance ) {
		extract( $args );
		$bingo_ruby_options                   = array();
		$title                                = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance );
		$title_color                          = ( ! empty( $instance['title_color'] ) ) ? $instance['title_color'] : '';
		$bingo_ruby_options['posts_per_page'] = ! empty( $instance['posts_per_page'] ) ? $instance['posts_per_page'] : 4;
		$bingo_ruby_options['orderby']        = ! empty( $instance['orderby'] ) ? $instance['orderby'] : 'date_post';
		$bingo_ruby_options['category_id']    = ! empty( $instance['cate'] ) ? $instance['cate'] : 0;
		$bingo_ruby_options['category_ids']   = ! empty( $instance['cates'] ) ? $instance['cates'] : '';
		$bingo_ruby_options['tags']           = ! empty( $instance['tags'] ) ? $instance['tags'] : '';
		$bingo_ruby_options['offset']         = ! empty( $instance['offset'] ) ? $instance['offset'] : 0;
		$style                                = ! empty( $instance['style'] ) ? $instance['style'] : 'style-1';

		//check empty
		if ( ! class_exists( 'bingo_ruby_query' ) ) {
			return false;
		}

		$query_data = bingo_ruby_query::get_data( $bingo_ruby_options );
		$options    = array();

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

		echo '<div class="widget-content-wrap">';

	    if ( $query_data->have_posts() ) {

		    $post_inner_classes   = array();
		    $post_inner_classes[] = 'post-widget-inner';
		    $post_inner_classes[] = $style;

		    $post_inner_classes = implode( ' ', $post_inner_classes );

		    echo '<div class="' . esc_attr( $post_inner_classes ) . '">';

		    switch ( $style ) {

			    case 'style-1' :
				    while ( $query_data->have_posts() ) {
					    $query_data->the_post();
					    echo bingo_ruby_post_list_4();
				    };
				    break;
			    case 'style-2' :
                    $flag  = true;
                    while ( $query_data->have_posts() ) {
                        $query_data->the_post();
                        if ( true === $flag ) {
                            echo '<div class="is-top-row">';
                            echo bingo_ruby_post_overlay_4( $options );
                            echo '</div>';
                            $flag = false;
                            continue;
                        } else {
                            echo '<div class="post-outer">';
                            echo bingo_ruby_post_list_m1();
                            echo '</div>';
                        }
                    };
				    break;
			    case 'style-3' :
				    echo '<div class="slider-wrap is-widget-post-slider">';
				    echo '<div class="slider-loader"></div>';
				    echo '<div class="ruby-mini-slider slider-init">';
				    while ( $query_data->have_posts() ) {
					    $query_data->the_post();
					    echo bingo_ruby_post_overlay_1( $options );
				    };
				    echo '</div>';
				    echo '</div>';
				    break;
			    case 'style-4' :
				    $counter = 1;
				    while ( $query_data->have_posts() ) {
					    $query_data->the_post();
					    echo '<div class="post-outer">';
					    echo '<span class="post-counter">' . esc_html( $counter ) . '</span>';
					    echo bingo_ruby_post_list_4();
					    echo '</div>';
					    $counter ++;
				    };
				    break;
			    case 'style-5' :
				    while ( $query_data->have_posts() ) {
					    $query_data->the_post();
					    echo bingo_ruby_post_feat_4( $options );
				    };
				    break;
			    case 'style-6' :
                    $flag  = true;
                    while ( $query_data->have_posts() ) {
                        $query_data->the_post();
                        if ( true === $flag ) {
                            echo '<div class="is-top-row">';
                            echo bingo_ruby_post_overlay_4( $options );
                            echo '</div>';
                            $flag = false;
                            continue;
                        } else {
                            echo '<div class="post-outer">';
                            echo bingo_ruby_post_list_4();
                            echo '</div>';
                        }
                    };
				    break;
			    case 'style-7' :
				    $counter = 1;
				    while ( $query_data->have_posts() ) {
					    $query_data->the_post();
					    echo '<div class="post-outer">';
					    echo '<span class="post-counter">' . esc_html( $counter ) . '</span>';
					    echo bingo_ruby_post_grid_m2( $options );
					    echo '</div>';
					    $counter ++;
				    };
				    break;
		    }


		    echo '</div><!--#post widget inner -->';
        }

	    echo '</div><!--#post widget content wrap -->';

	    //reset post data
	    wp_reset_postdata();
        echo $after_widget;
    }

	//update forms
	function update( $new_instance, $old_instance ) {
		$instance                   = $old_instance;
		$instance['title']          = strip_tags( $new_instance['title'] );
		$instance['title_color']    = strip_tags( $new_instance['title_color'] );
		$instance['style']          = strip_tags( $new_instance['style'] );
		$instance['cate']           = strip_tags( $new_instance['cate'] );
		$instance['cates']          = strip_tags( $new_instance['cates'] );
		$instance['tags']           = strip_tags( $new_instance['tags'] );
		$instance['posts_per_page'] = absint( strip_tags( $new_instance['posts_per_page'] ) );
		$instance['offset']         = absint( strip_tags( $new_instance['offest'] ) );
		$instance['orderby']        = strip_tags( $new_instance['orderby'] );

		return $instance;
	}

	//form settinga
	function form( $instance ) {
		$defaults = array(
			'title'          => esc_html__( 'latest posts', 'bingo-core' ),
			'title_color'    => '',
			'style'          => '',
			'orderby'        => 'date_post',
			'posts_per_page' => 4,
			'cate'           => '',
			'cates'          => '',
			'tags'           => '',
			'offset'         => 0
		);
	    $instance = wp_parse_args( (array) $instance, $defaults ); ?>

	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_attr_e('Title:','bingo-core') ?></label>
		    <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php if(!empty($instance['title'])) echo esc_attr($instance['title']); ?>" />
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'style' )); ?>"><?php esc_attr_e('Style:', 'bingo-core'); ?></label>
		    <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'style' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'style' )); ?>" >
			    <option value="style-1" <?php if( !empty($instance['style']) && $instance['style'] == 'style-1' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 1', 'bingo-core'); ?></option>
			    <option value="style-2" <?php if( !empty($instance['style']) && $instance['style'] == 'style-2' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 2', 'bingo-core'); ?></option>
			    <option value="style-3" <?php if( !empty($instance['style']) && $instance['style'] == 'style-3' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 3', 'bingo-core'); ?></option>
			    <option value="style-4" <?php if( !empty($instance['style']) && $instance['style'] == 'style-4' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 4', 'bingo-core'); ?></option>
			    <option value="style-5" <?php if( !empty($instance['style']) && $instance['style'] == 'style-5' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 5', 'bingo-core'); ?></option>
			    <option value="style-6" <?php if( !empty($instance['style']) && $instance['style'] == 'style-6' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 6', 'bingo-core'); ?></option>
			    <option value="style-7" <?php if( !empty($instance['style']) && $instance['style'] == 'style-7' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Style 7', 'bingo-core'); ?></option>
		    </select>
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id('cate')); ?>"><strong><?php esc_attr_e('Category Filter:', 'bingo-core'); ?></strong></label>
		    <select class="widefat" id="<?php echo esc_attr($this->get_field_id('cate')); ?>" name="<?php echo esc_attr($this->get_field_name('cate')); ?>">
			    <option value='all' <?php if ($instance['cate'] == 'all') echo 'selected="selected"'; ?>><?php esc_attr_e('All Categories', 'bingo-core'); ?></option>
			    <?php $categories = get_categories('type=post'); foreach ($categories as $category) { ?><option  value='<?php echo esc_attr($category->term_id); ?>' <?php if ($instance['cate'] == $category->term_id) echo 'selected="selected"'; ?>><?php echo esc_attr($category->cat_name); ?></option><?php } ?>
		    </select>
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'cates' )); ?>"><?php esc_attr_e('Multiple Category Filter (optional, Input category ids, Separate category ids with comma. e.g. 1,2):','bingo-core') ?></label>
		    <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'cates' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'cates' )); ?>" value="<?php if( !empty($instance['cates']) ) echo esc_attr($instance['cates']); ?>" />
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'tags' )); ?>"><?php esc_attr_e('Tags (optional, Separate tags with comma. e.g. tag1,tag2):','bingo-core') ?></label>
		    <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'tags' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tags' )); ?>" value="<?php if( !empty($instance['tags']) ) echo esc_attr($instance['tags']); ?>" />
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'posts_per_page' )); ?>"><?php esc_attr_e('Limit Post Number (optional, default is 4):','bingo-core') ?></label>
		    <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'posts_per_page' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'posts_per_page' )); ?>" value="<?php if( !empty($instance['posts_per_page']) ) echo esc_attr($instance['posts_per_page']); ?>" />
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>"><?php esc_attr_e('Post Offset (optional, default is 0):','bingo-core') ?></label>
		    <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'offset' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'offest' )); ?>" value="<?php if( !empty($instance['offset']) ) echo esc_attr($instance['offset']); ?>" />
	    </p>
	    <p>
		    <label for="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>"><?php esc_attr_e('Order By:', 'bingo-core'); ?></label>
		    <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'orderby' )); ?>" >
			    <option value="date_post" <?php if( !empty($instance['orderby']) && $instance['orderby'] == 'date' ) echo "selected=\"selected\""; else echo ""; ?>><?php esc_attr_e('Latest Post', 'bingo-core'); ?></option>
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
			<label for="<?php echo esc_attr($this->get_field_id('title_color')); ?>"><?php esc_html_e('Title Text Color (hex value):', 'bingo-core'); ?></label>
			<input class="widefat" type="text" id="<?php echo esc_attr($this->get_field_id('title_color')); ?>" name="<?php echo esc_attr($this->get_field_name('title_color')); ?>" value="<?php echo esc_attr($instance['title_color']); ?>"/>
		</p>
    <?php
    }
}
