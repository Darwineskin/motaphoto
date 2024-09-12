<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="main-container">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    echo '<h1><a href="' . home_url('/') . '">' . get_bloginfo('name') . '</a></h1>';
                }
                ?>
            </div>
            <nav class="main-navigation">
                <button class="burger-menu" aria-label="Menu">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/burger.png" class="open-menu" alt="Open menu">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/close.png" class="close-menu" alt="Close menu">
                </button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main',
                    'menu_class'     => 'main-menu',
                    'container'      => 'ul',
                ));
                ?>
            </nav>
        </div>
    </header>
