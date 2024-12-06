<?php get_header(); ?>


<div class="bg-primary min-h-[150px] w-full flex justify-center items-center text-white text-center">
    <h1><?php the_title(); ?></h1>
</div>

<div class="container mx-auto px-16 py-8">
    <!-- Main Content Area -->
    <main class="w-full p-4">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="single-post-content mb-8">
                    <!-- Post Thumbnail (if available) -->
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail mb-6 flex justify-center items-center flex-col w-full h-auto object-contain">
                            <?php the_post_thumbnail('large', ['class' => 'inset-0 w-full h-full object-contain']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <aside>
                        <p class="text-xs">Published on <?php echo get_the_date(); ?> by <?php echo get_the_author(); ?></p>
                        <br></br>
                    </aside>

                    <!-- Post Content -->
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                    

                    <!-- Post Navigation -->
                    <nav class="post-navigation my-8 flex justify-around items-center w-full">
                        <div class="prev-post">
                            <?php previous_post_link('<span class="text-blue-500 hover:underline">&larr; %link</span>'); ?>
                        </div>
                        <div class="next-post">
                            <?php next_post_link('<span class="text-blue-500 hover:underline">%link &rarr;</span>'); ?>
                        </div>
                    </nav>
                </article>
        <?php endwhile;
        endif; ?>
    </main>
</div>

<?php get_footer(); ?>