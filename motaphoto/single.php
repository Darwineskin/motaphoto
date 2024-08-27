<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Testou
 * @since Testou 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php
    /* Start the Loop */
    while ( have_posts() ) :
        the_post();

        // Contenu du post individuel
        get_template_part( 'template-parts/content', 'single' );

        if ( is_attachment() ) {
            // Navigation du post parent.
            the_post_navigation(
                array(
                    'prev_text' => sprintf( __( '<span class="meta-nav">Publié dans</span><span class="post-title">%s</span>', 'testou' ), '%title' ),
                )
            );
        }

        // Charger le template des commentaires si les commentaires sont ouverts ou s'il y a au moins un commentaire.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        }

        // Navigation précédent/suivant.
        $testou_next = is_rtl() ? testou_get_icon_svg( 'ui', 'arrow_left' ) : testou_get_icon_svg( 'ui', 'arrow_right' );
        $testou_prev = is_rtl() ? testou_get_icon_svg( 'ui', 'arrow_right' ) : testou_get_icon_svg( 'ui', 'arrow_left' );

        $testou_next_label     = esc_html__( 'Article suivant', 'testou' );
        $testou_previous_label = esc_html__( 'Article précédent', 'testou' );

        the_post_navigation(
            array(
                'next_text' => '<p class="meta-nav">' . $testou_next_label . $testou_next . '</p><p class="post-title">%title</p>',
                'prev_text' => '<p class="meta-nav">' . $testou_prev . $testou_previous_label . '</p><p class="post-title">%title</p>',
            )
        );

    endwhile; // Fin de la boucle.
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();

?>

