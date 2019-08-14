<?php
if ( ! function_exists( 'bingo_ruby_metabox_single_post_forgery' ) ) {
	function bingo_ruby_metabox_single_post_forgery() {
		return array(
			'id'         => 'bingo_ruby_metabox_single_post_forgery',
			'title'      => esc_html__( 'FORGERY SHARES, VIEWS OPTIONS', 'bingo' ),
			'post_types' => array( 'post' ),
			'priority'   => 'default',
			'context'    => 'side',
			'fields'     => array(
				array(
					'id'   => 'bingo_ruby_post_forgery_share',
					'name' => esc_html__( 'post share Forgery', 'bingo' ),
					'desc' => esc_html__( 'Input a specific value to add to shares number of this post, leave blank if you want to display real number.', 'bingo' ),
					'type' => 'text',
					'std'  => ''
				),
				array(
					'id'   => 'bingo_ruby_post_forgery_view',
					'name' => esc_html__( 'post view forgery', 'bingo' ),
					'desc' => esc_html__( 'Input a specific value to add to views number of this post, leave blank if you want to display real number.', 'bingo' ),
					'type' => 'text',
					'std'  => ''
				),

			),
		);
	}
}