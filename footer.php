<!-- Contact Form -->
<div class="px-16 bg-gray-200 h-[700px] flex justify-center items-center">
    <section class="w-full max-w-4xl">
        <div class="flex flex-col justify-center items-center">
            <h2 class="mx-auto mb-6">Title</h2>
            <form class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 w-full">
                <div>
                    <input type="text" id="name" placeholder="Full Name" class="h-14 bg-white shadow-lg border p-2 rounded-md w-full" required />
                </div>
                <div>
                    <input type="email" id="email" placeholder="Email Address" class="h-14 bg-white shadow-lg border p-2 rounded-md w-full" required />
                </div>

                <div>
                    <input type="tel" id="phone" placeholder="Phone No" class="h-14 bg-white shadow-lg border p-2 rounded-md w-full" required />
                </div>
                <div>
                    <input type="date" id="date" placeholder="mm/dd/yyyy" class="h-14 bg-white shadow-lg border p-2 rounded-md w-full" required />
                </div>

                <div class="md:col-span-2">
                    <textarea id="message" rows="4" placeholder="Message" class="h-14 bg-white shadow-lg border p-2 rounded-md w-full max-h-[200px]" required></textarea>
                </div>

                <div class="md:col-span-2">
                    <button type="submit" class="ltw-btn mx-auto mt-4">Submit</button>
                </div>
            </form>
        </div>
    </section>
</div>
<!-- Contact Form -->



<footer class="bg-primary text-white text-center sm:px-16">
    <div class="bg-primary py-8 text-white grid grid-rows-3 sm:grid-rows-none sm:grid-cols-3 sm:items-start gap-4 place-items-center sm:place-items-auto">
        <!-- logo -->
        <div class="site-logo place-self-center col-span-1 max-w-[50%] sm:w-fit sm:h-auto brightness-[5]">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="font-bold col-span-1">
                    <?php bloginfo('name'); ?>
                </a>
            <?php endif; ?>
        </div>
        <!-- logo -->
        <!-- footer navigation -->
        <div class="flex flex-col gap-4 col-span-1 text-center place-items-center sm:place-items-baseline">
            <h6>Quick Links</h6>
            <nav class="footer-navigation">
                <?php
                class My_Custom_Walker_Nav_Menu extends Walker_Nav_Menu
                {
                    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
                    {
                        $classes = empty($item->classes) ? array() : (array) $item->classes;
                        $classes[] = 'my-2 text-center place-self-center sm:text-start sm:place-self-auto'; // Add your custom class here

                        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
                        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

                        $output .= '<li' . $class_names . '>';
                        $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
                    }
                }

                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'inline-grid grid-cols-1 sm:grid-cols-2',
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
        <div class="flex flex-col gap-4 col-span-1 text-center place-items-center sm:place-items-baseline">
            <h6>Contact Info</h6>
            <div class="footer-top-bar grid grid-cols-1 gap-4">
                <div class="text-center place-self-center sm:text-start sm:place-self-auto sm:justify-items-start">
                    <p>INSERT PHONE NUMBER HERE</p>
                    <p>INSERT EMAIL ADDRESS HERE</p>
                </div>
                <div class="text-center place-self-center sm:text-start sm:place-self-auto sm:justify-items-start">
                    <p>TWITTER FACEBOOK LINKEDIN INSTAGRAM</p>
                </div>
            </div>
        </div>

        <!-- footer top bar -->
    </div>
    <div class="bg-primary py-4 text-white grid grid-rows-2 gap-4 sm:flex sm:justify-between text-center place-items-center border-t border-t-white">
        <p class="row-start-2">&copy; <?php echo date('Y'); ?> - <?php bloginfo('name'); ?>. All rights reserved.</p>
        <div class="row-start-1 flex flex-row gap-2">
            <p class="text-xs">Privacy Policy</p>
            <p class="text-xs">Cookies Settings</p>
            <p class="text-xs">Terms of Service</p>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>
</body>

</html>