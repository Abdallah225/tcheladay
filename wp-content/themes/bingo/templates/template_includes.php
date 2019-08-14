<?php
##################################################
###                                            ###
###              THEME TEMPLATE                ###
###                                            ###
##################################################

$bingo_ruby_template_directory = get_template_directory();

//including templates
require_once $bingo_ruby_template_directory . '/templates/template_wrapper.php';
require_once $bingo_ruby_template_directory . '/templates/template_post.php';
require_once $bingo_ruby_template_directory . '/templates/template_blog.php';
require_once $bingo_ruby_template_directory . '/templates/template_composer_blog.php';
require_once $bingo_ruby_template_directory . '/templates/template_page.php';
require_once $bingo_ruby_template_directory . '/templates/template_header.php';
require_once $bingo_ruby_template_directory . '/templates/template_feat.php';
require_once $bingo_ruby_template_directory . '/templates/template_thumbnail.php';
require_once $bingo_ruby_template_directory . '/templates/template_breadcrumb.php';
require_once $bingo_ruby_template_directory . '/templates/template_single_post.php';
require_once $bingo_ruby_template_directory . '/templates/template_footer.php';

//including blocks & modules
require_once $bingo_ruby_template_directory . '/templates/template_block.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/block_mega_menu.php';

//fullwidth  blocks
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_1.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_2.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_3.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_4.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_5.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_6.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_7.php';

require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_g1.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_g2.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_g3.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_g4.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_g5.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_g6.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_v1.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_v2.php';

require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_t1.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_t2.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_t3.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_t4.php';

require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_html.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_ad.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/fw_block_shortcode.php';

//has sidebar blocks
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_1.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_3.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_4.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_6.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_8.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_9.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_11.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_12.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_14.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_15.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_16.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_17.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_18.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_19.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_20.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_21.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_22.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_23.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_24.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_25.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_26.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_27.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_28.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_29.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_30.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_31.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_32.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_33.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_html.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_ad.php';
require_once $bingo_ruby_template_directory . '/templates/blocks/hs_block_shortcode.php';

//module grid
require_once $bingo_ruby_template_directory . '/templates/modules/module_grid_1.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_grid_2.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_grid_3.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_grid_4.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_grid_m1.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_grid_m2.php';

//module feat
require_once $bingo_ruby_template_directory . '/templates/modules/module_feat_1.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_feat_2.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_feat_3.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_feat_4.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_feat_5.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_feat_6.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_feat_7.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_feat_8.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_feat_9.php';

//module gallery
require_once $bingo_ruby_template_directory . '/templates/modules/module_gallery_1.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_gallery_2.php';

//module popup
require_once $bingo_ruby_template_directory . '/templates/modules/module_popup_gallery.php';

//module list
require_once $bingo_ruby_template_directory . '/templates/modules/module_list_m1.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_list_m2.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_list_1.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_list_2.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_list_3.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_list_4.php';

//module overlay
require_once $bingo_ruby_template_directory . '/templates/modules/module_overlay_1.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_overlay_2.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_overlay_3.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_overlay_4.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_overlay_5.php';

//module classic
require_once $bingo_ruby_template_directory . '/templates/modules/module_classic_1.php';
require_once $bingo_ruby_template_directory . '/templates/modules/module_classic_2.php';

//module iframe
require_once $bingo_ruby_template_directory . '/templates/modules/module_iframe.php';

//module single post
require_once $bingo_ruby_template_directory . '/templates/single/box_related.php';
require_once $bingo_ruby_template_directory . '/templates/single/box_related_video.php';
require_once $bingo_ruby_template_directory . '/templates/single/layout_1.php';
require_once $bingo_ruby_template_directory . '/templates/single/layout_2.php';
require_once $bingo_ruby_template_directory . '/templates/single/layout_3.php';
require_once $bingo_ruby_template_directory . '/templates/single/layout_4.php';
require_once $bingo_ruby_template_directory . '/templates/single/layout_5.php';
require_once $bingo_ruby_template_directory . '/templates/single/layout_6.php';
require_once $bingo_ruby_template_directory . '/templates/single/video_layout_1.php';
require_once $bingo_ruby_template_directory . '/templates/single/video_layout_2.php';
require_once $bingo_ruby_template_directory . '/templates/single/video_layout_3.php';
require_once $bingo_ruby_template_directory . '/templates/single/audio_layout_1.php';
require_once $bingo_ruby_template_directory . '/templates/single/audio_layout_2.php';
require_once $bingo_ruby_template_directory . '/templates/single/audio_layout_3.php';
require_once $bingo_ruby_template_directory . '/templates/single/slider_layout_1.php';
require_once $bingo_ruby_template_directory . '/templates/single/slider_layout_2.php';
require_once $bingo_ruby_template_directory . '/templates/single/slider_layout_3.php';
require_once $bingo_ruby_template_directory . '/templates/single/grid_layout_1.php';
require_once $bingo_ruby_template_directory . '/templates/single/grid_layout_2.php';

//module single page
require_once $bingo_ruby_template_directory . '/templates/page/layout_1.php';
require_once $bingo_ruby_template_directory . '/templates/page/layout_2.php';
require_once $bingo_ruby_template_directory . '/templates/page/layout_3.php';
require_once $bingo_ruby_template_directory . '/templates/page/layout_4.php';
require_once $bingo_ruby_template_directory . '/templates/page/layout_5.php';