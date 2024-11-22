<?php
/*
Template Name: Portfolio
*/
get_header(); ?>


<div class="bg-primary h-[150px] w-full flex justify-center items-center">
    <h1 class="font-bold text-white">Portfolio</h1>
</div>
<main class="container mx-auto pb-8 px-8 md:px-16">
    <?php
    // Elementor
    the_content();
    // Projects
    require_once get_template_directory() . '/inc/components/card.php';
    $args = array(
        'post_type' => 'projects',
        'posts_per_page' => -1,
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) :
    ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php 
        while ($query->have_posts()) : $query->the_post();
        // Gather custom fields to display
        $project_title = get_field('project_title');
        $project_subtitle = get_field('project_subtitle');
        $project_image = get_field('project_image');
        if ($project_image) {
            $image_url = $project_image['url'];
            $image_alt = $project_image['alt'];
            $image_id = $project_image['id'];
        } else {
            // Use a placeholder if the image doesn't exist
            $image_url = "https://via.placeholder.com/48"; 
            $image_alt = $project_subtitle; 
        }
        $project_description = get_field('project_description');
        ?>
        <div>
            <?php
                echo card($image_url, $image_alt, $project_subtitle, $project_title, $project_description, "");
            ?>
        </div>
        <?php 
        endwhile;
        wp_reset_postdata();
        else :
            echo 'No projects to display.';
        endif;
        ?>
    </div>
</main>

<?php get_footer(); ?>
