<?php get_header(); ?>
    <main id="main-container" class="khaown-woo-single-container" >
        <?php if(have_posts()) : ?>
            <?php while(have_posts()) : the_post(); ?>
                <?php wc_get_template_part( 'content', 'single-product' ); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>
<?php get_footer(); ?>