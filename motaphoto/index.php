<?php get_header(); ?>

<?php get_template_part('template-parts/hero'); ?>

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
        <div class="filter-category">
            <select id="category-filter">
                <option value="">CATÉGORIES</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo esc_attr($category->term_id); ?>"><?php echo esc_html($category->name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="filter-format">
            <select id="format-filter">
                <option value="">FORMATS</option>
                <?php foreach ($formats as $format) : ?>
                    <option value="<?php echo esc_attr($format->term_id); ?>"><?php echo esc_html($format->name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- add date filter -->
        <div class="filter-date">
            <select id="date-filter">
                <option value="desc">TRIER PAR</option>
                <option value="desc">A partir des plus récentes</option>
                <option value="asc">A partir des plus anciennes</option>
            </select>
        </div>
    </div>
    <div class="container">
        <div id="gallery-grid">
        </div>
    </div>
    <div id="load-more-container">
        <button id="load-more">Charger plus</button>
    </div>

<?php get_footer(); ?>