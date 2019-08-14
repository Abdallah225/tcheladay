<?php
if ( ! function_exists( 'bingo_ruby_theme_options_woocommerce' ) ) {
	function bingo_ruby_theme_options_woocommerce() {

		return array(
			'id'     => 'bingo_ruby_config_section_woocommerce',
			'title'  => esc_html__( 'Woocommerce', 'bingo' ),
			'desc'   => esc_html__( 'Select options for the shop page.', 'bingo' ),
			'icon'   => 'el el-shopping-cart',
			'fields' => array(

				//shop page config
				array(
					'id'     => 'section_start_woocommerce_page_shop',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Woocommerce Shop Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'woocommerce_shop_title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Shop Page Title', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable the title of shop page', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'woocommerce_shop_posts_per_page',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Number of products', 'bingo' ),
					'subtitle' => esc_html__( 'select number of products per page, leave blank if you want to set as default.', 'bingo' ),
					'switch'   => true,
					'default'  => ''
				),
				array(
					'id'       => 'woocommerce_shop_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Shop Sidebar Name', 'bingo' ),
					'subtitle' => esc_html__( 'select sidebar for Woocommerce pages, this option will apply to all woo pages, except the product page.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_name(),
					'default'  => 'bingo_ruby_sidebar_default',
				),
				array(
					'id'       => 'woocommerce_shop_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Shop Sidebar Position', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar position for this page. This option will override default sidebar position setting.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_position( false ),
					'default'  => 'none'
				),
				array(
					'id'     => 'section_end_woocommerce_page_shop',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//product page config
				array(
					'id'     => 'section_start_woocommerce_page_product',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Woocommerce product options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'woocommerce_product_sidebar_name',
					'type'     => 'select',
					'title'    => esc_html__( 'Product Sidebar', 'bingo' ),
					'subtitle' => esc_html__( 'select sidebar name for the single product page.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_name(),
					'default'  => 'bingo_ruby_sidebar_default',
				),
				array(
					'id'       => 'woocommerce_product_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Product Sidebar Position', 'bingo' ),
					'subtitle' => esc_html__( 'select a sidebar position for the single product page.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_position( false ),
					'default'  => 'none'
				),
				array(
					'id'       => 'woocommerce_product_box_comment',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Review Box', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable the review box in the single product page.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_woocommerce_page_product',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),

			)
		);
	}
}