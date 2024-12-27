<?php
/*
Template Name: Testimonials
*/
get_header(); ?>

<div class="bg-primary min-h-[120px] w-full flex justify-center items-center text-white text-center lg:min-h-[191px]">
    <h1 class="text-white leading-[normal] font-normal not-italic"><?php echo get_the_title() ?></h1>
</div>

<main class="wrap flex-col justify-center items-center pt-[42px] pb-[72px] lg:pt-[75px] lg:pb-[90px]">
    <div class="content">
        <?php
        // Elementor
        the_content();
        // Testimonials
        require_once get_template_directory() . '/inc/components/review.php';
        $args = array(
            'post_type' => 'reviews',
            'posts_per_page' => -1,
        );
        $query = new WP_Query($args);
        ?>
        <div class="grid grid-cols-1 gap-[15px] lg:grid-cols-2">
        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                // Gather custom fields to display
                $client_name = get_field('client_name');
                $client_company_name = get_field('client_company_name');
                $client_image = get_field('client_image');
                if ($client_image) {
                    $image_url = $client_image['url'];
                    $image_alt = $client_image['alt'];
                    $image_id = $client_image['id'];
                } else {
                    // Use a placeholder if the image doesn't exist
                    $image_url = "https://via.placeholder.com/48";
                    $image_alt = $client_name;
                }
                $client_rating = get_field('client_rating');
                $client_review = get_field('client_review');
        ?>
                    <?php
                    echo review($client_rating, $client_review, $image_url, $image_alt, $client_name, $client_company_name, "");
                    ?>
        <?php
            endwhile;
            wp_reset_postdata();
        ?>
        </div>
        <?php
        else :
            echo 'No testimonials to display.';
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>