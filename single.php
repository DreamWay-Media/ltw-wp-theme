<?php get_header(); ?>


<div class="bg-primary min-h-[150px] w-full flex justify-center items-center text-white text-center">
    <h1><?php the_title(); ?></h1>
</div>

<main class="mx-auto px-16 py-8">
    <!-- Main Content Area -->
    <div class="wrap p-4 flex-col">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="single-post-content content mb-8">
                    <!-- Post Thumbnail (if available) -->
                    <?php if (has_post_thumbnail()) :
                        $featured_image_id = get_post_thumbnail_id();
                        $small_image = wp_get_attachment_image_url($featured_image_id, 'thumbnail');
                        $medium_image = wp_get_attachment_image_url($featured_image_id, 'medium');
                        $large_image = wp_get_attachment_image_url($featured_image_id, 'large');
                        $full_image = wp_get_attachment_image_url($featured_image_id, 'full');
                        $image_alt = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);
                    ?>
                        <div class="post-thumbnail mb-6 flex justify-center items-center flex-col w-full h-auto">
                            <img
                                src="<?php echo esc_url($medium_image); ?>"
                                srcset="
                                    <?php echo esc_url($small_image); ?> 500w, 
                                    <?php echo esc_url($medium_image); ?> 800w, 
                                    <?php echo esc_url($large_image); ?> 1200w, 
                                    <?php echo esc_url($full_image); ?> 1600w"
                                sizes="(max-width: 640px) 100vw, (max-width: 768px) 768px, (max-width: 1024px) 1024px, 1600px"
                                alt="<?php echo esc_attr($image_alt); ?>"
                                class="w-full h-auto object-cover"
                                loading="lazy">
                        </div>
                    <?php endif; ?>

                    <aside>
                        <p class="text-xs">
                            Published on <?php echo esc_html(get_the_date()); ?>
                            by <?php echo esc_html(get_the_author()); ?>
                        </p>
                    </aside>

                    <!-- Post Content -->
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </article>

                <!-- Post Navigation -->
                <?php
                $previous = get_previous_post();
                $next = get_next_post();
                if ($previous || $next) : ?>
                    <aside class="content py-[100px] flex flex-col justify-center items-center">
                        <h5>Keep Reading</h5>
                        <nav class="post-navigation my-8 flex justify-around items-center w-full">
                            <?php if ($previous) : ?>
                                <div class="prev-post">
                                    <a href="<?php echo get_permalink($previous->ID); ?>" class="text-[22px] font-bold flex justify-center items-center hover:text-tertiary transition duration-300">
                                        &laquo; <?php echo get_the_title($previous->ID); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($next) : ?>
                                <div class="next-post">
                                    <a href="<?php echo get_permalink($next->ID); ?>" class="text-[22px] font-bold flex justify-center items-center hover:text-tertiary transition duration-300">
                                        <?php echo get_the_title($next->ID); ?> &raquo;
                                    </a>
                                </div>
                            <?php endif; ?>
                        </nav>
                    </aside>
                <?php endif; ?>
        <?php endwhile;
        endif; ?>
    </div>
</main>


<?php get_footer(); ?>