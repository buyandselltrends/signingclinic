<?php
/**
 * Plugin Name: Platform Performance & SEO Engine
 * Description: Global optimization suite encompassing advanced caching, API routing efficiency, global SaaS animations, and SEO architecture (Landing Pages & Blog Schema).
 * Version: 1.0.0
 * Author: AI Studio
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'PPE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'PPE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Load Assets
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('ppe-animations', PPE_PLUGIN_URL . 'assets/css/platform-animations.css', [], '1.0.0');
    wp_enqueue_script('ppe-perf', PPE_PLUGIN_URL . 'assets/js/platform-perf.js', [], '1.0.0', true);
});

// Optimization Modules
require_once PPE_PLUGIN_DIR . 'includes/caching-engine.php';
require_once PPE_PLUGIN_DIR . 'includes/seo-meta.php';
require_once PPE_PLUGIN_DIR . 'includes/landing-pages.php';

// Add global async/defer to non-critical scripts
add_filter('script_loader_tag', function($tag, $handle) {
    if (in_array($handle, ['jquery', 'ppe-perf'])) return $tag; // Keep core blocking if strictly needed, though perf is in footer
    return str_replace(' src', ' defer="defer" src', $tag);
}, 10, 2);
