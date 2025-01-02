<?php get_header(); ?>

<div class="bg-primary min-h-[120px] w-full flex justify-center items-center text-white text-center lg:min-h-[191px]">
    <h1 class="text-white leading-[normal] font-normal not-italic"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
</div>

<main class="wrap">
    <div class="content flex-col">
        <div class="pt-[42px] pb-[28px] md:pt-[84px] md:pb-[72px]">
            <h2 class="font-normal not-italic leading-[normal] text-center">
                Latest News
            </h2>
        </div>
        <?php require_once get_template_directory() . '/inc/components/blog.php'; ?>
        <?php if (have_posts()) : ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="post mb-6 col-span-1">
                        <?php
                        $id = get_the_ID();
                        $title = get_the_title();
                        $date = get_the_date('d M Y');
                        $author = get_the_author();
                        $excerpt = get_the_excerpt();
                        $link = get_the_permalink();
                        echo blog($id, $title, $date, $author, $excerpt, $link, "");
                        ?>
                    </article>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        <?php else : ?>
            <p>No posts found.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>