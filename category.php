<?php
if (is_category()) {
    get_header('detail');
} else {
    get_header();
}
?>
<div class="py-4" style="margin-top: 120px;">
    <div class="container">

        <?php
        if (have_posts()) :
            ?>
        <div class="row">
            <?php
                while (have_posts()) :
                    the_post();
                    ?>

            <div class="col-lg-4 col-md-4" style="color:#04070C;">

                <div class="card" id="post-<?php the_ID(); ?>">
                    <?php the_post_thumbnail('post-thumbnail', array('class' => ('img-fluid d-block mb-4 w-100 card-img-top'))); ?>
                    <div class="card-body">
                        <a href="<?php the_permalink(); ?>">
                            <h3 class="card-title"><?php the_title(); ?></h3>
                        </a>
                        <?php
                                the_content(
                                    __('Read More')
                                );
                                ?>
                    </div>
                </div>

            </div>

            <?php
                endwhile;
                ?>
        </div>
        <?php
        endif;
        ?>
    </div>
</div>
<?php get_footer(); ?>