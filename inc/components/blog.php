<?php
/**
 * Generates an HTML button with specified properties.
 *
 * @param string $src The url to display on the blog.
 * @param string $alt The alt text for the <img> tag.
 * @param string $title The title of the blog post.
 * @param string|null $uploadDate The date for the blog post.
 * @param string $author The name of the author.
 * @param string $desc The introductory text of the blog card.
 * @param string $href The link to the full blog post.
 * @param string $custom_classes Additional custom classes to apply to the blog card.
 * @return string The generated blog card.
 */
function blog( $src="https://via.placeholder.com/400x300" , $alt="Image" , $title="Title", $uploadDate=null, $author="Jane Doe" , $desc="More blogs are on the way!", $href="#", $custom_classes="") {
    
    // Set default date if not provided
    if (is_null($uploadDate)) {
        $uploadDate = date('F j, Y');
    }

    return '
        <div class="flex justify-center items-center px-6 bg-white">
            <div class="w-80 h-[400px] border border-gray-300 bg-white shadow-lg rounded-lg ' . htmlspecialchars($custom_classes) . '"> 
                <div class="h-48 bg-gray-200 rounded-t-lg relative overflow-hidden">
                    <img 
                        src="' . htmlspecialchars($src) . '" 
                        alt="' . htmlspecialchars($alt) . '" 
                        class="absolute inset-0 w-full h-full object-cover" />
                </div>
                <div class="p-4">
                    <h4 class="text-xl font-normal text-gray-800 mb-2">' . htmlspecialchars($title) . '</h4>
                    <div class="flex justify-between text-gray-600 text-sm mb-2">
                        <p>' . $uploadDate . '</p>
                        <p class="text-right">' . htmlspecialchars($author) . '</p>
                    </div>
                    <p class="text-gray-700 text-sm mb-2 overflow-hidden" style="max-height: 4.5rem; line-height: 1.25; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;"> 
                        ' . htmlspecialchars($desc) . '
                    </p> 
                    <a href="' . htmlspecialchars($href) . '" class="text-black font-bold text-sm hover:text-black" role="button">Read More</a>
                </div>
            </div>
        </div>
    ';
}
