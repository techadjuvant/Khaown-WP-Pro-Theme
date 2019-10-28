<?php
/// Load More products button

add_action('wp_ajax_load_menus_by_ajax', 'load_menus_by_ajax');
add_action('wp_ajax_nopriv_load_menus_by_ajax', 'load_menus_by_ajax');


function load_menus_by_ajax() {

  check_ajax_referer('load_more_menus', 'security');

  $paged = $_POST['page'];
  $menu_per_page = $_POST['menu_per_page'];

  $args = array(

      'post_type' => 'food_menu',

      'post_status' => 'publish',

      'posts_per_page' => $menu_per_page,

      'paged' => $paged,

  );

  $em_post_menus = new WP_Query( $args ); ?>
          <?php 
              if ( $em_post_menus->have_posts() ) : 
                while ( $em_post_menus->have_posts() ) : $em_post_menus->the_post();
                  $id = get_the_ID();
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
          <?php 
                  endwhile; 
              endif;

              wp_die();

}

