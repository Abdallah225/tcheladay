<?php
if ( ! function_exists( 'bingo_ruby_theme_options_blog' ) ) {
	function bingo_ruby_theme_options_blog() {
		//blog blog page option
		return array(
			'title'  => esc_html__( 'Blog Options', 'bingo' ),
			'id'     => 'bingo_ruby_theme_ops_section_blog_page',
			'desc'   => esc_html__( 'Latest blog page options (index.php), options below will apply to blog page that is set to "Your latest posts" in the "WordPress Settings -> Reading" section.', 'bingo' ),
			'icon'   => 'el el-laptop',
			'fields' => array(

				array(
					'id'     => 'section_start_header_featured',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Featured Area Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'feat_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Featured Area - Style', 'bingo' ),
					'subtitle' => esc_html__( 'Select a featured style for displaying at the top of the blog page.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::featured_type(),
					'default'  => 'none'
				),
				array(
					'id'       => 'feat_cat',
					'type'     => 'select',
					'data'     => 'categories',
					'multi'    => true,
					'title'    => esc_html__( 'Featured Area - Categories Filter', 'bingo' ),
					'subtitle' => esc_html__( 'Filter multi categories for blog featured area, leave blank if you want to select all categories.', 'bingo' ),
				),
				array(
					'id'       => 'feat_tag',
					'type'     => 'select',
					'data'     => 'tags',
					'multi'    => true,
					'title'    => esc_html__( 'Featured Area - Tags Filter', 'bingo' ),
					'subtitle' => esc_html__( 'Input tags name for the blog featured area. Leave blank if you want to select all tags.', 'bingo' ),
				),
				array(
					'id'       => 'feat_sort',
					'type'     => 'select',
					'title'    => esc_html__( 'Featured Area - Sorted By', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sort type for the blog featured area.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::post_orders(),
					'default'  => 'date_post'
				),
				array(
					'id'       => 'slides_per_page',
					'required' => array( 'feat_style', '!=', 'slider_hw' ),
					'title'    => esc_html__( 'Featured Area - Number Of Slides/Posts', 'bingo' ),
					'subtitle' => esc_html__( 'Select number of slides or posts (depending on the style you selected) for the blog featured area.', 'bingo' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 1
				),
				array(
					'id'       => 'feat_num',
					'required' => array( 'feat_style', '=', 'slider_hw' ),
					'title'    => esc_html__( 'Featured Area - Number of Posts', 'bingo' ),
					'subtitle' => esc_html__( 'Select number of post for the blog featured area.', 'bingo' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 1
				),
				array(
					'id'       => 'feat_offset',
					'title'    => esc_html__( 'Featured Area - Offset Of Posts', 'bingo' ),
					'subtitle' => esc_html__( 'Select number of posts to displace or pass over. The beginning number is 0.', 'bingo' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_header_featured',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				// blog layout
				array(
					'id'     => 'section_start_blog_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'blog layout options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'blog layout', 'bingo' ),
					'subtitle' => esc_html__( 'Select a layout for the latest blog page (index.php).', 'bingo' ),
					'options'  => bingo_ruby_theme_config::blog_layout(),
					'default'  => 'layout_classic'
				),
				array(
					'id'       => 'big_post_first',
					'title'    => esc_html__( '1st classic layout', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable classic layout at the first post of the blog listing, This option will not apply to classic layouts.', 'bingo' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'blog_index_1st_classic_layout',
					'title'    => esc_html__( '1st classic style', 'bingo' ),
					'subtitle' => esc_html__( 'select style for 1st classic layout', 'bingo' ),
					'type'     => 'select',
					'required' => array( 'big_post_first', '=', '1' ),
					'options'  => array(
						'classic_1' => esc_html__( 'Classic 1', 'bingo' ),
						'classic_2' => esc_html__( 'Classic 2', 'bingo' ),
					),
					'default'  => 'classic_1'
				),
				array(
					'id'     => 'section_end_blog_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//Blog sidebar
				array(
					'id'     => 'section_start_blog_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'blog Sidebar options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'blog_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Blog Sidebar Name', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar for the blog page.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_name(),
					'default'  => 'bingo_ruby_sidebar_default'
				),
				array(
					'id'       => 'blog_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'blog sidebar position', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar position for the blog page.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_blog_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}