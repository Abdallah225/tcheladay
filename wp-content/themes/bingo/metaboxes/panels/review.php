<?php
//meta box post review config
if ( ! function_exists( 'bingo_ruby_metabox_single_post_review' ) ) {
	function bingo_ruby_metabox_single_post_review() {
		return array(
			'id'         => 'bingo_ruby_metabox_review_options',
			'title'      => esc_html__( 'POST REVIEWS', 'bingo' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'name'  => esc_html__( 'Review Product', 'bingo' ),
					'id'    => 'bingo_ruby_enable_review',
					'class' => 'ruby-review-checkbox',
					'type'  => 'checkbox',
					'desc'  => esc_html__( 'Enable review feature for this post', 'bingo' ),
					'std'   => 0,
				),
				array(
					'name'     => esc_html__( 'Review Box Position', 'bingo' ),
					'id'       => 'bingo_ruby_review_box_position',
					'type'     => 'image_select',
					'multiple' => false,
					'desc'     => esc_html__( 'select a position for this review', 'bingo' ),
					'options'  => bingo_ruby_theme_config::metabox_review_box_position(),
					'std'      => 'default'
				),
				array(
					'name' => esc_html__( 'Criteria 1 Description', 'bingo' ),
					'id'   => 'bingo_ruby_cd1',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 1 Score', 'bingo' ),
					'id'         => 'bingo_ruby_cs1',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				array(
					'name' => esc_html__( 'Criteria 2 Description', 'bingo' ),
					'id'   => 'bingo_ruby_cd2',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 2 Score', 'bingo' ),
					'id'         => 'bingo_ruby_cs2',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				array(
					'name' => esc_html__( 'Criteria 3 Description', 'bingo' ),
					'id'   => 'bingo_ruby_cd3',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 3 Score', 'bingo' ),
					'id'         => 'bingo_ruby_cs3',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				array(
					'name' => esc_html__( 'Criteria 4 Description', 'bingo' ),
					'id'   => 'bingo_ruby_cd4',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 4 Score', 'bingo' ),
					'id'         => 'bingo_ruby_cs4',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 5 Text & Score
				array(
					'name' => esc_html__( 'Criteria 5 Description', 'bingo' ),
					'id'   => 'bingo_ruby_cd5',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 5 Score', 'bingo' ),
					'id'         => 'bingo_ruby_cs5',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 6 Text & Score
				array(
					'name' => esc_html__( 'Criteria 6 Description', 'bingo' ),
					'id'   => 'bingo_ruby_cd6',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 6 Score', 'bingo' ),
					'id'         => 'bingo_ruby_cs6',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				// Criteria 7 Text & Score
				array(
					'name' => esc_html__( 'Criteria 7 Description', 'bingo' ),
					'id'   => 'bingo_ruby_cd7',
					'type' => 'text',
				),
				array(
					'name'       => esc_html__( 'Criteria 7 Score', 'bingo' ),
					'id'         => 'bingo_ruby_cs7',
					'type'       => 'slider',
					'js_options' => array(
						'min'  => 0,
						'max'  => 10,
						'step' => .1,
					),
				),
				array(
					'name'  => esc_html__( 'Average Score', 'bingo' ),
					'id'    => 'bingo_ruby_as',
					'class' => 'ruby-average-score input-medium',
					'type'  => 'text',
				),
				array(
					'id'    => 'bingo_ruby_review_summary',
					'name'  => esc_html__( 'Review Summary', 'bingo' ),
					'class' => 'field-review-summary input-medium',
					'type'  => 'textarea',
				),
			)
		);
	}
}