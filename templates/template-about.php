<?php
/*
Template Name: About Us
*/
get_header(); ?>

<div class="bg-primary min-h-[150px] w-full flex justify-center items-center text-white text-center">
    <h1 class="font-bold text-white">About</h1>
</div>

<main class="container mx-auto py-8">
    <?php the_content(); ?>
</main>

<?php get_footer(); ?>