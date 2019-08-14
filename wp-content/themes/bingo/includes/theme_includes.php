<?php
##################################################
###                                            ###
###       THEME CONFIGS & INITIALIZE           ###
###                                            ###
##################################################

$bingo_ruby_template_directory = get_template_directory();

require_once $bingo_ruby_template_directory . '/includes/theme_config.php';
require_once $bingo_ruby_template_directory . '/backend/admin_plugins.php';
require_once $bingo_ruby_template_directory . '/backend/admin_enqueue.php';


##################################################
###                                            ###
###         META BOX & THEME OPTIONS           ###
###                                            ###
##################################################


require_once $bingo_ruby_template_directory . '/theme_options/redux_config.php';
require_once $bingo_ruby_template_directory . '/backend/tinymce/tinymce_action.php';
require_once $bingo_ruby_template_directory . '/metaboxes/taxonomy_config.php';

##################################################
###                                            ###
###              THEME CORE FILES              ###
###                                            ###
##################################################

//including mega menu
require_once $bingo_ruby_template_directory . '/includes/menu/backend_mega_menu.php';
require_once $bingo_ruby_template_directory . '/includes/menu/frontend_mega_menu.php';
require_once $bingo_ruby_template_directory . '/includes/core.php';
require_once $bingo_ruby_template_directory . '/includes/core_query.php';
require_once $bingo_ruby_template_directory . '/includes/breaking_news.php';
require_once $bingo_ruby_template_directory . '/includes/core_filter.php';
require_once $bingo_ruby_template_directory . '/includes/core_ad.php';
require_once $bingo_ruby_template_directory . '/includes/core_single_post.php';
if ( class_exists( 'Woocommerce' ) ) {
	require_once $bingo_ruby_template_directory . '/includes/core_woo.php';
}

//ajax
require_once $bingo_ruby_template_directory . '/includes/ajax/ajax.php';


##################################################
###                                            ###
###              THEME FUNCTIONS               ###
###                                            ###
##################################################

require_once $bingo_ruby_template_directory . '/includes/schema.php';
require_once $bingo_ruby_template_directory . '/includes/action.php';
require_once $bingo_ruby_template_directory . '/includes/post_related.php';
require_once $bingo_ruby_template_directory . '/includes/post_format.php';
require_once $bingo_ruby_template_directory . '/includes/post_video.php';
require_once $bingo_ruby_template_directory . '/includes/post_audio.php';
require_once $bingo_ruby_template_directory . '/includes/post_review.php';
require_once $bingo_ruby_template_directory . '/includes/dynamic_css.php';

##################################################
###                                            ###
###              SOCIALS & SHARES              ###
###                                            ###
##################################################

require_once $bingo_ruby_template_directory . '/includes/socials/profiles.php';
require_once $bingo_ruby_template_directory . '/includes/socials/icons.php';

##################################################
###                                            ###
###             SIDEBAR * WIDGETS              ###
###                                            ###
##################################################

require_once $bingo_ruby_template_directory . '/includes/sidebar/sidebar_multi.php';
require_once $bingo_ruby_template_directory . '/includes/sidebar/sidebar_section.php';

