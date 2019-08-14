<?php
/**
 * @return array
 * composer listing config
 */
if ( ! function_exists( 'bingo_ruby_metabox_composer' ) ) {
	function bingo_ruby_metabox_composer() {
		return array(
			'id'         => 'bingo_ruby_metabox_composer_options',
			'title'      => esc_html__( 'COMPOSER LATEST BLOG SECTION', 'bingo' ),
			'post_types' => array( 'page' ),
			'priority'   => 'default',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'      => 'bingo_ruby_composer_blog',
					'name'    => esc_html__( 'Enable Section', 'bingo' ),
					'desc'    => esc_html__( 'enable or disable the latest blog section, this section will display at the end of this page with pagination bar. ', 'bingo' ),
					'type'    => 'select',
					'options' => array(
						'0' => esc_html__( '--Disable--', 'bingo' ),
						'1' => esc_html__( 'Enable', 'bingo' )
					),
					'std'     => '0'
				),
				array(
					'id'   => 'bingo_ruby_composer_blog_title',
					'name' => esc_html__( 'Section Title', 'bingo' ),
					'desc' => esc_html__( 'input title for this section', 'bingo' ),
					'type' => 'text',
					'std'  => esc_html__( 'the latest news', 'bingo' )
				),
				array(
					'id'      => 'bingo_ruby_composer_blog_layout',
					'name'    => esc_html__( 'Blog Layout', 'bingo' ),
					'desc'    => esc_html__( 'select layout for this section.', 'bingo' ),
					'type'    => 'image_select',
					'options' => bingo_ruby_theme_config::metabox_blog_layout(),
					'std'     => 'layout_list'
				),
				array(
					'id'      => 'bingo_ruby_composer_blog_1st_classic',
					'name'    => esc_html__( '1st Classic Layout', 'bingo' ),
					'desc'    => esc_html__( 'enable or disable big classic layout at first of the listing, This option will not affect to the classic layouts.', 'bingo' ),
					'type'    => 'select',
					'options' => array(
						'0' => esc_html__( '--Disable--', 'bingo' ),
						'1' => esc_html__( 'Enable', 'bingo' )
					),
					'std'     => '0'
				),
				array(
					'id'   => 'bingo_ruby_composer_blog_category',
					'name' => esc_html__( 'Category filter', 'bingo' ),
					'desc' => esc_html__( 'input category ids you want to filter, separated by commas (example: 1,2,3). Leave blank if you want to display all categories.', 'bingo' ),
					'type' => 'text',
					'std'  => ''
				),
				array(
					'id'   => 'bingo_ruby_composer_blog_number',
					'name' => esc_html__( 'number of posts', 'bingo' ),
					'desc' => esc_html__( 'select number of posts for for this sections.', 'bingo' ),
					'type' => 'text',
					'std'  => '6'
				),
				array(
					'id'   => 'bingo_ruby_composer_blog_offset',
					'name' => esc_html__( 'Post Offset', 'bingo' ),
					'desc' => esc_html__( 'select number of posts to displace or pass over. Leave blank or set 0 if you want to show at the beginning.', 'bingo' ),
					'type' => 'text',
					'std'  => '',
				),
				array(
					'id'      => 'bingo_ruby_composer_blog_sidebar_name',
					'type'    => 'select',
					'name'    => esc_html__( 'Sidebar Name', 'bingo' ),
					'desc'    => esc_html__( 'Select sidebar for this section.', 'bingo' ),
					'options' => bingo_ruby_theme_config::sidebar_name(),
					'std'     => 'bingo_ruby_sidebar_default'
				),
				array(
					'id'       => 'bingo_ruby_composer_blog_sidebar_position',
					'class'    => 'ruby-sidebar-select',
					'name'     => esc_html__( 'Sidebar Position', 'bingo' ),
					'desc'     => esc_html__( 'select sidebar position for this section.', 'bingo' ),
					'type'     => 'image_select',
					'multiple' => false,
					'options'  => bingo_ruby_theme_config::metabox_sidebar_position( false ),
					'std'      => 'right'
				),
			)
		);
	}
}