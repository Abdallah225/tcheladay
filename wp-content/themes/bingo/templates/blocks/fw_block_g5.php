<?php
/**
 * Class bingo_ruby_fw_block_g5 ( block gird gallery slider)
 */
if (!class_exists('bingo_ruby_fw_block_g5')) {
    class bingo_ruby_fw_block_g5 extends bingo_ruby_block
    {

        /**-------------------------------------------------------------------------------------------------------------------------
         * @param $block
         *
         * @return string
         * render block layout
         */
        static function render($block)
        {

            //add block data
            $block['block_type'] = 'full_width';
            $block['block_classes'] = 'fw-block fw-block-g5';
            $block['block_options']['posts_per_page'] = 7;

            //query data
            $data_query = parent::get_data($block);

            //render
            $str = '';
            $str .= parent::block_open($block, $data_query);
            $str .= parent::block_header($block);
            $str .= self::content($block, $data_query);
            $str .= parent::block_footer($block);
            $str .= parent::block_close();

            return $str;
        }

        /**-------------------------------------------------------------------------------------------------------------------------
         * @param $block
         *
         * @return string
         * render block block content
         */
        static function content($block, $data_query)
        {

            //check
            if (empty($block['block_options'])) {
                return false;
            }

            $block['block_options']['block_id'] = $block['block_id'];

            //render
            $str = '';
            $str .= parent::block_content_open();

            //check empty
            if ($data_query->have_posts()) {
                $str .= self::listing($data_query, $block['block_options']);
            } else {
                $str .= parent::no_content();
            }

            $str .= parent::block_content_close();

            //reset post data
            wp_reset_postdata();

            return $str;
        }


        /**-------------------------------------------------------------------------------------------------------------------------
         * @param $data_query
         * @param array $options
         *
         * @return string
         * render listing
         */
        static function listing($data_query, $options = array())
        {

            //check empty
            if (empty($options['block_id'])) {
                return false;
            }

            $str = '';
            $counter = 1;
            $total = $data_query->post_count;


            $str .= '<div class="fw-block-6-slider-el">';
            //render layout
            while ($data_query->have_posts()) {
                $data_query->the_post();

                //set post index
                $options['post_index'] = $counter - 1;
                if (1 == $counter) {
                    $str .= '<div class="col-left col-sm-6 col-xs-12">';
                    $str .= '<div class="post-outer">';
                    $str .= bingo_ruby_post_gallery_1($options);
                    $str .= '</div><!--#post outer-->';
                    $str .= '</div><!--#col left-->';
                    $str .= '<div class="col-right col-sm-6 col-xs-12">';
                } else {
                    $str .= '<div class="post-outer col-xs-4">';
                    $str .= bingo_ruby_post_gallery_2($options);
                    $str .= '</div>';
                }

                //check counter
                if ($counter == $total && $counter > 1) {
                    $str .= '</div><!--#col right-->';
                }

                $counter++;
            }
            $str .= '</div>';

            //reset loop
            $data_query->rewind_posts();

            $str .= '<div id="block-gallery-' . esc_attr($options['block_id']) . '" class="block-popup-gallery mfp-hide mfp-animation">';
            $str .= '<div class="block-popup-gallery-wrap">';
            $str .= '<div class="block-popup-gallery-inner">';
            $str .= '<div class="slider-loader"></div>';
            $str .= '<div class="popup-slider-gallery slider-init">';
            while ($data_query->have_posts()) {
                $data_query->the_post();
                $str .= bingo_ruby_post_popup_gallery($options);
            }
            $str .= '</div>';
            $str .= '</div>';
            $str .= '</div>';
            $str .= '</div>';

            return $str;
        }


        /**-------------------------------------------------------------------------------------------------------------------------
         * @return array
         * init block options
         */
        static function block_config()
        {
            return array(
                'filter' => array(
                    'category_id' => true,
                    'category_ids' => true,
                    'tags' => true,
                    'post_id' => true,
                    'post_format' => true,
                    'authors' => true,
                    'orderby' => true,
                    'posts_per_page' => 6,
                    'offset' => true
                ),
                'header' => array(
                    'title' => esc_html__('gallery posts', 'bingo'),
                    'title_url' => true,
                    'header_color' => true
                ),
                'design' => array(
                    'excerpt' => 20,
                    'position' => true,
                    'background' => true,
                    'margin_bottom' => true,
                )
            );
        }
    }
}
