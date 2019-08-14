<?php
/**
 * Class bingo_ruby_breaking_news
 * get data for breaking news
 */
if ( ! class_exists( 'bingo_ruby_breaking_news' ) ) {
	class bingo_ruby_breaking_news {

		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return WP_Query
		 * get breaking news data
		 */
		static function get_data() {

			//get options
			$options    = array();
			$categories = bingo_ruby_core::get_option( 'breaking_news_cat' );

			if ( is_array( $categories ) ) {
				$options['category_ids'] = implode( ',', $categories );
			}

			$tags = bingo_ruby_core::get_option( 'breaking_news_tag' );

			if ( is_array( $tags ) ) {
				$options['tag_in'] = $tags;
			}

			$options['orderby']        = bingo_ruby_core::get_option( 'breaking_news_sort' );
			$options['posts_per_page'] = bingo_ruby_core::get_option( 'breaking_news_num' );
			$options['offset']         = bingo_ruby_core::get_option( 'breaking_news_offset' );

			$data_query = bingo_ruby_query::get_data( $options );

			return $data_query;
		}


		/**-------------------------------------------------------------------------------------------------------------------------
		 * @return array
		 * get popular tags
		 */
		static function get_popular_tag() {

			$tag_num = bingo_ruby_core::get_option( 'breaking_news_right_num' );
			if ( empty( $tag_num ) ) {
				$tag_num = 3;
			}

			$options = array(
				'echo'     => true,
				'taxonomy' => 'post_tag',
				'number'   => $tag_num,
				'orderby'  => 'count',
				'format'   => 'array',
			);

			$data_query = get_categories( $options );

			return $data_query;
		}
	}
}
