<?php
$bingo_ruby_topbar_email = bingo_ruby_core::get_option( 'topbar_email' );
$bingo_ruby_topbar_phone = bingo_ruby_core::get_option( 'topbar_phone' );

if ( empty( $bingo_ruby_topbar_email ) && empty( $bingo_ruby_topbar_phone ) ) {
	return false;
} ?>
<div class="topbar-info">
	<?php if ( ! empty( $bingo_ruby_topbar_phone ) ) : ?>
		<span class="info-phone"><i class="fa fa-phone-square" aria-hidden="true"></i><span><?php echo esc_html($bingo_ruby_topbar_phone); ?></span></span>
	<?php endif; ?>
	<?php if ( ! empty( $bingo_ruby_topbar_email ) ) : ?>
	     <span class="info-email"><i class="fa fa-envelope" aria-hidden="true"></i><span><?php echo esc_html($bingo_ruby_topbar_email); ?></span></span>
     <?php endif; ?>
</div>