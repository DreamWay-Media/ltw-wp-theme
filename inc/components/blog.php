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
    function truncateText($text) {
        if (strlen($text) > 100) {
            return substr($text, 0, 100) . '...';
        }
        return $text;
    }

    // Set default date if not provided
    if (is_null($uploadDate)) {
        $uploadDate = date('d M Y');
    }
    
    // Use $post_id to get the $src and $alt text
    if ($post_id) {
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
        <div class="flex justify-center items-center px-6 bg-white">
            <div class="w-96 bg-white ' . htmlspecialchars($custom_classes) . '"> 
                <a href="'. htmlspecialchars($href) .'">
                    <div class="h-64 bg-gray-200 relative overflow-hidden">
                        <img 
                            src="' . htmlspecialchars($src) . '" 
                            srcset="' . htmlspecialchars($srcset) . '" 
                            alt="' . htmlspecialchars($alt) . '" 
                            class="inset-0 w-full h-full object-cover" />
                    </div>
                </a>
                <div class="p-4">
                    <h2 class="text-xl font-normal text-gray-800 mb-2">' . htmlspecialchars($title) . '</h2>
                    <div class="flex justify-between text-gray-600 mb-2">
                        <div class="flex justify-center items-center"><span class="calender-outline"></span><p>' . $uploadDate . '</p></div>
                        <div class="flex justify-center items-center break-words"></p><span class="user"></span><p class="text-right">' . htmlspecialchars($author) . '</div>
                    </div>
                    <p class="mb-2 overflow-hidden max-h-[4.5rem] leading-5 line-clamp-3"> 
                        ' . htmlspecialchars(truncateText($desc)) . '
                    </p>

                    <a href="' . htmlspecialchars($href) . '" class="text-black font-bold hover:text-tertiary transition duration-300" role="button">Read More <span class="text-2xl">»</span></a>
                </div>
            </div> 
        </div>
    ';
}
