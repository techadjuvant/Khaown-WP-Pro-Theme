<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage khaown
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
	
<body <?php body_class( "scroll-assist custom-background" ); ?>>
<?php wp_body_open(); ?>
	<header class="nav-container">
		<a id="top"></a>
		<nav class="absolute" aria-label="<?php esc_attr_e( 'Top Menu', 'khaown' ); ?>">
			<div class="nav-bar">
				
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
				<!-- .site-branding-container -->
				
				<?php get_template_part( 'template-parts/header/sitenav', 'main' ); ?>
				<!-- .entry-header -->

			</div>
		</nav>
	</header>
	<div class="main-container nav-margin-space">
