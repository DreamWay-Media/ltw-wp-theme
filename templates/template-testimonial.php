<?php
/*
Template Name: Testimonials
*/
get_header(); ?>

<div class="bg-primary h-[150px] w-full flex justify-center items-center">
    <h1 class="font-bold text-white">Testimonials</h1>
</div>

<main class="container mx-auto pb-8 py-8 px-3 md:px-16">
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

    if ($query->have_posts()) :
    ?>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <?php 
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
        <div class="grid-span-1">
            <?php
            echo review($client_rating, $client_review, $image_url, $image_alt, $client_name, $client_company_name, "");
            ?>
        </div>
        <?php 
        endwhile;
        wp_reset_postdata();
        else :
            echo 'No testimonials to display.';
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>