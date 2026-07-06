<?php
/**
 * Outputs a link styled as a button.
 *
 * @param string $text Button label (default "Contact Us").
 * @param string $href URL for the link (default contact page).
 * @param string $custom_classes Additional CSS classes (default empty).
 * @return string HTML for the button link.
 */
function button( $text = 'Contact Us', $href = '', $custom_classes = '' ) {
    if ( empty( $href ) ) {
        $href = esc_url( home_url( '/contact' ) );
    } else {
        $href = esc_url( $href );
    }
    $text = htmlspecialchars( $text, ENT_QUOTES, 'UTF-8' );
    $classes = 'inline-block px-4 py-2 rounded font-medium transition ' . esc_attr( $custom_classes );
    return '<a href="' . $href . '" class="' . trim( $classes ) . '">' . $text . '</a>';
}
