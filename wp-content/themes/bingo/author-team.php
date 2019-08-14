<?php
/*
Template Name: Team Page
*/

//get header
get_header();

echo '<div class="page-author-team-wrap">';
echo bingo_ruby_page_open_inner( 'page-author-team-inner', 'none' );

echo '<div class="ruby-container">';
echo '<div class="author-team-page-title post-title page-title"><h1>' . get_the_title() . '</h1></div>';
echo '</div>';

$bingo_ruby_args = array(
	'blog_id'     => $GLOBALS['blog_id'],
	'orderby'     => 'login',
	'count_total' => false,
	'role__in'    => array( 'administrator', 'author', 'editor' )
);

$bingo_ruby_blog_users = get_users( $bingo_ruby_args );

$bingo_ruby_excepted_author_id = bingo_ruby_core::get_option( 'excepted_author_team_id' );
if ( ! empty( $bingo_ruby_excepted_author_id ) ) {
	$bingo_ruby_excepted_author_id = explode( ',', $bingo_ruby_excepted_author_id );
}

if ( ! empty( $bingo_ruby_blog_users ) ) {
	foreach ( $bingo_ruby_blog_users as $bingo_ruby_user ) :

		$bingo_ruby_user_id = $bingo_ruby_user->data->ID;

		//check exception user
		if ( ! empty( $bingo_ruby_excepted_author_id ) && is_array( $bingo_ruby_excepted_author_id ) && in_array( $bingo_ruby_user_id, $bingo_ruby_excepted_author_id ) ) {
			continue;
		}

		$bingo_ruby_blog_user_name     = $bingo_ruby_user->data->display_name;
		$bingo_ruby_blog_user_job      = '';
		$bingo_ruby_blog_user_decs     = '';
        $bingo_ruby_user_social_data = bingo_ruby_social_profile_author( $bingo_ruby_user_id );
        $bingo_ruby_user_render_social      = bingo_ruby_render_social_icon( $bingo_ruby_user_social_data, false, true );

		if ( ! empty( $bingo_ruby_user_social_data['job'] ) ) {
			$bingo_ruby_blog_user_job = $bingo_ruby_user_social_data['job'];
		}

		if ( ! empty( $bingo_ruby_user_social_data['description'] ) ) {
			$bingo_ruby_blog_user_decs = $bingo_ruby_user_social_data['description'];
		} ?>
		<div class="single-author-wrap author-page-wrap">
			<div class="single-author-inner clearfix">
				<div class="author-thumb-wrap">
					<?php echo get_avatar( get_the_author_meta( 'user_email', $bingo_ruby_user_id ), 140, '', $bingo_ruby_blog_user_name ); ?>
				</div>
				<div class="author-content-wrap">
					<div class="author-title post-title">
						<a href="<?php echo get_author_posts_url( $bingo_ruby_user_id ); ?>">
							<h3><?php echo esc_html( $bingo_ruby_blog_user_name ) ?></h3></a>
						<span class="author-job"><?php echo esc_html( $bingo_ruby_blog_user_job ); ?></span>
					</div>
					<?php if ( ! empty( $bingo_ruby_blog_user_decs ) ) : ?>
						<div class="author-description"><?php echo html_entity_decode( esc_html( $bingo_ruby_blog_user_decs ) ); ?></div>
					<?php endif; ?>
					<?php if ( ! empty( $bingo_ruby_user_render_social ) ) : ?>
						<div class="author-social"><?php echo "$bingo_ruby_user_render_social" ?></div>
					<?php endif; ?>
				</div>
			</div>
		</div>

	<?php

	endforeach;
}

echo bingo_ruby_page_close_inner();

echo '</div>';

//get footer
get_footer();
