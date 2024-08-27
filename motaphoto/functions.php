
<?php
// ajoute le css et le js
function motaphoto_enqueue_styles() {
    
    wp_enqueue_style('style', get_stylesheet_uri());

    
    wp_enqueue_script('custom-modal-script', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_styles');



// Assurez-vous que ce code est bien dans le fichier functions.php de votre thème.

// Fonction pour enregistrer les menus de navigation
function motaphoto_register_menus() {
    register_nav_menus(array(
        'main' => __('Main Menu', 'motaphoto'),
        'footer'  => __('Footer Menu', 'motaphoto'),
    ));
}
add_action('init', 'motaphoto_register_menus');
?>

