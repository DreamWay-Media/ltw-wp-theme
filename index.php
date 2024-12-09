<?php get_header(); ?>

<div class="bg-primary h-[150px] w-full flex justify-center items-center text-white">
    <h1><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
</div>

<main class="container mx-auto py-8">
    <?php if (have_posts()) : ?>
        <div class="posts-list grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <?php require_once get_template_directory() . '/inc/components/blog.php'; ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post mb-6 col-span-1">
                    <?php
                    if (has_post_thumbnail()) {
                        $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                    }
                    echo blog (
                        get_the_ID(),
                        get_the_title(),
                        get_the_date('d M Y'),
                        get_the_author(),
                        get_the_excerpt(),
                        get_permalink(),
                        ""
                    );
                    ?>
                </article>
            <?php endwhile; ?>
        </div>


        <!-- Pagination -->
        <div class="pagination mt-8">
            <?php
            the_posts_pagination(array(
                'prev_text' => 'Previous',
                'next_text' => 'Next',
            ));
            ?>
        </div>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>