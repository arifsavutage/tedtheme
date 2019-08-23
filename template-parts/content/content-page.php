<div id="post-<?php the_ID(); ?>">

    <div class="intro">
        <h1 class="text-center"><?php the_title(); ?></h1>
        <p class="text-center">
            <span class="by">by</span> <?php the_author_posts_link(); ?>
            <span class="date"><?php the_time('M d, Y'); ?> </span>
        </p>

        <?php the_post_thumbnail('medium', array('class' => ('img-fluid w-100'))); ?>
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