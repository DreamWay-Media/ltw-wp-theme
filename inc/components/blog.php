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
function blog($src = "https://via.placeholder.com/400x300", $alt = "Image", $title = "Title", $uploadDate = null, $author = "Jane Doe", $desc = "More blogs are on the way!", $href = "#", $custom_classes = "")
{

    function truncateText($text)
    {
        if (strlen($text) > 100) {
            return substr($text, 0, 100) . '...';
        }
        return $text;
    }

    // Set default date if not provided
    if (is_null($uploadDate)) {
        $uploadDate = date('d M Y');
    }

    return '
        <div class="flex justify-center items-center px-6 bg-white">
            <div class="w-80 h-[400px] bg-white ' . htmlspecialchars($custom_classes) . '"> 
                <a href="'. htmlspecialchars($href) .'">
                    <div class="h-48 bg-gray-200 rounded-t-lg relative overflow-hidden">
                        <img 
                            src="' . htmlspecialchars($src) . '" 
                            alt="' . htmlspecialchars($alt) . '" 
                            class="inset-0 w-full h-full object-cover" />
                    </div>
                </a>
                <div class="p-4">
                    <h4 class="text-xl font-normal text-gray-800 mb-2">' . htmlspecialchars($title) . '</h4>
                    <div class="flex justify-between text-gray-600 text-sm mb-2">
                        <div class="flex justify-center items-center"><span class="calender-outline"></span><p>' . $uploadDate . '</p></div>
                        <div class="flex justify-center items-center break-words"></p><span class="user"></span><p class="text-right">' . htmlspecialchars($author) . '</div>
                    </div>
                    <p class="text-sm mb-2 overflow-hidden" style="max-height: 4.5rem; line-height: 1.25; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; -webkit-line-clamp: 3;"> 
                        ' . htmlspecialchars(truncateText($desc)) . '
                    </p>

                    <a href="' . htmlspecialchars($href) . '" class="text-black font-bold text-sm hover:text-tertiary transition duration-300" role="button">Read More</a>
                </div>
            </div> 
        </div>
    ';
}
