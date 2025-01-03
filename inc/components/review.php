<?php
/**
 * Generates a client review card with specified properties.
 * 
 * @param int|float $rating The 1-5 value from the reviewer (default is 1).
 * @param string $desc The text for the client testimonial (default is a sample testimonial).
 * @param string $src The URL to display the client image (default is a placeholder).
 * @param string $alt The alt text for the client image (default is "Client Name").
 * @param string $name The name of the client (default is "Client Name").
 * @param string $title The title (and optional company name) of the client (default is "CEO, Company Name").
 * @param string $custom_classes Additional custom classes to apply to the review (default is an empty string).
 * @return string The generated HTML for the review.
 */
function review( $rating=5, $desc="We hired Larry, and the rest is history! Thank you!", $src="https://via.placeholder.com/48", $alt="Client Name", $name="Client Name", $title="CEO, Company Name", $custom_classes="") {
    
    // Ensure the rating is an integer within the range [1-5]
    $rounded = max(1, min(5, round($rating)));
    // Repeat the number of ratings to get the number of ★'s
    $result = str_repeat('<span class="star"></span>', $rounded);
    // Add empty stars if you want to display a total of 5 stars
    $result .= str_repeat('<span class="star-outline"></span>', 5 - $rounded);

    return '
        <div class="bg-white overflow-hidden flex flex-col justify-between items-stretch border border-primary gap-[24px] p-[32px] ' . htmlspecialchars($custom_classes) . '">
            <!-- Star Rating Section -->
            <div>
                <span class="text-black-500 text-[32px] flex gap-1">' . $result . '</span>
            </div>
            <!-- Testimonial Section -->
            <div class="text-[18px] leading-[28px] not-italic font-normal"> 
                <p>' . htmlspecialchars($desc) . '</p>
            </div>
            <!-- Client Info Section -->
            <div class="flex items-center gap-4 "> 
                <img class="w-12 h-12 rounded-full mr-4" src="'. htmlspecialchars($src) .'" alt="' . htmlspecialchars($alt) . '" role="img">
                <div>
                    <p class="font-semibold">'. htmlspecialchars($name) .'</p>
                    <p>'. htmlspecialchars($title) .'</p>
                </div>
            </div>
        </div>
    ';
}