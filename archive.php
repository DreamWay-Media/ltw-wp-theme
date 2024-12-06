<?php get_header(); ?>

<div class="bg-primary h-[150px] w-full flex justify-center items-center text-white">
    <h1>
        <?php
        if (is_tax('project-category')) {
            $term = get_queried_object();
            echo single_term_title('', false);
        } else {
            echo 'Blog';
        }
        ?>
    </h1>
</div>


<main class="container mx-auto py-8">
    <?php if (have_posts()) : ?>
        <div class="posts-list grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <?php require_once get_template_directory() . '/inc/components/card.php'; ?>
            <?php while (have_posts()) : the_post(); ?>
                <article class="post mb-6 col-span-1">
                    <?php
                    echo card(             
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