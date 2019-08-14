<?php
if ( ! function_exists( 'bingo_ruby_theme_options_category' ) ) {
	function bingo_ruby_theme_options_category() {
		return array(
			'id'     => 'bingo_ruby_theme_ops_section_categories',
			'title'  => esc_html__( 'Category Options', 'bingo' ),
			'desc'   => esc_html__( 'Global category options (category.php), options below will apply to all category pages on your website.', 'bingo' ),
			'icon'   => 'el el-folder-close',
			'fields' => array(
				//featured area
				array(
					'id'     => 'section_start_cate_featured',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Category - Featured Area Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'category_featured_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Featured Style', 'bingo' ),
					'subtitle' => esc_html__( 'Select a featured style for displaying at the top of category pages.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::featured_type(),
					'default'  => 'none'
				),
				array(
					'id'       => 'category_featured_tag',
					'type'     => 'select',
					'data'     => 'tags',
					'multi'    => true,
					'title'    => esc_html__( 'Tags Filter', 'bingo' ),
					'subtitle' => esc_html__( 'Select tags name for featured areas. Leave blank if you want to select all tags.', 'bingo' ),
				),
				array(
					'id'       => 'category_featured_sort',
					'type'     => 'select',
					'title'    => esc_html__( 'Sorted By', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sort type for featured areas.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::post_orders(),
					'default'  => 'date_post'
				),
				array(
					'id'       => 'category_slides_per_page',
					'required' => array( 'category_featured_style', '!=', 'slider_hw' ),
					'title'    => esc_html__( 'Number Of Slides/Posts', 'bingo' ),
					'subtitle' => esc_html__( 'Select number of slides or posts (depending on the style you selected) for featured areas.', 'bingo' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 1
				),
				array(
					'id'       => 'category_featured_num',
					'required' => array( 'category_featured_style', '=', 'slider_hw' ),
					'title'    => esc_html__( 'Number Of Posts', 'bingo' ),
					'subtitle' => esc_html__( 'Select number of post for featured areas.', 'bingo' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 1
				),
				array(
					'id'       => 'category_featured_offset',
					'title'    => esc_html__( 'Featured Post Offset', 'bingo' ),
					'subtitle' => esc_html__( 'Select number of posts to displace or pass over. The beginning number is 0.', 'bingo' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_cate_featured',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//category layout
				array(
					'id'     => 'section_start_cat_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Category - Layout Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'category_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( ' Category Layout', 'bingo' ),
					'subtitle' => esc_html__( 'Select a layout for category pages.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::blog_layout(),
					'default'  => 'layout_classic'
				),
				array(
					'id'       => 'category_big_post_first',
					'title'    => esc_html__( '1st Classic Layout', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable classic layout at the first post of the blog listing, This option will not apply to classic layouts.', 'bingo' ),
					'type'     => 'switch',
					'default'  => 0
				),
                array(
                    'id'       => 'category_1st_classic_layout',
                    'title'    => esc_html__( '1st classic style', 'bingo' ),
                    'subtitle' => esc_html__( 'select style for 1st classic layout', 'bingo' ),
                    'type'     => 'select',
                    'required' => array( 'category_big_post_first', '=', '1' ),
                    'options'  => array(
                        'classic_1' => esc_html__( 'Classic 1', 'bingo' ),
                        'classic_2' => esc_html__( 'Classic 2', 'bingo' ),
                    ),
                    'default'  => 'classic_1'
                ),
				array(
					'id'       => 'category_header_background',
					'type'     => 'media',
					'title'    => esc_html__( 'Header background', 'bingo' ),
					'subtitle' => esc_html__( 'Upload header background for all categories.', 'bingo' )
				),
				array(
					'id'     => 'section_end_cat_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//category sidebar
				array(
					'id'     => 'section_start_cat_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Category - Sidebar Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'category_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Category Sidebar Name', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar for category pages', 'bingo' ),
					'default'  => 'bingo_ruby_sidebar_default',
					'options'  => bingo_ruby_theme_config::sidebar_name()
				),
				//category sidebar position
				array(
					'id'       => 'category_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Category Sidebar Position', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar position for category pages.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_cat_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)

			)
		);
	}
}
