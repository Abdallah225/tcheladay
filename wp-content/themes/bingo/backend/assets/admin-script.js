(function($) {
    "use strict";

    $(document).ready(function() {
        bingo_ruby_admin_post_format();
        bingo_ruby_admin_post_review();
        bingo_ruby_admin_primary_cat();
    });


    /**-------------------------------------------------------------------------------------------------------------------------
     * show hide post format
     */
    function bingo_ruby_admin_post_format() {

        var bingo_ruby_gallery_post = $('#bingo_ruby_metabox_gallery_options');
        var bingo_ruby_video_post = $('#bingo_ruby_metabox_video_options');
        var bingo_ruby_audio_post = $('#bingo_ruby_metabox_audio_options');

        bingo_ruby_gallery_post.hide();
        bingo_ruby_video_post.hide();
        bingo_ruby_audio_post.hide();


        var select = $('#post-formats-select').find('[type="radio"]');
        select.live('change', function() {
            var val = $(this).val();
            bingo_ruby_gallery_post.hide();
            bingo_ruby_video_post.hide();
            bingo_ruby_audio_post.hide();

            if ('gallery' == val) {
                bingo_ruby_gallery_post.show();
            } else if ('video' == val) {
                bingo_ruby_video_post.show();
            } else if ('audio' == val) {
                bingo_ruby_audio_post.show();
            }
        }).filter(':checked').trigger('change');
    }


    /**-------------------------------------------------------------------------------------------------------------------------
     * show hide and cal review
     */
    function bingo_ruby_admin_post_review() {

        //review post
        var score_wrap = $('#bingo_ruby_metabox_review_options .inside .rwmb-meta-box > div:gt(0)');
        var bingo_ruby_review_checkbox = $('#bingo_ruby_enable_review');

        //hide reviews
        score_wrap.wrapAll('<div class="ruby-enabled-review">').hide();

        if (bingo_ruby_review_checkbox.is(":checked")) {
            score_wrap.show();
        }

        bingo_ruby_review_checkbox.click(function() {
            score_wrap.toggle();
        });

        function bingo_ruby_agv_score() {
            var i = 0;
            var bingo_ruby_cs1 = 0;
            var bingo_ruby_cs2 = 0;
            var bingo_ruby_cs3 = 0;
            var bingo_ruby_cs4 = 0;
            var bingo_ruby_cs5 = 0;
            var bingo_ruby_cs6 = 0;
            var bingo_ruby_cs7 = 0;

            var bingo_ruby_cd1 = $('input[name=bingo_ruby_cd1]').val();
            var bingo_ruby_cd2 = $('input[name=bingo_ruby_cd2]').val();
            var bingo_ruby_cd3 = $('input[name=bingo_ruby_cd3]').val();
            var bingo_ruby_cd4 = $('input[name=bingo_ruby_cd4]').val();
            var bingo_ruby_cd5 = $('input[name=bingo_ruby_cd5]').val();
            var bingo_ruby_cd6 = $('input[name=bingo_ruby_cd6]').val();
            var bingo_ruby_cd7 = $('input[name=bingo_ruby_cd7]').val();


            if (bingo_ruby_cd1) {
                i += 1;
                bingo_ruby_cs1 = parseFloat($('input[name=bingo_ruby_cs1]').val());
            } else {
                bingo_ruby_cd1 = null;
            }
            if (bingo_ruby_cd2) {
                i += 1;
                bingo_ruby_cs2 = parseFloat($('input[name=bingo_ruby_cs2]').val());
            } else {
                bingo_ruby_cd2 = null;
            }
            if (bingo_ruby_cd3) {
                i += 1;
                bingo_ruby_cs3 = parseFloat($('input[name=bingo_ruby_cs3]').val());
            } else {
                bingo_ruby_cd3 = null;
            }
            if (bingo_ruby_cd4) {
                i += 1;
                bingo_ruby_cs4 = parseFloat($('input[name=bingo_ruby_cs4]').val());
            } else {
                bingo_ruby_cd4 = null;
            }
            if (bingo_ruby_cd5) {
                i += 1;
                bingo_ruby_cs5 = parseFloat($('input[name=bingo_ruby_cs5]').val());
            } else {
                bingo_ruby_cd5 = null;
            }
            if (bingo_ruby_cd6) {
                i += 1;
                bingo_ruby_cs6 = parseFloat($('input[name=bingo_ruby_cs6]').val());
            } else {
                bingo_ruby_cd6 = null;
            }

            if (bingo_ruby_cd7) {
                i += 1;
                bingo_ruby_cs7 = parseFloat($('input[name=bingo_ruby_cs7]').val());
            } else {
                bingo_ruby_cs7 = null;
            }

            var bingo_ruby_as = $('#bingo_ruby_as');

            var bingo_ruby_temp_total = (bingo_ruby_cs1 + bingo_ruby_cs2 + bingo_ruby_cs3 + bingo_ruby_cs4 + bingo_ruby_cs5 + bingo_ruby_cs6 + bingo_ruby_cs7);
            var bingo_ruby_total = Math.round((bingo_ruby_temp_total / i) * 10) / 10;

            bingo_ruby_as.val(bingo_ruby_total);

            if (isNaN(bingo_ruby_total)) {
                bingo_ruby_as.val('');
            }
        }

        $('.rwmb-input').on('change', bingo_ruby_agv_score);
        $('#bingo_ruby_cs1, #bingo_ruby_cs2, #bingo_ruby_cs3, #bingo_ruby_cs4, #bingo_ruby_cs5, #bingo_ruby_cs6, #bingo_ruby_cs7').on('slidechange', bingo_ruby_agv_score);
    }


    //show hide primary category
    function bingo_ruby_admin_primary_cat() {
        var primary_cat = $('#bingo_ruby_post_primary_category');
        var cat_check_list = $('#categorychecklist');
        var cat;

        primary_cat.find('option').addClass('is-hide');
        var cat_checked = cat_check_list.find('input[type=checkbox]:checked');
        if (cat_checked.length > 0) {
            cat_checked.each(function() {
                primary_cat.find('option[value="' + $(this).val() + '"]').removeClass('is-hide');
            })
        }

        cat_check_list.on('change', 'input[type=checkbox]', function() {
            if ($(this).is(':checked')) {
                primary_cat.find('option[value="' + $(this).val() + '"]').removeClass('is-hide')
            } else {
                primary_cat.find('option[value="' + $(this).val() + '"]').addClass('is-hide')
            }
        });
    }

})(jQuery);