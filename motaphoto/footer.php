<footer>
    <nav class="footer-navigation">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer',
            'menu_class' => 'footer-menu',
            'container' => 'ul',
        ));
        ?>
    </nav>

    <!-------------------------contact modal---------------------->
    <?php get_template_part('template-parts/contact-modal'); ?>

    <!-------------------------Lightbox---------------------->
    <?php get_template_part('template-parts/lightbox'); ?>


</footer>
<?php wp_footer(); ?>
</body>
</html>