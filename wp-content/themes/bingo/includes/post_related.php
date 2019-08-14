<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param int $paged
 * @param $post_id
 *
 * @return bool|WP_Query
 * get related posts
 */
if ( ! function_exists( 'bingo_ruby_related_get' ) ) {
    function bingo_ruby_related_get($post_id = '', $paged = 1)
    {
        $where = bingo_ruby_core::get_option('single_post_box_related_where');
        $number_of_post = bingo_ruby_core::get_option('single_post_box_related_num');

        if (empty($post_id)) {
            $post_id = get_the_ID();
        }

        $data_cat = get_the_category($post_id);
        $data_tag = get_the_tags($post_id);

        //set query
        $param = array();
        $param['category_ids'] = '';
        $param['tags'] = '';
        $param['where'] = $where;
        $param['posts_per_page'] = intval($number_of_post);

        if (empty($post_id)) {
            $param['post_not_in'] = get_the_ID();
        } else {
            $param['post_not_in'] = $post_id;
        }

        //get cat
        if (!empty($data_cat)) {
            $cat_id = array();
            foreach ($data_cat as $category) {
                $cat_id[] = $category->term_id;
            }
            $param['category_ids'] = implode(',', $cat_id);
        }

        //get cat
        if (!empty($data_tag)) {
            $tag_name = array();
            foreach ($data_tag as $tag) {
                $tag_name[] = $tag->slug;
            }
            $param['tags'] = implode(',', $tag_name);
        }

        //get query
        $data_query = bingo_ruby_query::get_related($param, $paged);

        return $data_query;
    }
}
