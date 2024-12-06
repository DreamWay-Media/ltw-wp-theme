<?php
/*
Template Name: Blog
*/
get_header(); ?>

<div class="bg-primary min-h-[150px] w-full flex justify-center items-center text-white text-center">
    <h1 class="font-bold text-white">Blog</h1>
</div>

<main class="container mx-auto py-8 px-2 md:py-8 md:px-16">

    <?php the_content(); ?>
</main>

<?php get_footer(); ?>
