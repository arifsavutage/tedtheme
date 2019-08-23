<div class="py-4" id="post-<?php the_ID(); ?>" style="margin-top:120px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="intro">
                    <h1 class="text-center"><?php the_title(); ?></h1>
                    <p class="text-center">
                        <span class="by">by</span> <?php the_author_posts_link(); ?>
                        <span class="date"><?php the_time('M d, Y'); ?> </span>
                    </p>

                    <?php the_post_thumbnail('full', array('class' => ('img-fluid w-100'))); ?>
                </div>
                <div class="text mt-3">
                    <?php
                    the_content(
                        sprintf(
                            __('Read More', 'tedtheme'),
                            the_title('<a class="btn btn-outline-dark">', '</a>', false)
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--
<div class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="text-center">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item paging"><?php previous_post_link(); ?></li>
                        <li class="list-inline-item paging"><?php next_post_link(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
                -->