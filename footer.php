<footer class="bg-gray-900 p-4 text-white text-center">
        <nav class="footer-navigation">
            <?php
            if (has_nav_menu('footer')) {
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'flex space-x-4 justify-center',
                ));
            } else {
                echo '<ul class="flex space-x-4 justify-center">';
                echo '<li><a href="#">Privacy Policy</a></li>';
                echo '<li><a href="#">Terms of Service</a></li>';
                echo '</ul>';
            }
            ?>
        </nav>
        <p>&copy; <?php echo date('Y'); ?> - <?php bloginfo('name'); ?>. All rights reserved.</p>
        <?php wp_footer(); ?>
    </footer>
</body>
</html>
