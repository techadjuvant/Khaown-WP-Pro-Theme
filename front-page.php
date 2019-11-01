<?php get_header(); ?>
<div class="front-page-container">
    <section class="fullscreen image-bg overlay parallax">
        <!-- Image overlay opacity control is loacted on line 637 of the theme-gunmetal.css file - CW -->
        <div class="background-image-holder">
            <img alt="las vegas food photography chris wessling" class="background-image" src="<?php echo get_theme_mod("upload_media_fullscreen_image", ""); ?>" />
        </div>
        <div class="align-bottom text-center">
            <ul class="list-inline social-list mb24">
                <li>
                    <a target="_blank" href="<?php  ?>">
                        <i class="ti-twitter-alt icon-sm"></i>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="<?php  ?>">
                        <i class="ti-facebook icon-sm"></i>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="<?php  ?>">
                        <i class="ti-instagram icon-sm"></i>
                    </a>
                </li>
            </ul>
        </div>
    </section>
    <?php 
        $hide_location = get_theme_mod( 'hide_location_section');
        if(!$hide_location) { 
    ?>
        <section class="image-square left" id="location">
            <div class="col-md-6 p0 image">
                <div class="map-holder background-image-holder">
                    <iframe 
                    src="<?php echo get_theme_mod( 'location_google_map_link'); ?>" 
                    width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
            <div class="col-md-6 content">
                <?php if ( has_custom_logo() ) { ?>
                    <div class="logo logo-dark"><?php the_custom_logo(); ?></div>
                <?php } ?>
                <?php 
                    $blog_info = get_bloginfo( 'name' );
                    $description = get_bloginfo( 'description', 'display' );
                ?>
                <?php if ( ! empty( $blog_info ) ) : ?>
                    <h1 class="khaown-site-title"><?php bloginfo( 'name' ); ?></h1>
                <?php endif; ?>
                <?php 
                    if ( $description || is_customize_preview() ) : ?>
                        <h4 class="khaown-site-description">
                            <?php echo $description; ?>
                        </h4>
                <?php endif; ?>
                <hr>
                <h5 class="large uppercase mb8 mb-xs-12">&rightarrow; <a href="<?php echo get_theme_mod( 'location_google_map_link'); ?>" target="_blank"><u>Google Map</u></a> this joint</h5>      
                <hr> 
                <ul>
                    <?php echo wp_kses_post(get_theme_mod( 'location_address', '')); ?>
                </ul>
                <p>
                    <a target="_blank" href="<?php// echo $emotahar['em_twitter_account']; ?>"><i class="ti-facebook icon-sm"></i></a> 
                    <a target="_blank" href="<?php //echo $emotahar['em_facebook_account']; ?>"><i class="ti-twitter-alt icon-sm"></i></a>
                    <a target="_blank" href="<?php// echo $emotahar['em_instagram_account']; ?>"><i class="ti-instagram icon-sm"></i></a>
                </p>
            </div>
        </section>
    <?php }; ?>
    <?php 
        $hide_products = get_theme_mod( 'hide_products_section', false);
        if(!$hide_products) { 
    ?>
            <div class="lightbox-grid third-thumbs">
                <ul class="em-products">
                    <h1>Motahar's Products</h1>
                    <?php
						$products_per_page = 6;
                        $em_food_itmes = array(
                            'post_type' => 'product',
                            'post_status' => 'publish',
                            'posts_per_page' => $products_per_page
                            );
                        $em_food_itmes_posts = new WP_Query( $em_food_itmes );
                        if ( $em_food_itmes_posts->have_posts() ) : 
                            while ( $em_food_itmes_posts->have_posts() ) : $em_food_itmes_posts->the_post();                            	
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

                            wp_reset_postdata();
                        endif; 
                    ?>
                </ul>
            </div>  
        <?php }; ?>

        <?php 
            $hide_about = get_theme_mod( 'hide_about_section');
            if(!$hide_about) { 
        ?>

            <section id="about">
                <div class="container">
                    <div class="row mb64 mb-xs-24">
                        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1"> 
                            <h3 class="uppercase mb16"><?php  echo get_theme_mod( 'about_section_title', ''); ?></h3>
                            <h6 class="mb8 uppercase"><?php echo get_theme_mod( 'about_section_sub_title', ''); ?></h6><br>
                            <p class="lead">
                                <?php echo get_theme_mod( 'about_section_description', ''); ?>
                            </p>
                            <h4>
                                <a target="_blank" href="<?php // echo $emotahar['em_facebook_account']; ?>"><i class="ti-facebook"></i></a> 
                                <a target="_blank" href="<?php // echo $emotahar['em_twitter_account']; ?>"><i class="ti-twitter-alt"></i></a> 
                                <a target="_blank" href="<?php // echo $emotahar['em_instagram_account']; ?>"><i class="ti-instagram"></i></a>
                            </h4>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
        <?php }; ?>
        <?php 
            $hide_parallux = get_theme_mod( 'hide_parallux_section', false);
            if(!$hide_parallux) { 
        ?>
           <section class="pt240 pb240 image-bg parallax">
               <div class="background-image-holder">
                   <img alt="jeff ragazzo photogrphy" class="background-image" src="<?php echo get_theme_mod( 'upload_media_parallux_image_1'); ?>" />
               </div>
            </section>
            <section class="pt240 pb240 image-bg parallax">
               <div class="background-image-holder">
                   <img alt="john e carson hotel las vegas" class="background-image" src="<?php echo get_theme_mod( 'upload_media_parallux_image_2'); ?>" />
                </div>
           </section>		
			<section class="pt240 pb240 image-bg parallax">
                <div class="background-image-holder">
                    <img alt="thai eggplant credit chris wessling las vegas" class="background-image" src="<?php echo get_theme_mod( 'upload_media_parallux_image_3'); ?>" />
                </div>
            </section>
       <?php }; ?>


        <?php
            $reviews_on_homepage =  get_theme_mod( 'khaown_show_max_reviews', 3);
            $khaown_customer_review = array(
                'post_type' => 'customer_review',
                'post_status' => 'publish',
                'posts_per_page' => $reviews_on_homepage
            );
            $khaown_customer_review_posts = new WP_Query( $khaown_customer_review );
            if ( $khaown_customer_review_posts->have_posts() ) : ?> 

                <?php 
                    $hide_reviews = get_theme_mod( 'hide_review_section', false);
                    if(!$hide_reviews) { 
                ?>
           <section class="customer-review-section image-bg overlay parallax">
                <?php 
                    $upload_media_review_bg_image = get_theme_mod( 'upload_media_review_bg_image');
                    if($upload_media_review_bg_image) { 
                ?>
                    <div class="background-image-holder">
                        <img alt="image" class="background-image" src="<?php echo $upload_media_review_bg_image; ?>" />
                    </div>
                <?php } ?>
               <div class="container">
                    <div class="row">
                        <div class="text-slider slider-paging-controls controls-outside relative">
                            <ul class="slides">
                                <?php 
                                    while ( $khaown_customer_review_posts->have_posts() ) : $khaown_customer_review_posts->the_post();
                                    $display_reviewer_name = get_post_meta( get_the_ID(), 'display_reviewer_name', true );
                                ?>
                                <li>
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="feature bordered text-center trans-dark">
                                            <h3><?php the_content(); ?></h3>
                                            <h6 class="uppercase"> <?php echo $display_reviewer_name; ?></h6>
                                        </div>
                                    </div>
                                </li>
                                <?php endwhile;  ?>
                                
                                
                            </ul>
                        </div>
                    </div>
                   <!--end of row-->
                </div>
                <!--end of container-->
            </section>
                <?php }; ?>

        <?php 
            wp_reset_postdata();
            endif; 
        ?>

        <?php 
            $hide_schedule = get_theme_mod( 'hide_schedule_section', false);
            if(!$hide_schedule) { 
        ?>
            <section class="restaurant-schedule">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 text-center">
                            <div class="em-widget-column ">
                                <div id="widget_opening_hours-2" class="em-widget">
                                    <h3 class="em-widget-title"><?php echo get_theme_mod( 'schedule_title', 'Opening Hours'); ?></h3>
                                    <div class="em-widget-content">
                                        <span><?php echo get_theme_mod( 'schedule_sub_title', 'Yes, Get some tomatoes, and, if they were eaten with the great extravagance to season'); ?></span>
                                    </div>
                                    <div class="em-day" content="Sunday <?php echo get_theme_mod( 'schedule_sunday_schedule', '8.00 AM - 10.00 PM' ); ?>"> 
                                        <strong class="em-float-left">Sunday</strong> 
                                        <span class="em-float-right"><?php echo get_theme_mod( 'schedule_sunday_schedule', '8.00 AM - 10.00 PM' ); ?></span>
                                    </div>
                                    <div class="em-day" content="Monday <?php echo get_theme_mod( 'schedule_sunday_schedule', '8.00 AM - 10.00 PM' ); ?>"> 
                                        <strong class="em-float-left">Monday</strong> 
                                        <span class="em-float-right"><?php echo get_theme_mod( 'schedule_sunday_schedule', '8.00 AM - 10.00 PM' ); ?></span>
                                    </div>
                                    <div class="em-day" content="Tuesday <?php echo get_theme_mod( 'schedule_monday_schedule', '8.00 AM - 10.00 PM' ); ?>"> 
                                        <strong class="em-float-left">Tuesday</strong> 
                                        <span class="em-float-right"><?php echo get_theme_mod( 'schedule_monday_schedule', '8.00 AM - 10.00 PM' ); ?></span>
                                    </div>
                                    <div class="em-day" content="Wednesday <?php echo get_theme_mod( 'schedule_Tuesday_schedule', '8.00 AM - 10.00 PM' ); ?>"> 
                                        <strong class="em-float-left">Wednesday</strong> 
                                        <span class="em-float-right"><?php echo get_theme_mod( 'schedule_Tuesday_schedule', '8.00 AM - 10.00 PM' ); ?></span>
                                    </div>
                                    <div class="em-day" content="Thurday <?php echo get_theme_mod( 'schedule_Wednesday_schedule', '8.00 AM - 10.00 PM' ); ?>"> 
                                        <strong class="em-float-left">Thurday</strong> 
                                        <span class="em-float-right"><?php echo get_theme_mod( 'schedule_Wednesday_schedule', '8.00 AM - 10.00 PM' ); ?></span>
                                    </div>
                                    <div class="em-day" content="Friday <?php echo get_theme_mod( 'schedule_Thursday_schedule', '8.00 AM - 10.00 PM' ); ?>"> 
                                        <strong class="em-float-left">Friday</strong> 
                                        <span class="em-float-right"><?php echo get_theme_mod( 'schedule_Thursday_schedule', '8.00 AM - 10.00 PM' ); ?></span>
                                    </div>
                                    <div class="em-day" content="Saturday <?php echo get_theme_mod( 'schedule_Friday_schedule', 'Clossed' ); ?>"> 
                                        <strong class="em-float-left">Saturday</strong> 
                                        <span class="em-float-right"><?php echo get_theme_mod( 'schedule_Friday_schedule', 'Clossed' ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php }; ?>
        <?php 
            $hide_portrait = get_theme_mod( 'hide_portrait_section', false);
            if(!$hide_portrait) { 
                $portrait_default_with_api = get_theme_mod( 'upload_media_portrait_image');
                $portrait_default_cond = get_stylesheet_directory_uri() . '/assets/img/portrait.jpg';
        ?>
            <section>
                <div class="container">
                    <?php if(!$portrait_default_with_api) : ?> 
                    <div class="row mb80 mb-xs-24">
                        <div class="col-sm-12 text-center">
                            <img alt="chef kerry simon las vegas" src="<?php echo $portrait_default_cond; ?>" />
                        </div>
                    </div>
                    <?php else : ?>
                    <div class="row mb80 mb-xs-24">
                        <div class="col-sm-12 text-center">
                            <img alt="chef kerry simon las vegas" src="<?php echo $portrait_default_with_api; ?>" />
                        </div>
                    </div>
                    <?php endif; ?>
                    <!--end of row-->
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center">
                            <h3 class="uppercase mb16"><?php echo get_theme_mod( 'your_thought_on_protrait_section', 'PLEASE KEEP CALM & CARRY ON'); ?></h3>
                        </div>
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
        <?php }; ?>
</div>
<?php get_footer(); ?>