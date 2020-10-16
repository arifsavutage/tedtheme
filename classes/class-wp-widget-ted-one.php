<?php
class Wp_Widget_Ted_One extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
            'classname'                   => 'widget_ted_one',
            'description'                 => __('Section template model one'),
            'customize_selective_refresh' => true
        );

        parent::__construct('widget_ted_one', 'Widget TED One', $widget_ops);
    }

    public function widget($args, $instance)
    {
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $default_title  = "Section One";
        $title = (!empty($instance['title'])) ? $instance['title'] : $default_title;
        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters('widget_title', $title, $instance, $this->id_base);

        $category_name  = str_replace(" ", "_", strtolower($instance['category_name']));
        $number = $instance['number'];

        $querys = new WP_Query(
            apply_filters(
                'widget_posts_args',
                array(
                    'category_name'     => $category_name,
                    'posts_per_page'    => $number,
                    'no_found_rows'     => true
                ),
                $instance
            )
        );

        if (!$querys->have_posts()) {
            return;
        }

        echo $args['before_widget'];

        echo '<div class="intro mt-4">';
        if ($title) {
            echo $args['before_title'] . $title . $args['after_title'];
            echo "<br/>";
        }
        echo '</div>';
?>
        <div class="row justify-content-center mt-4 mb-4">
            <div class="col-sm-12 col-md-12">
                <div class="row">
                    <?php

                    if ($querys->have_posts()) :

                        $duration = 1000;
                        while ($querys->have_posts()) :
                            $querys->the_post();
                    ?>
                            <div class="col-sm-6 col-md-5 col-lg-4" data-aos="flip-left" data-aos-duration="<?= $duration; ?>">
                                <div class="card" style="width: 18rem;">
                                    <?php the_post_thumbnail('full', array('class' => 'img-fluid icon')); ?>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php the_title(); ?></h5>
                                        <?php the_content(); ?>
                                    </div>
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
        echo $args['after_widget'];
    }
    public function form($instance)
    {
        $title          = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $category_name  = isset($instance['category_name']) ? esc_attr($instance['category_name']) : '';
        $number         = isset($instance['number']) ? absint($instance['number']) : 5;
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('category_name'); ?>"><?php _e('Category Name:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('category_name'); ?>" name="<?php echo $this->get_field_name('category_name'); ?>" type="text" value="<?php echo $category_name; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:'); ?></label>
            <input class="tiny-text" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
        </p>
<?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance                   = $old_instance;
        $instance['title']          = sanitize_text_field($new_instance['title']);
        $instance['category_name']  = sanitize_text_field($new_instance['category_name']);
        $instance['number']         = (int) $new_instance['number'];
        return $instance;
    }
}
?>