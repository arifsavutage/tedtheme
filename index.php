<?php
if (is_page() || is_single()) {
    get_header('detail');
} else {
    get_header();
}
?>
<div class="py-4">
    <div class="container">
        <?php
        if (have_posts()) :
            ?>
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('content');
                    endwhile;
                    ?>
            </div>
        </div>
        <?php
        endif;
        ?>
    </div>
</div>
<?php
get_footer();
?>