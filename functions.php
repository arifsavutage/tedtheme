<?php
load_theme_textdomain('tedtheme');
/*
membuat support featured image di theme
*/
add_theme_support('post-thumbnails');
add_theme_support('post-formats', array('gallery', 'image', 'video'));

/*title tag*/
add_theme_support('title-tag');

/*register menu navigasi*/
function register_tedtheme_menus()
{
    register_nav_menus(
        array(
            'primary'       => __('Top Menu'),
            'link-menu'     => __('Link untuk daftar dan login, custom link'),
            'footer-link1'  => __('Footer link 1'),
            'footer-link2'  => __('Footer link 2'),
            'footer-link3'  => __('Footer link 3'),
            'footer-link4'  => __('Footer link 4'),
            'social-menu'   => __('Social media menu')
        )
    );
}
add_action('init', 'register_tedtheme_menus');

/*
membuat custom logo di customizing
*/
function themename_custom_logo_setup()
{
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array('site-title', 'site-description'),
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'themename_custom_logo_setup');

function tedtheme_widgets_init()
{
    register_sidebar(array(
        'name'            => __('Right Sidebar', 'tedtheme'),
        'id'            => 'right-sidebar',
        'description'    => __('Show right sidebar'),
        'before_widget'    => '<section id="%1$s" class="widget %2$s unstyle">',
        'after_widget'    => '</section>',
        'before_title'    => '<h4>',
        'after_title'    => '</h4>'
    ));

    register_sidebar(array(
        'name'            => __('Section Satu', 'tedtheme'),
        'id'            => 'section1',
        'description'    => __('Untuk menampilkan judul section 1, isi adalah dari post category feature'),
        'before_widget'    => '',
        'after_widget'    => '',
        'before_title'    => '<h2 class="text-center" style="color:#3e4042;">',
        'after_title'    => '</h2>'
    ));

    register_sidebar(array(
        'name'            => __('Section Dua', 'tedtheme'),
        'id'            => 'section2',
        'description'    => __('Untuk menampilkan judul section 2, isi adalah dari page testimonial'),
        'before_widget'    => '',
        'after_widget'    => '',
        'before_title'    => '<h2 class="text-center">',
        'after_title'    => '</h2>'
    ));

    register_sidebar(array(
        'name'            => __('Section Testimoni', 'tedtheme'),
        'id'            => 'testimoni',
        'description'    => __('Untuk menampilkan testimoni, install plugin WP Testimonial with rotator widget terlebihdahulu'),
        'before_widget'    => '',
        'after_widget'    => '',
        'before_title'    => '',
        'after_title'    => ''
    ));

    register_sidebar(array(
        'name'            => __('Newsletter', 'tedtheme'),
        'id'            => 'newsletter',
        'description'    => __('Untuk menampilkan newsletter form'),
        'before_widget'    => '',
        'after_widget'    => '',
        'before_title'    => '<h2>',
        'after_title'    => '</h2>'
    ));

    register_sidebar(array(
        'name'            => __('Footer 1', 'tedtheme'),
        'id'            => 'footer1',
        'description'    => __('Untuk menampilkan link menu'),
        'before_widget'    => '',
        'after_widget'    => '',
        'before_title'    => '<h3>',
        'after_title'    => '</h3>'
    ));

    register_sidebar(array(
        'name'            => __('Footer 2', 'tedtheme'),
        'id'            => 'footer2',
        'description'    => __('Untuk menampilkan link menu'),
        'before_widget'    => '',
        'after_widget'    => '',
        'before_title'    => '<h3>',
        'after_title'    => '</h3>'
    ));

    register_sidebar(array(
        'name'            => __('Footer 3', 'tedtheme'),
        'id'            => 'footer3',
        'description'    => __('Untuk menampilkan link menu'),
        'before_widget'    => '',
        'after_widget'    => '',
        'before_title'    => '<h3>',
        'after_title'    => '</h3>'
    ));

    register_sidebar(array(
        'name'            => __('Footer 4', 'tedtheme'),
        'id'            => 'footer4',
        'description'    => __('Untuk menampilkan link menu'),
        'before_widget'    => '',
        'after_widget'    => '',
        'before_title'    => '<h3>',
        'after_title'    => '</h3>'
    ));

    register_sidebar(array(
        'name'            => __('Contact Office', 'tedtheme'),
        'id'            => 'contact-office',
        'description'    => __('Custom html for address, phone, e-mail etc.'),
        'before_widget'    => '',
        'after_widget'    => '',
        'before_title'    => '<h5 class="card-title">',
        'after_title'    => '</h5>'
    ));

    register_sidebar(array(
        'name'            => __('Embed Maps', 'tedtheme'),
        'id'            => 'maps',
        'description'    => __('Untuk menampilkan embed maps google'),
        'before_widget'    => '',
        'after_widget'    => '',
        'before_title'    => '',
        'after_title'    => ''
    ));

    register_sidebar(array(
        'name'            => __('Social Media', 'tedtheme'),
        'id'            => 'social',
        'description'    => __('Custom html for social media'),
        'before_widget'    => '',
        'after_widget'    => '',
        'before_title'    => '',
        'after_title'    => ''
    ));
}
add_action('widgets_init', 'tedtheme_widgets_init');


/* Membuat ShortCode Accordion */
function accordions_container($atts, $content = null)
{
    extract(shortcode_atts(array(), $atts));

    return "<div id='accordion'>" . do_shortcode($content) . "</div>";
}
add_shortcode('accordions', 'accordions_container');

function accordion_buttons($atts, $content = null)
{
    extract(
        shortcode_atts(
            array(
                'id' => '',
                'title' => '',
                'target' => '',
                'expanded' => '',
                'collapse_class' => ''
            ),
            $atts
        )
    );

    return "
		<div class='card'>
			<div class='card-header' id='" . $id . "'>
				<h5 class='mb-0'>
					<button class='btn btn-link text-dark' data-toggle='collapse' data-target='#" . $target . "' aria-expanded='" . $expanded . "' aria-controls='" . $target . "'>
						" . $title . "
					</button>
				</h5>
			</div>

			<div id='" . $target . "' class='collapse " . $collapse_class . "' aria-labelledby='" . $id . "' data-parent='#accordion'>
				<div class='card-body'>
				" . do_shortcode($content) . "
				</div>
			</div>
		</div>";
}
add_shortcode('accordion', 'accordion_buttons');
/* END OF ACCORDION */

/** short Code For Funny embeded Grid */
function container_short($atts, $content = null)
{
    extract(shortcode_atts(array(), $atts));

    return "<div class='container'>" . do_shortcode($content) . "</div>";
}
add_shortcode('container', 'container_short');

function row_short($atts, $content = null)
{
    extract(shortcode_atts(array('class' => ''), $atts));

    return "<div class='row " . $class . "'>" . do_shortcode($content) . "</div>";
}
add_shortcode('row', 'row_short');

function coll_short($atts, $content = null)
{
    extract(
        shortcode_atts(array('class' => ''), $atts)
    );

    return "<div class='" . $class . "'>" . do_shortcode($content) . "</div>";
}
add_shortcode('coll', 'coll_short');
/** END OF short Code For Funny embeded Grid */

/** Shortcode dl dt dd */
function dl_short($atts, $content = null)
{
    extract(shortcode_atts(array('class' => 'row'), $atts));

    return "<dl class='" . $class . "'>" . do_shortcode($content) . "</dl>";
}
add_shortcode('dl', 'dl_short');

function dt_short($atts, $content = null)
{
    extract(shortcode_atts(array('class' => ''), $atts));

    return "<dt class='" . $class . "'>" . do_shortcode($content) . "</dt>";
}
add_shortcode('dt', 'dt_short');

function dd_short($atts, $content = null)
{
    extract(shortcode_atts(array('class' => ''), $atts));

    return "<dd class='" . $class . "'>" . do_shortcode($content) . "</dd>";
}
add_shortcode('dd', 'dd_short');

/** END OF Shortcode dl dt dd */

/** Shortcode Carousel */
function carousel_short($atts, $content = null)
{
    extract(shortcode_atts(array(), $atts));

    return "<div id='carouselId' class='carousel slide' data-ride='carousel'>" . do_shortcode($content) . "
	<a class='carousel-control-prev' href='#carouselId' role='button' data-slide='prev'>
		<span class='carousel-control-prev-icon' aria-hidden='true'></span>
		<span class='sr-only'>Previous</span>
	</a>
	<a class='carousel-control-next' href='#carouselId' role='button' data-slide='next'>
		<span class='carousel-control-next-icon' aria-hidden='true'></span>
		<span class='sr-only'>Next</span>
	</a>
	</div>";
}
add_shortcode('carousel', 'carousel_short');

function indicator_short($atts, $content = null)
{
    extract(shortcode_atts(array(), $atts));

    return "<ol class='carousel-indicators'>" . do_shortcode($content) . "</ol>";
}
add_shortcode('indicator', 'indicator_short');

function slide_short($atts, $content = null)
{
    extract(shortcode_atts(array('to' => '', 'class' => ''), $atts));

    return "<li data-target='#carouselId' data-slide-to='" . $to . "' class='" . $class . "'></li>";
}
add_shortcode('slide', 'slide_short');

function item_short($atts, $content = null)
{
    extract(shortcode_atts(array(), $atts));

    return "<div class='carousel-inner p-2' role='listbox'>" . do_shortcode($content) . "</div>";
}
add_shortcode('item', 'item_short');

function img_short($atts, $content = null)
{
    extract(shortcode_atts(array('class' => ''), $atts));

    return "<div class='carousel-item " . $class . "'>" . do_shortcode($content) . "</div>";
}
add_shortcode('img', 'img_short');
/** END OF Shortcode Carousel */

/* Custom Excerpt length */
function custom_excerpt_length($length)
{
    return 7;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function wptedtheme_style()
{
    wp_enqueue_style('fontsawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/fontawesome.css', array(), '5.9.0', 'all');
    wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css', array(), '4.0.0', 'all');
    wp_enqueue_style('ionicons', 'https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css', array(), '2.0.1', 'all');
    wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700', array(), 'all');
    wp_enqueue_style('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css', array(), '3.3.1', 'all');
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@next/dist/aos.css', array(), 'all');
}
add_action('wp_enqueue_scripts', 'wptedtheme_style');


function wptedtheme_scripts()
{

    wp_enqueue_script('jquerys', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js', array('jquery'), '3.2.1', true);
    wp_enqueue_script('bootstraps', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js', array(), '4.0.0', true);
    wp_enqueue_script('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js', array(), '3.3.1', true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.min.js', array(), '2', true);
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@next/dist/aos.js', array(), '1', true);
}
add_action('wp_footer', 'wptedtheme_scripts');
