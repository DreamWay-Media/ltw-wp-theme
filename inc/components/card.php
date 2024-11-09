<?php
/**
 * Generates a card with an image, title, and description.
 * 
 * @param string $src The src attribute for the image (default is a placeholder).
 * @param string $alt The alt text for the image (default is "Image").
 * @param string $intro The intro text for the card (default is "Intro text").
 * @param string $title The title of the card (default is "Title").
 * @param string $desc The description for the card (default is a sample description).
 * @param string $custom_classes Additional custom classes to apply to the card (default is an empty string).
 * @return string The HTML for the card.
 */
function card($src="https://via.placeholder.com/400x300", $alt="Image", $intro="Intro text", $title="Title", $desc="This is a small description that provides more details about the card's content and purpose, keeping it concise and informative.", $custom_classes="") {
    
    return '
        <div class="w-80 h-[400px] border border-gray-300 bg-white shadow-lg rounded-lg '. htmlspecialchars($custom_classes) .'">
            <div class="h-48 bg-gray-200 rounded-t-lg relative overflow-hidden">
                <img src="'.htmlspecialchars($src).'" alt="'.htmlspecialchars($alt).'" class="absolute inset-0 w-full h-full object-cover" role="img" />
            </div>
            <div class="p-4">
                <p class="text-gray-600 text-sm mb-1">'.htmlspecialchars($intro).'</p>
                <h4 class="text-xl font-light text-gray-800 mb-2">'.htmlspecialchars($title).'</h4>
                <p class="text-gray-700 text-sm">'.htmlspecialchars($desc).'</p>
            </div>
        </div>
    ';
}