<footer>
    <nav class="footer-navigation">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer',
            'menu_class'     => 'footer-menu',
            'container'      => 'ul',
        ));
        ?>
    </nav>
    <?php get_template_part('template-parts/contact-modal'); ?>
</footer>
<?php wp_footer(); ?>
</body>
</html>