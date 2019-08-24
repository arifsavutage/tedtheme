<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
    <style>
        .bg-blue {
            /*background-color: #007bff !important;*/
            background: linear-gradient(135deg, #172a74, #21a9af) !important;
            background-color: #184e8e;
        }

        .padding-lg {
            padding: 2rem 7rem !important;
        }
    </style>
</head>

<body>
    <div class="header-blue">
        <nav class="navbar navbar-dark navbar-expand-md" id="navbar-top">
            <a class="navbar-brand" href="<?php bloginfo('url'); ?>">
                <?php
                /*Menampilkan logo atau site title*/
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                if (has_custom_logo()) {
                    echo '<img class="brand-logo" src="' . esc_url($logo[0]) . '">';
                } else {
                    echo "<b class='brand-name'>" . get_bloginfo('name') . "</b>";
                }
                ?>
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'primary',
                    'container_class' => 'container-primary',
                    'menu_class'      => 'navbar-nav mr-auto mt-2 mt-lg-0',
                    'menu_id'         => 'primary-menu'
                ));
                ?>

                <?php
                wp_nav_menu(array(
                    'theme_location'  => 'link-menu',
                    'menu_class'      => 'nav justify-content-end',
                    'menu_id'         => 'link-menu-id'
                ));
                ?>
            </div>
        </nav>