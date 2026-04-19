<?php
/**
 * Plugin Name: Global Advanced Dashboards
 * Description: Unifies all ecosystem modules into a seamless User Frontend Portal and an advanced Admin Analytics backend.
 * Version: 1.0.0
 * Author: AI Studio
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'GAD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'GAD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue styles and scripts
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('gad-style', GAD_PLUGIN_URL . 'assets/css/gad-style.css', [], '1.0.0');
    wp_enqueue_script('gad-script', GAD_PLUGIN_URL . 'assets/js/gad-script.js', ['jquery'], '1.0.0', true);
});

// Admin Enqueue
add_action('admin_enqueue_scripts', function($hook) {
    if($hook === 'toplevel_page_gad-admin-dashboard') {
        wp_enqueue_style('gad-admin-style', GAD_PLUGIN_URL . 'assets/css/gad-style.css', [], '1.0.0');
        wp_enqueue_script('gad-admin-script', GAD_PLUGIN_URL . 'assets/js/gad-script.js', ['jquery'], '1.0.0', true);
    }
});

// Includes
require_once GAD_PLUGIN_DIR . 'includes/user-dashboard.php';
require_once GAD_PLUGIN_DIR . 'admin/admin-dashboard.php';
