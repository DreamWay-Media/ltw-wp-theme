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
        <div class="flex justify-center items-center bg-white' . esc_attr($custom_classes) . '">
            <div class="max-w-[366px] bg-white"> 
                <a href="' . esc_url($href) . '">
                    <div class="h-64 bg-gray-200 relative overflow-hidden">
                        <img 
                            src="' . esc_url($src) . '" 
                            srcset="' . esc_attr($srcset) . '" 
                            alt="' . esc_attr($alt) . '" 
                            class="inset-0 w-full h-full object-cover" />
                    </div>
                </a>
                <div class="pt-[24px] px-[30px] pb-[25px] text-[14px]">
                    <h2 class="font-[700] text-[22px] leading-[30px] text-gray-800 font-[Merriweather] pb-[20px]">' . esc_html($title) . '</h2>
                    <div class="w-full inline-flex items-start text-gray-600 gap-[18px] pb-[15px]">
                        <div class="flex justify-center items-center">
                            <span class="calendar-form text-[14px]"></span> <p class="text-[14px]">' . esc_html($uploadDate) . '</p>
                        </div>
                        <div class="flex justify-center items-center break-words text-[14px]">
                            <span class="user text-[14px]"></span> <p class="text-right text-[14px]">' . esc_html($author) . '</p>
                        </div>
                    </div>
                    <p class="mb-2 overflow-hidden max-h-[72px] leading-[20px] line-clamp-3 pb-[10px] text-[14px]">' . esc_html($desc) . '</p>
                    <a href="' . esc_url($href) . '" class="text-black text-[14px] font-bold hover:text-tertiary transition duration-300" role="button">Read More <span class="right-angle text-[14px]"></span></a>
                </div>
            </div> 
        </div>
    ';
}
