<?php
/**
 * Plugin Name: Interpreter Booking System
 * Description: Advanced scheduling and booking engine for translation and interpretation services, featuring auto-assignment and calendar UI.
 * Version: 1.0.0
 * Author: AI Studio
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'IBS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'IBS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue Assets
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('ibs-style', IBS_PLUGIN_URL . 'assets/css/ibs-style.css', [], '1.0.0');
    wp_enqueue_script('ibs-script', IBS_PLUGIN_URL . 'assets/js/ibs-script.js', ['jquery'], '1.0.0', true);
    wp_localize_script('ibs-script', 'ibsAjax', [
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('ibs_secure_booking')
    ]);
});

// CPT for Bookings
add_action('init', function() {
    register_post_type('ibs_booking', [
        'labels' => [
            'name' => 'Bookings',
            'singular_name' => 'Booking'
        ],
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-calendar-alt',
        'supports' => ['title', 'custom-fields']
    ]);
});

// Includes
require_once IBS_PLUGIN_DIR . 'includes/ajax.php';
require_once IBS_PLUGIN_DIR . 'includes/shortcode.php';
require_once IBS_PLUGIN_DIR . 'admin/dashboard.php';
