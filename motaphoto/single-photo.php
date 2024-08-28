<?php get_header(); ?>

<?php
// Start the loop to display the content
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <!-- Display the title of the photo -->
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <!-- Display the custom fields in the specified order -->
            <div class="photo-details">
                <p><strong>Référence :</strong> <?php the_field('reference'); ?></p>
                <p><strong>Catégorie :</strong> <?php echo get_the_term_list( get_the_ID(), 'categorie_photo', '', ', ' ); ?></p>
                <p><strong>Format :</strong> <?php echo get_the_term_list( get_the_ID(), 'format_photo', '', ', ' ); ?></p>
                <p><strong>Type :</strong> <?php the_field('type'); ?></p>
                <p><strong>Année :</strong> <?php echo get_the_date('Y'); ?></p>
            </div>

            <!-- Display the featured image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <!-- Display the content (if any) -->
            <div class="entry-content">
                <?php the_content(); ?>
            </div>

        </article>

    <?php endwhile;
else :
    echo '<p>No photos found</p>';
endif;
?>

<?php get_footer(); ?>

