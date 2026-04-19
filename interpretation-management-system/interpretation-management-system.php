<?php
/**
 * Plugin Name: Interpretation Management System (B2B SaaS)
 * Description: Enterprise dashboard for business clients containing team management, invoicing, reporting, and rate management.
 * Version: 1.0.0
 * Author: AI Studio
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'IMS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'IMS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue Assets
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('ims-style', IMS_PLUGIN_URL . 'assets/css/ims-style.css', [], '1.0.0');
    wp_enqueue_script('ims-script', IMS_PLUGIN_URL . 'assets/js/ims-script.js', ['jquery'], '1.0.0', true);
});

// Includes
require_once IMS_PLUGIN_DIR . 'includes/shortcode.php';
