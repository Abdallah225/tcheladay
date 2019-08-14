<?php
$bingo_ruby_topbar_date = bingo_ruby_core::get_option( 'topbar_date' );
if ( empty( $bingo_ruby_topbar_date ) ) {
	return false;
}

$bingo_ruby_topbar_date_format = bingo_ruby_core::get_option( 'topbar_date_format' );
$bingo_ruby_topbar_date_js     = bingo_ruby_core::get_option( 'topbar_date_js' );
if ( empty( $bingo_ruby_topbar_date_format ) ) {
	$bingo_ruby_topbar_date_format = 'l, F j, Y';
}

$bingo_ruby_class_name = 'topbar-date';

if ( ! empty( $bingo_ruby_topbar_date_js ) ) {
	$bingo_ruby_class_name = 'topbar-date is-hidden';
} ?>

<div class="<?php echo esc_attr( $bingo_ruby_class_name ); ?>">
	<span><?php echo date_i18n( stripslashes( $bingo_ruby_topbar_date_format ) ); ?></span>
</div>