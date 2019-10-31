<?php 
/*
* Template Name: Menu Template
*/

get_header(); ?>

<?php 
    $hide_food_menu_header = get_theme_mod("khaown_hide_food_menu_header_section", false);
    $khaown_food_menu_header_title = get_theme_mod("khaown_food_menu_header_title", "Food Menu");
    if(!$hide_food_menu_header) :
?>
<section class="page-title page-title-4 food-menu-header">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="mb0 font-white"><strong><?php echo $khaown_food_menu_header_title;  ?></strong></h1>
            </div>
        </div>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
<?php endif; ?>

<?php

    $khaown_food_menu_default_menu_count = get_theme_mod("khaown_food_menu_default_menu_count", "2");

    $em_food_menu_posts = array(
        'post_type' => 'food_menu',
        'post_status' => 'publish',
        'posts_per_page' =>  $khaown_food_menu_default_menu_count,
        'paged' => 1
        );
    $em_post_menus = new WP_Query( $em_food_menu_posts );
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
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/loading.gif" alt="Loading"> 
        </div>
        <input class="hidden" name="khaown_FoodMenu_perPage" id="khaown_FoodMenu_perPage" type="text" value="<?php echo $khaown_food_menu_default_menu_count; ?>">
        <input class="hidden" name="khaown_FoodMenu_maxPage" id="khaown_FoodMenu_maxPage" type="text" value="<?php echo $em_post_menus->max_num_pages + 1; ?>">
        <input class="hidden" name="khaown_FoodMenu_security" id="khaown_FoodMenu_security" type="text" value="<?php echo wp_create_nonce("load_more_menus"); ?>">
        <div class="btn-wrapper loadmoremenus-wrapper text-center">
            <div class="btn loadmore">Load More</div>
        </div>
    <?php } ?>
        <!--end of row-->
    </div>
    <!--end of container-->
</section>
    
<?php get_footer(); 
