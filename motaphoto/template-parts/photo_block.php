
<p>VOUS AIMEREZ AUSSI</p>

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
                <div class="gallery-item">
                    <a href="<?php the_permalink(); ?>" class="related-photo-link">
                        <?php the_post_thumbnail('large'); ?>
                        <div class="photo-overlay">
                            <span class="icon-eye"></span>
                            <span class="icon-fullscreen"></span>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata();
}
?>



