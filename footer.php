<footer class="bg-primary text-white text-center px-16">
    <div class="bg-primary p-8 mb-8 text-white text-center grid grid-cols-[1.5fr_1fr_1fr]">
        <!-- logo -->
        <div class="site-logo w-40 h-40 place-self-center col-span-1">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-2xl font-bold col-span-1">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
        </div>
        <!-- logo -->
        <!-- footer navigation -->
        <div class="flex flex-col gap-4 text-start col-span-1">
            <h3 class="text-xl">Quick Links</h3>
            <nav class="footer-navigation">
                <?php
                class My_Custom_Walker_Nav_Menu extends Walker_Nav_Menu
                {
                    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
                    {
                        $classes = empty($item->classes) ? array() : (array) $item->classes;
                        $classes[] = 'my-2 text-sm'; // Add your custom class here

                        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
                        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

                        $output .= '<li' . $class_names . '>';
                        $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
                    }
                }

                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'inline-grid grid-cols-2 justify-items-start',
                        'walker'         => new My_Custom_Walker_Nav_Menu(),
                    ));
                } else {
                    echo '<ul class="flex space-x-4 justify-center">';
                    echo '<li><a href="#">Privacy Policy</a></li>';
                    echo '<li><a href="#">Terms of Service</a></li>';
                    echo '</ul>';
                }
                ?>
            </nav>
        </div>
        <!-- footer navigation -->
        <!-- footer top bar -->
        <div class="flex flex-col gap-4 text-start col-span-1">
            <h3 class="text-xl">Contact</h3>
            <div class="footer-top-bar grid grid-cols-1 justify-items-start gap-4">
                <div>
                    <p>INSERT PHONE NUMBER HERE</p>
                    <p>INSERT EMAIL ADDRESS HERE</p>
                </div>
                <div>
                    <p>TWITTER FACEBOOK LINKEDIN INSTAGRAM</p>
                </div>
            </div>
        </div>
        <!-- footer top bar -->
    </div>
    <div class="bg-primary py-4 text-white flex justify-between place-items-center border-t border-t-white">
        <p>&copy; <?php echo date('Y'); ?> - <?php bloginfo('name'); ?>. All rights reserved.</p>
        <div class="flex flex-row gap-2">
            <p class="text-xs">Privacy Policy</p>
            <p class="text-xs">Cookies Settings</p>
            <p class="text-xs">Terms of Service</p>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
</body>

</html>