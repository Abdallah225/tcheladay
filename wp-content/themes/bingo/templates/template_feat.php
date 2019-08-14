<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render category featured area at home page
 */
if ( ! function_exists( 'bingo_ruby_render_feat_cat' ) ) {
	function bingo_ruby_render_feat_cat( $feat_cat_style ) {

		//render
		$str = '';

		switch ( $feat_cat_style ) {
			case 'slider_hw' :
				$str .= '<div class="feat-wrap fw-block-6">';
				$str .= bingo_ruby_feat_wrapper_slider();
				$str .= '</div><!--#feat wrap-->';
				break;
			case 'grid_slider_fw' :
				$str .= '<div class="feat-wrap fw-block-1">';
				$str .= bingo_ruby_feat_slider_fw();
				$str .= '</div><!--#feat wrap-->';
				break;
			case 'grid_slider_hw' :
				$str .= '<div class="feat-wrap fw-block-3">';
				$str .= bingo_ruby_feat_slider_hw();
				$str .= '</div><!--#feat wrap-->';
				break;
			case 'grid_hw' :
				$str .= '<div class="feat-wrap fw-block-4">';
				$str .= bingo_ruby_feat_grid_hw();
				$str .= '</div><!--#feat wrap-->';
				break;
			case 'carousel' :
				$str .= '<div class="feat-wrap fw-block-5">';
				$str .= bingo_ruby_feat_carousel();
				$str .= '</div><!--#feat wrap-->';
				break;
			default :
				$str .= '';
				break;
		}

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return WP_Query
 * get category featured post data
 */
if ( ! function_exists( 'bingo_ruby_feat_cat_data' ) ) {
	function bingo_ruby_feat_cat_data( $bingo_ruby_options = array(), $override = '' ) {

        //get id
        if ( empty( $override ) ) {
            $ruby_cate_id = bingo_ruby_core::get_page_cat_id();
        } else {
            $ruby_cate_id = $override;
        }

        //get home options
        $bingo_ruby_meta_cat = get_option( 'bingo_ruby_cat_option' ) ? get_option( 'bingo_ruby_cat_option' ) : array();
        if ( array_key_exists( $ruby_cate_id, $bingo_ruby_meta_cat ) ) {
            $bingo_ruby_meta_cat = $bingo_ruby_meta_cat[ $ruby_cate_id ];
        }

        //feat category style
        if ( ! empty( $bingo_ruby_meta_cat['bingo_ruby_cat_feat'] ) && 'default' != $bingo_ruby_meta_cat['bingo_ruby_cat_feat'] ) {
            $feat_cat_style = $bingo_ruby_meta_cat['bingo_ruby_cat_feat'];
        } else {
            $feat_cat_style = bingo_ruby_core::get_option( 'category_featured_style' );
        }

        $bingo_ruby_options['category_ids'] = $ruby_cate_id;

        //number slides
        if ( ! empty( $bingo_ruby_meta_cat['bingo_category_feat_slides_per_page'] )) {
            $bingo_ruby_options['slides_per_page'] = $bingo_ruby_meta_cat['bingo_category_feat_slides_per_page'];
        } else {
            $bingo_ruby_options['slides_per_page'] = bingo_ruby_core::get_option( 'category_slides_per_page' );
        }

        if ( empty( $bingo_ruby_options['slides_per_page'] ) ) {
            $bingo_ruby_options['slides_per_page'] = 1;
        }

        if ( $feat_cat_style == 'carousel' ) {
            $bingo_ruby_options['posts_per_page'] = $bingo_ruby_options['slides_per_page'] * 4;
        } elseif ( $feat_cat_style == 'grid_hw' ) {
            $bingo_ruby_options['posts_per_page'] = $bingo_ruby_options['slides_per_page'] * 5;
        }  elseif ( $feat_cat_style == 'grid_slider_hw' ) {
            $bingo_ruby_options['posts_per_page'] = $bingo_ruby_options['slides_per_page'] * 5;
        } elseif ( $feat_cat_style == 'grid_slider_fw' ) {
            $bingo_ruby_options['posts_per_page'] = $bingo_ruby_options['slides_per_page'] * 5;
        } elseif ( $feat_cat_style == 'slider_hw' ) {
            if ( ! empty( $bingo_ruby_meta_cat['bingo_category_feat_slides_per_page'] )) {
                $bingo_ruby_options['posts_per_page'] = $bingo_ruby_meta_cat['bingo_category_feat_slides_per_page'];
            } else {
                $bingo_ruby_options['posts_per_page'] = bingo_ruby_core::get_option( 'category_featured_num' );
            }
        }

        $tags = bingo_ruby_core::get_option( 'category_featured_tag' );

        if ( is_array( $tags ) ) {
            $bingo_ruby_options['tag_in'] = $tags;
        }

        if ( ! empty( $bingo_ruby_meta_cat['bingo_category_feat_orderby'] ) && 'default' != $bingo_ruby_meta_cat['bingo_category_feat_orderby'] ) {
            $bingo_ruby_options['orderby'] = $bingo_ruby_meta_cat['bingo_category_feat_orderby'];
        } else {
            $bingo_ruby_options['orderby'] = bingo_ruby_core::get_option( 'category_featured_sort' );
        }

        if ( ! empty( $bingo_ruby_meta_cat['bingo_category_feat_offset'] ) && '-1' != $bingo_ruby_meta_cat['bingo_category_feat_offset'] ) {
            $bingo_ruby_options['offset'] = $bingo_ruby_meta_cat['bingo_category_feat_offset'];
        } else {
            $bingo_ruby_options['offset'] = bingo_ruby_core::get_option( 'category_featured_offset' );
        }

        $query_data = bingo_ruby_query::get_data( $bingo_ruby_options );

        return $query_data;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return WP_Query
 * get category featured post data
 */
if ( ! function_exists( 'bingo_ruby_feat_blog_data' ) ) {
	function bingo_ruby_feat_blog_data( $bingo_ruby_options = array() ) {

		//feat category style
		$feat_style = bingo_ruby_core::get_option( 'feat_style' );

		$bingo_ruby_options['category_ids'] = bingo_ruby_core::get_option( 'feat_cat' );

		//number slides
		$bingo_ruby_options['slides_per_page'] = bingo_ruby_core::get_option( 'slides_per_page' );

		if ( empty( $bingo_ruby_options['slides_per_page'] ) ) {
			$bingo_ruby_options['slides_per_page'] = 1;
		}

		if ( $feat_style == 'carousel' ) {
			$bingo_ruby_options['posts_per_page'] = $bingo_ruby_options['slides_per_page'] * 4;
		} elseif ( $feat_style == 'grid_hw' ) {
			$bingo_ruby_options['posts_per_page'] = $bingo_ruby_options['slides_per_page'] * 5;
		}  elseif ( $feat_style == 'grid_slider_hw' ) {
			$bingo_ruby_options['posts_per_page'] = $bingo_ruby_options['slides_per_page'] * 5;
		} elseif ( $feat_style == 'grid_slider_fw' ) {
			$bingo_ruby_options['posts_per_page'] = $bingo_ruby_options['slides_per_page'] * 5;
		} elseif ( $feat_style == 'slider_hw' ) {
			$bingo_ruby_options['posts_per_page'] = bingo_ruby_core::get_option( 'feat_num' );
		}

		$tags = bingo_ruby_core::get_option( 'feat_tag' );

		if ( is_array( $tags ) ) {
			$bingo_ruby_options['tag_in'] = $tags;
		}
		$bingo_ruby_options['orderby'] = bingo_ruby_core::get_option( 'feat_sort' );

		$bingo_ruby_options['offset'] = bingo_ruby_core::get_option( 'feat_offset' );

		$query_data = bingo_ruby_query::get_data( $bingo_ruby_options );

		return $query_data;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render grid full width slider
 */
if ( ! function_exists( 'bingo_ruby_feat_wrapper_slider' ) ) {
	function bingo_ruby_feat_wrapper_slider() {

		if ( is_category() ) {
			$data_query = bingo_ruby_feat_cat_data();
		} else {
			$data_query = bingo_ruby_feat_blog_data();
		}
		$options = array();

		$str = '';

		$total   = $data_query->post_count;

		$str .= '<div class="ruby-block-inner ruby-container">';
		$str .= '<div class="block-content-wrap">';
		$str .= '<div class="block-content-inner row">';

		if ( $data_query->have_posts() ) {

			if ( $total > 1 ) {
				$str .= '<div class="fw-block-6-slider-outer">';
				$str .= '<div class="slider-loader"></div>';
				$str .= '<div class="fw-block-6-slider slider-init">';
			}

			while ( $data_query->have_posts() ) {
				$data_query->the_post();
				$str .= '<div class="post-outer">';
				$str .= bingo_ruby_post_feat_9( $options );
				$str .= '</div>';
			}

			if ( $total > 1 ) {
				$str .= '</div><!--#slider-->';
				$str .= '</div><!--#slider outer-->';
			}

		} else {
			$str .= bingo_ruby_block::no_content();
		}

		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		wp_reset_postdata();

		return $str;

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render grid full width slider
 */
if ( ! function_exists( 'bingo_ruby_feat_slider_fw' ) ) {
	function bingo_ruby_feat_slider_fw() {

		if ( is_category() ) {
			$data_query = bingo_ruby_feat_cat_data();
		} else {
			$data_query = bingo_ruby_feat_blog_data();
		}
		$options = array();

		$str = '';

		$counter = 1;
		$total   = $data_query->post_count;
		$loop    = intval( floor( $total / 5 ) );

		$str .= '<div class="ruby-block-inner">';
		$str .= '<div class="block-content-wrap">';
		$str .= '<div class="block-content-inner row">';

		if ( $data_query->have_posts() && $loop >= 1 ) {
			if ( $loop > 1 ) {
				$str .= '<div class="fw-block-1-slider-outer">';
				$str .= '<div class="slider-loader"></div>';
				$str .= '<div class="fw-block-1-slider slider-init">';
			}

			for ( $i = 1; $i <= $loop; $i ++ ) {
				$str .= '<div class="fw-block-1-slider-el">';
				while ( $data_query->have_posts() ) {
					$data_query->the_post();

					if ( 1 == $counter ) {
						$str .= '<div class="col-left col-sm-6 col-xs-12">';
						$str .= bingo_ruby_post_feat_1( $options );
						$str .= '</div><!--#left column-->';
					} else {
						if ( 2 == $counter ) {
							if ( $loop > 1 ) {
								$str .= '<div class="col-right col-sm-6 col-xs-12">';
							} else {
								$str .= '<div class="col-right ruby-coll-scroll col-sm-6 col-xs-12">';
							}
						}
						$str .= bingo_ruby_post_feat_2( $options );
						if ( 5 == $counter ) {
							$str .= '</div><!--#right column-->';
						}
					}

					if ( $counter >= 5 ) {
						//reset counter
						$counter = 1;
						break;
					} else {
						$counter ++;
					}
				}
				$str .= '</div>';
			}

			if ( $loop > 1 ) {
				$str .= '</div><!--#slider-->';
				$str .= '</div><!--#slider outer-->';
			}
		} else {
			$str .= bingo_ruby_block::no_content();
		}

		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		wp_reset_postdata();

		return $str;

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render grid slider hw
 */
if ( ! function_exists( 'bingo_ruby_feat_slider_hw' ) ) {
	function bingo_ruby_feat_slider_hw() {

		if ( is_category() ) {
			$data_query = bingo_ruby_feat_cat_data();
		} else {
			$data_query = bingo_ruby_feat_blog_data();
		}
		$options = array();

		$str = '';

		$counter = 1;
		$total   = $data_query->post_count;
		$loop    = intval( floor( $total / 5 ) );

		$str .= '<div class="ruby-block-inner ruby-container">';
		$str .= '<div class="block-content-wrap">';
		$str .= '<div class="block-content-inner row">';

		if ( $data_query->have_posts() && $loop >= 1 ) {
			if ( $loop > 1 ) {
				$str .= '<div class="fw-block-3-slider-outer">';
				$str .= '<div class="slider-loader"></div>';
				$str .= '<div class="fw-block-3-slider slider-init">';
			}

			for ( $i = 1; $i <= $loop; $i ++ ) {
				$str .= '<div class="fw-block-3-slider-el">';
				while ( $data_query->have_posts() ) {
					$data_query->the_post();

					if ( 1 == $counter ) {
						$str .= '<div class="col-left col-sm-6 col-xs-12">';
						$str .= bingo_ruby_post_feat_3( $options );
						$str .= '</div><!--#left column-->';
					} else {
						if ( 2 == $counter ) {
							if ( $loop > 1 ) {
								$str .= '<div class="col-right col-sm-6 col-xs-12">';
							} else {
								$str .= '<div class="col-right ruby-coll-scroll col-sm-6 col-xs-12">';
							}
						}
						$str .= bingo_ruby_post_feat_7( $options );
						if ( 5 == $counter ) {
							$str .= '</div><!--#right column-->';
						}
					}

					if ( $counter >= 5 ) {
						//reset counter
						$counter = 1;
						break;
					} else {
						$counter ++;
					}
				}
				$str .= '</div>';
			}

			if ( $loop > 1 ) {
				$str .= '</div><!--#slider-->';
				$str .= '</div><!--#slider outer-->';
			}
		} else {
			$str .= bingo_ruby_block::no_content();
		}

		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		wp_reset_postdata();

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render grid hw
 */
if ( ! function_exists( 'bingo_ruby_feat_grid_hw' ) ) {
	function bingo_ruby_feat_grid_hw() {

		if ( is_category() ) {
			$data_query = bingo_ruby_feat_cat_data();
		} else {
			$data_query = bingo_ruby_feat_blog_data();
		}
		$options = array();

		$str     = '';
		$counter = 1;
		$total   = $data_query->post_count;
		$loop    = intval( floor( $total / 5 ) );

		$str .= '<div class="ruby-block-inner ruby-container">';
		$str .= '<div class="block-content-wrap">';
		$str .= '<div class="block-content-inner row">';
		if ( $data_query->have_posts() && $loop >= 1 ) {
			if ( $loop > 1 ) {
				$str .= '<div class="fw-block-4-slider-outer">';
				$str .= '<div class="slider-loader"></div>';
				$str .= '<div class="fw-block-4-slider slider-init">';
			}

			for ( $i = 1; $i <= $loop; $i ++ ) {
				$str .= '<div class="fw-block-4-slider-el">';
				while ( $data_query->have_posts() ) {
					$data_query->the_post();

					if ( 1 == $counter || 2 == $counter ) {
						$str .= '<div class="post-outer col-sm-6 col-xs-12">';
						$str .= bingo_ruby_post_feat_6( $options );
						$str .= '</div>';
					} else {
						if ( 3 == $counter || 4 == $counter || 5 == $counter ) {
                            if (  $loop == 1 && 3 == $counter ) {
                                $str .= '<div class="ruby-coll-scroll">';
                            }
							$str .= '<div class="post-outer col-sm-4 col-xs-12">';
							$str .= bingo_ruby_post_feat_4( $options );
							$str .= '</div>';
                            if ( $loop == 1 && 5 == $counter ) {
                                $str .= '</div>';
                            }
						}
					}
					if ( $counter >= 5 ) {
						//reset counter
						$counter = 1;
						break;
					} else {
						$counter ++;
					}
				}
				$str .= '</div>';
			}

			if ( $loop > 1 ) {
				$str .= '</div><!--#slider-->';
				$str .= '</div><!--#slider outer-->';
			}

		} else {
			$str .= bingo_ruby_block::no_content();
		}
		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		wp_reset_postdata();

		return $str;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render carousel
 */
if ( ! function_exists( 'bingo_ruby_feat_carousel' ) ) {
	function bingo_ruby_feat_carousel() {

		if ( is_category() ) {
			$data_query = bingo_ruby_feat_cat_data();
		} else {
			$data_query = bingo_ruby_feat_blog_data();
		}
		$options = array();

		$str     = '';
		$counter = 1;
		$total   = $data_query->post_count;
		$loop    = intval( floor( $total / 4 ) );

		$str .= '<div class="ruby-block-inner ruby-container">';
		$str .= '<div class="block-content-wrap">';
		$str .= '<div class="block-content-inner row">';


		//check empty
		if ( $data_query->have_posts() && $loop >= 1 ) {
			if ( $loop > 1 ) {
				$str .= '<div class="fw-block-5-slider-outer">';
				$str .= '<div class="slider-loader"></div>';
				$str .= '<div class="fw-block-5-slider slider-init">';
			}
			for ( $i = 1; $i <= $loop; $i ++ ) {
				$str .= '<div class="fw-block-5-slider-el">';
				while ( $data_query->have_posts() ) {
					$data_query->the_post();

					$str .= '<div class="post-outer">';
					$str .= bingo_ruby_post_feat_8( $options );
					$str .= '</div>';

					if ( $counter >= 4 ) {
						//reset counter
						$counter = 1;
						break;
					} else {
						$counter ++;
					}
				}
				$str .= '</div>';
			}
			if ( $loop > 1 ) {
				$str .= '</div><!--#slider-->';
				$str .= '</div><!--#slider outer-->';
			}
		} else {
			$str .= bingo_ruby_block::no_content();
		}


		$str .= '</div>';
		$str .= '</div>';
		$str .= '</div>';

		wp_reset_postdata();

		return $str;
	}
}
