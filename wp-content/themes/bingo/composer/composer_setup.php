<?php

//setup section & module page composer
if ( ! class_exists( 'bingo_ruby_composer_setup' ) ) {
    class bingo_ruby_composer_setup {

        protected static $instance = null;

        public function  __construct() {
            $this->setup_sections();
            $this->setup_blocks();
        }

        static function get_instance() {
            if ( null == self::$instance ) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        //setup page sections
        public function setup_sections() {

            $bingo_ruby_setup_sections = array(
                'section_full_width'  => array(
                    'title' => esc_html__( 'Full Width Section', 'bingo' ),
                    'img'   => get_template_directory_uri() . '/composer/images/section-full-width.png',
                    'decs'  => esc_html__( 'Display content without sidebar', 'bingo' ),
                ),
                'section_has_sidebar' => array(
                    'title' => esc_html__( 'Has Sidebar Section', 'bingo' ),
                    'img'   => get_template_directory_uri() . '/composer/images/section-has-sidebar.png',
                    'decs'  => esc_html__( 'Display content width sidebar', 'bingo' ),
                ),

            );
            wp_localize_script( 'bingo_ruby_composer_script', 'bingo_ruby_setup_sections', $bingo_ruby_setup_sections );
        }

        //setup blocks
        public function setup_blocks() {
            $bingo_ruby_template_directory_uri = get_template_directory_uri();
            $bingo_ruby_setup_blocks           = array(

                //full width blocks

                //block featured
                'bingo_ruby_fw_block_1'           => array(
                    'title'         => esc_html__( 'Block 1', 'bingo' ),
                    'description'   => esc_html__( 'show block 1 layout (fullwidth grid)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/feat-grid-fw.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_1::block_config()
                ),
                'bingo_ruby_fw_block_2'           => array(
                    'title'         => esc_html__( 'Block 2', 'bingo' ),
                    'description'   => esc_html__( 'show block 2 layout (fullwidth grid)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/fw-block-2.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_2::block_config()
                ),
                'bingo_ruby_fw_block_3'           => array(
                    'title'         => esc_html__( 'Block 3', 'bingo' ),
                    'description'   => esc_html__( 'show block 3 layout (fullwidth grid)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/feat-grid-3.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_3::block_config()
                ),
                'bingo_ruby_fw_block_4'           => array(
                    'title'         => esc_html__( 'Block 4', 'bingo' ),
                    'description'   => esc_html__( 'show block 4 layout (fullwidth grid)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/fw-block-4.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_4::block_config()
                ),
                'bingo_ruby_fw_block_5'           => array(
                    'title'         => esc_html__( 'Block 5', 'bingo' ),
                    'description'   => esc_html__( 'show block 5 layout (fullwidth carousel)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/fw-block-5.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_5::block_config()
                ),
                'bingo_ruby_fw_block_6'           => array(
                    'title'         => esc_html__( 'Block 6', 'bingo' ),
                    'description'   => esc_html__( 'show block 6 layout (fullwidth slider)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/fw-block-6.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_6::block_config()
                ),
                'bingo_ruby_fw_block_7'           => array(
                    'title'         => esc_html__( 'Block 7', 'bingo' ),
                    'description'   => esc_html__( 'show block 7 layout (fullwidth carousel)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/fw-block-7.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_7::block_config()
                ),
                //block post
                'bingo_ruby_fw_block_g1'          => array(
                    'title'         => esc_html__( 'Block g1', 'bingo' ),
                    'description'   => esc_html__( 'show block g1 layout (grid layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/fw-block-g1.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_g1::block_config()
                ),
                'bingo_ruby_fw_block_g2'          => array(
                    'title'         => esc_html__( 'Block g2', 'bingo' ),
                    'description'   => esc_html__( 'show block g2 layout (grid layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/fw-block-g2.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_g2::block_config()
                ),
                'bingo_ruby_fw_block_g3'          => array(
                    'title'         => esc_html__( 'Block g3', 'bingo' ),
                    'description'   => esc_html__( 'show block g3 layout (grid layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/fw-block-g4.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_g3::block_config()
                ),
                'bingo_ruby_fw_block_g4'          => array(
                    'title'         => esc_html__( 'Block g4', 'bingo' ),
                    'description'   => esc_html__( 'show block g4 layout (grid layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/fw-block-g5.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_g4::block_config()
                ),
                'bingo_ruby_fw_block_g5'          => array(
                    'title'         => esc_html__( 'Block g5', 'bingo' ),
                    'description'   => esc_html__( 'show block g5 layout (gallery grid)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/block-gallery-1.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_g5::block_config()
                ),
                'bingo_ruby_fw_block_g6'          => array(
                    'title'         => esc_html__( 'Block g6', 'bingo' ),
                    'description'   => esc_html__( 'show block g6 layout (gallery grid)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/block-gallery-2.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_g6::block_config()
                ),
                'bingo_ruby_fw_block_v1'          => array(
                    'title'         => esc_html__( 'Block v1', 'bingo' ),
                    'description'   => esc_html__( 'show block v1 layout (video playlist)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/fw-block-video-1.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_v1::block_config()
                ),
                'bingo_ruby_fw_block_v2'          => array(
                    'title'         => esc_html__( 'Block v2', 'bingo' ),
                    'description'   => esc_html__( 'show block v2 layout (video playlist)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/fw-block-video-2.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_v2::block_config()
                ),
                'bingo_ruby_fw_block_t1'          => array(
                    'title'         => esc_html__( 'Block t1 (33%)', 'bingo' ),
                    'description'   => esc_html__( 'show block t1 layout (one third column block)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-15.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_t1::block_config()
                ),
                'bingo_ruby_fw_block_t2'          => array(
                    'title'         => esc_html__( 'Block t2 (33%)', 'bingo' ),
                    'description'   => esc_html__( 'show block t2 layout (one third column block)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-16.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_t2::block_config()
                ),
                'bingo_ruby_fw_block_t3'          => array(
                    'title'         => esc_html__( 'Block t3 (33%)', 'bingo' ),
                    'description'   => esc_html__( 'show block t3 layout (one third column block)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-17.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_t3::block_config()
                ),
                'bingo_ruby_fw_block_t4'          => array(
                    'title'         => esc_html__( 'Block t4 (33%)', 'bingo' ),
                    'description'   => esc_html__( 'show block t4 layout (one third column block)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-18.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_t4::block_config()
                ),
                'bingo_ruby_fw_block_html'        => array(
                    'title'         => esc_html__( 'Custom HTML', 'bingo' ),
                    'description'   => esc_html__( 'show HTML custom content', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/block-html.png',
                    'section'       => 'section_full_width',
                    'block_options' => bingo_ruby_fw_block_html::block_config()
                ),
                'bingo_ruby_fw_block_advertising' => array(
                    'title'         => esc_html__( 'Advertising', 'bingo' ),
                    'description'   => esc_html__( 'Show Advertisement box in fullwidth section', 'bingo' ),
                    'section'       => 'section_full_width',
                    'img'           => get_template_directory_uri() . '/composer/images/block-ad.png',
                    'block_options' => bingo_ruby_fw_block_advertising::block_config()
                ),
                'bingo_ruby_fw_block_shortcode'   => array(
                    'title'         => esc_html__( 'Shortcodes', 'bingo' ),
                    'description'   => esc_html__( 'Show shortcodes in fullwidth section', 'bingo' ),
                    'section'       => 'section_full_width',
                    'img'           => get_template_directory_uri() . '/composer/images/block-shortcode.png',
                    'block_options' => bingo_ruby_fw_block_shortcode::block_config()
                ),
                //has sidebar blocks
                'bingo_ruby_hs_block_1'           => array(
                    'title'         => esc_html__( 'Block 1', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 1', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-1.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_1::block_config()
                ),
                'bingo_ruby_hs_block_3'           => array(
                    'title'         => esc_html__( 'Block 2', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 2', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-3.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_3::block_config()
                ),
                'bingo_ruby_hs_block_4'           => array(
                    'title'         => esc_html__( 'Block 3', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 3', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-4.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_4::block_config()
                ),
                'bingo_ruby_hs_block_6'           => array(
                    'title'         => esc_html__( 'Block 4', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 4', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-6.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_6::block_config()
                ),
                'bingo_ruby_hs_block_8'           => array(
                    'title'         => esc_html__( 'Block 5', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 5', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-8.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_8::block_config()
                ),
                'bingo_ruby_hs_block_9'           => array(
                    'title'         => esc_html__( 'Block 6', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 6', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-9.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_9::block_config()
                ),
                'bingo_ruby_hs_block_11'          => array(
                    'title'         => esc_html__( 'Block 7', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 7', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-11.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_11::block_config()
                ),
                'bingo_ruby_hs_block_12'          => array(
                    'title'         => esc_html__( 'Block 8', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 8', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-12.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_12::block_config()
                ),
                'bingo_ruby_hs_block_14'          => array(
                    'title'         => esc_html__( 'Block 9', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 9', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-14.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_14::block_config()
                ),
                'bingo_ruby_hs_block_15'          => array(
                    'title'         => esc_html__( 'Block 10 (50%)', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 10, the width of this block is 50%', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-15.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_15::block_config()
                ),
                'bingo_ruby_hs_block_16'          => array(
                    'title'         => esc_html__( 'Block 11 (50%)', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 11, the width of this block is 50%', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-16.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_16::block_config()
                ),
                'bingo_ruby_hs_block_17'          => array(
                    'title'         => esc_html__( 'Block 12 (50%)', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 12, the width of this block is 50%', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-17.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_17::block_config()
                ),
                'bingo_ruby_hs_block_18'          => array(
                    'title'         => esc_html__( 'Block 13 (50%)', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 13, the width of this block is 50%', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-18.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_18::block_config()
                ),
                'bingo_ruby_hs_block_19'          => array(
                    'title'         => esc_html__( 'Block 14', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 14 (grid layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-19.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_19::block_config()
                ),
                'bingo_ruby_hs_block_20'          => array(
                    'title'         => esc_html__( 'Block 15', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 15 (grid layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-20.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_20::block_config()
                ),
                'bingo_ruby_hs_block_21'          => array(
                    'title'         => esc_html__( 'Block 16', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 16', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-21.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_21::block_config()
                ),
                'bingo_ruby_hs_block_22'          => array(
                    'title'         => esc_html__( 'Block 17', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 17 (list layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-22.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_22::block_config()
                ),
                'bingo_ruby_hs_block_23'          => array(
                    'title'         => esc_html__( 'Block 18', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 18 (list layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-23.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_23::block_config()
                ),
                'bingo_ruby_hs_block_24'          => array(
                    'title'         => esc_html__( 'Block 19', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 19 (Classic Layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-24.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_24::block_config()
                ),
                'bingo_ruby_hs_block_25'          => array(
                    'title'         => esc_html__( 'Block 20', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 20 (Classic Layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-25.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_25::block_config()
                ),
                'bingo_ruby_hs_block_26'          => array(
                    'title'         => esc_html__( 'Block 21', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 21 (Classic & list Layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-26.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_26::block_config()
                ),
                'bingo_ruby_hs_block_27'          => array(
                    'title'         => esc_html__( 'Block 22', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 22 (Classic & list Layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-27.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_27::block_config()
                ),
                'bingo_ruby_hs_block_28'          => array(
                    'title'         => esc_html__( 'Block 23', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 23 (Classic & Grid Layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-28.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_28::block_config()
                ),
                'bingo_ruby_hs_block_29'          => array(
                    'title'         => esc_html__( 'Block 24', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 24 (Classic & Small Grid Layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-29.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_29::block_config()
                ),
                'bingo_ruby_hs_block_30'          => array(
                    'title'         => esc_html__( 'Block 25', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 25 (Classic & list Layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-30.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_30::block_config()
                ),
                'bingo_ruby_hs_block_31'          => array(
                    'title'         => esc_html__( 'Block 26', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 26 (Classic & list Layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-31.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_31::block_config()
                ),
                'bingo_ruby_hs_block_32'          => array(
                    'title'         => esc_html__( 'Block 27', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 27 (Classic & grid Layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-32.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_32::block_config()
                ),
                'bingo_ruby_hs_block_33'          => array(
                    'title'         => esc_html__( 'Block 28', 'bingo' ),
                    'description'   => esc_html__( 'Show block layout 28 (mixed list layout)', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/hs-block-33.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_33::block_config()
                ),
                'bingo_ruby_hs_block_html'        => array(
                    'title'         => esc_html__( 'Custom HTML', 'bingo' ),
                    'description'   => esc_html__( 'show HTML custom content', 'bingo' ),
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/block-html.png',
                    'section'       => 'section_has_sidebar',
                    'block_options' => bingo_ruby_hs_block_html::block_config()
                ),
                'bingo_ruby_hs_block_advertising' => array(
                    'title'         => esc_html__( 'Advertising', 'bingo' ),
                    'description'   => esc_html__( 'Show Advertisement box in has sidebar section', 'bingo' ),
                    'section'       => 'section_has_sidebar',
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/block-ad.png',
                    'block_options' => bingo_ruby_hs_block_advertising::block_config()
                ),
                'bingo_ruby_hs_block_shortcode'   => array(
                    'title'         => esc_html__( 'Shortcodes', 'bingo' ),
                    'description'   => esc_html__( 'Show shortcodes in has sidebar section', 'bingo' ),
                    'section'       => 'section_has_sidebar',
                    'img'           => $bingo_ruby_template_directory_uri . '/composer/images/block-shortcode.png',
                    'block_options' => bingo_ruby_hs_block_shortcode::block_config()
                ),

            );

            wp_localize_script( 'bingo_ruby_composer_script', 'bingo_ruby_setup_blocks', $bingo_ruby_setup_blocks );
        }
    }

}