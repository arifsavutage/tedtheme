<?php
class Wp_Widget_Video_Header extends WP_Widget
{
    public function __construct()
    {
        $widget_ops = array(
            'classname'     => 'widget_video_header',
            'decription'    => __('For video header background'),
            'customize_selective_refresh' => true
        );

        parent::__construct('widget_video_header', 'Widget TED Video Header', $widget_ops);
    }

    public function widget($args, $instance)
    {
        if (!isset($args['widget_id'])) {
            $args['widget_id'] = $this->id;
        }

        $default_title  = "Video Header";
        $title = (!empty($instance['title'])) ? $instance['title'] : $default_title;

        $title = apply_filters('widget_title', $title, $instance, $this->id_base);
        $text   = $instance['video_text'];
        $video_url = $instance['video_url'];

?>
        <!--<header>
            <div class="overlay"></div>
            <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
                <source src="<?= $video_url ?>" type="video/mp4">
            </video>
            <div class="text-container h-100">
                <div class="d-flex h-100 text-center align-items-center">
                    <div class="w-100 text-white">
                        <h1 class="display-3">
                            <?php
                            if ($title) {
                                echo $args['before_title'] . $title . $args['after_title'];
                                echo "<br/>";
                            }
                            ?>
                        </h1>
                        <p class="lead mb-0"><?= $text ?></p>
                    </div>
                </div>
            </div>
        </header>-->
        <!--<div class="embed-responsive embed-responsive-1by1">
            <iframe class="embed-responsive-item" src="<?= $video_url ?>"></iframe>
        </div>-->
        <div id="tedadds">
            <video playsinline="playsinline" id="tedvideo" autoplay="autoplay" muted="muted" controls width="100%" loop="loop" poster="<?= get_template_directory() . '/assets/header-video-ted.jpg' ?>">
                <source src="<?= $video_url ?>" type="video/mp4">
            </video>
        </div>

        <script>
            $('#tedadds').load(function() {
                $('#tedvideo').play();
            });
        </script>
    <?php
    }
    public function form($instance)
    {
        $title          = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $text           = isset($instance['video_text']) ? esc_attr($instance['video_text']) : '';
        $video_url      = isset($instance['video_url']) ? esc_attr($instance['video_url']) : '';
    ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('video_text'); ?>"><?php _e('Heading Text:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('video_text'); ?>" name="<?php echo $this->get_field_name('video_text'); ?>" type="text" value="<?php echo $text; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('video_url'); ?>"><?php _e('Video URL:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('video_url'); ?>" name="<?php echo $this->get_field_name('video_url'); ?>" type="text" value="<?php echo $video_url; ?>" size="3" />
        </p>
<?php
    }
    public function update($new_instance, $old_instance)
    {
        $instance                   = $old_instance;
        $instance['title']          = sanitize_text_field($new_instance['title']);
        $instance['video_text']     = sanitize_text_field($new_instance['video_text']);
        $instance['video_url']      = sanitize_text_field($new_instance['video_url']);
        return $instance;
    }
}
?>