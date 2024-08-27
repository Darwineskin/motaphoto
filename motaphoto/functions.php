
<?php
// ajoute le css et le js
function motaphoto_enqueue_styles() {
    
    wp_enqueue_style('style', get_stylesheet_uri());

    
    wp_enqueue_script('custom-modal-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_styles');

//logo
function mytheme_custom_logo_setup() {
    $defaults = array(
        'height'      => 14,
        'width'       => 216,
        'flex-height' => true,
        'flex-width'  => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'mytheme_custom_logo_setup');


//  menus navigation
function motaphoto_register_menus() {
    register_nav_menus(array(
        'main' => __('Main Menu', 'motaphoto'),
        'footer'  => __('Footer Menu', 'motaphoto'),
    ));
}
add_action('init', 'motaphoto_register_menus');


function add_contact_button_to_end_of_menu($items, $args) {
// 
if ($args->theme_location == 'main') {
$contact_button = '<li class="menu-item contact-button">';
    $contact_button .= '<a href="#" id="contact-button">CONTACT</a>';
    $contact_button .= '</li>';
$items .= $contact_button; // end position
}
return $items;
}
add_filter('wp_nav_menu_items', 'add_contact_button_to_end_of_menu', 10, 2);

?>

