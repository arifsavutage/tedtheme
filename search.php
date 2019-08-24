<?php get_header('detail'); ?>
<section class="py-4" style="margin-top: 100px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                <ul class="list-unstyled">
                    <?php
                    if (have_posts()) :
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content/content', 'post');
                        endwhile;
                    endif;
                    ?>
                </ul>
            </div>

            <?php get_sidebar(); ?>

        </div>
    </div>
</section>
<?php get_footer(); ?>