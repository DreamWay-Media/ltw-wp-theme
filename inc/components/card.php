<?php
/**
 * Generates a card with an image, title, and description.
 * 
 * @param string $src The src attribute for the image (default is a placeholder).
 * @param string $alt The alt text for the image (default is "Image").
 * @param string $href The link to the project details page (default is "/").
 * @param string $intro The intro text for the card (default is "Intro text").
 * @param string $title The title of the card (default is "Title").
 * @param string $desc The description for the card (default is a sample description).
 * @param string $custom_classes Additional custom classes to apply to the card (default is an empty string).
 * @return string The HTML for the card.
 */
function card($src="https://via.placeholder.com/400x300", $alt="Image", $href="/", $intro="Intro text", $title="Title", $desc="This is a small description that provides more details about the card's content and purpose, keeping it concise and informative.", $custom_classes="") {
    
    return '
        <div class="w-full h-full bg-white'. htmlspecialchars($custom_classes) .'">
            <a href="'.htmlspecialchars($href).'">
                <div class="w-full min-h-[240px;] aspect-[4/3] bg-gray-200 relative object-cover overflow-hidden">
                    <img src="'.htmlspecialchars($src).'" alt="'.htmlspecialchars($alt).'" class="absolute inset-0 w-full h-full object-cover" role="img" />
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