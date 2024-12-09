<?php
/**
 * Generates a card with an image, title, and description.
 * 
 * @param int|null $post_id The ID of the post.
 * @param string $href The link to the project details page (default is "/").
 * @param string $intro The intro text for the card (default is "Intro text").
 * @param string $title The title of the card (default is "Title").
 * @param string $desc The description for the card (default is a sample description).
 * @param string $custom_classes Additional custom classes to apply to the card (default is an empty string).
 * @return string The HTML for the card.
 */
function card($post_id=null, $href="/", $intro="Intro text", $title="Title", $desc="This is a small description that provides more details about the card's content and purpose, keeping it concise and informative.", $custom_classes="") {
    
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
        <div class="w-full h-full bg-white'. htmlspecialchars($custom_classes) .'">
            <a href="'.htmlspecialchars($href).'">
                <div class="w-full min-h-[240px;] aspect-[4/3] bg-gray-200 relative object-cover overflow-hidden">
                    <img 
                        src="' . htmlspecialchars($src) . '" 
                        srcset="' . htmlspecialchars($srcset) . '" 
                        alt="' . htmlspecialchars($alt) . '" 
                        class="inset-0 w-full h-full object-cover" role="img" />
                </div>
            </a>
            <div class="p-1">
                <p class="text-gray-600 mb-1 py-3">'.htmlspecialchars($intro).'</p>
                <a href="'.htmlspecialchars($href).'"><h6 class="font-light text-gray-800 mb-2">'.htmlspecialchars($title).'</h6></a>
                <p class="text-gray-700">'.htmlspecialchars($desc).'</p>
            </div>
        </div>
    ';
}