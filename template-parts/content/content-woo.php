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

<section class="page-title page-title-4 food-menu-header khaown-header-bg  mb32">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <h1 class="mb0 font-white"><strong> <?php the_title(); ?></strong></h1>
            </div>
			<div class="col-xs-6 text-right">
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
        <!--end of row-->
    </div>
    <!--end of container-->
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