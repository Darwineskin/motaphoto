<?php get_header(); ?>

<?php
// Start the loop to display the content
if (have_posts()) :
    while (have_posts()) : the_post(); ?>

        <section class="container info-page-container">

            <!-- containe for left and right -->
            <article class="info-content">
                <!-- Block left (50%) -->
                <div class="col-left info-left bordered-bottom">
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                    <div class="photo-details">
                        <p>Référence : <?php the_field('reference'); ?></p>
                        <p>Catégorie :
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'categorie_photo');
                            if ($categories && !is_wp_error($categories)) {
                                $category_names = wp_list_pluck($categories, 'name');
                                echo implode(', ', $category_names);
                            }
                            ?>
                        </p>
                        <p>Format :
                            <?php
                            $formats = get_the_terms(get_the_ID(), 'format_photo');
                            if ($formats && !is_wp_error($formats)) {
                                $format_names = wp_list_pluck($formats, 'name');
                                echo implode(', ', $format_names);
                            }
                            ?>
                        </p>
                        <p>Type : <?php the_field('type'); ?></p>
                        <p>Année : <?php echo get_the_date('Y'); ?></p>
                    </div>
                </div>

                <!-- Block right (50%) -->
                <div class="col-right info-right">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                </div>
            </article>

        </section>

        <!-- Block bottom (118px height) -->
        <section class="container info-footer bordered-top">

            <div class="col-left contact-photo bordered-bottom">
                <p class="ff-poppins">Cette photo vous intéresse ?</p>
                <div class="contact-photo-btn">
                    <a href="#" data-open-modal="contact" data-reference="<?php the_field('reference'); ?>">Contact</a>
                </div>
            </div>

            <div class="col-right bordered-bottom">
                <!--navigation thumbnails-->
                <div class="navigation-links">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>
                    <div class="thumbnail-container"></div>
                    <div class="nav-links-wrapper">
                        <?php if ($prev_post) : ?>
                            <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-prev"
                               data-thumbnail="<?php echo get_the_post_thumbnail_url($prev_post->ID, 'thumbnail'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/left_arrow.png"
                                     alt="Précédent">
                            </a>
                        <?php endif; ?>

                        <?php if ($next_post) : ?>
                            <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-next"
                               data-thumbnail="<?php echo get_the_post_thumbnail_url($next_post->ID, 'thumbnail'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/right_arrow.png"
                                     alt="Suivant">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="container recommended-photo">
            <?php get_template_part('template-parts/photo_block'); ?>
        </section>


    <?php endwhile;
else :
    echo '<p>No photos found</p>';
endif;
?>

<?php get_footer(); ?>








