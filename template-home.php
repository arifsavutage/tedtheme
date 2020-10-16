<?php
/*
Template Name: Home Theme
*/
get_header();
?>
<?php
$catslider   = new WP_Query(array('category_name' => 'slider'));

if ($catslider->have_posts()) :
?>

    <div class="simple-slider mt-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <?php


            $slideritem     = array();
            $slidertitle    = array();
            $slidercaption  = array();

            $i  = 0;

            while ($catslider->have_posts()) {
                $catslider->the_post();

                $imgslider[$i]      = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                $titleslider[$i]    = get_the_title($post->ID);
                $postslider[$i]     = apply_filters('the_content', get_post_field('post_content', $post->ID));

                array_push($slideritem, $imgslider[$i][0]);
                array_push($slidertitle, $titleslider[$i]);
                array_push($slidercaption, $postslider[$i]);

                $i++;
            }

            #print_r( $slidercaption );

            /** hitung jml array */
            $a = count($slideritem);
            ?>
            <ol class="carousel-indicators">
                <?php
                for ($x = 0; $x < $a; $x++) {

                    if ($x == 0) {
                        $class = " class='active'";
                    } else {
                        $class = "";
                    }
                ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $x; ?>" <?php echo $class; ?>></li>
                <?php
                }
                ?>
            </ol>

            <div class="carousel-inner">
                <?php
                for ($y = 0; $y < $a; $y++) {

                    if ($y == 0) {
                        $class = "active";
                    } else {
                        $class = "";
                    }
                ?>
                    <div class="carousel-item <?php echo $class; ?>">
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
                            <!--
                        <img class="d-block w-100" src="<?php echo $slideritem[$y]; ?>" alt="<?php the_title(); ?>">


                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $slidertitle[$y]; ?></h5>
                            <?php echo $slidercaption[$y]; ?>
                        </div>
                -->
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>



            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>

<?php
endif;
?>
</div>

<!--Latihan widget-->
<?php
if (is_active_sidebar('header_video')) :
?>
    <section>
        <?php dynamic_sidebar('header_video'); ?>
    </section>
<?php
endif;
?>
<?php
if (is_active_sidebar('latihan_widget')) :
?>
    <section>
        <div class="container">
            <?php
            dynamic_sidebar('latihan_widget');
            ?>
        </div>
    </section>
<?php
endif;
?>
<!--Latihan widget-->

<div class="features-boxed">
    <div class="container">
        <div class="intro mt-4">
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
if (is_active_sidebar('testimoni')) :

?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <?php
                    dynamic_sidebar('testimoni');
                    ?>
                </div>
            </div>
        </div>
    </section>
<?php
endif;
?>
<?php
get_footer();
?>