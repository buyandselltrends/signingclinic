<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// Register Landing Pages Custom Post Type for massive SEO footprint
add_action('init', function() {
    register_post_type('ppe_landing_page', [
        'labels' => [
            'name' => 'Landing Pages',
            'singular_name' => 'Landing Page',
            'menu_name' => 'Landing Pages',
            'add_new' => 'Add New Page',
            'add_new_item' => 'Add New Landing Page',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'l'], // e.g. site.com/l/spanish-translation-services
        'supports' => ['title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes'],
        'menu_icon' => 'dashicons-align-center',
        'show_in_rest' => true // Enable Gutenberg blocks
    ]);
});

// Provide a default template redirect if theme doesn't support it natively
add_filter('template_include', function($template) {
    if (is_singular('ppe_landing_page')) {
        // Enforce a full-width container automatically
        add_filter('body_class', function($classes) {
            $classes[] = 'ppe-landing-layout';
            return $classes;
        });
    }
    return $template;
});
