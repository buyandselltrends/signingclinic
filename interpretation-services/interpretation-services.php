<?php
/**
 * Plugin Name: Interpretation Services
 * Description: Real-time on-demand and scheduled interpretation platform with WebRTC foundations.
 * Version: 1.0.0
 * Author: George Edem Kennedy
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'ITS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ITS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once ITS_PLUGIN_DIR . 'includes/shortcode.php';

// Enqueue Frontend Assets
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('its-style', ITS_PLUGIN_URL . 'assets/css/its-style.css', [], '1.0.0');
    wp_enqueue_script('its-script', ITS_PLUGIN_URL . 'assets/js/its-script.js', ['jquery'], '1.0.0', true);
    wp_localize_script('its-script', 'itsAjax', [
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('its_secure_nonce')
    ]);
});

// Register Custom Post Type for Session History
add_action('init', function() {
    register_post_type('its_session', [
        'labels' => [
            'name' => 'Interpretation Sessions',
            'singular_name' => 'Session'
        ],
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => ['title', 'author'] // Custom fields via meta
    ]);
});

// AJAX Handler: Save completed session
add_action('wp_ajax_its_save_session', 'its_save_session');
// Allow nopriv if guest sessions are permitted; assuming logged in for history
add_action('wp_ajax_nopriv_its_save_session', 'its_save_session');

function its_save_session() {
    check_ajax_referer('its_secure_nonce', 'security');
    
    $user_id = get_current_user_id();
    $duration = (int) $_POST['duration']; // in seconds
    $cost = floatval($_POST['cost']);
    $service = sanitize_text_field($_POST['service']);
    $mode = sanitize_text_field($_POST['mode']);

    $post_id = wp_insert_post([
        'post_title' => 'Session on ' . current_time('mysql'),
        'post_type' => 'its_session',
        'post_status' => 'publish',
        'post_author' => $user_id ? $user_id : 0
    ]);

    update_post_meta($post_id, '_its_duration', $duration);
    update_post_meta($post_id, '_its_cost', $cost);
    update_post_meta($post_id, '_its_service', $service);
    update_post_meta($post_id, '_its_mode', $mode);

    wp_send_json_success(['message' => 'Session saved successfully.']);
}
