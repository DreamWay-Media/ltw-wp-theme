<?php
/*
Template Name: Blog
*/
get_header(); ?>

<div class="bg-primary min-h-[150px] w-full flex justify-center items-center text-white text-center">
    <h1 class="font-bold text-white">Blog</h1>
</div>

<main class="wrap py-8">
    <div class="content gap-5 flex-wrap !justify-around !items-start">
        <?php the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>