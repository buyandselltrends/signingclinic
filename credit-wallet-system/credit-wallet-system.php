<?php
/**
 * Plugin Name: Credit & Wallet System
 * Description: Universal wallet system handling credits, payments, and billing for translation and interpretation services.
 * Version: 1.0.0
 * Author: AI Studio
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'CWS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CWS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue Assets
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('cws-style', CWS_PLUGIN_URL . 'assets/css/cws-style.css', [], '1.0.0');
    wp_enqueue_script('cws-script', CWS_PLUGIN_URL . 'assets/js/cws-script.js', ['jquery'], '1.0.0', true);
    wp_localize_script('cws-script', 'cwsAjax', [
        'url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('cws_secure_checkout')
    ]);
});

// CPT for Transactions
add_action('init', function() {
    register_post_type('cws_transaction', [
        'labels' => [
            'name' => 'Transactions',
            'singular_name' => 'Transaction'
        ],
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-money-alt',
        'supports' => ['title', 'author', 'custom-fields']
    ]);
});

// Includes
require_once CWS_PLUGIN_DIR . 'includes/ajax.php';
require_once CWS_PLUGIN_DIR . 'includes/shortcode.php';
require_once CWS_PLUGIN_DIR . 'admin/dashboard.php';
