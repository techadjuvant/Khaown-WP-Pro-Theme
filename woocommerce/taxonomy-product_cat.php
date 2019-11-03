<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>
<div class="khaown-woo-archive-wrapper">
    <section class="khaown-woo-header-wrapper">
        <div class="row">
            <div class="col-xs-6">
                <header class="woocommerce-products-header">
                    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
                        <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
                    <?php endif; ?>

                    <?php
                    /**
                     * Hook: woocommerce_archive_description.
                     *
                     * @hooked woocommerce_taxonomy_archive_description - 10
                     * @hooked woocommerce_product_archive_description - 10
                     */
                    do_action( 'woocommerce_archive_description' );
                    ?>
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
<?php
if ( woocommerce_product_loop() ) {

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) { ?>

		<div class="khaown-woo-product-archive">
            <div class="lightbox-grid third-thumbs">
                <ul class="em-products">

		<?php
		while ( have_posts() ) {
			the_post();
			$id = get_the_ID();

			?>
				<li>
					<a href="<?php the_permalink(); ?>" >
						<div class="background-image-holder">
							<?php the_post_thumbnail(); ?>
						</div>
					</a>
					<button class="add-to-cart-btn"><?php echo do_shortcode('[add_to_cart id="' . $id .'"]'); ?></button>
				</li>
			<?php
		} 
		?>
		</ul>
            </div>
		</div>
		<?php
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );

} 


get_footer( 'shop' );
