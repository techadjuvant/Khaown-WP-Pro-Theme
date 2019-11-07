<?php

get_header( 'shop' );

?>

<div class="khaown-woo-archive-wrapper">

    <section class="page-title page-title-4 food-menu-header khaown-header-bg  mb32">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <h1 class="mb0 font-white"><strong> <?php woocommerce_page_title(); ?> </strong></h1>
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

<?php

    $product_per_page = 6;

    $args = array(

        'post_type' => 'product',

        'post_status' => 'publish',

        'posts_per_page' => $product_per_page,

        'paged' => $paged

    );

    $em_products = new WP_Query( $args );

    $my_post_count = $em_products ->post_count;

            if ( $em_products->have_posts() ) : 

        ?>

        <div class="khaown-woo-product-archive">

            <div class="lightbox-grid third-thumbs">

                <ul class="em-products">

                    <?php 

                        while ( $em_products->have_posts() ) : $em_products->the_post();

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

                        endwhile; 

                    ?>

                </ul>

            </div>

        </div>

            

            <?php endif; ?>

        <?php if($em_products->max_num_pages != 1) { ?>

            <div id="loadingDiv" class="product-laoding-gif hidden">

                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/loading.gif" alt="Loading"> 

            </div>

            <input class="hidden" name="khaown_product_per_page" id="khaown_product_per_page" type="text" value="<?php echo $product_per_page; ?>">

            <input class="hidden" name="khaown_product_maxPage" id="khaown_product_maxPage" type="text" value="<?php echo $em_products->max_num_pages + 1; ?>">

            <input class="hidden" name="khaown_product_security" id="khaown_product_security" type="text" value="<?php echo wp_create_nonce("load_more_products"); ?>">

            

            <div class="btn-wrapper text-center loadmoreproducts-wrapper">

                <div class="loadmoreproducts btn"> <span> Load More </span> </div>

            </div>

        <?php } ?>

</div>

<?php get_footer(); ?>

