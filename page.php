<?php get_header(); ?>

<div class="container mx-auto py-8 flex flex-col md:flex-row">
    <!-- Main Content Area -->
    <main class="w-full md:w-2/3 p-4">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="page-content mb-8">
                <h1 class="mb-4"><?php the_title(); ?></h1>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </main>
</div>

<?php get_footer(); ?>
