<?php

function js_web_theme_setup()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'js_web_theme_setup');

function js_web_theme_styles()
{
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

    wp_enqueue_style(
        'js-web-experience-timeline',
        get_template_directory_uri() . '/css/components/experience-timeline.css',
        array('js-web-style'),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style(
        'js-web-tailwind',
        get_theme_file_uri('/assets/css/tailwind.css'),
        array('js-web-style'),
        filemtime(get_theme_file_path('/assets/css/tailwind.css'))
    );
}

add_action('wp_enqueue_scripts', 'js_web_theme_styles');
