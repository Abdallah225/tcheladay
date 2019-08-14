<?php
//save and get data composer
if (!class_exists('bingo_ruby_composer_action')) {
    class bingo_ruby_composer_action
    {

        protected static $instance = null;

        public function __construct()
        {

            add_action('wp_ajax_composer_load_tinymce', array($this, 'ajax_load_tinymce'));
            add_action('wp_ajax_composer_save_page', array($this, 'init_composer_data'));

            add_action('save_post', array($this, 'init_composer_data_classic'));
            add_action('current_screen', array($this, 'init'));
        }

        //get_instance
        static function get_instance()
        {
            if (null == self::$instance) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        // init action
        public function init()
        {
            global $pagenow;
            if ('post.php' == $pagenow || 'post-new.php' == $pagenow && get_current_screen()->post_type == 'page') {
                add_action('admin_head', array($this, 'backend_composer_data'));
            }
        }

        //init composer classic
        public function init_composer_data_classic()
        {
            $ruby_check_version = str_replace(".", "", substr(preg_replace('/[^0-9]/', '', get_bloginfo('version')), 0, 1));
            if ($ruby_check_version < 5) {
                if (function_exists('the_gutenberg_project') && (!isset($_REQUEST['classic-editor']) || 1 == $_REQUEST['classic-editor'])) {
                    return false;
                }
                $this->init_composer_data();
            } else {
                if (!isset($_REQUEST['classic-editor']) || 1 == $_REQUEST['classic-editor']) {
                    return false;
                }

                $this->init_composer_data();
            }

        }

        //init composer data
        public function init_composer_data()
        {

            if (!empty($_POST['post_ID'])) {
                $post_id = $_POST['post_ID'];
            } else {
                return false;
            }

            if (empty($_POST['post_type']) || 'page' != $_POST['post_type'] || (!empty($_POST['action']) && 'inline-save' == $_POST['action'])) {
                return false;
            }

            $data = array();

            if (!isset($_POST['bingo_ruby_section_order'])) {
                if ('page-composer.php' == get_post_meta($post_id, '_wp_page_template', true)) {
                    delete_post_meta($post_id, 'bingo_ruby_page_composer_data');
                }

                return false;
            };

            if (!array($_POST['bingo_ruby_section_order'])) {
                return false;
            }

            foreach ($_POST['bingo_ruby_section_order'] as $section_id) {
                $section_id = sanitize_text_field($section_id);
                if (!isset($_POST['bingo_ruby_section_' . $section_id])) {
                    return false;
                }

                $section_type = sanitize_text_field($_POST['bingo_ruby_section_' . $section_id]);

                if ($section_type == 'section_has_sidebar') {

                    $section_sidebar = '';
                    $section_sidebar_position = '';
                    $section_sidebar_sticky = '';

                    if (!empty ($_POST['bingo_ruby_sidebar_' . $section_id])) {
                        $section_sidebar = sanitize_text_field($_POST['bingo_ruby_sidebar_' . $section_id]);
                    }
                    if (!empty($_POST['bingo_ruby_meta_sidebar_position_' . $section_id])) {
                        $section_sidebar_position = sanitize_text_field($_POST['bingo_ruby_meta_sidebar_position_' . $section_id]);
                    }

                    if (!empty($_POST['bingo_ruby_meta_sidebar_sticky_' . $section_id])) {
                        $section_sidebar_sticky = sanitize_text_field($_POST['bingo_ruby_meta_sidebar_sticky_' . $section_id]);
                    }

                    $data[$section_id]['section_sidebar'] = $section_sidebar;
                    $data[$section_id]['section_sidebar_position'] = $section_sidebar_position;
                    $data[$section_id]['section_sidebar_sticky'] = $section_sidebar_sticky;
                }

                $data[$section_id]['section_type'] = $section_type;
                $data[$section_id]['section_id'] = $section_id;

                if (!isset($_POST['bingo_ruby_block_order'][$section_id])) {
                    continue;
                }

                $blocks_of_section = array_map('sanitize_text_field', $_POST['bingo_ruby_block_order'][$section_id]);

                $blocks = array();
                if (is_array($blocks_of_section)) {
                    foreach ($blocks_of_section as $block) {
                        $block_name = 'bingo_ruby_block_' . $block;
                        $name = sanitize_text_field($_POST[$block_name]);
                        $blocks[$block]['block_name'] = $name;
                        $blocks[$block]['block_id'] = $block;

                        if (isset($_POST['bingo_ruby_block_option'][$block_name])) {
                            $block_options = $_POST['bingo_ruby_block_option'][$block_name];
                            foreach ($block_options as $option_name => $option) {
                                $option_name = sanitize_text_field($option_name);
                                $option = $this->sanitize_input($option_name, $option);
                                $blocks[$block]['block_options'][$option_name] = $option;
                            }
                        }
                    }
                }

                $data[$section_id]['blocks'] = $blocks;
            }

            //save composer data
            $this->save_composer_data($post_id, $data);

            return false;
        }


        //load Tinymce
        public function ajax_load_tinymce()
        {

            $data = $_POST['data'];
            if (function_exists('wp_editor') && !empty($data['id'])) {
                ob_start();
                wp_editor($data['content'], esc_attr($data['id']), array(
                    'editor_class' => 'ruby-field ruby-raw-html ruby-tinymce',
                    'textarea_name' => $data['name'],
                    'quicktags' => true,
                    'media_buttons' => true,
                    'editor_height' => 300
                ));

                wp_send_json(ob_get_clean());
            }

            wp_send_json('');
        }


        /**-------------------------------------------------------------------------------------------------------------------------
         * @param $page_id
         * @param $data
         * save page composer to database
         */
        public function save_composer_data($page_id, $data)
        {
            delete_post_meta($page_id, 'bingo_ruby_composer_dynamic_style_cache');
            update_post_meta($page_id, 'bingo_ruby_page_composer_data', $data);
        }


        /**-------------------------------------------------------------------------------------------------------------------------
         * @param $page_id
         *
         * @return mixed
         * get page composer as array value
         */
        static function get_composer_data($page_id)
        {
            return get_post_meta($page_id, 'bingo_ruby_page_composer_data', true);
        }


        /**-------------------------------------------------------------------------------------------------------------------------
         * get data for backend
         */
        public function backend_composer_data()
        {

            global $post;
            $page_composer_data = array();

            if (isset($post->ID) && 'page-composer.php' == get_post_meta($post->ID, '_wp_page_template', true)) {
                $page_composer_data = self::get_composer_data($post->ID);
                $page_composer_data = stripslashes_deep($page_composer_data);
            }

            wp_localize_script('bingo_ruby_composer_script', 'bingo_ruby_page_composer_data', $page_composer_data);
        }


        /**-------------------------------------------------------------------------------------------------------------------------
         * @param string $option_name
         * @param string $option
         *
         * @return string
         * sanitize tn page composer
         */
        function  sanitize_input($option_name = '', $option = '')
        {
            switch ($option_name) {
                case 'custom_html' :
                    $option = esc_html($option);

                    return addslashes($option);
                case 'shortcode' :
                case 'ad_script' :
                    return addslashes($option);
                case 'title_url'  :
                case 'image_url'  :
                    return esc_url($option);
                case 'category_ids' : {
                    $options = array();
                    if (is_array($option)) {
                        foreach ($option as $option_el) {
                            $options[] = sanitize_text_field($option_el);
                        }
                    }

                    return $options;
                }
                default :
                    return sanitize_text_field($option);
            }
        }
    }
}


//INIT COMPOSER ACTION
bingo_ruby_composer_action::get_instance();
