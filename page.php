<?php
if (is_page()) {
    get_header('detail');
} else {
    get_header();
}
?>
<div class="py-4" style="margin-top:120px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <?php

                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content/content', 'page');

                endwhile; // End of the loop.
                ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>