<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage khaown
 * @since 1.0.0
 */

get_header();
?>
<main id="main-container" class="woocommerce" >
	<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
				<?php get_template_part( 'woocommerce/cart/cart'); ?>
							
			</article><!-- #post-<?php the_ID(); ?> -->

		 <?php endwhile; ?> <!-- End of the loop. -->

</main><!-- #main -->
<?php
get_footer();
