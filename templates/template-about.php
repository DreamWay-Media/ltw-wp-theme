<?php
/*
Template Name: About Us
*/
get_header(); ?>

<div class="bg-primary min-h-[120px] w-full flex justify-center items-center text-white text-center lg:min-h-[191px]">
    <h1 class="text-white leading-[normal] font-normal not-italic"><?php echo get_the_title() ?></h1>
</div>

<main class="wrap pt-[32px] pb-[64px] lg:pt-[100px] lg:pb-[100px]">
    <div class="content">
        <?php the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>