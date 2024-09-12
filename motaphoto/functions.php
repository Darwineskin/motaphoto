
<?php

function enqueue_select2() {
    // include CSS Select2
    wp_enqueue_style('select2-css', get_template_directory_uri() . '/css/select2.min.css', array(), '1.0.1');


    // include JS Select2
    wp_enqueue_script('select2-js', get_template_directory_uri() . '/js/select2.min.js', array('jquery'), null, true);

}
add_action('wp_enqueue_scripts', 'enqueue_select2');

function motaphoto_enqueue_styles() {
    
    wp_enqueue_style('style', get_stylesheet_uri());

    
    wp_enqueue_script('custom-modal-script', get_template_directory_uri() . '/js/modal.js', array('jquery'), null, true);

    wp_enqueue_script('photo-nav-script', get_template_directory_uri() . '/js/photo-nav.js', array('jquery'), null, true);

    wp_enqueue_script('nav-menu', get_template_directory_uri() . '/js/nav.js', array('jquery'), null, true);

    if (is_home()) {
        wp_enqueue_script('search-script', get_template_directory_uri() . '/js/search.js', array('jquery'), null, true);
    }

}
add_action('wp_enqueue_scripts', 'motaphoto_enqueue_styles');




//logo
function motaphoto_custom_logo_setup() {
    $defaults = array(
        'height'      => 14,
        'width'       => 216,
        'flex-height' => true,
        'flex-width'  => true,
    );
    add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'motaphoto_custom_logo_setup');


//  menus navigation
function motaphoto_register_menus() {
    register_nav_menus(array(
        'main' => __('Main Menu', 'motaphoto'),
        'footer'  => __('Footer Menu', 'motaphoto'),
    ));
}
add_action('init', 'motaphoto_register_menus');



// Contact menu
function add_contact_button_to_end_of_menu($items, $args) {

if ($args->theme_location == 'main') {
$contact_button = '<li class="menu-item contact-button">';
    $contact_button .= '<a href="#" data-open-modal="contact">CONTACT</a>';
    $contact_button .= '</li>';
$items .= $contact_button; // end position
}
return $items;
}
add_filter('wp_nav_menu_items', 'add_contact_button_to_end_of_menu', 10, 2);

///////////////Add Api wordpress to filter

function add_thumbnail_url_to_rest_api($data, $post, $request) {
    // Check if the post has a featured image.
    if (has_post_thumbnail($post->ID)) {
        // Retrieve the URL of the featured image.
        $thumbnail_id = get_post_thumbnail_id($post->ID);
        $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'large');

        // Add the image URL to the response.
        $data->data['featured_media_src_url'] = $thumbnail_url;
    } else {
        // Si le post n'a pas d'image mise en avant, ajoutez une valeur nulle
        $data->data['featured_media_src_url'] = null;
    }

    return $data;
}

// hero//


function get_random_photo_url()
{
    $photos = new WP_Query(array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'fields' => 'ids'
    ));

    if ($photos->have_posts()) {
        $photo_urls = array();
        while ($photos->have_posts()) {
            $photos->the_post();
            if (has_post_thumbnail()) {
                $photo_urls[] = get_the_post_thumbnail_url(get_the_ID(), 'full');
            }
        }

        wp_reset_postdata();


        if (!empty($photo_urls)) {
            return $photo_urls[array_rand($photo_urls)];
        }
    }

    return 'No photos available';
}


// Apply the filter to the Custom Post Type 'photo'.
add_filter('rest_prepare_photo', 'add_thumbnail_url_to_rest_api', 10, 3);










