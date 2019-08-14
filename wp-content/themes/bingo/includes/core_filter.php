<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $type
 * @param string $data_ids
 * @param string $text
 *
 * @return array
 * get data config to display dropdown
 */
if ( ! function_exists( 'bingo_ruby_ajax_filter_dropdown_config' ) ) {
	function bingo_ruby_ajax_filter_dropdown_config( $type = 'category', $data_ids = '', $text = '' ) {
		$data_filter = array();

		if ( empty( $text ) ) {
			$text = esc_html__( 'all', 'bingo' );
		}

		$data_filter[0] = array(
			'id'   => 0,
			'name' => esc_html( $text )
		);

		switch ( $type ) {

			case 'category' :

				$param            = array();
				$param['include'] = esc_attr( $data_ids );
				$param['exclude'] = 1;
				$param['number']  = 50;

				$data_cat = get_categories( $param );
				if ( ! empty( $data_ids ) ) {
					$ruby_array_ids = explode( ',', $data_ids );
					foreach ( $ruby_array_ids as $data_id ) {
						$data_id = trim( $data_id );
						foreach ( $data_cat as $data_cat_el ) {
							if ( $data_id == $data_cat_el->cat_ID ) {
								$data_filter[] = array(
									'id'   => $data_cat_el->cat_ID,
									'name' => $data_cat_el->name
								);
							}
						}
					}
				} else {
					foreach ( $data_cat as $data_cat_el ) {
						$data_filter[] = array(
							'id'   => $data_cat_el->cat_ID,
							'name' => $data_cat_el->name
						);
					}
				}
				break;

			case 'tag' :

				$param            = array();
				$param['include'] = esc_attr( $data_ids );
				$param['number']  = 30;

				$data_tag = get_tags( $param );
				foreach ( $data_tag as $data_tag_el ) {
					$data_filter[] = array(
						'id'   => $data_tag_el->slug,
						'name' => $data_tag_el->name
					);
				}
				break;

			case 'author' :

				$param            = array();
				$param['include'] = esc_attr( $data_ids );
				$param['who']     = 'authors';
				$data_author      = get_users( $param );

				foreach ( $data_author as $data_author_el ) {
					$data_filter[] = array(
						'id'   => $data_author_el->ID,
						'name' => $data_author_el->display_name
					);
				};

				break;

			case 'popular':

				$data_filter[] = array(
					'id'   => 'featured',
					'name' => esc_html__( 'featured', 'bingo' )
				);

				$data_filter[] = array(
					'id'   => 'popular',
					'name' => esc_html__( 'popular', 'bingo' )
				);

				break;
		};

		return $data_filter;
	}
}
