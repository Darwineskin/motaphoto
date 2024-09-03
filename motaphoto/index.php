<?php get_header(); ?>

<?php
// Retrieve the categories and formats
$categories = get_terms(array(
    'taxonomy' => 'categorie_photo',
    'hide_empty' => true
));

$formats = get_terms(array(
    'taxonomy' => 'format_photo',
    'hide_empty' => true
));
?>

    <div class="gallery-filters">
        <h3>Filtres</h3>

        <div class="filter-category">
            <select id="category-filter">
                <option value="">Toutes les catégories</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo esc_attr($category->term_id); ?>"><?php echo esc_html($category->name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="filter-format">
            <select id="format-filter">
                <option value="">Tous les formats</option>
                <?php foreach ($formats as $format) : ?>
                    <option value="<?php echo esc_attr($format->term_id); ?>"><?php echo esc_html($format->name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div id="gallery-grid">
        <?php
        // Récupérer les photos
        $photos = new WP_Query(array(
            'post_type' => 'photo',
            'posts_per_page' => -1,
        ));

        if ($photos->have_posts()) :
            while ($photos->have_posts()) : $photos->the_post();
                $photo_id = get_the_ID();
                $photo_categories = wp_get_post_terms($photo_id, 'categorie_photo', array('fields' => 'slugs'));
                $photo_formats = wp_get_post_terms($photo_id, 'format_photo', array('fields' => 'slugs'));
                ?>
                <div class="gallery-item <?php foreach ($photo_categories as $category) {
                    echo 'cat-' . esc_attr($category) . ' ';
                } ?><?php foreach ($photo_formats as $format) {
                    echo 'format-' . esc_attr($format) . ' ';
                } ?>">
                    <?php the_post_thumbnail('medium'); ?>
                    <h4><?php the_title(); ?></h4>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        endif; ?>
    </div>


<?php get_footer(); ?>