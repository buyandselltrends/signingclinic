<?php
/**
 * Plugin Name: Translator Marketplace
 * Description: Two-sided marketplace connecting clients with freelance translators. Features job bidding, commissions, and ratings.
 * Version: 1.0.0
 * Author: George Edem Kennedy
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'TM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'TM_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue styles and scripts
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('tm-style', TM_PLUGIN_URL . 'assets/css/tmark-style.css', [], '1.0.0');
    wp_enqueue_script('tm-script', TM_PLUGIN_URL . 'assets/js/tmark-script.js', ['jquery'], '1.0.0', true);
    wp_localize_script('tm-script', 'tmAjax', [
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('tm_secure_action')
    ]);
});

// Custom Post Types
add_action('init', function() {
    register_post_type('tm_job', [
        'labels' => [
            'name' => 'Marketplace Jobs',
            'singular_name' => 'Job'
        ],
        'public' => true,
        'show_ui' => true,
        'menu_icon' => 'dashicons-briefcase',
        'supports' => ['title', 'editor', 'author', 'custom-fields']
    ]);
});

// Includes
require_once TM_PLUGIN_DIR . 'admin/dashboard.php';
require_once TM_PLUGIN_DIR . 'includes/shortcode.php';
require_once TM_PLUGIN_DIR . 'includes/ajax.php';
