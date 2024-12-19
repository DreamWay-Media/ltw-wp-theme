<?php
/*
Template Name: Services
*/
get_header(); ?>

<div class="bg-primary min-h-[150px] w-full flex justify-center items-center text-white text-center">
    <h1 class="font-bold text-white"><?php echo get_the_title() ?></h1>
</div>

<main>
    <div class="wrap">
        <div class="w-full px-[3.5%] lg:px-[10%]">
            <?php the_content(); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>