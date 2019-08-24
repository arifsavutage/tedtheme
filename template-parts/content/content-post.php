<li class="media my-4" id="post-<?php the_ID(); ?>">
    <?php the_post_thumbnail('thumbnail', array('class' => ('img-fluid w10 mr-3'))); ?>
    <div class="media-body">
        <h5 class="mt-0 mb-3"><?php the_title(); ?></h5>
        <?php
        the_content(
            __('Read More')
        );
        ?>
    </div>
</li>