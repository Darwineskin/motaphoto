<?php get_header(); ?>

<?php
// Start the loop to display the content
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

        <div class="info-page-container">

            <!-- Conteneur pour les blocs gauche et droite -->
            <section class="info-content">
                <!-- Bloc gauche (50% de largeur) -->
                <article class="info-left">
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                    <div class="photo-details">
                        <p><strong>Référence :</strong> <?php the_field('reference'); ?></p>
                        <p><strong>Catégorie :</strong> <?php echo get_the_term_list( get_the_ID(), 'categorie_photo', '', ', ' ); ?></p>
                        <p><strong>Format :</strong> <?php echo get_the_term_list( get_the_ID(), 'format_photo', '', ', ' ); ?></p>
                        <p><strong>Type :</strong> <?php the_field('type'); ?></p>
                        <p><strong>Année :</strong> <?php echo get_the_date('Y'); ?></p>
                    </div>
                </article>

                <!-- Bloc droit (50% de largeur) -->
                <article class="info-right">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail('large'); ?>
                    <?php endif; ?>
                </article>
            </section>

            <!-- Bloc bas (118px de hauteur) -->
            <article class="info-footer">
                <p>Cette photo vous intéresse ?</p>
                <div class="contact-photo">
                    <a href="#"  data-open-modal="contact" data-reference="<?php the_field('reference'); ?>">Contact</a>

                </div>
                <div class="navigation-links">
                    <div class="thumbnail-container"></div>
                    <div class="nav-links-wrapper">
                        <?php
                        $prev_post = get_previous_post();
                        $next_post = get_next_post();
                        ?>
                        <?php if ($prev_post) : ?>
                            <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-prev" data-thumbnail="<?php echo get_the_post_thumbnail_url($prev_post->ID, 'thumbnail'); ?>">Précédent</a>
                        <?php endif; ?>
                        <?php if ($next_post) : ?>
                            <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-next" data-thumbnail="<?php echo get_the_post_thumbnail_url($next_post->ID, 'thumbnail'); ?>">Suivant</a>
                        <?php endif; ?>
                    </div>
                </div>
            </article>
            <?php get_template_part('template-parts/photo_block'); ?>
        </div>

    <?php endwhile;
else :
    echo '<p>No photos found</p>';
endif;
?>

<?php get_footer(); ?>








