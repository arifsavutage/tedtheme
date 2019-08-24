<?php
if (is_page() || is_single()) {
    get_header('detail');
} else {
    get_header();
}
?>
<section style="margin-top: 100px;">
    <div class="container">
        <?php
        if (have_posts()) :
            ?>
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('content');
                    endwhile;
                    ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
        <?php
        endif;
        ?>
    </div>
</section>
<?php
get_footer();
?>