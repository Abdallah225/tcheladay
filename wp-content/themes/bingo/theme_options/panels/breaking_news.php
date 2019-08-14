<?php
if ( ! function_exists( 'bingo_ruby_theme_options_breaking_news' ) ) {
	function bingo_ruby_theme_options_breaking_news() {
		//design layout
		return array(
			'id'     => 'bingo_ruby_theme_options_breaking_news',
			'title'  => esc_html__( 'Breaking News', 'bingo' ),
			'desc'   => esc_html__( 'options below will apply to the breaking news bar.', 'bingo' ),
			'icon'   => 'el el-fire',
			'fields' => array(

				//breaking news
				array(
					'id'     => 'section_start_breaking_news',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Breaking News Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'breaking_news_page',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show On Ruby Composer Pages', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the breaking news bar on pages have built with Ruby Composer.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'breaking_news_blog',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show On The Blog', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the breaking news bar on the latest blog page (index.php)', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'breaking_news_title',
					'type'     => 'text',
					'title'    => esc_html__( 'breaking news title', 'bingo' ),
					'subtitle' => esc_html__( 'Input your breaking news title.', 'bingo' ),
					'default'  => esc_html__( 'breaking news', 'bingo' )
				),
				array(
					'id'     => 'section_end_breaking_news',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//breaking filter
				array(
					'id'     => 'section_start_breaking_filter',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Breaking News Filter Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'breaking_news_cat',
					'type'     => 'select',
					'data'     => 'categories',
					'multi'    => true,
					'title'    => esc_html__( 'Categories Filter', 'bingo' ),
					'subtitle' => esc_html__( 'Filter multi categories for the breaking news bar, leave blank if you want to select all categories.', 'bingo' ),
				),
				array(
					'id'       => 'breaking_news_tag',
					'type'     => 'select',
					'data'     => 'tags',
					'multi'    => true,
					'title'    => esc_html__( 'Tags Filter', 'bingo' ),
					'subtitle' => esc_html__( 'Select tags for breaking news bar, you can select multi tags. Leave blank if you don\'t select any tags.', 'bingo' ),
				),
				array(
					'id'       => 'breaking_news_sort',
					'type'     => 'select',
					'title'    => esc_html__( 'Sorted By', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sort type for the breaking news bar.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::post_orders(),
					'default'  => 'date_post'
				),
				array(
					'id'       => 'breaking_news_num',
					'title'    => esc_html__( 'Number of Posts', 'bingo' ),
					'subtitle' => esc_html__( 'Select number of posts for the breaking news bar.', 'bingo' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 5
				),
				array(
					'id'       => 'breaking_news_offset',
					'title'    => esc_html__( 'Offset of Posts', 'bingo' ),
					'subtitle' => esc_html__( 'Select number of posts to displace or pass over. The beginning number is 0.', 'bingo' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_breaking_filter',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_breaking_right',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Right Element Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'breaking_news_right',
					'type'     => 'switch',
					'title'    => esc_html__( 'show tags at right', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable tags at the right of breaking news bar', 'bingo' ),
					'default'  => 0
				),
				array(
					'id'       => 'breaking_news_right_type',
					'type'     => 'switch',
					'title'    => esc_html__( 'Tags - Type', 'bingo' ),
					'subtitle' => esc_html__( 'Select a type to display at the right of the breaking news bar.', 'bingo' ),
					'on'       => 'popular tags',
					'off'      => 'custom tags',
					'default'  => 1
				),
				array(
					'id'       => 'breaking_news_right_num',
					'type'     => 'text',
					'title'    => esc_html__( 'Tags - Number Of Tags', 'bingo' ),
					'subtitle' => esc_html__( 'Input number of tags for displaying at the right of the breaking news bar.', 'bingo' ),
					'required' => array( 'breaking_news_right_type', '=', 1 ),
					'class'    => 'small-text',
					'validate' => 'numeric',
					'switch'   => true,
					'default'  => 3
				),
				array(
					'id'       => 'breaking_news_right_custom',
					'type'     => 'select',
					'title'    => esc_html__( 'custom tags', 'bingo' ),
					'subtitle' => esc_html__( 'select tags you want to display', 'bingo' ),
					'required' => array( 'breaking_news_right_type', '=', 0 ),
					'multi'    => true,
					'data'     => 'tags',
					'default'  => ''
				),
				array(
					'id'     => 'section_end_breaking_right',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),

			)
		);
	}
}