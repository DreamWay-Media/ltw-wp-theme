<?php
/*
Template Name: Home Page
*/
get_header();
?>
<main>
    <!-- Hero Section -->
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('../inc/components/button'); ?>
            <?php
            $hero_background = get_field('hero_background');
            $hero_main_message = get_field('hero_main_message');
            $hero_sub_message = get_field('hero_sub_message');
            if ($hero_background):
                $hero_url = $hero_background['url'];
                $hero_alt = $hero_background['alt'];
            endif;
            $hero_cta_button = get_field('hero_cta_button');
            ?>
            <section class="hero w-full h-full relative">
                <img class="w-full h-full object-contain" src="<?php echo esc_url($hero_url); ?>" />
                <div class="hidden md:overlay md:pl-8 md:pr-[12%] md:gap-4 md:absolute md:top-0 md:left-0 md:w-1/2 md:h-full md:bg-white-to-transparent md:flex md:flex-col md:justify-center lg:gap-6">
                    <h1><?php echo wp_kses_post($hero_main_message); ?></h1>
                    <p><?php echo esc_html($hero_sub_message); ?></p>
                    <a href="#contact-us-form" class="ltw-btn ml-0 place-items-center"><?php echo esc_html($hero_cta_button); ?><span class="arrow-right"></span></a>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <!-- Hero Section -->
    <!-- Main Content Section -->
    <section class="main-content">
        <?php the_content(); ?>
    </section>
    <!-- Main Content Section -->
    <!-- Testimonials Section -->
<section class="overflow-x-hidden">
    <?php
    $testimonials_heading = get_field('testimonials_heading');
    function get_star_rating($rating) {
    $stars = str_repeat("★", $rating);
    $stars .= str_repeat("☆", 5 - $rating);
    return $stars;
    }
    ?>
    <?php
    $args = array(
        'post_type' => 'reviews',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
    ?>
    <div class="flex flex-col bg-primary text-white">
        <h2 class="my-8 self-center"><?php echo esc_html($testimonials_heading); ?></h2>
        <div class="grid grid-cols-4 grid-rows-[auto_auto] lg:flex lg:flex-row lg:items-center lg:w-[85vw] my-0 mx-auto">
            <!-- Left button (Previous) -->
            <button id="testimonial-left-button" class="testimonial-swiper-button-prev arrow-left-circle row-start-2 row-span-1 col-start-2 col-span-1"></button>
        
        <div id="testimonial-swiper-container" class="testimonial-swiper-container row-start-1 row-span-1 col-span-4 w-[90vw] overflow-x-hidden lg:w-[65vw] my-0 mx-auto text-center">
            <!-- Swiper Wrapper -->
            <div id="testimonial-swiper-wrapper" class="swiper-wrapper">
                <?php
                while ($query->have_posts()) : $query->the_post();
                    // Gather custom fields to display
                    $client_name = get_field('client_name');
                    $client_company_name = get_field('client_company_name');
                    $client_image = get_field('client_image');
                    $client_rating = get_field('client_rating');
                    $client_review = get_field('client_review');
                    if ($client_image) {
                        $image_url = $client_image['url'];
                        $image_alt = $client_image['alt'];
                    } else {
                        $image_url = "https://via.placeholder.com/48";
                        $image_alt = $client_name;
                    }
                ?>
                <div id="testimonial-swiper-slide" class="swiper-slide transition-transform transform">
                    <div>
                        <div class="mb-2">
                            <span class="text-[32px]"><?php echo get_star_rating($client_rating); ?></span>
                        </div>
                        <p class="leading-7"><?php echo esc_html($client_review); ?></p>
                        <div class="flex justify-center items-center mt-4"> 
                            <img class="w-12 h-12 rounded-full mr-4" src="<?php echo esc_html($image_url); ?>" alt="<?php echo esc_html($image_alt); ?>" role="img">
                            <div>
                                <p class="font-semibold"><?php echo esc_html($client_name); ?></p>
                                <p><?php echo esc_html($client_company_name); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <!-- Swiper Wrapper -->
        </div>
            <!-- Right button (Next) -->
            <button id="testimonial-right-button"class="testimonial-swiper-button-next arrow-right-circle row-start-2 row-span-1 col-start-3 col-span-1"></button>
        </div>
        <?php $testimonials_cta_button = get_field('testimonials_cta_button'); ?>
        <a href="/testimonials" class="self-center ltw-btn-light justify-center items-center my-8"><?php echo esc_html($testimonials_cta_button); ?><span class="arrow-right"></span></a>
    </div>
    <?php
    else :
        echo 'No testimonials to display.';
    endif;
    ?>
</section>
<!-- Testimonials Section -->
<!-- Clients Section -->
<section class="overflow-x-hidden">
    <div class="flex flex-col">
        <?php $our_clients_heading = get_field('our_clients_heading'); ?>
        <h2 class="my-8 self-center"><?php echo esc_html($our_clients_heading); ?></h2>
        <div class="grid grid-cols-4 grid-rows-[auto_auto] lg:flex lg:flex-row lg:items-center lg:w-[85vw] my-0 mx-auto">
            <!-- Left button (Previous) -->
            <button id="client-left-button" class="client-swiper-button-prev arrow-left-circle row-start-2 row-span-1 col-start-2 col-span-1"></button>
        
            <div id="client-swiper-container" class="client-swiper-container row-start-1 row-span-1 col-span-4 w-[90vw] overflow-x-hidden lg:w-[65vw] my-0 mx-auto text-center">
                <!-- Swiper Wrapper -->
                <div id="client-swiper-wrapper" class="swiper-wrapper">
                    <div id="client-swiper-slide" class="swiper-slide transition-transform transform">
                        <span class="city-of-hope"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span></span>
                    </div>
                    <div id="client-swiper-slide" class="swiper-slide transition-transform transform">
                        <span class="tx-one"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span><span class="path18"></span><span class="path19"></span><span class="path20"></span></span>
                    </div>
                    <div id="client-swiper-slide" class="swiper-slide transition-transform transform">
                        <span class="docusign"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span></span>
                    </div>
                    <div id="client-swiper-slide" class="swiper-slide transition-transform transform">
                        <span class="macy"><span class="path1"></span><span class="path2"></span></span>
                    </div>
                </div>
                <!-- Swiper Wrapper -->
            </div>
            <!-- Right button (Next) -->
            <button id="client-right-button" class="client-swiper-button-next arrow-right-circle row-start-2 row-span-1 col-start-3 col-span-1"></button>
        </div>
    </div>
</section>
<!-- Clients Section -->


</main>

<?php get_footer() ?>