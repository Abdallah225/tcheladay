<?php
//meta box authors config
if ( ! function_exists( 'bingo_ruby_metabox_author_box' ) ) {
	function bingo_ruby_metabox_author_box() {
		return array(
			'id'         => 'bingo_ruby_metabox_author_box_options',
			'title'      => esc_html__( 'author OPTIONS', 'bingo' ),
			'post_types' => array( 'post' ),
			'priority'   => 'default',
			'context'    => 'side',
			'fields'     => array(
				array(
					'id'      => 'bingo_ruby_single_author_box_position',
					'type'    => 'select',
					'name'    => esc_html__( 'author box', 'bingo' ),
					'desc'    => esc_html__( 'Enable or disable this post authors box, This option will override "Bingo Options -> Single Post-> Author Box Position" option', 'bingo' ),
					'options' => array(
						'default' => esc_html__( 'Default From Theme Options', 'bingo' ),
						'top'     => esc_html__( 'Top Position', 'bingo' ),
						'bottom'  => esc_html__( 'Bottom Position', 'bingo' ),
					),
					'std'     => 'default'
				)
			)
		);
	}
}