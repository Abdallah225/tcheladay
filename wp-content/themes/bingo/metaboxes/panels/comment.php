<?php
//meta box comments config
if ( ! function_exists( 'bingo_ruby_metabox_comment_box' ) ) {
	function bingo_ruby_metabox_comment_box() {
		return array(
			'id'         => 'bingo_ruby_metabox_comment_box_options',
			'title'      => esc_html__( 'COMMENT OPTIONS', 'bingo' ),
			'post_types' => array( 'post', 'page' ),
			'priority'   => 'low',
			'context'    => 'side',
			'fields'     => array(
				array(
					'id'      => 'bingo_ruby_single_comment_box',
					'type'    => 'select',
					'name'    => esc_html__( 'comment box', 'bingo' ),
					'desc'    => esc_html__( 'Enable or disable this post comments box, This option will override "Bingo Options -> Single Post-> Show Comment Box" option', 'bingo' ),
					'options' => array(
						'default' => esc_html__( 'Default From Theme Options', 'bingo' ),
						'1'       => esc_html__( 'Show', 'bingo' ),
						'2'       => esc_html__( 'None', 'bingo' )
					),
					'std'     => 'default'
				)
			)
		);
	}
}