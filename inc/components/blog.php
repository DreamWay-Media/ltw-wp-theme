<?php

/**
 * Generates an HTML button with specified properties.
 *
 * @param int|null $post_id The ID of the post.
 * @param string $title The title of the blog post.
 * @param string|null $uploadDate The date for the blog post.
 * @param string $author The name of the author.
 * @param string $desc The introductory text of the blog card.
 * @param string $href The link to the full blog post.
 * @param string $custom_classes Additional custom classes to apply to the blog card.
 * @return string The generated blog card.
 */
function blog($post_id = null, $title = "Title", $uploadDate = null, $author = "Jane Doe", $desc = "More blogs are on the way!", $href = "#", $custom_classes = "")
{
    // Accepts the $desc parameter and will truncate to 100 characters and add an ellipsis.
    if (strlen($desc) > 100) {
        $desc = substr($desc, 0, 100) . '...';
    }

    // Set default date if not provided
    if (is_null($uploadDate)) {
        $uploadDate = date('d M Y');
    }

    // Use $post_id to get the $src and $alt text
    if (!is_null($post_id)) {
        $thumbnail_id = get_post_thumbnail_id($post_id);
        $src = get_the_post_thumbnail_url($post_id, 'full');
        $srcset = wp_get_attachment_image_srcset($thumbnail_id);
        $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
    } else {
        $src = "https://via.placeholder.com/400x300";
        $srcset = $src . " 400w, " . str_replace("400x300", "800x600", $src) . " 800w";
        $alt = "Image";
    }

    return '
        <div class="flex justify-center items-center px-6 bg-white' . esc_attr($custom_classes) . '">
            <div class="w-96 bg-white"> 
                <a href="' . esc_url($href) . '">
                    <div class="h-64 bg-gray-200 relative overflow-hidden">
                        <img 
                            src="' . esc_url($src) . '" 
                            srcset="' . esc_url($srcset) . '" 
                            alt="' . esc_html($alt) . '" 
                            class="inset-0 w-full h-full object-cover" />
                    </div>
                </a>
                <div class="p-4">
                    <h2 class="text-xl font-normal text-gray-800 mb-2">' . esc_html($title) . '</h2>
                    <div class="flex justify-between text-gray-600 mb-2">
                        <div class="flex justify-center items-center">
                            <span class="calender-outline"></span> <p>' . esc_html($uploadDate) . '</p>
                        </div>
                        <div class="flex justify-center items-center break-words">
                            <span class="user"></span> <p class="text-right">' . esc_html($author) . '</p>
                        </div>
                    </div>
                    <p class="mb-2 overflow-hidden max-h-[72px] leading-[20px] line-clamp-3">' . esc_html($desc) . '</p>
                    <a href="' . esc_url($href) . '" class="text-black font-bold hover:text-tertiary transition duration-300" role="button">Read More <span class="text-2xl">»</span></a>
                </div>
            </div> 
        </div>
    ';
}
