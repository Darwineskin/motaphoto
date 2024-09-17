<h3>VOUS AIMEREZ AUSSI</h3>

<?php

$categories = wp_get_post_terms(get_the_ID(), 'categorie_photo');
if ($categories && !is_wp_error($categories)) {
    $category_ids = wp_list_pluck($categories, 'term_id');


    $args = array(
        'post_type' => 'photo', //
        'posts_per_page' => 2,
        'post__not_in' => array(get_the_ID()),
        'tax_query' => array(
            array(
                'taxonomy' => 'categorie_photo',
                'field' => 'term_id',
                'terms' => $category_ids,
            ),
        ),
    );

    $related_photos = new WP_Query($args);

    if ($related_photos->have_posts()) : ?>
        <div id="gallery-grid">
            <?php while ($related_photos->have_posts()) : $related_photos->the_post(); ?>
                <div class="gallery-item" data-post-id="<?php the_ID(); ?>">
                    <a href="<?php the_permalink(); ?>" class="related-photo-link">
                        <?php the_post_thumbnail('large', 'class=gi-image'); ?>
                    </a>
                    <div class="overlay">
                        <div class="icon-fullscreen"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_fullscreen.png" alt="fullscreen">
                        </div>
                        <div class="icon-eye">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon_eye.png" alt="eye"></a>
                        </div>
                        <div class="overlay-info">
                            <div class="overlay-ref"><?php the_field('reference'); ?></div>
                            <div class="overlay-cat"><?php
                                $categories = get_the_terms(get_the_ID(), 'categorie_photo');
                                if ($categories && !is_wp_error($categories)) {
                                    $category_names = wp_list_pluck($categories, 'name');
                                    echo implode(', ', $category_names);
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata();
}
?>
