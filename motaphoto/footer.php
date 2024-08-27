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
    
</footer>
<?php wp_footer(); ?>
</body>
</html>