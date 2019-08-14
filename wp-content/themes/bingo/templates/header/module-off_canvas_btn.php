<?php
$enable_off_canvas    = bingo_ruby_core::get_option( 'off_canvas_button' );
$bingo_ruby_class_name = 'off-canvas-btn-wrap';
if ( empty( $enable_off_canvas ) ) {
	$bingo_ruby_class_name = 'off-canvas-btn-wrap is-hidden';
} ?>
<div class="<?php echo esc_attr( $bingo_ruby_class_name ) ?>">
	<div class="off-canvas-btn">
		<a href="#" class="ruby-trigger" title="off canvas button">
			<span class="icon-wrap"></span>
		</a>
	</div>
</div>