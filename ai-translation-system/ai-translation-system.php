<?php
/**
 * Plugin Name: AI Translation System
 * Description: API-based translation system with file extraction, credit management, and history.
 * Version: 1.1.0
 * Author: George Edem Kennedy
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define Plugin Constants
define( 'AITS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'AITS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include Core Files
require_once AITS_PLUGIN_DIR . 'admin/settings.php';
require_once AITS_PLUGIN_DIR . 'admin/history.php';
require_once AITS_PLUGIN_DIR . 'includes/api.php';
require_once AITS_PLUGIN_DIR . 'includes/shortcode.php';

// Enqueue Scripts & Styles
function aits_enqueue_scripts() {
    wp_enqueue_style( 'aits-style', AITS_PLUGIN_URL . 'assets/css/style.css', array(), '1.1.0' );
    wp_enqueue_script( 'aits-script', AITS_PLUGIN_URL . 'assets/js/script.js', array( 'jquery' ), '1.1.0', true );
    
    wp_localize_script( 'aits-script', 'aitsSettings', array(
        'ajaxUrl' => admin_url( 'admin-ajax.php' ),
        'nonce'   => wp_create_nonce( 'aits_secure_nonce' )
    ));
}
add_action( 'wp_enqueue_scripts', 'aits_enqueue_scripts' );

// Activate plugin: set default credits & create DB table
register_activation_hook( __FILE__, 'aits_activate_plugin' );
function aits_activate_plugin() {
    add_option('aits_api_provider', 'openai');
    add_option('aits_api_key', '');

    global $wpdb;
    $table_name = $wpdb->prefix . 'aits_history';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        user_id bigint(20) NOT NULL,
        source_text longtext NOT NULL,
        translated_text longtext NOT NULL,
        target_lang varchar(10) NOT NULL,
        provider varchar(20) NOT NULL,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );

    // Setup monthly allowance cron if not scheduled
    if (!wp_next_scheduled('aits_monthly_allowance_hook')) {
        wp_schedule_event(time(), 'monthly', 'aits_monthly_allowance_hook');
    }
}

// Add monthly allowance logic
add_action('aits_monthly_allowance_hook', 'aits_distribute_monthly_allowance');
function aits_distribute_monthly_allowance() {
    $users = get_users();
    foreach ($users as $user) {
        $current = (int)get_user_meta($user->ID, 'aits_credits', true);
        // Base allowance of 100 credits for free tier
        update_user_meta($user->ID, 'aits_credits', $current + 100);
    }
}
