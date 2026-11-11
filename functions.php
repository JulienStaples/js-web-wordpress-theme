<?php

function js_web_theme_styles() {
    wp_enqueue_style(
        'js-web-inter',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    wp_enqueue_style(
        'js-web-style',
        get_stylesheet_uri(),
        array('js-web-inter'),
        wp_get_theme()->get('Version')
    );
}

add_action('wp_enqueue_scripts', 'js_web_theme_styles');