<?php
/*
Template Name: Portfolio
*/
get_header(); ?>


<div class="bg-primary min-h-[150px] w-full flex justify-center items-center text-white text-center">
    <h1 class="font-bold text-white">Portfolio</h1>
</div>
<main class="container mx-auto pb-8 px-8 md:px-16">
    <?php
    // Elementor
    the_content();

    // Get the selected service(taxonomy) from URL
    $selected_service = isset($_GET['service']) ? $_GET['service'] : '';

    // Projects
    require_once get_template_directory() . '/inc/components/card.php';
    $args = array(
        'post_type'         => 'projects',
        'order'             => 'ASC',
        'posts_per_page'    => -1,
    );

    if ($selected_service) {
        $args['tax_query'] = array(
            array(
                'taxonomy'  => 'project-category',
                'field'     => 'id',
                'terms'     => $selected_service,
            ),
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
    ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php 
        while ($query->have_posts()) : $query->the_post();
        // Gather custom fields to display
        $project_title = get_field('project_title');
        $project_subtitle = get_field('project_subtitle');
        $project_description = get_field('project_description');
        if (has_post_thumbnail()) {
            $thumbnail_id = get_post_thumbnail_id(get_the_ID());
            $alt_text = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
            $image_url = wp_get_attachment_image_url($thumbnail_id, 'medium');
        } else {
            $thumbnail_id = null;
            $alt_text = "Image";
            $image_url = "https://via.placeholder.com/400x300";
        }
        ?>
        <div>
            <?php
                echo card($image_url, $alt_text, get_the_permalink(), $project_subtitle, $project_title, $project_description, "");
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
