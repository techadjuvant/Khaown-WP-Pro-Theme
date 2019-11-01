<?php 
/*
Template Name: Food Items Template
*/
get_header(); 

$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => '9',
    'paged' => $paged,
);
$em_products = new WP_Query( $args );
$my_post_count = $em_products ->post_count;
            if ( $em_products->have_posts() ) : 
        ?>
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
            <?php endif; ?>
        <?php if($em_products->max_num_pages != 1) { ?>
            <div id="loadingDiv" class="product-laoding-gif hidden">
                <img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" alt="Loading"> 
            </div>
            <div class="btn-wrapper text-center loadmoreproducts-wrapper">
                <div class="loadmoreproducts btn">Load More</div>
            </div>
        <?php } ?>
<?php get_footer(); ?>

<script type="text/javascript">

var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";
var page = 2;

jQuery(function($) {
    $('body').on('click', '.loadmoreproducts', function() {
        $( "#loadingDiv" ).removeClass( "hidden" );
        var data = {
            'action': 'load_products_by_ajax',
            'page': page,
            'security': '<?php echo wp_create_nonce("load_more_products"); ?>',
            'max_page': <?php echo $em_products->max_num_pages + 1; ?>
        };

        $.post(ajaxurl, data, function(product_response) {
            if(product_response != '') {
                $('.em-products').append(product_response);
                page++;
                $('.background-image-holder').each(function() {
                    var imgSrc = $(this).children('img').attr('src');
                    $(this).css('background', 'url("' + imgSrc + '")');
                    $(this).children('img').hide();
                    $(this).css('background-position', 'initial');
                });

                setTimeout(function() {
                    $('.background-image-holder').each(function() {
                        $(this).addClass('fadeIn');
                    });
                }, 200);
                $( "#loadingDiv" ).addClass( "hidden" );
            };
            if (page == data['max_page']) {
                $('.loadmoreproducts-wrapper').hide();
                $( "#loadingDiv" ).addClass( "hidden" );
            }
        });

    });

});

</script>

