<?php
$bingo_ruby_navbar_search = bingo_ruby_core::get_option( 'navbar_search' );
$bingo_ruby_navbar_ajax_search = bingo_ruby_core::get_option( 'navbar_ajax_search' );
if ( empty( $bingo_ruby_topbar_search ) && empty( $bingo_ruby_navbar_search ) ) {
	return false;
}
?>
<div id="ruby-header-search-popup" class="header-search-popup">
	<div class="header-search-popup-wrap ruby-container">
		<a href="#" class="ruby-close-search"><i class="ruby-close-btn" aria-hidden="true"></i></a>
	<div class="header-search-popup-inner">
		<form class="search-form" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
			<fieldset>
				<input id="ruby-search-input" type="text" class="field" name="s" value="<?php if (is_search()) { echo get_search_query(); } ?>" placeholder="<?php esc_html_e('Type to search&hellip;', 'bingo') ?>" autocomplete="off">
				<button type="submit" value="" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
			</fieldset>
            <?php if ( ! empty( $bingo_ruby_navbar_ajax_search ) ) : ?>
                <div class="header-search-result"></div>
            <?php endif; ?>
		</form>
	</div>
	</div>
</div>