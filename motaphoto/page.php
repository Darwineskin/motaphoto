<?php get_header(); ?>

<main id="site-content" role="main">

    <?php
    // Start the loop to display the content
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <!-- Display the title of the page -->
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <!-- Display the content of the page -->
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

            </article>

        <?php endwhile;
    else :
        echo '<p>No content found</p>';
    endif;
    ?>

</main><!-- #site-content -->


<?php get_footer(); ?>


