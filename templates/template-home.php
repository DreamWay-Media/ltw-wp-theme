<?php
/*
Template Name: Home Page
*/
get_header();
?>
<main>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <!-- Hero Section -->
            <?php get_template_part('../inc/components/button'); ?>
            <?php
            $hero_background = get_field('hero_background');
            $hero_main_message = get_field('hero_main_message');
            $hero_sub_message = get_field('hero_sub_message');
            if ($hero_background):
                $hero_url = $hero_background['url'];
                $hero_alt = $hero_background['alt'];
            endif;
            ?>
            <section class="hero w-full overflow-hidden relative">
                <img class="w-full h-full object-contain" src="<?php echo esc_url($hero_url); ?>" />
                <div class="hidden md:overlay md:pl-16 md:pr-[15%] md:gap-8 md:absolute md:top-0 md:left-0 md:w-1/2 md:h-full md:bg-white-to-transparent md:flex md:flex-col md:justify-center">
                    <h1 class="md:text-3xl lg:text-6xl"><?php echo esc_html($hero_main_message); ?></h1>
                    <p class="md:text-base lg:text-xl"><?php echo esc_html($hero_sub_message); ?></p>
                    <a href="/" class="ltw_btn ml-[unset]">Let's get Started. -></a>
                </div>
            </section>
            <!-- Hero Section -->
             <!-- Main Content Section -->
            <section class="main-content">
                <?php the_content(); ?>
            </section>
            <!-- Main Content Section -->
            <!-- FOE Section -->
            <section></section>
            <!-- FOE Section -->
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer() ?>