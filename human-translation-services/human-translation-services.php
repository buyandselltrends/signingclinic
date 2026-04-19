<?php
/**
 * Plugin Name: Human Translation Services
 * Description: Order management system for premium human and hybrid translation services.
 * Version: 1.0.0
 * Author: AI Studio
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'HTS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'HTS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue Frontend Scripts/Styles
add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('hts-style', HTS_PLUGIN_URL . 'assets/css/hts-style.css', [], '1.0.0');
    wp_enqueue_script('hts-script', HTS_PLUGIN_URL . 'assets/js/hts-script.js', ['jquery'], '1.0.0', true);
    wp_localize_script('hts-script', 'htsAjax', ['ajaxUrl' => admin_url('admin-ajax.php')]);
});

// Register Custom Post Type for Orders
add_action('init', function() {
    register_post_type('hts_order', [
        'labels' => [
            'name' => 'Translation Orders',
            'singular_name' => 'Order'
        ],
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-clipboard',
        'supports' => ['title', 'custom-fields']
    ]);
});

// Meta Boxes for Orders
add_action('add_meta_boxes', function() {
    add_meta_box('hts_order_details', 'Order Details', 'hts_render_order_meta', 'hts_order', 'normal', 'high');
});

function hts_render_order_meta($post) {
    $status = get_post_meta($post->ID, '_hts_status', true);
    $price = get_post_meta($post->ID, '_hts_price', true);
    $service = get_post_meta($post->ID, '_hts_service', true);
    ?>
    <p><strong>Service Type:</strong> <?php echo esc_html($service); ?></p>
    <p><strong>Total Price:</strong> $<?php echo esc_html($price); ?></p>
    <p>
        <label><strong>Status:</strong></label>
        <select name="hts_status">
            <option value="pending" <?php selected($status, 'pending'); ?>>Pending</option>
            <option value="in_progress" <?php selected($status, 'in_progress'); ?>>In Progress</option>
            <option value="completed" <?php selected($status, 'completed'); ?>>Completed</option>
        </select>
    </p>
    <?php
}

add_action('save_post', function($post_id) {
    if (isset($_POST['hts_status'])) {
        update_post_meta($post_id, '_hts_status', sanitize_text_field($_POST['hts_status']));
        // In full version, trigger email notification here based on status change
    }
});

require_once HTS_PLUGIN_DIR . 'includes/shortcode.php';
