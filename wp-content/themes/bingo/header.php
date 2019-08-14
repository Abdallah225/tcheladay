<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class();?> <?php echo  bingo_ruby_schema::markup( 'body'); ?>>
<?php get_template_part( 'templates/header/section', 'off_canvas' ); ?>
<div id="ruby-site" class="site-outer">
	<?php bingo_ruby_render_header(); ?>
	<div class="main-site-mask"></div>
	<div class="site-wrap">
		<div class="site-mask"></div>
		<div class="site-inner">
