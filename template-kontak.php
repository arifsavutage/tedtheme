<?php
/*
Template Name: Kontak Theme
*/
?>
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
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <?php

                /* Start the Loop */
                if (have_posts()) :
                    the_post();
                    ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php
                endif; // End of the loop.
                ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (is_active_sidebar('contact-office')) {
                            dynamic_sidebar('contact-office');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 mt-2">
                <?php
                if (is_active_sidebar('maps')) {
                    dynamic_sidebar('maps');
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>