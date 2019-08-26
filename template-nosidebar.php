<?php
/*
Template Name: No Sidebar
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
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <?php

                if (have_posts()) :
                    the_post();
                    ?>
                <h1 class="display-3"><?php the_title(); ?></h1>
                <hr class="my-4">
                <?php
                    the_content();
                endif; // End of the loop.
                ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>