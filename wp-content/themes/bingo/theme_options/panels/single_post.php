<?php
//post options
if ( ! function_exists( 'bingo_ruby_theme_options_single_post' ) ) {
	function bingo_ruby_theme_options_single_post() {

		return array(
			'title'  => esc_html__( 'Single Options', 'bingo' ),
			'id'     => 'bingo_ruby_theme_ops_section_single_post',
			'desc'   => esc_html__( 'options below will apply to all single post pages.', 'bingo' ),
			'icon'   => 'el el-file',
		);
	}
}
