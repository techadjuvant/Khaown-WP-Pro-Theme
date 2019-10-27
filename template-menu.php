<?php 
/*
* Template Name: Menu Template
*/

get_header(); 

?>
        <div class="main-container">
            <section class="page-title page-title-4 bg-menu-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
							<h2 class="uppercase mb0 font-white">Menu<strong>Item</strong></h2>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <?php
                $em_post = array(
                    'post_type' => 'food_menu',
                    'post_status' => 'publish',
                    'posts_per_page' =>  2,
                    'paged' => 1,
                    );
                $em_post_menus = new WP_Query( $em_post );
                $count_menus = $em_post_menus->post_count;
            ?>
            <section id="menu" class="blog-posts menu-items">
                <div class="container">
                    <div class="row">
                        <?php 
                            if ( $em_post_menus->have_posts() ) : 
                                while ( $em_post_menus->have_posts() ) : $em_post_menus->the_post();
                        ?>      
                            <div class="col-md-6 text-center food-menu">
                                <div class="feature bordered text-center bg-color-blog-posts">
                                    <div class="blog-posts-image-holder">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <h3 class="uppercase mb40 mb-xs-24"><?php the_title(); ?></h3>
                                    <div class="mb40 food-menu-content">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                <?php if($em_post_menus->max_num_pages != 1) { ?>
                    <div id="loadingDiv" class="posts-laoding-gif hidden">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/loading.gif" alt="Loading"> 
                    </div>
                    <div class="btn-wrapper loadmoremenus-wrapper text-center">
                        <div class="btn loadmore">Load More</div>
                    </div>
                <?php } ?>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
  <?php get_footer(); ?>

<script type="text/javascript">

    var ajaxurl = "<?php echo admin_url( 'admin-ajax.php' ); ?>";

    var page = 2;

    jQuery(function($) {

        $('body').on('click', '.loadmore', function() {

            $( "#loadingDiv" ).removeClass( "hidden" );

            var data = {

                'action': 'load_menus_by_ajax',

                'page': page,

                'security': '<?php echo wp_create_nonce("load_more_menus"); ?>',

                'max_page': <?php echo $em_post_menus->max_num_pages + 1; ?>

            };

            $.post(ajaxurl, data, function(response) {

                if(response != '') {

                    $('.menu-items .row').append(response);

                    page++;

                    $( "#loadingDiv" ).addClass( "hidden" );

                } else {

                    $('.loadmoremenus-wrapper').hide();

                    $( "#loadingDiv" ).addClass( "hidden" );

                };

                if (page == data['max_page']) {

                    $('.loadmoremenus-wrapper').hide();

                    $( "#loadingDiv" ).addClass( "hidden" );

                };

            });

        });

    });

</script>