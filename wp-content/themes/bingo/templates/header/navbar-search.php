<?php
$bingo_ruby_navbar_search = bingo_ruby_core::get_option( 'navbar_search' );
if ( empty( $bingo_ruby_navbar_search ) ) {
	return false;
} ?>

<div class="navbar-search">
	<a href="#" id="ruby-navbar-search-icon" data-mfp-src="#ruby-header-search-popup" data-effect="mpf-ruby-effect header-search-popup-outer" title="<?php esc_attr_e('Search', 'bingo'); ?>" class="navbar-search-icon">
		<i class="fa fa-search" aria-hidden="true"></i>
	</a>
</div>
