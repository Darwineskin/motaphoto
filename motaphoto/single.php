<?php get_header(); ?>

<?php
// Start the loop to display the content
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <!-- Display the title of the post -->
            <h1 class="entry-title"><?php the_title(); ?></h1>

            <!-- Display the metadata (author, date, categories) -->
            <div class="entry-meta">
                <p>Posted by <?php the_author(); ?> on <?php the_date(); ?></p>
                <p>Categories: <?php the_category(', '); ?></p>
                <p><?php the_tags(); ?></p>
            </div>

            <!-- Display the featured image -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <!-- Display the content of the post -->
            <div class="entry-content">
                <?php the_content(); ?>
            </div>

            <!-- Display comments section if comments are enabled -->
            <?php if ( comments_open() || get_comments_number() ) : ?>
                <div class="comments-section">
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>

        </article>

    <?php endwhile;
else :
    echo '<p>No content found for this post.</p>';
endif;
?>

<?php get_footer(); ?>



