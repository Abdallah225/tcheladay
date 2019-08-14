<?php
//load taxonomy meta
if ( ! function_exists( 'bingo_ruby_register_taxonomy_cat' ) ) {
	function bingo_ruby_register_taxonomy_cat() {

		//check
		if ( ! class_exists( 'RW_Taxonomy_Meta' ) ) {
			return;
		}

		$meta_sections   = array();
		$meta_sections[] = array(
			'title'      => esc_html__( 'BINGO CATEGORY OPTIONS', 'bingo' ),
			'taxonomies' => array( 'category' ),
			'id'         => 'bingo_ruby_cat_option',
			'fields'     => array(
				array(
					'name'    => esc_html__( 'Category Featured', 'bingo' ),
					'id'      => 'bingo_ruby_cat_feat',
					'desc'    => esc_html__( 'select a feature layout of this category. This option will override default setting in theme options.', 'bingo' ),
					'type'    => 'select',
					'options' => array(
						'default'        => esc_html__( 'Default From Theme Option', 'bingo' ),
						'slider_hw'      => esc_html__( 'Wrapper Slider', 'bingo' ),
						'grid_slider_fw' => esc_html__( 'Grid FullWidth', 'bingo' ),
						'grid_slider_hw' => esc_html__( 'Grid Style 1', 'bingo' ),
						'grid_hw'        => esc_html__( 'Grid Style 2', 'bingo' ),
						'carousel'       => esc_html__( 'Carousel', 'bingo' ),
                        'none'           => esc_html__( 'None', 'bingo' ),
					),
					'std'     => 'default',
				),
				array(
					'name'    => esc_html__( 'Sorted By', 'bingo' ),
					'id'      => 'bingo_category_feat_orderby',
					'desc'    => esc_html__( 'Select a sort type for this featured area.', 'bingo' ),
					'type'    => 'select',
					'options' => array(
						'default'                 => esc_html__( 'Default Form Theme Options', 'bingo' ),
						'date_post'               => esc_html__( 'Latest Post', 'bingo' ),
						'comment_count'           => esc_html__( 'Popular Comment', 'bingo' ),
						'popular'                 => esc_html__( 'Popular View', 'bingo' ),
						'top_review'              => esc_html__( 'Popular Review', 'bingo' ),
						'post_type'               => esc_html__( 'Post Type', 'bingo' ),
						'rand'                    => esc_html__( 'Random', 'bingo' ),
                        'modified'                => esc_html__( 'Last Modified Date', 'bingo' ),
						'author'                  => esc_html__( 'Author', 'bingo' ),
						'alphabetical_order_decs' => esc_html__( 'Title DECS', 'bingo' ),
						'alphabetical_order_asc'  => esc_html__( 'Title ACS', 'bingo' ),
					),
					'std'     => 'default',
				),
				array(
					'name' => esc_html__( 'Offset of Posts', 'bingo' ),
					'id'   => 'bingo_category_feat_offset',
					'desc' => esc_html__( 'select number of posts to displace or pass over. Leave blank or set 0 if you want to use settings of Theme Options. Set -1 if you want to have beginning number is 0.', 'bingo' ),
					'type' => 'text',
					'std'  => '',
				),
				array(
					'name' => esc_html__( 'Number of Slides/Posts', 'bingo' ),
					'id'   => 'bingo_category_feat_slides_per_page',
					'desc' => esc_html__( 'select number of slides or posts (depending on the style you selected) for this featured area. Leave blank or set 0 if you want to use settings of theme options.', 'bingo' ),
					'type' => 'text',
					'std'  => '',
				),
				//category layout
				array(
					'name'    => esc_html__( 'Category Layout', 'bingo' ),
					'id'      => 'bingo_ruby_cat_layout',
					'desc'    => esc_html__( 'Select the layout for this category. This option will override "Bingo Options -> Category Options -> Category Layout Options" option', 'bingo' ),
					'type'    => 'select',
					'options' => array(
						'default'              => esc_html__( 'Default From Theme Option', 'bingo' ),
						'layout_list'          => esc_html__( 'List 1', 'bingo' ),
						'layout_list_small'    => esc_html__( 'List 2', 'bingo' ),
						'layout_classic'       => esc_html__( 'Classic 1', 'bingo' ),
						'layout_classic_lite'  => esc_html__( 'Classic 2', 'bingo' ),
						'layout_grid'          => esc_html__( 'Grid 1', 'bingo' ),
						'layout_grid_small'    => esc_html__( 'Grid 2', 'bingo' ),
						'layout_overlay_small' => esc_html__( 'Grid Overlay', 'bingo' ),
					),
					'std'     => 'default',
				),
				array(
					'name' => esc_html__( 'Category Header BG Image', 'bingo' ),
					'desc' => esc_html__( 'input your background image URL for this header category (attachment image URL).', 'bingo' ),
					'id'   => 'bingo_ruby_cat_bg',
					'type' => 'text',
					'std'  => '',
				),
				array(
					'name' => esc_html__( 'Category Icon Color', 'bingo' ),
					'id'   => 'bingo_ruby_cat_icon_color_picker',
					'desc' => esc_html__( 'select a color for this category info (in hex color, example: #55acee) , Leave blank if you want to set default color.', 'bingo' ),
					'type' => 'color',
					'std'  => '#55acee',
				),
				array(
					'id'      => 'bingo_ruby_cat_sidebar',
					'type'    => 'select',
					'name'    => esc_html__( 'Category Sidebar Name', 'bingo' ),
					'desc'    => esc_html__( 'Select a sidebar for this category. This option will override default setting in theme options.', 'bingo' ),
					'options' => bingo_ruby_theme_config::sidebar_name( true ),
					'std'     => 'bingo_ruby_default_from_theme_options'
				),
				array(
					'id'      => 'bingo_ruby_cat_sidebar_position',
					'name'    => esc_html__( 'Category Sidebar Position', 'bingo' ),
					'desc'    => esc_html__( 'Select a position for this category sidebar. This option will override default setting in theme options.', 'bingo' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default From Theme Option', 'bingo' ),
						'none'    => esc_html__( 'None', 'bingo' ),
						'left'    => esc_html__( 'Left', 'bingo' ),
						'right'   => esc_html__( 'Right', 'bingo' ),
					),
					'std'     => 'default'
				),
			),
		);

		foreach ( $meta_sections as $meta_section ) {
			new RW_Taxonomy_Meta( $meta_section );
		}
	}

	add_action( 'admin_init', 'bingo_ruby_register_taxonomy_cat' );
}
