<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage khaown
 * @since 1.0.0
 */

?>

<section class="khaown-woo-header-wrapper">
	<div class="row">
		<div class="col-xs-6">
			<header class="woocommerce-products-header">
					<h1 class="woocommerce-products-header__title page-title"><?php the_title(); ?></h1>
			</header>
		</div>
		<div class="col-xs-6">
			<?php
				/**
				 * Hook: woocommerce_before_main_content.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 * @hooked WC_Structured_Data::generate_website_data() - 30
				 */
				do_action( 'woocommerce_before_main_content' ); ?>
		</div>
	</div>
</section>
<div id="single-content">
	<div class="container">
		<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'khaown' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'khaown' ),
					'after'  => '</div>',
				)
			);
		?>
	</div>
	<!--end of container-->
</div><!-- .entry-content -->