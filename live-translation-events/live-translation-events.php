<?php
/**
 * Plugin Name: Live Translation and Event Services
 * Description: Event management for live translation, interpreting, and Instant Meet features with multi-language AI captions.
 * Version: 1.0.0
 * Author: AI Studio
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'LTE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'LTE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue styles and scripts
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('lte-style', LTE_PLUGIN_URL . 'assets/css/lte-style.css', [], '1.0.0');
    wp_enqueue_script('lte-script', LTE_PLUGIN_URL . 'assets/js/lte-script.js', ['jquery'], '1.0.0', true);
});

// Include Core Files
require_once LTE_PLUGIN_DIR . 'admin/dashboard.php';
require_once LTE_PLUGIN_DIR . 'includes/shortcode.php';

// Register CPT for Events
add_action('init', function() {
    register_post_type('lte_event', [
        'labels' => [
            'name' => 'Translation Events',
            'singular_name' => 'Event'
        ],
        'public' => true,
        'show_ui' => true,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => ['title', 'editor', 'author']
    ]);
});

// Activation Hook
register_activation_hook(__FILE__, function() {
    // Basic setup if needed
    add_option('lte_business_subscription', 'active');
});
