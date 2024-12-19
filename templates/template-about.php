<?php
/*
Template Name: About Us
*/
get_header(); ?>

<div class="bg-primary min-h-[150px] w-full flex justify-center items-center text-white text-center">
    <h1 class="font-bold text-white"><?php echo get_the_title() ?></h1>
</div>

<main class="wrap mx-auto py-8">
    <div class="content">
        <?php the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>