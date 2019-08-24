<?php
if (is_page()) {
    get_header('detail');
} else {
    get_header();
}
?>
<div class="py-4" style="margin-top:100px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <?php

                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content/content', 'page');

                endwhile; // End of the loop.
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>