<?php
//composer config
if (!class_exists('bingo_ruby_composer_config')) {
    class bingo_ruby_composer_config
    {

        protected static $instance = null;

        public function __construct()
        {
            add_action('current_screen', array($this, 'init'));
        }

        static function get_instance()
        {
            if (null == self::$instance) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        //init composer
        public function init()
        {

            global $pagenow;
            $ruby_check_version = str_replace(".", "", substr(preg_replace('/[^0-9]/', '', get_bloginfo('version')), 0, 1));
            if (('post.php' == $pagenow || 'post-new.php' == $pagenow) && get_current_screen()->post_type == 'page') {

                if ($ruby_check_version < 5) {
                    if (function_exists('the_gutenberg_project') && !isset($_GET['classic-editor'])) {
                        add_action('enqueue_block_editor_assets', array($this, 'enqueue_script_gutenberg'));
                        add_action('admin_footer', array($this, 'composer_js_template'));
                    } else {
                        add_action('edit_form_after_title', array($this, 'page_composer_edit'));
                        add_action('admin_enqueue_scripts', array($this, 'enqueue_script_classic'));
                    }
                } else {
                    if (class_exists('Classic_Editor') && 'post-new.php' == $pagenow) {
                        add_action('edit_form_after_title', array($this, 'page_composer_edit'));
                        add_action('admin_enqueue_scripts', array($this, 'enqueue_script_classic'));
                    } elseif (!function_exists('the_gutenberg_project') && isset($_GET['classic-editor'])) {
                        add_action('edit_form_after_title', array($this, 'page_composer_edit'));
                        add_action('admin_enqueue_scripts', array($this, 'enqueue_script_classic'));
                    } elseif (function_exists('the_gutenberg_project') && isset($_GET['classic-editor'])) {
                        add_action('edit_form_after_title', array($this, 'page_composer_edit'));
                        add_action('admin_enqueue_scripts', array($this, 'enqueue_script_classic'));
                    } else {
                        add_action('enqueue_block_editor_assets', array($this, 'enqueue_script_gutenberg'));
                        add_action('admin_footer', array($this, 'composer_js_template'));
                    }
                }

                //add filter
                add_filter('admin_enqueue_scripts', array($this, 'register_script_composer_seo'), 999);
            }
        }


        //enqueue_script_classic
        public function enqueue_script_classic()
        {
            wp_enqueue_style('bingo_ruby_composer_style', get_template_directory_uri() . '/composer/assets/composer-style.css', array(), BINGO_THEME_VERSION, 'all');
            wp_register_script('bingo_ruby_composer_script', get_template_directory_uri() . '/composer/assets/composer-script.js', array('jquery'), BINGO_THEME_VERSION, true);

            $this->page_composer_template();
            bingo_ruby_composer_setup::get_instance();
            wp_localize_script('bingo_ruby_composer_script', 'bingo_ruby_is_gutenberg', 'classic');
            wp_localize_script('bingo_ruby_composer_script', 'composer_params', array('ajaxurl' => admin_url('admin-ajax.php')));

            wp_enqueue_script('bingo_ruby_composer_script');
        }

        //enqueue_script_gutenberg
        public function enqueue_script_gutenberg()
        {

            wp_enqueue_style('bingo_ruby_composer_style', get_template_directory_uri() . '/composer/assets/composer-style.css', array(), BINGO_THEME_VERSION, 'all');
            wp_register_script('bingo_ruby_composer_script', get_template_directory_uri() . '/composer/assets/composer-script.js', array(
                'jquery',
                'wp-util'
            ), BINGO_THEME_VERSION, true);
            $this->page_composer_template();
            bingo_ruby_composer_setup::get_instance();
            wp_localize_script('bingo_ruby_composer_script', 'bingo_ruby_is_gutenberg', 'gutenberg');
            wp_localize_script('bingo_ruby_composer_script', 'composer_params', array('ajaxurl' => admin_url('admin-ajax.php')));

            wp_enqueue_script('bingo_ruby_composer_script');
        }

        //js template
        public function composer_js_template()
        {
            ?>
            <script type="text/html" id="tmpl-bingo-composer-switch-btn">
                <?php $this->switch_mode_button(); ?>
            </script>
            <script type="text/html" id="tmpl-bingo-composer-panel">
                <?php $this->composer_panel_gutenberg(); ?>
            </script>
        <?php
        }


        //switch mode button
        public function switch_mode_button()
        {
            $str = '';
            $str .= '<div class="bingo-composer-switch-mode">';
            $str .= '<a id="bingo_ruby_switch_mode" title="switch to Ruby Composer" class="ruby-composer-switch-btn" href="#"><i class="dashicons dashicons-migrate"></i>';
            $str .= esc_html__('Ruby Composer', 'bingo');
            $str .= '</a></div>';

            echo html_entity_decode($str);

        }


        //render page composer panel
        public function page_composer_edit()
        {

            if (!is_admin()) {
                return false;
            }

            $str = '';
            $page_id = get_the_ID();

            if (isset($page_id) && 'page-composer.php' == get_post_meta($page_id, '_wp_page_template', true)) {
                $str .= '<style>#postdivrich{ display:none; }</style>';
            } else {
                $str .= '<style>#bingo_ruby_composer_editor{ display:none; }</style>';
                ob_start();
                $this->switch_mode_button();
                $str .= ob_get_clean();
            }

            $str .= '<div id="bingo_ruby_composer_editor" class="ruby-composer-editor ruby-composer-classic">';
            $str .= '<div class="ruby-composer-title"><h3>' . esc_html__('Ruby Composer', 'bingo') . '</h3></div>';
            $str .= '<div class="ruby-composer-loading"></div>';
            $str .= '<div class="ruby-toolbox"><a href="#" id="page_composer_section_select" class="add-section-select">' . esc_html__('select your section', 'bingo') . '</a>';
            $str .= '<div id="bingo_ruby_section_select" class="section-select-wrap"></div>';
            $str .= '</div>';
            $str .= '<div class="ruby-sections-wrap">';
            $str .= '<div class="ruby-section-empty">' . esc_html__('Click on <strong>"SECTION"</strong> images to create a new section.', 'bingo') . '</div>';
            $str .= '</div>';
            $str .= '</div>';


            echo html_entity_decode($str);
        }


        //composer panel gutenberg
        public function composer_panel_gutenberg()
        {
            $str = '';

            $str .= '<div id="bingo_ruby_composer_editor" class="ruby-composer-editor ruby-composer-gutenberg is-hidden">';
            $str .= '<div class="ruby-composer-title"><h3>' . esc_html__('Ruby Composer', 'bingo') . '</h3></div>';
            $str .= '<div class="ruby-composer-loading"></div>';
            $str .= '<div class="ruby-toolbox"><a href="#" id="page_composer_section_select" class="add-section-select">' . esc_html__('select your section', 'bingo') . '</a>';
            $str .= '<div id="bingo_ruby_section_select" class="section-select-wrap"></div>';
            $str .= '</div>';
            $str .= '<div class="ruby-sections-wrap">';
            $str .= '<div class="ruby-section-empty">' . esc_html__('Click on <strong>"SECTION"</strong> images to create a new section.', 'bingo') . '</div>';
            $str .= '</div>';
            $str .= '</div>';

            echo html_entity_decode($str);
        }

        //register script for Yoast SEO
        public function register_script_composer_seo($hook)
        {
            if ($hook == 'post.php' || $hook == 'post-new.php') {
                $prefix = 'wp-seo';
                if (class_exists('WPSEO_Admin_Asset_Manager')) {
                    $prefix = 'yoast-seo';
                }

                if (wp_script_is($prefix . '-post-scraper', 'enqueued')) {
                    wp_enqueue_script('bingo_ruby_composer_analytics_post', get_template_directory_uri() . '/composer/assets/composer-seo-script.js', array(
                        'jquery',
                        $prefix . '-post-scraper'
                    ), BINGO_THEME_VERSION, true);
                }

                if (wp_script_is($prefix . '-term-scraper', 'enqueued')) {
                    wp_enqueue_script('bingo_ruby_composer_analytics_term', get_template_directory_uri() . '/composer/assets/composer-seo-script.js', array(
                        'jquery',
                        $prefix . '-term-scraper'
                    ), BINGO_THEME_VERSION, true);
                }
            }
        }


        /**-------------------------------------------------------------------------------------------------------------------------
         * create page composer field data
         */
        public function page_composer_template()
        {
            $template = array();

            //block
            $str = '';
            $str .= '<div class="ruby-block-item">';
            $str .= '<input type="hidden" class="ruby-block-order">';
            $str .= '<input type="hidden" class="ruby-block-name">';
            $str .= '<div class="ruby-block-bar">';
            $str .= '<i class="ruby-block-move">#</i>';
            $str .= '<div class="ruby-block-label"></div><!--#block label-->';
            $str .= '<div class="ruby-block-toolbox">';
            $str .= '<a class="ruby-block-open-option" href="#">+</a>';
            $str .= '<a class="ruby-block-delete" href="#">x</a><!--block delete-->';
            $str .= '</div><!--#block toolbox -->';
            $str .= '</div><!--#block bar -->';
            $str .= '<div class="ruby-block-options-wrap hidden">';
            $str .= '<div class="ruby-block-description"></div>';
            $str .= '<div class="ruby-filter-link"></div>';
            $str .= '<div class="ruby-block-content"></div>';
            $str .= '</div><!--block options wrap -->';
            $str .= '</div><!--item block -->';
            $template['block'] = $str;

            //block option
            $str = '';
            $str .= '<div class="ruby-block-option">';
            $str .= '<div class="ruby-block-option-label-wrap">';
            $str .= '<label class="ruby-block-option-label"></label>';
            $str .= '<div class="ruby-block-option-description"></div>';
            $str .= '</div><!--#block wrap -->';
            $str .= '<div class="ruby-block-option-inner"></div><!--block option -->';
            $str .= '</div><!--#block option -->';
            $template['block_option'] = $str;

            //Fields Input
            $template['input']['text'] = '<input class="ruby-field ruby-text" type="text">'; //text
            $template['input']['num'] = '<input class="ruby-field" type="number" name="quantity" min="0">'; //number
            $template['input']['posts_per_page'] = '<input class="ruby-field" type="number" name="quantity" min="1">'; //number
            $template['input']['textarea'] = '<textarea class="ruby-field" rows="9"></textarea>'; //text area
            $template['input']['category'] = bingo_ruby_theme_config::category_dropdown_select();//category
            $template['input']['categories'] = bingo_ruby_theme_config::categories_dropdown_select();//categories
            $template['input']['post_format'] = bingo_ruby_theme_config::post_format_dropdown_select();
            $template['input']['enable'] = bingo_ruby_theme_config::enable_dropdown_select();//enable-disable
            $template['input']['authors'] = bingo_ruby_theme_config::author_dropdown_select();//author
            $template['input']['orderby'] = bingo_ruby_theme_config::orderby_dropdown_select();//sort order
            $template['input']['viewmore'] = bingo_ruby_theme_config::viewmore_dropdown_select();//view more
            $template['input']['custom_html'] = '<textarea class="ruby-field ruby-raw-html" rows="9"></textarea>';

            //summary type
            $template['input']['summary_type'] = bingo_ruby_theme_config::summary_dropdown_select();//summary config
            $template['input']['position'] = bingo_ruby_theme_config::position_dropdown_select();//summary config

            //wrapper mode
            $template['input']['wrap_mode'] = bingo_ruby_theme_config::wrapmode_dropdown_select();


            //Fields Title
            $template['title']['title'] = esc_html__('Title', 'bingo');
            $template['title']['title_url'] = esc_html__('Title Url', 'bingo');
            $template['title']['category_id'] = esc_html__('Category Filter', 'bingo');
            $template['title']['category_ids'] = esc_html__('Multiple Categories Filter', 'bingo');
            $template['title']['tags'] = esc_html__('Tags slug filter', 'bingo');
            $template['title']['post_id'] = esc_html__('Post ID filter', 'bingo');
            $template['title']['post_format'] = esc_html__('Post Format Filter', 'bingo');
            $template['title']['authors'] = esc_html__('Authors Filter', 'bingo');
            $template['title']['posts_per_page'] = esc_html__('Number Of Posts', 'bingo');
            $template['title']['slides_per_page'] = esc_html__('Number Of Slider', 'bingo');
            $template['title']['offset'] = esc_html__('Post Offset', 'bingo');
            $template['title']['orderby'] = esc_html__('Sort Order', 'bingo');
            $template['title']['excerpt'] = esc_html__('Post Excerpt', 'bingo');
            $template['title']['readmore'] = esc_html__('Read More Button', 'bingo');
            $template['title']['big_first'] = esc_html__('1st Classic Layout', 'bingo');
            $template['title']['summary_type'] = esc_html__('Classic Summary Type', 'bingo');
            $template['title']['position'] = esc_html__('Big Column Position', 'bingo');
            $template['title']['excerpt_classic'] = esc_html__('Classic Post Excerpt', 'bingo');
            $template['title']['auto_play'] = esc_html__('Auto Play Video', 'bingo');

            //block static image
            $template['title']['image_url'] = esc_html__('Image URL', 'bingo');
            $template['title']['image_link'] = esc_html__('Image Link', 'bingo');
            $template['title']['button_title'] = esc_html__('Button Title', 'bingo');

            //block code box
            $template['title']['wrap_mode'] = esc_html__('Block Wrapper Mode', 'bingo');
            $template['title']['custom_html'] = esc_html__('Custom HTML', 'bingo');
            $template['title']['shortcode'] = esc_html__('ShortCodes', 'bingo');

            //block ads
            $template['title']['ad_title'] = esc_html__('Ad title', 'bingo');
            $template['title']['ad_url'] = esc_html__('Ad URL', 'bingo');
            $template['title']['ad_image'] = esc_html__('Ad Image URL', 'bingo');
            $template['title']['ad_script'] = esc_html__('Ad scripts', 'bingo');

            //block style
            $template['title']['block_style'] = esc_html__('Blog Style', 'bingo');
            $template['desc']['block_style'] = esc_html__('select color style for this block', 'bingo');
            $template['input']['block_style'] = bingo_ruby_theme_config::style_dropdown_select();

            //Fields Description
            $template['desc']['title'] = esc_html__('optional - input title for this block', 'bingo');
            $template['desc']['title_url'] = esc_html__('optional - input title URL for this block', 'bingo');
            $template['desc']['sub_title'] = esc_html__('optional - show sub title of block', 'bingo');
            $template['desc']['category_id'] = esc_html__('filter your posts by category ID', 'bingo');
            $template['desc']['category_ids'] = esc_html__('filter your posts by category IDs. This option will override on "category filter" option', 'bingo');
            $template['desc']['tags'] = esc_html__('filter your posts by tags, Enter here tags separated by commas (example: tag1,tag2,tag3)', 'bingo');
            $template['desc']['post_id'] = esc_html__('filter your posts by post ID, Enter here posts ID separated by commas (example: ID1,ID2,ID3)', 'bingo');
            $template['desc']['authors'] = esc_html__('filter your pots by authors', 'bingo');
            $template['desc']['posts_per_page'] = esc_html__('select numbers of posts you want to show at once', 'bingo');
            $template['desc']['slides_per_page'] = esc_html__('select numbers of slides you want to show at once', 'bingo');
            $template['desc']['offset'] = esc_html__('select number of posts to displace or pass over. Leave blank or set 0 if you want to show at the beginning', 'bingo');
            $template['desc']['orderby'] = esc_html__('select sort order type for this block', 'bingo');
            $template['desc']['excerpt'] = esc_html__('select a length for the content excerpt, leave blank or set 0 if you want to disable it', 'bingo');
            $template['desc']['excerpt_classic'] = esc_html__('select a length for the content excerpt of classic layout, this option only affect when you enable Use Post Excerpt option, leave blank or set 0 if you want to disable it', 'bingo');
            $template['desc']['readmore'] = esc_html__('show or hide "Read More" button of this block', 'bingo');
            $template['desc']['big_first'] = esc_html__('show the classic layout at top of post listing', 'bingo');
            $template['desc']['summary_type'] = esc_html__('Select summary type for classic layouts of this block', 'bingo');
            $template['desc']['position'] = esc_html__('select the position for the big column of this block', 'bingo');
            $template['desc']['post_format'] = esc_html__('filter your posts by post format type', 'bingo');
            $template['desc']['auto_play'] = esc_html__('Auto the first video of this block when scrolling to it', 'bingo');

            //thumbnail position
            $template['title']['thumb_position'] = esc_html__('Thumbnail Position', 'bingo');
            $template['desc']['thumb_position'] = esc_html__('select the position for post thumbnails of this block', 'bingo');

            //block static image
            $template['desc']['image_url'] = esc_html__('input the image URL', 'bingo');
            $template['desc']['image_link'] = esc_html__('input the destination URl, Leave blank you only want to show image', 'bingo');
            $template['desc']['button_title'] = esc_html__('input title for the button', 'bingo');

            //block code box
            $template['desc']['wrap_mode'] = esc_html__('show block contents in full width or has max width mode', 'bingo');
            $template['desc']['custom_html'] = esc_html__('Input your text, HTML codes and video embed codes...', 'bingo');
            $template['desc']['shortcode'] = esc_html__('input  your shortcode. It is priority than custom html content', 'bingo');


            //block ads
            $template['desc']['ad_title'] = esc_html__('input your ad title', 'bingo');
            $template['desc']['ad_url'] = esc_html__('input destination URL for your advertising', 'bingo');
            $template['desc']['ad_image'] = esc_html__('input the URL of your advertising image ( attachment URL). This option will override on ads scripts. Leave blank if you want to use ads scripts', 'bingo');
            $template['desc']['ad_script'] = esc_html__('input your ad scripts or custom HTML', 'bingo');

            //ajax dropdown filer
            $template['title']['ajax_dropdown'] = esc_html__('ajax dropdown filter type', 'bingo');
            $template['desc']['ajax_dropdown'] = esc_html__('show the ajax dropdown filter at the right of block header', 'bingo');
            $template['input']['ajax_dropdown'] = bingo_ruby_theme_config::ajax_filter_dropdown_select();


            //ajax dropdown filer id
            $template['title']['ajax_dropdown_id'] = esc_html__('ajax dropdown filter IDs', 'bingo');
            $template['desc']['ajax_dropdown_id'] = esc_html__('input IDs of filter type (category IDs, author IDs, OR tag names) you want to show, separated by comas. Leave blank if you want to show all', 'bingo');

            //ajax dropdown text
            $template['title']['ajax_dropdown_text'] = esc_html__('ajax dropdown filter text', 'bingo');
            $template['desc']['ajax_dropdown_text'] = esc_html__('input text for the first item (all) of the dropdown filter', 'bingo');

            //ajax pagination
            $template['title']['pagination'] = esc_html__('ajax pagination', 'bingo');
            $template['desc']['pagination'] = esc_html__('select pagination type for this block', 'bingo');
            $template['input']['pagination'] = bingo_ruby_theme_config::pagination_dropdown_select();


            //view more link
            $template['title']['viewmore'] = esc_html__('View More Button', 'bingo');
            $template['desc']['viewmore'] = esc_html__('enable or disable view more button with link for this block', 'bingo');

            $template['title']['viewmore_link'] = esc_html__('View more link', 'bingo');
            $template['desc']['viewmore_link'] = esc_html__('input the URL of view more button', 'bingo');

            $template['title']['viewmore_text'] = esc_html__('view More Text', 'bingo');
            $template['desc']['viewmore_text'] = esc_html__('input the text of view more button', 'bingo');

            //grid style
            $template['title']['grid_style'] = esc_html__('Grid Style', 'bingo');
            $template['desc']['grid_style'] = esc_html__('select grid style for this block', 'bingo');
            $template['input']['grid_style'] = bingo_ruby_theme_config::grid_style_dropdown_select();

            //background color
            $template['title']['background'] = esc_html__('Background Color', 'bingo');
            $template['desc']['background'] = esc_html__('select background color (hex color) for this block for example: #282828', 'bingo');

            //background color
            $template['title']['margin_bottom'] = esc_html__('Margin Bottom', 'bingo');
            $template['desc']['margin_bottom'] = esc_html__('select margin bottom for this block.', 'bingo');

            //header color
            $template['title']['header_color'] = esc_html__('Header Color', 'bingo');
            $template['desc']['header_color'] = esc_html__('select text color (hex color) for header this block for example: #ffffff', 'bingo');

            //background header
            $template['title']['header_background'] = esc_html__('Header Background Color', 'bingo');
            $template['desc']['header_background'] = esc_html__('select header background color (hex color) for this block for example: #4387d2', 'bingo');

            //unload
            $template['unload'] = esc_html('The changes you made will be lost if you navigate away from this page.', 'bingo');

            //sidebar
            $str = '';
            $str .= '<div class="ruby-template-field-sidebar-label"><label>' . esc_html__('select sidebar options', 'bingo') . '</label>';
            $str .= '<div class="ruby-sidebar-select-wrap">';
            $str .= '<div class="ruby-sidebar-select-el">';
            $str .= '<div class="sidebar-label">' . esc_html__('Sidebar name', 'bingo') . '</div>';
            $str .= '<select class ="ruby-sidebar-select">';

            //sidebar select
            $ruby_all_sidebar = bingo_ruby_theme_config::get_all_sidebar();
            if (is_array($ruby_all_sidebar)) {
                foreach (bingo_ruby_theme_config::get_all_sidebar() as $sidebar) {
                    if (!empty($sidebar['id']) && !empty($sidebar['name'])) {
                        $str .= '<option value="' . esc_attr($sidebar['id']) . '">' . ucwords($sidebar['name']) . '</option>';
                    }
                };
            }
            $str .= '</select>';
            $str .= '</div><!--#sidebar select el-->';
            $str .= '<div class="ruby-sidebar-select-el">';
            $str .= '<div class="sidebar-label">' . esc_html__('Sidebar Position', 'bingo') . '</div>';
            $str .= '<select class="ruby-sidebar-position">';
            $str .= '<option selected value ="right">' . esc_html__('Right', 'bingo') . '</option>';
            $str .= '<option  value ="left">' . esc_html__('Left', 'bingo') . '</option>';
            $str .= '</select>';
            $str .= '</div><!--#sidebar select el-->';
            $str .= '</div></div><!--#sidebar section-->';
            $template['input']['sidebar'] = $str;

            //full width section
            $str = '';
            $str .= '<div class="ruby-section fullwidth-section"><!--section fullwidth-->';
            $str .= '<div class="ruby-section-bar">';
            $str .= '<i class="ruby-section-move">#</i><!--section drag and drop-->';
            $str .= '<div class="ruby-section-label"></div><!--#section label -->';
            $str .= '<div class="ruby-section-toolbox">';
            $str .= '<a class="ruby-section-open-option" href="#">+</a>';
            $str .= '<a class="ruby-section-delete" href="#">x</a><!--section delete-->';
            $str .= '</div><!--#section toolbox-->';
            $str .= '</div><!--#section bar -->';
            $str .= '<div class="ruby-block-wrap clearfix">';
            $str .= '<div class="section-menu-wrap">';
            $str .= '<div class="ruby-toolbox"><a href="#" class="add-block-select">' . esc_html__('Add block', 'bingo') . '</a>';
            $str .= '<div class="block-select-wrap"></div>';
            $str .= '</div><!--#block tool box -->';
            $str .= '</div><!--#fullwidth block menu -->';
            $str .= '<div class="ruby-block fullwidth-block">';
            $str .= '<input type="hidden" class="ruby-section-order" name="bingo_ruby_section_order[]">';
            $str .= '<input type="hidden" class="ruby-section-type">';
            $str .= '<div class="ruby-section-empty">' . html_entity_decode(esc_html__('Click on <strong>"SECTION"</strong> images to create a new section.', 'bingo')) . '</div>';
            $str .= '<div class="ruby-section-loading">' . esc_html__('Loading ...', 'bingo') . '</div>';
            $str .= '</div>';
            $str .= '</div><!--#block wrap -->';
            $str .= '</div><!--#section full width-->';
            $template['section_full_width'] = $str;

            //has sidebar section
            $str = '';
            $str .= '<div class="ruby-section has-sidebar-section">';
            $str .= '<div class="ruby-section-bar">';
            $str .= '<i class="ruby-section-move">#</i><!--section drag and drop-->';
            $str .= '<div class="ruby-section-label"></div><!--#section label -->';
            $str .= '<div class="ruby-section-toolbox">';
            $str .= '<a class="ruby-section-open-option" href="#">+</a>';
            $str .= '<a class="ruby-section-delete" href="#">x</a><!--section delete-->';
            $str .= '</div><!--#section toolbox-->';
            $str .= '</div>';
            $str .= '<div class="ruby-block-wrap clearfix">';
            $str .= '<div class="section-menu-wrap">';
            $str .= '<div class="ruby-section-sidebar">';
            $str .= '</div><!--#sidebar block -->';
            $str .= '<div class="ruby-toolbox"><a href="#" class="add-block-select">' . esc_html__('Add block', 'bingo') . '</a>';
            $str .= '<div class="block-select-wrap"></div>';
            $str .= '</div><!--#block tool box -->';
            $str .= '</div><!--#content block menu -->';
            $str .= '<div class="ruby-block content-block">';
            $str .= '<input type="hidden" class="ruby-section-order" name="bingo_ruby_section_order[]">';
            $str .= '<input type="hidden" class="ruby-section-type">';
            $str .= '<div class="ruby-section-empty">' . html_entity_decode(esc_html__('Click on " <strong>BLOCK</strong> " images to add a new block', 'bingo')) . '</div>';
            $str .= '<div class="ruby-section-loading">' . esc_html__('Loading ...', 'bingo') . '</div>';
            $str .= '</div><!--#blocks wrap-->';

            $str .= '</div><!--#block wrap -->';
            $str .= '</div><!--#section content -->';

            $template['section_has_sidebar'] = $str;

            wp_localize_script('bingo_ruby_composer_script', 'bingo_ruby_composer_template', $template);
        }
    }
}

//init composer
bingo_ruby_composer_config::get_instance();


