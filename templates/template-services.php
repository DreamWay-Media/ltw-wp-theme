<?php
/*
Template Name: Services
*/
get_header(); ?>

<div class="bg-primary min-h-[120px] w-full flex justify-center items-center text-white text-center lg:min-h-[191px]">
    <h1 class="text-white leading-[normal] font-normal not-italic"><?php echo get_the_title() ?></h1>
</div>

<main>
    <div class="wrap pt-[42px] pb-[68px] lg:pt-[80px] lg:pb-[124px]">
        <div class="content">
            <?php the_content(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>