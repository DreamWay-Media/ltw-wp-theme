<?php get_header(); ?>

<div class="container mx-auto py-8 flex flex-col md:flex-row">
    <!-- Main Content Area -->
    <main class="w-full md:w-2/3 p-4">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="single-post-content mb-8">
                <header class="post-header mb-4">
                    <h1 class="text-4xl font-bold mb-2"><?php the_title(); ?></h1>
                    <p class="text-gray-600 text-sm">Published on <?php echo get_the_date(); ?> by <?php the_author(); ?></p>
                </header>
                
                <!-- Post Thumbnail (if available) -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail mb-6">
                        <?php the_post_thumbnail('large', ['class' => 'w-full h-auto']); ?>
                    </div>
                <?php endif; ?>

                <!-- Post Content -->
                <div class="content">
                    <?php the_content(); ?>
                </div>

                <!-- Post Meta (Categories, Tags) -->
                <footer class="post-meta mt-6">
                    <div class="post-categories">
                        <strong>Categories:</strong> <?php the_category(', '); ?>
                    </div>
                    <div class="post-tags">
                        <?php if (get_the_tags()) : ?>
                            <strong>Tags:</strong> <?php the_tags('', ', ', ''); ?>
                        <?php endif; ?>
                    </div>
                </footer>

                <!-- Post Navigation -->
                <nav class="post-navigation mt-8">
                    <div class="prev-post">
                        <?php previous_post_link('<span class="text-blue-500 hover:underline">&larr; %link</span>'); ?>
                    </div>
                    <div class="next-post">
                        <?php next_post_link('<span class="text-blue-500 hover:underline">%link &rarr;</span>'); ?>
                    </div>
                </nav>

                <!-- Comments Section -->
                <div class="comments-section mt-8">
                    <?php comments_template(); ?>
                </div>
            </article>
        <?php endwhile; endif; ?>
    </main>
</div>

<?php get_footer(); ?>
