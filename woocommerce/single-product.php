<?php get_header(); ?>
    <main id="main-container  " >
        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
        <!-- <section id="events">
            <div class="container"> -->
                <!-- <div class="row mb64 mb-xs-24">
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1"> -->
                        <?php wc_get_template_part( 'content', 'single-product' ); ?>
                    <!-- </div>
                </div> -->
                <!--end of row-->
            <!-- </div> -->
            <!--end of container-->
        <!-- </section> -->
            <?php endwhile; ?>
        <?php endif; ?>
    </main>
<?php get_footer(); ?>