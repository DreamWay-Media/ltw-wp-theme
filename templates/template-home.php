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
                if($hero_background['url']) {
                    $hero_url = $hero_background['url'];
                } else {
                    $hero_url = 'Image';
                }
                if($hero_background['alt']) {
                    $hero_alt = $hero_background['alt'];
                } else {
                    $hero_alt = 'Image';
                }
            endif;
            $hero_cta_button = get_field('hero_cta_button');
            ?>
            <section class="wrap w-full h-full relative">
                <img class="w-full max-w-[1440px] shrink-0 xl:pl-24 " src="<?php echo esc_url($hero_url); ?>" />
                <div class="hidden xl:wrap xl:absolute xl:left-0 xl:top-0 xl:min-w-full xl:min-h-full xl:max-w-[1440px] xl:bg-white-to-transparent">
                    <div class="content">
                        <div class="flex flex-col items-start gap-6 max-w-[534px]">
                            <h1 class="max-w-[500px]"><?php echo wp_kses_post($hero_main_message); ?></h1>
                            <p class="max-w-[450px]"><?php echo esc_html($hero_sub_message); ?></p>
                            <a href="#contact-us-form" class="ltw-btn"><?php echo esc_html($hero_cta_button); ?><span class="right-arrow"></span></a>
                        </div>
                    </div>
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
    <section class="overflow-x-hidden ">
        <?php
        $testimonials_heading = get_field('testimonials_heading');
        function get_star_rating($rating)
        {
            $stars = str_repeat('<span class="star"></span>', $rating);
            $stars .= str_repeat('<span class="star-outline"></span>', 5 - $rating);
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
            <div class="wrap bg-primary text-white flex-col py-[57px] lg:pt-[111px] lg:pb-[100px]">
                <h2 class="my-8 self-center"><?php echo esc_html($testimonials_heading); ?></h2>
                <div class="content grid grid-cols-4 grid-rows-[auto_auto] lg:flex">
                    <!-- Left button (Previous) -->
                    <button id="testimonial-left-button" class="testimonial-swiper-button-prev left-circle row-start-2 col-start-2 col-span-1"></button>

                    <div id="testimonial-swiper-container" class="testimonial-swiper-container row-start-1 col-start-1 col-span-4 overflow-x-hidden text-center xl:content">
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
                                    <div class="flex flex-col justify-center items-center gap-[32px]">
                                        <div class="mb-2">
                                            <span class="flex justify-center items-center text-[32px] gap-1"><?php echo get_star_rating($client_rating); ?></span>
                                        </div>
                                        <p class="max-w-[862px] leading-7"><?php echo esc_html($client_review); ?></p>
                                        <div class="flex justify-center items-center mt-4">
                                            <img class="w-12 h-12 rounded-full mr-4" src="<?php echo esc_html($image_url); ?>" alt="<?php echo esc_html($image_alt); ?>" role="img">
                                            <div class="flex flex-col items-start">
                                                <p class="text-[19px] leading-[30px]"><?php echo esc_html($client_name); ?></p>
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
                    <button id="testimonial-right-button" class="testimonial-swiper-button-next right-circle row-start-2 row-span-1 col-start-3 col-span-1"></button>
                </div>
                <?php $testimonials_cta_button = get_field('testimonials_cta_button'); ?>
                <a href="/testimonials" class="self-center ltw-btn-light justify-center items-center my-8"><?php echo esc_html($testimonials_cta_button); ?><span class="right-arrow"></span></a>
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
        <div class="wrap flex-col pt-[37px] pb-[46px] lg:pt-[70px] lg:pb-[112px]">
            <?php $our_clients_heading = get_field('our_clients_heading'); ?>
            <h2 class="my-8 self-center"><?php echo esc_html($our_clients_heading); ?></h2>
            <div class="content grid grid-cols-4 grid-rows-[auto_auto] lg:flex">
                <!-- Left button (Previous) -->
                <button id="client-left-button" class="client-swiper-button-prev left-circle-black row-start-2 col-start-2 col-span-1"></button>

                <div id="client-swiper-container" class="client-swiper-container row-start-1 col-start-1 col-span-4 overflow-x-hidden text-center xl:content text-[35px]">
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
                <button id="client-right-button" class="client-swiper-button-next right-circle-black row-start-2 row-span-1 col-start-3 col-span-1"></button>
            </div>
        </div>
    </section>
    <!-- Clients Section -->


</main>

<?php get_footer() ?>