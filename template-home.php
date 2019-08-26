<?php
/*
Template Name: Home Theme
*/
get_header();
?>
<div class="jumbotron jumbotron-fluid" style="background-color: rgba(0,0,0,0) !important;">
    <?php
    $header = new WP_Query(array('pagename' => 'investasi-emas'));
    if ($header->have_posts()) :
        $header->the_post();
        ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7" data-aos="fade-up" data-aos-duration="1000">

                <h1 class="display-5" style="color: antiquewhite;"><?php the_title(); ?></h1>
                <div style="color:aliceblue;">
                    <?php
                        the_content();
                        ?>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 text-center" data-aos="fade-left" data-aos-duration="1250">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid mt-0')); ?>
            </div>
        </div>

    </div>
    <?php endif; ?>
</div>
</div>

<div class="features-boxed">
    <div class="container">
        <div class="intro">
            <?php
            if (is_active_sidebar('section1')) {
                dynamic_sidebar('section1');
            }
            ?>
        </div>
        <div class="row justify-content-center features">
            <?php
            $catfeature = new WP_Query(array('category_name' => 'feature'));

            if ($catfeature->have_posts()) :

                $duration = 1000;
                while ($catfeature->have_posts()) :
                    $catfeature->the_post();
                    ?>
            <div class="col-sm-6 col-md-5 col-lg-4 item" data-aos="flip-left" data-aos-duration="<?= $duration; ?>">
                <div class="box">
                    <?php the_post_thumbnail('full', array('class' => 'img-fluid icon')); ?>
                    <h3 class="name"><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>
            </div>
            <?php
                    $duration = $duration + 500;
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>
<div class="highlight-blue">
    <div class="container">
        <?php
        $highlight = new WP_Query(array('pagename' => 'highlight'));
        if ($highlight->have_posts()) :
            $highlight->the_post();
            ?>

        <!--
        <div class="intro" data-aos="fade-down" data-aos-duration="1000">
            <h2 class="text-center"><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>
        -->
        <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000">
                <h2><?php the_title(); ?></h2>
                <?php the_content('Selanjutnya'); ?>
            </div>
            <div class="col-md-6" data-aos="fade-down" data-aos-duration="1250">
                <?php the_post_thumbnail('full', array('class' => 'img-fluid')); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="testimonials-clean" style="padding-bottom: 25px;">
    <div class="container">
        <div class="intro">
            <?php
            if (is_active_sidebar('section2')) {
                dynamic_sidebar('section2');
            }
            ?>
        </div>
        <div class="row people">
            <?php
            /*$testimoni = new WP_Query(array('pagename' => 'testimonials'));

            if ($testimoni->have_posts()) :
                while ($testimoni->have_posts()) :
                    $testimoni->the_post();

                    the_content();
                endwhile;
            endif;*/
            ?>
            <?php
            $catfeature = new WP_Query(array('category_name' => 'pilihan'));

            if ($catfeature->have_posts()) :

                $duration = 1000;
                while ($catfeature->have_posts()) :
                    $catfeature->the_post();
                    ?>
            <div class="col-sm-6 col-md-5 col-lg-4 item" data-aos="flip-left" data-aos-duration="<?= $duration; ?>">
                <div class="box">
                    <?php the_post_thumbnail('full', array('class' => 'img-fluid icon')); ?>
                    <h3 class="name"><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                </div>
            </div>
            <?php
                    $duration = $duration + 500;
                endwhile;
            endif;
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>