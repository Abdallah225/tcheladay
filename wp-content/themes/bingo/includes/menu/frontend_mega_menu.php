<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * Class bingo_ruby_Walker
 * this file display front end mega menu
 */
class bingo_ruby_walker extends Walker_Nav_Menu {

	/**-------------------------------------------------------------------------------------------------------------------------
	 * @param string $item_output
	 * @param object $item
	 * @param int $depth
	 * @param array $args
	 * @param int $id
	 * start el
	 */
	public function start_el( &$item_output, $item, $depth = 0, $args = array(), $id = 0 ) {

		$indent      = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[]   = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );

		$enable_mega_cat    = $item->bingo_ruby_mega_cat;
		$enable_mega_col    = $item->bingo_ruby_mega_col;
		$enable_mega_col_bg = $item->bingo_ruby_mega_col_bg;
		$menu_icon          = $item->bingo_ruby_icon;
		$enable_mega_col_ad_code = $item->bingo_ruby_mega_col_ad_code;
		$enable_mega_col_ad_image = $item->bingo_ruby_mega_col_ad_image;
		$enable_mega_col_ad_url = $item->bingo_ruby_mega_col_ad_url;

		//add ajax filter to sub menu
		$data_ajax_filter = '';
		if ( 1 == $depth && ( 'category' == $item->object ) ) {
			if ( ! empty( $item->menu_item_parent ) ) {
				$parent_id              = $item->menu_item_parent;
				$enable_mega_cat_parent = get_post_meta( $parent_id, '_menu_item_bingo_ruby_mega_cat', true );
				if(!empty($enable_mega_cat_parent)){
					$data_ajax_filter       = ' ' . 'data-mega_sub_filter=' . '"' . esc_attr($item->object_id) . '"' . ' ';
				}
			};
		}

		//add class
		if ( ( 1 == $enable_mega_cat ) && ( 0 == $item->menu_item_parent ) ) {
			$class_names .= ' is-cat-mega-menu is-mega-menu';
		}

		if ( ( 1 == $enable_mega_col ) && ( 0 == $item->menu_item_parent ) ) {
			$class_names .= ' is-col-mega-menu is-mega-menu';
		}

		$args        = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';


		$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$item_output .= $indent . '<li' . $id . $class_names . $data_ajax_filter . '>';

		$atts           = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target ) ? $item->target : '';
		$atts['rel']    = ! empty( $item->xfn ) ? $item->xfn : '';
		$atts['href']   = ! empty( $item->url ) ? $item->url : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		/** This filter is documented in wp-includes/post-template.php */
		$title = apply_filters( 'the_title', $item->title, $item->ID );
		$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

		if ( ! empty( $args->before ) ) {
			$item_output = $args->before;
		}

		$item_output .= '<a' . $attributes . '>';
		//add menu icon
		if ( ! empty( $menu_icon ) ) {
			$item_output .= '<i class="fa ' . esc_attr( $menu_icon ) . '" aria-hidden="true"></i>';
		}
		$item_output .= $args->link_before . $title . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		//render category
		if ( ( 'category' == $item->object ) && ( 1 == $enable_mega_cat ) && ( 0 == $item->menu_item_parent ) ) {

			//render
			$item_output .= '<div class="mega-category-menu mega-menu-wrap sub-menu">';
            $item_output .= '<div class="mega-category-menu-inner">';

		} elseif ( ( 'custom' == $item->object ) && ( 1 == $enable_mega_col ) && ( 0 == $item->menu_item_parent ) ) {
			if ( empty( $enable_mega_col_bg ) ) {
				$item_output .= '<div class="mega-col-menu mega-menu-wrap sub-menu">';
			} else {
				$item_output .= '<div class="mega-col-menu mega-menu-wrap is-mega-bg sub-menu" style="background-image: url(' . esc_url( $enable_mega_col_bg ) . ')">';
			}
            if ( ! empty( $enable_mega_col_ad_image ) || ! empty($enable_mega_col_ad_code) ) {
                if ( ! empty( $enable_mega_col_ad_image ) ) {
                    $item_output .= '<div class="mega-col-menu-ad">';
                    if ( !empty($enable_mega_col_ad_url) ) {
                        $item_output .= '<a class="widget-ad-link" target="_blank" href="' . esc_url($enable_mega_col_ad_url) . '"><img class="ads-image" src="' . esc_url($enable_mega_col_ad_image) . '" alt="' . get_bloginfo('name') .'"></a>';
                    } else {
                        $item_output .= '<img class="widget-ad-image-url" src="' . esc_url($enable_mega_col_ad_image) . '" alt="' . get_bloginfo('name') . '">';
                    }
                    $item_output .= '</div>';

                } else {
                    $item_output .= '<div class="mega-col-menu-ad">';
                    if ( !empty($enable_mega_col_ad_code) ) {
                        $item_output .= html_entity_decode( stripslashes( bingo_ruby_ad_render_script( $enable_mega_col_ad_code, 'sidebar_ad' ) ) );
                    }
                    $item_output .= '</div>';
                }
            }
		}
	}

	/**-------------------------------------------------------------------------------------------------------------------------
	 * @param string $item_output
	 * @param object $item
	 * @param int $depth
	 * @param array $args
	 * end el
	 */
	public function end_el( &$item_output, $item, $depth = 0, $args = array() ) {

		$enable_mega_cat      = $item->bingo_ruby_mega_cat;
		$enable_mega_cat_ajax = $item->bingo_ruby_mega_cat_ajax;
		$enable_mega_col      = $item->bingo_ruby_mega_col;
		$current_classes      = $item->classes;

		$item_has_children = false;
		if ( is_array( $current_classes ) ) {
			if ( in_array( 'menu-item-has-children', $current_classes ) ) {
				$item_has_children = true;
			}
		}

		//render category
		if ( ( 'category' == $item->object ) && ( 1 == $enable_mega_cat ) && ( 0 == $item->menu_item_parent ) ) {
			//query data
			$param                       = array();
			$param ['category_id']       = $item->object_id;
			$param ['item_has_children'] = $item_has_children;
			$param['item_id']            = $item->ID;
			if ( ! empty( $enable_mega_cat_ajax ) ) {
				$param['pagination'] = 'next_prev';
			}

			$data_block = bingo_ruby_mega_block_cat_setup( $param );
			//render category
			if ( false === $item_has_children ) {
				$item_output .= bingo_ruby_mega_block_cat::render( $data_block );
			} else {
				$item_output .= bingo_ruby_mega_block_cat_sub::render( $data_block );
			}
		};

        if ( ( 0 == $item->menu_item_parent ) && ( 1 == $enable_mega_cat ) ) {
            $item_output .= '</div></div><!--#mega cat menu-->';
        }

        if ( ( 0 == $item->menu_item_parent ) && ( 1 == $enable_mega_col ) ) {
            $item_output .= '</div><!--#mega col menu-->';
        }

		$item_output .= '</li>';
	}


	/**-------------------------------------------------------------------------------------------------------------------------
	 * @param string $item_output
	 * @param int $depth
	 * @param array $args
	 * start lvl
	 */
	function start_lvl( &$item_output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		if ( $depth == 0 ) {
			$item_output .= $indent . '<ul class="sub-menu is-sub-default">';
		} else {
			$item_output .= $indent . '<ul class="sub-sub-menu sub-menu">';
		}
	}

	/**-------------------------------------------------------------------------------------------------------------------------
	 * @param &$output
	 * @param int $depth
	 * @param array $args
	 * end lvl
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= $indent . '</ul>';
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * add category class into menu
 */
if ( ! function_exists( 'bingo_ruby_menu_category_classes' ) ) {
	function bingo_ruby_menu_category_classes( $classes, $item ) {
		if ( 'category' == $item->object ) {
			$classes[] = 'is-category-' . $item->object_id;
		}

		return $classes;
	}
}
add_filter( 'nav_menu_css_class', 'bingo_ruby_menu_category_classes', 10, 2 );


/**-------------------------------------------------------------------------------------------------------------------------
 * fallback navigation
 */
if ( ! function_exists( 'bingo_ruby_navigation_fallback' ) ) {
	function bingo_ruby_navigation_fallback() {
		echo '<div class="no-menu ruby-error">';
		echo '<p>' . esc_html__( 'Please assign a menu to the primary menu location under ', 'bingo' ) . '<a href="' . get_admin_url( get_current_blog_id(), 'nav-menus.php' ) . '">' . esc_html__( 'MENU', 'bingo' ) . '</a>' . '</p>';
		echo '</div>';

		return false;
	}
}
