<!-- Contact Form -->
<?php
$image_id = 124;
$image_url = wp_get_attachment_url($image_id);
?>
<div id="contact-us-form" class="sm:px-16 bg-secondary min-h-[500px] flex flex-col justify-start items-center bg-no-repeat bg-right-bottom" style="background-image:url(<?php echo esc_url($image_url); ?>);">
    <section class="w-full max-w-4xl">
        <h2 class="mx-auto text-center my-8">Get a Schedule</h2>
        <!-- Embed Contact Form -->
        <div>
            <?php echo do_shortcode('[contact-form-7 id="2526bbf" title="Contact Us" html_id="contact-us-form" html_class="contact-us-form"]'); ?>
        </div>
    </section>
</div>
<!-- Contact Form -->



<footer class="bg-primary text-white wrap">
    <div class="wrap md:content md:items-start md:gap-4 gap-12 bg-primary py-20 text-white">
        <!-- logo -->
        <div class="site-logo self-center brightness-[5] ml-12 sm:ml-0">
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
        <div class="flex flex-col gap-8">
            <h4>Quick Links</h4>
            <nav class="footer-navigation">
                <?php
                class My_Custom_Walker_Nav_Menu extends Walker_Nav_Menu
                {
                    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
                    {
                        $classes = empty($item->classes) ? array() : (array) $item->classes;
                        $classes[] = 'my-2'; // Add your custom class here

                        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
                        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

                        $output .= '<li' . $class_names . '>';
                        $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
                    }
                }

                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'inline-grid grid-cols-1 place-items-center md:grid-cols-2 md:place-items-start w-full',
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
        <div class="flex flex-col md:items-start gap-8">
            <h4>Contact Info</h4>
            <div class="footer-top-bar flex flex-col gap-4 justity-center items-center break-all md:items-start">
                <?php if (is_active_sidebar('footer-top')) : ?>
                    <aside>
                        <?php dynamic_sidebar('footer-top'); ?>
                    </aside>
                <?php endif; ?>
                <?php if (is_active_sidebar('top-bar-right')) : ?>
                    <aside>
                        <?php dynamic_sidebar('top-bar-right'); ?>
                    </aside>
                <?php endif; ?>
            </div>
        </div>

        <!-- footer top bar -->
    </div>
    <div class="content">
        <div class="content bg-primary py-4 text-white grid grid-rows-2 gap-4 sm:flex sm:justify-between text-center place-items-center border-t border-t-white">
            <p class="row-start-2">&copy; <?php echo date('Y'); ?> - <?php bloginfo('name'); ?>. All rights reserved.</p>
            <div class="row-start-1 flex flex-row gap-2">
                <p class="text-xs">Privacy Policy</p>
                <p class="text-xs">Terms of Service</p>
            </div>
        </div>
    </div>
    <?php wp_footer(); ?>
</footer>

<script>
    var swiper = new Swiper('.testimonial-swiper-container', {
        slidesPerView: 1, // How many slides to show at once
        spaceBetween: 5000, // Space between slides
        navigation: {
            nextEl: '.testimonial-swiper-button-next', // Next button
            prevEl: '.testimonial-swiper-button-prev', // Previous button
        },
        pagination: {
            el: '.testimonial-swiper-pagination', // Pagination dots
            clickable: true, // Make dots clickable
        },
        loop: true, // Loop back to the first slide after the last
        autoplay: {
            delay: 12000, // Autoplay every 12 seconds
        },
    });

    var swiper = new Swiper('.client-swiper-container', {
        slidesPerView: 2,
        spaceBetween: 4,
        navigation: {
            nextEl: '.client-swiper-button-next',
            prevEl: '.client-swiper-button-prev',
        },
        pagination: {
            el: '.client-swiper-pagination',
            clickable: true,
        },
        loop: true,
        autoplay: {
            delay: 6000,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 4,
            },
        },
    });
</script>
</body>

</html>